<?php

/* NelmioApiDocBundle:Components:motd.html.twig */
class __TwigTemplate_19d51e897aa1145b467f913a7497f6d39cef24e1878192ff238b3b1357417419 extends Twig_Template
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
        $__internal_1c1e6ae7a830735df594ebf0e53c99cafe31035fb6bdad8ab6e8d53817e130dd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_1c1e6ae7a830735df594ebf0e53c99cafe31035fb6bdad8ab6e8d53817e130dd->enter($__internal_1c1e6ae7a830735df594ebf0e53c99cafe31035fb6bdad8ab6e8d53817e130dd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "NelmioApiDocBundle:Components:motd.html.twig"));

        // line 1
        echo "<div class=\"motd\"></div>
";
        
        $__internal_1c1e6ae7a830735df594ebf0e53c99cafe31035fb6bdad8ab6e8d53817e130dd->leave($__internal_1c1e6ae7a830735df594ebf0e53c99cafe31035fb6bdad8ab6e8d53817e130dd_prof);

    }

    public function getTemplateName()
    {
        return "NelmioApiDocBundle:Components:motd.html.twig";
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
        return new Twig_Source("<div class=\"motd\"></div>
", "NelmioApiDocBundle:Components:motd.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/nelmio/api-doc-bundle/Nelmio/ApiDocBundle/Resources/views/Components/motd.html.twig");
    }
}
