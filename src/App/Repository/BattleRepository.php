<?php

namespace App\Repository;

use App\Definitions\Redis;
use App\DTO\Battle;
use App\Services\TokenValidator;

class BattleRepository extends AbstractRedisRepository
{
    const NAMESPACE = 'battle-';

    public function persist(Battle $battle): void
    {
        if (TokenValidator::validate($battle->getBattleToken())) {
            $this->persistBattle($battle);
        }
    }

    public function remove(Battle $battle)
    {
        $token = $battle->getBattleToken();
        if (TokenValidator::validate($token)) {
            $this->client->del($this->key($token));
        }
    }

    protected function getByToken(string $token): array
    {
        return json_decode($this->client->get($this->key($token)), true) ?? [];
    }

    private function persistBattle(Battle $battle): void
    {
        $key = $this->key($battle->getBattleToken());
        $this->client->set($key, $battle->toJson());
        $this->client->expire($key, Redis::TTL);
    }
}
