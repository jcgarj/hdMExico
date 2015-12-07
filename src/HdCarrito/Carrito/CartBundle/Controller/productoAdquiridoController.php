<?php

namespace HdCarrito\Carrito\CartBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HdCarrito\Carrito\CartBundle\Entity\productoAdquirido;
use HdCarrito\Carrito\CartBundle\Form\productoAdquiridoType;

/**
 * productoAdquirido controller.
 *
 */
class productoAdquiridoController extends Controller
{

    /**
     * Lists all productoAdquirido entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CartBundle:productoAdquirido')->findAll();

        return $this->render('CartBundle:productoAdquirido:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new productoAdquirido entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new productoAdquirido();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('productoadquirido_show', array('id' => $entity->getId())));
        }

        return $this->render('CartBundle:productoAdquirido:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a productoAdquirido entity.
     *
     * @param productoAdquirido $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(productoAdquirido $entity)
    {
        $form = $this->createForm(new productoAdquiridoType(), $entity, array(
            'action' => $this->generateUrl('productoadquirido_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new productoAdquirido entity.
     *
     */
    public function newAction()
    {
        $entity = new productoAdquirido();
        $form   = $this->createCreateForm($entity);

        return $this->render('CartBundle:productoAdquirido:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a productoAdquirido entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:productoAdquirido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find productoAdquirido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CartBundle:productoAdquirido:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing productoAdquirido entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:productoAdquirido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find productoAdquirido entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CartBundle:productoAdquirido:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a productoAdquirido entity.
    *
    * @param productoAdquirido $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(productoAdquirido $entity)
    {
        $form = $this->createForm(new productoAdquiridoType(), $entity, array(
            'action' => $this->generateUrl('productoadquirido_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing productoAdquirido entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CartBundle:productoAdquirido')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find productoAdquirido entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('productoadquirido_edit', array('id' => $id)));
        }

        return $this->render('CartBundle:productoAdquirido:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a productoAdquirido entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CartBundle:productoAdquirido')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find productoAdquirido entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('productoadquirido'));
    }

    /**
     * Creates a form to delete a productoAdquirido entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productoadquirido_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
