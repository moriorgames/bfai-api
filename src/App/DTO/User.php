<?php

namespace App\DTO;

class User
{
    private $userToken;

    private $battleToken;

    public function __construct(string $userToken, string $battleToken)
    {
        $this->userToken = $userToken;
        $this->battleToken = $battleToken;
    }

    public function getUserToken(): string
    {
        return $this->userToken;
    }

    public function getBattleToken(): string
    {
        return $this->battleToken;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function toArray(): array
    {
        return [
            'userToken'   => $this->userToken,
            'battleToken' => $this->battleToken,
        ];
    }
}
