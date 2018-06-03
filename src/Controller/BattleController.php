<?php

namespace App\Controller;

use App\Repository\BattleRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BattleController
{
    private $repository;

    public function __construct(BattleRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get(?string $token)
    {
        return new JsonResponse([
            'method' => 'GET',
            'status' => true,
        ]);
    }

    /**
     * @sample token:
     *     {"heroes":[{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":3,"heroId":2,"x":-8,"y":2},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":4,"heroId":3,"x":-7,"y":1},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":5,"heroId":4,"x":-7,"y":-1}],"skillsHeroes":[{"battleHeroId":4,"skillId":7}]}
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function post(Request $request)
    {
        $json = '{"heroes":[{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":3,"heroId":2,"x":-8,"y":2},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":4,"heroId":3,"x":-7,"y":1},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":5,"heroId":4,"x":-7,"y":-1}],"skillsHeroes":[{"battleHeroId":4,"skillId":7}]}';
        $this->repository->persistBattle('ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28', $json);

        return new JsonResponse([
            'method' => 'POST',
            'status' => true,
        ]);
    }
}
