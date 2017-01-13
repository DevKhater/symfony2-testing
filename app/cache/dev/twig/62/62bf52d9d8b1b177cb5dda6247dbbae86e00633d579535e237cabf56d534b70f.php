<?php

/* DataBundle:Concert:new.html.twig */
class __TwigTemplate_71abb225bdfb3753175ccf8dbbc4ab3e2c0bf155241f3a2474d4e027742e4134 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "DataBundle:Concert:new.html.twig", 1);
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
        $__internal_413cbfc09ed70231761b4eb52d2a5c55d2782532866ae7c6266008fe3a04ca76 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_413cbfc09ed70231761b4eb52d2a5c55d2782532866ae7c6266008fe3a04ca76->enter($__internal_413cbfc09ed70231761b4eb52d2a5c55d2782532866ae7c6266008fe3a04ca76_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:new.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_413cbfc09ed70231761b4eb52d2a5c55d2782532866ae7c6266008fe3a04ca76->leave($__internal_413cbfc09ed70231761b4eb52d2a5c55d2782532866ae7c6266008fe3a04ca76_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_988b3e0a66bd82ad4da841b56d9c2499f773e816c392c227fd1bfa0d4fe70cb5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_988b3e0a66bd82ad4da841b56d9c2499f773e816c392c227fd1bfa0d4fe70cb5->enter($__internal_988b3e0a66bd82ad4da841b56d9c2499f773e816c392c227fd1bfa0d4fe70cb5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:new.html.twig"));

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
        
        $__internal_988b3e0a66bd82ad4da841b56d9c2499f773e816c392c227fd1bfa0d4fe70cb5->leave($__internal_988b3e0a66bd82ad4da841b56d9c2499f773e816c392c227fd1bfa0d4fe70cb5_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:new.html.twig";
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
{% endblock %}", "DataBundle:Concert:new.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/new.html.twig");
    }
}
