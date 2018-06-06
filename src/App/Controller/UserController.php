<?php

namespace App\Controller;

use App\UseCase\User\GetUserDataByToken;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController
{
    /**
     * Get user data by token
     *
     * @Route("/api/user/{token}", methods={"GET"})
     *
     * @SWG\Tag(name="user")
     * @SWG\Response(response=200, description="Success!.")
     *
     * @param GetUserDataByToken $useCase
     * @param string             $token
     *
     * @return JsonResponse
     */
    public function get(GetUserDataByToken $useCase, string $token)
    {
        return new JsonResponse($useCase->execute($token));
    }
}
