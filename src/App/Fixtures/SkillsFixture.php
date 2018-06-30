<?php

namespace App\Fixtures;

class SkillsFixture
{
    const DAMAGE_ID = 1;

    const NEXT_TURN_ID = 2;

    const MOVEMENT_ID = 3;

    const SINGLE_ATTACK_ID = 4;

    const BOOST_HEALTH_ID = 5;

    const BOOST_DAMAGE_ID = 6;

    const BOOST_RANGED_ID = 7;

    const BOOST_MOVE_ID = 8;

    const SHOTGUN_ID = 9;

    const SPAWN_BOT_ID = 10;

    const EXTRA_SHOT = 11;

    const SMASH = 12;

    const JUMP = 13;

    const END_OF_BATTLE_ID = 99;

    // --------- TYPES

    const TYPE_BOOST_HEALTH = 1;

    const TYPE_BOOST_DAMAGE = 2;

    const TYPE_BOOST_RANGED = 3;

    const TYPE_BOOST_MOVE = 4;

    const TYPE_CONE_AREA_DAMAGE = 5;

    const TYPE_SPAWN = 6;

    const TYPE_EXTRA_SHOT = 7;

    const TYPE_JUMP = 8;

    const DATA = [
        [
            'id'         => SkillsFixture::DAMAGE_ID,
            'name'       => 'Damage',
            'slug'       => 'damage',
            'type'       => 0,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => false,
        ],
        [
            'id'         => SkillsFixture::NEXT_TURN_ID,
            'name'       => 'Next turn',
            'slug'       => 'next-turn',
            'type'       => 0,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => false,
        ],
        [
            'id'         => SkillsFixture::MOVEMENT_ID,
            'name'       => 'Movement',
            'slug'       => 'movement',
            'type'       => 0,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => false,
        ],
        [
            'id'         => SkillsFixture::SINGLE_ATTACK_ID,
            'name'       => 'Single Attack',
            'slug'       => 'single-attack',
            'type'       => 0,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => false,
        ],
        [
            'id'         => SkillsFixture::BOOST_HEALTH_ID,
            'name'       => 'Boost Health',
            'slug'       => 'boost-health',
            'type'       => SkillsFixture::TYPE_BOOST_HEALTH,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => false,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::BOOST_DAMAGE_ID,
            'name'       => 'Boost Damage',
            'slug'       => 'boost-damage',
            'type'       => SkillsFixture::TYPE_BOOST_DAMAGE,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => false,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::BOOST_RANGED_ID,
            'name'       => 'Boost Ranged',
            'slug'       => 'boost-ranged',
            'type'       => SkillsFixture::TYPE_BOOST_RANGED,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::BOOST_MOVE_ID,
            'name'       => 'Boost Move',
            'slug'       => 'boost-move',
            'type'       => SkillsFixture::TYPE_BOOST_MOVE,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::SHOTGUN_ID,
            'name'       => 'Shotgun',
            'slug'       => 'shotgun',
            'type'       => SkillsFixture::TYPE_CONE_AREA_DAMAGE,
            'damage'     => 3,
            'ranged'     => 2,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::SPAWN_BOT_ID,
            'name'       => 'Spawn Bot',
            'slug'       => 'spawn-bot',
            'type'       => SkillsFixture::TYPE_SPAWN,
            'damage'     => 0,
            'ranged'     => 1,
            'extra'      => HeroesFixture::BOT_ID,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::EXTRA_SHOT,
            'name'       => 'Extra Shot',
            'slug'       => 'extra-shot',
            'type'       => SkillsFixture::TYPE_EXTRA_SHOT,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::SMASH,
            'name'       => 'Smash',
            'slug'       => 'smash',
            'type'       => SkillsFixture::TYPE_CONE_AREA_DAMAGE,
            'damage'     => 5,
            'ranged'     => 1,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::JUMP,
            'name'       => 'Jump',
            'slug'       => 'jump',
            'type'       => SkillsFixture::TYPE_JUMP,
            'damage'     => 0,
            'ranged'     => 2,
            'extra'      => 0,
            'unique'     => true,
            'upgradable' => true,
        ],
        [
            'id'         => SkillsFixture::END_OF_BATTLE_ID,
            'name'       => 'End Of Battle',
            'slug'       => 'end-of-battle',
            'type'       => 0,
            'damage'     => 0,
            'ranged'     => 0,
            'extra'      => 0,
            'unique'     => false,
            'upgradable' => false,
        ],
    ];
}
