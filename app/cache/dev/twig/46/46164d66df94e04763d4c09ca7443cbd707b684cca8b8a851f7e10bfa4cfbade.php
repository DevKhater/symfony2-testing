<?php

/* DataBundle:Concert:index.html.twig */
class __TwigTemplate_1bce9b10eda09ec7e79f9eaa2676c2d0cb3d1c08f0a849c9c416f658075a5d39 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_e2304258f19ccd1c69ad81526d8745415877da756fc5dd6d83a55e2082e61bdd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e2304258f19ccd1c69ad81526d8745415877da756fc5dd6d83a55e2082e61bdd->enter($__internal_e2304258f19ccd1c69ad81526d8745415877da756fc5dd6d83a55e2082e61bdd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:index.html.twig"));

        // line 1
        echo "Hello World - 

";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["concerts"]) ? $context["concerts"] : $this->getContext($context, "concerts")));
        echo "

";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["concerts"]) ? $context["concerts"] : $this->getContext($context, "concerts")));
        foreach ($context['_seq'] as $context["_key"] => $context["concert"]) {
            // line 6
            echo "    ";
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["concert"], "date", array())), "html", null, true);
            echo "<br/>
    ";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["concert"], "band", array()), "name", array()), "html", null, true);
            echo "<br/>
    ";
            // line 8
            if ($this->getAttribute($this->getAttribute($context["concert"], "location", array(), "any", false, true), "name", array(), "any", true, true)) {
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["concert"], "location", array()), "name", array()), "html", null, true);
            }
            echo "<br/>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['concert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "
 ";
        // line 11
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Concert:index.html.twig", 11)->display($context);
        
        $__internal_e2304258f19ccd1c69ad81526d8745415877da756fc5dd6d83a55e2082e61bdd->leave($__internal_e2304258f19ccd1c69ad81526d8745415877da756fc5dd6d83a55e2082e61bdd_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 11,  54 => 10,  44 => 8,  40 => 7,  35 => 6,  31 => 5,  26 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("Hello World - 

{{dump(concerts)}}

{% for concert in concerts %}
    {{concert.date | date}}<br/>
    {{concert.band.name}}<br/>
    {% if concert.location.name is defined %}{{concert.location.name}}{%endif%}<br/>
    {%endfor%}

 {% include '@DataBundle/views/Template/paginator.html.twig' %}
", "DataBundle:Concert:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/index.html.twig");
    }
}
