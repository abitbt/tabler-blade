<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

class AssetManager
{
    protected static bool $booted = false;

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

        Blade::directive('tablerSidebarScripts', function () {
            return "<?php echo \Abitbt\TablerBlade\AssetManager::sidebarScripts(); ?>";
        });
    }

    public static function scripts(array $options = []): HtmlString
    {
        $version = config('tabler.version', '1.4.0');
        $cdn = $options['cdn'] ?? config('tabler.use_cdn', true);

        if ($cdn) {
            $script = sprintf(
                '<script src="https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/js/tabler.min.js"></script>',
                $version
            );
        } else {
            $script = '<script src="'.asset('vendor/tabler/js/tabler.min.js').'"></script>';
        }

        return new HtmlString($script);
    }

    public static function styles(array $options = []): HtmlString
    {
        $version = config('tabler.version', '1.4.0');
        $cdn = $options['cdn'] ?? config('tabler.use_cdn', true);

        if ($cdn) {
            $style = sprintf(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/css/tabler.min.css">',
                $version
            );
        } else {
            $style = '<link rel="stylesheet" href="'.asset('vendor/tabler/css/tabler.min.css').'">';
        }

        return new HtmlString($style);
    }

    public static function sidebarScripts(): HtmlString
    {
        $script = '<script src="'.asset('vendor/tabler-blade/js/tabler-sidebar.js').'"></script>';

        return new HtmlString($script);
    }
}
