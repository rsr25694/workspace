<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Sandbox\SecurityNotAllowedTestError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig */
class __TwigTemplate_828a941456e1b92843c2bc7421f3b99c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        yield "
";
        // line 25
        try {
            $_v0 = $this->load("@gin/navigation/fix-toolbar-js-error.html.twig", 25);
        } catch (LoaderError $e) {
            // ignore missing template
            $_v0 = null;
        }
        if ($_v0) {
            yield from $_v0->unwrap()->yield(CoreExtension::merge($context, ["toolbar_variant" =>             // line 26
($context["toolbar_variant"] ?? null), "core_navigation" =>             // line 27
($context["core_navigation"] ?? null)]));
        }
        // line 29
        yield "
";
        // line 31
        if ((($tmp = (($_v1 = (($_v2 = $context) && is_array($_v2) || $_v2 instanceof ArrayAccess && in_array($_v2::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v2["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 31))) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1["tabs"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v3 = $context) && is_array($_v3) || $_v3 instanceof ArrayAccess && in_array($_v3::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v3["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 31)), "tabs", [], "array", false, false, true, 31))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 32
            yield "  ";
            $context["tabs"] = (($_v4 = (($_v5 = $context) && is_array($_v5) || $_v5 instanceof ArrayAccess && in_array($_v5::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v5["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 32))) && is_array($_v4) || $_v4 instanceof ArrayAccess && in_array($_v4::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v4["tabs"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v6 = $context) && is_array($_v6) || $_v6 instanceof ArrayAccess && in_array($_v6::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v6["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 32)), "tabs", [], "array", false, false, true, 32));
        }
        // line 34
        if ((($tmp = (($_v7 = (($_v8 = $context) && is_array($_v8) || $_v8 instanceof ArrayAccess && in_array($_v8::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v8["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 34))) && is_array($_v7) || $_v7 instanceof ArrayAccess && in_array($_v7::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v7["trays"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v9 = $context) && is_array($_v9) || $_v9 instanceof ArrayAccess && in_array($_v9::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v9["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 34)), "trays", [], "array", false, false, true, 34))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "  ";
            $context["trays"] = (($_v10 = (($_v11 = $context) && is_array($_v11) || $_v11 instanceof ArrayAccess && in_array($_v11::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v11["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 35))) && is_array($_v10) || $_v10 instanceof ArrayAccess && in_array($_v10::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v10["trays"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v12 = $context) && is_array($_v12) || $_v12 instanceof ArrayAccess && in_array($_v12::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v12["#secondary"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, $context, "#secondary", [], "array", false, false, true, 35)), "trays", [], "array", false, false, true, 35));
        }
        // line 37
        yield "
<div";
        // line 38
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["toolbar", "toolbar-secondary"], "method", false, false, true, 38), "setAttribute", ["id", "toolbar-administration-secondary"], "method", false, false, true, 38), "html", null, true);
        yield ">
  <nav";
        // line 39
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["toolbar_attributes"] ?? null), "addClass", ["toolbar-bar", "clearfix"], "method", false, false, true, 39), "setAttribute", ["id", "toolbar-bar"], "method", false, false, true, 39), "html", null, true);
        yield ">
    <h2 class=\"visually-hidden\">";
        // line 40
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["toolbar_heading"] ?? null), "html", null, true);
        yield "</h2>

    ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["tabs"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["tab"]) {
            // line 43
            yield "      ";
            $context["tray"] = (($_v13 = ($context["trays"] ?? null)) && is_array($_v13) || $_v13 instanceof ArrayAccess && in_array($_v13::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v13[(($_v14 = $context["key"]) instanceof \Stringable ? (string) $_v14 : $_v14)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["trays"] ?? null), $context["key"], [], "array", false, false, true, 43));
            // line 44
            yield "      ";
            $context["user_menu"] = (((($tmp = (($_v15 = CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 44)) && is_array($_v15) || $_v15 instanceof ArrayAccess && in_array($_v15::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v15["user_links"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 44), "user_links", [], "array", false, false, true, 44))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("user-menu") : (false));
            // line 45
            yield "      ";
            $context["item_id"] = [];
            // line 46
            yield "
      ";
            // line 47
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((($_v16 = (($_v17 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47)) && is_array($_v17) || $_v17 instanceof ArrayAccess && in_array($_v17::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v17["#attributes"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47), "#attributes", [], "array", false, false, true, 47))) && is_array($_v16) || $_v16 instanceof ArrayAccess && in_array($_v16::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v16["class"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, (($_v18 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47)) && is_array($_v18) || $_v18 instanceof ArrayAccess && in_array($_v18::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v18["#attributes"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 47), "#attributes", [], "array", false, false, true, 47)), "class", [], "array", false, false, true, 47)));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 48
                yield "        ";
                if (CoreExtension::inFilter("icon-", $context["item"])) {
                    // line 49
                    yield "          ";
                    $context["item_id"] = Twig\Extension\CoreExtension::merge(($context["item_id"] ?? null), [("toolbar-id--" . $context["item"])]);
                    // line 50
                    yield "        ";
                }
                // line 51
                yield "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['key'], $context['item'], $context['_parent']);
            $context = array_intersect_key($context, $_parent);
            $context += $_parent;
            // line 52
            yield "
      ";
            // line 53
            $context["tab_id"] = (((($tmp = (($_v19 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53)) && is_array($_v19) || $_v19 instanceof ArrayAccess && in_array($_v19::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v19["#id"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53), "#id", [], "array", false, false, true, 53))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("toolbar-tab--" . (($_v20 = CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53)) && is_array($_v20) || $_v20 instanceof ArrayAccess && in_array($_v20::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v20["#id"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 53), "#id", [], "array", false, false, true, 53)))) : (""));
            // line 54
            yield "      ";
            $context["tab_classes"] = Twig\Extension\CoreExtension::merge(($context["item_id"] ?? null), ["toolbar-tab", ($context["user_menu"] ?? null), ($context["tab_id"] ?? null)]);
            // line 55
            yield "
      ";
            // line 56
            $context["denylist_items"] = ["toolbar-id--toolbar-icon-menu"];
            // line 59
            yield "
      ";
            // line 61
            yield "      ";
            if (!CoreExtension::inFilter((($_v21 = ($context["item_id"] ?? null)) && is_array($_v21) || $_v21 instanceof ArrayAccess && in_array($_v21::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v21[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["item_id"] ?? null), 0, [], "array", false, false, true, 61)), ($context["denylist_items"] ?? null))) {
                // line 62
                yield "        <div";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "attributes", [], "any", false, false, true, 62), "addClass", [($context["tab_classes"] ?? null)], "method", false, false, true, 62), "html", null, true);
                if (CoreExtension::inFilter("tour-toolbar-tab", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "attributes", [], "any", false, false, true, 62), "class", [], "any", false, false, true, 62))) {
                    yield " id=\"toolbar-tab-tour\"";
                }
                yield ">
          ";
                // line 63
                if (((($_v22 = ($context["item_id"] ?? null)) && is_array($_v22) || $_v22 instanceof ArrayAccess && in_array($_v22::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v22[0] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["item_id"] ?? null), 0, [], "array", false, false, true, 63)) == "toolbar-id--toolbar-icon-user")) {
                    // line 64
                    yield "            ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["user_picture"] ?? null), "html", null, true);
                    yield "
          ";
                } else {
                    // line 66
                    yield "            ";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $context["tab"], "link", [], "any", false, false, true, 66), "html", null, true);
                    yield "
          ";
                }
                // line 68
                yield "          <div";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "attributes", [], "any", false, false, true, 68), "html", null, true);
                yield ">
            ";
                // line 69
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 70
                    yield "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\" aria-label=\"";
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 70), "html", null, true);
                    yield "\">
                <h3 class=\"toolbar-tray-name visually-hidden\">";
                    // line 71
                    yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "label", [], "any", false, false, true, 71), "html", null, true);
                    yield "</h3>
            ";
                } else {
                    // line 73
                    yield "              <nav class=\"toolbar-lining clearfix\" role=\"navigation\">
            ";
                }
                // line 75
                yield "            ";
                yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["tray"] ?? null), "links", [], "any", false, false, true, 75), "html", null, true);
                yield "
            </nav>
          </div>
        </div>
      ";
            }
            // line 80
            yield "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['key'], $context['tab'], $context['_parent']);
        $context = array_intersect_key($context, $_parent);
        $context += $_parent;
        // line 81
        yield "  </nav>
  ";
        // line 82
        yield (string) $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["remainder"] ?? null), "html", null, true);
        yield "
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["toolbar_variant", "core_navigation", "_context", "attributes", "toolbar_attributes", "toolbar_heading", "user_picture", "remainder"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  207 => 82,  204 => 81,  197 => 80,  188 => 75,  184 => 73,  179 => 71,  174 => 70,  172 => 69,  167 => 68,  161 => 66,  155 => 64,  153 => 63,  145 => 62,  142 => 61,  139 => 59,  137 => 56,  134 => 55,  131 => 54,  129 => 53,  126 => 52,  119 => 51,  116 => 50,  113 => 49,  110 => 48,  106 => 47,  103 => 46,  100 => 45,  97 => 44,  94 => 43,  90 => 42,  85 => 40,  81 => 39,  77 => 38,  74 => 37,  70 => 35,  68 => 34,  64 => 32,  62 => 31,  59 => 29,  56 => 27,  55 => 26,  47 => 25,  44 => 23,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig", "/Users/rahulsureshraskar/Workspace/drupal11/web/themes/contrib/gin/templates/navigation/toolbar--gin--secondary.html.twig");
    }
    
    public function ensureSecurityChecked(): void
    {
        if ($this->sandbox->isSandboxed($this->source)) {
            $this->checkSecurity();
        }
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 25, "if" => 31, "set" => 32, "for" => 42];
        static $filters = ["escape" => 38, "merge" => 49];
        static $functions = [];
        static $tests = [];

        try {
            $this->sandbox->checkSecurity(
                [0 => "include", 1 => "if", 2 => "set", 3 => "for"],
                [0 => "escape", 1 => "merge"],
                [],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            } elseif ($e instanceof SecurityNotAllowedTestError && isset($tests[$e->getTestName()])) {
                $e->setTemplateLine($tests[$e->getTestName()]);
            }

            throw $e;
        }

    }
}
