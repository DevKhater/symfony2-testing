<?php

/* @Framework/Form/reset_widget.html.php */
class __TwigTemplate_6ce2cd590b7cd0baac738aa80162c308699b3008300c63318cb0d2ae3389d4e0 extends Twig_Template
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
        $__internal_a33097a192b855cca08d0c934f6d6ace29cbe4e09ae3351c1f9b0f544869d4be = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_a33097a192b855cca08d0c934f6d6ace29cbe4e09ae3351c1f9b0f544869d4be->enter($__internal_a33097a192b855cca08d0c934f6d6ace29cbe4e09ae3351c1f9b0f544869d4be_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/reset_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'button_widget',  array('type' => isset(\$type) ? \$type : 'reset')) ?>
";
        
        $__internal_a33097a192b855cca08d0c934f6d6ace29cbe4e09ae3351c1f9b0f544869d4be->leave($__internal_a33097a192b855cca08d0c934f6d6ace29cbe4e09ae3351c1f9b0f544869d4be_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/reset_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'button_widget',  array('type' => isset(\$type) ? \$type : 'reset')) ?>
", "@Framework/Form/reset_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/reset_widget.html.php");
    }
}
