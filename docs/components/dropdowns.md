# Dropdowns

> Interactive dropdown menu system with support for items, headers, dividers, icons, and badges built on Bootstrap 5 and Popper.js.

## Overview

The Dropdown component system provides a complete solution for creating interactive dropdown menus in your Laravel application. Built on Bootstrap 5's dropdown JavaScript plugin with Popper.js positioning, it offers flexible layouts, customizable styling, comprehensive accessibility support, and seamless integration with the Tabler design system.

**What problems do dropdowns solve:**
- Organizing multiple related actions in a compact space
- Creating navigation menus with hierarchical structure
- Providing context-specific actions for table rows and list items
- Building user profile menus with settings and account options
- Displaying notification centers with rich content
- Offering filtering and sorting options without cluttering the UI

**Common use cases:**
- User account menus with profile, settings, and logout
- Action menus for data table rows (view, edit, delete)
- Navigation menus with grouped categories
- Notification centers with unread counts
- Filter and sort controls for data views
- Context menus for file managers and content editors

**How they work together:**
The dropdown system uses a composable architecture where multiple components work together to create a complete menu. The wrapper provides positioning context, the toggle triggers the menu, and the menu container holds items, headers, and dividers. Each component has specific responsibilities that combine to create flexible, accessible dropdown experiences.

**Components in this group:**
- **Dropdown** - Main wrapper container providing dropdown context and positioning
- **Toggle** - Button or link that triggers the dropdown menu
- **Menu** - Container for menu items with support for arrows, dark theme, and alignment
- **Item** - Individual clickable menu option with icons, badges, and states
- **Header** - Section header to organize and group related menu items
- **Divider** - Horizontal separator line for visual organization

---

## Quick Start

The most common use case - a simple action menu:

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

**Installation**: No additional installation needed - included with tabler-blade package. Requires Bootstrap 5 JavaScript.

---

## Component Comparison

Choose the right component for your needs:

| Component | Purpose | Key Features | When to Use |
|-----------|---------|--------------|-------------|
| Dropdown | Wrapper container | Positioning context, direction control | Always - wraps all dropdown components |
| Toggle | Trigger button/link | Colors, icons, sizes, smart rendering | Open/close the menu - one per dropdown |
| Menu | Content container | Arrows, dark theme, alignment, card style | Hold menu items - one per dropdown |
| Item | Clickable option | Icons, badges, active/disabled states | Every menu option or action |
| Header | Section label | Non-interactive text headers | Organize items into logical groups |
| Divider | Visual separator | Horizontal line | Separate sections or action types |

**Quick Decision Tree**:
- Starting a dropdown? → Use Dropdown wrapper first
- Need to trigger menu? → Add Toggle inside wrapper
- Ready for content? → Add Menu after toggle
- Adding options? → Use Item for each clickable option
- Need to organize? → Use Header to label sections
- Separating groups? → Add Divider between sections

---

## Table of Contents

