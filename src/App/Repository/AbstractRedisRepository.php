<?php

namespace App\Repository;

use Predis\Client as RedisClient;

abstract class AbstractRedisRepository
{
    const NAMESPACE = 'abstract-';

    protected $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    protected function key(string $token): string
    {
        return static::NAMESPACE . $token;
    }
}
