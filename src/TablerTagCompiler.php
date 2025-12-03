<?php

namespace Abitbt\TablerBlade;

use Illuminate\View\Compilers\ComponentTagCompiler;

/**
 * Custom Blade component compiler for Tabler namespace.
 *
 * Extends Laravel's ComponentTagCompiler to handle <tabler:component-name>
 * syntax and provides special handling for dynamic component delegation.
 * Supports Laravel 12+ view namespace hashing (xxh128) and older versions (md5).
 */
class TablerTagCompiler extends ComponentTagCompiler
{
    /**
     * Get the namespace hash for the current Laravel version.
     *
     * Laravel 12+ uses xxh128 hashing, older versions use md5.
     * This centralizes version detection for easier maintenance.
     *
     * @return string Namespace hash ('xxh128:...' or 'md5:...')
     */
    protected function getNamespaceHash(): string
    {
        return version_compare(app()->version(), '12.0', '>=')
            ? hash('xxh128', 'tabler')
            : md5('tabler');
    }

    /**
     * Compile a component string with attributes.
     *
     * Handles the special 'tabler::delegate-component' case for dynamic
     * component rendering, where the actual component name is determined
     * at runtime. Otherwise delegates to parent implementation.
     *
     * @param  string  $component  Component name (e.g., 'tabler::button')
     * @param  array<string, mixed>  $attributes  Component attributes
     * @return string Compiled PHP code for component rendering
     */
    public function componentString(string $component, array $attributes): string
    {
        // A component that forwards all data, attributes, and named slots to another component...
        if ($component === 'tabler::delegate-component') {
            $component = $attributes['component'];

            $class = \Illuminate\View\AnonymousComponent::class;

            $hash = $this->getNamespaceHash();

            return "<?php if (!Tabler::componentExists(\$name = {$component})) throw new \Exception(\"Tabler component [{\$name}] does not exist.\"); ?>##BEGIN-COMPONENT-CLASS##@component('{$class}', 'tabler::' . {$component}, [
    'view' => '{$hash}' . '::' . {$component},
    'data' => \$__env->getCurrentComponentData(),
])
<?php \$component->withAttributes(\$attributes->getAttributes()); ?>";
        }

        return parent::componentString($component, $attributes);
    }

    /**
     * Compile opening Tabler component tags.
     *
     * Matches <tabler:component-name> tags with attributes and converts
     * them to Blade component syntax. Handles @class, @style, bound
     * attributes (:$var), and attribute merging.
     *
     * @param  string  $value  Blade template content
     * @return string Compiled template with opening tags converted
     */
    protected function compileOpeningTags(string $value): string
    {
        $pattern = "/
            <
                \s*
                tabler[\:]([\w\-\:\.]*)
                (?<attributes>
                    (?:
                        \s+
                        (?:
                            (?:
                                @(?:class)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                @(?:style)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                \{\{\s*\\\$attributes(?:[^}]+?)?\s*\}\}
                            )
                            |
                            (?:
                                (\:\\\$)(\w+)
                            )
                            |
                            (?:
                                [\w\-:.@%]+
                                (
                                    =
                                    (?:
                                        \\\"[^\\\"]*\\\"
                                        |
                                        \'[^\']*\'
                                        |
                                        [^\'\\\"=<>]+
                                    )
                                )?
                            )
                        )
                    )*
                    \s*
                )
                (?<![\/=\-])
            >
        /x";

        return preg_replace_callback($pattern, function (array $matches) {
            $this->boundAttributes = [];

            $attributes = $this->getAttributesFromAttributeString($matches['attributes']);

            return $this->componentString('tabler::'.$matches[1], $attributes);
        }, $value);
    }

    /**
     * Compile self-closing Tabler component tags.
     *
     * Matches <tabler:component-name /> tags and converts them to
     * Blade component syntax. Supports inline slot attributes for
     * named slot rendering.
     *
     * @param  string  $value  Blade template content
     * @return string Compiled template with self-closing tags converted
     */
    protected function compileSelfClosingTags(string $value): string
    {
        $pattern = "/
            <
                \s*
                tabler[\:]([\w\-\:\.]*)
                \s*
                (?<attributes>
                    (?:
                        \s+
                        (?:
                            (?:
                                @(?:class)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                @(?:style)(\( (?: (?>[^()]+) | (?-1) )* \))
                            )
                            |
                            (?:
                                \{\{\s*\\\$attributes(?:[^}]+?)?\s*\}\}
                            )
                            |
                            (?:
                                (\:\\\$)(\w+)
                            )
                            |
                            (?:
                                [\w\-:.@%]+
                                (
                                    =
                                    (?:
                                        \\\"[^\\\"]*\\\"
                                        |
                                        \'[^\']*\'
                                        |
                                        [^\'\\\"=<>]+
                                    )
                                )?
                            )
                        )
                    )*
                    \s*
                )
            \/>
        /x";

        return preg_replace_callback($pattern, function (array $matches) {
            $this->boundAttributes = [];

            $attributes = $this->getAttributesFromAttributeString($matches['attributes']);

            // Support inline "slot" attributes...
            if (isset($attributes['slot'])) {
                $slot = $attributes['slot'];

                unset($attributes['slot']);

                return '@slot('.$slot.') '.$this->componentString('tabler::'.$matches[1], $attributes)."\n@endComponentClass##END-COMPONENT-CLASS##".' @endslot';
            }

            return $this->componentString('tabler::'.$matches[1], $attributes)."\n@endComponentClass##END-COMPONENT-CLASS##";
        }, $value);
    }

    /**
     * Compile closing Tabler component tags.
     *
     * Matches </tabler:component-name> tags and converts them to
     * Blade component closing syntax.
     *
     * @param  string  $value  Blade template content
     * @return string Compiled template with closing tags converted
     */
    protected function compileClosingTags(string $value): string
    {
        return preg_replace("/<\/\s*tabler[\:][\w\-\:\.]*\s*>/", ' @endComponentClass##END-COMPONENT-CLASS##', $value);
    }
}
