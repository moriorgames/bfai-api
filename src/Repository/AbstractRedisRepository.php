<?php

namespace App\Repository;

use App\Services\TokenValidator;
use Predis\Client as RedisClient;

abstract class AbstractRedisRepository
{
    protected $client;

    protected $tokenValidator;

    public function __construct(RedisClient $client, TokenValidator $tokenValidator)
    {
        $this->client = $client;
        $this->tokenValidator = $tokenValidator;
    }
}
