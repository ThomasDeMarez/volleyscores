<?php

namespace TDM\VolleyScores\Endpoints;

use Illuminate\Support\Collection;
use Symfony\Component\Validator\Constraints;
use TDM\VolleyScores\Builders\ParameterBuilder;
use TDM\VolleyScores\Entities\Serie;

class SeriesEndpoint extends AbstractEndpoint
{

    protected $endpoint = 'series_xml.php';

    public function all($parameters = []): Collection
    {
        $parameters = ParameterBuilder::verify($parameters, [
            'province_id' => new Constraints\Optional([
                new Constraints\Type('integer'),
            ]),
            'stamnummer'  => new Constraints\Optional([
                new Constraints\AtLeastOneOf([
                    new Constraints\Type('string'),
                    new Constraints\Type('array'),
                ]),
            ]),
        ]);

        if(isset($parameters['stamnummer']) && is_array($parameters['stamnummer'])) {
            $requests = [];

            foreach($parameters['stamnummer'] as $stamnummer) {
                $requests[] = [
                    'stamnummer' => $stamnummer,
                ];
            }

            $data = $this->queryMultipleEndpoints($requests);

            return Collection::make($data)->mapInto(Serie::class);
        }

        $data = $this->queryEndpoint($parameters);

        return Collection::make($data)->mapInto(Serie::class);
    }
}
