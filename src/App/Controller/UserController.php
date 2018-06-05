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

    public function get(string $token)
    {
        $result = $this->repository->findByToken($token);
        if ($result === null) {
            $data = [
                'battleToken' => 'ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28'
            ];
            $this->repository->persist($token, $data);
        } else {
            $this->repository->remove($token);
        }

        return new JsonResponse($result);
    }
}
