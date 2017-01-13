<?php

/* @DataBundle/config/services.yml */
class __TwigTemplate_666825a64d254fef46730278f0aacf7f171ee0382d51d90821860fef14243fd2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_3e1350d4cba72d120f1464eebc8cf0900f30ddf85239d3b6910663d308b30e8d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3e1350d4cba72d120f1464eebc8cf0900f30ddf85239d3b6910663d308b30e8d->enter($__internal_3e1350d4cba72d120f1464eebc8cf0900f30ddf85239d3b6910663d308b30e8d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@DataBundle/config/services.yml"));

        // line 1
        echo "parameters:
    upload_directory:           '%kernel.root_dir%/../web/uploads/images'
    upload_prefix_directory:    'uploads/images'
    data.band.class:            'DataBundle\\Entity\\Band'
    data.band.handler.class:    'DataBundle\\Handler\\BandHandler'
    data.concert.class:         'DataBundle\\Entity\\Concert'
    data.concert.handler.class: 'DataBundle\\Handler\\ConcertHandler'
    data.location.class:         'DataBundle\\Entity\\Location'
    data.location.handler.class: 'DataBundle\\Handler\\LocationHandler'
    data.media.class:           'DataBundle\\Entity\\Media'
    data.media.handler.class:   'DataBundle\\Handler\\MediaHandler'

services:
    mkcrud.file.uploader:
        class: DataBundle\\Service\\FileUploader
        arguments: [%upload_directory%, %upload_prefix_directory%]
    mk.doctrine_media_listener:
        class: DataBundle\\EventListener\\MediaUploadListener
        arguments: ['@mkcrud.file.uploader']
        tags:
            - { name: doctrine.event_listener, event: prePersist }
            - { name: doctrine.event_listener, event: preUpdate }
            - { name: doctrine.event_listener, event: postLoad }
    
    data.band.handler:
        class: %data.band.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.band.class%','@form.factory']

    data.concert.handler:
        class: %data.concert.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.concert.class%','@form.factory', '@data.band.handler']
    data.location.handler:
        class: %data.location.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.location.class%','@form.factory']
        
    data.media.handler:
        class: %data.media.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.media.class%', '@form.factory', '@mkcrud.file.uploader']";
        
        $__internal_3e1350d4cba72d120f1464eebc8cf0900f30ddf85239d3b6910663d308b30e8d->leave($__internal_3e1350d4cba72d120f1464eebc8cf0900f30ddf85239d3b6910663d308b30e8d_prof);

    }

    public function getTemplateName()
    {
        return "@DataBundle/config/services.yml";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("parameters:
    upload_directory:           '%kernel.root_dir%/../web/uploads/images'
    upload_prefix_directory:    'uploads/images'
    data.band.class:            'DataBundle\\Entity\\Band'
    data.band.handler.class:    'DataBundle\\Handler\\BandHandler'
    data.concert.class:         'DataBundle\\Entity\\Concert'
    data.concert.handler.class: 'DataBundle\\Handler\\ConcertHandler'
    data.location.class:         'DataBundle\\Entity\\Location'
    data.location.handler.class: 'DataBundle\\Handler\\LocationHandler'
    data.media.class:           'DataBundle\\Entity\\Media'
    data.media.handler.class:   'DataBundle\\Handler\\MediaHandler'

services:
    mkcrud.file.uploader:
        class: DataBundle\\Service\\FileUploader
        arguments: [%upload_directory%, %upload_prefix_directory%]
    mk.doctrine_media_listener:
        class: DataBundle\\EventListener\\MediaUploadListener
        arguments: ['@mkcrud.file.uploader']
        tags:
            - { name: doctrine.event_listener, event: prePersist }
            - { name: doctrine.event_listener, event: preUpdate }
            - { name: doctrine.event_listener, event: postLoad }
    
    data.band.handler:
        class: %data.band.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.band.class%','@form.factory']

    data.concert.handler:
        class: %data.concert.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.concert.class%','@form.factory', '@data.band.handler']
    data.location.handler:
        class: %data.location.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.location.class%','@form.factory']
        
    data.media.handler:
        class: %data.media.handler.class%
        arguments: ['@doctrine.orm.entity_manager','%data.media.class%', '@form.factory', '@mkcrud.file.uploader']", "@DataBundle/config/services.yml", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/config/services.yml");
    }
}
