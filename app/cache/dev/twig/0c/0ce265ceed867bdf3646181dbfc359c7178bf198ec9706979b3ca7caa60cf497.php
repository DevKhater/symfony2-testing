<?php

/* DataBundle:Concert:show.html.twig */
class __TwigTemplate_dd27b9cc7e5051888e728b13434d3e028e612e248343bf3d08c313267ae31769 extends Twig_Template
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
        $__internal_5e86a0402651167eb61dd45df80410904d65e678049338675eec7c421ca354ef = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5e86a0402651167eb61dd45df80410904d65e678049338675eec7c421ca354ef->enter($__internal_5e86a0402651167eb61dd45df80410904d65e678049338675eec7c421ca354ef_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:show.html.twig"));

        // line 1
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        
        $__internal_5e86a0402651167eb61dd45df80410904d65e678049338675eec7c421ca354ef->leave($__internal_5e86a0402651167eb61dd45df80410904d65e678049338675eec7c421ca354ef_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:show.html.twig";
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
        return new Twig_Source("{{dump(data)}}", "DataBundle:Concert:show.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/show.html.twig");
    }
}
