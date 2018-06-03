<?php

namespace App\Repository;

class UserRepository extends AbstractRedisRepository
{
    public function findByToken(?string $token): array
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
}
