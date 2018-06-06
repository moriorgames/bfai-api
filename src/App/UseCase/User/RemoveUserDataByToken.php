<?php

namespace App\UseCase\User;

use App\Definitions\Api;
use App\Repository\UserRepository;

class RemoveUserDataByToken
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $token): array
    {
        if ($this->repository->findByToken($token)) {
            $this->repository->remove($token);
        }

        return Api::SUCCESS;
    }
}
