<?php

/* MKUserBundle:Default:index.html_2.twig */
class __TwigTemplate_3f4bd6576d50fdcaf40dd0d6788fc7dc2e7a976e02a06577a7b9076836d93aca extends Twig_Template
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
        $__internal_032b951098532ee8386e259c589ac0fe4be43b44b1c52bb2b87e367929935791 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_032b951098532ee8386e259c589ac0fe4be43b44b1c52bb2b87e367929935791->enter($__internal_032b951098532ee8386e259c589ac0fe4be43b44b1c52bb2b87e367929935791_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle:Default:index.html_2.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_032b951098532ee8386e259c589ac0fe4be43b44b1c52bb2b87e367929935791->leave($__internal_032b951098532ee8386e259c589ac0fe4be43b44b1c52bb2b87e367929935791_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle:Default:index.html_2.twig";
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
", "MKUserBundle:Default:index.html_2.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/Default/index.html_2.twig");
    }
}