**Components:**
- [Dropdown](#dropdown) - Main wrapper container
- [Toggle](#toggle) - Trigger button/link
- [Menu](#menu) - Menu container
- [Item](#item) - Individual menu item
- [Header](#header) - Section header
- [Divider](#divider) - Separator line

**Shared Features:**
- [Positioning](#positioning) - Dropup, dropend, dropstart directions
- [Dark Theme](#dark-theme) - Dark menu styling
- [Split Buttons](#split-buttons) - Combined button and dropdown
- [Arrow Indicators](#arrow-indicators) - Visual connection to toggle

**Advanced:**
- [Complete Examples](#complete-examples) - Real-world implementations
- [Composition Patterns](#composition-patterns) - Common menu patterns
- [Laravel Integration](#laravel-integration) - Framework integration
- [Accessibility](#accessibility) - Keyboard navigation and ARIA
- [Best Practices](#best-practices) - Design guidelines
- [Troubleshooting](#troubleshooting) - Common issues and solutions

---

## Dropdown {#dropdown}

The main wrapper container that provides dropdown positioning context and direction control.

### Basic Usage

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** A complete dropdown menu system with toggle and menu

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes (use `dropup`, `dropend`, `dropstart` for positioning) |

**Note:** All additional HTML attributes are passed through to the wrapper div element.

---

### Positioning Examples

#### Dropup (Opens Above)

```blade
<x-tabler::dropdowns.dropdown class="dropup">
    <x-tabler::dropdowns.toggle color="primary">
        Open Above
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

#### Dropend (Opens to Right)

```blade
<x-tabler::dropdowns.dropdown class="dropend">
    <x-tabler::dropdowns.toggle color="primary">
        Open Right
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

#### Dropstart (Opens to Left)

```blade
<x-tabler::dropdowns.dropdown class="dropstart">
    <x-tabler::dropdowns.toggle color="primary">
        Open Left
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Toggle {#toggle}

The button or link element that triggers the dropdown menu.

### Basic Usage

```blade
<x-tabler::dropdowns.toggle color="primary">
    Actions
</x-tabler::dropdowns.toggle>
```

**Output:** A button that opens the dropdown menu when clicked

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string\|null` | `null` | If provided, renders as `<a>` tag instead of `<button>` |
| `color` | `string\|null` | `null` | Button color: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `icon` | `string\|null` | `null` | Trailing Tabler icon name (without `tabler-` prefix) |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** Component intelligently detects `nav-link` or `link` classes and avoids adding `btn` class automatically.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Toggle button text/content |

---

### Examples

#### Button Toggle with Icon

```blade
<x-tabler::dropdowns.toggle color="primary" icon="chevron-down">
    Select Option
</x-tabler::dropdowns.toggle>
```

---

#### Link Toggle

```blade
<x-tabler::dropdowns.toggle href="#" color="primary">
    User Menu
</x-tabler::dropdowns.toggle>
```

---

#### Icon-Only Toggle

```blade
<x-tabler::dropdowns.toggle icon="dots-vertical" class="btn-icon" color="light" />
```

---

#### Navigation Link Toggle

```blade
<x-tabler::dropdowns.toggle href="#" class="nav-link">
    Account
</x-tabler::dropdowns.toggle>
```

---

#### Small Size Toggle

```blade
<x-tabler::dropdowns.toggle color="secondary" class="btn-sm">
    Filters
</x-tabler::dropdowns.toggle>
```

---

#### Ghost Button Toggle

```blade
<x-tabler::dropdowns.toggle color="primary" class="btn-ghost-primary">
    More Options
</x-tabler::dropdowns.toggle>
```

---

#### Toggle with Avatar

```blade
<x-tabler::dropdowns.toggle href="#" class="nav-link d-flex align-items-center">
    <x-tabler::avatar
        src="{{ auth()->user()->avatar }}"
        size="sm"
        class="me-2" />
    <span>{{ auth()->user()->name }}</span>
</x-tabler::dropdowns.toggle>
```

---

## Menu {#menu}

Container for dropdown menu items, headers, and dividers with styling options.

### Basic Usage

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('dashboard') }}">
        Dashboard
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** A dropdown menu container with items

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `arrow` | `bool` | `false` | Show arrow indicator pointing to toggle button |
| `dark` | `bool` | `false` | Dark theme variant with dark background and white text |
| `class` | `string` | `''` | Additional CSS classes (e.g., `dropdown-menu-end`, `dropdown-menu-card`) |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Menu content including items, headers, and dividers |

---

### Examples

#### Menu with Arrow

```blade
<x-tabler::dropdowns.menu arrow>
    <x-tabler::dropdowns.item href="{{ route('option1') }}">
        Option 1
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('option2') }}">
        Option 2
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

#### Right-Aligned Menu

```blade
<x-tabler::dropdowns.menu class="dropdown-menu-end">
    <x-tabler::dropdowns.item href="{{ route('profile') }}">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

#### Dark Theme Menu

```blade
<x-tabler::dropdowns.menu dark>
    <x-tabler::dropdowns.item href="{{ route('home') }}" icon="home">
        Home
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('products') }}" icon="box">
        Products
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

#### Card-Style Menu

```blade
<x-tabler::dropdowns.menu class="dropdown-menu-card" style="max-width: 20rem;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Welcome back!</h4>
            <p class="text-muted">You have 3 new messages.</p>
            <x-tabler::button href="{{ route('messages') }}" color="primary" class="w-100">
                View Messages
            </x-tabler::button>
        </div>
    </div>
</x-tabler::dropdowns.menu>
```

---

## Item {#item}

Individual clickable menu item with support for icons, badges, and states.

### Basic Usage

```blade
<x-tabler::dropdowns.item href="{{ route('dashboard') }}">
    Dashboard
</x-tabler::dropdowns.item>
```

**Output:** A clickable menu item link

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string\|null` | `'#'` | Link URL for navigation |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `active` | `bool` | `false` | Mark item as active/selected |
| `disabled` | `bool` | `false` | Disable item interaction |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes (onclick, wire:click, @click, data-*) are passed through.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Item text/content |
| `badge` | No | Badge or count indicator |
| `checkbox` | No | Checkbox for selectable items |

---

### Examples

#### Item with Icon

```blade
<x-tabler::dropdowns.item href="{{ route('dashboard') }}" icon="home">
    Dashboard
</x-tabler::dropdowns.item>
```

---

#### Active Item

```blade
<x-tabler::dropdowns.item
    href="{{ route('home') }}"
    :active="request()->routeIs('home')">
    Home
</x-tabler::dropdowns.item>
```

---

#### Disabled Item

```blade
<x-tabler::dropdowns.item href="{{ route('analytics') }}" icon="chart-bar" disabled>
    Analytics (Coming Soon)
</x-tabler::dropdowns.item>
```

---

#### Item with Badge

```blade
<x-tabler::dropdowns.item href="{{ route('inbox') }}" icon="mail">
    Inbox
    <x-slot:badge>
        <x-tabler::badge color="primary">12</x-tabler::badge>
    </x-slot:badge>
</x-tabler::dropdowns.item>
```

---

#### Item with Checkbox

```blade
<x-tabler::dropdowns.item href="#" class="form-check">
    <x-slot:checkbox>
        <input type="checkbox" class="form-check-input m-0 me-2" id="option1" checked>
    </x-slot:checkbox>
    <label class="form-check-label" for="option1">Show Completed</label>
</x-tabler::dropdowns.item>
```

---

#### Destructive Action Item

```blade
<x-tabler::dropdowns.item
    href="{{ route('items.delete', $item) }}"
    icon="trash"
    class="text-danger"
    onclick="return confirm('Are you sure?')">
    Delete
</x-tabler::dropdowns.item>
```

---

#### Item with Livewire Action

```blade
<x-tabler::dropdowns.item
    href="#"
    icon="check"
    wire:click="markAsRead({{ $notification->id }})">
    Mark as Read
</x-tabler::dropdowns.item>
```

---

#### Item with Alpine.js

```blade
<x-tabler::dropdowns.item
    href="#"
    @click.prevent="selected = 'all'"
    :class="{ 'active': selected === 'all' }">
    All Items
</x-tabler::dropdowns.item>
```

---

## Header {#header}

Section header to organize and group related menu items.

### Basic Usage

```blade
<x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
```

**Output:** A non-clickable header label in the menu

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Header text content |

---

### Examples

#### Simple Header

```blade
<x-tabler::dropdowns.header>Navigation</x-tabler::dropdowns.header>
<x-tabler::dropdowns.item href="{{ route('home') }}">Home</x-tabler::dropdowns.item>
<x-tabler::dropdowns.item href="{{ route('about') }}">About</x-tabler::dropdowns.item>
```

---

#### Header with Custom Styling

```blade
<x-tabler::dropdowns.header class="text-uppercase small fw-bold">
    Quick Actions
</x-tabler::dropdowns.header>
```

---

#### Header with Badge

```blade
<x-tabler::dropdowns.header class="d-flex justify-content-between align-items-center">
    <span>Notifications</span>
    <x-tabler::badge color="danger">{{ $unreadCount }}</x-tabler::badge>
</x-tabler::dropdowns.header>
```

---

#### Header with Subtitle

```blade
<x-tabler::dropdowns.header>
    <div>Signed in as</div>
    <div class="text-muted small">{{ auth()->user()->email }}</div>
</x-tabler::dropdowns.header>
```

---

## Divider {#divider}

Horizontal separator line to visually divide menu sections.

### Basic Usage

```blade
<x-tabler::dropdowns.divider />
```

**Output:** A horizontal line separator

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

**Note:** This is a self-closing component with no slots or content.

---

### Examples

#### Basic Divider

```blade
<x-tabler::dropdowns.item href="{{ route('edit') }}">Edit</x-tabler::dropdowns.item>
<x-tabler::dropdowns.divider />
<x-tabler::dropdowns.item href="{{ route('delete') }}" class="text-danger">Delete</x-tabler::dropdowns.item>
```

---

#### Divider with Custom Spacing

```blade
<x-tabler::dropdowns.divider class="my-3" />
```

---

#### Thicker Divider

```blade
<x-tabler::dropdowns.divider class="border-2 border-primary" />
```

---

#### Subtle Divider

```blade
<x-tabler::dropdowns.divider class="opacity-25" />
```

---

## Shared Features {#shared-features}

Features and patterns common to dropdown components.

### Positioning {#positioning}

Control where the menu opens relative to the toggle button:

```blade
{{-- Opens below (default) --}}
<x-tabler::dropdowns.dropdown>
    <!-- toggle and menu -->
</x-tabler::dropdowns.dropdown>

{{-- Opens above --}}
<x-tabler::dropdowns.dropdown class="dropup">
    <!-- toggle and menu -->
</x-tabler::dropdowns.dropdown>

{{-- Opens to the right --}}
<x-tabler::dropdowns.dropdown class="dropend">
    <!-- toggle and menu -->
</x-tabler::dropdowns.dropdown>

{{-- Opens to the left --}}
<x-tabler::dropdowns.dropdown class="dropstart">
    <!-- toggle and menu -->
</x-tabler::dropdowns.dropdown>
```

**Menu Alignment:**
```blade
{{-- Align menu to left edge (default) --}}
<x-tabler::dropdowns.menu>

{{-- Align menu to right edge --}}
<x-tabler::dropdowns.menu class="dropdown-menu-end">

{{-- Responsive alignment --}}
<x-tabler::dropdowns.menu class="dropdown-menu-md-end">
```

---

### Dark Theme {#dark-theme}

Dark menu styling for better contrast in dark interfaces:

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="dark">
        Dark Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu dark>
        <x-tabler::dropdowns.item href="#" icon="home">Home</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="box">Products</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Split Buttons {#split-buttons}

Combine a primary action button with a dropdown for related actions:

```blade
<div class="btn-group">
    <x-tabler::button color="primary" href="{{ route('save') }}">
        Save
    </x-tabler::button>

    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="primary" class="dropdown-toggle-split">
            <span class="visually-hidden">Toggle Dropdown</span>
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item href="{{ route('save-draft') }}">
                Save as Draft
            </x-tabler::dropdowns.item>
            <x-tabler::dropdowns.item href="{{ route('save-template') }}">
                Save as Template
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
</div>
```

---

### Arrow Indicators {#arrow-indicators}

Visual arrow pointing to the toggle button for better UX:

```blade
<x-tabler::dropdowns.menu arrow>
    <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Or using CSS class:**
```blade
<x-tabler::dropdowns.menu class="dropdown-menu-arrow">
    <!-- items -->
</x-tabler::dropdowns.menu>
```

---

## Complete Examples {#complete-examples}

Real-world scenarios showing multiple components working together.

### Example 1: User Authentication Menu

```blade
@auth
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="light" class="d-flex align-items-center">
            <x-tabler::avatar
                :src="auth()->user()->avatar_url"
                size="sm"
                class="me-2" />
            <div class="d-none d-md-block">
                <div>{{ auth()->user()->name }}</div>
                <div class="text-muted small">{{ auth()->user()->role }}</div>
            </div>
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu class="dropdown-menu-end">
            <x-tabler::dropdowns.header>
                {{ auth()->user()->email }}
            </x-tabler::dropdowns.header>

            <x-tabler::dropdowns.divider />

            <x-tabler::dropdowns.item href="{{ route('profile.show') }}" icon="user">
                My Profile
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item href="{{ route('settings.account') }}" icon="settings">
                Account Settings
            </x-tabler::dropdowns.item>

            @if(auth()->user()->isAdmin())
                <x-tabler::dropdowns.divider />

                <x-tabler::dropdowns.header>Administration</x-tabler::dropdowns.header>

                <x-tabler::dropdowns.item href="{{ route('admin.dashboard') }}" icon="dashboard">
                    Admin Dashboard
                </x-tabler::dropdowns.item>

                <x-tabler::dropdowns.item href="{{ route('admin.users') }}" icon="users">
                    Manage Users
                </x-tabler::dropdowns.item>
            @endif

            <x-tabler::dropdowns.divider />

            <x-tabler::dropdowns.item
                href="{{ route('logout') }}"
                icon="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign Out
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@else
    <x-tabler::button href="{{ route('login') }}" color="primary">
        Sign In
    </x-tabler::button>
@endauth
```

**Use Case:** Complete user authentication menu with profile, settings, admin links, and logout.

---

### Example 2: Notification Center

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="bell" class="position-relative">
        <x-tabler::badge color="danger" class="position-absolute top-0 start-100 translate-middle badge-notification">
            {{ $unreadCount }}
        </x-tabler::badge>
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end" arrow style="min-width: 25rem;">
        <x-tabler::dropdowns.header>
            <div class="d-flex justify-content-between align-items-center">
                <span>Notifications</span>
                <x-tabler::badge color="primary">{{ $unreadCount }} new</x-tabler::badge>
            </div>
        </x-tabler::dropdowns.header>

        @foreach($notifications as $notification)
            <x-tabler::dropdowns.item
                href="{{ route('notifications.show', $notification) }}"
                :active="!$notification->read_at">
                <div class="d-flex">
                    <div>
                        <x-tabler::avatar :src="$notification->sender->avatar" size="sm" class="me-2" />
                    </div>
                    <div class="flex-fill">
                        <div>{{ $notification->title }}</div>
                        <div class="text-muted small">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </x-tabler::dropdowns.item>
        @endforeach

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('notifications.index') }}" class="text-center">
            View All Notifications
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Use Case:** Notification center with badge count, avatars, timestamps, and unread indicators.

---

### Example 3: Data Table Row Actions

```blade
@foreach($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->status }}</td>
        <td class="text-end">
            <x-tabler::dropdowns.dropdown>
                <x-tabler::dropdowns.toggle color="light" size="sm" icon="dots-vertical" />

                <x-tabler::dropdowns.menu class="dropdown-menu-end">
                    <x-tabler::dropdowns.item href="{{ route('items.show', $item) }}" icon="eye">
                        View
                    </x-tabler::dropdowns.item>

                    @can('update', $item)
                        <x-tabler::dropdowns.item href="{{ route('items.edit', $item) }}" icon="edit">
                            Edit
                        </x-tabler::dropdowns.item>
                    @endcan

                    <x-tabler::dropdowns.item href="{{ route('items.duplicate', $item) }}" icon="copy">
                        Duplicate
                    </x-tabler::dropdowns.item>

                    <x-tabler::dropdowns.divider />

                    @can('delete', $item)
                        <x-tabler::dropdowns.item
                            href="{{ route('items.destroy', $item) }}"
                            icon="trash"
                            class="text-danger"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </x-tabler::dropdowns.item>
                    @endcan
                </x-tabler::dropdowns.menu>
            </x-tabler::dropdowns.dropdown>
        </td>
    </tr>
@endforeach
```

**Use Case:** Action menu for table rows with permission checks and confirmation dialogs.

---

### Example 4: Filter Dropdown

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="info" icon="filter">
        Filters
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu style="min-width: 15rem;">
        <x-tabler::dropdowns.header>Status</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="?status=active">
            Active
            <x-slot:badge>
                <x-tabler::badge color="success">12</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="?status=pending">
            Pending
            <x-slot:badge>
                <x-tabler::badge color="warning">5</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="?status=inactive">
            Inactive
            <x-slot:badge>
                <x-tabler::badge color="secondary">3</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Priority</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="?priority=high">
            High Priority
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="?priority=normal">
            Normal Priority
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="?priority=low">
            Low Priority
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <div class="px-3 py-2">
            <button class="btn btn-primary btn-sm w-100">Apply Filters</button>
        </div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Use Case:** Filter menu with status badges, priority options, and apply button.

---

## Composition Patterns {#composition-patterns}

Common patterns for building dropdown menus.

### Pattern 1: Grouped Account Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light">
        My Account
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
        <!-- account items -->

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Billing</x-tabler::dropdowns.header>
        <!-- billing items -->

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Support</x-tabler::dropdowns.header>
        <!-- support items -->

        <x-tabler::dropdowns.divider />

        <!-- logout item -->
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Pattern:** Use headers and dividers to organize related items into logical sections.

---

### Pattern 2: Permission-Based Menu

```blade
<x-tabler::dropdowns.menu>
    <!-- Everyone sees view -->
    <x-tabler::dropdowns.item href="#">View</x-tabler::dropdowns.item>

    @can('update', $item)
        <x-tabler::dropdowns.item href="#">Edit</x-tabler::dropdowns.item>
    @endcan

    @can('delete', $item)
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="#" class="text-danger">Delete</x-tabler::dropdowns.item>
    @endcan
</x-tabler::dropdowns.menu>
```

**Pattern:** Use Laravel's authorization gates to conditionally show menu items based on permissions.

---

### Pattern 3: Active State Indicator

```blade
<x-tabler::dropdowns.menu>
    @foreach($filters as $filter)
        <x-tabler::dropdowns.item
            href="?filter={{ $filter->value }}"
            :active="request('filter') === $filter->value">
            {{ $filter->label }}
        </x-tabler::dropdowns.item>
    @endforeach
</x-tabler::dropdowns.menu>
```

**Pattern:** Mark the current selection with the active state for better user feedback.

---

### Pattern 4: Multi-Column Menu

```blade
<x-tabler::dropdowns.menu class="dropdown-menu-columns" style="max-width: 40rem;">
    <div class="row">
        <div class="col-6">
            <x-tabler::dropdowns.header>Category A</x-tabler::dropdowns.header>
            <!-- items -->
        </div>
        <div class="col-6">
            <x-tabler::dropdowns.header>Category B</x-tabler::dropdowns.header>
            <!-- items -->
        </div>
    </div>
</x-tabler::dropdowns.menu>
```

**Pattern:** Use multi-column layout for wide menus with many items.

---

## Laravel Integration {#laravel-integration}

### Framework Integration Examples

#### With Route Helper

```blade
<x-tabler::dropdowns.item href="{{ route('dashboard') }}">
    Dashboard
</x-tabler::dropdowns.item>
```

---

#### With Named Routes and Active State

```blade
<x-tabler::dropdowns.item
    href="{{ route('products.index') }}"
    :active="request()->routeIs('products.*')">
    Products
</x-tabler::dropdowns.item>
```

---

#### With Authorization Gates

```blade
<x-tabler::dropdowns.menu>
    @can('view', $project)
        <x-tabler::dropdowns.item href="{{ route('projects.show', $project) }}">
            View Project
        </x-tabler::dropdowns.item>
    @endcan

    @can('update', $project)
        <x-tabler::dropdowns.item href="{{ route('projects.edit', $project) }}">
            Edit Project
        </x-tabler::dropdowns.item>
    @endcan

    @can('delete', $project)
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item
            href="{{ route('projects.destroy', $project) }}"
            class="text-danger">
            Delete Project
        </x-tabler::dropdowns.item>
    @endcan
</x-tabler::dropdowns.menu>
```

---

#### With Localization

```blade
<x-tabler::dropdowns.header>
    {{ __('menu.account_settings') }}
</x-tabler::dropdowns.header>

<x-tabler::dropdowns.item href="{{ route('profile') }}">
    {{ __('menu.profile') }}
</x-tabler::dropdowns.item>
```

---

#### With Livewire Components

```blade
<div wire:ignore>
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="primary">
            Sort: {{ $sortBy }}
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            @foreach($sortOptions as $option)
                <x-tabler::dropdowns.item
                    href="#"
                    wire:click="setSortBy('{{ $option }}')"
                    :active="$sortBy === $option">
                    {{ $option }}
                </x-tabler::dropdowns.item>
            @endforeach
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
</div>

<script>
    // Re-initialize dropdown after Livewire update
    Livewire.hook('message.processed', () => {
        const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
        dropdowns.forEach(el => new bootstrap.Dropdown(el));
    });
</script>
```

---

#### With AJAX Loading

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle id="dynamicDropdown" color="primary">
        Load Content
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu id="dynamicMenu">
        <div class="dropdown-item disabled">Loading...</div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

<script>
document.getElementById('dynamicDropdown').addEventListener('show.bs.dropdown', async function() {
    const menu = document.getElementById('dynamicMenu');

    const response = await fetch('/api/dropdown-items');
    const items = await response.json();

    menu.innerHTML = items.map(item =>
        `<a class="dropdown-item" href="${item.url}">${item.name}</a>`
    ).join('');
});
</script>
```

---

## Accessibility {#accessibility}

### Keyboard Navigation

- **Tab**: Moves focus to dropdown toggle
- **Enter/Space**: Opens dropdown menu (when toggle is focused)
- **Arrow Down**: Opens menu and moves to first item (when closed)
- **Arrow Up**: Opens menu and moves to last item (when closed)
- **Arrow Down/Up**: Navigate between menu items (when open)
- **Escape**: Closes dropdown menu
- **Home/End**: Jump to first/last menu item
- **Click outside**: Closes menu

---

### ARIA Attributes

Components automatically include appropriate ARIA attributes:

- `data-bs-toggle="dropdown"`: Applied to toggle
- `aria-expanded="false"`: Indicates menu closed (updates to "true" when open)
- `aria-haspopup="true"`: Indicates presence of dropdown menu
- `aria-disabled="true"`: Applied to disabled items
- `role="button"`: Applied to toggle
- `role="menu"`: Applied to menu container
- `role="menuitem"`: Applied to items

---

### Screen Reader Support

- Toggle announces as "button, has popup"
- Menu state (expanded/collapsed) is announced
- Active items are indicated with visual and ARIA markers
- Disabled items announced as "disabled"
- Headers provide context for grouped items
- Dividers are skipped during navigation

---

### Best Practices

**Do:**
- Always provide meaningful text in toggle button
- Use descriptive labels with icons
- Group related items with headers
- Mark current/active selections
- Ensure sufficient color contrast (4.5:1 minimum)
- Test keyboard navigation thoroughly
- Provide aria-label for icon-only toggles

**Don't:**
- Don't use icon-only toggles without aria-label
- Don't nest interactive elements inside items
- Don't hide essential functionality in dropdowns
- Don't use dropdowns for single actions
- Don't disable items without explanation

---

#### Accessible Examples

```blade
{{-- Icon-only toggle with aria-label --}}
<x-tabler::dropdowns.toggle
    icon="dots-vertical"
    class="btn-icon"
    aria-label="Item actions menu">
</x-tabler::dropdowns.toggle>

{{-- Active item with aria-current --}}
<x-tabler::dropdowns.item
    href="{{ route('dashboard') }}"
    :active="request()->routeIs('dashboard')"
    aria-current="page">
    Dashboard
</x-tabler::dropdowns.item>

{{-- Disabled item with explanation --}}
<x-tabler::dropdowns.item
    href="#"
    disabled
    title="Upgrade to Premium to access this feature">
    Premium Features (Upgrade Required)
</x-tabler::dropdowns.item>
```

---

## Best Practices {#best-practices}

### Do's ✅

**Keep menus focused:**
```blade
{{-- Good: Clear purpose --}}
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        User Actions
    </x-tabler::dropdowns.toggle>
    <!-- related user actions only -->
</x-tabler::dropdowns.dropdown>
```

**Use headers for organization:**
```blade
{{-- Good: Well-organized --}}
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>Account</x-tabler::dropdowns.header>
    <!-- account items -->

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.header>Settings</x-tabler::dropdowns.header>
    <!-- settings items -->
</x-tabler::dropdowns.menu>
```

**Separate destructive actions:**
```blade
{{-- Good: Clear separation --}}
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="#">Edit</x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="#">Duplicate</x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="#" class="text-danger">
        Delete
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Use icons for visual context:**
```blade
{{-- Good: Icons aid recognition --}}
<x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
    Profile
</x-tabler::dropdowns.item>
```

---

### Don'ts ❌

**Don't overload menus:**
```blade
{{-- Bad: Too many items --}}
<x-tabler::dropdowns.menu>
    <!-- 30+ items without organization -->
</x-tabler::dropdowns.menu>

{{-- Good: Organize or paginate --}}
<x-tabler::dropdowns.menu style="max-height: 300px; overflow-y: auto;">
    <x-tabler::dropdowns.header>Recent</x-tabler::dropdowns.header>
    <!-- 5-10 recent items -->

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="#">View All...</x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Don't use for single actions:**
```blade
{{-- Bad: Unnecessary dropdown --}}
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle>Actions</x-tabler::dropdowns.toggle>
    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Only Action</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

{{-- Good: Direct button --}}
<x-tabler::button href="#">Action</x-tabler::button>
```

**Don't hide primary actions:**
```blade
{{-- Bad: Primary action hidden --}}
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle>More</x-tabler::dropdowns.toggle>
    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Save</x-tabler::dropdowns.item>  {{-- Should be primary button --}}
        <x-tabler::dropdowns.item href="#">Cancel</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

{{-- Good: Primary action prominent --}}
<x-tabler::button color="primary" href="#">Save</x-tabler::button>
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light">More Options</x-tabler::dropdowns.toggle>
    <!-- secondary actions -->
</x-tabler::dropdowns.dropdown>
```

**Don't use excessive dividers:**
```blade
{{-- Bad: Too many dividers --}}
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="#">Item 1</x-tabler::dropdowns.item>
    <x-tabler::dropdowns.divider />
    <x-tabler::dropdowns.item href="#">Item 2</x-tabler::dropdowns.item>
    <x-tabler::dropdowns.divider />
    <x-tabler::dropdowns.item href="#">Item 3</x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>

{{-- Good: Meaningful separation --}}
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="#">Item 1</x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="#">Item 2</x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="#">Item 3</x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

## Bootstrap 5 Integration {#bootstrap-integration}

### Popper.js Positioning

Dropdowns use Popper.js (included with Bootstrap 5) for intelligent positioning:

```blade
{{-- Automatic collision detection --}}
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Auto-Positioned
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <!-- Menu automatically flips if near viewport edge -->
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Boundary Configuration:**
```blade
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-boundary="viewport">
    Viewport Boundary
</x-tabler::dropdowns.toggle>
```

**Offset Configuration:**
```blade
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-offset="10,20">
    Custom Offset
</x-tabler::dropdowns.toggle>
```

---

### Auto-Close Behavior

Bootstrap 5 provides several auto-close options:

```blade
{{-- Close on outside click (default) --}}
<x-tabler::dropdowns.toggle color="primary">
    Default Behavior
</x-tabler::dropdowns.toggle>

{{-- Close on inside or outside click --}}
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-auto-close="true">
    Close on Any Click
</x-tabler::dropdowns.toggle>

{{-- Close only on outside click --}}
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-auto-close="outside">
    Close on Outside Click
</x-tabler::dropdowns.toggle>

{{-- Close only on inside click --}}
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-auto-close="inside">
    Close on Inside Click
</x-tabler::dropdowns.toggle>

{{-- Never auto-close (manual close only) --}}
<x-tabler::dropdowns.toggle
    color="primary"
    data-bs-auto-close="false">
    Manual Close
</x-tabler::dropdowns.toggle>
```

---

### Bootstrap Events

```javascript
const dropdownElement = document.getElementById('myDropdown');

// Before opening
dropdownElement.addEventListener('show.bs.dropdown', (event) => {
    console.log('About to show');
    // event.preventDefault() to cancel
});

// After opening
dropdownElement.addEventListener('shown.bs.dropdown', (event) => {
    console.log('Now visible');
    // Load dynamic content, focus input, etc.
});

// Before closing
dropdownElement.addEventListener('hide.bs.dropdown', (event) => {
    console.log('About to hide');
    // event.preventDefault() to cancel
});

// After closing
dropdownElement.addEventListener('hidden.bs.dropdown', (event) => {
    console.log('Now hidden');
    // Cleanup, reset state, etc.
});
```

---

### Programmatic Control

```javascript
// Get dropdown instance
const dropdown = new bootstrap.Dropdown(
    document.getElementById('myDropdownToggle')
);

// Methods
dropdown.show();    // Open dropdown
dropdown.hide();    // Close dropdown
dropdown.toggle();  // Toggle state
dropdown.update();  // Update Popper positioning
dropdown.dispose(); // Remove dropdown functionality
```

---

## Troubleshooting {#troubleshooting}

### Common Issues

**Issue: Dropdown doesn't open**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify Popper.js is included (required for positioning)
- ✅ Check JavaScript console for errors
- ✅ Confirm Bootstrap version is 5.x
- ✅ Ensure no JavaScript conflicts with other libraries

**Issue: Dropdown closes immediately after opening**
- ✅ Check for click event propagation issues
- ✅ Verify no `stopPropagation()` on parent elements
- ✅ Ensure menu items are inside dropdown-menu div
- ✅ Check for JavaScript errors in console

**Issue: Dropdown positioned incorrectly**
- ✅ Ensure parent container allows overflow
- ✅ Check z-index of dropdown and parent elements
- ✅ Verify no conflicting CSS positioning
- ✅ Try using `dropdown.update()` to recalculate position
- ✅ Check if parent has `overflow: hidden`

**Issue: Menu cut off by container**
- ✅ Add `overflow: visible` to parent containers
- ✅ Use `data-bs-boundary="viewport"` on toggle
- ✅ Consider using dropup/dropend/dropstart
- ✅ Adjust z-index if needed

**Issue: Icons not displaying in items**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Livewire/Alpine interactions not working**
- ✅ Use `wire:ignore` on dropdown wrapper
- ✅ Re-initialize Bootstrap after Livewire updates
- ✅ Use `@click` instead of `wire:click` for immediate response
- ✅ Listen to Bootstrap events for state synchronization

**Issue: Mobile touch not working**
- ✅ Ensure viewport meta tag is set
- ✅ Check for touch event conflicts
- ✅ Test on actual device, not just emulator
- ✅ Verify no CSS preventing touch events

---

### Debugging Tips

```javascript
// Check if Bootstrap is loaded
console.log(typeof bootstrap !== 'undefined' ? 'Bootstrap loaded' : 'Bootstrap not found');

// Check if Popper is available
console.log(typeof Popper !== 'undefined' ? 'Popper loaded' : 'Popper not found');

// List all dropdowns on page
document.querySelectorAll('[data-bs-toggle="dropdown"]').forEach(el => {
    console.log('Dropdown toggle found:', el);
});

// Test dropdown programmatically
const testDropdown = new bootstrap.Dropdown(
    document.querySelector('[data-bs-toggle="dropdown"]')
);
testDropdown.show();
```

---

## Browser Compatibility

### Requirements
- **Bootstrap 5.x** (CSS and JavaScript required)
- **Popper.js** (included with Bootstrap 5)
- Modern JavaScript (ES6+)
- CSS support for transforms and absolute positioning

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Dropdown positioning may need adjustment in scrollable containers
- Mobile touch events may require additional handling
- Some older browsers don't support automatic positioning
- RTL layout support varies by Bootstrap version

---

## Related Components

- [Button](../button.md) - Used as dropdown toggle
- [Badge](../badge.md) - Notification counts in menu items
- [Avatar](../avatar.md) - User profile in toggle
- [Icon](../icon.md) - Tabler icons in items
- [Nav](../nav.md) - Navigation components

---

## Source

**Component Files:**
- `tabler-blade/stubs/resources/views/tabler/dropdowns/dropdown.blade.php`
- `tabler-blade/stubs/resources/views/tabler/dropdowns/toggle.blade.php`
- `tabler-blade/stubs/resources/views/tabler/dropdowns/menu.blade.php`
- `tabler-blade/stubs/resources/views/tabler/dropdowns/item.blade.php`
- `tabler-blade/stubs/resources/views/tabler/dropdowns/header.blade.php`
- `tabler-blade/stubs/resources/views/tabler/dropdowns/divider.blade.php`

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation with full Bootstrap 5 integration, Popper.js positioning, and Tabler styling
