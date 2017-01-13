<?php

/* @Framework/Form/integer_widget.html.php */
class __TwigTemplate_c00fb74dd75e137aabbee6e9eb853dab58b8ab029787520d47217a44b37c19ac extends Twig_Template
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
        $__internal_8a920d21d0fcf1bbc1170984134aedee6b8478f146cbbc16a635a7e3193379e7 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_8a920d21d0fcf1bbc1170984134aedee6b8478f146cbbc16a635a7e3193379e7->enter($__internal_8a920d21d0fcf1bbc1170984134aedee6b8478f146cbbc16a635a7e3193379e7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/integer_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'number')) ?>
";
        
        $__internal_8a920d21d0fcf1bbc1170984134aedee6b8478f146cbbc16a635a7e3193379e7->leave($__internal_8a920d21d0fcf1bbc1170984134aedee6b8478f146cbbc16a635a7e3193379e7_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/integer_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'number')) ?>
", "@Framework/Form/integer_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/integer_widget.html.php");
    }
}
