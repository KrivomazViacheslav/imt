<?php

/* index.html */
class __TwigTemplate_b1b427ff80900a6a54b0405c7f97c31c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE>
<html>
\t<head>
\t    <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
\t    <meta http-equiv=\"Content-Type\" content=\"text/html;charset=UTF-8\"/>
\t</head>
\t<body>

\t<div id=\"content\">
\t    ";
        // line 10
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "\t</div>

\t</body>
</html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "\t    ";
    }

    public function getTemplateName()
    {
        return "index.html";
    }

    public function getDebugInfo()
    {
        return array (  52 => 11,  49 => 10,  44 => 4,  37 => 12,  35 => 10,  26 => 4,  21 => 1,  31 => 4,  28 => 3,);
    }
}
