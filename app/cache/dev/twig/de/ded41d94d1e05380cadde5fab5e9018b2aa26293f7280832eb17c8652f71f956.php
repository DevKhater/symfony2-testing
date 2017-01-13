<?php

/* @Framework/Form/number_widget.html.php */
class __TwigTemplate_ad4a234cd8c70b9640f9dfa9be92731acb17f217d14d3dd0b1982b9ca96e6ca7 extends Twig_Template
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
        $__internal_cbb90f57c1ec7e80978c7604fd55a85b5eabd57e2b4a619d839663ff5f90c9d2 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cbb90f57c1ec7e80978c7604fd55a85b5eabd57e2b4a619d839663ff5f90c9d2->enter($__internal_cbb90f57c1ec7e80978c7604fd55a85b5eabd57e2b4a619d839663ff5f90c9d2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/number_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple',  array('type' => isset(\$type) ? \$type : 'text')) ?>
";
        
        $__internal_cbb90f57c1ec7e80978c7604fd55a85b5eabd57e2b4a619d839663ff5f90c9d2->leave($__internal_cbb90f57c1ec7e80978c7604fd55a85b5eabd57e2b4a619d839663ff5f90c9d2_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/number_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple',  array('type' => isset(\$type) ? \$type : 'text')) ?>
", "@Framework/Form/number_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/number_widget.html.php");
    }
}
