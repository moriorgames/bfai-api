<?php

namespace App\Repository;

use App\Services\TokenValidator;

class UserRepository extends AbstractRedisRepository
{
    public function findByToken(string $token): ?array
    {
        if (TokenValidator::validate($token)) {

            return $this->getByToken($token);
        }

        return [];
    }

    public function getByToken(string $token): ?array
    {
        return json_decode($this->client->get($token), true);
    }

    public function persist(string $token, array $data)
    {
        if (TokenValidator::validate($token)) {
            $this->client->set($token, json_encode($data));
        }
    }

    public function remove(string $token)
    {
        if (TokenValidator::validate($token)) {
            $this->client->del($token);
        }
    }
}
