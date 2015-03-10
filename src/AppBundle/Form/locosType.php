<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class locosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('locoNo', 'text', array(
                'required'  => true,
            ))
            ->add('name', 'text', array(
                'required'  => FALSE,
            ))
            ->add('operationalStatus', 'choice', array(
                'placeholder' => 'Choose a Status',
                'choices'   => array(
                    'operational' => 'Operational',
                    'maintenance' => 'Maintenance',
                    'stored'      => 'Stored',
                    'restoration' => 'Under Restoration',
                    ),
                'multiple'  => false,
                'required'  => true,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\locos'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_locos';
    }
}
