<?php

namespace App\Services;

use App\Definitions\BattleStatus;
use App\Definitions\GameConstants;
use App\DTO\Battle;

class BattleMergerBySide
{
    private $battleHeroId = 1;

    private $heroTransformer;

    private $skillTransformer;

    public function __construct()
    {
        $this->heroTransformer = new BattleHeroArrayTransformer;
        $this->skillTransformer = new SkillHeroArrayTransformer;
    }

    public function merge(Battle $local, Battle $visitor): Battle
    {
        $battle = new Battle($local->getBattleToken(), BattleStatus::IN_PROGRESS);
        $this->assignNexus($battle, $local);
        $this->assignBattleHeroes($battle, $local, GameConstants::SIDE_LOCAL);
        $this->assignBattleHeroes($battle, $visitor, GameConstants::SIDE_VISITOR);

        return $battle;
    }

    private function assignNexus(Battle $master, Battle $slave): void
    {
        foreach ($slave->getBattleHeroes() as $hero) {
            if ($hero['heroId'] == 1) {
                $this->addHeroToBattle($master, $hero, $hero['side']);
            }
        }
    }

    private function assignBattleHeroes(Battle $master, Battle $slave, string $side): void
    {
        foreach ($slave->getBattleHeroes() as $hero) {
            if ($hero['heroId'] > 1) {
                $this->assignSkillsToCurrentHero($hero, $master, $slave, $side);
                $this->addHeroToBattle($master, $hero, $side);
            }
        }
    }

    private function addHeroToBattle(Battle $battle, array $hero, string $side): void
    {
        $battleHero = $this->heroTransformer->transform($this->battleHeroId, $hero);
        $battleHero->setSide($side);
        $battle->addBattleHero($battleHero);
        $this->battleHeroId++;
    }

    private function assignSkillsToCurrentHero(array $hero, Battle $master, Battle $slave, string $side): void
    {
        foreach ($slave->getSkillHeroes() as $skillData) {
            if ($hero['battleHeroId'] === $skillData['battleHeroId']) {
                $skillHero = $this->skillTransformer->transform($this->battleHeroId, $skillData);
                $master->addSkillHero(
                    $skillHero
                );
            }
        }
    }
}
