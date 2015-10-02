<?php

namespace DsCorp\Bundle\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DsCorp\Bundle\UserBundle\Entity\User;
use DsCorp\Bundle\UserBundle\Form\UserType;

/**
 * User controller.
 *
 */
class UserController extends Controller
{

    /**
     * Lists all User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $entities = $em->getRepository('UserBundle:User')->findAll();

        return $this->render('UserBundle:User:index.html.twig', array(
            'entities' => $entities,
            'usuario' => $usuario,
        ));
    }
    /**
     * Creates a new User entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new User();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $em = $this->getDoctrine()->getManager();
        if ($form->isValid()) {
            
            if($user=='anon.'){
                 $user=0;          
            }else{
                 $user= $em->getRepository('escuelaBundle:User')->find($user->getId());                   
            }
            
            $entity->setDateCreate(new \DateTime("now"));
            $entity->setUserCreate($user);
            $this->setSecurePassword($entity);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_show', array('id' => $entity->getId())));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Creates a form to create a User entity.
     *
     * @param User $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new User entity.
     *
     */
    public function newAction()
    {
        $entity = new User();
        $form   = $this->createCreateForm($entity);

        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $em = $this->getDoctrine()->getManager();
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }

        return $this->render('UserBundle:User:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Finds and displays a User entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:User:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
     * Displays a form to edit an existing User entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UserBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }

    /**
    * Creates a form to edit a User entity.
    *
    * @param User $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(User $entity)
    {
        $form = $this->createForm(new UserType(), $entity, array(
            'action' => $this->generateUrl('user_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing User entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UserBundle:User')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find User entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $user = $this->container->get('security.context')->getToken()->getUser();
            if($user=='anon.'){
                 $user=0;          
            }else{
                 $user= $em->getRepository('UserBundle:User')->find($user->getId());                   
            }
            $entity->setDateUpdate(new \DateTime("now"));
            $entity->setUserUpdate($user->getId());
            $this->setSecurePassword($entity);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('user_edit', array('id' => $id)));
        }
        $user = $this->container->get('security.context')->getToken()->getUser();
        if($user!='anon.'){
             $usuario= $em->getRepository('UserBundle:User')->find($user->getId());                   
        }
        return $this->render('UserBundle:User:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'usuario' => $usuario,
        ));
    }
    /**
     * Deletes a User entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:User')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('user'));
    }

     /**
     * Deletes a User entity.
     *
     */
    public function lostPassAction()
    {
        $user=new User();
        $form = $this->createFormBuilder($user)
            ->setAction($this->generateUrl('user_sendRecovery'))
            ->setMethod('POST')
            ->add('userName')
            ->add('save', 'submit')
            ->getForm();
        return $this->render('UserBundle:User:lostPass.html.twig', array(
            'form' => $form->createView(),
        ));
    }

     /**
     * Deletes a User entity.
     *
     */
    public function sendPassAction(Request $request)
    {
        $user=new User();
        $form = $this->createFormBuilder($user)
            ->setAction($this->generateUrl('user_sendRecovery'))
            ->setMethod('POST')
            ->add('userName')
            ->add('save', 'submit')
            ->getForm();
        $form->handleRequest($request);

        if ($form->isValid()) {
            echo 'no';
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UserBundle:User')->findOneBy(
                                                                    array('userName' => $user->getUserName())
                                                                );

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find User entity.');
            }
            if($entity->getPerfil()){

                $body=$this->renderView('UserBundle:User:mailPass.html.twig',
                    array('token' => $entity->getSalt()));
                $message = \Swift_Message::newInstance()
                    ->setContentType('text/html')
                    ->setSubject('Recupere su contraseña')
                    ->setFrom('soporte@sisnet.mx')
                    ->setTo($entity->getPerfil()->getEmail() )
                    ->setBody( $body);
                $this->get('mailer')->send($message);
            }

        }

 //return $this->render('UserBundle:User:error.html.twig');
       return $this->redirect($this->generateUrl('user'));
    }


    /**
     * Deletes a User entity.
     *
     */
    public function recoveryMailAction($token)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('UserBundle:User')->findOneBy( array('salt' => $token));

        if ($entity) {
                $form = $this->createFormBuilder($entity)
                    ->setAction($this->generateUrl('user_resetPass'))
                    ->setMethod('POST')
                    ->add('password', 'repeated', array(
                            'type' => 'password',
                            'invalid_message' => 'Los paswords no coinciden.',
                            'options' => array('attr' => array('class' => 'input-xlarge','minlength'=>8)),
                            'required' => true,
                            'first_options'  => array('label' => 'Password'),
                            'second_options' => array('label' => 'Repite password')))
                    ->add('salt', 'hidden')            
                    ->add('save', 'submit')
                    ->getForm();
                return $this->render('UserBundle:User:resetPass.html.twig', array(
                    'form' => $form->createView(),
                ));
        }
        return $this->redirect($this->generateUrl('user'));
    }

  /**
     * Deletes a User entity.
     *
     */
    public function resetPassAction(Request $request)
    {
       // print_r($request);
        $em = $this->getDoctrine()->getManager();
        $form=$request->request->get('form',0);
        if(count($form)>0){

            $entity = $em->getRepository('UserBundle:User')->findOneBy( array('salt' =>$form['salt']));
            $form = $this->createFormBuilder($entity)                    
                        ->add('password', 'repeated', array(
                                'type' => 'password',
                                'invalid_message' => 'Los paswords no coinciden.',
                                'options' => array('attr' => array('class' => 'input-xlarge','minlength'=>8)),
                                'required' => true,
                                'first_options'  => array('label' => 'Password'),
                                'second_options' => array('label' => 'Repite password')))
                        ->add('salt', 'hidden')            
                        ->add('save', 'submit')
                        ->getForm();
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->setSecurePassword($entity);
                $em->persist($entity);
                $em->flush();
            }
        }
        return $this->redirect($this->generateUrl('user'));
    }
    /**
     * Creates a form to delete a User entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('user_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }

    private function setSecurePassword(&$entity) {
        $entity->setSalt(md5(time()));
        $encoder = new \Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder('sha512', true, 10);
        $password = $encoder->encodePassword($entity->getPassword(), $entity->getSalt());
        $entity->setPassword($password);
    }
}
