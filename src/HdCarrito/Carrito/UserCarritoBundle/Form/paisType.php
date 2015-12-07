<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class paisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pais')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HdCarrito\Carrito\UserCarritoBundle\Entity\pais'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hdcarrito_carrito_usercarritobundle_pais';
    }
}
