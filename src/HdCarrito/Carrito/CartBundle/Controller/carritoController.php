<?php

namespace HdCarrito\Carrito\CartBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 

use HdCarrito\Carrito\CartBundle\Entity\carrito;
use HdCarrito\Carrito\CartBundle\Form\carritoType;

/**
 * carrito controller.
 *
 */
class carritoController extends Controller
{

    /**
     * Lists all carrito entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartBundle:carrito')->findAll();

        return $this->render('CartBundle:carrito:ViewCart.html.twig', array(
            'entities' => $entities,
        ));
    }

     /**
     * revisar si el usuario esta logueado.
     *
     */
    public function revisarAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //$items = $em->getRepository('administradorBundle:template')->findCategorias();
        //print_r($user);
        if($user=='anon.'){
           $entity = new usuario();
           $form   = $this->CreateFormUser($entity);
           if (!session_id()) {
               session_start();
            }
           $sessionID = session_id();
           $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID));        
           $line=$em->getRepository('AdminProdBundle:admonProd')->findAllBycart($carrito->getId());
           return $this->render('UserCarritoBundle:new.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),'id'=> $carrito->getId(),
                'error' => '', 
                'categorias'  => $items, 
                'carrito' => $carrito,
                'totalitems' => count($line),'cartLines'=>$line,            
           ));
          
        }else{              

            return $this->redirect($this->generateUrl('perfil_usuario_direccion', array('id' => $id)));
        }  
    }

    /*cierre de revisar si esta logeado*/

    /**
     * mensaje de que su registro esta correcto.
     *
     */
    public function registroAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $items = $em->getRepository('AdminProdBundle:template')->findCategorias();
        //print_r($user);
        
        if($user=='anon.'){
           $entity = new usuario();
           $form   = $this->CreateFormUser($entity);
           if (!session_id()) {
               session_start();
            }
           $sessionID = session_id();
           $carrito = $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID));        
           $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($carrito->getId());
           return $this->render('AdminProdBundle:show.html.twig', array(
                'entity' => $entity,
                'form'   => $form->createView(),'id'=>$id,
                'carrito' => '',
                'error' => '', 
                'categorias'  => $items, 
                'carrito' => $carrito,
                'totalitems' => count($line),'cartLines'=>$line,                
           ));
          
        }else{              

            return $this->redirect($this->generateUrl('perfil_usuario_direccion', array('id' => $id)));
        }
    }

    /* cierre de mensaje*/


    public function adduserAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if($user=='anon.'){
          return $this->render('CartBundle:carrito:vacio.html.twig', array(                
                //'delete_form' => $deleteForm->createView(),
            ));
          
        }else{
          $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
          $entity = $em->getRepository('CartBundle:carrito')->find($id);
          $carritoanterior = $em->getRepository('CartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));
            if (!$carritoanterior) {
                $elid=$entity->getId();
                $entity->setUsuario($usuario);    
                $em->persist($entity);
                $em->flush();
                $elid=$entity->getId();

            }else{
                $line=$em->getRepository('CartBundle:itemCarrito')->findBy(array('carrito'=>$entity));
                foreach ($line as $key ) {                   
                        $key->setCarrito($carritoanterior);
                        $em->persist($key);
                        $em->flush();                   
                }
                $em->remove($entity);
                $em->flush();
                $elid=$carritoanterior->getId();
            }
            
            return $this->redirect($this->generateUrl('perfil_usuario_direccion', array('id' => $elid)));
                
        }
    }


    /**
     * Creates a new carrito entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new carrito();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('Carrito_show', array('id' => $entity->getId())));
        }

        return $this->render('CartBundle:carrito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a carrito entity.
     *
     * @param carrito $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(carrito $entity)
    {
        $form = $this->createForm(new carritoType(), $entity, array(
            'action' => $this->generateUrl('carrito_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new carrito entity.
     *
     */
    public function newAction()
    {
        $entity = new carrito();
        $form   = $this->createCreateForm($entity);

        return $this->render('CartBundle:carrito:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a carrito entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
       
       
        if($user=='anon.'){
            if (!session_id()) {
               session_start();
            }
            $sessionID = session_id();
            $entity = $em->getRepository('CartBundle:carrito')->findOneBy(array('id'=>$id,'llave'=>$sessionID));        
            $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($entity->getId());
            return $this->render('AdminProdBundle:ViewCart_show.html.twig', array(
                'entity'      => $entity,
                'carrito' => $entity,
                'cartLines'   =>$line,
                'error'   =>'',
                'totalItemNumber'=>count($line),
                'totalitems'=>count($line),
                //'delete_form' => $deleteForm->createView(),
            ));
        }else{
             $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
             $entity = $em->getRepository('CartBundle:carrito')->findOneBy(array('status'=>1,'usuario'=>$usuario));        
             $line=$em->getRepository('AdminProdBundle:adminProd')->findAllBycart($entity->getId());
             $masked = "C|$id|hola|".$user->getId();
             $masked = base64_encode($masked);
             $masked = urlencode($masked);
             $masked = preg_replace('/=$/','',$masked);
             $masked = preg_replace('/=$/','',$masked);
             return $this->render('AdminProdBundle:ViewCart_show.html.twig', array(
                'entity'      => $entity,
                'cartLines'   =>$line,
                'carrito' => $entity,
                'error'   =>'',
                'totalItemNumber'=>count($line),'masked'=>$masked,
                'totalitems'=>count($line),
                //'delete_form' => $deleteForm->createView(),
            ));     

        }

    }

    /**
     * Displays a form to edit an existing carrito entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:carrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find carrito entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CartBundle:carrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a carrito entity.
    *
    * @param carrito $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(carrito $entity)
    {
        $form = $this->createForm(new carritoType(), $entity, array(
            'action' => $this->generateUrl('carrito_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing carrito entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:carrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find carrito entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('carrito_edit', array('id' => $id)));
        }

        return $this->render('CartBundle:carrito:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a carrito entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartBundle:carrito')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find carrito entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('carrito'));
    }

    /**
     * Creates a form to delete a carrito entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('carrito_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function CreateFormUser(usuario $entity)
    {
        $form = $this->createForm(new usuarioType(), $entity, array(
            'action' => $this->generateUrl('perfil_usuario_create'),
            'method' => 'POST',
        ));

        $form->add('Guardar', 'submit', array('label'=>'','attr' => array('class' => 'btn btn-primary')));

        return $form;
    }
}
