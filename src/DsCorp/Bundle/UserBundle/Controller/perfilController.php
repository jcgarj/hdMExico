<?php

namespace DsCorp\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Bundle\UserBundle\Entity\perfil;
use DsCorp\Bundle\UserBundle\Form\perfilType;

/**
 * perfil controller.
 *
 */
class perfilController extends Controller
{

    /**
     * Lists all perfil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('UserBundle:perfil')->findAll();

        return $this->render('UserBundle:perfil:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new perfil entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new perfil();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
            if($user=='anon.'){
                 $user=0;          
            }else{
                $user= $em->getRepository('UserBundle:User')->find($user->getId());                   
            
                if ($form->isValid()) {        
                    
                    $entity->getFile()->setMetatags(urlencode($entity->getName()));
                    $entity->getFile()->upload('perfil');
                    $em->persist($entity);
                    $em->flush();
                    //$entity->getId();
                    $user->setPerfil($entity);
                    $em->persist($user);
                    $em->flush();
                    return $this->redirect($this->generateUrl('perfil_show', array('id' => $entity->getId())));
                }
            }

        return $this->render('UserBundle:perfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a perfil entity.
     *
     * @param perfil $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(perfil $entity)
    {
        $form = $this->createForm(new perfilType(), $entity, array(
            'action' => $this->generateUrl('perfil_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new perfil entity.
     *
     */
    public function newAction()
    {
        $entity = new perfil();
        $form   = $this->createCreateForm($entity);

        return $this->render('UserBundle:perfil:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a perfil entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find perfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:perfil:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing perfil entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find perfil entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:perfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a perfil entity.
    *
    * @param perfil $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(perfil $entity)
    {
        $form = $this->createForm(new perfilType(), $entity, array(
            'action' => $this->generateUrl('perfil_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing perfil entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:perfil')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find perfil entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('perfil_edit', array('id' => $id)));
        }

        return $this->render('UserBundle:perfil:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a perfil entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:perfil')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find perfil entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('perfil'));
    }

    /**
     * Creates a form to delete a perfil entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('perfil_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
