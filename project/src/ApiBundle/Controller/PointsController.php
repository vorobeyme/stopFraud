<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class PointsController extends Controller
{
    public function getPointStatusAction(Request $request)
    {
        $long = (int)$request->attributes->get('long');
        $lat  = (int)$request->attributes->get('lat');

        $pointLocationStatus = $this->getDoctrine()->getManager()
            ->getRepository('ApiBundle:PointLocation')
            ->findValidPoint($long, $lat);


        return new JsonResponse([
            'status' => $pointLocationStatus
        ]);
    }

    public function getPointsAction(Request $request)
    {
        $long = (int)$request->attributes->get('long');
        $lat  = (int)$request->attributes->get('lat');

        $pointLocationStatus = $this->getDoctrine()->getManager()
            ->getRepository('ApiBundle:PointLocation')
            ->findValidPoints($long, $lat);


        return new JsonResponse([
            'status' => $pointLocationStatus
        ]);
    }}