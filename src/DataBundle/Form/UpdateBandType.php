<?php

namespace DataBundle\Form;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UpdateBandType extends BandType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        // override this!
        //$resolver->setDefaults(['is_edit' => true]);
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
