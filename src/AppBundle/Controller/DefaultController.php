<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        // replace this example code with whatever you need
        return $this->render('AppBundle:base:'.$name.'.html.twig', array());
    }
}
