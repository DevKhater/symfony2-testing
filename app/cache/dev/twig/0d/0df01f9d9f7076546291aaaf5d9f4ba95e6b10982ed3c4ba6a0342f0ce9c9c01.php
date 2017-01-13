<?php

/* NelmioApiDocBundle::resource.html.twig */
class __TwigTemplate_b11279ac88b9ee41f4474a38a1bc6ba7f1cd69badf4a9f6806417bb2456e3d7b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("NelmioApiDocBundle::layout.html.twig", "NelmioApiDocBundle::resource.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NelmioApiDocBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_5666c05197e0ada2a0562fbbee0c18a2b2c540ab1a7ad302bb8f29d918bf336b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5666c05197e0ada2a0562fbbee0c18a2b2c540ab1a7ad302bb8f29d918bf336b->enter($__internal_5666c05197e0ada2a0562fbbee0c18a2b2c540ab1a7ad302bb8f29d918bf336b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "NelmioApiDocBundle::resource.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5666c05197e0ada2a0562fbbee0c18a2b2c540ab1a7ad302bb8f29d918bf336b->leave($__internal_5666c05197e0ada2a0562fbbee0c18a2b2c540ab1a7ad302bb8f29d918bf336b_prof);

    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        $__internal_7dfc5ad5556f072ddd2fa46396e1711e1eb8cceaf490082db3f0523f372e47ae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7dfc5ad5556f072ddd2fa46396e1711e1eb8cceaf490082db3f0523f372e47ae->enter($__internal_7dfc5ad5556f072ddd2fa46396e1711e1eb8cceaf490082db3f0523f372e47ae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "NelmioApiDocBundle::resource.html.twig"));

        // line 4
        echo "    <li class=\"resource\">
        <ul class=\"endpoints\">
            <li class=\"endpoint\">
                <ul class=\"operations\">
                    ";
        // line 8
        $this->loadTemplate("NelmioApiDocBundle::method.html.twig", "NelmioApiDocBundle::resource.html.twig", 8)->display($context);
        // line 9
        echo "                </ul>
            </li>
        </ul>
    </li>
";
        
        $__internal_7dfc5ad5556f072ddd2fa46396e1711e1eb8cceaf490082db3f0523f372e47ae->leave($__internal_7dfc5ad5556f072ddd2fa46396e1711e1eb8cceaf490082db3f0523f372e47ae_prof);

    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle::resource.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 9,  46 => 8,  40 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"NelmioApiDocBundle::layout.html.twig\" %}

{% block content %}
    <li class=\"resource\">
        <ul class=\"endpoints\">
            <li class=\"endpoint\">
                <ul class=\"operations\">
                    {% include 'NelmioApiDocBundle::method.html.twig' %}
                </ul>
            </li>
        </ul>
    </li>
{% endblock content %}
", "NelmioApiDocBundle::resource.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views/resource.html.twig");
    }
}
