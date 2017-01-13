<?php

/* DataBundle:Concert:edit.html.twig */
class __TwigTemplate_28dad431f336d52b0d1eb2c5a980d561ce5cb846f1e71bbe0150c8b2913616a5 extends Twig_Template
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
        $__internal_e727c3e9197c3eb5e79c8c0890c269191c6255ce75c31525dd0060fb1fbe778e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_e727c3e9197c3eb5e79c8c0890c269191c6255ce75c31525dd0060fb1fbe778e->enter($__internal_e727c3e9197c3eb5e79c8c0890c269191c6255ce75c31525dd0060fb1fbe778e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Concert:edit.html.twig"));

        // line 1
        echo "<form enctype=\"multipart/form-data\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("data_concertcrud_edit", array("id" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
        echo "\" class=\"\" method=\"POST\">
    <div class=\"form-group\">
        ";
        // line 3
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
    </div>
    
    ";
        // line 18
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    ";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
    <input type=\"submit\" class=\"btn btn-default\" value=\"Save\"/>

</form>";
        
        $__internal_e727c3e9197c3eb5e79c8c0890c269191c6255ce75c31525dd0060fb1fbe778e->leave($__internal_e727c3e9197c3eb5e79c8c0890c269191c6255ce75c31525dd0060fb1fbe778e_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Concert:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 19,  34 => 18,  28 => 3,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form enctype=\"multipart/form-data\" action=\"{{ path('data_concertcrud_edit', {'id' : name})}}\" class=\"\" method=\"POST\">
    <div class=\"form-group\">
        {{ form_widget(form)}}
    </div>
    
    {#<div class=\"form-group\">
        <label for=\"name\">Band Name</label>
        {{ form_widget(form.name)}}
    </div>
    <div class=\"form-group\">
        <label for=\"genre\">Genre</label>
        {{ form_widget(form.genre)}}
    </div>#}
{#    <div class=\"form-group\">
        <label for=\"genre\">Image</label>
        {{ form_widget(form.image)}}
    </div>#}
    {{ form_errors(form) }}
    {{ form_row(form._token) }}
    <input type=\"submit\" class=\"btn btn-default\" value=\"Save\"/>

</form>", "DataBundle:Concert:edit.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Concert/edit.html.twig");
    }
}
