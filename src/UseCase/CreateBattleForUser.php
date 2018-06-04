<?php

namespace App\UseCase;

use App\Repository\BattleRepository;
use App\Repository\UserRepository;
use App\Services\BattleJsonTransformer;

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
        $json = '{"battleToken":"fe751e67-153a-41dc-8452-0be777004bdf", "userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","online":false,"heroes":[{"userToken":"","side":"local","battleHeroId":1,"heroId":1,"x":-8,"y":0},{"userToken":"","side":"visitor","battleHeroId":2,"heroId":1,"x":8,"y":0},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":3,"heroId":2,"x":-8,"y":2},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":4,"heroId":3,"x":-7,"y":1},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":5,"heroId":4,"x":-7,"y":-1},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":6,"heroId":5,"x":-8,"y":-2},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":7,"heroId":5,"x":8,"y":2},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":8,"heroId":3,"x":7,"y":1},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":9,"heroId":3,"x":7,"y":-1},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":10,"heroId":4,"x":8,"y":-2}],"skillsHeroes":[{"battleHeroId":4,"skillId":7},{"battleHeroId":6,"skillId":7}]}';
        $battle = (new BattleJsonTransformer())->transform($json);
        $this->battleRepo->persistBattle($battle->getUserToken(), json_encode($battle->getData()));

        return [];
    }
}
