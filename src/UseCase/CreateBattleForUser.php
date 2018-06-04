<?php

namespace App\UseCase;

use App\Repository\BattleRepository;
use App\Repository\UserRepository;

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
        $json = '{"heroes":[{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":3,"heroId":2,"x":-8,"y":2},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":4,"heroId":3,"x":-7,"y":1},{"userToken":"ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28","side":"local","battleHeroId":5,"heroId":4,"x":-7,"y":-1}],"skillsHeroes":[{"battleHeroId":4,"skillId":7}]}';
        $this->battleRepo->persistBattle('ac90094b-3bfa-4d1c-9b4c-c2f50d5f7c28', $json);

        return [];
    }
}
