<?php

/* @Framework/Form/attributes.html.php */
class __TwigTemplate_accdd97e91cac86838fdd323ba81938efe968d75305949e5b9cec63ab263c900 extends Twig_Template
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
        $__internal_29afc9294058deb8dfb8f88f3be36512e49ef2c312e1545679ab4f718a96deff = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_29afc9294058deb8dfb8f88f3be36512e49ef2c312e1545679ab4f718a96deff->enter($__internal_29afc9294058deb8dfb8f88f3be36512e49ef2c312e1545679ab4f718a96deff_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/attributes.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
";
        
        $__internal_29afc9294058deb8dfb8f88f3be36512e49ef2c312e1545679ab4f718a96deff->leave($__internal_29afc9294058deb8dfb8f88f3be36512e49ef2c312e1545679ab4f718a96deff_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/attributes.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
", "@Framework/Form/attributes.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/attributes.html.php");
    }
}
