<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;

/**
 * Icon rendering and management for Tabler Icons.
 *
 * Provides utilities for loading, rendering, and searching Tabler icons
 * from the @tabler/icons npm package. Supports both outline and filled
 * variants with customizable attributes and caching.
 */
class Icon
{
    /**
     * Cached icon manifest from icons.json.
     *
     * @var array<string, mixed>|null
     */
    protected static ?array $manifest = null;

    /**
     * Render an icon with the given name and attributes.
     *
     * This is an alias for the inline() method.
     *
     * @param  string  $name  Icon name (e.g., 'home', 'user', 'settings')
     * @param  string|null  $variant  Icon variant ('outline' or 'filled')
     * @param  array<string, mixed>  $attributes  HTML attributes to apply to the SVG element
     * @return HtmlString Rendered SVG icon
     *
     * @see inline()
     */
    public static function render(string $name, ?string $variant = null, array $attributes = []): HtmlString
    {
        return static::inline($name, $variant, $attributes);
    }

    /**
     * Render an inline SVG icon with customizable attributes.
     *
     * Loads the SVG content from the Tabler icons package and applies
     * the provided attributes. Automatically applies default size classes
     * from configuration if no size class is present.
     *
     * @param  string  $name  Icon name (e.g., 'home', 'user', 'settings')
     * @param  string|null  $variant  Icon variant ('outline' or 'filled'), defaults to config value
     * @param  array<string, mixed>  $attributes  HTML attributes to merge with the SVG element
     * @return HtmlString Rendered SVG with applied attributes
     *
     * @example
     * ```php
     * Icon::inline('home', 'outline', ['class' => 'text-blue-500', 'width' => 24]);
     * // <svg class="text-blue-500 icon-md" width="24">...</svg>
     * ```
     */
    public static function inline(string $name, ?string $variant = null, array $attributes = []): HtmlString
    {
        // Apply config defaults
        $variant = $variant ?? config('tabler.icons.default_variant', 'outline');
        $defaultSize = config('tabler.icons.default_size');

        // Apply default size class if configured
        if ($defaultSize && ! isset($attributes['class'])) {
            $attributes['class'] = "icon-{$defaultSize}";
        } elseif ($defaultSize && isset($attributes['class']) && ! str_contains($attributes['class'], 'icon-')) {
            $attributes['class'] .= " icon-{$defaultSize}";
        }

        $svg = static::getSvgContent($name, $variant);

        if (! $svg) {
            return new HtmlString('<!-- Icon not found -->');
        }

        $svg = static::applyAttributes($svg, $attributes);

        return new HtmlString($svg);
    }

    /**
     * Check if an icon exists in the Tabler icons package.
     *
     * @param  string  $name  Icon name to check
     * @param  string  $variant  Icon variant ('outline' or 'filled')
     * @return bool True if the icon file exists, false otherwise
     */
    public static function exists(string $name, string $variant = 'outline'): bool
    {
        $path = static::getIconPath($name, $variant);

        return $path && File::exists($path);
    }

    /**
     * Get the file path for a specific icon.
     *
     * Validates icon name and variant for security, then constructs
     * the path to the icon file within the @tabler/icons package.
     * Throws exceptions for invalid names, variants, or missing package.
     *
     * @param  string  $name  Icon name (alphanumeric and hyphens only)
     * @param  string  $variant  Icon variant ('outline' or 'filled')
     * @return string|null Full path to the icon SVG file, or null if not found
     *
     * @throws \InvalidArgumentException If icon name or variant is invalid
     * @throws \RuntimeException If @tabler/icons package is not installed
     */
    public static function getIconPath(string $name, string $variant = 'outline'): ?string
    {
        $name = strtolower($name);
        $variant = strtolower($variant);

        // Strict validation
        if (! preg_match('/^[a-z0-9-]+$/', $name)) {
            throw new \InvalidArgumentException("Invalid icon name: {$name}");
        }

        if (! in_array($variant, ['outline', 'filled'], true)) {
            throw new \InvalidArgumentException("Invalid variant: {$variant}. Allowed: outline, filled");
        }

        // Additional safety: strip any directory traversal attempts
        $name = basename($name);
        $variant = basename($variant);

        // Check if package is installed
        $iconsBasePath = base_path('node_modules/@tabler/icons/icons');

        if (! is_dir($iconsBasePath)) {
            throw new \RuntimeException(
                'Tabler Icons package not found. Please install it: npm install @tabler/icons'
            );
        }

        // Check if specific icon exists
        $iconPath = "{$iconsBasePath}/{$variant}/{$name}.svg";

        return File::exists($iconPath) ? $iconPath : null;
    }

