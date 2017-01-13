<?php

/* MKUserBundle::base.html.twig */
class __TwigTemplate_744534dfdf174ea865bd7f98bed460cdf15f0c41f7a403f6a65628c23a0f8440 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_c7a70dfb6d7fb0296d79c02483280ac3ea5fa7d63348b80db604f692c3a608e6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_c7a70dfb6d7fb0296d79c02483280ac3ea5fa7d63348b80db604f692c3a608e6->enter($__internal_c7a70dfb6d7fb0296d79c02483280ac3ea5fa7d63348b80db604f692c3a608e6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle::base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_c7a70dfb6d7fb0296d79c02483280ac3ea5fa7d63348b80db604f692c3a608e6->leave($__internal_c7a70dfb6d7fb0296d79c02483280ac3ea5fa7d63348b80db604f692c3a608e6_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_526ddd1af36fc1344abbc12f4fe70d393c4dab19b2a426b779026bdcc244dee9 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_526ddd1af36fc1344abbc12f4fe70d393c4dab19b2a426b779026bdcc244dee9->enter($__internal_526ddd1af36fc1344abbc12f4fe70d393c4dab19b2a426b779026bdcc244dee9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle::base.html.twig"));

        echo "Welcome!";
        
        $__internal_526ddd1af36fc1344abbc12f4fe70d393c4dab19b2a426b779026bdcc244dee9->leave($__internal_526ddd1af36fc1344abbc12f4fe70d393c4dab19b2a426b779026bdcc244dee9_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_ce251cf17f121ec654ae9cb88cf77ec49aeca664083f18199a577da91911d9fd = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_ce251cf17f121ec654ae9cb88cf77ec49aeca664083f18199a577da91911d9fd->enter($__internal_ce251cf17f121ec654ae9cb88cf77ec49aeca664083f18199a577da91911d9fd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle::base.html.twig"));

        
        $__internal_ce251cf17f121ec654ae9cb88cf77ec49aeca664083f18199a577da91911d9fd->leave($__internal_ce251cf17f121ec654ae9cb88cf77ec49aeca664083f18199a577da91911d9fd_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_79227ccf6e44e75dd02fd0d5161f9e87b5caed06fa172b0a62efb281aafb96f4 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_79227ccf6e44e75dd02fd0d5161f9e87b5caed06fa172b0a62efb281aafb96f4->enter($__internal_79227ccf6e44e75dd02fd0d5161f9e87b5caed06fa172b0a62efb281aafb96f4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle::base.html.twig"));

        
        $__internal_79227ccf6e44e75dd02fd0d5161f9e87b5caed06fa172b0a62efb281aafb96f4->leave($__internal_79227ccf6e44e75dd02fd0d5161f9e87b5caed06fa172b0a62efb281aafb96f4_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_0be1d0e59b66a1c88adf278c8117412e4b1c75fa5001091860f4484849e28da5 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0be1d0e59b66a1c88adf278c8117412e4b1c75fa5001091860f4484849e28da5->enter($__internal_0be1d0e59b66a1c88adf278c8117412e4b1c75fa5001091860f4484849e28da5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle::base.html.twig"));

        
        $__internal_0be1d0e59b66a1c88adf278c8117412e4b1c75fa5001091860f4484849e28da5->leave($__internal_0be1d0e59b66a1c88adf278c8117412e4b1c75fa5001091860f4484849e28da5_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>{% block title %}Welcome!{% endblock %}</title>
        {% block stylesheets %}{% endblock %}
        <link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('favicon.ico') }}\" />
    </head>
    <body>
        {% block body %}{% endblock %}
        {% block javascripts %}{% endblock %}
    </body>
</html>
", "MKUserBundle::base.html.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/base.html.twig");
    }
}
