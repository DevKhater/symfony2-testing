<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
//use Doctrine\Common\Persistence\ObjectManager;
//use DataBundle\Form\DataTransformer\LocationToSelectTransformer;
//use DataBundle\Form\DataTransformer\BandToSelectTransformer;

class ConcertType extends AbstractType
{

//    private $manager;
//
//    public function __construct(ObjectManager $manager)
//    {
//        $this->manager = $manager;
//    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('date')
                ->add('location', 'entity', array(
                    'class' => 'DataBundle:Location',
                    'choice_label' => 'name',
                ))
                ->add('band','entity', array(
                    'class' => 'DataBundle:Band',
                    'choice_label' => 'name',
                ))
        ;

//        $builder->get('location')
//                ->addModelTransformer(new LocationToSelectTransformer($this->manager));
//        $builder->get('band')
//                ->addModelTransformer(new BandToSelectTransformer($this->manager));
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
