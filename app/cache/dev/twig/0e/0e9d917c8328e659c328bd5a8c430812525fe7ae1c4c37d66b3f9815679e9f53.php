<?php

/* @MKUserBundle/config/routing.yml */
class __TwigTemplate_c113e4cec7ffb9210c5e7d18f29e798ef414c2e0b9a4b5a688a30ad43b05e6cc extends Twig_Template
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
        $__internal_9b9fee4b5d184ed99742d4e8478ae1a9358b65d262b7ef73b731545d2d8ea2b9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9b9fee4b5d184ed99742d4e8478ae1a9358b65d262b7ef73b731545d2d8ea2b9->enter($__internal_9b9fee4b5d184ed99742d4e8478ae1a9358b65d262b7ef73b731545d2d8ea2b9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@MKUserBundle/config/routing.yml"));

        // line 1
        echo "mk_user_homepage:
    path:     /
    defaults: { _controller: MKUserBundle:Default:index }

mk_user_admin:
    path:     /admin
    defaults: { _controller: MKUserBundle:Default:admin }

user_registration:
    path:     /register
    defaults: { _controller: MKUserBundle:Registration:register }

secure_login:
    path:     /login
    defaults: { _controller: MKUserBundle:Security:login }

login_check:
    path:     /login_check
    defaults: { _controller: MKUserBundle:Security:loginCheck }
    
logout:
    path: /logout";
        
        $__internal_9b9fee4b5d184ed99742d4e8478ae1a9358b65d262b7ef73b731545d2d8ea2b9->leave($__internal_9b9fee4b5d184ed99742d4e8478ae1a9358b65d262b7ef73b731545d2d8ea2b9_prof);

    }

    public function getTemplateName()
    {
        return "@MKUserBundle/config/routing.yml";
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
        return new Twig_Source("mk_user_homepage:
    path:     /
    defaults: { _controller: MKUserBundle:Default:index }

mk_user_admin:
    path:     /admin
    defaults: { _controller: MKUserBundle:Default:admin }

user_registration:
    path:     /register
    defaults: { _controller: MKUserBundle:Registration:register }

secure_login:
    path:     /login
    defaults: { _controller: MKUserBundle:Security:login }

login_check:
    path:     /login_check
    defaults: { _controller: MKUserBundle:Security:loginCheck }
    
logout:
    path: /logout", "@MKUserBundle/config/routing.yml", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/config/routing.yml");
    }
}
