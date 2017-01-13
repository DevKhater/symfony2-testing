<?php

/* @MKUserBundle/config/services.yml */
class __TwigTemplate_92aa5265c4eee9479375b38d70948f5e181c8c21929c7198bf0f523adaa89bf8 extends Twig_Template
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
        $__internal_4d0328abbd2b280716a30f1033a84a3df9c6b6d78027d4913932da7bfc44de3d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4d0328abbd2b280716a30f1033a84a3df9c6b6d78027d4913932da7bfc44de3d->enter($__internal_4d0328abbd2b280716a30f1033a84a3df9c6b6d78027d4913932da7bfc44de3d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@MKUserBundle/config/services.yml"));

        // line 1
        echo "parameters:
    user.user.class: MK\\UserBundle\\Entity\\User

services:
    mk.user.password_encoder:
        class: MK\\UserBundle\\Security\\Encoder\\PasswordEncoder
    
    mk.user.manager:
        class: MK\\UserBundle\\Handler\\UserHandler
        arguments: ['@doctrine.orm.entity_manager','%user.user.class%', '@security.password_encoder']
            
    mk.user.provider:
        class: MK\\UserBundle\\Security\\Provider\\UserProvider
        arguments: [\"@doctrine.orm.entity_manager\"]        
    
    mk.login.form_authenticator:
        class: MK\\UserBundle\\Security\\Authenticator\\FormLoginAuthenticator
        autowire: true";
        
        $__internal_4d0328abbd2b280716a30f1033a84a3df9c6b6d78027d4913932da7bfc44de3d->leave($__internal_4d0328abbd2b280716a30f1033a84a3df9c6b6d78027d4913932da7bfc44de3d_prof);

    }

    public function getTemplateName()
    {
        return "@MKUserBundle/config/services.yml";
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
    user.user.class: MK\\UserBundle\\Entity\\User

services:
    mk.user.password_encoder:
        class: MK\\UserBundle\\Security\\Encoder\\PasswordEncoder
    
    mk.user.manager:
        class: MK\\UserBundle\\Handler\\UserHandler
        arguments: ['@doctrine.orm.entity_manager','%user.user.class%', '@security.password_encoder']
            
    mk.user.provider:
        class: MK\\UserBundle\\Security\\Provider\\UserProvider
        arguments: [\"@doctrine.orm.entity_manager\"]        
    
    mk.login.form_authenticator:
        class: MK\\UserBundle\\Security\\Authenticator\\FormLoginAuthenticator
        autowire: true", "@MKUserBundle/config/services.yml", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/config/services.yml");
    }
}
