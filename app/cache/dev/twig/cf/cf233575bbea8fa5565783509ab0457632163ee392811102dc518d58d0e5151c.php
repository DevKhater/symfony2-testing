<?php

/* MKApiBundle:Default:index.html.twig */
class __TwigTemplate_3cabbfef4f23149fd1f4e6750efe90e9858f12e5e06119165303c9d7a8d83d4e extends Twig_Template
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
        $__internal_53ddd6b506cad5c91a1b280b072cea1c803c12c0f0c51937516c302dc2f7c75a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_53ddd6b506cad5c91a1b280b072cea1c803c12c0f0c51937516c302dc2f7c75a->enter($__internal_53ddd6b506cad5c91a1b280b072cea1c803c12c0f0c51937516c302dc2f7c75a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKApiBundle:Default:index.html.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_53ddd6b506cad5c91a1b280b072cea1c803c12c0f0c51937516c302dc2f7c75a->leave($__internal_53ddd6b506cad5c91a1b280b072cea1c803c12c0f0c51937516c302dc2f7c75a_prof);

    }

    public function getTemplateName()
    {
        return "MKApiBundle:Default:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("Hello World!
", "MKApiBundle:Default:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/MK/ApiBundle/Resources/views/Default/index.html.twig");
    }
}
