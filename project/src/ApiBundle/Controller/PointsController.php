<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class PointsController extends Controller
{
    /**
     * @Route("/point_status/long/{long}/lat/{lat}", requirements={"long" = "\d+", "lat" = "\d+"})
     * @Method("GET")
     * @Template
     */
    public function getPointStatusAction(Request $request)
    {
        $long = (int)$request->attributes->get('long');
        $lat  = (int)$request->attributes->get('lat');

        try {
            $pointLocationStatus = $this->getDoctrine()->getManager()
                ->getRepository('ApiBundle:PointLocation')
                ->findValidPoint($long, $lat);

            return new JsonResponse([
                'status' => $pointLocationStatus
            ]);

        } catch (Exception $e) {
            return new JsonResponse(['message' => 'server error']);
        }
    }

    /**
     * @Route("/points/long/{long}/lat/{lat}", requirements={"long" = "\d+", "lat" = "\d+"})
     * @Method("GET")
     * @Template
     */
    public function getPointsAction(Request $request)
    {
        $long = (int)$request->attributes->get('long');
        $lat  = (int)$request->attributes->get('lat');

        try {
            $pointLocationStatus = $this->getDoctrine()->getManager()
                ->getRepository('ApiBundle:PointLocation')
                ->findValidPoints($long, $lat);

            return new JsonResponse($pointLocationStatus);

        } catch (Exception $e) {
            return new JsonResponse(['message' => 'server error']);
        }
    }
}