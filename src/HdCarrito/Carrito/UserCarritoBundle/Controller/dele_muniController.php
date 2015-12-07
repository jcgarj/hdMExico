<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni;
use HdCarrito\Carrito\UserCarritoBundle\Form\dele_muniType;

/**
 * dele_muni controller.
 *
 */
class dele_muniController extends Controller
{

    /**
     * Lists all dele_muni entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserCarritoBundle:dele_muni')->findAll();

        return $this->render('UserCarritoBundle:dele_muni:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new dele_muni entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new dele_muni();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('dele_muni_show', array('id' => $entity->getId())));
        }

        return $this->render('UserCarritoBundle:dele_muni:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a dele_muni entity.
     *
     * @param dele_muni $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(dele_muni $entity)
    {
        $form = $this->createForm(new dele_muniType(), $entity, array(
            'action' => $this->generateUrl('dele_muni_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new dele_muni entity.
     *
     */
    public function newAction()
    {
        $entity = new dele_muni();
        $form   = $this->createCreateForm($entity);

        return $this->render('UserCarritoBundle:dele_muni:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a dele_muni entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:dele_muni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dele_muni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserCarritoBundle:dele_muni:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing dele_muni entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:dele_muni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dele_muni entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserCarritoBundle:dele_muni:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a dele_muni entity.
    *
    * @param dele_muni $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(dele_muni $entity)
    {
        $form = $this->createForm(new dele_muniType(), $entity, array(
            'action' => $this->generateUrl('dele_muni_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing dele_muni entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:dele_muni')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find dele_muni entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('dele_muni_edit', array('id' => $id)));
        }

        return $this->render('UserCarritoBundle:dele_muni:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a dele_muni entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserCarritoBundle:dele_muni')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find dele_muni entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('dele_muni'));
    }

    /**
     * Creates a form to delete a dele_muni entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('dele_muni_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
