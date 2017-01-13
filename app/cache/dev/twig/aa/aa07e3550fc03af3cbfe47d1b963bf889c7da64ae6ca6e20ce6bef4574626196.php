<?php

/* DataBundle:Band:index.html.twig */
class __TwigTemplate_ef56a17fc9d21ee6b85628d8b0a6fa8bf3cceff6c0685b0ab3f45e109c988491 extends Twig_Template
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
        $__internal_b8e12d301ec0d12d9d1ae23867b26799aba0c42263f76c96ab1379e5990c752d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8e12d301ec0d12d9d1ae23867b26799aba0c42263f76c96ab1379e5990c752d->enter($__internal_b8e12d301ec0d12d9d1ae23867b26799aba0c42263f76c96ab1379e5990c752d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:index.html.twig"));

        // line 1
        echo "Hello World - 

";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["bands"]) ? $context["bands"] : $this->getContext($context, "bands")));
        echo "


 ";
        // line 6
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Band:index.html.twig", 6)->display($context);
        
        $__internal_b8e12d301ec0d12d9d1ae23867b26799aba0c42263f76c96ab1379e5990c752d->leave($__internal_b8e12d301ec0d12d9d1ae23867b26799aba0c42263f76c96ab1379e5990c752d_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:index.html.twig";
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

{{dump(bands)}}


 {% include '@DataBundle/views/Template/paginator.html.twig' %}
", "DataBundle:Band:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/index.html.twig");
    }
}
