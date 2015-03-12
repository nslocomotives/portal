<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class LocoRosterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role','choice', array(
                'choices' => array('loco_top_1', 'loco_top_2','tail_1','tail_2'),
            ))
            ->add('timetable')
            ->add('locos')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\LocoRoster'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'appbundle_locoroster';
    }
}
