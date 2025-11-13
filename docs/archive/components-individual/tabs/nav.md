# Tab Nav

> Navigation container component for creating tab-based interfaces with support for multiple styles and layouts.

## Overview

The Tab Nav component serves as the container for tab navigation items, providing the structural foundation for tabbed interfaces. It manages the visual presentation and behavior of tab navigation, supporting both traditional tabs and pill-style navigation, with flexible layout options including full-width and justified distributions.

Use this component when you need to:
- Create tabbed navigation for switching between different content sections
- Display navigation items in a horizontal list with visual tab indicators
- Integrate tabs into card headers for compact layouts
- Build pill-style navigation as an alternative to traditional tabs
- Ensure consistent tab navigation across your application
- Provide accessible keyboard navigation for tab switching

The Tab Nav component automatically applies proper ARIA roles and Bootstrap data attributes, ensuring accessibility and proper tab functionality. It works in conjunction with Tab Nav Item components for individual navigation links and integrates seamlessly with Tab Content and Tab Pane components for complete tabbed interfaces.

---

## Basic Usage

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `inCard` | `bool` | `false` | Whether tabs are inside a card header (automatically adds `card-header-tabs` or `card-header-pills` class) |
| `pills` | `bool` | `false` | Use pills style instead of tabs for alternative visual appearance |
| `fill` | `bool` | `false` | Make tabs fill full width proportionally based on content |
| `justified` | `bool` | `false` | Make tabs equal width regardless of content length |
| `class` | `string` | `''` | Additional CSS classes to apply to the navigation element |

**Note:** All additional HTML attributes (like `id`, `data-*`, `aria-*`, etc.) are passed through to the root `<ul>` element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Tab navigation items (typically `<x-tabler::tabs.nav-item>` components) |

**Usage:** The default slot contains all tab navigation items that will be displayed in the navigation bar.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute or are automatically applied:

**Base Classes (automatically applied):**
- `nav` - Base Bootstrap navigation class (always applied)
- `nav-tabs` - Tab style navigation (default, unless `pills=true`)
- `nav-pills` - Pill style navigation (applied when `pills=true`)

**Layout Modifiers:**
- `nav-fill` - Tabs fill full width proportionally (applied when `fill=true`)
- `nav-justified` - Tabs have equal width (applied when `justified=true`)

**Card Integration (automatically applied when `inCard=true`):**
- `card-header-tabs` - Applied for tabs style in card header
- `card-header-pills` - Applied for pills style in card header

**Spacing & Alignment:**
- `mt-{0-5}`, `mb-{0-5}` - Margin top/bottom spacing
- `ms-{0-5}`, `me-{0-5}` - Margin start/end spacing
- `justify-content-center` - Center align tabs
- `justify-content-end` - Right align tabs

**Border Variations:**
- `border-0` - Remove default tab border
- `border-top`, `border-bottom` - Add specific borders

---

## Examples

### Basic Tab Navigation

A standard tab navigation with three tabs.

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Pills Style Navigation

Use pill-style navigation for a more rounded, button-like appearance.

```blade
<x-tabler::tabs.nav pills>
    <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#analytics">Analytics</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#reports">Reports</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#export">Export</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Full-Width Tabs (Fill)

Make tabs fill the full width proportionally based on their content.

```blade
<x-tabler::tabs.nav fill>
    <x-tabler::tabs.nav-item href="#tab1" active>Dashboard</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Users</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab3">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Justified Tabs (Equal Width)

Create tabs with equal width regardless of content length.

```blade
<x-tabler::tabs.nav justified>
    <x-tabler::tabs.nav-item href="#info" active>Info</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#documentation">Documentation</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#api">API</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Tabs in Card Header

Integrate tabs directly into a card header for compact layouts.

```blade
<x-tabler::card>
    <x-slot:header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#details" active>Details</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#activity">Activity</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#history">History</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-slot:header>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="details" active>
            <p>Details content goes here...</p>
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="activity">
            <p>Activity content goes here...</p>
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="history">
            <p>History content goes here...</p>
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::card>
```

---

### Pills in Card Header

Use pill-style navigation in a card header.

```blade
<x-tabler::card>
    <x-slot:header>
        <x-tabler::tabs.nav inCard pills>
            <x-tabler::tabs.nav-item href="#summary" active>Summary</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#metrics">Metrics</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#logs">Logs</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-slot:header>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="summary" active>
            <p>Summary information...</p>
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="metrics">
            <p>Metrics dashboard...</p>
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="logs">
            <p>System logs...</p>
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::card>
```

---

### With Icon-Only Navigation Items

Combine regular tabs with icon-only tabs for a mixed navigation.

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#dashboard" active icon="home">Dashboard</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#users" icon="users">Users</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#reports" icon="file-analytics">Reports</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
</x-tabler::tabs.nav>
```

---

### Laravel Dynamic Tabs with Loop

Generate tabs dynamically from a collection using Laravel's Blade directives.

