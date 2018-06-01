<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class BattleController
{
    public function get()
    {
        return new JsonResponse([
            'status' => true
        ]);
    }
}
