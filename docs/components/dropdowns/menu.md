# Dropdown Menu

> Container component for dropdown menu items, headers, and dividers with flexible styling and positioning options.

## Overview

The Dropdown Menu component (`<x-tabler::dropdowns.menu>`) is the container that holds all dropdown menu items, headers, and dividers. It provides a styled dropdown panel that appears when the toggle is activated, with support for arrows, dark themes, card-style layouts, and flexible positioning. Built on Bootstrap 5's dropdown functionality, it automatically handles positioning, animations, and accessibility.

**Key Features:**
- Arrow indicator pointing to toggle button
- Dark theme variant with inverted colors
- Card-style layout for rich content
- Right/left alignment options
- Multi-column layout support
- Automatic positioning with Popper.js
- Built-in accessibility with ARIA attributes
- Smooth animations and transitions
- Responsive design support

**Use Case:** Use the dropdown menu to display navigation options, actions, settings, filters, or any grouped set of clickable items. Combine with menu items, headers, and dividers to create organized, hierarchical menus.

---

## Basic Usage

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('dashboard') }}">
            Dashboard
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}">
            Settings
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `arrow` | `bool` | `false` | Show arrow indicator pointing to toggle button (adds `dropdown-menu-arrow` class) |
| `dark` | `bool` | `false` | Dark theme variant with dark background and white text |
| `class` | `string` | `''` | Additional CSS classes (e.g., `dropdown-menu-end`, `dropdown-menu-card`) |

**Note:** All additional HTML attributes are passed through to the menu container element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Menu content including items, headers, and dividers |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Menu Alignment:**
- `dropdown-menu-end` - Align menu to right edge of toggle
- `dropdown-menu-start` - Align menu to left edge (default)
- `dropdown-menu-sm-end` - Right align on small screens and up
- `dropdown-menu-md-end` - Right align on medium screens and up
- `dropdown-menu-lg-end` - Right align on large screens and up
- `dropdown-menu-xl-end` - Right align on extra-large screens and up

**Menu Styling:**
- `dropdown-menu-arrow` - Show arrow pointing to toggle (also via `arrow` prop)
- `dropdown-menu-card` - Card-style menu with padding and borders
- `dropdown-menu-columns` - Multi-column layout for wide menus

**Theme:**
- `bg-dark text-white` - Dark theme (also via `dark` prop)
- `bg-light` - Light background

**Sizing:**
- Custom width via inline `style="max-width: 20rem;"` or similar

---

## Examples

### Basic Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Actions
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('view') }}">
            View
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('edit') }}">
            Edit
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('delete') }}">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** A standard dropdown menu with three action items

---

### Menu with Arrow Indicator

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Options
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu arrow>
        <x-tabler::dropdowns.item href="{{ route('option1') }}">
            Option 1
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('option2') }}">
            Option 2
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('option3') }}">
            Option 3
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Menu with a small arrow pointing to the toggle button for better visual connection

---

### Right-Aligned Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        User Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Logout
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Menu aligned to the right edge of the toggle button, useful for navigation bars

---

### Dark Theme Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="dark">
        Dark Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu dark>
        <x-tabler::dropdowns.item href="{{ route('home') }}" icon="home">
            Home
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('products') }}" icon="box">
            Products
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('about') }}" icon="info-circle">
            About
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Menu with dark background and white text for better contrast in dark interfaces

---

### Card-Style Menu with Rich Content

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Profile
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-card" style="max-width: 20rem;">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <x-tabler::avatar
                        src="{{ auth()->user()->avatar }}"
                        size="lg"
                        class="me-3" />
                    <div>
                        <h4 class="mb-0">{{ auth()->user()->name }}</h4>
                        <div class="text-muted">{{ auth()->user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3">
                    <x-tabler::button href="{{ route('profile') }}" color="primary" class="w-100">
                        View Profile
                    </x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Card-style menu with custom content including avatar, user info, and action button

---

### Menu with Headers and Dividers

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="secondary">
        My Account
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('billing') }}" icon="credit-card">
            Billing
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Help & Support</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('help') }}" icon="help">
            Help Center
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('contact') }}" icon="mail">
            Contact Us
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Logout
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Well-organized menu with grouped sections using headers and dividers

---

