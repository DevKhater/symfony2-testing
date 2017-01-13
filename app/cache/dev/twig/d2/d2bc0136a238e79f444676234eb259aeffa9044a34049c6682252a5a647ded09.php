<?php

/* TwigBundle:Exception:exception_full.html.twig */
class __TwigTemplate_f38580c77d06d81e9417c08f7744d86ff46d5442e32b97b104389e97f2b8ef49 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "TwigBundle:Exception:exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_80aa5c72a9afc39549b571a6704c70098e3a186f501b3b984f993f62fec2dd66 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_80aa5c72a9afc39549b571a6704c70098e3a186f501b3b984f993f62fec2dd66->enter($__internal_80aa5c72a9afc39549b571a6704c70098e3a186f501b3b984f993f62fec2dd66_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_80aa5c72a9afc39549b571a6704c70098e3a186f501b3b984f993f62fec2dd66->leave($__internal_80aa5c72a9afc39549b571a6704c70098e3a186f501b3b984f993f62fec2dd66_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_91dea22e3ed1ca3187f618e8b0d113931cb640ac8f3d3e4121996dec8a625732 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_91dea22e3ed1ca3187f618e8b0d113931cb640ac8f3d3e4121996dec8a625732->enter($__internal_91dea22e3ed1ca3187f618e8b0d113931cb640ac8f3d3e4121996dec8a625732_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "TwigBundle:Exception:exception_full.html.twig"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpFoundationExtension')->generateAbsoluteUrl($this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_91dea22e3ed1ca3187f618e8b0d113931cb640ac8f3d3e4121996dec8a625732->leave($__internal_91dea22e3ed1ca3187f618e8b0d113931cb640ac8f3d3e4121996dec8a625732_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_3c812ad3406d5904f4d168cc22d4e35405437f3614da76a6e64127b0b4cdd862 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_3c812ad3406d5904f4d168cc22d4e35405437f3614da76a6e64127b0b4cdd862->enter($__internal_3c812ad3406d5904f4d168cc22d4e35405437f3614da76a6e64127b0b4cdd862_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "TwigBundle:Exception:exception_full.html.twig"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_3c812ad3406d5904f4d168cc22d4e35405437f3614da76a6e64127b0b4cdd862->leave($__internal_3c812ad3406d5904f4d168cc22d4e35405437f3614da76a6e64127b0b4cdd862_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_e56bf766a1f25821489b2f1e42e7ca7cb4b8553b13691bf06dcc5212f50d114d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e56bf766a1f25821489b2f1e42e7ca7cb4b8553b13691bf06dcc5212f50d114d->enter($__internal_e56bf766a1f25821489b2f1e42e7ca7cb4b8553b13691bf06dcc5212f50d114d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "TwigBundle:Exception:exception_full.html.twig"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "TwigBundle:Exception:exception_full.html.twig", 12)->display($context);
        
        $__internal_e56bf766a1f25821489b2f1e42e7ca7cb4b8553b13691bf06dcc5212f50d114d->leave($__internal_e56bf766a1f25821489b2f1e42e7ca7cb4b8553b13691bf06dcc5212f50d114d_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@Twig/layout.html.twig' %}

{% block head %}
    <link href=\"{{ absolute_url(asset('bundles/framework/css/exception.css')) }}\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
{% endblock %}

{% block title %}
    {{ exception.message }} ({{ status_code }} {{ status_text }})
{% endblock %}

{% block body %}
    {% include '@Twig/Exception/exception.html.twig' %}
{% endblock %}
", "TwigBundle:Exception:exception_full.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views/Exception/exception_full.html.twig");
    }
}
