<?php

namespace App\Repository;

use App\Services\TokenValidator;

class BattleRepository extends AbstractRedisRepository
{
    public function findByUserToken(string $userToken): array
    {
        if (TokenValidator::validate($userToken)) {

            $battleToken = $this->buildBattleTokenByUserToken($userToken);

            return $this->getBattleByToken($battleToken);
        }

        return [];
    }

    public function persistBattle(string $battleToken, string $json)
    {
        if (TokenValidator::validate($battleToken)) {
            $this->client->set($battleToken, $json);
        }
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
