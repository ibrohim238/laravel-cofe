<?php

namespace App\Clients;

use Dadata\DadataClient as BaseDadataClient;

class DaDataClient
{
    public BaseDadataClient $client;

    public function __construct()
    {
        $this->client = app(BaseDadataClient::class, [
            'token' => config('services.daData.token'),
            'secret' => config('services.daData.secret'),
        ]);
    }

    public function __call(string $name, array $arguments)
    {
        return $this->client->{$name}(...$arguments);
    }
}