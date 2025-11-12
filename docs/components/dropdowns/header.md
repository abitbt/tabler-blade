# Dropdown Header

> Section header within dropdown menus to organize and group related items into logical sections.

## Overview

The Dropdown Header component provides a semantic way to organize dropdown menu items by adding section headers. It creates visual separation and context for grouped menu items, making complex navigation menus more scannable and user-friendly. The component renders as a simple `<span>` element with Bootstrap's `.dropdown-header` class.

**Key Features:**
- Simple text-based section headers
- Semantic HTML structure
- Consistent Bootstrap 5 styling
- Non-interactive (not clickable)
- Minimal footprint
- Works with all dropdown themes
- Pairs with dividers for visual organization
- Supports custom CSS classes
- Accessible to screen readers
- Flexible content via default slot

**Use Case:** Use dropdown headers to organize menu items into logical groups such as "Account Settings," "Help & Support," or "Administration." Headers improve navigation in complex menus by providing clear visual hierarchy and context for related actions.

---

## Basic Usage

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

## Props / Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `class` | `string` | `''` | No | Additional CSS classes |

**Note:** All additional HTML attributes (id, data-*, style, etc.) are passed through to the `<span>` element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Header text content |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Text Styling:**
- `text-muted` - Lighter gray text
- `text-uppercase` - Uppercase text transformation
- `small` - Smaller font size
- `fw-bold` - Bold font weight
- `fw-normal` - Normal font weight

**Spacing:**
- `mt-2` - Add top margin
- `mb-2` - Add bottom margin
- `px-4` - Increase horizontal padding
- `py-2` - Adjust vertical padding

**Display:**
- `d-flex` - Flexbox layout for complex content
- `justify-content-between` - Space between header elements
- `align-items-center` - Center align content vertically

---

## Examples

### Simple Header

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>Navigation</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('home') }}">
        Home
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('about') }}">
        About
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('contact') }}">
        Contact
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Basic header organizing navigation items

---

### Multiple Sections

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>Account</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.header>Help</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('docs') }}" icon="book">
        Documentation
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('support') }}" icon="help">
        Support
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.header>System</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
        Logout
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Well-organized menu with multiple sections separated by dividers

---

### Header with Custom Styling

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header class="text-uppercase small fw-bold">
        Quick Actions
    </x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('create') }}" icon="plus">
        Create New
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('import') }}" icon="upload">
        Import Data
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('export') }}" icon="download">
        Export Data
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Uppercase, bold header with smaller font size

---

### Header with Subtitle

```blade
<x-tabler::dropdowns.menu style="min-width: 280px;">
    <x-tabler::dropdowns.header>
        <div>Signed in as</div>
        <div class="text-muted small">{{ auth()->user()->email }}</div>
    </x-tabler::dropdowns.header>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        Your Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Header with primary text and secondary subtitle information

---

### Header with Badge

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header class="d-flex justify-content-between align-items-center">
        <span>Notifications</span>
        <x-tabler::badge color="danger">{{ $unreadCount }}</x-tabler::badge>
    </x-tabler::dropdowns.header>

    <x-tabler::dropdowns.item href="{{ route('notifications.1') }}">
        New message from John
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('notifications.2') }}">
        Your report is ready
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('notifications.all') }}">
        View All Notifications
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Header with notification count badge on the right

---

### Muted Header

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header class="text-muted">
        Recent Projects
    </x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('projects.1') }}" icon="folder">
        Website Redesign
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('projects.2') }}" icon="folder">
        Mobile App
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('projects.3') }}" icon="folder">
        API Integration
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Subtle, muted header text for less prominent sections

---

### Header with Icon

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>
        <div class="d-flex align-items-center">
            <x-tabler::icon name="shield-check" class="me-2 text-success" />
            <span>Security Settings</span>
        </div>
    </x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('security.password') }}" icon="lock">
        Change Password
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('security.2fa') }}" icon="device-mobile">
        Two-Factor Auth
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('security.sessions') }}" icon="devices">
        Active Sessions
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Header with leading icon for enhanced visual context

---

### User Profile Menu with Header

```blade
<x-tabler::dropdowns.menu class="dropdown-menu-end">
    <x-tabler::dropdowns.header>
        <div class="d-flex align-items-center">
            <x-tabler::avatar :src="auth()->user()->avatar" size="sm" class="me-2" />
            <div>
                <div class="fw-bold">{{ auth()->user()->name }}</div>
                <div class="text-muted small">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </x-tabler::dropdowns.header>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        My Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Account Settings
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
        Sign Out
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Rich user profile header with avatar and user information

