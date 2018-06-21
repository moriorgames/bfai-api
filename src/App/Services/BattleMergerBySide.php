<?php

namespace App\Services;

use App\Definitions\BattleStatus;
use App\Definitions\GameConstants;
use App\DTO\Battle;
use App\DTO\BattleHero;

class BattleMergerBySide
{
    public function merge(Battle $local, Battle $visitor): Battle
    {
        $battle = new Battle($local->getBattleToken(), BattleStatus::IN_PROGRESS);
        $this->assignBattleHeroes($battle, $local, GameConstants::SIDE_LOCAL);
        $this->assignBattleHeroes($battle, $visitor, GameConstants::SIDE_VISITOR);

        return $battle;
    }

    private function assignBattleHeroes(Battle $master, Battle $slave, string $side)
    {
        /** @var BattleHero $hero */
        foreach ($slave->getBattleHeroes() as $hero) {
            //dump($hero); die;
            //$hero->setSide($side);
            //$master->addBattleHero($hero);
        }
    }
}
