<?php

/* DataBundle:Media:index.html.twig */
class __TwigTemplate_d1004b54a50be72d7d28e7c328538374a958b7bc96256e69b9aaf76a8a3ffbaf extends Twig_Template
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
        $__internal_b7240d284ce380663f98f988cce9fcafc9658593890a2fca45b8ce1974436a21 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b7240d284ce380663f98f988cce9fcafc9658593890a2fca45b8ce1974436a21->enter($__internal_b7240d284ce380663f98f988cce9fcafc9658593890a2fca45b8ce1974436a21_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Media:index.html.twig"));

        // line 1
        echo "Hello World - 

";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["media"]) ? $context["media"] : $this->getContext($context, "media")));
        echo "


 ";
        // line 6
        $this->loadTemplate("@DataBundle/views/Template/paginator.html.twig", "DataBundle:Media:index.html.twig", 6)->display($context);
        
        $__internal_b7240d284ce380663f98f988cce9fcafc9658593890a2fca45b8ce1974436a21->leave($__internal_b7240d284ce380663f98f988cce9fcafc9658593890a2fca45b8ce1974436a21_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Media:index.html.twig";
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

{{dump(media)}}


 {% include '@DataBundle/views/Template/paginator.html.twig' %}
", "DataBundle:Media:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Media/index.html.twig");
    }
}
