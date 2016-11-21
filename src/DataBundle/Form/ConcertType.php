<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcertType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')
                ->add('location', 'entity', array(
                    'class' => 'DataBundle:Location',
                    'choice_label' => 'name',
                ))
                ->add('band', 'entity', array(
                    'class' => 'DataBundle:Band',
                    'choice_label' => 'name',
                ))
                ->add('save', 'submit', array(
                    'attr' => array('class' => 'submit')))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DataBundle\Entity\Concert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'databundle_concert';
    }

}
