<?php

namespace App\Controller;

use App\UseCase\CreateBattleForUser;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BattleController
{
    /**
     * Get battle by token
     *
     * @Route("/api/battle", methods={"GET"})
     * @Route("/api/battle/{token}", methods={"GET"})
     *
     * @SWG\Tag(name="battle")
     * @SWG\Response(response=200, description="Success!.")
     *
     * @param null|string $token
     *
     * @return JsonResponse
     */
    public function get(?string $token)
    {
        return new JsonResponse([
            'method' => 'GET',
            'token' => $token,
            'status' => true,
        ]);
    }

    /**
     * Create battle for user or add user into an existing battle.
     *
     * @Route("/api/battle", methods={"POST"})
     *
     * @SWG\Tag(name="battle")
     * @SWG\Parameter(name="json", in="query", type="string", description="Json data")
     * @SWG\Response(response=200, description="Success!.")
     *
     * @param CreateBattleForUser $useCase
     * @param Request             $request
     *
     * @return JsonResponse
     */
    public function post(CreateBattleForUser $useCase, Request $request)
    {
        return new JsonResponse(
            $useCase->execute(
                $request->request->all()
            )
        );
    }
}
