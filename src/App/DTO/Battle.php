<?php

namespace App\DTO;

class Battle
{
    private $battleToken;

    private $status;

    private $online;

    private $battleHeroes = [];

    private $skillHeroes = [];

    public function __construct(string $battleToken, string $status, bool $online)
    {
        $this->battleToken = $battleToken;
        $this->status = $status;
        $this->online = $online;
    }

    public function getBattleToken(): string
    {
        return $this->battleToken;
    }

    public function addBattleHero(BattleHero $battleHero): void
    {
        $this->battleHeroes[] = $battleHero;
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
            'online'       => $this->online,
            'heroes'       => $this->battleHeroes,
            'skillsHeroes' => $this->skillHeroes,
        ];
    }
}
