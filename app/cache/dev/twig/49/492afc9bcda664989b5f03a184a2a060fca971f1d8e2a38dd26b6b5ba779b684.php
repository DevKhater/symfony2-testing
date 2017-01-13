<?php

/* DataBundle:Band:show.html.twig */
class __TwigTemplate_641747c38a82aa166685407bdea809e1a3a04161ae73495a3d24565d02798d50 extends Twig_Template
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
        $__internal_4077eb5460c3f98ae505844eac9b64110167af9f0186d48cc1942a02ead5dfeb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4077eb5460c3f98ae505844eac9b64110167af9f0186d48cc1942a02ead5dfeb->enter($__internal_4077eb5460c3f98ae505844eac9b64110167af9f0186d48cc1942a02ead5dfeb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:show.html.twig"));

        // line 1
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        
        $__internal_4077eb5460c3f98ae505844eac9b64110167af9f0186d48cc1942a02ead5dfeb->leave($__internal_4077eb5460c3f98ae505844eac9b64110167af9f0186d48cc1942a02ead5dfeb_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
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
        return new Twig_Source("{{dump(data)}}", "DataBundle:Band:show.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/show.html.twig");
    }
}
