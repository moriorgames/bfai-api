<?php

namespace App\Services;

use App\Definitions\BattleStatus;
use App\Definitions\GameConstants;
use App\DTO\Battle;

class BattleMergerBySide
{
    public function merge(Battle $local, Battle $visitor): Battle
    {
        $battle = new Battle($local->getBattleToken(), BattleStatus::IN_PROGRESS);
        $battleHeroId = 1;
        $battleHeroId = $this->assignBattleHeroes($battleHeroId, $battle, $local, GameConstants::SIDE_LOCAL);
        $battleHeroId = $this->assignBattleHeroes($battleHeroId, $battle, $visitor, GameConstants::SIDE_VISITOR);

        return $battle;
    }

    private function assignBattleHeroes(int $battleHeroId, Battle $master, Battle $slave, string $side): int
    {
        $battleHeroArrayTransformer = new BattleHeroArrayTransformer;
        foreach ($slave->getBattleHeroes() as $hero) {
            // Assign Nexus only one time for local and visitor
            if ($hero['heroId'] == 1 && $battleHeroId > 2) {
                continue;
            }

            $battleHero = $battleHeroArrayTransformer->transform($battleHeroId, $hero);
            $battleHero->setSide($side);
            $master->addBattleHero($battleHero);
            $battleHeroId++;
        }

        return $battleHeroId;
    }
}
