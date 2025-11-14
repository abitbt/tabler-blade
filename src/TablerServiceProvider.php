<?php

namespace Abitbt\TablerBlade;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TablerServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/tabler.php', 'tabler');

        // Register Menu builder
        $this->app->bind('tabler.menu', function () {
            return \Abitbt\TablerBlade\TablerMenu\TablerMenu::make();
        });
    }

    public function boot(): void
    {
        $this->bootPublishes();
        $this->bootViews();
        $this->bootComponentPath();
        $this->bootPagination();
        $this->bootMenuMacros();
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
        $prefix = config('tabler.prefix', 'tabler');
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views', $prefix);
    }

    protected function bootComponentPath(): void
    {
        $prefix = config('tabler.prefix', 'tabler');

        // Register package components
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', $prefix);

        // Register user's custom tabler components (override package components)
        if (config('tabler.enable_overrides', true)) {
            $componentPath = config('tabler.component_path', resource_path('views/tabler'));
            if (file_exists($componentPath)) {
                Blade::anonymousComponentPath($componentPath, $prefix);
            }
        }
    }

    protected function bootMenuMacros(): void
    {
        // Register any custom menu macros from config
        $macros = config('tabler.menu.macros', []);

        foreach ($macros as $name => $callback) {
            \Abitbt\TablerBlade\TablerMenu\TablerMenu::macro($name, $callback);
        }
    }
}
