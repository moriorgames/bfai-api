<?php

namespace App\UseCase\Battle;

use App\Repository\BattleRepository;
use App\Repository\UserRepository;
use App\Services\BattleJsonTransformer;
use App\Services\TokenValidator;
use Ramsey\Uuid\Uuid;

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

            $uuid4 = Uuid::uuid4();
            $json = '{"battleToken":"' . $uuid4->toString() . '", "userToken":"' . $userToken . '", "online":false,"heroes":[{"userToken":"","side":"local","battleHeroId":1,"heroId":1,"x":-8,"y":0},{"userToken":"","side":"visitor","battleHeroId":2,"heroId":1,"x":8,"y":0},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":3,"heroId":2,"x":-8,"y":2},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":4,"heroId":3,"x":-7,"y":1},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":5,"heroId":4,"x":-7,"y":-1},{"userToken":"0552d012-3ba5-46de-b1de-1584626d80c4","side":"local","battleHeroId":6,"heroId":5,"x":-8,"y":-2},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":7,"heroId":5,"x":8,"y":2},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":8,"heroId":3,"x":7,"y":1},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":9,"heroId":3,"x":7,"y":-1},{"userToken":"8deb58ce-f3f0-41f5-89bb-11b89ab49f06","side":"visitor","battleHeroId":10,"heroId":4,"x":8,"y":-2}],"skillsHeroes":[{"battleHeroId":4,"skillId":7},{"battleHeroId":6,"skillId":7}]}';
            //$battle = (new BattleJsonTransformer)->transform($json);
            //var_dump($battle); die;
            $this->battleRepo->persistBattle($userToken, $json);
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
