<?php

namespace HdCarrito\Carrito\AdminProdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class admonProdType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('contenido')
            ->add('precio')
            ->add('precioAnte')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HdCarrito\Carrito\AdminProdBundle\Entity\admonProd'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hdcarrito_carrito_adminprodbundle_admonprod';
    }
}
