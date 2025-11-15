<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | The prefix used for all Tabler Blade components.
    | Default: 'tabler' (usage: <tabler:button>)
    |
    */
    'prefix' => 'tabler',

    /*
    |--------------------------------------------------------------------------
    | Asset Management
    |--------------------------------------------------------------------------
    |
    | Configure how Tabler CSS and JS assets are loaded.
    |
    */
    'version' => '1.4.0',
    'use_cdn' => true,

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    |
    | Configure icon handling for Tabler icons from @tabler/icons npm package.
    |
    */
    'icons' => [
        // Enable icon caching for better performance
        'cache' => true,

        // Default icon variant (outline, filled)
        'default_variant' => 'outline',

        // Default icon size class
        'default_size' => null, // null, 'xs', 'sm', 'md', 'lg', 'xl'

        // Fallback to icon font when SVG is not available
        'fallback_to_font' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Overrides
    |--------------------------------------------------------------------------
    |
    | Allow users to override package components by placing custom versions
    | in the specified component_path directory.
    |
    */
    'enable_overrides' => true,
    'component_path' => resource_path('views/tabler'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Configuration
    |--------------------------------------------------------------------------
    |
    | Settings for the collapsible sidebar component.
    |
    */
    'sidebar' => [
        // Save collapsed state to localStorage
        'persist_state' => true,

        // Responsive breakpoint (px, rem, or viewport unit)
        'breakpoint' => '1024px',
    ],

    /*
    |--------------------------------------------------------------------------
    | Logo Configuration
    |--------------------------------------------------------------------------
    |
    | Configure logo display options. Set custom logo paths to override
    | the default Tabler logo.
    |
    */
    'logo' => [
        // Path to custom logos (set to override default Tabler logo)
        'full' => null,       // Full logo (110×32 recommended)
        'full_dark' => null,  // Dark mode version (optional)

        // Show application name next to logo
        'show_title' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Pagination Views
    |--------------------------------------------------------------------------
    |
    | Default pagination views for Laravel's paginator.
    |
    */
    'pagination' => [
        'default' => 'tabler::pagination.default',
        'simple' => 'tabler::pagination.simple',
    ],
];
