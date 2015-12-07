<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UserCarritoBundle:Default:index.html.twig', array('name' => $name));
    }
}
