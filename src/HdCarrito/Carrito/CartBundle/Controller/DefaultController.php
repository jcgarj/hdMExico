<?php

namespace HdCarrito\Carrito\CartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function cartAction()
    {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('CartBundle:carrito')->findAll();
         $line=$em->getRepository('AdminProdBundle:admonProd')->findAll();
       
        return $this->render('CartBundle:carrito:ViewCart.html.twig', array(
            'entities' => $entities,  
            'totalitems' => count($line),         
        ));
    }
}
