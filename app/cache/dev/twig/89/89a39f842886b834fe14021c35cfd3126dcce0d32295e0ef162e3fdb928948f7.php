<?php

/* DataBundle:Concert:concertApiShowFields.html.twig */
class __TwigTemplate_8caa90e99adc747d3687eaa58a8b41350eb78444db479c845e0fff245a513624 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Concert:concertApiShowFields.html.twig", 1);
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
        $__internal_9d0dabbe150c3967180705448212c8dd08edcf46a367775df81b4b93e86417b3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9d0dabbe150c3967180705448212c8dd08edcf46a367775df81b4b93e86417b3->enter($__internal_9d0dabbe150c3967180705448212c8dd08edcf46a367775df81b4b93e86417b3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:concertApiShowFields.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9d0dabbe150c3967180705448212c8dd08edcf46a367775df81b4b93e86417b3->leave($__internal_9d0dabbe150c3967180705448212c8dd08edcf46a367775df81b4b93e86417b3_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_812db122a164b704b21f1fdd69e5c0cd8d90136ab4a7d9aebd36ced61f4bd552 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_812db122a164b704b21f1fdd69e5c0cd8d90136ab4a7d9aebd36ced61f4bd552->enter($__internal_812db122a164b704b21f1fdd69e5c0cd8d90136ab4a7d9aebd36ced61f4bd552_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:concertApiShowFields.html.twig"));

        echo " - Show Concert ";
        echo twig_escape_filter($this->env, (isset($context["element"]) ? $context["element"] : $this->getContext($context, "element")), "html", null, true);
        
        $__internal_812db122a164b704b21f1fdd69e5c0cd8d90136ab4a7d9aebd36ced61f4bd552->leave($__internal_812db122a164b704b21f1fdd69e5c0cd8d90136ab4a7d9aebd36ced61f4bd552_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_638fc4ce69c39ea3418d1ea718edfb36b74130754d7ae373242c63e17ae55f2d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_638fc4ce69c39ea3418d1ea718edfb36b74130754d7ae373242c63e17ae55f2d->enter($__internal_638fc4ce69c39ea3418d1ea718edfb36b74130754d7ae373242c63e17ae55f2d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:concertApiShowFields.html.twig"));

        // line 4
        echo "    <h1>API: Show ";
        echo twig_escape_filter($this->env, (isset($context["element"]) ? $context["element"] : $this->getContext($context, "element")), "html", null, true);
        echo "</h1>
    ";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        echo "
";
        
        $__internal_638fc4ce69c39ea3418d1ea718edfb36b74130754d7ae373242c63e17ae55f2d->leave($__internal_638fc4ce69c39ea3418d1ea718edfb36b74130754d7ae373242c63e17ae55f2d_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:concertApiShowFields.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 5,  54 => 4,  48 => 3,  35 => 2,  11 => 1,);
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
{% block title %} - Show Concert {{element}}{% endblock %}
{% block body %}
    <h1>API: Show {{element}}</h1>
    {{dump(data)}}
{% endblock %}
", "DataBundle:Concert:concertApiShowFields.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/concertApiShowFields.html.twig");
    }
}
