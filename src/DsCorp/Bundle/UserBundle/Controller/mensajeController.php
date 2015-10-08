<?php

namespace DsCorp\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Bundle\UserBundle\Entity\mensaje;
use DsCorp\Bundle\UserBundle\Form\mensajeType;

/**
 * mensaje controller.
 *
 */
class mensajeController extends Controller
{

    /**
     * Lists all mensaje entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:mensaje')->findAll();

        return $this->render('UserBundle:mensaje:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new mensaje entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new mensaje();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('mensaje_show', array('id' => $entity->getId())));
        }

        return $this->render('UserBundle:mensaje:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a mensaje entity.
     *
     * @param mensaje $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(mensaje $entity)
    {
        $form = $this->createForm(new mensajeType(), $entity, array(
            'action' => $this->generateUrl('mensaje_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new mensaje entity.
     *
     */
    public function newAction()
    {
        $entity = new mensaje();
        $form   = $this->createCreateForm($entity);

        return $this->render('UserBundle:mensaje:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a mensaje entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mensaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:mensaje:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing mensaje entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mensaje entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:mensaje:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a mensaje entity.
    *
    * @param mensaje $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(mensaje $entity)
    {
        $form = $this->createForm(new mensajeType(), $entity, array(
            'action' => $this->generateUrl('mensaje_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing mensaje entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:mensaje')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find mensaje entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('mensaje_edit', array('id' => $id)));
        }

        return $this->render('UserBundle:mensaje:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a mensaje entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:mensaje')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find mensaje entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('mensaje'));
    }

    /**
     * Creates a form to delete a mensaje entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('mensaje_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
