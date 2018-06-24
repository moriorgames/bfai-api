<?php

namespace App\Factories;

use App\DTO\Battle;
use App\DTO\BattleHero;
use App\DTO\SkillHero;

class ArrayToBattleStaticFactory
{
    public static function create(array $data): Battle
    {
        $battle = new Battle($data['battleToken'], $data['status']);
        foreach ($data['heroes'] as $hero) {
            $battleHero = new BattleHero(
                $hero['userToken'], $hero['side'], $hero['battleHeroId'], $hero['heroId'], $hero['x'], $hero['y']
            );
            $battle->addBattleHero(
                $battleHero
            );
        }
        foreach ($data['skillsHeroes'] as $skill) {
            $skillHero = new SkillHero($skill['battleHeroId'], $skill['skillId']);
            $battle->addSkillHero(
                $skillHero
            );
        }

        return $battle;
    }
}
