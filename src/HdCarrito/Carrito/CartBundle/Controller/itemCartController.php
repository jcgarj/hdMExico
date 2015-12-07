<?php

namespace HdCarrito\Carrito\CartBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HdCarrito\Carrito\CartBundle\Entity\itemCart;
use HdCarrito\Carrito\CartBundle\Form\itemCartType;

/**
 * itemCart controller.
 *
 */
class itemCartController extends Controller
{

    /**
     * Lists all itemCart entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartBundle:itemCart')->findAll();

        return $this->render('CartBundle:itemCart:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new itemCart entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new itemCart();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('itemcart_show', array('id' => $entity->getId())));
        }

        return $this->render('CartBundle:itemCart:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a itemCart entity.
     *
     * @param itemCart $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(itemCart $entity)
    {
        $form = $this->createForm(new itemCartType(), $entity, array(
            'action' => $this->generateUrl('itemcart_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

/** accion del carrito**/
public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        //print_r($user);
        if (!session_id()) {
               session_start();
            }
        $sessionID = session_id();
        if($user=='anon.'){            
            $entityCarrito= $em->getRepository('CartBundle:carrito')->findOneBy(array('llave'=>$sessionID,'status'=>1));
            if(!$entityCarrito){
                //echo 'fdsh';
                $entityCarrito = new carrito();
                $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find(2);                
                $entityCarrito->setLlave($sessionID);
                $entityCarrito->setStatus(1);
                $entityCarrito->setUsuario($usuario);               
                $em->persist($entityCarrito);
                $em->flush();
            }
        }else{
            $usuario= $em->getRepository('UserCarritoBundle:Usuario')->find($user->getId());
            $entityCarrito= $em->getRepository('CartBundle:carrito')->findOneBy(array('Usuario'=>$usuario,'status'=>1));
            if(!$entityCarrito){
                $entityCarrito = new carrito();                
                $entityCarrito->setLlave($sessionID);
                $entityCarrito->setStatus(1);
                $entityCarrito->setUsuario($usuario);               
                $em->persist($entityCarrito);
                $em->flush();

            }
            
        }
      //print_r($request);$this->get('request')->request->get
       
     $id= $this->get('request')->request->get('txtProducto');
     if($id>0){
      $producto = $em->getRepository('AdminProdBundle:admonProd')->find($id);
      if($this->get('request')->request->get('txtCantidad',1)=='' ){
        $cantidad=1;
      }else{
         $cantidad=$this->get('request')->request->get('txtCantidad',1);
      }
        
        $entity = new itemCarrito();
        $entity->setCantidad($cantidad);
        $total=$producto->getPrecio()*$cantidad;
        /*$entity->setCantidadPeriodo(1);
        $entity->setRenta($renta);
        $entity->setPeriodo($periodo);*/
        $entity->setTotal($total);
        $entity->setCarrito($entityCarrito);
        $entity->setProductoAdmin($producto);        
        $em->persist($entity);
        $em->flush();
    }
            return $this->redirect($this->generateUrl('carrito_show', array('id' => $entityCarrito->getId())));
    }
/** fin de accion de carrito**/


    /**
     * Displays a form to create a new itemCart entity.
     *
     */
    public function newAction()
    {
        $entity = new itemCart();
        $form   = $this->createCreateForm($entity);

        return $this->render('CartBundle:itemCart:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a itemCart entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:itemCart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCart entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CartBundle:itemCart:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing itemCart entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:itemCart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCart entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CartBundle:itemCart:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a itemCart entity.
    *
    * @param itemCart $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(itemCart $entity)
    {
        $form = $this->createForm(new itemCartType(), $entity, array(
            'action' => $this->generateUrl('itemcart_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing itemCart entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:itemCart')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCart entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('itemcart_edit', array('id' => $id)));
        }

        return $this->render('CartBundle:itemCart:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /* editar carrito start*/
    public function updateajaxAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('cartBundle:itemCarrito')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find itemCarrito entity.');
        }

        if($request->request->get('oper')==1)
        {
           /* $producto=$entity->getProducto();
            $renta= $em->getRepository('dscorpBundle:renta')->find($request->request->get('tiporenta'));
            $precio= $em->getRepository('dscorpBundle:precios')->findOneBy(array('producto' =>$producto , 'renta'=>$renta));
            $entity->setTotal($precio->getPrecio());
            $entity->setRenta($renta);*/
           
        }else{
        /*    $periodo= $em->getRepository('dscorpBundle:periodo')->find($request->request->get('periodo'));
            $entity->setCantidadPeriodo($request->request->get('cantidad'));
            $entity->setPeriodo($periodo);*/

        }
        $em->persist($entity);
        $em->flush();
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('cartBundle:itemCarrito:ajax.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));

    }



    /* fin de carrito editar */


    /**
     * Deletes a itemCart entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartBundle:itemCart')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find itemCart entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('itemcart'));
    }

    /* elimianar toda accion start*/
    public function deleteAllAction( $id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        $sessionID = session_id();
        if($user=='anon.'){            
            $entityCarrito= $em->getRepository('cartBundle:carrito')->findOneBy(array('llave'=>$sessionID,'status'=>1));
        }else{
            $usuario= $em->getRepository('usuarioBundle:usuario')->find($user->getId());
            $entityCarrito= $em->getRepository('cartBundle:carrito')->findOneBy(array('usuario'=>$usuario,'id'=>$id));
        }
        if ($entityCarrito) {
            $line=$em->getRepository('cartBundle:itemCarrito')->findBy(array('carrito'=>$entityCarrito));
            foreach ($line as $key ) {               
                if (!$key) {
                    throw $this->createNotFoundException('Unable to find itemCarrito entity.');
                }

                $em->remove($key);
                $em->flush();
            }
        }

        return $this->redirect($this->generateUrl('productos'));
    }
    /**
     * Creates a form to delete a itemCart entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('itemcart_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}