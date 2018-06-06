<?php

namespace App\Controller;

use App\Fixtures\HeroesFixture;
use App\Fixtures\SkillsFixture;
use App\Fixtures\SkillsHeroesFixture;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DataController
{
    /**
     * Get battle by token
     *
     * @Route("/api/data", methods={"GET"})
     *
     * @SWG\Tag(name="data")
     * @SWG\Response(response=200, description="Success!.")
     *
     * @return JsonResponse
     */
    public function index()
    {
        return new JsonResponse([
            'heroes'       => HeroesFixture::DATA,
            'skills'       => SkillsFixture::DATA,
            'skillsHeroes' => SkillsHeroesFixture::DATA,
        ]);
    }
}
