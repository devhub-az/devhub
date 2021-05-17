<?php

namespace App\Services;

use GuzzleHttp\Client;

class Contributors
{
    /**
     * @var string
     */
    private string $baseUrl = "https://api.github.com/repos/devhub-az/devhub/contributors";

    /**
     * @var Client
     */
    private Client $guzzle;

    public function __construct(Client $guzzle)
    {
        $this->guzzle = $guzzle;
    }

    public function get(): array
    {
        $contributors = json_decode($this->getDefaultData());

        $return = [];

        foreach ($contributors as $contributor) {
            if ($contributor->type === "User" && $contributor->login !== "laravel-shift") {
                array_push($return, $contributor);
            }
        }

        return $return;
    }

    private function getDefaultData(): string
    {
        return $this->guzzle->get($this->baseUrl)->getBody()->getContents();
    }
}
