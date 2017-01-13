<?php

/* DataBundle:Location:new.html.twig */
class __TwigTemplate_bd0906c0743f04ad34c6d8b5394b524ac6998dfe142440919cf12df998bf8815 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "DataBundle:Location:new.html.twig", 1);
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
        $__internal_5b8a82c6374088587ee4c09ce3d08309b5ac59988c76ad6266cfa48f07566ef2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5b8a82c6374088587ee4c09ce3d08309b5ac59988c76ad6266cfa48f07566ef2->enter($__internal_5b8a82c6374088587ee4c09ce3d08309b5ac59988c76ad6266cfa48f07566ef2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Location:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5b8a82c6374088587ee4c09ce3d08309b5ac59988c76ad6266cfa48f07566ef2->leave($__internal_5b8a82c6374088587ee4c09ce3d08309b5ac59988c76ad6266cfa48f07566ef2_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_073698ab96eab05ca982e757e0d38bec17a37834cbb1a293b29d77535490d391 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_073698ab96eab05ca982e757e0d38bec17a37834cbb1a293b29d77535490d391->enter($__internal_073698ab96eab05ca982e757e0d38bec17a37834cbb1a293b29d77535490d391_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Location:new.html.twig"));

        // line 3
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <button type=\"submit\">Create New Concert</button>
";
        // line 6
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_073698ab96eab05ca982e757e0d38bec17a37834cbb1a293b29d77535490d391->leave($__internal_073698ab96eab05ca982e757e0d38bec17a37834cbb1a293b29d77535490d391_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Location:new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 6,  44 => 4,  40 => 3,  34 => 2,  11 => 1,);
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
    {{ form_widget(form) }}
    <button type=\"submit\">Create New Concert</button>
{{ form_end(form) }}
{% endblock %}", "DataBundle:Location:new.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Location/new.html.twig");
    }
}
