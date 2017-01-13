<?php

/* AngularBundle:Default:index.html.twig */
class __TwigTemplate_7060affdb2aeadf942d2109d6d1187fab94e58be25c75967fc484df82dd64640 extends Twig_Template
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
        $__internal_2ebb6ee7327c244b56dbd6572405874b1bcb0a585ffb5391b4c1d67f40ffd397 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_2ebb6ee7327c244b56dbd6572405874b1bcb0a585ffb5391b4c1d67f40ffd397->enter($__internal_2ebb6ee7327c244b56dbd6572405874b1bcb0a585ffb5391b4c1d67f40ffd397_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AngularBundle:Default:index.html.twig"));

        // line 1
        echo "<!doctype html>
<html>
    <head>
        <title>Angular JS</title>
        <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-material/angular-material.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-growl-v2/build/angular-growl.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/bootstrap/dist/css/bootstrap.min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/angular/css/style.css"), "html", null, true);
        echo "\">

        <!-- AngularJS File -->
        <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/fosjsrouting/js/router.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fos_js_routing_js", array("callback" => "fos.Router.setData"));
        echo "\"></script>
        <script src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular/angular.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-route/angular-route.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-aria/angular-aria.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-messages/angular-messages.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-animate/angular-animate.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-growl-v2/build/angular-growl.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-paging/dist/paging.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/ng-file-upload/ng-file-upload.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("/bower_components/angular-ui-utils/ui-utils.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("/bower_components/angular-ui-map/ui-map.js"), "html", null, true);
        echo "\"></script>
        <!-- Angular Material Library -->
        <script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bower_components/angular-material/angular-material.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/angular/js/module.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/angular/js/directives.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/angular/js/services.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/angular/js/newCon.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"http://maps.google.com/maps/api/js?libraries=places&sensor=false\"></script>
";
        // line 34
        echo "        <style>
            .map-canvas { height: 400px; }
        </style>
    </head>
    <body ng-app='mainApp'>
        <login-status status=";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["loggedIn"]) ? $context["loggedIn"] : $this->getContext($context, "loggedIn")), "html", null, true);
        echo "></login-status>
        <div id=\"main\" ng-view md-theme=\"default\"></div>
        
        
    </body>
</html> 
";
        
        $__internal_2ebb6ee7327c244b56dbd6572405874b1bcb0a585ffb5391b4c1d67f40ffd397->leave($__internal_2ebb6ee7327c244b56dbd6572405874b1bcb0a585ffb5391b4c1d67f40ffd397_prof);

    }

    public function getTemplateName()
    {
        return "AngularBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 39,  117 => 34,  112 => 29,  108 => 28,  104 => 27,  100 => 26,  95 => 24,  90 => 22,  86 => 21,  82 => 20,  78 => 19,  74 => 18,  70 => 17,  66 => 16,  62 => 15,  58 => 14,  54 => 13,  50 => 12,  46 => 11,  40 => 8,  36 => 7,  32 => 6,  28 => 5,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html>
    <head>
        <title>Angular JS</title>
        <link rel=\"stylesheet\" href=\"{{asset(\"bower_components/angular-material/angular-material.css\")}}\">
        <link rel=\"stylesheet\" href=\"{{asset(\"bower_components/angular-growl-v2/build/angular-growl.min.css\")}}\">
        <link rel=\"stylesheet\" href=\"{{asset(\"bower_components/bootstrap/dist/css/bootstrap.min.css\")}}\">
        <link rel=\"stylesheet\" href=\"{{asset(\"bundles/angular/css/style.css\")}}\">

        <!-- AngularJS File -->
        <script src=\"{{ asset('bundles/fosjsrouting/js/router.js') }}\"></script>
        <script src=\"{{ path('fos_js_routing_js', { callback: 'fos.Router.setData' }) }}\"></script>
        <script src=\"{{asset(\"bower_components/angular/angular.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-route/angular-route.min.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-aria/angular-aria.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-messages/angular-messages.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-animate/angular-animate.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-growl-v2/build/angular-growl.min.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/angular-paging/dist/paging.js\")}}\"></script>
        <script src=\"{{asset(\"bower_components/ng-file-upload/ng-file-upload.js\")}}\"></script>
        <script src=\"{{asset(\"/bower_components/angular-ui-utils/ui-utils.min.js\")}}\"></script>
        <script src=\"{{asset(\"/bower_components/angular-ui-map/ui-map.js\")}}\"></script>
        <!-- Angular Material Library -->
        <script src=\"{{asset(\"bower_components/angular-material/angular-material.min.js\")}}\"></script>

        <script src=\"{{asset(\"bundles/angular/js/module.js\")}}\"></script>
        <script src=\"{{asset(\"bundles/angular/js/directives.js\")}}\"></script>
        <script src=\"{{asset(\"bundles/angular/js/services.js\")}}\"></script>
        <script src=\"{{asset(\"bundles/angular/js/newCon.js\")}}\"></script>
<script type=\"text/javascript\" src=\"http://maps.google.com/maps/api/js?libraries=places&sensor=false\"></script>
{#
        <script src=\"http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=onGoogleReady\"></script> 
#}
        <style>
            .map-canvas { height: 400px; }
        </style>
    </head>
    <body ng-app='mainApp'>
        <login-status status={{loggedIn}}></login-status>
        <div id=\"main\" ng-view md-theme=\"default\"></div>
        
        
    </body>
</html> 
", "AngularBundle:Default:index.html.twig", "/home/michelk9/public_html/myBackEnd/src/AngularBundle/Resources/views/Default/index.html.twig");
    }
}
