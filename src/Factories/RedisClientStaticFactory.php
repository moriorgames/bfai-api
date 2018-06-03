<?php

namespace App\Factories;

use Predis\Client;
use Symfony\Component\Cache\Adapter\RedisAdapter;

class RedisClientStaticFactory
{
    public static function create(): Client
    {
        return RedisAdapter::createConnection('redis://redis:6379');
    }
}
