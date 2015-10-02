<?php

namespace DsCorp\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Bundle\UserBundle\Entity\file;
use DsCorp\Bundle\UserBundle\Form\fileType;

/**
 * file controller.
 *
 */
class fileController extends Controller
{

    /**
     * Lists all file entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:file')->findAll();

        return $this->render('UserBundle:file:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new file entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new file();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('file_show', array('id' => $entity->getId())));
        }

        return $this->render('UserBundle:file:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a file entity.
     *
     * @param file $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(file $entity)
    {
        $form = $this->createForm(new fileType(), $entity, array(
            'action' => $this->generateUrl('file_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new file entity.
     *
     */
    public function newAction()
    {
        $entity = new file();
        $form   = $this->createCreateForm($entity);

        return $this->render('UserBundle:file:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a file entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:file')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find file entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:file:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing file entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:file')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find file entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:file:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a file entity.
    *
    * @param file $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(file $entity)
    {
        $form = $this->createForm(new fileType(), $entity, array(
            'action' => $this->generateUrl('file_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing file entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:file')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find file entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('file_edit', array('id' => $id)));
        }

        return $this->render('UserBundle:file:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a file entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:file')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find file entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('file'));
    }

    /**
     * Creates a form to delete a file entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('file_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
