<?php

/* DataBundle:Band:edit.html.twig */
class __TwigTemplate_34aa17788762fb52b939ef30570c155a1f50d691d84084b30ccb418b63cbb610 extends Twig_Template
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
        $__internal_830684d4518b0e169b8f2d4d1084c35913e75b74e0d9ec917e5340edffa5f007 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_830684d4518b0e169b8f2d4d1084c35913e75b74e0d9ec917e5340edffa5f007->enter($__internal_830684d4518b0e169b8f2d4d1084c35913e75b74e0d9ec917e5340edffa5f007_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Band:edit.html.twig"));

        // line 1
        echo "<form enctype=\"multipart/form-data\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("data_bandcrud_edit", array("slug" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
        echo "\" class=\"\" method=\"POST\">
    <div class=\"form-group\">
        <label for=\"name\">Band Name</label>
        ";
        // line 4
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget');
        echo "
    </div>
    <div class=\"form-group\">
        <label for=\"genre\">Genre</label>
        ";
        // line 8
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "genre", array()), 'widget');
        echo "
    </div>
";
        // line 14
        echo "    ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
    ";
        // line 15
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'row');
        echo "
    <input type=\"submit\" class=\"btn btn-default\" value=\"Save\"/>

</form>";
        
        $__internal_830684d4518b0e169b8f2d4d1084c35913e75b74e0d9ec917e5340edffa5f007->leave($__internal_830684d4518b0e169b8f2d4d1084c35913e75b74e0d9ec917e5340edffa5f007_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Band:edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 15,  41 => 14,  36 => 8,  29 => 4,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<form enctype=\"multipart/form-data\" action=\"{{ path('data_bandcrud_edit', {'slug' : name})}}\" class=\"\" method=\"POST\">
    <div class=\"form-group\">
        <label for=\"name\">Band Name</label>
        {{ form_widget(form.name)}}
    </div>
    <div class=\"form-group\">
        <label for=\"genre\">Genre</label>
        {{ form_widget(form.genre)}}
    </div>
{#    <div class=\"form-group\">
        <label for=\"genre\">Image</label>
        {{ form_widget(form.image)}}
    </div>#}
    {{ form_errors(form) }}
    {{ form_row(form._token) }}
    <input type=\"submit\" class=\"btn btn-default\" value=\"Save\"/>

</form>", "DataBundle:Band:edit.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Band/edit.html.twig");
    }
}
