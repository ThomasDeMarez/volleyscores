<?php

namespace TDM\VolleyScores\Entities;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;
use TDM\VolleyScores\Entities\Casts\TrimCast;

abstract class AbstractEntity implements Arrayable
{

    /**
     * @var Collection
     */
    protected $original = [];

    /**
     * @var Collection
     */
    protected $attributes = [];

    /**
     * @var array
     */
    protected $mappings = [];

    /**
     * @var array
     */
    protected $casts = [];

    public function __construct(array $parameters = [])
    {
        $this->original = $parameters;
        $this->setAttributes($parameters);
    }

    protected function setAttributes(array $parameters)
    {
        foreach($parameters as $parameter => $value) {
            $value = $this->preformCast(TrimCast::class, $value);

            if($this->castExistsForAttributeName($parameter)) {
                $value = $this->preformCast($this->casts[$parameter], $value);
            }

            if($this->mappingExistsForAttributeName($parameter)) {
                $parameter = $this->mappings[$parameter];
            }

            $this->attributes[$parameter] = $value;
        }
    }

    protected function castExistsForAttributeName($attribute): bool
    {
        return ! empty($this->casts) && array_key_exists($attribute, $this->casts);
    }

    protected function mappingExistsForAttributeName($attribute): bool
    {
        return ! empty($this->mappings) && array_key_exists($attribute, $this->mappings);

    }

    protected function preformCast($cast, $value)
    {
        return $cast::cast($value);
    }

    public function __get($name)
    {
        return $this->attributes[$name];
    }

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function toArray()
    {
        return $this->attributes;
    }
}
