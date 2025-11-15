<?php

namespace Abitbt\TablerBlade;

use Illuminate\View\Compilers\ComponentTagCompiler;

class TablerTagCompiler extends ComponentTagCompiler
{
    public function componentString(string $component, array $attributes): string
    {
        // A component that forwards all data, attributes, and named slots to another component...
        if ($component === 'tabler::delegate-component') {
            $component = $attributes['component'];

            $class = \Illuminate\View\AnonymousComponent::class;

            // Laravel 12+ uses xxh128 hashing for views
            return "<?php if (!Tabler::componentExists(\$name = {$component})) throw new \Exception(\"Tabler component [{\$name}] does not exist.\"); ?>##BEGIN-COMPONENT-CLASS##@component('{$class}', 'tabler::' . {$component}, [
    'view' => (version_compare(app()->version(), '12.0', '>=') ? hash('xxh128', 'tabler') : md5('tabler')) . '::' . {$component},
    'data' => \$__env->getCurrentComponentData(),
])
<?php \$component->withAttributes(\$attributes->getAttributes()); ?>";
        }

        return parent::componentString($component, $attributes);
    }

    /**
     * Compile the opening tags within the given string.
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
     * Compile the self-closing tags within the given string.
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
     * Compile the closing tags within the given string.
     */
    protected function compileClosingTags(string $value): string
    {
        return preg_replace("/<\/\s*tabler[\:][\w\-\:\.]*\s*>/", ' @endComponentClass##END-COMPONENT-CLASS##', $value);
    }
}
