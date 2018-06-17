<?php

namespace App\Repository;

use App\Definitions\Redis;
use App\DTO\User;
use App\Services\TokenValidator;

class UserRepository extends AbstractRedisRepository
{
    const NAMESPACE = 'user-';

    public function find(string $token): array
    {
        if (TokenValidator::validate($token)) {

            return $this->getByToken($token);
        }

        return [];
    }

    public function persist(User $user)
    {
        if (TokenValidator::validate($user->getUserToken())) {
            $this->persistUser($user);
        }
    }

    private function getByToken(string $token): array
    {
        $key = $this->key($token);

        return json_decode($this->client->get($key), true) ?? [];
    }

    private function persistUser(User $user): void
    {
        $key = $this->key($user->getBattleToken());
        $this->client->set($key, $user->toJson());
        $this->client->expire($key, Redis::TTL);
    }

    public function remove(string $token)
    {
        if (TokenValidator::validate($token)) {
            $this->client->del($token);
        }
    }
}
