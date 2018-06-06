<?php

namespace App\UseCase\User;

use App\Definitions\Api;
use App\Repository\UserRepository;

class CreateBattleToUser
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $userToken, string $battleToken): array
    {
        $return = Api::SUCCESS;
        if ($this->repository->findByToken($userToken)) {
            $data = [
                'battleToken' => $battleToken,
            ];
            $this->repository->persist($userToken, $data);
        }

        return $return;
    }
}
