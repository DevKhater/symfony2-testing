<?php

/* @Framework/Form/submit_widget.html.php */
class __TwigTemplate_6ca76f811d83f98ce05e11b2207526567008e0c8f619c7ff1ae2b80a388b20c9 extends Twig_Template
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
        $__internal_80c5f144544b6ac6bf1a0b60c0615d318d84122bd083050e1bd396d594a57b39 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_80c5f144544b6ac6bf1a0b60c0615d318d84122bd083050e1bd396d594a57b39->enter($__internal_80c5f144544b6ac6bf1a0b60c0615d318d84122bd083050e1bd396d594a57b39_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/submit_widget.html.php"));

        // line 1
        echo "<?php echo \$view['form']->block(\$form, 'button_widget',  array('type' => isset(\$type) ? \$type : 'submit')) ?>
";
        
        $__internal_80c5f144544b6ac6bf1a0b60c0615d318d84122bd083050e1bd396d594a57b39->leave($__internal_80c5f144544b6ac6bf1a0b60c0615d318d84122bd083050e1bd396d594a57b39_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/submit_widget.html.php";
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
        return new Twig_Source("<?php echo \$view['form']->block(\$form, 'button_widget',  array('type' => isset(\$type) ? \$type : 'submit')) ?>
", "@Framework/Form/submit_widget.html.php", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views/Form/submit_widget.html.php");
    }
}
