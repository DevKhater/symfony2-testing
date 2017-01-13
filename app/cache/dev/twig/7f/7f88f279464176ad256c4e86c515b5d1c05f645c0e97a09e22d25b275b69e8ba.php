<?php

/* @Framework/Form/choice_options.html.php */
class __TwigTemplate_d0fbbe3a937a3e90032db3575f9fa68e6cd815d2234a7b1c4f2370aafd242816 extends Twig_Template
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
        $__internal_7ad0abb05b868e6bd25248a64dabeea264c2bed18b69b962ede34cd236aef759 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_7ad0abb05b868e6bd25248a64dabeea264c2bed18b69b962ede34cd236aef759->enter($__internal_7ad0abb05b868e6bd25248a64dabeea264c2bed18b69b962ede34cd236aef759_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_options.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'choice_widget_options') ?>
";
        
        $__internal_7ad0abb05b868e6bd25248a64dabeea264c2bed18b69b962ede34cd236aef759->leave($__internal_7ad0abb05b868e6bd25248a64dabeea264c2bed18b69b962ede34cd236aef759_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_options.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'choice_widget_options') ?>
", "@Framework/Form/choice_options.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/choice_options.html.php");
    }
}
