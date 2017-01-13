<?php

/* DataBundle::base.html.twig */
class __TwigTemplate_6fd84f7ab0fa8f779d08c838370dcf190f05355eea4d377f058e63e25ea3d0b3 extends Twig_Template
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
        $__internal_8e1a0f0395aa9594fb06282e1f680b0b6ae76c2f8e242ca34df2345d1dbc8626 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8e1a0f0395aa9594fb06282e1f680b0b6ae76c2f8e242ca34df2345d1dbc8626->enter($__internal_8e1a0f0395aa9594fb06282e1f680b0b6ae76c2f8e242ca34df2345d1dbc8626_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>[API] ";
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
        <style>
            body {
                margin:0 auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 18
        echo "    </body>
</html>
";
        
        $__internal_8e1a0f0395aa9594fb06282e1f680b0b6ae76c2f8e242ca34df2345d1dbc8626->leave($__internal_8e1a0f0395aa9594fb06282e1f680b0b6ae76c2f8e242ca34df2345d1dbc8626_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_6a210d987a751482b2c5f73154d9fe5392a6549ad9c7de136b5fc5bf419cad9e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6a210d987a751482b2c5f73154d9fe5392a6549ad9c7de136b5fc5bf419cad9e->enter($__internal_6a210d987a751482b2c5f73154d9fe5392a6549ad9c7de136b5fc5bf419cad9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle::base.html.twig"));

        echo "Welcome!";
        
        $__internal_6a210d987a751482b2c5f73154d9fe5392a6549ad9c7de136b5fc5bf419cad9e->leave($__internal_6a210d987a751482b2c5f73154d9fe5392a6549ad9c7de136b5fc5bf419cad9e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_72eb5afbeab0bbab3ddc38fc58cea0a8e1bc6ab006e38f68535cbb1eac779e9a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_72eb5afbeab0bbab3ddc38fc58cea0a8e1bc6ab006e38f68535cbb1eac779e9a->enter($__internal_72eb5afbeab0bbab3ddc38fc58cea0a8e1bc6ab006e38f68535cbb1eac779e9a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle::base.html.twig"));

        
        $__internal_72eb5afbeab0bbab3ddc38fc58cea0a8e1bc6ab006e38f68535cbb1eac779e9a->leave($__internal_72eb5afbeab0bbab3ddc38fc58cea0a8e1bc6ab006e38f68535cbb1eac779e9a_prof);

    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
        $__internal_72aef6ff860da553dd1d3ac5dae4f519b692ae3a62cd0b89c8cc2cf1b20122dc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_72aef6ff860da553dd1d3ac5dae4f519b692ae3a62cd0b89c8cc2cf1b20122dc->enter($__internal_72aef6ff860da553dd1d3ac5dae4f519b692ae3a62cd0b89c8cc2cf1b20122dc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle::base.html.twig"));

        
        $__internal_72aef6ff860da553dd1d3ac5dae4f519b692ae3a62cd0b89c8cc2cf1b20122dc->leave($__internal_72aef6ff860da553dd1d3ac5dae4f519b692ae3a62cd0b89c8cc2cf1b20122dc_prof);

    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_67e1ea07ef479badf916c192cc46fd7c377ecd2085104d33043433513d22f606 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_67e1ea07ef479badf916c192cc46fd7c377ecd2085104d33043433513d22f606->enter($__internal_67e1ea07ef479badf916c192cc46fd7c377ecd2085104d33043433513d22f606_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle::base.html.twig"));

        
        $__internal_67e1ea07ef479badf916c192cc46fd7c377ecd2085104d33043433513d22f606->leave($__internal_67e1ea07ef479badf916c192cc46fd7c377ecd2085104d33043433513d22f606_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 17,  88 => 16,  77 => 6,  65 => 5,  56 => 18,  53 => 17,  51 => 16,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
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
        <title>[API] {% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
        <style>
            body {
                margin:0 auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "DataBundle::base.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/base.html.twig");
    }
}
