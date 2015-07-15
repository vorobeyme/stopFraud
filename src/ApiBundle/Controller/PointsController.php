<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PointsController extends Controller
{
    public function getPointStatusAction(Request $request)
    {
        $request = $request->attributes->all();

        return new JsonResponse([
            'status' => 1
        ]);
    }
}