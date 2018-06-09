<?php

namespace App\DTO;

class Battle
{
    private $battleToken;

    private $status;

    private $battleHeroes = [];

    private $skillHeroes = [];

    public function __construct(string $battleToken, string $status)
    {
        $this->battleToken = $battleToken;
        $this->status = $status;
    }

    public function getBattleToken(): string
    {
        return $this->battleToken;
    }

    public function addBattleHero(BattleHero $battleHero): void
    {
        $this->battleHeroes[] = $battleHero->toArray();
    }

    public function addSkillHero(SkillHero $skillHero): void
    {
        $this->skillHeroes[] = $skillHero;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    private function toArray(): array
    {
        return [
            'battleToken'  => $this->battleToken,
            'status'       => $this->status,
            'online'       => true,
            'heroes'       => $this->battleHeroes,
            'skillsHeroes' => $this->skillHeroes,
        ];
    }
}
