<?php

namespace App\UseCase\Battle;

use App\DTO\Battle;
use App\DTO\User;
use App\Repository\BattleRepository;
use App\Repository\UserRepository;
use App\Services\BattleJsonTransformer;
use App\Services\BattleMergerBySide;
use App\Services\TokenValidator;

class StartBattleForUser
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

            $battleArray = $this->getExistingBattle($userToken);
            if ($battleArray === []) {
                $battleArray = $this->joinToWaitingBattle($userToken, $json);
            }
            if ($battleArray === []) {
                $battleArray = $this->createBattle($userToken, $json);
            }

            return $battleArray;
        }

        return [];
    }

    private function getExistingBattle(string $userToken): array
    {
        $userData = $this->userRepo->find($userToken);
        if ($userData === []) {

            return [];
        }

        return $this->battleRepo->find($userData['battleToken']);
    }

    private function joinToWaitingBattle(string $userToken, string $json): array
    {
        $localBattle = $this->battleRepo->findActiveBattle();
        if ($localBattle instanceof Battle) {

            $visitorBattle = (new BattleJsonTransformer)->transform($userToken, $json);
            $battle = (new BattleMergerBySide)->merge($localBattle, $visitorBattle);
            $this->battleRepo->persist($battle);

            $this->relateBattleToUser($userToken, $battle);

            return $battle->toArray();
        }

        return [];
    }

    private function createBattle(string $userToken, string $json): array
    {
        $battle = (new BattleJsonTransformer)->transform($userToken, $json);
        $this->battleRepo->persist($battle);

        $this->relateBattleToUser($userToken, $battle);

        return $battle->toArray();
    }

    private function relateBattleToUser(string $userToken, Battle $battle): void
    {
        $user = new User($userToken, $battle->getBattleToken());
        $this->userRepo->persist($user);
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
