<?php

namespace App\Controller;

use App\UseCase\Battle\CreateBattleForUser;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class BattleController
{
    /**
     * Get battle by token
     *
     * @Route("/api/battle/{token}", methods={"GET"})
     *
     * @SWG\Tag(name="battle")
     * @SWG\Response(response=200, description="Success!.")
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    public function get(string $token)
    {
        return new JsonResponse([
            'method' => 'GET',
            'token'  => $token,
            'status' => true,
        ]);
    }

    /**
     * Returns pending user battle OR Create battle for user OR add user into a pending existing battle.
     *
     * @Route("/api/battle", methods={"POST"})
     *
     * @SWG\Tag(name="battle")
     * @SWG\Parameter(name="userToken", in="formData", type="string", description="User Token")
     * @SWG\Parameter(name="json", in="formData", type="string", description="Json data")
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
