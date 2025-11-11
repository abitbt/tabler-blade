<?php

/**
 * Example Menu Configuration
 *
 * This file demonstrates how to define menus using configuration arrays.
 * Copy this file to your application's config directory and customize as needed.
 *
 * Usage: TablerMenu::fromConfig('menus.main')
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Main Navigation Menu
    |--------------------------------------------------------------------------
    |
    | The primary navigation menu for your application.
    |
    */
    'main' => [
        [
            'type' => 'link',
            'title' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'home',
            'active' => 'dashboard',
        ],

        [
            'type' => 'dropdown',
            'title' => 'Components',
            'icon' => 'package',
            'badge' => 'Hot',
            'columns' => 2,
            'items' => [
                ['title' => 'Alerts', 'route' => 'components.alerts'],
                ['title' => 'Avatars', 'route' => 'components.avatars'],
                ['title' => 'Badges', 'route' => 'components.badges'],
                ['title' => 'Buttons', 'route' => 'components.buttons'],
                ['type' => 'divider'],
                ['title' => 'Cards', 'route' => 'components.cards'],
                ['title' => 'Carousel', 'route' => 'components.carousel'],
                ['title' => 'Dropdowns', 'route' => 'components.dropdowns'],
                ['title' => 'Forms', 'route' => 'components.forms'],
            ],
        ],

        [
            'type' => 'dropdown',
            'title' => 'Admin',
            'icon' => 'shield',
            'can' => 'access-admin',
            'items' => [
                ['title' => 'Dashboard', 'route' => 'admin.dashboard'],
                ['type' => 'divider'],
                [
                    'type' => 'dropdown',
                    'title' => 'User Management',
                    'items' => [
                        ['title' => 'All Users', 'route' => 'admin.users.index'],
                        ['title' => 'Roles', 'route' => 'admin.roles.index'],
                        ['title' => 'Permissions', 'route' => 'admin.permissions.index'],
                    ],
                ],
                ['type' => 'divider'],
                ['title' => 'Settings', 'route' => 'admin.settings'],
            ],
        ],

        [
            'type' => 'link',
            'title' => 'Documentation',
            'url' => 'https://docs.example.com',
            'icon' => 'book',
            'target' => '_blank',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Sidebar Menu
    |--------------------------------------------------------------------------
    |
    | Navigation menu for vertical sidebar layouts.
    |
    */
    'sidebar' => [
        ['type' => 'heading', 'title' => 'Main Navigation'],

        [
            'type' => 'link',
            'title' => 'Dashboard',
            'route' => 'dashboard',
            'icon' => 'home',
            'active' => 'dashboard',
        ],

        [
            'type' => 'link',
            'title' => 'Posts',
            'route' => 'posts.index',
            'icon' => 'file-text',
            'badge' => ['text' => '5', 'color' => 'red'],
            'active' => 'posts.*',
        ],

        ['type' => 'heading', 'title' => 'Management'],

        [
            'type' => 'dropdown',
            'title' => 'User Management',
            'icon' => 'users',
            'can' => 'manage-users',
            'items' => [
                ['title' => 'All Users', 'route' => 'users.index'],
                ['title' => 'Roles', 'route' => 'roles.index'],
                ['title' => 'Permissions', 'route' => 'permissions.index'],
            ],
        ],

        [
            'type' => 'link',
            'title' => 'Settings',
            'route' => 'settings',
            'icon' => 'settings',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu (Profile Dropdown)
    |--------------------------------------------------------------------------
    |
    | Dropdown menu for user account actions.
    |
    */
    'user' => [
        [
            'type' => 'link',
            'title' => 'Profile',
            'route' => 'profile.show',
            'icon' => 'user',
        ],

        [
            'type' => 'link',
            'title' => 'Settings',
            'route' => 'settings',
            'icon' => 'settings',
        ],

        ['type' => 'divider'],

        [
            'type' => 'link',
            'title' => 'Logout',
            'route' => 'logout',
            'icon' => 'logout',
        ],
    ],
];
