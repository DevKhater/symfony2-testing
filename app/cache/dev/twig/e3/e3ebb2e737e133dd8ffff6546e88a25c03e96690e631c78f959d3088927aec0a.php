<?php

/* DataBundle:Concert:apiShow.html.twig */
class __TwigTemplate_b2ba3d1f908f995c132ed5c299d79beb73a4980327b4e404914d2847e77ed9a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Concert:apiShow.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "DataBundle::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_27adc1eeefd65941f2bb1b8ec0931cb56ea6bb3e77fe3387e581ee0f9d1c29b6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_27adc1eeefd65941f2bb1b8ec0931cb56ea6bb3e77fe3387e581ee0f9d1c29b6->enter($__internal_27adc1eeefd65941f2bb1b8ec0931cb56ea6bb3e77fe3387e581ee0f9d1c29b6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:apiShow.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_27adc1eeefd65941f2bb1b8ec0931cb56ea6bb3e77fe3387e581ee0f9d1c29b6->leave($__internal_27adc1eeefd65941f2bb1b8ec0931cb56ea6bb3e77fe3387e581ee0f9d1c29b6_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_c895d8b37ec580756992e31c684bcf394795d9da8a8b15e5cf4ff06f8a2630f9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c895d8b37ec580756992e31c684bcf394795d9da8a8b15e5cf4ff06f8a2630f9->enter($__internal_c895d8b37ec580756992e31c684bcf394795d9da8a8b15e5cf4ff06f8a2630f9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiShow.html.twig"));

        echo " - Show Concert";
        
        $__internal_c895d8b37ec580756992e31c684bcf394795d9da8a8b15e5cf4ff06f8a2630f9->leave($__internal_c895d8b37ec580756992e31c684bcf394795d9da8a8b15e5cf4ff06f8a2630f9_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_40b5626971a3937805c83667a4522268a03d159dd413c581547601923ec55c64 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_40b5626971a3937805c83667a4522268a03d159dd413c581547601923ec55c64->enter($__internal_40b5626971a3937805c83667a4522268a03d159dd413c581547601923ec55c64_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiShow.html.twig"));

        // line 4
        echo "    <h1>API: Show Concert</h1>
    ";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        echo "
";
        
        $__internal_40b5626971a3937805c83667a4522268a03d159dd413c581547601923ec55c64->leave($__internal_40b5626971a3937805c83667a4522268a03d159dd413c581547601923ec55c64_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:apiShow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 5,  53 => 4,  47 => 3,  35 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'DataBundle::base.html.twig' %}
{% block title %} - Show Concert{% endblock %}
{% block body %}
    <h1>API: Show Concert</h1>
    {{dump(data)}}
{% endblock %}", "DataBundle:Concert:apiShow.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/apiShow.html.twig");
    }
}
