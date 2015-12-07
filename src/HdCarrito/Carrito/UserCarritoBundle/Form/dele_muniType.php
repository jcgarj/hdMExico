<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class dele_muniType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pais')
            ->add('estado')
            ->add('deleMuni')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hdcarrito_carrito_usercarritobundle_dele_muni';
    }
}
