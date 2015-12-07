<?php

namespace HdCarrito\Carrito\CartBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class itemCartType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad')
            ->add('cantidadPedido')
            ->add('precioU')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HdCarrito\Carrito\CartBundle\Entity\itemCart'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hdcarrito_carrito_cartbundle_itemcart';
    }
}
