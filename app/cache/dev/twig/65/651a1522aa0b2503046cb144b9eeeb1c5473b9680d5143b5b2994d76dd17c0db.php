<?php

/* DataBundle:Location:show.html.twig */
class __TwigTemplate_8a93e949d79cbdcbd6055e8568df9df1c5326aa55fe322c0a8aba72aca54551e extends Twig_Template
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
        $__internal_b4261c70d617f6e1449270f303023bf36a7b84176161748d7566cf2e28f91666 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b4261c70d617f6e1449270f303023bf36a7b84176161748d7566cf2e28f91666->enter($__internal_b4261c70d617f6e1449270f303023bf36a7b84176161748d7566cf2e28f91666_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Location:show.html.twig"));

        // line 1
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        
        $__internal_b4261c70d617f6e1449270f303023bf36a7b84176161748d7566cf2e28f91666->leave($__internal_b4261c70d617f6e1449270f303023bf36a7b84176161748d7566cf2e28f91666_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Location:show.html.twig";
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
        return new Twig_Source("{{dump(data)}}", "DataBundle:Location:show.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Location/show.html.twig");
    }
}