    /**
     * Get the icon manifest from the Tabler icons package.
     *
     * Loads and caches the icons.json file which contains metadata
     * about all available icons. The manifest is cached in memory
     * for subsequent calls.
     *
     * @return array<string, mixed> Icon manifest data
     */
    public static function getManifest(): array
    {
        if (static::$manifest !== null) {
            return static::$manifest;
        }

        $manifestPath = base_path('node_modules/@tabler/icons/icons.json');

        if (! File::exists($manifestPath)) {
            static::$manifest = [];

            return static::$manifest;
        }

        static::$manifest = json_decode(File::get($manifestPath), true) ?? [];

        return static::$manifest;
    }

    /**
     * Search for icons matching a query string.
     *
     * Performs a case-insensitive substring search across all icon
     * names in the manifest. Returns an array of matching icon names.
     *
     * @param  string  $query  Search query string
     * @return array<int, string> Array of matching icon names
     *
     * @example
     * ```php
     * Icon::search('arrow'); // ['arrow-up', 'arrow-down', 'arrow-left', ...]
     * ```
     */
    public static function search(string $query): array
    {
        $manifest = static::getManifest();

        if (empty($manifest)) {
            return [];
        }

        $query = strtolower($query);

        return array_filter(array_keys($manifest), function ($name) use ($query) {
            return str_contains(strtolower($name), $query);
        });
    }

    /**
     * Clear the cached icon manifest.
     *
     * Forces the manifest to be reloaded from disk on the next call
     * to getManifest(). Useful for testing or when icons are updated.
     */
    public static function clearManifest(): void
    {
        static::$manifest = null;
    }

    /**
     * Load the raw SVG content for an icon.
     *
     * @param  string  $name  Icon name
     * @param  string  $variant  Icon variant ('outline' or 'filled')
     * @return string|null SVG file content, or null if icon not found
     */
    protected static function getSvgContent(string $name, string $variant): ?string
    {
        $path = static::getIconPath($name, $variant);

        if (! $path) {
            return null;
        }

        return File::get($path);
    }

    /**
     * Apply HTML attributes to an SVG element.
     *
     * Merges provided attributes with existing SVG attributes using
     * DOMDocument. Class attributes are merged, other attributes are
     * replaced. Numeric keys are ignored.
     *
     * @param  string  $svg  Raw SVG content
     * @param  array<string, mixed>  $attributes  Attributes to apply
     * @return string Modified SVG with applied attributes
     */
    protected static function applyAttributes(string $svg, array $attributes): string
    {
        $dom = new \DOMDocument;
        $dom->preserveWhiteSpace = true;
        $dom->formatOutput = false;

        // Suppress warnings for malformed HTML and load SVG
        @$dom->loadXML($svg);

        $svgElement = $dom->getElementsByTagName('svg')->item(0);

        if (! $svgElement) {
            return $svg;
        }

        // Merge new attributes with existing ones
        foreach ($attributes as $key => $value) {
            if (is_int($key)) {
                continue; // Skip numeric keys
            }

            if ($key === 'class' && $svgElement->hasAttribute('class')) {
                // Merge class attributes
                $existingClass = $svgElement->getAttribute('class');
                $svgElement->setAttribute('class', trim($existingClass.' '.$value));
            } else {
                // Replace or add attribute
                $svgElement->setAttribute($key, $value);
            }
        }

        return $dom->saveXML($dom->documentElement);
    }
}
