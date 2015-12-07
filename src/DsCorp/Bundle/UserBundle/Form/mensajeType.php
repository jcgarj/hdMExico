<?php

namespace DsCorp\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class mensajeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('subjet')
            ->add('body')
            ->add('fromUser')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Bundle\UserBundle\Entity\mensaje'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_bundle_userbundle_mensaje';
    }
}