```blade
@php
    $sections = [
        ['id' => 'overview', 'label' => 'Overview', 'icon' => 'eye'],
        ['id' => 'users', 'label' => 'Users', 'icon' => 'users'],
        ['id' => 'settings', 'label' => 'Settings', 'icon' => 'settings'],
        ['id' => 'billing', 'label' => 'Billing', 'icon' => 'credit-card'],
    ];
@endphp

<x-tabler::tabs.nav>
    @foreach ($sections as $index => $section)
        <x-tabler::tabs.nav-item
            href="#{{ $section['id'] }}"
            :active="$index === 0"
            :icon="$section['icon']"
        >
            {{ $section['label'] }}
        </x-tabler::tabs.nav-item>
    @endforeach
</x-tabler::tabs.nav>
```

---

### Conditional Tab Visibility

Show or hide tabs based on user permissions or application state.

```blade
<x-tabler::tabs.nav pills>
    <x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#account">Account</x-tabler::tabs.nav-item>

    @can('view-analytics')
        <x-tabler::tabs.nav-item href="#analytics" icon="chart-bar">Analytics</x-tabler::tabs.nav-item>
    @endcan

    @if(auth()->user()->isAdmin())
        <x-tabler::tabs.nav-item href="#admin" icon="shield">Admin</x-tabler::tabs.nav-item>
    @endif

    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
</x-tabler::tabs.nav>
```

---

### Responsive Tab Navigation

Create responsive tabs that adapt to different screen sizes with custom classes.

```blade
<x-tabler::tabs.nav class="flex-column flex-sm-row">
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#products">Products</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#services">Services</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#about">About</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#contact">Contact</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Complete Tabbed Interface

A full example combining Tab Nav with content panes.

```blade
<div class="card">
    <div class="card-header">
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#general" active icon="settings">General</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#security" icon="lock">Security</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#notifications" icon="bell">Notifications</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#billing" icon="credit-card">Billing</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </div>

    <div class="card-body">
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="general" active>
                <h3 class="card-title">General Settings</h3>
                <p>Configure your general application settings here.</p>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="security">
                <h3 class="card-title">Security Settings</h3>
                <p>Manage your security preferences and authentication.</p>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="notifications">
                <h3 class="card-title">Notification Preferences</h3>
                <p>Choose how you want to receive notifications.</p>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="billing">
                <h3 class="card-title">Billing Information</h3>
                <p>Update your payment methods and billing details.</p>
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </div>
</div>
```

---

### Centered Tab Navigation

Center-align tabs within the container.

```blade
<x-tabler::tabs.nav class="justify-content-center">
    <x-tabler::tabs.nav-item href="#features" active>Features</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#pricing">Pricing</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#support">Support</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

## Accessibility

The Tab Nav component implements ARIA best practices for accessible tab navigation:

**ARIA Roles:**
- `role="tablist"` - Applied to the `<ul>` element to identify it as a tab list container
- Works in conjunction with `role="tab"` on individual tab items (handled by Tab Nav Item component)

**Keyboard Navigation:**
- **Tab** - Moves focus into and out of the tab list
- **Arrow Left/Right** - Navigate between tabs (handled by Bootstrap's tab JavaScript)
- **Home** - Jump to the first tab
- **End** - Jump to the last tab
- **Enter/Space** - Activate the focused tab

**Screen Reader Support:**
- Tab items announce their state (selected/not selected)
- Proper association between tab controls and tab panels via ARIA attributes
- Descriptive labels for icon-only tabs via `aria-label`

**Best Practices:**
- Always mark exactly one tab as `active` to indicate the current selection
- Use descriptive text labels that clearly indicate the content of each tab
- For icon-only tabs, ensure proper `aria-label` attributes are provided
- Avoid using disabled tabs unless absolutely necessary, as they can confuse users

---

## Browser Compatibility

The Tab Nav component is compatible with all modern browsers:

- **Chrome/Edge** (Latest 2 versions)
- **Firefox** (Latest 2 versions)
- **Safari** (Latest 2 versions)
- **Mobile Safari** (iOS 12+)
- **Chrome for Android** (Latest)

**Compatibility Notes:**
- Requires Bootstrap 5.x JavaScript for tab switching functionality
- CSS Grid and Flexbox support required (all modern browsers)
- Uses `data-bs-toggle="tabs"` attribute for Bootstrap tab initialization
- Proper keyboard navigation requires JavaScript enabled

**Graceful Degradation:**
- Without JavaScript, tabs display as a styled list of links
- All content panes remain accessible via anchor links
- Visual styling maintains even if Bootstrap JS is not loaded

---

## Related Components

**Tab System Components:**
- [Tab Nav Item](/docs/components/tabs-nav-item.md) - Individual tab navigation links
- [Tab Content](/docs/components/tabs-content.md) - Container for tab content panes
- [Tab Pane](/docs/components/tabs-pane.md) - Individual content panes for each tab

**Layout Components:**
- [Card](/docs/components/card.md) - Container component for card-based layouts
- [Card Header](/docs/components/card.md#card-header) - Header section for cards (used with `inCard` prop)

**Navigation Components:**
- [Navbar](/docs/components/navbar.md) - Main navigation bar component
- [Breadcrumb](/docs/components/breadcrumb.md) - Breadcrumb navigation

---

## Source

**Component Location:** `/tabler-blade/stubs/resources/views/tabler/tabs/nav.blade.php`

---

## Changelog

### Version 1.0.0
- Initial release of Tab Nav component
- Support for tabs and pills styles
- Full-width and justified layout options
- Card header integration
- ARIA accessibility implementation
- Bootstrap 5 tab functionality integration
