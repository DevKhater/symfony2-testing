<?php

/* DataBundle:Band:apiForm.html.twig */
class __TwigTemplate_d0b1241b025e58b67bf4306d1a74fe5f2b4040411a686ab1cfcece01a89d5fe5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Band:apiForm.html.twig", 1);
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
        $__internal_10dc6e4ae0f2ae5e97cdcbdc73c775d7b21fc4aa9118c1a0ea7e7506a84994fb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_10dc6e4ae0f2ae5e97cdcbdc73c775d7b21fc4aa9118c1a0ea7e7506a84994fb->enter($__internal_10dc6e4ae0f2ae5e97cdcbdc73c775d7b21fc4aa9118c1a0ea7e7506a84994fb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:apiForm.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_10dc6e4ae0f2ae5e97cdcbdc73c775d7b21fc4aa9118c1a0ea7e7506a84994fb->leave($__internal_10dc6e4ae0f2ae5e97cdcbdc73c775d7b21fc4aa9118c1a0ea7e7506a84994fb_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_0b7db93f298ca020214f72a51afc08ddf1f97db579be62ebf058948d67b3dadf = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0b7db93f298ca020214f72a51afc08ddf1f97db579be62ebf058948d67b3dadf->enter($__internal_0b7db93f298ca020214f72a51afc08ddf1f97db579be62ebf058948d67b3dadf_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiForm.html.twig"));

        echo "- ";
        echo twig_escape_filter($this->env, (isset($context["action"]) ? $context["action"] : $this->getContext($context, "action")), "html", null, true);
        echo " Concert";
        
        $__internal_0b7db93f298ca020214f72a51afc08ddf1f97db579be62ebf058948d67b3dadf->leave($__internal_0b7db93f298ca020214f72a51afc08ddf1f97db579be62ebf058948d67b3dadf_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_569e29d424927992b86f47813e313dd2d718bd018f0da863cedf7268c3350c7b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_569e29d424927992b86f47813e313dd2d718bd018f0da863cedf7268c3350c7b->enter($__internal_569e29d424927992b86f47813e313dd2d718bd018f0da863cedf7268c3350c7b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiForm.html.twig"));

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
        
        $__internal_569e29d424927992b86f47813e313dd2d718bd018f0da863cedf7268c3350c7b->leave($__internal_569e29d424927992b86f47813e313dd2d718bd018f0da863cedf7268c3350c7b_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:apiForm.html.twig";
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

", "DataBundle:Band:apiForm.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/apiForm.html.twig");
    }
}
