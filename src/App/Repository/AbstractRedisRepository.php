<?php

namespace App\Repository;

use App\Services\TokenValidator;
use Predis\Client as RedisClient;

abstract class AbstractRedisRepository
{
    const NAMESPACE = 'abstract-';

    protected $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    public function find(string $token): array
    {
        if (TokenValidator::validate($token)) {

            return $this->getByToken($token);
        }

        return [];
    }

    protected function key(string $token): string
    {
        return static::NAMESPACE . $token;
    }

    abstract protected function getByToken(string $token): array;
}
