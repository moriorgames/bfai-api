<?php

namespace App\Services;

use App\Definitions\BattleStatus;
use App\DTO\Battle;
use Ramsey\Uuid\Uuid;

class BattleJsonTransformer
{
    public function transform(string $userToken, string $json): Battle
    {
        $battleToken = Uuid::uuid4();
        $battle = new Battle($battleToken, BattleStatus::WAITING);
        $data = json_decode($json, true);
        $this->assignBattleHeroes($userToken, $battle, $data);

        return $battle;
    }

    private function assignBattleHeroes(string $userToken, Battle $battle, array $data)
    {
        $battleHeroArrayTransformer = new BattleHeroArrayTransformer;
        $battleHeroId = 1;
        foreach ($data['heroes'] as $hero) {
            if ($hero['userToken'] === '' || $hero['userToken'] === $userToken) {
                $battleHero = $battleHeroArrayTransformer->transform($battleHeroId, $hero);
                $battle->addBattleHero(
                    $battleHero
                );
            }
            $battleHeroId++;
        }
    }
}
