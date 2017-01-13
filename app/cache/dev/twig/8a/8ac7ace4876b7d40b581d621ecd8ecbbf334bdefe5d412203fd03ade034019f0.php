<?php

/* @Framework/Form/search_widget.html.php */
class __TwigTemplate_78cb4bdd821ef25a80d1cb7f9c9e69f0731e8e87732ba64615767905f79af252 extends Twig_Template
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
        $__internal_5a100573e08a3bbdb3b591a8f359815778f78d8202e61a85f5caafcf2cb8c404 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5a100573e08a3bbdb3b591a8f359815778f78d8202e61a85f5caafcf2cb8c404->enter($__internal_5a100573e08a3bbdb3b591a8f359815778f78d8202e61a85f5caafcf2cb8c404_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/search_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple',  array('type' => isset(\$type) ? \$type : 'search')) ?>
";
        
        $__internal_5a100573e08a3bbdb3b591a8f359815778f78d8202e61a85f5caafcf2cb8c404->leave($__internal_5a100573e08a3bbdb3b591a8f359815778f78d8202e61a85f5caafcf2cb8c404_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/search_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple',  array('type' => isset(\$type) ? \$type : 'search')) ?>
", "@Framework/Form/search_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/search_widget.html.php");
    }
}
