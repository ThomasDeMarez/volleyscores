<?php

namespace TDM\VolleyScores\Endpoints;

use Illuminate\Support\Collection;
use Symfony\Component\Validator\Constraints;
use TDM\VolleyScores\Builders\ParameterBuilder;
use TDM\VolleyScores\Entities\Calendar;

class CalendarEndpoint extends AbstractEndpoint
{

    protected $endpoint = 'wedstrijden_xml.php';

    public function get($parameters = []): Collection
    {
        $data = $this->queryEndpoint(
            ParameterBuilder::verify($parameters, [
                'province_id' => new Constraints\Type('int'),
                'reeks'       => new Constraints\Type('string'),
            ])
        );

        return Collection::make($data)->mapInto(Calendar::class);
    }
}
