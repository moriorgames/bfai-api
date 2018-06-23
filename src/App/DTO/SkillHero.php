<?php

namespace App\DTO;

class SkillHero
{
    private $battleHeroId;

    private $skillId;

    public function __construct(int $battleHeroId, int $skillId)
    {
        $this->battleHeroId = $battleHeroId;
        $this->skillId = $skillId;
    }

    public function toArray(): array
    {
        return [
            'battleHeroId' => $this->battleHeroId,
            'skillId'      => $this->skillId,
        ];
    }
}