---

### Admin Section with Conditional Header

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.header>User Menu</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('dashboard') }}" icon="home">
        Dashboard
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
        Profile
    </x-tabler::dropdowns.item>

    @if(auth()->user()->isAdmin())
        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header class="text-danger">
            Administration
        </x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('admin.users') }}" icon="users">
            Manage Users
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('admin.settings') }}" icon="settings">
            System Settings
        </x-tabler::dropdowns.item>
    @endif

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
        Logout
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Conditional admin section with colored header for visual distinction

---

### Grouped Categories Menu

```blade
<x-tabler::dropdowns.menu style="max-height: 400px; overflow-y: auto;">
    <x-tabler::dropdowns.header>Electronics</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('category.phones') }}">
        Phones & Tablets
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.computers') }}">
        Computers
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.accessories') }}">
        Accessories
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.header>Clothing</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('category.mens') }}">
        Men's Clothing
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.womens') }}">
        Women's Clothing
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.kids') }}">
        Kids' Clothing
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.divider />

    <x-tabler::dropdowns.header>Home & Garden</x-tabler::dropdowns.header>
    <x-tabler::dropdowns.item href="{{ route('category.furniture') }}">
        Furniture
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.decor') }}">
        Home Decor
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('category.garden') }}">
        Garden Tools
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** E-commerce category menu organized with headers for each category group

---

## Accessibility

### Keyboard Navigation
- Headers are non-interactive and do not receive keyboard focus
- Arrow keys skip over headers when navigating menu items
- Screen readers announce headers as section labels
- Headers provide context for subsequent menu items

### ARIA Attributes
- No special ARIA attributes required (semantic HTML)
- Headers are automatically recognized by screen readers
- Consider adding `role="heading"` for complex menus
- Use `aria-level` for nested header hierarchies (if needed)

### Screen Reader Support
- Headers are announced as text content
- Screen readers use headers to understand menu structure
- Headers provide context for grouped items
- Non-interactive nature is automatically conveyed

### Best Practices
- Use clear, descriptive header text
- Keep header text short and scannable
- Use sentence case or title case consistently
- Avoid using headers for single items
- Group at least 2-3 items per header section
- Use dividers between major sections
- Maintain logical header hierarchy
- Don't overuse headers (too many defeats purpose)

**Example:**
```blade
{{-- Accessible header with semantic structure --}}
<x-tabler::dropdowns.header role="heading" aria-level="2">
    Account Settings
</x-tabler::dropdowns.header>

{{-- Descriptive header for screen reader context --}}
<x-tabler::dropdowns.header>
    {{ trans('menu.admin_section') }}
</x-tabler::dropdowns.header>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for `.dropdown-header` class)
- Modern CSS support (minimal requirements)
- No JavaScript dependencies

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ✅ (if Bootstrap 5 supports it)

### Known Issues
- Text truncation may vary across browsers
- Padding and spacing render consistently
- No known compatibility issues
- Works in all modern browsers without modification

---

## Related Components

- [Dropdown](./dropdown.md) - Parent dropdown container
- [Dropdown Toggle](./toggle.md) - Toggle button component
- [Dropdown Menu](./menu.md) - Menu container component
- [Dropdown Item](./item.md) - Individual menu items
- [Dropdown Divider](./divider.md) - Separator component
- [Badge](../badge.md) - Count indicators (can be used in headers)

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/dropdowns/header.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with basic dropdown header functionality
