<?php

namespace App\UseCase\User;

use App\Definitions\Api;
use App\Repository\UserRepository;

class GetUserDataByToken
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $token): array
    {
        $return = Api::SUCCESS;
        $return['user'] = $this->repository->findByToken($token);

        return $return;
    }
}
