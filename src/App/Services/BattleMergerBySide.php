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
        $this->assignBattleHeroes($battle, $local, GameConstants::SIDE_LOCAL);

        return $battle;
    }

    private function assignBattleHeroes(Battle $master, Battle $slave, string $side)
    {
        foreach ($slave->toArray() as $index => $item) {
            //dump($index, $item, $side);
            //die;
            //$master->addBattleHero();
        }
    }
}
