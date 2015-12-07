<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use HdCarrito\Carrito\UserCarritoBundle\Entity\pais;
use HdCarrito\Carrito\UserCarritoBundle\Form\paisType;

/**
 * pais controller.
 *
 */
class paisController extends Controller
{

    /**
     * Lists all pais entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserCarritoBundle:pais')->findAll();

        return $this->render('UserCarritoBundle:pais:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new pais entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new pais();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('pais_show', array('id' => $entity->getId())));
        }

        return $this->render('UserCarritoBundle:pais:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a pais entity.
     *
     * @param pais $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(pais $entity)
    {
        $form = $this->createForm(new paisType(), $entity, array(
            'action' => $this->generateUrl('pais_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new pais entity.
     *
     */
    public function newAction()
    {
        $entity = new pais();
        $form   = $this->createCreateForm($entity);

        return $this->render('UserCarritoBundle:pais:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pais entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:pais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserCarritoBundle:pais:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pais entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:pais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pais entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserCarritoBundle:pais:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a pais entity.
    *
    * @param pais $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(pais $entity)
    {
        $form = $this->createForm(new paisType(), $entity, array(
            'action' => $this->generateUrl('pais_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing pais entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserCarritoBundle:pais')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find pais entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('pais_edit', array('id' => $id)));
        }

        return $this->render('UserCarritoBundle:pais:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a pais entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserCarritoBundle:pais')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find pais entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('pais'));
    }

    /**
     * Creates a form to delete a pais entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pais_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
