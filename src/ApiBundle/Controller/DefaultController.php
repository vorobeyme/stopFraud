<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        echo "1212";
        return $this->render('ApiBundle:Default:index.html.twig', array('name' => $name));
    }
}
