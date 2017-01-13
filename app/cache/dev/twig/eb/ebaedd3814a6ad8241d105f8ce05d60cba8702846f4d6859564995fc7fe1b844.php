<?php

/* MKUserBundle:Security:login.html.twig */
class __TwigTemplate_51e432bd7f2833a78c1bfebe49a205fcbeb1e7523dbca25499bf38af8dac0d8a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "MKUserBundle:Security:login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_01c8719bf0ea43e0177c297a1bd9c252645db5892941760390d15d2f3166a43e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_01c8719bf0ea43e0177c297a1bd9c252645db5892941760390d15d2f3166a43e->enter($__internal_01c8719bf0ea43e0177c297a1bd9c252645db5892941760390d15d2f3166a43e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MKUserBundle:Security:login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_01c8719bf0ea43e0177c297a1bd9c252645db5892941760390d15d2f3166a43e->leave($__internal_01c8719bf0ea43e0177c297a1bd9c252645db5892941760390d15d2f3166a43e_prof);

    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        $__internal_2e3991588618547ccdb79a668fe27dadab9373821d385eebe4f65ddb79e207f6 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2e3991588618547ccdb79a668fe27dadab9373821d385eebe4f65ddb79e207f6->enter($__internal_2e3991588618547ccdb79a668fe27dadab9373821d385eebe4f65ddb79e207f6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "MKUserBundle:Security:login.html.twig"));

        // line 3
        echo "    <form action=\"";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("login_check");
        echo "\" method=\"post\">
";
        // line 9
        echo "        <div>
            <label for=\"username\">Username</label>
            <input type=\"text\" id=\"username\" name=\"_username\"/>
        </div>
        <div>
            <label for=\"password\">Password:</label>
            <input type=\"password\" id=\"password\" name=\"_password\" />
        </div>
        <br/>
        <button type=\"submit\">Login</button>
    </form>
";
        
        $__internal_2e3991588618547ccdb79a668fe27dadab9373821d385eebe4f65ddb79e207f6->leave($__internal_2e3991588618547ccdb79a668fe27dadab9373821d385eebe4f65ddb79e207f6_prof);

    }

    public function getTemplateName()
    {
        return "MKUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 9,  40 => 3,  34 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'base.html.twig' %}
{% block body %}
    <form action=\"{{ path('login_check') }}\" method=\"post\">
{#        {% if error %}
            <div class=\"alert alert-danger\">
                {{ error.messageKey|trans(error.messageData) }}
            </div>
        {% endif %}
#}        <div>
            <label for=\"username\">Username</label>
            <input type=\"text\" id=\"username\" name=\"_username\"/>
        </div>
        <div>
            <label for=\"password\">Password:</label>
            <input type=\"password\" id=\"password\" name=\"_password\" />
        </div>
        <br/>
        <button type=\"submit\">Login</button>
    </form>
{% endblock %}", "MKUserBundle:Security:login.html.twig", "/home/michelk9/public_html/myBackEnd/src/MK/UserBundle/Resources/views/Security/login.html.twig");
    }
}
