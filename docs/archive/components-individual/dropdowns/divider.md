# Dropdown Divider

> Horizontal separator line to visually divide dropdown menu sections for better organization and readability.

## Overview

The Dropdown Divider component provides a horizontal line separator used within dropdown menus to create visual sections and group related menu items. This simple but essential component improves menu organization and user experience by clearly distinguishing between different types of actions or menu categories.

**Key Features:**
- Clean horizontal separator line
- Bootstrap 5 styling integration
- Self-closing component (no content required)
- Customizable with additional CSS classes
- Semantic HTML for visual separation
- Minimal markup footprint
- Works with all menu styles (standard, dark, card)

**Use Case:** Use dropdown dividers to separate groups of related items, distinguish primary from secondary actions, separate destructive actions from safe ones, or create logical sections within long menus (e.g., separating "Account Settings" from "Help & Support" from "Logout").

---

## Basic Usage

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('profile') }}">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}">
        Settings
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('logout') }}">
        Logout
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

## Props / Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `class` | `string` | `''` | No | Additional CSS classes to customize appearance |

**Note:** All additional HTML attributes (id, data-*, etc.) are passed through to the divider element. This is a self-closing component - it does not accept content or slots.

---

## Slots

This component does not support any slots. It is a self-closing component rendered as `<x-tabler::dropdowns.divider />`.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Spacing:**
- `my-1` - Add vertical margin (small)
- `my-2` - Add vertical margin (medium)
- `my-3` - Add vertical margin (large)
- `mt-2` - Add top margin only
- `mb-2` - Add bottom margin only

**Visibility:**
- `d-none` - Hide divider
- `d-md-block` - Show only on medium screens and up
- `d-lg-none` - Hide on large screens and up

**Borders:**
- `border-primary` - Primary color divider
- `border-secondary` - Secondary color divider
- `border-2` - Thicker border
- `border-3` - Even thicker border
- `opacity-25` - Lighter divider (25% opacity)
- `opacity-50` - Medium divider (50% opacity)
- `opacity-75` - Darker divider (75% opacity)

---

## Examples

### Basic Divider in Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Actions
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('view') }}" icon="eye">
            View
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('edit') }}" icon="edit">
            Edit
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('delete') }}" icon="trash" class="text-danger">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Menu with safe actions separated from destructive action

---

### Multiple Section Separation

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="secondary">
        User Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Account</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Billing</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('billing') }}" icon="credit-card">
            Payment Methods
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('invoices') }}" icon="file-invoice">
            Invoices
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Support</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('help') }}" icon="help">
            Help Center
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('contact') }}" icon="mail">
            Contact Us
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Sign Out
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Well-organized menu with clear sections for account, billing, support, and logout

---

### Divider with Custom Spacing

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('new') }}" icon="plus">
        New Item
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('import') }}" icon="upload">
        Import
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider class="my-3" />

    <x-tabler::dropdowns.item href="{{ route('export') }}" icon="download">
        Export
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('archive') }}" icon="archive">
        Archive
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Divider with increased vertical spacing for better visual separation

---

### Thicker Divider for Emphasis

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('dashboard') }}" icon="home">
        Dashboard
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('reports') }}" icon="chart-bar">
        Reports
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider class="border-2 border-primary" />

    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Emphasized divider with thicker border and custom color

---

### Subtle Divider with Reduced Opacity

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('all') }}">
        All Items
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('active') }}">
        Active
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider class="opacity-25" />

    <x-tabler::dropdowns.item href="{{ route('archived') }}">
        Archived
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('deleted') }}">
        Deleted
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Subtle, low-contrast divider for minimal visual separation

---

### Conditional Divider

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>

    @can('viewAdmin')
        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Admin</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('admin.dashboard') }}" icon="dashboard">
            Admin Dashboard
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('admin.users') }}" icon="users">
            Manage Users
        </x-tabler::dropdowns.item>
    @endcan

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
        Logout
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Divider only shown when admin section is visible

---

