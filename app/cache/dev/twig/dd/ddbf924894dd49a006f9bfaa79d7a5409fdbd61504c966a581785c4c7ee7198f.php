<?php

/* @Framework/FormTable/button_row.html.php */
class __TwigTemplate_becf7d5f1a82e6a2d11b4fb491272663bb292c46c5d5930bb89fb85d3dff4c79 extends Twig_Template
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
        $__internal_5edcfeae6dedae8168823bc05491569484d1ebc20ff127c5033dfd5f6a4abd9e = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_5edcfeae6dedae8168823bc05491569484d1ebc20ff127c5033dfd5f6a4abd9e->enter($__internal_5edcfeae6dedae8168823bc05491569484d1ebc20ff127c5033dfd5f6a4abd9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/button_row.html.php"));

        // line 1
        echo "<tr>
    <td></td>
    <td>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_5edcfeae6dedae8168823bc05491569484d1ebc20ff127c5033dfd5f6a4abd9e->leave($__internal_5edcfeae6dedae8168823bc05491569484d1ebc20ff127c5033dfd5f6a4abd9e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/button_row.html.php";
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
        return new Twig_Source("<tr>
    <td></td>
    <td>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
", "@Framework/FormTable/button_row.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/FormTable/button_row.html.php");
    }
}
