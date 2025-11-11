<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Component Prefix
    |--------------------------------------------------------------------------
    |
    | This value determines the prefix used for all Tabler Blade components.
    | By default, components are accessed with the 'tabler::' prefix, for
    | example: <x-tabler::button>. You can change this to use a different
    | prefix or set it to an empty string to use no prefix at all.
    |
    | Default: 'tabler'
    |
    */

    'prefix' => env('TABLER_PREFIX', 'tabler'),

    /*
    |--------------------------------------------------------------------------
    | Component Path
    |--------------------------------------------------------------------------
    |
    | This value determines the path where your custom Tabler components
    | should be placed. Any components placed in this directory will
    | override the package's default components with the same name.
    |
    | Default: resources/views/tabler
    |
    */

    'component_path' => resource_path('views/tabler'),

    /*
    |--------------------------------------------------------------------------
    | Enable User Overrides
    |--------------------------------------------------------------------------
    |
    | When enabled, you can override package components by creating files
    | with the same name in your application's component_path directory.
    | This allows you to customize components without modifying the
    | package files directly.
    |
    | Default: true
    |
    */

    'enable_overrides' => env('TABLER_ENABLE_OVERRIDES', true),

    /*
    |--------------------------------------------------------------------------
    | Pagination Views
    |--------------------------------------------------------------------------
    |
    | Configure which views should be used for pagination. These views
    | will be set as the default pagination views when the service
    | provider boots. Set to null to disable automatic configuration.
    |
    */

    'pagination' => [
        'default' => 'tabler::pagination.default',
        'simple' => 'tabler::pagination.simple',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    |
    | The default theme to use for Tabler components. This can be 'light',
    | 'dark', or 'auto' (which follows the system preference).
    |
    | Note: This requires additional JavaScript to switch themes.
    |
    | Default: 'auto'
    |
    */

    'theme' => env('TABLER_THEME', 'auto'),

    /*
    |--------------------------------------------------------------------------
    | CDN Configuration
    |--------------------------------------------------------------------------
    |
    | Configure whether to use CDN for Tabler assets or local assets.
    | When enabled, CSS and JS will be loaded from CDN. When disabled,
    | you'll need to publish and compile assets locally.
    |
    | Default: true
    |
    */

    'cdn' => [
        'enabled' => env('TABLER_CDN_ENABLED', true),
        'css' => 'https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css',
        'js' => 'https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/js/tabler.min.js',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Component Options
    |--------------------------------------------------------------------------
    |
    | Configure default options for specific components. These values will
    | be used as defaults when components are rendered without explicit
    | props. You can override these on a per-component basis.
    |
    */

    'defaults' => [

        /*
        |--------------------------------------------------------------------------
        | Alert Defaults
        |--------------------------------------------------------------------------
        */
        'alert' => [
            'dismissible' => false,
            'important' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Button Defaults
        |--------------------------------------------------------------------------
        */
        'button' => [
            'type' => 'button',
            'variant' => 'primary',
            'size' => null,
        ],

        /*
        |--------------------------------------------------------------------------
        | Badge Defaults
        |--------------------------------------------------------------------------
        */
        'badge' => [
            'variant' => 'primary',
            'pill' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Card Defaults
        |--------------------------------------------------------------------------
        */
        'card' => [
            'stacked' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Modal Defaults
        |--------------------------------------------------------------------------
        */
        'modal' => [
            'size' => null, // null, 'sm', 'lg', 'xl', 'fullscreen'
            'centered' => false,
            'scrollable' => false,
            'backdrop' => 'static',
        ],

        /*
        |--------------------------------------------------------------------------
        | Table Defaults
        |--------------------------------------------------------------------------
        */
        'table' => [
            'hover' => false,
            'striped' => false,
            'bordered' => false,
            'card' => false,
            'vcenter' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Pagination Defaults
        |--------------------------------------------------------------------------
        */
        'pagination' => [
            'size' => null, // null, 'sm', 'lg'
            'simple' => false,
            'firstLast' => false,
            'textButtons' => false,
            'onEachSide' => 3,
        ],

        /*
        |--------------------------------------------------------------------------
        | Avatar Defaults
        |--------------------------------------------------------------------------
        */
        'avatar' => [
            'size' => 'md', // 'xxs', 'xs', 'sm', 'md', 'lg', 'xl', '2xl'
            'rounded' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Spinner Defaults
        |--------------------------------------------------------------------------
        */
        'spinner' => [
            'size' => null, // null, 'sm'
            'grow' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Progress Defaults
        |--------------------------------------------------------------------------
        */
        'progress' => [
            'size' => null, // null, 'sm'
            'indeterminate' => false,
        ],

        /*
        |--------------------------------------------------------------------------
        | Image Defaults
        |--------------------------------------------------------------------------
        */
        'image' => [
            'lazy' => false,
            'loading' => 'eager', // 'eager', 'lazy'
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Icon Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the icon set to use with Tabler components. By default,
    | this package uses the blade-tabler-icons package which provides
    | access to all Tabler Icons as Blade components.
    |
    */

    'icons' => [
        'prefix' => 'tabler-', // Icon component prefix (e.g., <x-tabler-home />)
        'default_class' => 'icon', // Default CSS class for icons
    ],

    /*
    |--------------------------------------------------------------------------
    | Form Component Configuration
    |--------------------------------------------------------------------------
    |
    | Configure default behavior for form components including validation
    | error display and styling options.
    |
    */

    'forms' => [
        'show_errors' => env('TABLER_FORMS_SHOW_ERRORS', true),
        'error_bag' => 'default',
    ],

];
