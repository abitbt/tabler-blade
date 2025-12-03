<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Arr;
use Stringable;

/**
 * Fluent class builder for dynamically constructing CSS class strings.
 *
 * Provides a chainable API for building CSS classes while handling
 * empty values, null checks, and conditional classes. Automatically
 * filters out empty strings, null values, and deduplicates classes.
 *
 *
 * @example
 * ```php
 * $classes = Tabler::classes('btn')
 *     ->add($primary ? 'btn-primary' : 'btn-secondary')
 *     ->add(['rounded', 'shadow']);
 * echo $classes; // "btn btn-primary rounded shadow"
 * ```
 */
class ClassBuilder implements Stringable
{
    /**
     * Pending CSS classes to be joined.
     *
     * @var array<string>
     */
    protected array $pending = [];

    /**
     * Add one or more CSS classes to the builder.
     *
     * Accepts strings, arrays, or null. Null values are filtered out
     * automatically. Array values are converted to class strings using
     * Laravel's Arr::toCssClasses() helper, which supports conditional
     * arrays like ['class-name' => true, 'another-class' => false].
     *
     * @param  string|array<string|int, string|bool>|null  $classes  CSS classes to add
     * @return self Fluent interface for chaining
     *
     * @example
     * ```php
     * $builder->add('btn btn-primary')
     *     ->add(['rounded' => true, 'shadow' => false])
     *     ->add($active ? 'active' : null);
     * ```
     */
    public function add(string|array|null $classes): self
    {
        if ($classes === null) {
            return $this;
        }

        $this->pending[] = Arr::toCssClasses($classes);

        return $this;
    }

    /**
     * Convert the builder to a CSS class string.
     *
     * Joins all pending classes with spaces, filtering out empty
     * strings and null values. Automatically deduplicates class names
     * to ensure each class appears only once in the output.
     *
     * @return string Space-separated, deduplicated CSS classes
     *
     * @example
     * ```php
     * $builder->add('btn btn-primary')->add('btn btn-lg');
     * echo $builder; // "btn btn-primary btn-lg" (deduplicated)
     * ```
     */
    public function __toString(): string
    {
        return (string) collect($this->pending)
            ->filter(fn ($class) => $class !== '' && $class !== null)
            ->flatMap(fn ($class) => explode(' ', $class))
            ->unique()
            ->filter()
            ->join(' ');
    }
}
