<?php

namespace App\Services;

use App\DTO\Battle;
use Ramsey\Uuid\Uuid;

class BattleJsonTransformer
{
    const DEFAULT_STATUS = 'pending';

    public function transform(string $json): Battle
    {
        $battleToken = Uuid::uuid4();
        $battle = new Battle($battleToken, self::DEFAULT_STATUS, true);

        return $battle;
    }
}
