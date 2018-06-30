<?php

namespace App\Fixtures;

class HeroesFixture
{
    const NEXUS_ID = 1;

    const JAIMIE_ID = 2;

    const PINK_ID = 3;

    const ATLAS_ID = 4;

    const PAUL_ID = 5;

    const KATIA_ID = 6;

    const KNUCKLES_ID = 7;

    const FRACTAL_ID = 8;

    const BOT_ID = 9;

    const SHIELD_ID = 12;

    const DRONE_ID = 13;

    const MECHA_KNUCKLES_ID = 14;

    const GORK_ID = 20;

    const SHERA_ID = 22;

    const THORIN_ID = 23;

    const JARIK_ID = 24;

    const DATA = [
        [
            'id'           => HeroesFixture::NEXUS_ID,
            'name'         => 'Nexus',
            'slug'         => 'nexus',
            'damage'       => 1,
            'ranged'       => 0,
            'health'       => 30,
            'movement'     => 0,
            'cost'         => 0,
            'moveFrames'   => 16,
            'attackFrames' => 16,
            'size'         => 5,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::JAIMIE_ID,
            'name'         => 'Jaimie',
            'slug'         => 'jaimie',
            'damage'       => 6,
            'ranged'       => 4,
            'health'       => 8,
            'movement'     => 3,
            'cost'         => 2,
            'moveFrames'   => 16,
            'attackFrames' => 16,
            'size'         => 1,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::PINK_ID,
            'name'         => 'Pink',
            'slug'         => 'pink',
            'damage'       => 8,
            'ranged'       => 4,
            'health'       => 10,
            'movement'     => 2,
            'cost'         => 3,
            'moveFrames'   => 24,
            'attackFrames' => 16,
            'size'         => 1,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::ATLAS_ID,
            'name'         => 'Atlas',
            'slug'         => 'atlas',
            'damage'       => 3,
            'ranged'       => 1,
            'health'       => 22,
            'movement'     => 2,
            'cost'         => 3,
            'moveFrames'   => 24,
            'attackFrames' => 24,
            'size'         => 6,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::PAUL_ID,
            'name'         => 'Paul',
            'slug'         => 'paul',
            'damage'       => 4,
            'ranged'       => 2,
            'health'       => 10,
            'movement'     => 2,
            'cost'         => 3,
            'moveFrames'   => 24,
            'attackFrames' => 24,
            'size'         => 3,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::KATIA_ID,
            'name'         => 'Katia',
            'slug'         => 'katia',
            'damage'       => 9,
            'ranged'       => 1,
            'health'       => 12,
            'movement'     => 3,
            'cost'         => 4,
            'moveFrames'   => 16,
            'attackFrames' => 32,
            'size'         => 3,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::KNUCKLES_ID,
            'name'         => 'Knuckles',
            'slug'         => 'knuckles',
            'damage'       => 7,
            'ranged'       => 1,
            'health'       => 15,
            'movement'     => 2,
            'cost'         => 4,
            'moveFrames'   => 24,
            'attackFrames' => 24,
            'size'         => 5,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::FRACTAL_ID,
            'name'         => 'Fractal',
            'slug'         => 'fractal',
            'damage'       => 4,
            'ranged'       => 1,
            'health'       => 18,
            'movement'     => 3,
            'cost'         => 4,
            'moveFrames'   => 24,
            'attackFrames' => 24,
            'size'         => 4,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::BOT_ID,
            'name'         => 'Bot',
            'slug'         => 'bot',
            'damage'       => 2,
            'ranged'       => 1,
            'health'       => 4,
            'movement'     => 4,
            'cost'         => 1,
            'moveFrames'   => 16,
            'attackFrames' => 24,
            'size'         => 1,
            'enabled'      => true,
        ],
        [
            'id'           => HeroesFixture::SHIELD_ID,
            'name'         => 'Shield',
            'slug'         => 'shield',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::DRONE_ID,
            'name'         => 'Drone',
            'slug'         => 'drone',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::MECHA_KNUCKLES_ID,
            'name'         => 'Mecha Knuckles',
            'slug'         => 'mecha-knuckles',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::GORK_ID,
            'name'         => 'Gork',
            'slug'         => 'gork',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::SHERA_ID,
            'name'         => 'Shera',
            'slug'         => 'shera',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::THORIN_ID,
            'name'         => 'Thorin',
            'slug'         => 'thorin',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
        [
            'id'           => HeroesFixture::JARIK_ID,
            'name'         => 'Jarik',
            'slug'         => 'jarik',
            'damage'       => 1,
            'ranged'       => 1,
            'health'       => 1,
            'movement'     => 1,
            'cost'         => 1,
            'moveFrames'   => 1,
            'attackFrames' => 1,
            'size'         => 1,
            'enabled'      => false,
        ],
    ];
}
