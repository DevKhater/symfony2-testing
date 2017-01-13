<?php

/* MKUserBundle:Default:index.html.twig */
class __TwigTemplate_e7765479a8bcb9b35816bd2807994299356f937e80dbd4103de454a8d23d94b6 extends Twig_Template
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
        $__internal_b914a009d7e9352f71679b8b5ff9bb89f69a82789c4d8c04785e62fde2014e5a = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_b914a009d7e9352f71679b8b5ff9bb89f69a82789c4d8c04785e62fde2014e5a->enter($__internal_b914a009d7e9352f71679b8b5ff9bb89f69a82789c4d8c04785e62fde2014e5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle:Default:index.html.twig"));

        // line 1
        echo "Hello World!
";
        
        $__internal_b914a009d7e9352f71679b8b5ff9bb89f69a82789c4d8c04785e62fde2014e5a->leave($__internal_b914a009d7e9352f71679b8b5ff9bb89f69a82789c4d8c04785e62fde2014e5a_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle:Default:index.html.twig";
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
", "MKUserBundle:Default:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/Default/index.html.twig");
    }
}
