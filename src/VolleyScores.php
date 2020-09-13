<?php

namespace TDM\VolleyScores;

use GuzzleHttp\Client;
use TDM\VolleyScores\Endpoints\CalendarEndpoint;
use TDM\VolleyScores\Endpoints\CompetitionEndpoint;
use TDM\VolleyScores\Endpoints\SeriesEndpoint;

class VolleyScores
{

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function series()
    {
        return new SeriesEndpoint($this->client);
    }

    public function competition()
    {
        return new CompetitionEndpoint($this->client);
    }

    public function calendar()
    {
        return new CalendarEndpoint($this->client);
    }
}
