<?php

namespace App\Repository;

use App\Definitions\Token;
use Predis\Client as RedisClient;

class BattleRepository
{
    private $client;

    public function __construct(RedisClient $client)
    {
        $this->client = $client;
    }

    public function getAllBattles(): array
    {
        return $this->client->keys('*');
    }

    public function getBattleByToken(string $battleToken): ?array
    {
        return $this->isBattleToken($battleToken) ? json_decode($this->client->get($battleToken), true) : null;
    }

    public function battleExists(string $battleToken): bool
    {
        return $this->getBattleByToken($battleToken) !== null;
    }

    public function persistBattle(string $battleToken, array $data)
    {
        if ($this->isBattleToken($battleToken)) {
            $this->client->set($battleToken, json_encode($data));
        }
    }

    public function removeBattleByToken(string $battleToken)
    {
        if ($this->isBattleToken($battleToken)) {
            $this->client->del($battleToken);
        }
    }

    private function isBattleToken(string $battleToken): bool
    {
        return Token::LENGTH === strlen($battleToken);
    }
}
