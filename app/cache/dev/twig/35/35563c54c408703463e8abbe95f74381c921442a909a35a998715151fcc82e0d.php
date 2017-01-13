<?php

/* DataBundle:Location:edit.html.twig */
class __TwigTemplate_0ea99728077a7a258cdb490079e8b1498ed06d588ddec8db09f26f9ab99240b0 extends Twig_Template
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
        $__internal_055fd109a1a44a9832abd3c2580045dc8be4289cb7aeee4e8533a898ed7956d0 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_055fd109a1a44a9832abd3c2580045dc8be4289cb7aeee4e8533a898ed7956d0->enter($__internal_055fd109a1a44a9832abd3c2580045dc8be4289cb7aeee4e8533a898ed7956d0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "DataBundle:Location:edit.html.twig"));

        // line 1
        echo "<form enctype=\"multipart/form-data\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("data_locationcrud_edit", array("id" => (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")))), "html", null, true);
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
        
        $__internal_055fd109a1a44a9832abd3c2580045dc8be4289cb7aeee4e8533a898ed7956d0->leave($__internal_055fd109a1a44a9832abd3c2580045dc8be4289cb7aeee4e8533a898ed7956d0_prof);

    }

    public function getTemplateName()
    {
        return "DataBundle:Location:edit.html.twig";
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
        return new Twig_Source("<form enctype=\"multipart/form-data\" action=\"{{ path('data_locationcrud_edit', {'id' : name})}}\" class=\"\" method=\"POST\">
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

</form>", "DataBundle:Location:edit.html.twig", "/home/michelk9/public_html/myBackEnd/src/DataBundle/Resources/views/Location/edit.html.twig");
    }
}
