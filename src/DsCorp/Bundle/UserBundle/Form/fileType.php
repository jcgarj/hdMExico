<?php

namespace DsCorp\Bundle\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class fileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder            
            ->add('file','file', array(
                'attr' => array('id' => 'file-1',
                                'class' => 'file',
                                'data-overwrite-initial' => 'false',
                                'data-min-file-count' => '1'),
                'data_class' => null,
                'property_path' => 'file',
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DsCorp\Bundle\UserBundle\Entity\file'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dscorp_bundle_userbundle_file';
    }
}
