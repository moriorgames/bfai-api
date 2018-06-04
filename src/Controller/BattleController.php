<?php

namespace App\Controller;

use App\UseCase\CreateBattleForUser;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BattleController
{
    public function get(?string $token)
    {
        return new JsonResponse([
            'method' => 'GET',
            'status' => true,
        ]);
    }

    public function post(CreateBattleForUser $useCase, Request $request)
    {
        return new JsonResponse(
            $useCase->execute(
                $request->request->all()
            )
        );
    }
}
