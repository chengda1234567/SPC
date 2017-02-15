<?php

/* demo.html */
class __TwigTemplate_c4269e2876b661a2f3da96853368cafc37ed9829ced52cf0ff8ab48da17f45db extends Twig_Template
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
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title>demo1234</title>
</head>
<body>
";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["demo"]) ? $context["demo"] : null), "title", array()), "html", null, true);
        echo "
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "demo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 7,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "demo.html", "D:\\code\\www.cpser.com\\app\\demo\\views\\demo.html");
    }
}
