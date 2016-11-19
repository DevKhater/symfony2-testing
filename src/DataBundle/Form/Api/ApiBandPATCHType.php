<?php

namespace DataBundle\Form\Api;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ApiBandPATCHType extends ApiBandType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        // override this!
        $resolver->setDefaults(['is_edit' => true]);
        //$resolver->setDefaults(['data_class' => null ]);
        $resolver->setDefaults(['csrf_protection'   => false,'allow_extra_fields' => true]);
    }        

    /**
     * @return string
     */
    public function getName()
    {
        return '';
    }

}
