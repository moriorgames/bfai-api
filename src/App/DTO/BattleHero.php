<?php

namespace App\DTO;

use App\Definitions\GameConstants;

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
        $this->setSide($side);
        $this->battleHeroId = $battleHeroId;
        $this->heroId = $heroId;
        $this->x = $x;
        $this->y = $y;
    }

    public function setSide(string $side)
    {
        if (!in_array($side, GameConstants::ALLOWED_SIDE)) {
            throw new \UnexpectedValueException('Unexpeced value for side : ', $side);
        }
        $this->side = $side;
        if ($this->side === GameConstants::SIDE_VISITOR) {
            $this->x = abs($this->x);
        }
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
