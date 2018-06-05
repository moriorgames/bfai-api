<?php

namespace App\DTO;

class Battle
{
    private $userToken;

    private $data;

    public function __construct(string $userToken, array $data)
    {
        $this->userToken = $userToken;
        $this->data = $data;
    }

    public function getUserToken(): string
    {
        return $this->userToken;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
