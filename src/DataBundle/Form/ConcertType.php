<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
<<<<<<< HEAD
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;

=======
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde

class ConcertType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
<<<<<<< HEAD
        $builder->add('date', BirthdayType::class, array(
    'widget' => 'choice',
))
=======
        $builder->add('date')
>>>>>>> ba093632385595688f4a8086394e5b24bb7f2cde
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
