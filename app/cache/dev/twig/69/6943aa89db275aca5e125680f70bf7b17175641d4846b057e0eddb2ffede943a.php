<?php

/* DataBundle:Band:apiShow.html.twig */
class __TwigTemplate_2aafc0f9b64d5804488180c482d0ecc154cb1d6f1e212d3f00848175124cc36e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Band:apiShow.html.twig", 1);
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
        $__internal_78a59a6fba6690502b14b40a79f8973c78b7020b3c49e959d3c90e2eac515d1c = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_78a59a6fba6690502b14b40a79f8973c78b7020b3c49e959d3c90e2eac515d1c->enter($__internal_78a59a6fba6690502b14b40a79f8973c78b7020b3c49e959d3c90e2eac515d1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:apiShow.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_78a59a6fba6690502b14b40a79f8973c78b7020b3c49e959d3c90e2eac515d1c->leave($__internal_78a59a6fba6690502b14b40a79f8973c78b7020b3c49e959d3c90e2eac515d1c_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_15465b69545120f644b3c22e80bd8ccc1e99f4b890e40654165391cc894d5361 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_15465b69545120f644b3c22e80bd8ccc1e99f4b890e40654165391cc894d5361->enter($__internal_15465b69545120f644b3c22e80bd8ccc1e99f4b890e40654165391cc894d5361_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiShow.html.twig"));

        echo " - Show Band";
        
        $__internal_15465b69545120f644b3c22e80bd8ccc1e99f4b890e40654165391cc894d5361->leave($__internal_15465b69545120f644b3c22e80bd8ccc1e99f4b890e40654165391cc894d5361_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_7c10c6961b65b94667be8652f8f3dfc2d2cf5955a78815ae81ddd8868cf65968 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7c10c6961b65b94667be8652f8f3dfc2d2cf5955a78815ae81ddd8868cf65968->enter($__internal_7c10c6961b65b94667be8652f8f3dfc2d2cf5955a78815ae81ddd8868cf65968_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiShow.html.twig"));

        // line 4
        echo "    <h1>API: Show Band</h1>
    ";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        echo "
";
        
        $__internal_7c10c6961b65b94667be8652f8f3dfc2d2cf5955a78815ae81ddd8868cf65968->leave($__internal_7c10c6961b65b94667be8652f8f3dfc2d2cf5955a78815ae81ddd8868cf65968_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:apiShow.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 5,  53 => 4,  47 => 3,  35 => 2,  11 => 1,);
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
{% block title %} - Show Band{% endblock %}
{% block body %}
    <h1>API: Show Band</h1>
    {{dump(data)}}
{% endblock %}", "DataBundle:Band:apiShow.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/apiShow.html.twig");
    }
}
