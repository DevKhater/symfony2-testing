<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_c3e855ee261930b2b01faa5331352d4e82d2e95c43b337768b3be8508641e537 extends Twig_Template
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
        $__internal_fbc1daeb225300c6d456ae1addcd14ee41b06be487b64f6830ba7c2ea9a8f816 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_fbc1daeb225300c6d456ae1addcd14ee41b06be487b64f6830ba7c2ea9a8f816->enter($__internal_fbc1daeb225300c6d456ae1addcd14ee41b06be487b64f6830ba7c2ea9a8f816_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.rdf.twig", 1)->display($context);
        
        $__internal_fbc1daeb225300c6d456ae1addcd14ee41b06be487b64f6830ba7c2ea9a8f816->leave($__internal_fbc1daeb225300c6d456ae1addcd14ee41b06be487b64f6830ba7c2ea9a8f816_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
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
", "TwigBundle:Exception:error.rdf.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/error.rdf.twig");
    }
}
