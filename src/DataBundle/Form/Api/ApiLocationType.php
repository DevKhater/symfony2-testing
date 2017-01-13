<?php

namespace DataBundle\Form\Api;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use DataBundle\Form\LocationType;

class ApiLocationType extends LocationType
{

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);
        $resolver->setDefaults(['csrf_protection' => false]);
        $resolver->setDefaults(['allow_extra_fields' => true]);
    }

}
