<?php

/* DataBundle:Concert:apiList.html.twig */
class __TwigTemplate_cda9facc8bca8209676fdd5e9e9cc29d7ffd563421036bad6497170e14a421e7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("DataBundle::base.html.twig", "DataBundle:Concert:apiList.html.twig", 1);
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
        $__internal_ea9b237bc630a613ad77b672933d582ce99ec936a3a2a40235d1e0d8fce850e1 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ea9b237bc630a613ad77b672933d582ce99ec936a3a2a40235d1e0d8fce850e1->enter($__internal_ea9b237bc630a613ad77b672933d582ce99ec936a3a2a40235d1e0d8fce850e1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:apiList.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_ea9b237bc630a613ad77b672933d582ce99ec936a3a2a40235d1e0d8fce850e1->leave($__internal_ea9b237bc630a613ad77b672933d582ce99ec936a3a2a40235d1e0d8fce850e1_prof);

    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        $__internal_2d7a87b8e0632a90d56cfc9635a912082da2364e335527bc661d751dcd057574 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2d7a87b8e0632a90d56cfc9635a912082da2364e335527bc661d751dcd057574->enter($__internal_2d7a87b8e0632a90d56cfc9635a912082da2364e335527bc661d751dcd057574_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiList.html.twig"));

        echo " - List Concerts";
        
        $__internal_2d7a87b8e0632a90d56cfc9635a912082da2364e335527bc661d751dcd057574->leave($__internal_2d7a87b8e0632a90d56cfc9635a912082da2364e335527bc661d751dcd057574_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_376761915277d8064a6914a6c0a4050b070144075879bfc99403a7c7b868c1eb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_376761915277d8064a6914a6c0a4050b070144075879bfc99403a7c7b868c1eb->enter($__internal_376761915277d8064a6914a6c0a4050b070144075879bfc99403a7c7b868c1eb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "DataBundle:Concert:apiList.html.twig"));

        // line 4
        echo "    <h1>API: List Concerts</h1>

    <ul id=\"concerts-list\">
        ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["concert"]) {
            // line 8
            echo "            <li>
                <a href=\"";
            // line 9
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_concert_show", array("id" => $this->getAttribute($context["concert"], "id", array()))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["concert"], "date", array())), "html", null, true);
            echo "</a>
                [<a href=\"";
            // line 10
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_concert_form_edit", array("id" => $this->getAttribute($context["concert"], "id", array()))), "html", null, true);
            echo "\">Edit</a>]
                ";
            // line 12
            echo "            </li>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 14
            echo "            <li>No Concerts</li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['concert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "    </ul>
    <p>
        <a href=\"";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("api_concert_form_new");
        echo "\">New Concert</a>
    </p>

    ";
        // line 21
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Concert:apiList.html.twig", 21)->display($context);
        
        $__internal_376761915277d8064a6914a6c0a4050b070144075879bfc99403a7c7b868c1eb->leave($__internal_376761915277d8064a6914a6c0a4050b070144075879bfc99403a7c7b868c1eb_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:apiList.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 21,  93 => 18,  89 => 16,  82 => 14,  76 => 12,  72 => 10,  66 => 9,  63 => 8,  58 => 7,  53 => 4,  47 => 3,  35 => 2,  11 => 1,);
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
{% block title %} - List Concerts{% endblock %}
{% block body %}
    <h1>API: List Concerts</h1>

    <ul id=\"concerts-list\">
        {% for concert in data %}
            <li>
                <a href=\"{{ path('api_concert_show', {'id': concert.id}) }}\">{{ concert.date | date }}</a>
                [<a href=\"{{ path('api_concert_form_edit', {'id': concert.id}) }}\">Edit</a>]
                {#[<a href=\"{{ path('api_concert_delete', {'id': concert.id}) }}\">Delete</a>]#}
            </li>
        {% else %}
            <li>No Concerts</li>
            {% endfor %}
    </ul>
    <p>
        <a href=\"{{ path('api_concert_form_new') }}\">New Concert</a>
    </p>

    {% include '@DataBundle/views/Template/paginator.html.twig' %}
{% endblock %}", "DataBundle:Concert:apiList.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/apiList.html.twig");
    }
}
