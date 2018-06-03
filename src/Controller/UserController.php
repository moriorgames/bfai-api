<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function get(?string $token)
    {
        return new JsonResponse($this->repository->findByToken($token));
    }
}
