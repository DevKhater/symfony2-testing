<?php

/* @Framework/Form/container_attributes.html.php */
class __TwigTemplate_87fe744b386907543ae7749949e0c4bc77d4234948de24ef64aa85a5609e5379 extends Twig_Template
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
        $__internal_74848ac77aac2d342936e595291783b9be2e476bd1db9bbf1f7f109eecb1d359 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_74848ac77aac2d342936e595291783b9be2e476bd1db9bbf1f7f109eecb1d359->enter($__internal_74848ac77aac2d342936e595291783b9be2e476bd1db9bbf1f7f109eecb1d359_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/container_attributes.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>
";
        
        $__internal_74848ac77aac2d342936e595291783b9be2e476bd1db9bbf1f7f109eecb1d359->leave($__internal_74848ac77aac2d342936e595291783b9be2e476bd1db9bbf1f7f109eecb1d359_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/container_attributes.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>
", "@Framework/Form/container_attributes.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/container_attributes.html.php");
    }
}
