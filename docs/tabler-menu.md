# TablerMenu Documentation

## Table of Contents

- [Introduction](#introduction)
- [Installation](#installation)
- [Quick Start](#quick-start)
- [Building Menus](#building-menus)
  - [Programmatic API](#programmatic-api)
  - [Configuration-Based API](#configuration-based-api)
- [Menu Items](#menu-items)
  - [Links](#links)
  - [Dropdowns](#dropdowns)
  - [Headings](#headings)
  - [Dividers](#dividers)
- [Active State Detection](#active-state-detection)
- [Authorization](#authorization)
- [Conditional Rendering](#conditional-rendering)
- [Icons and Badges](#icons-and-badges)
- [Advanced Features](#advanced-features)
- [API Reference](#api-reference)
- [Examples](#examples)

---

## Introduction

TablerMenu is a powerful, fluent menu builder for Laravel applications using the Tabler UI framework. It provides two ways to build menus:

1. **Programmatic API** - Build menus using a fluent PHP interface
2. **Configuration API** - Define menus in configuration files

Both approaches support authorization, active state detection, icons, badges, nested dropdowns, and more.

---

## Installation

The TablerMenu system is included with the `abitbt/tabler-blade` package. After installing the package:

```bash
composer require abitbt/tabler-blade
```

Optionally publish the configuration file:

```bash
php artisan vendor:publish --tag=tabler-config
```

---

## Quick Start

### Programmatic Approach

```php
use Abitbt\TablerBlade\TablerMenu\TablerMenu;

$menu = TablerMenu::make()
    ->link('Dashboard', '/dashboard')
    ->link('Profile', '/profile')
    ->dropdown('Settings')->items(function ($menu) {
        $menu->link('Account', '/settings/account');
        $menu->link('Privacy', '/settings/privacy');
    });

// Convert to array for rendering
$menuArray = $menu->toArray();
```

### Configuration Approach

**config/menus.php:**
```php
return [
    'main' => [
        ['title' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'home'],
        ['title' => 'Profile', 'route' => 'profile', 'icon' => 'user'],
    ],
];
```

**Usage:**
```php
$menu = TablerMenu::fromConfig('menus.main');
```

### Helper Function

```php
// Programmatic
$menu = tabler_menu();

// Configuration-based
$menu = tabler_menu('menus.main');
```

---

## Building Menus

### Programmatic API

The programmatic API uses a fluent interface for building menus:

```php
$menu = TablerMenu::make()
    ->link('Home', '/')
    ->link('About', '/about')
    ->divider()
    ->dropdown('Products')->items(function ($menu) {
        $menu->link('All Products', '/products');
        $menu->link('New Arrivals', '/products/new');
    })
    ->heading('Footer')
    ->link('Contact', '/contact');
```

**Method Chaining:**
```php
$menu = TablerMenu::make()
    ->link('Dashboard', '/dashboard')
        ->icon('home')
        ->badge('New', 'primary')
        ->activeRoute('dashboard')
    ->link('Users', '/users')
        ->icon('users')
        ->can('manage-users');
```

**Note:** Only `divider()` and `heading()` return the TablerMenu instance. Link and dropdown methods return their respective objects for chaining their own methods.

### Configuration-Based API

Define menus in configuration files for better organization:

```php
// config/menus.php
return [
    'main' => [
        [
            'type' => 'link',
            'title' => 'Dashboard',
            'route' => 'dashboard',  // Resolved to URL automatically
            'icon' => 'home',
            'active' => 'dashboard', // Route pattern for active state
        ],
        [
            'type' => 'dropdown',
            'title' => 'Admin',
            'icon' => 'shield',
            'can' => 'access-admin', // Authorization
            'items' => [
                ['title' => 'Users', 'route' => 'admin.users'],
                ['title' => 'Settings', 'route' => 'admin.settings'],
            ],
        ],
        ['type' => 'divider'],
        ['type' => 'heading', 'title' => 'Support'],
        [
            'title' => 'Documentation',
            'url' => 'https://docs.example.com',
            'icon' => 'book',
            'target' => '_blank',
        ],
    ],
];
```

**Usage:**
```php
$menu = TablerMenu::fromConfig('menus.main');
```

---

## Menu Items

### Links

Basic menu links with optional icons, badges, and attributes.

**Programmatic:**
```php
$menu = TablerMenu::make()
    ->link('Dashboard', '/dashboard')
        ->icon('home')
        ->badge('5', 'danger')
        ->activeRoute('dashboard')
    ->link('External', 'https://example.com')
        ->icon('external-link')
        ->newTab();
```

**Configuration:**
```php
[
    'title' => 'Dashboard',
    'url' => '/dashboard',
    'icon' => 'home',
    'badge' => '5',
    'badge_color' => 'danger',
    'active' => 'dashboard',
]
```

**Link Methods:**

- `target(string $target)` - Set link target attribute
- `newTab()` - Open in new tab (shorthand for `target('_blank')`)
- `autoActive(?string $prefix)` - Auto-detect active state
- `activeWhen(string|Closure)` - Custom active condition
- `activeUrl(string $pattern)` - Active when URL matches pattern
- `activeRoute(string $pattern)` - Active when route matches pattern

### Dropdowns

Nested dropdown menus with support for multi-column layouts.

**Basic Dropdown:**
```php
$menu = TablerMenu::make()
    ->dropdown('Settings')->items(function ($menu) {
        $menu->link('Profile', '/profile');
        $menu->link('Account', '/account');
        $menu->divider();
        $menu->link('Logout', '/logout');
    });
```

**Nested Dropdowns:**
```php
$menu = TablerMenu::make()
    ->dropdown('Admin')->items(function ($menu) {
        $menu->heading('User Management');
        $menu->dropdown('Users')->items(function ($submenu) {
            $submenu->link('All Users', '/admin/users');
            $submenu->link('Add User', '/admin/users/create');
        });
        $menu->dropdown('Roles')->items(function ($submenu) {
            $submenu->link('All Roles', '/admin/roles');
            $submenu->link('Permissions', '/admin/permissions');
        });
    });
```

**Multi-Column Mega Menu:**
```php
$menu = TablerMenu::make()
    ->dropdown('Products')
        ->columns(3)
        ->icon('package')
        ->items(function ($menu) {
            // ... many items will be displayed in 3 columns
            $menu->link('Category 1', '/products/cat1');
            $menu->link('Category 2', '/products/cat2');
            // ... more items
        });
```

**Configuration:**
```php
[
    'type' => 'dropdown',
    'title' => 'Settings',
    'icon' => 'settings',
    'columns' => 2,         // Multi-column layout (1-6)
    'right' => true,        // Right-aligned dropdown
    'items' => [
        ['title' => 'Profile', 'route' => 'profile'],
        ['type' => 'divider'],
        ['title' => 'Logout', 'route' => 'logout'],
    ],
]
```

**Dropdown Methods:**

- `items(Closure $callback)` - Define children via callback
- `columns(int $count)` - Set column count (1-6)
- `right(bool $right = true)` - Align dropdown to right
- `link()`, `dropdown()`, `divider()`, `heading()` - Add children

**Active State:**
Dropdowns automatically become active when any child item is active, including nested dropdowns.

### Headings

Section headings to organize menu items.

**Programmatic:**
```php
$menu = TablerMenu::make()
    ->heading('Main Navigation')
    ->link('Dashboard', '/dashboard')
    ->link('Profile', '/profile')
    ->heading('Settings')
    ->link('Account', '/settings/account');
```

**Configuration:**
```php
['type' => 'heading', 'title' => 'Main Navigation']
```

**Notes:**
- Headings are always visible
- Headings are never active
- Used for visual organization only

### Dividers

Visual separators between menu items.

**Programmatic:**
```php
$menu = TablerMenu::make()
    ->link('Home', '/')
    ->link('About', '/about')
    ->divider()
    ->link('Contact', '/contact');
```

**Configuration:**
```php
['type' => 'divider']
```

---

## Active State Detection

TablerMenu provides multiple ways to determine if a menu item is active:

### Route Pattern Matching

```php
$menu->link('Dashboard', '/dashboard')
    ->activeRoute('dashboard');

// Wildcard patterns
$menu->link('Posts', '/posts')
    ->activeRoute('posts.*'); // Matches posts.index, posts.show, etc.
```

**Configuration:**
```php
[
    'title' => 'Dashboard',
    'route' => 'dashboard',
    'active' => 'dashboard', // Route pattern
]
```

### URL Pattern Matching

```php
$menu->link('Blog', '/blog')
    ->activeUrl('blog/*');
```

### Custom Closures

```php
$menu->link('Special', '/special')
    ->activeWhen(fn() => request()->has('special'));
```

### Force Active/Inactive

```php
$menu->link('Home', '/')
    ->active(true); // Always active

$menu->link('Hidden', '/hidden')
    ->active(false); // Never active
```

### Auto-Detection

```php
$menu->link('Dashboard', '/dashboard')
    ->autoActive(); // Matches exact URL

// With route prefix
$menu->link('Admin', '/admin')
    ->autoActive('admin'); // Matches admin.*
```

### Dropdown Active State

Dropdowns automatically inherit active state from children:

```php
$menu->dropdown('Settings')->items(function ($menu) {
    $menu->link('Profile', '/profile')->activeRoute('profile');
    // If /profile is current route, both the link AND dropdown are active
});
```

---

## Authorization

Integrate Laravel's Gate authorization to control menu visibility.

### Single Ability

**Programmatic:**
```php
$menu->link('Admin Panel', '/admin')
    ->can('access-admin');
```

**Configuration:**
```php
[
    'title' => 'Admin Panel',
    'url' => '/admin',
    'can' => 'access-admin',
]
```

### Multiple Abilities (Any)

**Programmatic:**
```php
$menu->link('Content', '/content')
    ->canAny(['edit-posts', 'edit-pages']);
```

**Configuration:**
```php
[
    'title' => 'Content',
    'url' => '/content',
    'canAny' => ['edit-posts', 'edit-pages'],
]
```

### Custom Authorization

```php
$menu->link('Special', '/special')
    ->authorize(fn($user) => $user->isVip());
```

### Authorization with Arguments

```php
$menu->link('Edit Post', '/posts/1/edit')
    ->can('update', $post);
```

### Dropdown Authorization

```php
$menu->dropdown('Admin')
    ->can('access-admin') // Entire dropdown hidden if unauthorized
    ->items(function ($menu) {
        $menu->link('Users', '/admin/users')
            ->can('manage-users'); // Individual item authorization
    });
```

**Notes:**
- Unauthorized items are automatically filtered from output
- Works in both programmatic and config modes
- Uses Laravel's Gate facade

---

## Conditional Rendering

Control menu item visibility based on conditions.

### When/Unless on TablerMenu

```php
$menu = TablerMenu::make()
    ->link('Home', '/')
    ->when(auth()->check(), function ($m) {
        $m->link('Dashboard', '/dashboard');
        $m->link('Profile', '/profile');
    })
    ->unless(auth()->check(), function ($m) {
        $m->link('Login', '/login');
        $m->link('Register', '/register');
    });
```

### If/Unless on Menu Items

```php
$menu = TablerMenu::make()
    ->link('Admin', '/admin')
        ->if(auth()->user()?->isAdmin())
    ->link('Public', '/public')
        ->unless(request()->is('public'));
```

### Grouping

```php
$menu = TablerMenu::make()
    ->group('Navigation', function ($m) {
        $m->link('Home', '/');
        $m->link('About', '/about');
    })
    ->group('Account', function ($m) {
        $m->link('Profile', '/profile');
        $m->link('Settings', '/settings');
    });
```

---

## Icons and Badges

### Icons

TablerMenu integrates with Tabler Icons via the `secondnetwork/blade-tabler-icons` package.

**Programmatic:**
```php
$menu->link('Dashboard', '/dashboard')
    ->icon('home');

$menu->dropdown('Settings')
    ->icon('settings');
```

**Configuration:**
```php
[
    'title' => 'Dashboard',
    'url' => '/dashboard',
    'icon' => 'home',
]
```

### Badges

**Programmatic:**
```php
$menu->link('Messages', '/messages')
    ->badge('5'); // No color

$menu->link('Notifications', '/notifications')
    ->badge('3', 'danger'); // With color
```

**Configuration:**
```php
[
    'title' => 'Messages',
    'url' => '/messages',
    'badge' => '5',
    'badge_color' => 'danger',
]

// Or object syntax
[
    'title' => 'Messages',
    'url' => '/messages',
    'badge' => ['text' => '5', 'color' => 'danger'],
]
```

**Badge Colors:**
- `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`
- Or any custom Tabler color class

---

## Advanced Features

### Custom HTML Attributes

```php
$menu->link('External', 'https://example.com')
    ->attributes([
        'data-turbo' => 'false',
        'data-confirm' => 'Are you sure?',
    ]);

// Single attribute
$menu->link('Link', '/link')
    ->attribute('data-test', 'value');
```

**Configuration:**
```php
[
    'title' => 'Link',
    'url' => '/link',
    'attributes' => [
        'data-turbo' => 'false',
    ],
]
```

### Macros (Extending TablerMenu)

Add custom methods to TablerMenu:

**config/tabler.php:**
```php
'menu' => [
    'macros' => [
        'adminSection' => function () {
            return $this->group('Administration', function ($m) {
                $m->link('Users', '/admin/users')->can('manage-users');
                $m->link('Settings', '/admin/settings')->can('manage-settings');
            });
        },
    ],
],
```

**Usage:**
```php
$menu = TablerMenu::make()
    ->link('Dashboard', '/dashboard')
    ->adminSection(); // Custom macro
```

### Programmatic Macros

```php
use Abitbt\TablerBlade\TablerMenu\TablerMenu;

TablerMenu::macro('quickLinks', function (array $links) {
    foreach ($links as $title => $url) {
        $this->link($title, $url);
    }
    return $this;
});

// Usage
$menu = TablerMenu::make()
    ->quickLinks([
        'Home' => '/',
        'About' => '/about',
        'Contact' => '/contact',
    ]);
```

### Getting Menu Items

```php
$menu = TablerMenu::make()
    ->link('Visible', '/visible')
    ->link('Hidden', '/hidden')->if(false);

// Get all items (including hidden)
$allItems = $menu->getItems(); // 2 items

// Get only visible items
$visibleItems = $menu->getVisibleItems(); // 1 item

// Convert to array (only visible items)
$array = $menu->toArray(); // 1 item
```

### Service Container Binding

```php
// Resolve from container
$menu = app('tabler.menu');

// Or using helper
$menu = tabler_menu();
```

---

## API Reference

### TablerMenu

**Static Methods:**
- `make()` - Create new menu builder instance
- `fromConfig(string $key)` - Create menu from configuration

**Instance Methods:**
- `link(string $title, string $url)` - Add link (returns MenuLink)
- `dropdown(string $title)` - Add dropdown (returns MenuDropdown)
- `divider()` - Add divider (returns self)
- `heading(string $title)` - Add heading (returns self)
- `when(bool $condition, Closure $callback)` - Conditional items (returns self)
- `unless(bool $condition, Closure $callback)` - Conditional items (returns self)
- `group(string $heading, Closure $callback)` - Grouped items (returns self)
- `getItems()` - Get all menu items
- `getVisibleItems()` - Get visible menu items
- `toArray()` - Convert to array representation

### MenuLink

**Constructor:**
- `__construct(string $title, string $url)`

**Methods:**
- `icon(string $icon)` - Set icon
- `badge(string $text, ?string $color)` - Set badge
- `target(string $target)` - Set target attribute
- `newTab()` - Open in new tab
- `autoActive(?string $prefix)` - Auto-detect active state
- `activeWhen(string|Closure $condition)` - Set active condition
- `activeUrl(string $pattern)` - Active when URL matches
- `activeRoute(string $pattern)` - Active when route matches
- `active(bool $active = true)` - Force active state
- `can(string $ability, mixed $arguments = [])` - Require ability
- `canAny(array $abilities, mixed $arguments = [])` - Require any ability
- `authorize(Closure $callback)` - Custom authorization
- `if(bool $condition)` - Show if condition true
- `unless(bool $condition)` - Show unless condition true
- `attributes(array $attributes)` - Set HTML attributes
- `attribute(string $key, mixed $value)` - Set single attribute

### MenuDropdown

**Constructor:**
- `__construct(string $title)`

**Methods:**
- `icon(string $icon)` - Set icon
- `badge(string $text, ?string $color)` - Set badge
- `items(Closure $callback)` - Define children
- `link(string $title, string $url)` - Add link child
- `dropdown(string $title)` - Add dropdown child
- `divider()` - Add divider child
- `heading(string $title)` - Add heading child
- `columns(int $columns)` - Set column count (1-6)
- `right(bool $right = true)` - Align to right
- `activeWhen(string|Closure $condition)` - Set active condition
- `active(bool $active = true)` - Force active state
- `can(string $ability, mixed $arguments = [])` - Require ability
- `canAny(array $abilities, mixed $arguments = [])` - Require any ability
- `authorize(Closure $callback)` - Custom authorization
- `if(bool $condition)` - Show if condition true
- `unless(bool $condition)` - Show unless condition true
- `attributes(array $attributes)` - Set HTML attributes

---

## Examples

### Complete Navbar Menu

```php
$navbar = TablerMenu::make()
    ->link('Home', route('home'))
        ->icon('home')
        ->activeRoute('home')

    ->link('Dashboard', route('dashboard'))
        ->icon('dashboard')
        ->activeRoute('dashboard')
        ->can('access-dashboard')

    ->dropdown('Products')
        ->icon('package')
        ->columns(2)
        ->items(function ($menu) {
            $menu->heading('Categories');
            $menu->link('All Products', route('products.index'));
            $menu->link('New Arrivals', route('products.new'));
            $menu->link('Best Sellers', route('products.popular'));

            $menu->divider();

            $menu->heading('Brands');
            $menu->link('Brand A', route('products.brand', 'a'));
            $menu->link('Brand B', route('products.brand', 'b'));
        })

    ->dropdown('Account')
        ->icon('user')
        ->right()
        ->items(function ($menu) {
            $menu->link('Profile', route('profile.show'));
            $menu->link('Settings', route('settings'));
            $menu->divider();
            $menu->link('Logout', route('logout'))
                ->icon('logout');
        });
```

### Vertical Sidebar Menu

```php
$sidebar = TablerMenu::make()
    ->heading('Navigation')

    ->link('Dashboard', route('dashboard'))
        ->icon('home')
        ->activeRoute('dashboard')

    ->link('Posts', route('posts.index'))
        ->icon('file-text')
        ->badge('12', 'primary')
        ->activeRoute('posts.*')
        ->can('view-posts')

    ->link('Comments', route('comments.index'))
        ->icon('message-circle')
        ->badge('5', 'danger')
        ->activeRoute('comments.*')

    ->divider()

    ->heading('Administration')

    ->dropdown('User Management')
        ->icon('users')
        ->can('manage-users')
        ->items(function ($menu) {
            $menu->link('All Users', route('admin.users.index'))
                ->activeRoute('admin.users.*');
            $menu->link('Roles', route('admin.roles.index'))
                ->activeRoute('admin.roles.*');
            $menu->link('Permissions', route('admin.permissions.index'))
                ->activeRoute('admin.permissions.*');
        })

    ->dropdown('Settings')
        ->icon('settings')
        ->can('manage-settings')
        ->items(function ($menu) {
            $menu->link('General', route('settings.general'));
            $menu->link('Email', route('settings.email'));
            $menu->link('Security', route('settings.security'));
        });
```

### Configuration-Based Multi-Level Menu

**config/menus.php:**
```php
return [
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
            'title' => 'Content',
            'icon' => 'file-text',
            'can' => 'manage-content',
            'items' => [
                [
                    'title' => 'Posts',
                    'route' => 'posts.index',
                    'badge' => '12',
                    'badge_color' => 'primary',
                    'active' => 'posts.*',
                ],
                [
                    'type' => 'dropdown',
                    'title' => 'Categories',
                    'items' => [
                        ['title' => 'All Categories', 'route' => 'categories.index'],
                        ['title' => 'Add Category', 'route' => 'categories.create'],
                    ],
                ],
                ['type' => 'divider'],
                ['title' => 'Media Library', 'route' => 'media.index'],
            ],
        ],

        ['type' => 'divider'],
        ['type' => 'heading', 'title' => 'System'],

        [
            'title' => 'Settings',
            'route' => 'settings',
            'icon' => 'settings',
            'can' => 'manage-settings',
        ],
    ],

    'user' => [
        [
            'title' => 'Profile',
            'route' => 'profile.show',
            'icon' => 'user',
        ],
        [
            'title' => 'Settings',
            'route' => 'settings',
            'icon' => 'settings',
        ],
        ['type' => 'divider'],
        [
            'title' => 'Logout',
            'route' => 'logout',
            'icon' => 'logout',
        ],
    ],
];
```

**Usage in Layout:**
```php
// AppServiceProvider or route file
use Illuminate\Support\Facades\View;

View::composer('*', function ($view) {
    $view->with('navbar_menu', tabler_menu('menus.main'));
    $view->with('user_menu', tabler_menu('menus.user'));
});
```

### Dynamic Menu Based on User Role

```php
$menu = TablerMenu::make()
    ->link('Dashboard', route('dashboard'))
        ->icon('home')

    ->when(auth()->user()->can('view-analytics'), function ($m) {
        $m->link('Analytics', route('analytics'))
            ->icon('chart-line')
            ->badge('New', 'success');
    })

    ->when(auth()->user()->isAdmin(), function ($m) {
        $m->dropdown('Admin')
            ->icon('shield')
            ->items(function ($menu) {
                $menu->link('Users', route('admin.users'));
                $menu->link('Settings', route('admin.settings'));
                $menu->link('Logs', route('admin.logs'));
            });
    })

    ->unless(auth()->user()->isGuest(), function ($m) {
        $m->link('My Content', route('my-content'))
            ->icon('folder');
    });
```

### Mega Menu with Multi-Column Layout

```php
$menu = TablerMenu::make()
    ->dropdown('Products')
        ->icon('package')
        ->columns(4)
        ->items(function ($menu) {
            $menu->heading('Electronics');
            $menu->link('Laptops', route('products.laptops'));
            $menu->link('Phones', route('products.phones'));
            $menu->link('Tablets', route('products.tablets'));
            $menu->link('Accessories', route('products.accessories'));

            $menu->heading('Clothing');
            $menu->link('Men', route('products.men'));
            $menu->link('Women', route('products.women'));
            $menu->link('Kids', route('products.kids'));
            $menu->link('Shoes', route('products.shoes'));

            $menu->heading('Home & Garden');
            $menu->link('Furniture', route('products.furniture'));
            $menu->link('Kitchen', route('products.kitchen'));
            $menu->link('Outdoor', route('products.outdoor'));
            $menu->link('Decor', route('products.decor'));

            $menu->heading('More');
            $menu->link('Books', route('products.books'));
            $menu->link('Sports', route('products.sports'));
            $menu->link('Toys', route('products.toys'));
            $menu->link('Sale', route('products.sale'))
                ->badge('50%', 'danger');
        });
```

---

## Best Practices

1. **Use Configuration for Static Menus** - Store menu definitions in config files for easier maintenance
2. **Use Programmatic API for Dynamic Menus** - Build menus dynamically based on user state, permissions, or runtime data
3. **Leverage Active State Detection** - Use `activeRoute()` with wildcard patterns for section-level active states
4. **Apply Authorization Early** - Use `can()` and `canAny()` to filter menu items before rendering
5. **Group Related Items** - Use `group()` or headings to organize menu items logically
6. **Cache Config-Based Menus** - Consider caching the output of `fromConfig()` for performance
7. **Use Badges Sparingly** - Reserve badges for important notifications or counts
8. **Test Menu Authorization** - Write tests to ensure menu items respect authorization rules
9. **Keep Nesting Shallow** - Limit dropdown nesting to 2-3 levels for better UX
10. **Use Descriptive Route Names** - Makes `activeRoute()` patterns more readable and maintainable

---

## Troubleshooting

### Menu Items Not Showing

**Check authorization:**
```php
// Make sure the user has required permissions
$menu->link('Admin', '/admin')->can('access-admin');
```

**Check visibility conditions:**
```php
// Verify conditional logic
$menu->link('Link', '/link')->if(true); // Should be visible
```

### Active State Not Working

**Verify route names:**
```php
// Make sure route exists and matches
Route::get('/dashboard', ...)->name('dashboard');

$menu->link('Dashboard', route('dashboard'))
    ->activeRoute('dashboard'); // Exact match
```

**Use wildcards for sections:**
```php
// For posts.index, posts.show, posts.edit, etc.
$menu->link('Posts', route('posts.index'))
    ->activeRoute('posts.*');
```

### Configuration Not Loading

**Check config key:**
```php
// Ensure config key exists
config('menus.main'); // Should return array

$menu = TablerMenu::fromConfig('menus.main');
```

**Clear config cache:**
```bash
php artisan config:clear
```

### Icons Not Displaying

**Ensure Tabler Icons is installed:**
```bash
composer require secondnetwork/blade-tabler-icons
```

**Use correct icon names:**
```php
// Check available icons at https://tabler.io/icons
$menu->link('Home', '/')->icon('home'); // Correct
$menu->link('Home', '/')->icon('home-icon'); // Incorrect
```

---

## Performance Considerations

1. **Cache Config-Based Menus** - The `fromConfig()` method processes arrays on every call
2. **Lazy Load Authorization** - Gate checks happen during rendering, not building
3. **Minimize Database Queries** - Avoid N+1 queries in authorization callbacks
4. **Use View Composers** - Share menus across views efficiently
5. **Consider Menu Caching** - Cache the final array output for static menus

---

## Testing

Example test for menu building:

```php
use Abitbt\TablerBlade\TablerMenu\TablerMenu;

it('builds menu with links and dropdowns', function () {
    $menu = TablerMenu::make()
        ->link('Home', '/')
        ->dropdown('Settings')->items(function ($menu) {
            $menu->link('Profile', '/profile');
            $menu->link('Account', '/account');
        });

    $array = $menu->toArray();

    expect($array)->toHaveCount(2)
        ->and($array[0]['type'])->toBe('link')
        ->and($array[1]['type'])->toBe('dropdown')
        ->and($array[1]['children'])->toHaveCount(2);
});

it('filters unauthorized items', function () {
    Gate::define('admin', fn() => false);

    $menu = TablerMenu::make()
        ->link('Public', '/public')
        ->link('Admin', '/admin')->can('admin');

    expect($menu->toArray())->toHaveCount(1);
});
```

---

## Additional Resources

- [Tabler UI Documentation](https://tabler.io)
- [Tabler Icons](https://tabler.io/icons)
- [Laravel Authorization](https://laravel.com/docs/authorization)
- [Laravel Routing](https://laravel.com/docs/routing)

---

## Contributing

Found a bug or have a feature request? Please open an issue on GitHub.

---

## License

This package is open-sourced software licensed under the MIT license.
