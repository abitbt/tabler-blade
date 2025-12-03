<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

/**
 * Core manager class for Tabler Blade components.
 *
 * Provides utility methods for asset management, class building,
 * attribute manipulation, and component lifecycle hooks for Livewire
 * integration.
 */
class TablerManager
{
    /**
     * Track if Tabler assets have been rendered on the page.
     */
    public bool $hasRenderedAssets = false;

    /**
     * Bootstrap the Tabler manager.
     *
     * Registers Livewire hooks if Livewire is available to reset
     * asset tracking between requests.
     */
    public function boot(): void
    {
        // Hook into Livewire if available
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\on('flush-state', function () {
                $this->hasRenderedAssets = false;
            });
        }
    }

    /**
     * Mark that Tabler assets have been rendered on the current page.
     */
    public function markAssetsRendered(): void
    {
        $this->hasRenderedAssets = true;
    }

    /**
     * Render Tabler JavaScript asset tags.
     *
     * @param  array<string, mixed>  $options  Options to pass to AssetManager
     * @return HtmlString HTML script tags
     */
    public function scripts(array $options = []): HtmlString
    {
        $this->markAssetsRendered();

        return AssetManager::scripts($options);
    }

    /**
     * Render Tabler CSS asset tags.
     *
     * @param  array<string, mixed>  $options  Options to pass to AssetManager
     * @return HtmlString HTML link tags
     */
    public function styles(array $options = []): HtmlString
    {
        $this->markAssetsRendered();

        return AssetManager::styles($options);
    }

    /**
     * Create a new fluent class builder.
     *
     * Provides a chainable interface for building CSS class strings
     * with automatic filtering and deduplication.
     *
     * @param  string|array<string|int, string|bool>|null  $styles  Initial classes to add
     * @return ClassBuilder Fluent class builder instance
     *
     * @example
     * ```php
     * Tabler::classes('btn')->add('btn-primary')->add(['rounded' => true]);
     * ```
     */
    public function classes(string|array|null $styles = null): ClassBuilder
    {
        $builder = new ClassBuilder;

        return $styles ? $builder->add($styles) : $builder;
    }

    /**
     * Prevent wire:model usage on a component.
     *
     * Throws an exception if any wire: attributes are detected on the
     * component. Useful for components that don't support Livewire
     * two-way binding.
     *
     * @param  ComponentAttributeBag  $attributes  Component attributes to check
     * @param  string  $componentName  Name of the component (for error message)
     *
     * @throws \Exception If wire: attributes are present
     */
    public function disallowWireModel(ComponentAttributeBag $attributes, string $componentName): void
    {
        if ($attributes->whereStartsWith('wire:')->isNotEmpty()) {
            throw new \Exception('Cannot use wire:model on <'.$componentName.'>');
        }
    }

    /**
     * Split component attributes into two groups.
     *
     * Separates attributes based on a list of keys or prefixes.
     * In strict mode, matches exact keys. In non-strict mode,
     * matches attributes that start with the given prefixes.
     *
     * @param  ComponentAttributeBag  $attributes  Attributes to split
     * @param  array<int, string>  $by  Keys or prefixes to split by
     * @param  bool  $strict  Whether to match exact keys (true) or prefixes (false)
     * @return array{0: ComponentAttributeBag, 1: ComponentAttributeBag} [matching, non-matching]
     *
     * @example
     * ```php
     * [$styling, $other] = Tabler::splitAttributes($attributes, ['class', 'style']);
     * ```
     */
    public function splitAttributes(ComponentAttributeBag $attributes, array $by = ['class', 'style'], bool $strict = false): array
    {
        return [
            $strict ? $attributes->only($by) : $attributes->whereStartsWith($by),
            $strict ? $attributes->except($by) : $attributes->whereDoesntStartWith($by),
        ];
    }

    /**
     * Extract and unescape attributes to forward as component props.
     *
     * Blade automatically escapes all attributes, so this method unescapes
     * them and converts kebab-case keys to camelCase for proper prop binding.
     *
     * @param  ComponentAttributeBag  $attributes  Source attributes
     * @param  array<int, string>  $propKeys  Keys to extract (supports camelCase, will check kebab-case too)
     * @return array<string, mixed> Unescaped attributes ready for forwarding
     */
    public function forwardedAttributes(ComponentAttributeBag $attributes, array $propKeys): array
    {
        $props = [];

        $unescape = fn ($value) => is_string($value) ? htmlspecialchars_decode($value, ENT_QUOTES) : $value;

        foreach ($propKeys as $key) {
            // Because Blade automatically escapes all "attributes" (not "props"), it errantly escaped these values.
            // Therefore, we have to apply an "unescape" operation (htmlspecialchars_decode) to rectify that...
            if (isset($attributes[$key])) {
                $props[$key] = $unescape($attributes[$key]);
            }
            // If a kebab-cased prop is present, we need to convert it to camelCase so that @props() picks it up...
            elseif (isset($attributes[Str::kebab($key)])) {
                $props[$key] = $unescape($attributes[Str::kebab($key)]);
            }
        }

        return $props;
    }

    /**
     * Extract attributes with a given prefix into a new attribute bag.
     *
     * Useful for extracting prefixed attributes (e.g., 'x-', 'wire:', 'input:')
     * into a separate bag while removing them from the original bag.
     *
     * @param  string  $prefix  Prefix to match (e.g., 'input:')
     * @param  ComponentAttributeBag  $attributes  Original attribute bag (modified in place)
     * @param  array<string, mixed>  $default  Default attributes for the new bag
     * @return ComponentAttributeBag New bag with prefix-stripped attributes
     *
     * @example
     * ```php
     * $inputAttrs = Tabler::attributesAfter('input:', $attributes);
     * // input:class="..." becomes class="..." in $inputAttrs
     * ```
     */
    public function attributesAfter(string $prefix, ComponentAttributeBag $attributes, array $default = []): ComponentAttributeBag
    {
        $newAttributes = new ComponentAttributeBag($default);
        $keysToRemove = [];

        foreach ($attributes->getAttributes() as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $newAttributes[substr($key, strlen($prefix))] = $value;
                $keysToRemove[] = $key;
            }
        }

        // Remove the transferred attributes from the original bag
        foreach ($keysToRemove as $key) {
            unset($attributes[$key]);
        }

        return $newAttributes;
    }

    /**
     * Generate CSS classes for inset spacing.
     *
     * Converts an inset specification (true, null, or space-separated sides)
     * into CSS classes. Used for applying consistent spacing in components.
     *
     * @param  string|bool|null  $inset  Inset specification (true = all sides, string = specific sides, null = none)
     * @param  string  $top  CSS class for top inset
     * @param  string  $right  CSS class for right inset
     * @param  string  $bottom  CSS class for bottom inset
     * @param  string  $left  CSS class for left inset
     * @return string Space-separated CSS classes
     *
     * @example
     * ```php
     * Tabler::applyInset('top left', 'pt-4', 'pr-4', 'pb-4', 'pl-4');
     * // Returns: "pt-4 pl-4"
     * ```
     */
    public function applyInset(string|bool|null $inset, string $top, string $right, string $bottom, string $left): string
    {
        if ($inset === null) {
            return '';
        }

        $insets = $inset === true
            ? collect(['top', 'right', 'bottom', 'left'])
            : str($inset)->explode(' ')->map(fn ($i) => trim($i));

        $insetClasses = [
            'top' => $top,
            'right' => $right,
            'bottom' => $bottom,
            'left' => $left,
        ];

        return $insets->map(fn ($i) => $insetClasses[$i])->join(' ');
    }

    /**
     * Check if a Tabler Blade component exists.
     *
     * Handles Laravel 12+ view namespace hashing (xxh128) and older
     * versions (md5) to check component availability.
     *
     * @param  string  $name  Component name (e.g., 'button', 'input')
     * @return bool True if component view exists
     */
    public function componentExists(string $name): bool
    {
        // Laravel 12+ uses xxh128 hashing for views
        if (version_compare(app()->version(), '12.0', '>=')) {
            return app('view')->exists(hash('xxh128', 'tabler').'::'.$name);
        }

        return app('view')->exists(md5('tabler').'::'.$name);
    }
}
