<?php

namespace App\Services;

use App\DTO\SkillHero;

class SkillHeroArrayTransformer
{
    public function transform(int $battleHeroId, array $data): SkillHero
    {
        return new SkillHero(
            $battleHeroId, $data['skillId']
        );
    }
}
