<?php

/* @Framework/Form/hidden_row.html.php */
class __TwigTemplate_89940f1c0cbcaf215550845ddfac0297e42f1b13a58bca7e790727bdf33db25a extends Twig_Template
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
        $__internal_2b6e355dab3ff32307e1455ed649dbc79b4cd166b9cc5bb0a394cc843f20f033 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2b6e355dab3ff32307e1455ed649dbc79b4cd166b9cc5bb0a394cc843f20f033->enter($__internal_2b6e355dab3ff32307e1455ed649dbc79b4cd166b9cc5bb0a394cc843f20f033_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/hidden_row.html.php"));

        // line 1
        echo "<?php echo \$view['form']->widget(\$form) ?>
";
        
        $__internal_2b6e355dab3ff32307e1455ed649dbc79b4cd166b9cc5bb0a394cc843f20f033->leave($__internal_2b6e355dab3ff32307e1455ed649dbc79b4cd166b9cc5bb0a394cc843f20f033_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/hidden_row.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->widget(\$form) ?>
", "@Framework/Form/hidden_row.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/hidden_row.html.php");
    }
}
