<?php

namespace ApiBundle\Controller;

use ApiBundle\Entity\PointLocation;
use ApiBundle\Entity\Points;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/")
 */
class PointsController extends Controller
{
    /**
     * @Route("/point_status/long/{long}/lat/{lat}")
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
     * @Route("/points/long/{long}/lat/{lat}")
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

    /**
     * @Route("/suggest_point")
     * @Method("POST")
     * @Template
     */
    public function suggestPointAction(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();

        try {
            $lat  = $request->get('lat');
            $long = $request->get('long');
            $name = $request->get('name');

            $location = new PointLocation($long, $lat);
            $entityManager->persist($location);

            $point = new Points();
            $point->setName($name);
            $point->setLocation($location);

            $validator = $this->get('validator');
            $errors = $validator->validate($point);

            if (count($errors) == 0) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($point);
                $entityManager->flush();

                return new JsonResponse(['message' => 'point were suggested and will be checked by moderator']);
            }

            return new JsonResponse(['message' => $errors[0]->getMessage()], 400);

        } catch ( \Exception $e ) {
            return new JsonResponse(['message' => 'Failed to save point'], 500);
        }
    }
}