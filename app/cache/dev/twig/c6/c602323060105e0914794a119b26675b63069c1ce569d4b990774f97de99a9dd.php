<?php

/* WebProfilerBundle:Collector:router.html.twig */
class __TwigTemplate_15edf2d3e1d8382ba5d2bbcfa52ea7939b6afa34a21174b94ae45333b97d5d6f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "WebProfilerBundle:Collector:router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_94f87f552ac30280fa18e430dac3b86ebda4e9b200bfcc0ee5665b512caf950a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_94f87f552ac30280fa18e430dac3b86ebda4e9b200bfcc0ee5665b512caf950a->enter($__internal_94f87f552ac30280fa18e430dac3b86ebda4e9b200bfcc0ee5665b512caf950a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Collector:router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_94f87f552ac30280fa18e430dac3b86ebda4e9b200bfcc0ee5665b512caf950a->leave($__internal_94f87f552ac30280fa18e430dac3b86ebda4e9b200bfcc0ee5665b512caf950a_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_9bbc5c8217ffbb3dcdb949a0b777be32830aa8af2f77a83f9b66b24135674892 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9bbc5c8217ffbb3dcdb949a0b777be32830aa8af2f77a83f9b66b24135674892->enter($__internal_9bbc5c8217ffbb3dcdb949a0b777be32830aa8af2f77a83f9b66b24135674892_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Collector:router.html.twig"));

        
        $__internal_9bbc5c8217ffbb3dcdb949a0b777be32830aa8af2f77a83f9b66b24135674892->leave($__internal_9bbc5c8217ffbb3dcdb949a0b777be32830aa8af2f77a83f9b66b24135674892_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_f345a4ba465e8b2df9104a8f152067ab206eab8295f089a13017294cd5d1959e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f345a4ba465e8b2df9104a8f152067ab206eab8295f089a13017294cd5d1959e->enter($__internal_f345a4ba465e8b2df9104a8f152067ab206eab8295f089a13017294cd5d1959e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Collector:router.html.twig"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_f345a4ba465e8b2df9104a8f152067ab206eab8295f089a13017294cd5d1959e->leave($__internal_f345a4ba465e8b2df9104a8f152067ab206eab8295f089a13017294cd5d1959e_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_70a943924d8949118c7adbd5958ffe2e1d4269d612f420aa14f322839822cf95 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_70a943924d8949118c7adbd5958ffe2e1d4269d612f420aa14f322839822cf95->enter($__internal_70a943924d8949118c7adbd5958ffe2e1d4269d612f420aa14f322839822cf95_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Collector:router.html.twig"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_70a943924d8949118c7adbd5958ffe2e1d4269d612f420aa14f322839822cf95->leave($__internal_70a943924d8949118c7adbd5958ffe2e1d4269d612f420aa14f322839822cf95_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Collector:router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@WebProfiler/Profiler/layout.html.twig' %}

{% block toolbar %}{% endblock %}

{% block menu %}
<span class=\"label\">
    <span class=\"icon\">{{ include('@WebProfiler/Icon/router.svg') }}</span>
    <strong>Routing</strong>
</span>
{% endblock %}

{% block panel %}
    {{ render(path('_profiler_router', { token: token })) }}
{% endblock %}
", "WebProfilerBundle:Collector:router.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
