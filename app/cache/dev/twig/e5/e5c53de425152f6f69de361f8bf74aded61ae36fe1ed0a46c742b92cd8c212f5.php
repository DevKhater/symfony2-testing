<?php

/* DataBundle:Concert:apiForm.html.twig */
class __TwigTemplate_1d17928746a7eca5968092b8a123160954e9a64a27e2afcf4875cecd1503aaa3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Concert:apiForm.html.twig", 1);
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
        $__internal_9e0c333bcedfa9427616a5590623055579874e0113bdd6de0e04a2d73ae0bfe3 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9e0c333bcedfa9427616a5590623055579874e0113bdd6de0e04a2d73ae0bfe3->enter($__internal_9e0c333bcedfa9427616a5590623055579874e0113bdd6de0e04a2d73ae0bfe3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:apiForm.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_9e0c333bcedfa9427616a5590623055579874e0113bdd6de0e04a2d73ae0bfe3->leave($__internal_9e0c333bcedfa9427616a5590623055579874e0113bdd6de0e04a2d73ae0bfe3_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_0e2968b66b946d5b6a57ed6527895ef4ac40fc3ade493d65fe171221c8fdf43e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0e2968b66b946d5b6a57ed6527895ef4ac40fc3ade493d65fe171221c8fdf43e->enter($__internal_0e2968b66b946d5b6a57ed6527895ef4ac40fc3ade493d65fe171221c8fdf43e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiForm.html.twig"));

        echo "- ";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
        echo " Concert";
        
        $__internal_0e2968b66b946d5b6a57ed6527895ef4ac40fc3ade493d65fe171221c8fdf43e->leave($__internal_0e2968b66b946d5b6a57ed6527895ef4ac40fc3ade493d65fe171221c8fdf43e_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_8a3b197d89f31f23be28ad9283364bd7fc4b02fb5b29754bac3e54d32d99ad68 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a3b197d89f31f23be28ad9283364bd7fc4b02fb5b29754bac3e54d32d99ad68->enter($__internal_8a3b197d89f31f23be28ad9283364bd7fc4b02fb5b29754bac3e54d32d99ad68_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiForm.html.twig"));

        // line 4
        echo "    <h1>API: ";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
        echo " Concert</h1>
    ";
        // line 5
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 6
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    ";
        // line 7
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_8a3b197d89f31f23be28ad9283364bd7fc4b02fb5b29754bac3e54d32d99ad68->leave($__internal_8a3b197d89f31f23be28ad9283364bd7fc4b02fb5b29754bac3e54d32d99ad68_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:apiForm.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 7,  64 => 6,  60 => 5,  55 => 4,  49 => 3,  35 => 2,  11 => 1,);
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
{% block title %}- {{action}} Concert{% endblock %}
{% block body %}
    <h1>API: {{action}} Concert</h1>
    {{ form_start(form) }}
    {{ form_widget(form) }}
    {{ form_end(form) }}
{% endblock %}

", "DataBundle:Concert:apiForm.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/apiForm.html.twig");
    }
}
