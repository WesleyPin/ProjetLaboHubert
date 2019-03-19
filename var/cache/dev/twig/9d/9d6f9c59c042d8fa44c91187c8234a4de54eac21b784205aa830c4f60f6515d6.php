<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* front/index.html.twig */
class __TwigTemplate_a0c55f59a30481f4e4e5155608e0906a69638431b4d2ae2e5c8cbeb86f45358b extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "front/index.html.twig", 1);
        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Hello ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "<main id=\"main\">
\t\t<h1>Bienvenue au GeePs</h1>
\t\t<a href=\"#\" class=\"btn\">Réserver une salle</a>

\t\t<div id=\"main_container\">
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Conseil de Laboratoire</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Direction</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Direction adjointe</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Commité de direction</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>

\t\t</div>
\t</main>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "front/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  84 => 6,  75 => 5,  57 => 3,  27 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello {% endblock %}

{% block body %}
<main id=\"main\">
\t\t<h1>Bienvenue au GeePs</h1>
\t\t<a href=\"#\" class=\"btn\">Réserver une salle</a>

\t\t<div id=\"main_container\">
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Conseil de Laboratoire</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Direction</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Direction adjointe</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>
\t\t\t<a href=\"#\" class=\"no_style\">
\t\t\t\t<div class=\"item vertical_align\">
          <div>
  \t\t\t\t\t<h2>Commité de direction</h2>
  \t\t\t\t</div>
        </div>
\t\t\t</a>

\t\t</div>
\t</main>
{% endblock %}
", "front/index.html.twig", "/home/projet/trombinoscope/templates/front/index.html.twig");
    }
}
