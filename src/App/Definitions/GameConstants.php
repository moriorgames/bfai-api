<?php

namespace App\Definitions;

class GameConstants
{
    const SIDE_LOCAL = 'local';
    const SIDE_VISITOR = 'visitor';

    const ALLOWED_SIDE = [
        self::SIDE_LOCAL, self::SIDE_VISITOR,
    ];
}
