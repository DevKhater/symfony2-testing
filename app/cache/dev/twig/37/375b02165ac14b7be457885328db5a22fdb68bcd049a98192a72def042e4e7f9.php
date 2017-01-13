<?php

/* DataBundle:Location:index.html.twig */
class __TwigTemplate_65b26e392170f58509851637380b225bede0627d763ca2138d99b5221121a85e extends Twig_Template
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
        $__internal_2f4a65565c3614dfa019a93aa65d7182cb4b8d0c2c4b2c5dbea65e9ac84fd84a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2f4a65565c3614dfa019a93aa65d7182cb4b8d0c2c4b2c5dbea65e9ac84fd84a->enter($__internal_2f4a65565c3614dfa019a93aa65d7182cb4b8d0c2c4b2c5dbea65e9ac84fd84a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Location:index.html.twig"));

        // line 1
        echo "Hello World - 

";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["locations"]) ? $context["locations"] : $this->getContext($context, "locations")));
        echo "


 ";
        // line 6
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Location:index.html.twig", 6)->display($context);
        
        $__internal_2f4a65565c3614dfa019a93aa65d7182cb4b8d0c2c4b2c5dbea65e9ac84fd84a->leave($__internal_2f4a65565c3614dfa019a93aa65d7182cb4b8d0c2c4b2c5dbea65e9ac84fd84a_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Location:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 6,  26 => 3,  22 => 1,);
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

{{dump(locations)}}


 {% include '@DataBundle/views/Template/paginator.html.twig' %}
", "DataBundle:Location:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Location/index.html.twig");
    }
}
