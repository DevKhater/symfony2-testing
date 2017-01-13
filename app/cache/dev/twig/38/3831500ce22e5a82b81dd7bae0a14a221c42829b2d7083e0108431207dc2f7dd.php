<?php

/* @Framework/Form/hidden_widget.html.php */
class __TwigTemplate_c435cc11021346f9247d91d85f8a368e10c198e8284f01c61f1a94feb80e63a0 extends Twig_Template
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
        $__internal_9a92e598b88062a6b1719bbdec56e693ee7abf82f1c9a06f90cf737fca5e5feb = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9a92e598b88062a6b1719bbdec56e693ee7abf82f1c9a06f90cf737fca5e5feb->enter($__internal_9a92e598b88062a6b1719bbdec56e693ee7abf82f1c9a06f90cf737fca5e5feb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'hidden')) ?>
";
        
        $__internal_9a92e598b88062a6b1719bbdec56e693ee7abf82f1c9a06f90cf737fca5e5feb->leave($__internal_9a92e598b88062a6b1719bbdec56e693ee7abf82f1c9a06f90cf737fca5e5feb_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'form_widget_simple', array('type' => isset(\$type) ? \$type : 'hidden')) ?>
", "@Framework/Form/hidden_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/hidden_widget.html.php");
    }
}
