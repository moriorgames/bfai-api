<?php

namespace App\Repository;

class UserRepository extends AbstractRedisRepository
{
    public function findByToken(string $token): ?array
    {
        if ($this->tokenValidator->validate($token)) {

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
        if ($this->tokenValidator->validate($token)) {
            $this->client->set($token, json_encode($data));
        }
    }

    public function remove(string $token)
    {
        if ($this->tokenValidator->validate($token)) {
            $this->client->del($token);
        }
    }
}