### Dark Theme Menu with Dividers

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="dark">
        Options
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu dark>
        <x-tabler::dropdowns.item href="{{ route('home') }}" icon="home">
            Home
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('products') }}" icon="box">
            Products
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('about') }}" icon="info-circle">
            About
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('contact') }}" icon="mail">
            Contact
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Divider automatically adapts to dark theme menu styling

---

### Responsive Divider Visibility

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('desktop.view') }}">
        Desktop View
    </x-tabler::dropdowns.item>

    {{-- Only show divider on medium screens and up --}}
    <x-tabler::dropdowns.divider class="d-none d-md-block" />

    <x-tabler::dropdowns.item href="{{ route('mobile.view') }}">
        Mobile View
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Divider visibility controlled by responsive breakpoints

---

### Table Row Actions with Divider

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" size="sm" icon="dots-vertical" />

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.item href="{{ route('items.view', $item) }}" icon="eye">
            View Details
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('items.edit', $item) }}" icon="edit">
            Edit
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('items.duplicate', $item) }}" icon="copy">
            Duplicate
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('items.export', $item) }}" icon="download">
            Export
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item
            href="{{ route('items.delete', $item) }}"
            icon="trash"
            class="text-danger"
            onclick="return confirm('Delete this item?')">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Action menu with dividers separating different action types

---

### Notification Menu with Time-Based Sections

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="bell" />

    <x-tabler::dropdowns.menu class="dropdown-menu-end" style="min-width: 320px;">
        <x-tabler::dropdowns.header>Today</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('notification', 1) }}">
            New message from John
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('notification', 2) }}">
            Your report is ready
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Yesterday</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('notification', 3) }}">
            Meeting reminder
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('notification', 4) }}">
            Payment successful
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('notifications.all') }}" class="text-center">
            View All Notifications
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Notification menu with dividers separating time-based sections

---

## Accessibility

### Semantic Role
- The divider is rendered as a `<div>` element with `class="dropdown-divider"`
- Bootstrap's CSS applies `role="separator"` styling automatically
- Screen readers recognize this as a visual separator

### Screen Reader Support
- Dividers are typically ignored by screen readers (presentational element)
- They provide visual organization but don't convey semantic meaning
- Menu structure is communicated through header elements and item grouping
- No additional ARIA attributes are required

### Best Practices
- Use dividers sparingly - only when they improve clarity
- Combine dividers with headers for better semantic structure
- Don't use multiple consecutive dividers (redundant)
- Ensure menu items above and below dividers are logically grouped
- Test menu navigation without visual dividers to ensure logical flow
- Consider using headers instead of or in addition to dividers for better accessibility

**Example:**
```blade
{{-- Good: Divider with semantic header --}}
<x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
<x-tabler::dropdowns.item href="{{ route('profile') }}">Profile</x-tabler::dropdowns.item>
<x-tabler::dropdowns.item href="{{ route('settings') }}">Settings</x-tabler::dropdowns.item>

<x-tabler::dropdowns.divider />

<x-tabler::dropdowns.header>Support</x-tabler::dropdowns.header>
<x-tabler::dropdowns.item href="{{ route('help') }}">Help</x-tabler::dropdowns.item>

{{-- Avoid: Consecutive dividers without purpose --}}
<x-tabler::dropdowns.divider />
<x-tabler::dropdowns.divider />  {{-- Redundant --}}
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for divider styling)
- Modern CSS support (borders, margins)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- No known browser-specific issues
- Divider color may vary slightly based on browser's default border rendering
- High contrast mode may override divider styling in some browsers
- Print stylesheets may hide dividers by default

---

## Related Components

- [Dropdown](./dropdown.md) - Parent dropdown container
- [Dropdown Menu](./menu.md) - Menu container component
- [Dropdown Item](./item.md) - Individual menu item
- [Dropdown Header](./header.md) - Section header for grouping items
- [Dropdown Toggle](./toggle.md) - Toggle button component
- [Divider](../divider.md) - Standalone divider component

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/dropdowns/divider.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Bootstrap 5 integration and Tabler styling
