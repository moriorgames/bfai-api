<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class BattleController
{
    public function get(?string $token)
    {
        
        return new JsonResponse([
            'method' => 'GET',
            'status' => true,
        ]);
    }

    public function create(Request $request)
    {
        return new JsonResponse([
            'method' => 'POST',
            'status' => true,
        ]);
    }
}
