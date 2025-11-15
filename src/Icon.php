<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Facades\File;
use Illuminate\Support\HtmlString;

class Icon
{
    protected static array $cache = [];

    protected static ?array $manifest = null;

    public static function render(string $name, string $variant = 'outline', array $attributes = []): HtmlString
    {
        return static::inline($name, $variant, $attributes);
    }

    public static function inline(string $name, string $variant = 'outline', array $attributes = []): HtmlString
    {
        $cacheKey = static::getCacheKey($name, $variant, $attributes);

        if (isset(static::$cache[$cacheKey])) {
            return new HtmlString(static::$cache[$cacheKey]);
        }

        $svg = static::getSvgContent($name, $variant);

        if (! $svg) {
            return static::fallbackIcon($name, $attributes);
        }

        $svg = static::applyAttributes($svg, $attributes);

        if (config('tabler.icons.cache', true)) {
            static::$cache[$cacheKey] = $svg;
        }

        return new HtmlString($svg);
    }

    public static function exists(string $name, string $variant = 'outline'): bool
    {
        $path = static::getIconPath($name, $variant);

        return $path && File::exists($path);
    }

    public static function getIconPath(string $name, string $variant = 'outline'): ?string
    {
        // Try different possible locations
        $paths = [
            // From published icons
            resource_path("views/tabler/icons/{$variant}/{$name}.svg"),

            // From node_modules
            base_path("node_modules/@tabler/icons/icons/{$variant}/{$name}.svg"),

            // From package stubs
            base_path("tabler-blade/stubs/resources/views/tabler/icons/{$variant}/{$name}.svg"),
        ];

        foreach ($paths as $path) {
            if (File::exists($path)) {
                return $path;
            }
        }

        return null;
    }

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

    public static function clearCache(): void
    {
        static::$cache = [];
        static::$manifest = null;
    }

    protected static function getSvgContent(string $name, string $variant): ?string
    {
        $path = static::getIconPath($name, $variant);

        if (! $path) {
            return null;
        }

        return File::get($path);
    }

    protected static function applyAttributes(string $svg, array $attributes): string
    {
        // Extract existing attributes from SVG tag
        preg_match('/<svg([^>]*)>/', $svg, $matches);

        if (! isset($matches[1])) {
            return $svg;
        }

        $existingAttrsStr = $matches[1];

        // Parse existing attributes
        preg_match_all('/(\w+(?:-\w+)*)=(["\'])(.*?)\2/', $existingAttrsStr, $attrMatches, PREG_SET_ORDER);
        $existingAttrs = [];
        foreach ($attrMatches as $match) {
            $existingAttrs[$match[1]] = $match[3];
        }

        // Merge new attributes with existing ones
        foreach ($attributes as $key => $value) {
            if (is_int($key)) {
                continue; // Skip numeric keys
            }

            if ($key === 'class' && isset($existingAttrs['class'])) {
                // Merge class attributes
                $existingAttrs['class'] = trim($existingAttrs['class'].' '.$value);
            } else {
                // Replace or add attribute
                $existingAttrs[$key] = $value;
            }
        }

        // Build final attributes string
        $finalAttrs = [];
        foreach ($existingAttrs as $key => $value) {
            $finalAttrs[] = sprintf('%s="%s"', $key, htmlspecialchars($value, ENT_QUOTES));
        }

        // Replace in SVG
        return preg_replace('/<svg[^>]*>/', '<svg '.implode(' ', $finalAttrs).'>', $svg, 1);
    }

    protected static function fallbackIcon(string $name, array $attributes): HtmlString
    {
        // Fallback to icon font if available
        $classes = $attributes['class'] ?? 'icon';

        return new HtmlString(sprintf(
            '<i class="ti ti-%s %s"></i>',
            $name,
            $classes
        ));
    }

    protected static function getCacheKey(string $name, string $variant, array $attributes): string
    {
        return md5($name.$variant.serialize($attributes));
    }
}
