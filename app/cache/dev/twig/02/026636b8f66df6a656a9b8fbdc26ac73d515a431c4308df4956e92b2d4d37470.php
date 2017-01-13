<?php

/* MKUserBundle:Default:index.html_1.twig */
class __TwigTemplate_b85a2584656e83afda1c1bd6ced12e8a095bfb7555422fce3a4086ad1116dad7 extends Twig_Template
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
        $__internal_4285bcb4d1e418006307ccdb32596b0ba50c8c62547147aa4222f7a5b0fd2910 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_4285bcb4d1e418006307ccdb32596b0ba50c8c62547147aa4222f7a5b0fd2910->enter($__internal_4285bcb4d1e418006307ccdb32596b0ba50c8c62547147aa4222f7a5b0fd2910_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle:Default:index.html_1.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_4285bcb4d1e418006307ccdb32596b0ba50c8c62547147aa4222f7a5b0fd2910->leave($__internal_4285bcb4d1e418006307ccdb32596b0ba50c8c62547147aa4222f7a5b0fd2910_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle:Default:index.html_1.twig";
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
", "MKUserBundle:Default:index.html_1.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/Default/index.html_1.twig");
    }
}
