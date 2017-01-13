<?php

/* DataBundle:Template:paginator.html.twig */
class __TwigTemplate_2ba24a78990e684f8716d6be6a3f67e070dfe1e621e8cf88aa093c3280188c82 extends Twig_Template
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
        $__internal_cd4bfe2f51a945b170649b255d33c1ac328dd941d040470cfc995637f5a2af6b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cd4bfe2f51a945b170649b255d33c1ac328dd941d040470cfc995637f5a2af6b->enter($__internal_cd4bfe2f51a945b170649b255d33c1ac328dd941d040470cfc995637f5a2af6b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Template:paginator.html.twig"));

        // line 1
        if (((isset($context["maxPages"]) ? $context["maxPages"] : $this->getContext($context, "maxPages")) > 1)) {
            // line 2
            echo "<ul class=\"pagination pagination-sm\">
    ";
            // line 4
            echo "    <li ";
            echo ((((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) == 1)) ? ("class=\"disabled\"") : (""));
            echo ">
        <a href=\"";
            // line 5
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath((isset($context["theIndex"]) ? $context["theIndex"] : $this->getContext($context, "theIndex")), array("offset" => (((((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) - 1) < 1)) ? (1) : (((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) - 1))))), "html", null, true);
            echo "\">«</a>
    </li>

    ";
            // line 9
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, (isset($context["maxPages"]) ? $context["maxPages"] : $this->getContext($context, "maxPages"))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 10
                echo "    <li ";
                echo ((((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) == $context["i"])) ? ("class=\"active\"") : (""));
                echo ">
    <a href=\"";
                // line 11
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath((isset($context["theIndex"]) ? $context["theIndex"] : $this->getContext($context, "theIndex")), array("offset" => $context["i"])), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["i"], "html", null, true);
                echo "</a>
    </li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "
    ";
            // line 16
            echo "    <li ";
            echo ((((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) == (isset($context["maxPages"]) ? $context["maxPages"] : $this->getContext($context, "maxPages")))) ? ("class=\"disabled\"") : (""));
            echo ">
        <a href=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath((isset($context["theIndex"]) ? $context["theIndex"] : $this->getContext($context, "theIndex")), array("offset" => (((((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) + 1) <= (isset($context["maxPages"]) ? $context["maxPages"] : $this->getContext($context, "maxPages")))) ? (((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")) + 1)) : ((isset($context["thisPage"]) ? $context["thisPage"] : $this->getContext($context, "thisPage")))))), "html", null, true);
            echo "\">»</a>
    </li>
</ul>
";
        }
        
        $__internal_cd4bfe2f51a945b170649b255d33c1ac328dd941d040470cfc995637f5a2af6b->leave($__internal_cd4bfe2f51a945b170649b255d33c1ac328dd941d040470cfc995637f5a2af6b_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Template:paginator.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 17,  62 => 16,  59 => 14,  48 => 11,  43 => 10,  38 => 9,  32 => 5,  27 => 4,  24 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if maxPages > 1 %}
<ul class=\"pagination pagination-sm\">
    {# `«` arrow  #}
    <li {{ thisPage == 1 ? 'class=\"disabled\"' }}>
        <a href=\"{{ path(theIndex, {offset: thisPage-1 < 1 ? 1 : thisPage-1}) }}\">«</a>
    </li>

    {# Render each offset number #}
    {% for i in 1..maxPages %}
    <li {{ thisPage == i ? 'class=\"active\"' }}>
    <a href=\"{{ path(theIndex, {offset: i}) }}\">{{ i }}</a>
    </li>
    {% endfor %}

    {# `»` arrow #}
    <li {{ thisPage == maxPages ? 'class=\"disabled\"' }}>
        <a href=\"{{ path(theIndex, {offset: thisPage+1 <= maxPages ? thisPage+1 : thisPage}) }}\">»</a>
    </li>
</ul>
{% endif %}", "DataBundle:Template:paginator.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Template/paginator.html.twig");
    }
}
