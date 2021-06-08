<?php

namespace App\Models;
use GuzzleHttp\Client;


class Artist
{
    private $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://moat.ai/api/task/',
            'timeout'  => 5,
            'headers' => [
                'Basic' => 'ZGV2ZWxvcGVyOlpHVjJaV3h2Y0dWeQ=='
            ]
        ]);
    }

    public function getList(): array
    {
        $response = $this->client->request('GET');
        return array_map(function($artist) {
            if(isset($artist[0])) {
                return $artist[0];
            }
        }, json_decode($response->getBody(), true));
    }
}
