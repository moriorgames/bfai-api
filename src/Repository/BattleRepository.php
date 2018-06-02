<?php

namespace App\Repository;

use App\Definitions\Token;
use Predis\Client as RedisClient;

class BattleRepository
{
    const BATTLE_SEED = 'btl-';

    private $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    public function findByUserToken(string $userToken): array
    {
        if ($this->isValidUserToken($userToken)) {

            $battleToken = $this->buildBattleTokenByUserToken($userToken);

            return $this->getBattleByToken($battleToken);
        }

        return [];
    }



    public function getBattleByToken(string $battleToken): ?array
    {
        return $this->isValidBattleToken($battleToken) ? json_decode($this->client->get($battleToken), true) : null;
    }

    public function battleExists(string $battleToken): bool
    {
        return $this->getBattleByToken($battleToken) !== null;
    }

    public function persistBattle(string $battleToken, array $data)
    {
        if ($this->isValidBattleToken($battleToken)) {
            $this->client->set($battleToken, json_encode($data));
        }
    }

    public function removeBattleByToken(string $battleToken)
    {
        if ($this->isValidBattleToken($battleToken)) {
            $this->client->del($battleToken);
        }
    }

    private function isValidUserToken(string $token): bool
    {
        return Token::USER_LENGTH === strlen($token);
    }

    private function isValidBattleToken(string $token): bool
    {
        return Token::BATTLE_LENGTH === strlen($token);
    }

    private function buildBattleTokenByUserToken(string $userToken): string
    {
        return self::BATTLE_SEED . $userToken;
    }
}
