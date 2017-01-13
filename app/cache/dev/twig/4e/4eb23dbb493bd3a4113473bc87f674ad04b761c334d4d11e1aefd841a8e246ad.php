<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_4bef7c9793622ed21896c4292f0214f8137b90f73e4e06bfdd5bd00a1ff66d6b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_0672052ade68d7e778605c22e4db6d31276606c6e5eacaeddf5f8bc15d3a552b = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_0672052ade68d7e778605c22e4db6d31276606c6e5eacaeddf5f8bc15d3a552b->enter($__internal_0672052ade68d7e778605c22e4db6d31276606c6e5eacaeddf5f8bc15d3a552b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_0672052ade68d7e778605c22e4db6d31276606c6e5eacaeddf5f8bc15d3a552b->leave($__internal_0672052ade68d7e778605c22e4db6d31276606c6e5eacaeddf5f8bc15d3a552b_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_9daf257ff555334f77a60adc938978cb61cfbc1d813c69eec21a9e9e567517fc = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_9daf257ff555334f77a60adc938978cb61cfbc1d813c69eec21a9e9e567517fc->enter($__internal_9daf257ff555334f77a60adc938978cb61cfbc1d813c69eec21a9e9e567517fc_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        echo "";
        
        $__internal_9daf257ff555334f77a60adc938978cb61cfbc1d813c69eec21a9e9e567517fc->leave($__internal_9daf257ff555334f77a60adc938978cb61cfbc1d813c69eec21a9e9e567517fc_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% block panel '' %}
", "WebProfilerBundle:Profiler:ajax_layout.html.twig", "/home/michelk9/public_html/myBackEnd/vendor/symfony/symfony/src/Symfony/Bundle/WebProfilerBundle/Resources/views/Profiler/ajax_layout.html.twig");
    }
}
