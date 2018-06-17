<?php

namespace App\Repository;

use App\Definitions\Redis;
use App\DTO\Battle;
use App\Services\TokenValidator;

class BattleRepository extends AbstractRedisRepository
{
    const NAMESPACE = 'battle-';

    public function find(string $token): array
    {
        if (TokenValidator::validate($token)) {

            return $this->getByToken($token);
        }

        return [];
    }

    private function getByToken(string $token): array
    {
        $key = $this->key($token);

        return json_decode($this->client->get($key), true) ?? [];
    }

    public function findByUserToken(string $userToken): array
    {
        if (TokenValidator::validate($userToken)) {

            $battleToken = $this->buildBattleTokenByUserToken($userToken);

            return $this->getBattleByToken($battleToken);
        }

        return [];
    }

    public function persist(Battle $battle): void
    {
        $battleToken = $battle->getBattleToken();
        if (TokenValidator::validate($battleToken)) {

            $this->persistBattle($battle);

            //// Assign battle to userToken
            //$jsonRelateUserTodBattle = json_encode(['battleToken' => $battleToken]);
            //$this->client->set($userToken, $jsonRelateUserTodBattle);
            //$this->client->expire($battleToken, Redis::TTL);

        }
    }

    private function persistBattle(Battle $battle): void
    {
        $key = $this->key($battle->getBattleToken());
        $this->client->set($key, $battle->toJson());
        $this->client->expire($key, Redis::TTL);
    }

    private function relateBattleToUser(string $userToken, Battle $battle): void
    {
        $key = $this->key($battle->getBattleToken());
        $this->client->set($key, $battle->toJson());
        $this->client->expire($key, Redis::TTL);
    }

    // @todo work in progress

    /**
     * @param string $battleToken
     *
     * @return array|null
     */
    public function getBattleByToken(string $battleToken): ?array
    {
        return TokenValidator::validate($battleToken) ? json_decode($this->client->get($battleToken), true) : null;
    }

    public function battleExists(string $battleToken): bool
    {
        return $this->getBattleByToken($battleToken) !== null;
    }


    public function removeBattleByToken(string $battleToken)
    {
        if (TokenValidator::validate($battleToken)) {
            $this->client->del($battleToken);
        }
    }
}
