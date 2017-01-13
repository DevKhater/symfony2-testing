<?php

/* DataBundle:Band:apiList.html.twig */
class __TwigTemplate_3bb479d92219f3039d8143100d61638748482120c801d989c7209bcf5c98f2c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Band:apiList.html.twig", 1);
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
        $__internal_d5ce19763216aa58f546f2a564613e07ea7245120ec7ff1f1636849a5ba11c81 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d5ce19763216aa58f546f2a564613e07ea7245120ec7ff1f1636849a5ba11c81->enter($__internal_d5ce19763216aa58f546f2a564613e07ea7245120ec7ff1f1636849a5ba11c81_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:apiList.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d5ce19763216aa58f546f2a564613e07ea7245120ec7ff1f1636849a5ba11c81->leave($__internal_d5ce19763216aa58f546f2a564613e07ea7245120ec7ff1f1636849a5ba11c81_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_3f26cb1637fc8d6895f2cf062f065f1f7fb9c04e9c3722b6d80a361c8943f3fc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3f26cb1637fc8d6895f2cf062f065f1f7fb9c04e9c3722b6d80a361c8943f3fc->enter($__internal_3f26cb1637fc8d6895f2cf062f065f1f7fb9c04e9c3722b6d80a361c8943f3fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiList.html.twig"));

        echo " - List Bands";
        
        $__internal_3f26cb1637fc8d6895f2cf062f065f1f7fb9c04e9c3722b6d80a361c8943f3fc->leave($__internal_3f26cb1637fc8d6895f2cf062f065f1f7fb9c04e9c3722b6d80a361c8943f3fc_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_80dc9995934b1d913c95142b440f753794c49b820277ff85e960e12a6a9ff680 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_80dc9995934b1d913c95142b440f753794c49b820277ff85e960e12a6a9ff680->enter($__internal_80dc9995934b1d913c95142b440f753794c49b820277ff85e960e12a6a9ff680_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Band:apiList.html.twig"));

        // line 4
        echo "    <h1>API: List Bands</h1>

    <ul id=\"bands-list\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["band"]) {
            // line 8
            echo "            <li>
                <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_band_show", array("slug" => $this->getAttribute($context["band"], "slug", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["band"], "name", array()), "html", null, true);
            echo "</a> - <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["band"], "genre", array()), "html", null, true);
            echo "</strong>
                ";
            // line 11
            echo "                ";
            // line 12
            echo "            </li>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 14
            echo "            <li>No Bands</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['band'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </ul>
    <p>
        ";
        // line 19
        echo "    </p>

    ";
        // line 21
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Band:apiList.html.twig", 21)->display($context);
        
        $__internal_80dc9995934b1d913c95142b440f753794c49b820277ff85e960e12a6a9ff680->leave($__internal_80dc9995934b1d913c95142b440f753794c49b820277ff85e960e12a6a9ff680_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:apiList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 21,  93 => 19,  89 => 16,  82 => 14,  76 => 12,  74 => 11,  66 => 9,  63 => 8,  58 => 7,  53 => 4,  47 => 3,  35 => 2,  11 => 1,);
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
{% block title %} - List Bands{% endblock %}
{% block body %}
    <h1>API: List Bands</h1>

    <ul id=\"bands-list\">
        {% for band in data %}
            <li>
                <a href=\"{{ path('api_band_show', {'slug': band.slug}) }}\">{{ band.name }}</a> - <strong>{{ band.genre }}</strong>
                {#[<a href=\"{{ path('api_band_form_edit', {'slug': band.slug}) }}\">Edit</a>]#}
                {#[<a href=\"{{ path('api_band_delete', {'slug': band.slug}) }}\">Delete</a>]#}
            </li>
        {% else %}
            <li>No Bands</li>
            {% endfor %}
    </ul>
    <p>
        {#<a href=\"{{ path('api_band_form_new') }}\">New Concert</a>#}
    </p>

    {% include '@DataBundle/views/Template/paginator.html.twig' %}
{% endblock %}", "DataBundle:Band:apiList.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/apiList.html.twig");
    }
}
