<?php

namespace App\Services;

use App\Definitions\Token;

class TokenValidator
{
    public function validate(string $token): bool
    {
        return Token::LENGTH === strlen($token);
    }
}
