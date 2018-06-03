<?php

namespace App\Repository;

use App\Services\TokenValidator;
use Predis\Client as RedisClient;

class BattleRepository
{
    private $client;

    private $tokenValidator;

    public function __construct(RedisClient $client, TokenValidator $tokenValidator)
    {
        $this->client = $client;
        $this->tokenValidator = $tokenValidator;
    }

    public function findByUserToken(string $userToken): array
    {
        if ($this->tokenValidator->validate($userToken)) {

            $battleToken = $this->buildBattleTokenByUserToken($userToken);

            return $this->getBattleByToken($battleToken);
        }

        return [];
    }

    public function persistBattle(string $battleToken, string $json)
    {
        if ($this->tokenValidator->validate($battleToken)) {
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
        return $this->tokenValidator->validate($battleToken) ? json_decode($this->client->get($battleToken), true) : null;
    }

    public function battleExists(string $battleToken): bool
    {
        return $this->getBattleByToken($battleToken) !== null;
    }


    public function removeBattleByToken(string $battleToken)
    {
        if ($this->tokenValidator->validate($battleToken)) {
            $this->client->del($battleToken);
        }
    }
}
