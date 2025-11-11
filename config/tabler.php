<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | The prefix used for all Tabler Blade components.
    | Default: 'tabler' (usage: <x-tabler::button>)
    |
    */
    'prefix' => 'tabler',

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
    | Layout Configuration
    |--------------------------------------------------------------------------
    |
    | Default settings for Tabler layouts.
    |
    */
    'layout' => [
        // Container class: 'container-xl', 'container-fluid', 'container', etc.
        'container' => 'container-xl',

        // Theme defaults (HTML data attributes)
        'theme' => [
            'base' => 'gray',
            'font' => 'sans-serif',
            'primary' => 'blue',
            'radius' => '1',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Navbar Configuration
    |--------------------------------------------------------------------------
    |
    | Default settings for horizontal navbar layouts.
    |
    */
    'navbar' => [
        'dark' => false,
        'sticky' => false,
        'transparent' => false,
        'overlap' => false,
        'breakpoint' => 'md',
        'hide_brand' => false,
        'hide_search' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Sidebar Configuration
    |--------------------------------------------------------------------------
    |
    | Default settings for vertical sidebar layouts.
    |
    */
    'sidebar' => [
        'dark' => true,
        'position' => 'left',
        'transparent' => false,
        'background' => null,
        'breakpoint' => 'lg',
        'hide_brand' => false,
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
        'small' => null, // 32x32 logo for compact layouts
        'full' => null,  // Full logo for standard layouts

        // Use embedded SVG if no custom logo is provided
        'fallback_svg' => true,

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

    /*
    |--------------------------------------------------------------------------
    | Flash Messages
    |--------------------------------------------------------------------------
    |
    | Configure automatic flash message display in layouts.
    |
    */
    'flash_messages' => [
        'enabled' => true,
        'session_keys' => ['success', 'error', 'warning', 'info'],
    ],
];
