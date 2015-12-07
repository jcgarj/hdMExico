<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apPat')
            ->add('apMat')
            ->add('correo')
            ->add('password')
            ->add('cPassword')
            ->add('razonSocial')
            ->add('rfc')
            ->add('rTributario')
            ->add('calle')
            ->add('noExt')
            ->add('noInt')
            ->add('colonia')
            ->add('cPostal')
            ->add('pais')
            ->add('estado')
            ->add('dele_muni')
            ->add('localidad')
            ->add('telefono')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'hdcarrito_carrito_usercarritobundle_usuario';
    }
}