### Multi-Column Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Categories
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-columns" style="max-width: 40rem;">
        <div class="row">
            <div class="col-6">
                <x-tabler::dropdowns.header>Technology</x-tabler::dropdowns.header>
                <x-tabler::dropdowns.item href="#">Software</x-tabler::dropdowns.item>
                <x-tabler::dropdowns.item href="#">Hardware</x-tabler::dropdowns.item>
                <x-tabler::dropdowns.item href="#">Cloud Services</x-tabler::dropdowns.item>
            </div>
            <div class="col-6">
                <x-tabler::dropdowns.header>Business</x-tabler::dropdowns.header>
                <x-tabler::dropdowns.item href="#">Marketing</x-tabler::dropdowns.item>
                <x-tabler::dropdowns.item href="#">Sales</x-tabler::dropdowns.item>
                <x-tabler::dropdowns.item href="#">Operations</x-tabler::dropdowns.item>
            </div>
        </div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Wide menu with multiple columns for better organization of many items

---

### Menu with Mixed Content

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

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Priority</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="?priority=high">
            High Priority
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

**Output:** Menu combining dropdown items, badges, and custom content like buttons

---

### Notification Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="bell" class="position-relative">
        <x-tabler::badge color="danger" class="badge-notification badge-pill">
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

**Output:** Comprehensive notification center with avatars, timestamps, and badges

---

### Responsive Menu Alignment

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Responsive Menu
    </x-tabler::dropdowns.toggle>

    {{-- Left-aligned on mobile, right-aligned on desktop --}}
    <x-tabler::dropdowns.menu class="dropdown-menu-md-end">
        <x-tabler::dropdowns.item href="#">Option 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Option 2</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Option 3</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Menu that adapts its alignment based on screen size

---

### Search Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="search">
        Quick Search
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu style="min-width: 20rem;">
        <div class="px-3 py-2">
            <input
                type="search"
                class="form-control"
                placeholder="Search..."
                autofocus />
        </div>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Recent Searches</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="#" icon="clock">
            Laravel documentation
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="clock">
            Blade components
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="clock">
            Tabler UI examples
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Output:** Dropdown with integrated search input and recent searches

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to dropdown toggle
- **Enter/Space:** Opens dropdown menu (when toggle is focused)
- **Arrow Down:** Opens menu and moves to first item (when toggle is focused)
- **Arrow Up:** Opens menu and moves to last item (when toggle is focused)
- **Arrow Down/Up:** Navigate between menu items (when menu is open)
- **Escape:** Closes dropdown menu
- **Home:** Jump to first menu item
- **End:** Jump to last menu item
- **Click outside:** Closes menu

### ARIA Attributes
- `aria-expanded="false"`: Applied to toggle (changes to `true` when open)
- `aria-haspopup="true"`: Indicates presence of dropdown menu
- `role="menu"`: Applied to menu container
- `role="menuitem"`: Applied to individual items
- Menu automatically receives focus management

### Screen Reader Support
- Menu state (expanded/collapsed) is announced
- Items are properly announced as menu items
- Headers provide semantic structure
- Dividers are skipped during navigation
- Active items are indicated

### Best Practices
- Ensure toggle has descriptive text
- Group related items with headers
- Use dividers to separate logical sections
- Provide sufficient contrast in dark mode
- Don't nest menus too deeply
- Limit menu height for long lists (add scrolling)

**Example:**
```blade
<x-tabler::dropdowns.menu arrow aria-label="User account menu">
    <x-tabler::dropdowns.header>Account</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('profile') }}">
        Profile Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (**CSS and JavaScript required**)
- Popper.js (included with Bootstrap 5 for positioning)
- Modern JavaScript (ES6+)
- CSS support for transforms and positioning

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Dropdown positioning may need adjustment in scrollable containers
- Mobile touch events require proper Bootstrap configuration
- Some older browsers don't support automatic collision detection
- RTL layout support varies by Bootstrap version
- Card-style menus may need additional CSS in some contexts

---

## Related Components

- [Dropdown](./dropdown.md) - Parent container component
- [Dropdown Toggle](./toggle.md) - Toggle button component
- [Dropdown Item](./item.md) - Individual menu item
- [Dropdown Header](./header.md) - Section header
- [Dropdown Divider](./divider.md) - Separator line
- [Button](../button.md) - Often used as toggle
- [Badge](../badge.md) - Notification counts in items
- [Avatar](../avatar.md) - User profiles in menus

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/dropdowns/menu.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Bootstrap 5 integration, arrow support, dark theme, and card-style layout
