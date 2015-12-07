<?php

namespace HdCarrito\Carrito\AdminProdBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
        //return $this->render('AdminProdBundle:Default:index.html.twig', array('name' => $name));
        $topProductosb = $em->getRepository('AdminProdBundle:adminProd')->findAllProducto();

        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user=='anon.'){
            if (!session_id()) {
               session_start();
            }
            $sessionID = session_id();
            $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID));            
        }else{
             $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
             $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));           
        }
        if(!$carrito){
             $carrito=array('id'=>0);
             $line=array();
        }else{
             $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($carrito->getId());
        }

        return $this->render('CartBundle:ViewCart:index.html.twig', array(
            'entit'      => '',
           // 'topProductos'=>json_decode($topProductos,true),
            'topProductosb'=>$topProductosb,
            'totalitems' => count($line),
            'cartLines'=>$line,
        ));
    
    }


public function productoAction($id,$nombre)
    {    	
        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('AdminProdBundle:adminProd')->find($id);
        $datos = $em->getRepository('AdminProdBundle:adminProd')->findProducto($productos->getSubcategoria());
        $toPro=count($datos);
        $lim=3;$lim2=0;
        for($i=0;$i<2;$i++){
        	for($j=$lim2;$j<$lim;$j++){
            if($j<$toPro){
          		if(count($datos[$j])>0){
          			$res[$i][]=$datos[$j];
               // unset($datos[$j]);
          		}
            }
        	}
          $lim+=3;$lim2=3;
        }
        //print_r($productos);
        $ofertas = $em->getRepository('AdminProdBundle:adminProd')->findProducto($productos->getSubcategoria());
        //$ofertas=$em->getRepository('administradorBundle:template')->findBy(1);
        //print_r( $entity);
        $user = $this->container->get('security.context')->getToken()->getUser();
       if($user=='anon.'){
            if (!session_id()) {
               session_start();
            }
            $sessionID = session_id();
            $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID));            
        }else{
             $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
             $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));           
        }
        if(!$carrito){
             $carrito=array('id'=>0);
             $line=array();
        }else{
             $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($carrito->getId());
        }

        return $this->render('AdminProdBundle:carrito:index.html.twig', array(
            'entity'      => '',
            'producto'  => $productos,
            'carrito' => $carrito,
            'totalitems' => count($line),
            'cartLines'=>$line,
        ));       
		
    }
     public function pagoAction()
    {
       $em = $this->getDoctrine()->getManager();

        
      //    $slider = $em->getRepository('administradorBundle:pagina')->findOneBy(array('tipo' => 1));

          $user = $this->container->get('security.context')->getToken()->getUser();
        if($user=='anon.'){
            if (!session_id()) {
               session_start();
            }
            $sessionID = session_id();
            $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID));            
        }else{
             $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
             $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));           
        }
        if(!$carrito){
             $carrito=array('id'=>0);
             $line=array();
        }else{
             $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($carrito->getId());
        }
       return $this->render('AdminProdBundle:lian:pagos.html.twig', array(
            'entity'      => '',
          // 'slider'      => $slider,
            'carrito' => $carrito,
            'totalitems' => count($line),'cartLines'=>$line,
        ));    
    }

}