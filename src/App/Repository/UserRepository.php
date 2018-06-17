<?php

namespace App\Repository;

use App\Definitions\Redis;
use App\DTO\User;
use App\Services\TokenValidator;

class UserRepository extends AbstractRedisRepository
{
    const NAMESPACE = 'user-';

    public function persist(User $user)
    {
        if (TokenValidator::validate($user->getUserToken())) {
            $this->persistUser($user);
        }
    }

    public function remove(User $user)
    {
        $token = $user->getUserToken();
        if (TokenValidator::validate($token)) {
            $this->client->del($this->key($token));
        }
    }

    protected function getByToken(string $token): array
    {
        return json_decode($this->client->get($this->key($token)), true) ?? [];
    }

    private function persistUser(User $user): void
    {
        $key = $this->key($user->getBattleToken());
        $this->client->set($key, $user->toJson());
        $this->client->expire($key, Redis::TTL);
    }
}
