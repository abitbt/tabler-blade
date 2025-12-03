<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Tabler Version
    |--------------------------------------------------------------------------
    |
    | The Tabler UI version this package is designed for.
    | Used for compatibility tracking and documentation.
    |
    */
    'version' => '1.4.0',

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    |
    | Configure icon handling for Tabler icons from @tabler/icons npm package.
    |
    */
    'icons' => [
        // Default icon variant (outline, filled)
        'default_variant' => 'outline',

        // Default icon size class (null, 'xs', 'sm', 'md', 'lg', 'xl')
        'default_size' => null,
    ],

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

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Configure default theme settings for the Tabler UI.
    | These settings will be applied on initial page load if no user
    | preference is stored in localStorage.
    |
    */
    'theme' => [
        // Default theme mode: 'light' or 'dark'
        'mode' => 'dark',

        // Color scheme/neutral palette base
        // Options: 'gray', 'slate', 'zinc', 'neutral', 'stone', 'pink'
        'base' => 'gray',

        // Font family
        // Options: 'sans-serif', 'serif', 'monospace', 'comic'
        'font' => 'sans-serif',

        // Primary color
        // Options: 'blue', 'azure', 'indigo', 'purple', 'pink', 'red', 'orange',
        //          'yellow', 'lime', 'green', 'teal', 'cyan', 'inverted'
        'primary' => 'blue',

        // Border radius scale
        // Options: 0, 0.5, 1, 1.5, 2
        // 0 = sharp corners, 1 = default (6px), 2 = double (12px)
        'radius' => 1,
    ],
];
