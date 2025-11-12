# Breadcrumb

A navigation component that displays the current page's location within the site hierarchy, helping users understand their position and navigate back through parent pages.

## Overview

- Automatically renders a breadcrumb trail from an array of items
- Supports multiple separator styles (chevron, dots, arrows, bullets)
- Optional home icon for the first breadcrumb item
- Linkable items with automatic active state for the current page
- Flexible slot-based content for custom breadcrumb markup
- Built-in accessibility with proper ARIA attributes
- Muted styling option for secondary breadcrumbs
- Seamless integration with Tabler page headers

## Basic Usage

```blade
<x-tabler::breadcrumb :items="['Home', 'Library', 'Data']" />
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `items` | `array` | `[]` | No | Array of breadcrumb items. Each item can be a string (simple text) or an array with 'label' and optional 'url' keys |
| `separator` | `string\|null` | `null` | No | Separator style between items. Options: `'dots'`, `'arrows'`, `'bullets'`. Default is chevron (no value needed) |
| `homeIcon` | `bool` | `false` | No | When `true`, displays a home icon for the first breadcrumb item instead of text |
| `class` | `string` | `''` | No | Additional CSS classes to apply to the breadcrumb container |

## Slots

- **default** - Alternative to the `items` prop. Allows you to manually define breadcrumb content using `<li>` elements. When the default slot is used, the `items` prop is ignored.

## CSS Classes

**Separator Styles:**
- `breadcrumb-dots` - Dot separators between items
- `breadcrumb-arrows` - Arrow separators between items
- `breadcrumb-bullets` - Bullet separators between items
- (default) - Chevron separators (no class needed)

**Visual Styles:**
- `breadcrumb-muted` - Muted/subtle appearance for secondary breadcrumbs

**Item States:**
- `breadcrumb-item` - Individual breadcrumb item (automatically applied)
- `active` - Current/active page (automatically applied to last item)

**Spacing:**
- `mb-1`, `mb-2`, `mb-3` - Margin bottom utilities
- `mt-1`, `mt-2`, `mt-3` - Margin top utilities

## Examples

### Simple String Items

```blade
<x-tabler::breadcrumb :items="['Home', 'Library', 'Data']" />
```

Creates a breadcrumb trail with three items where only the text is displayed and the last item is marked as active.

### Items with URLs

```blade
<x-tabler::breadcrumb :items="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Library', 'url' => '/library'],
    ['label' => 'Articles', 'url' => '/library/articles'],
    ['label' => 'Current Article']
]" />
```

Creates a breadcrumb trail with clickable links for all items except the last one (current page).

### With Dots Separator

```blade
<x-tabler::breadcrumb
    :items="['Dashboard', 'Settings', 'Profile']"
    separator="dots"
/>
```

Uses dot separators instead of the default chevron style.

### With Arrows Separator

```blade
<x-tabler::breadcrumb
    :items="[
        ['label' => 'Admin', 'url' => '/admin'],
        ['label' => 'Users', 'url' => '/admin/users'],
        ['label' => 'Edit User']
    ]"
    separator="arrows"
/>
```

Uses arrow separators for a more directional visual hierarchy.

### With Bullets Separator

```blade
<x-tabler::breadcrumb
    :items="['Home', 'Blog', 'Category', 'Post Title']"
    separator="bullets"
/>
```

Uses bullet separators for a minimal, clean appearance.

### With Home Icon

```blade
<x-tabler::breadcrumb
    :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Products', 'url' => '/products'],
        ['label' => 'Electronics', 'url' => '/products/electronics'],
        ['label' => 'Laptop']
    ]"
    :home-icon="true"
/>
```

Replaces the "Home" text with a home icon for the first breadcrumb item.

### Muted Style

```blade
<x-tabler::breadcrumb
    :items="['Home', 'Documentation', 'Components']"
    class="breadcrumb-muted"
