<?php

namespace App\Services;

use App\DTO\Battle;
use App\DTO\BattleHero;
use Ramsey\Uuid\Uuid;

class BattleJsonTransformer
{
    const DEFAULT_STATUS = 'pending';

    public function transform(string $userToken, string $json): Battle
    {
        $battleToken = Uuid::uuid4();
        $battle = new Battle($battleToken, self::DEFAULT_STATUS, true);
        $data = json_decode($json, true);
        $this->assignBattleHeroes($userToken, $battle, $data);

        return $battle;
    }

    private function assignBattleHeroes(string $userToken, Battle $battle, array $data)
    {
        $battleHeroId = 1;
        foreach ($data['heroes'] as $hero) {
            if ($hero['userToken'] === '' || $hero['userToken'] === $userToken) {
                $battleHero = new BattleHero(
                    $hero['userToken'], $hero['side'], $battleHeroId, $hero['heroId'], $hero['x'], $hero['y']
                );
                $battle->addBattleHero(
                    $battleHero
                );
            }
            $battleHeroId++;
        }
    }
}
