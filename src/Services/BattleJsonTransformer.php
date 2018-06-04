<?php

namespace App\Services;

use App\DTO\Battle;

class BattleJsonTransformer
{
    public function transform(string $json): Battle
    {
        return new Battle('la', []);
    }
}