/>
```

Applies a muted/subtle appearance, useful for secondary navigation or when breadcrumbs should be less prominent.

### In Page Header with Spacing

```blade
<div class="page-header">
    <div class="row align-items-center">
        <div class="col">
            <x-tabler::breadcrumb
                :items="[
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'Projects', 'url' => '/projects'],
                    ['label' => 'Website Redesign']
                ]"
                class="mb-2"
            />
            <h2 class="page-title">Website Redesign Project</h2>
            <p class="text-secondary">Manage your project details and team</p>
        </div>
    </div>
</div>
```

Integrates breadcrumbs into a page header with proper spacing and typography hierarchy.

### E-commerce Product Path

```blade
<x-tabler::breadcrumb
    :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Men', 'url' => route('category', 'men')],
        ['label' => 'Clothing', 'url' => route('category.sub', ['men', 'clothing'])],
        ['label' => 'T-Shirts', 'url' => route('category.sub', ['men', 'clothing', 'tshirts'])],
        ['label' => 'Classic Cotton T-Shirt']
    ]"
    :home-icon="true"
    class="mb-3"
/>
```

Shows a deep product category hierarchy typical in e-commerce applications.

### Documentation Navigation

```blade
<x-tabler::breadcrumb
    :items="[
        ['label' => 'Docs', 'url' => '/docs'],
        ['label' => 'Components', 'url' => '/docs/components'],
        ['label' => 'Forms', 'url' => '/docs/components/forms'],
        ['label' => 'Input Groups']
    ]"
    separator="arrows"
    class="breadcrumb-muted mb-3"
/>
```

Perfect for documentation sites with nested content organization.

### Manual Content with Slot

```blade
<x-tabler::breadcrumb class="breadcrumb-dots">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard') }}">
            <x-tabler-home class="icon" />
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('reports') }}">Reports</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('reports.financial') }}">Financial</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Q4 2024 Summary
    </li>
</x-tabler::breadcrumb>
```

Uses the slot for complete manual control over breadcrumb structure and content.

### Dynamic Breadcrumbs from Route

```blade
@php
$breadcrumbs = [
    ['label' => 'Dashboard', 'url' => route('dashboard')],
];

if (request()->routeIs('admin.*')) {
    $breadcrumbs[] = ['label' => 'Admin', 'url' => route('admin.index')];
}

if (request()->routeIs('admin.users.*')) {
    $breadcrumbs[] = ['label' => 'Users', 'url' => route('admin.users.index')];
}

$breadcrumbs[] = ['label' => $pageTitle ?? 'Current Page'];
@endphp

<x-tabler::breadcrumb :items="$breadcrumbs" :home-icon="true" />
```

Dynamically builds breadcrumbs based on the current route and context.

## Accessibility

The Breadcrumb component follows accessibility best practices:

- Wrapped in a `<nav>` element with `aria-label="breadcrumb"` to identify it as breadcrumb navigation
- Uses semantic `<ol>` (ordered list) structure to convey hierarchy
- The last item (current page) has `class="active"` and `aria-current="page"` to indicate the current location
- All links are keyboard accessible and can be navigated using the Tab key
- Screen readers announce the breadcrumb structure and current page location
- Color is not the only means of conveying the active state (text and ARIA attributes are used)

## Browser Compatibility

The Breadcrumb component is compatible with all modern browsers:

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

The component uses standard HTML5 elements and CSS classes, ensuring broad compatibility without requiring JavaScript.

## Related Components

- [Page Header](./page-header.md) - Often contains breadcrumbs for navigation context
- [Badge](./badge.md) - Can be used with breadcrumb items
- [Button](./button.md) - For navigation actions

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/breadcrumb.blade.php`

## Changelog

### v1.0.0
- Initial release of Breadcrumb component
- Array-based item rendering with automatic link generation
- Multiple separator style options (chevron, dots, arrows, bullets)
- Optional home icon for first breadcrumb item
- Muted styling variant
- Full accessibility support with ARIA attributes
- Flexible slot-based content for custom markup
