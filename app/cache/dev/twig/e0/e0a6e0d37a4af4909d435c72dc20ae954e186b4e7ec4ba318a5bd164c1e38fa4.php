<?php

/* DataBundle:Media:new.html.twig */
class __TwigTemplate_476b9ec5feeaa2959484f24fcb0438dcce374560ffaa675a1cb9810575339d69 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "DataBundle:Media:new.html.twig", 1);
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
        $__internal_6f1fdd7b77236cfce1a672ba380fcf1874605c2875b600db64adbf99945a7905 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6f1fdd7b77236cfce1a672ba380fcf1874605c2875b600db64adbf99945a7905->enter($__internal_6f1fdd7b77236cfce1a672ba380fcf1874605c2875b600db64adbf99945a7905_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Media:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6f1fdd7b77236cfce1a672ba380fcf1874605c2875b600db64adbf99945a7905->leave($__internal_6f1fdd7b77236cfce1a672ba380fcf1874605c2875b600db64adbf99945a7905_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_a38502db3cb291d6ee3c7e888f7827f4b4502c8753af02809268154e40d5f64e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a38502db3cb291d6ee3c7e888f7827f4b4502c8753af02809268154e40d5f64e->enter($__internal_a38502db3cb291d6ee3c7e888f7827f4b4502c8753af02809268154e40d5f64e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Media:new.html.twig"));

        // line 3
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
        echo "
    ";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    <button type=\"submit\">Create New Media</button>
";
        // line 6
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
";
        
        $__internal_a38502db3cb291d6ee3c7e888f7827f4b4502c8753af02809268154e40d5f64e->leave($__internal_a38502db3cb291d6ee3c7e888f7827f4b4502c8753af02809268154e40d5f64e_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Media:new.html.twig";
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
    <button type=\"submit\">Create New Media</button>
{{ form_end(form) }}
{% endblock %}", "DataBundle:Media:new.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Media/new.html.twig");
    }
}
