<?php

/* WebProfilerBundle:Profiler:toolbar_redirect.html.twig */
class __TwigTemplate_9fa76fdfdc331d2006c7d3d73e277b64a1da24f0c87376aabbee116674b7afa7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_b9cb5ffd704d09f23dd8ccd03a30c07f6e95ea89311cad25fbaeb0ad3291cd14 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b9cb5ffd704d09f23dd8ccd03a30c07f6e95ea89311cad25fbaeb0ad3291cd14->enter($__internal_b9cb5ffd704d09f23dd8ccd03a30c07f6e95ea89311cad25fbaeb0ad3291cd14_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b9cb5ffd704d09f23dd8ccd03a30c07f6e95ea89311cad25fbaeb0ad3291cd14->leave($__internal_b9cb5ffd704d09f23dd8ccd03a30c07f6e95ea89311cad25fbaeb0ad3291cd14_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_d8909ccd6190cbb5f4a5d4f1a18eca071068e40d8f6d3c2baee2d4034cf9cc66 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d8909ccd6190cbb5f4a5d4f1a18eca071068e40d8f6d3c2baee2d4034cf9cc66->enter($__internal_d8909ccd6190cbb5f4a5d4f1a18eca071068e40d8f6d3c2baee2d4034cf9cc66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        echo "Redirection Intercepted";
        
        $__internal_d8909ccd6190cbb5f4a5d4f1a18eca071068e40d8f6d3c2baee2d4034cf9cc66->leave($__internal_d8909ccd6190cbb5f4a5d4f1a18eca071068e40d8f6d3c2baee2d4034cf9cc66_prof);

    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        $__internal_c51a745f9132eb7369727610fbc0f5362406317206aa135695bb4bf38ab56acc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c51a745f9132eb7369727610fbc0f5362406317206aa135695bb4bf38ab56acc->enter($__internal_c51a745f9132eb7369727610fbc0f5362406317206aa135695bb4bf38ab56acc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig"));

        // line 6
        echo "    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["location"]) ? $context["location"] : $this->getContext($context, "location")), "html", null, true);
        echo "</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
";
        
        $__internal_c51a745f9132eb7369727610fbc0f5362406317206aa135695bb4bf38ab56acc->leave($__internal_c51a745f9132eb7369727610fbc0f5362406317206aa135695bb4bf38ab56acc_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:toolbar_redirect.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  53 => 6,  47 => 5,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block title 'Redirection Intercepted' %}

{% block body %}
    <div class=\"sf-reset\">
        <div class=\"block-exception\">
            <h1>This request redirects to <a href=\"{{ location }}\">{{ location }}</a>.</h1>

            <p>
                <small>
                    The redirect was intercepted by the web debug toolbar to help debugging.
                    For more information, see the \"intercept-redirects\" option of the Profiler.
                </small>
            </p>
        </div>
    </div>
{% endblock %}
", "WebProfilerBundle:Profiler:toolbar_redirect.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/toolbar_redirect.html.twig");
    }
}
