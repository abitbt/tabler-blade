<?php

namespace Abitbt\TablerBlade;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\ComponentAttributeBag;

class TablerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tabler.php', 'tabler');

        // Register TablerManager singleton
        $this->app->alias(TablerManager::class, 'tabler');
        $this->app->singleton(TablerManager::class);

        // Register Tabler facade alias
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Tabler', \Abitbt\TablerBlade\Tabler::class);
    }

    public function boot(): void
    {
        $this->bootPublishes();
        $this->bootViews();
        $this->bootComponentPath();
        $this->bootDirectives();
        $this->bootTagCompiler();
        $this->bootMacros();
        $this->bootPagination();
        $this->bootCommands();

        AssetManager::boot();

        app('tabler')->boot();
    }

    protected function bootPublishes(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config file
            $this->publishes([
                __DIR__.'/../config/tabler.php' => config_path('tabler.php'),
            ], 'tabler-config');

            // Publish views
            $this->publishes([
                __DIR__.'/../stubs/resources/views' => resource_path('views/tabler'),
            ], 'tabler-views');

            // Publish layouts
            $this->publishes([
                __DIR__.'/../stubs/resources/views/layouts' => resource_path('views/tabler/layouts'),
            ], 'tabler-layouts');

            // Publish pagination views
            $this->publishes([
                __DIR__.'/../stubs/resources/views/pagination' => resource_path('views/tabler/pagination'),
            ], 'tabler-pagination');
        }
    }

    protected function bootPagination(): void
    {
        $defaultView = config('tabler.pagination.default');
        $simpleView = config('tabler.pagination.simple');

        if ($defaultView) {
            Paginator::defaultView($defaultView);
        }

        if ($simpleView) {
            Paginator::defaultSimpleView($simpleView);
        }
    }

    protected function bootViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views', 'tabler');
    }

    protected function bootComponentPath(): void
    {
        // Register package components with <tabler:*> syntax (via custom compiler)
        // This also automatically supports native <x-tabler::*> syntax
        if (file_exists(resource_path('views/tabler'))) {
            Blade::anonymousComponentPath(resource_path('views/tabler'), 'tabler');
        }

        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');
    }

    protected function bootDirectives(): void
    {
        // Only register @blaze directives if Livewire Blaze is not installed
        // This prevents overriding real Blaze optimizations if the package is added
        if (! class_exists('Livewire\Blaze\BlazeServiceProvider')) {
            Blade::directive('blaze', fn () => '');

            Blade::directive('unblaze', function ($expression) {
                return ''
                    .'<'.'?php $__getScope = fn($scope = []) => $scope; ?>'
                    .'<'.'?php if (isset($scope)) $__scope = $scope; ?>'
                    .'<'.'?php $scope = $__getScope('.$expression.'); ?>';
            });

            Blade::directive('endunblaze', function () {
                return '<'.'?php if (isset($__scope)) { $scope = $__scope; unset($__scope); } ?>';
            });
        }
    }

    protected function bootTagCompiler(): void
    {
        $compiler = new TablerTagCompiler(
            app('blade.compiler')->getClassComponentAliases(),
            app('blade.compiler')->getClassComponentNamespaces(),
            app('blade.compiler')
        );

        app()->bind('tabler.compiler', fn () => $compiler);

        app('blade.compiler')->precompiler(function ($in) use ($compiler) {
            return $compiler->compile($in);
        });
    }

    protected function bootMacros(): void
    {
        // Add getCurrentComponentData macro to View
        app('view')::macro('getCurrentComponentData', function () {
            return $this->currentComponentData;
        });

        // Add pluck macro to ComponentAttributeBag
        ComponentAttributeBag::macro('pluck', function ($key, $default = null) {
            $result = $this->get($key);

            unset($this->attributes[$key]);

            return $result ?? $default;
        });
    }

    protected function bootCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\IconCommand::class,
            ]);
        }
    }
}
