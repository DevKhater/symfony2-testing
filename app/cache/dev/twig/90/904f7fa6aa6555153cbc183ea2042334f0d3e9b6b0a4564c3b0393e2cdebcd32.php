<?php

/* @Framework/Form/button_row.html.php */
class __TwigTemplate_9ec8af6653d27c445117c9dfaa662b80ea1c00c692fa465dffacdbe618bc66e8 extends Twig_Template
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
        $__internal_f774c3054df7d5c38463e970beaea9fa685169d7b512a33c52599af23e13bfae = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_f774c3054df7d5c38463e970beaea9fa685169d7b512a33c52599af23e13bfae->enter($__internal_f774c3054df7d5c38463e970beaea9fa685169d7b512a33c52599af23e13bfae_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/button_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_f774c3054df7d5c38463e970beaea9fa685169d7b512a33c52599af23e13bfae->leave($__internal_f774c3054df7d5c38463e970beaea9fa685169d7b512a33c52599af23e13bfae_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/button_row.html.php";
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
        return new Twig_Source("<div>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
", "@Framework/Form/button_row.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/button_row.html.php");
    }
}
