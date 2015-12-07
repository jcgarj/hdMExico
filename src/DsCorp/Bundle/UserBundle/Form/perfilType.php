<?php

namespace DsCorp\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class perfilType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firtsName')
            ->add('lastName')
            ->add('email')
            ->add('telephone')
            ->add('file', new fileType(), array(
                'attr' => array('id' => 'well')
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Bundle\UserBundle\Entity\perfil'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_bundle_userbundle_perfil';
    }
}
