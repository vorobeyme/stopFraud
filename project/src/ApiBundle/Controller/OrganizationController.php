<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use FOS\RestBundle\Controller\FOSRestController;

/**
 * @Route("/organization")
 */
class OrganizationController extends FOSRestController
{
    /**
     * @Route("/list")
     * @Method("GET")
     * @Template
     */
    public function getOrganizationsAction()
    {
        $organizations = $this->getDoctrine()->getManager()
            ->getRepository('ApiBundle:Organization')
            ->findAllOrderByName();

        return new JsonResponse($organizations);
    }

    /**
     * @Route("/{id}")
     * @Method("GET")
     * @Template
     */
    public function getOrganizationAction(Request $request)
    {
        $id = (int)$request->attributes->get('id');

        $organization = $this->getDoctrine()->getManager()
            ->getRepository('ApiBundle:Organization')
            ->findById($id);

        return new JsonResponse($organization);
    }

}