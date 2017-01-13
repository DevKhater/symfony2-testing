<?php

/* @Framework/Form/form.html.php */
class __TwigTemplate_f0d5a15fd2a83f5b4c11b9b92b8dcd2b671af0aa5ca3f2780313736b364a3c31 extends Twig_Template
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
        $__internal_becc65a468b9b2fbeb76a93583ee0a0aaeefb05eb8fa439908418e4a89e7776d = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_becc65a468b9b2fbeb76a93583ee0a0aaeefb05eb8fa439908418e4a89e7776d->enter($__internal_becc65a468b9b2fbeb76a93583ee0a0aaeefb05eb8fa439908418e4a89e7776d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form.html.php"));

        // line 1
        echo "<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
";
        
        $__internal_becc65a468b9b2fbeb76a93583ee0a0aaeefb05eb8fa439908418e4a89e7776d->leave($__internal_becc65a468b9b2fbeb76a93583ee0a0aaeefb05eb8fa439908418e4a89e7776d_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->start(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
<?php echo \$view['form']->end(\$form) ?>
", "@Framework/Form/form.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/form.html.php");
    }
}
