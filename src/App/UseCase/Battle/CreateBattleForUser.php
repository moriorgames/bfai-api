<?php

namespace App\UseCase\Battle;

use App\Repository\BattleRepository;
use App\Repository\UserRepository;
use App\Services\BattleJsonTransformer;
use App\Services\TokenValidator;

class CreateBattleForUser
{
    private $userRepo;

    private $battleRepo;

    public function __construct(UserRepository $userRepository, BattleRepository $repository)
    {
        $this->userRepo = $userRepository;
        $this->battleRepo = $repository;
    }

    public function execute(array $data): array
    {
        if ($this->validateParams($data)) {
            $userToken = $json = '';
            extract($data);

            $battle = (new BattleJsonTransformer)->transform($userToken, $json);
            $this->battleRepo->persistBattle($battle->getBattleToken(), $battle->toJson());

            return $battle->toArray();
        }

        return [];
    }

    private function validateParams(array $data): bool
    {
        if (!isset($data['userToken'])) {

            return false;
        }

        if (!TokenValidator::validate($data['userToken'])) {

            return false;
        }

        if (!isset($data['json'])) {

            return false;
        }

        if (json_decode($data['json']) === null) {

            return false;
        }

        return true;
    }
}
