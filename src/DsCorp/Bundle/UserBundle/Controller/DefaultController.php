<?php

namespace DsCorp\Bundle\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function headerAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        
        return $this->render('::header.html.twig', array(
            'usuario' => $usuario,           
        ));
    }
}
