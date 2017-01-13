<?php

/* DataBundle:Band:new.html.twig */
class __TwigTemplate_a7b5a55a2cf5654d54310b09651ccad986fdbf8b8277a1bd45cd06b054b97a58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "DataBundle:Band:new.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_ca46734583f1513b2de4dbfdfb8474d82d4745c482694dbd1ac300907d0492ed = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ca46734583f1513b2de4dbfdfb8474d82d4745c482694dbd1ac300907d0492ed->enter($__internal_ca46734583f1513b2de4dbfdfb8474d82d4745c482694dbd1ac300907d0492ed_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ca46734583f1513b2de4dbfdfb8474d82d4745c482694dbd1ac300907d0492ed->leave($__internal_ca46734583f1513b2de4dbfdfb8474d82d4745c482694dbd1ac300907d0492ed_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_7b2a74697b33808902f4e5aa643e5c4ccc31221fefc164eff7a7c41405013ece = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7b2a74697b33808902f4e5aa643e5c4ccc31221fefc164eff7a7c41405013ece->enter($__internal_7b2a74697b33808902f4e5aa643e5c4ccc31221fefc164eff7a7c41405013ece_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:new.html.twig"));

        // line 3
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'row');
        echo "
    ";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "genre", array()), 'row');
        echo "
    <button type=\"submit\">Create New Band</button>
";
        // line 7
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_7b2a74697b33808902f4e5aa643e5c4ccc31221fefc164eff7a7c41405013ece->leave($__internal_7b2a74697b33808902f4e5aa643e5c4ccc31221fefc164eff7a7c41405013ece_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 7,  48 => 5,  44 => 4,  40 => 3,  34 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block body %}
{{ form_start(form) }}
    {{ form_row(form.name) }}
    {{ form_row(form.genre) }}
    <button type=\"submit\">Create New Band</button>
{{ form_end(form) }}
{% endblock %}", "DataBundle:Band:new.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/new.html.twig");
    }
}
