<?php

namespace TDM\VolleyScores\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use TDM\VolleyScores\Exceptions\UndefinedEndpointException;

abstract class AbstractEndpoint
{

    /**
     * @var string
     */
    protected $endpoint;

    /**
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        if(! $this->endpoint) {
            throw new UndefinedEndpointException('$endpoint should be defined in ' . get_class($this));
        }

        $this->client = $client;
    }

    protected function queryEndpoint($parameters = [])
    {
        $response = $this->client->get($this->endpoint, [
            'query' => $this->mergeParameters($parameters),
        ]);

        $data = $response->getBody();

        return json_decode($data, true);
    }

    protected function queryMultipleEndpoints($requests = [])
    {
        $promises = [];
        $data = [];

        foreach($requests as $request) {
            $promises[] = $this->client->getAsync($this->endpoint, [
                'query' => $this->mergeParameters($request)
            ]);
        }

        $responses = Promise\unwrap($promises);

        foreach($responses as $response) {
            $data = array_merge($data, json_decode($response->getBody(), true));
        }

        return $data;
    }

    protected function mergeParameters($parameters = []): array
    {
        return array_merge($parameters, [
            'format' => 'json',
        ]);
    }
}
