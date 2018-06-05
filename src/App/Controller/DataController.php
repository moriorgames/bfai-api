<?php

namespace App\Controller;

use App\Fixtures\HeroesFixture;
use App\Fixtures\SkillsFixture;
use App\Fixtures\SkillsHeroesFixture;
use Symfony\Component\HttpFoundation\JsonResponse;

class DataController
{
    public function index()
    {
        return new JsonResponse([
            'heroes'       => HeroesFixture::DATA,
            'skills'       => SkillsFixture::DATA,
            'skillsHeroes' => SkillsHeroesFixture::DATA,
        ]);
    }
}
