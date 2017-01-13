<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_e1933dfadd227232e752213c205ee68f8328ac29d518a566b79ccdfabac6cd42 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
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
        $__internal_6201acb2b7bf2737566f0a9ae0b5ab11da4a79318bb15d24f856f66d27527723 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_6201acb2b7bf2737566f0a9ae0b5ab11da4a79318bb15d24f856f66d27527723->enter($__internal_6201acb2b7bf2737566f0a9ae0b5ab11da4a79318bb15d24f856f66d27527723_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_6201acb2b7bf2737566f0a9ae0b5ab11da4a79318bb15d24f856f66d27527723->leave($__internal_6201acb2b7bf2737566f0a9ae0b5ab11da4a79318bb15d24f856f66d27527723_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4f2ff8cf41bf2b45f7aa8783d06fc64eb96254701f159943fab9a14de40c7424 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4f2ff8cf41bf2b45f7aa8783d06fc64eb96254701f159943fab9a14de40c7424->enter($__internal_4f2ff8cf41bf2b45f7aa8783d06fc64eb96254701f159943fab9a14de40c7424_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        
        $__internal_4f2ff8cf41bf2b45f7aa8783d06fc64eb96254701f159943fab9a14de40c7424->leave($__internal_4f2ff8cf41bf2b45f7aa8783d06fc64eb96254701f159943fab9a14de40c7424_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_d7306dab0d7c8cb2779c02c34229d28a7dace9c128b1f503db2c5c3b0a21dc25 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d7306dab0d7c8cb2779c02c34229d28a7dace9c128b1f503db2c5c3b0a21dc25->enter($__internal_d7306dab0d7c8cb2779c02c34229d28a7dace9c128b1f503db2c5c3b0a21dc25_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_d7306dab0d7c8cb2779c02c34229d28a7dace9c128b1f503db2c5c3b0a21dc25->leave($__internal_d7306dab0d7c8cb2779c02c34229d28a7dace9c128b1f503db2c5c3b0a21dc25_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_575ff3a9683bbe8d5c724a09949e2289874397c610d521be33c34ee9bf5ca579 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_575ff3a9683bbe8d5c724a09949e2289874397c610d521be33c34ee9bf5ca579->enter($__internal_575ff3a9683bbe8d5c724a09949e2289874397c610d521be33c34ee9bf5ca579_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "@WebProfiler/Collector/router.html.twig"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_575ff3a9683bbe8d5c724a09949e2289874397c610d521be33c34ee9bf5ca579->leave($__internal_575ff3a9683bbe8d5c724a09949e2289874397c610d521be33c34ee9bf5ca579_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
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
", "@WebProfiler/Collector/router.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Collector/router.html.twig");
    }
}
