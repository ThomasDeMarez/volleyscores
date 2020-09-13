<?php

namespace TDM\VolleyScores\Endpoints;

use Illuminate\Support\Collection;
use Symfony\Component\Validator\Constraints;
use TDM\VolleyScores\Builders\ParameterBuilder;
use TDM\VolleyScores\Entities\Competition;

class CompetitionEndpoint extends AbstractEndpoint
{

    protected $endpoint = 'rangschikking_xml.php';

    public function main($parameters = [])
    {
        $data = $this->queryEndpoint(
            $this->verifyParameters($parameters)
        );

        return Collection::make($data)->mapInto(Competition::class);
    }

    public function reserve($parameters = [])
    {
        $data = $this->queryEndpoint(
            array_merge($this->verifyParameters($parameters), [
                'reeks' => 'reserve',
            ])
        );

        return Collection::make($data)->mapInto(Competition::class);
    }

    protected function verifyParameters(array $parameters)
    {
        return ParameterBuilder::verify($parameters, [
            'province_id' => new Constraints\Optional([
                new Constraints\Type('int'),
            ]),
            'reeks'       => new Constraints\Type('string'),
        ]);
    }
}
