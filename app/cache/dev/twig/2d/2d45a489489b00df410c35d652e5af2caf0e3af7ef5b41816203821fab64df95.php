<?php

/* DataBundle:Media:show.html.twig */
class __TwigTemplate_f5c418c823ef1d46a4147f4eeb320a3b4208b387fd2237441ffa24d3abaeedfe extends Twig_Template
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
        $__internal_d45eb35b140719271cb85e92df6b26a232b2e0d2cd72e7f805eb74ab848ccc3b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_d45eb35b140719271cb85e92df6b26a232b2e0d2cd72e7f805eb74ab848ccc3b->enter($__internal_d45eb35b140719271cb85e92df6b26a232b2e0d2cd72e7f805eb74ab848ccc3b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Media:show.html.twig"));

        // line 1
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\DumpExtension')->dump($this->env, $context, (isset($context["data"]) ? $context["data"] : $this->getContext($context, "data")));
        
        $__internal_d45eb35b140719271cb85e92df6b26a232b2e0d2cd72e7f805eb74ab848ccc3b->leave($__internal_d45eb35b140719271cb85e92df6b26a232b2e0d2cd72e7f805eb74ab848ccc3b_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Media:show.html.twig";
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
        return new Twig_Source("{{dump(data)}}", "DataBundle:Media:show.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Media/show.html.twig");
    }
}
