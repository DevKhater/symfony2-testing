<?php

/* base.html.twig */
class __TwigTemplate_2831a683c84f89121cb05a98866fbd6519e9fd90f5c277c1988cb63a2ebe6170 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_9a9e2854999c534c7f4b6e344a66b7227ad895d24699a0cb007bfa95133aa6d6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9a9e2854999c534c7f4b6e344a66b7227ad895d24699a0cb007bfa95133aa6d6->enter($__internal_9a9e2854999c534c7f4b6e344a66b7227ad895d24699a0cb007bfa95133aa6d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_9a9e2854999c534c7f4b6e344a66b7227ad895d24699a0cb007bfa95133aa6d6->leave($__internal_9a9e2854999c534c7f4b6e344a66b7227ad895d24699a0cb007bfa95133aa6d6_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_ff0d2bd014fe405b2a82ab43531c20f8afac5f43a1cdf409ff02e92d0d3bf0fb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ff0d2bd014fe405b2a82ab43531c20f8afac5f43a1cdf409ff02e92d0d3bf0fb->enter($__internal_ff0d2bd014fe405b2a82ab43531c20f8afac5f43a1cdf409ff02e92d0d3bf0fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "base.html.twig"));

        echo "Welcome!";
        
        $__internal_ff0d2bd014fe405b2a82ab43531c20f8afac5f43a1cdf409ff02e92d0d3bf0fb->leave($__internal_ff0d2bd014fe405b2a82ab43531c20f8afac5f43a1cdf409ff02e92d0d3bf0fb_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_d257c5ce4270d6754d46be0262e6d0e0452865ec5393ebab3c9e2bef6cb04de4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d257c5ce4270d6754d46be0262e6d0e0452865ec5393ebab3c9e2bef6cb04de4->enter($__internal_d257c5ce4270d6754d46be0262e6d0e0452865ec5393ebab3c9e2bef6cb04de4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "base.html.twig"));

        
        $__internal_d257c5ce4270d6754d46be0262e6d0e0452865ec5393ebab3c9e2bef6cb04de4->leave($__internal_d257c5ce4270d6754d46be0262e6d0e0452865ec5393ebab3c9e2bef6cb04de4_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_179aa0a12adcd55e5c8a8ff18bc19387ad098e1a54cce88f13966d2c8d376074 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_179aa0a12adcd55e5c8a8ff18bc19387ad098e1a54cce88f13966d2c8d376074->enter($__internal_179aa0a12adcd55e5c8a8ff18bc19387ad098e1a54cce88f13966d2c8d376074_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "base.html.twig"));

        
        $__internal_179aa0a12adcd55e5c8a8ff18bc19387ad098e1a54cce88f13966d2c8d376074->leave($__internal_179aa0a12adcd55e5c8a8ff18bc19387ad098e1a54cce88f13966d2c8d376074_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_87afa5b442c1de051ddc0b59f263c56016d5b5ef88c1d87afb1e32d0d97c4a69 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_87afa5b442c1de051ddc0b59f263c56016d5b5ef88c1d87afb1e32d0d97c4a69->enter($__internal_87afa5b442c1de051ddc0b59f263c56016d5b5ef88c1d87afb1e32d0d97c4a69_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "base.html.twig"));

        
        $__internal_87afa5b442c1de051ddc0b59f263c56016d5b5ef88c1d87afb1e32d0d97c4a69->leave($__internal_87afa5b442c1de051ddc0b59f263c56016d5b5ef88c1d87afb1e32d0d97c4a69_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/home/michelk9/public_html/myBackEnd/app/Resources/views/base.html.twig");
    }
}
