<?php

namespace DataBundle\Form\Api;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DataBundle\Form\MediaType;

class ApiBandType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name', 'text', [
        // readonly if we're in edit mode
        'disabled' => $options['is_edit']
        ])
        ->add('genre', 'text')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'DataBundle\Entity\Band',
                 'is_edit' => false,
                'csrf_protection'   => false,
                'allow_extra_fields' => true
                ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }

}
