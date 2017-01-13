<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_62d55d9b779f357ca84ac54a05eab0c2afc30c9b75395f15cda9e00b2be2a9ec extends Twig_Template
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
        $__internal_cc59f2cb30fcf0f3b6ff100e30d617942fdc1b9caafea811db36448dd89c1509 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_cc59f2cb30fcf0f3b6ff100e30d617942fdc1b9caafea811db36448dd89c1509->enter($__internal_cc59f2cb30fcf0f3b6ff100e30d617942fdc1b9caafea811db36448dd89c1509_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_cc59f2cb30fcf0f3b6ff100e30d617942fdc1b9caafea811db36448dd89c1509->leave($__internal_cc59f2cb30fcf0f3b6ff100e30d617942fdc1b9caafea811db36448dd89c1509_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
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
        return new Twig_Source("<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
", "@Framework/FormTable/hidden_row.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/FormTable/hidden_row.html.php");
    }
}
