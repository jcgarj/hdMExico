<?php

namespace HdCarrito\Carrito\AdminProdBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HdCarrito\Carrito\AdminProdBundle\Entity\admonProd;
use HdCarrito\Carrito\AdminProdBundle\Form\admonProdType;

/**
 * admonProd controller.
 *
 */
class admonProdController extends Controller
{

    /**
     * Lists all admonProd entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AdminProdBundle:admonProd')->findAll();

        return $this->render('AdminProdBundle:admonProd:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new admonProd entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new admonProd();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admonprod_show', array('id' => $entity->getId())));
        }

        return $this->render('AdminProdBundle:admonProd:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a admonProd entity.
     *
     * @param admonProd $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(admonProd $entity)
    {
        $form = $this->createForm(new admonProdType(), $entity, array(
            'action' => $this->generateUrl('admonprod_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new admonProd entity.
     *
     */
    public function newAction()
    {
        $entity = new admonProd();
        $form   = $this->createCreateForm($entity);

        return $this->render('AdminProdBundle:admonProd:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a admonProd entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminProdBundle:admonProd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find admonProd entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AdminProdBundle:admonProd:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing admonProd entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminProdBundle:admonProd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find admonProd entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AdminProdBundle:admonProd:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a admonProd entity.
    *
    * @param admonProd $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(admonProd $entity)
    {
        $form = $this->createForm(new admonProdType(), $entity, array(
            'action' => $this->generateUrl('admonprod_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing admonProd entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AdminProdBundle:admonProd')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find admonProd entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admonprod_edit', array('id' => $id)));
        }

        return $this->render('AdminProdBundle:admonProd:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a admonProd entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AdminProdBundle:admonProd')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find admonProd entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admonprod'));
    }

    /**
     * Creates a form to delete a admonProd entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admonprod_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
