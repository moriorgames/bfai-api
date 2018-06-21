<?php

namespace App\Services;

use App\DTO\BattleHero;

class BattleHeroArrayTransformer
{
    public function transform(int $battleHeroId, array $data): BattleHero
    {
        return new BattleHero(
            $data['userToken'], $data['side'], $battleHeroId, $data['heroId'], $data['x'], $data['y']
        );
    }
}
