<?php

namespace DataBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DataBundle\Form\MediaType;


class customUploadBandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('name', 'text', [
                    // readonly if we're in edit mode
                    'disabled' => $options['is_edit'],
                    'data_class' => null
                ])
                ->add('genre', 'text', array('data_class' => null))
                ->add('image', new MediaType(), array())
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
            'is_edit' => true,
        ));

        /**
         * @return string
         */
    }

    public function getName()
    {
        return 'mk_musicbundle_band_edit';
    }

}
