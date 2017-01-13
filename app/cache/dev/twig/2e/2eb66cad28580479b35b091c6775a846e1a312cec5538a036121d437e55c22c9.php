<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_1b3fc7dc120fc66651d0a24f3b508f3aed8098711c46089b4885f29178d79212 extends Twig_Template
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
        $__internal_40555c70efc797ca8316046f6188e5b777a73d433bb2b4e2a5244d26e5581a5a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_40555c70efc797ca8316046f6188e5b777a73d433bb2b4e2a5244d26e5581a5a->enter($__internal_40555c70efc797ca8316046f6188e5b777a73d433bb2b4e2a5244d26e5581a5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.atom.twig", 1)->display($context);
        
        $__internal_40555c70efc797ca8316046f6188e5b777a73d433bb2b4e2a5244d26e5581a5a->leave($__internal_40555c70efc797ca8316046f6188e5b777a73d433bb2b4e2a5244d26e5581a5a_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
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
        return new Twig_Source("{% include '@Twig/Exception/error.xml.twig' %}
", "TwigBundle:Exception:error.atom.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.atom.twig");
    }
}
