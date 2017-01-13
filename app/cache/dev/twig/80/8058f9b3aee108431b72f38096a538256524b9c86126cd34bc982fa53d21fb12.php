<?php

/* MKUserBundle:Security:register.html.twig */
class __TwigTemplate_152f291be7b87d0209d8756f8d4eb117e4842d40006a71a6c31c430a47cd7c19 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "MKUserBundle:Security:register.html.twig", 1);
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
        $__internal_bfca017263600ccaae43367812dde4a92c183816d33ff6d5bae238720b0f511b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_bfca017263600ccaae43367812dde4a92c183816d33ff6d5bae238720b0f511b->enter($__internal_bfca017263600ccaae43367812dde4a92c183816d33ff6d5bae238720b0f511b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle:Security:register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_bfca017263600ccaae43367812dde4a92c183816d33ff6d5bae238720b0f511b->leave($__internal_bfca017263600ccaae43367812dde4a92c183816d33ff6d5bae238720b0f511b_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_7149a8a8b7525036117ccb310e199f9f42b2af299cfcc89f96a54f3cfc633463 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7149a8a8b7525036117ccb310e199f9f42b2af299cfcc89f96a54f3cfc633463->enter($__internal_7149a8a8b7525036117ccb310e199f9f42b2af299cfcc89f96a54f3cfc633463_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle:Security:register.html.twig"));

        // line 3
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "username", array()), 'row');
        echo "
    ";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'row');
        echo "
    ";
        // line 6
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainPassword", array()), "first", array()), 'row');
        echo "
    ";
        // line 7
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "plainPassword", array()), "second", array()), 'row');
        echo "
    <button type=\"submit\">Register!</button>
";
        // line 9
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_7149a8a8b7525036117ccb310e199f9f42b2af299cfcc89f96a54f3cfc633463->leave($__internal_7149a8a8b7525036117ccb310e199f9f42b2af299cfcc89f96a54f3cfc633463_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle:Security:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 9,  56 => 7,  52 => 6,  48 => 5,  44 => 4,  40 => 3,  34 => 2,  11 => 1,);
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
    {{ form_row(form.username) }}
    {{ form_row(form.email) }}
    {{ form_row(form.plainPassword.first) }}
    {{ form_row(form.plainPassword.second) }}
    <button type=\"submit\">Register!</button>
{{ form_end(form) }}
{% endblock %}", "MKUserBundle:Security:register.html.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/Security/register.html.twig");
    }
}
