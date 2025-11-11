<?php

namespace Tabler;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class TablerServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        $this->bootViews();
        $this->bootComponentPath();
        $this->bootPagination();
    }

    public function bootPagination(): void
    {
        Paginator::defaultView('tabler::pagination.default');
        Paginator::defaultSimpleView('tabler::pagination.simple');
    }

    public function bootViews(): void
    {
        $this->loadViewsFrom(__DIR__.'/../stubs/resources/views', 'tabler');
    }

    public function bootComponentPath(): void
    {
        // Register package components
        Blade::anonymousComponentPath(__DIR__.'/../stubs/resources/views/tabler', 'tabler');

        // Register user's custom tabler components (override package components)
        if (file_exists(resource_path('views/tabler'))) {
            Blade::anonymousComponentPath(resource_path('views/tabler'), 'tabler');
        }
    }
}
