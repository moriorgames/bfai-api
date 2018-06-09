<?php

namespace App\DTO;

class BattleHero
{
    private $userToken;

    private $side;

    private $battleHeroId;

    private $heroId;

    private $x;

    private $y;

    public function __construct(string $userToken, string $side, int $battleHeroId, int $heroId, int $x, int $y)
    {
        $this->userToken = $userToken;
        $this->side = $side;
        $this->battleHeroId = $battleHeroId;
        $this->heroId = $heroId;
        $this->x = $x;
        $this->y = $y;
    }

    public function toArray(): array
    {
        return [
            'userToken'    => $this->userToken,
            'side'         => $this->side,
            'battleHeroId' => $this->battleHeroId,
            'heroId'       => $this->heroId,
            'x'            => $this->x,
            'y'            => $this->y,
        ];
    }
}
