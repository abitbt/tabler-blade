<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

/**
 * Asset management for Tabler Blade package.
 *
 * Handles registration of Blade directives for loading Tabler assets
 * and provides methods for rendering asset tags. Currently delegates
 * to user's build process (Vite/Mix) for core Tabler assets.
 */
class AssetManager
{
    /**
     * Track if asset directives have been registered.
     */
    protected static bool $booted = false;

    /**
     * Register Blade directives for Tabler assets.
     *
     * Creates @tablerScripts and @tablerStyles directives for rendering
     * asset tags. Only runs once per request.
     */
    public static function boot(): void
    {
        if (static::$booted) {
            return;
        }

        static::$booted = true;

        Blade::directive('tablerScripts', function ($expression) {
            return "<?php echo app('tabler')->scripts({$expression}); ?>";
        });

        Blade::directive('tablerStyles', function ($expression) {
            return "<?php echo app('tabler')->styles({$expression}); ?>";
        });
    }

    /**
     * Render Tabler JavaScript asset tags.
     *
     * Currently returns an empty string. Users should include Tabler
     * core assets via their own build process (Vite/Mix). Future
     * implementations may add CDN support with SRI integrity checks.
     *
     * @param  array<string, mixed>  $options  Options for asset loading (reserved for future use)
     * @return HtmlString HTML script tags (currently empty)
     */
    public static function scripts(array $options = []): HtmlString
    {
        // TODO: Add inline scripts or custom asset loading here if needed
        // Users should include Tabler core assets via their own build process (Vite/Mix)
        return new HtmlString('');
    }

    /**
     * Render Tabler CSS asset tags.
     *
     * Currently returns an empty string. Users should include Tabler
     * core assets via their own build process (Vite/Mix). Future
     * implementations may add CDN support with SRI integrity checks.
     *
     * @param  array<string, mixed>  $options  Options for asset loading (reserved for future use)
     * @return HtmlString HTML link tags (currently empty)
     */
    public static function styles(array $options = []): HtmlString
    {
        // TODO: Add inline styles or custom asset loading here if needed
        // Users should include Tabler core assets via their own build process (Vite/Mix)
        return new HtmlString('');
    }
}
