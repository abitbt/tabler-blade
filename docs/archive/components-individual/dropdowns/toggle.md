# Dropdown Toggle

The Dropdown Toggle component is a versatile button or link element that triggers dropdown menus. It intelligently adapts between button and link elements based on the `href` prop and automatically applies Bootstrap 5's dropdown trigger attributes.

## Overview

- Renders as `<button>` or `<a>` element based on presence of `href` prop
- Automatic Bootstrap 5 dropdown integration with `data-bs-toggle="dropdown"`
- Support for Tabler color variants (primary, secondary, success, danger, warning, info, etc.)
- Built-in icon support with automatic spacing
- Intelligent class detection to avoid conflicts (e.g., nav-link vs btn)
- Proper ARIA attributes for accessibility
- Flexible sizing with Bootstrap size classes
- Compatible with ghost, outline, and icon-only button variants

## Basic Usage

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Actions
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('view') }}">
            View
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `href` | `string\|null` | `null` | No | If provided, renders as `<a>` tag instead of `<button>`. When null, renders as button element. |
| `color` | `string\|null` | `null` | No | Button color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `icon` | `string\|null` | `null` | No | Tabler icon name (without `tabler-` prefix) to display as trailing icon after toggle text |
| `class` | `string` | `''` | No | Additional CSS classes to apply to the toggle element |

**Note:** All additional HTML attributes (e.g., `id`, `data-*`, `aria-*`, `onclick`) are passed through to the underlying element.

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | The text or content to display inside the toggle button/link |

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Button Variants:**
- `btn-ghost-{color}` - Ghost button variant with transparent background
- `btn-outline-{color}` - Outlined button variant
- `btn-icon` - Icon-only button (removes padding, perfect square shape)

**Button Sizes:**
- `btn-sm` - Small button
- `btn-lg` - Large button

**Link Styles:**
- `nav-link` - Navigation link style (automatically prevents `btn` class from being added)
- `link` - Plain link style (prevents button styling)

**Layout:**
- `w-100` - Full width button
- `d-flex align-items-center` - Flexbox for custom content layout

**Note:** The component intelligently detects when you use `nav-link` or `link` classes and will not add the `btn` class automatically, preventing style conflicts.

## Examples

### Basic Button Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Open Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Option 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Option 2</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Toggle with Trailing Icon

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary" icon="chevron-down">
        Select Option
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Option A</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Option B</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Option C</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Link Toggle (Anchor Element)

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle href="#" color="primary">
        User Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('profile') }}">Profile</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}">Settings</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('logout') }}">Logout</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Navigation Link Toggle

```blade
<ul class="navbar-nav">
    <li class="nav-item dropdown">
        <x-tabler::dropdowns.toggle href="#" class="nav-link">
            Account
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item href="{{ route('dashboard') }}">Dashboard</x-tabler::dropdowns.item>
            <x-tabler::dropdowns.item href="{{ route('profile') }}">Profile</x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </li>
</ul>
```

### Icon-Only Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle icon="dots-vertical" class="btn-icon" color="light" />

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#" icon="eye">View</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="edit">Edit</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="trash">Delete</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Small Size Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="secondary" class="btn-sm">
        Filters
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">All Items</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Active Only</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Archived</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Large Size Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="success" class="btn-lg" icon="plus">
        Create New
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#" icon="file">New Document</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="folder">New Folder</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#" icon="upload">Upload File</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Ghost Button Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary" class="btn-ghost-primary">
        More Options
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Export</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Import</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Share</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Outline Button Toggle

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="danger" class="btn-outline-danger">
        Danger Zone
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Clear Cache</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Reset Settings</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="#" class="text-danger">Delete Account</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Toggle with Avatar and User Info

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle href="#" class="nav-link d-flex align-items-center">
        <x-tabler::avatar
            src="{{ auth()->user()->avatar }}"
            size="sm"
            class="me-2" />
        <div class="d-none d-md-inline">
            <div>{{ auth()->user()->name }}</div>
            <div class="text-muted small">{{ auth()->user()->email }}</div>
        </div>
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">Profile</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">Settings</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">Logout</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Toggle with Badge Indicator

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="bell" class="position-relative">
        Notifications
        <x-tabler::badge color="danger" class="position-absolute top-0 start-100 translate-middle badge-sm">
            {{ $unreadCount }}
        </x-tabler::badge>
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end" style="min-width: 20rem;">
        <x-tabler::dropdowns.header>Unread Notifications</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="#">You have a new message</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Your report is ready</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">5 new followers</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

### Full-Width Toggle

```blade
<x-tabler::dropdowns.dropdown class="w-100">
    <x-tabler::dropdowns.toggle color="primary" class="w-100" icon="chevron-down">
        Select Country
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="w-100">
        <x-tabler::dropdowns.item href="#">United States</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Canada</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">United Kingdom</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Australia</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

## Accessibility

### Keyboard Navigation
- **Tab:** Focus the dropdown toggle
- **Enter/Space:** Open the dropdown menu (when toggle is focused)
- **Escape:** Close the dropdown menu
- **Arrow Down/Up:** Navigate menu items once opened

### ARIA Attributes

The component automatically adds appropriate ARIA attributes:
- `data-bs-toggle="dropdown"` - Identifies element as dropdown trigger
- `aria-expanded="false"` - Indicates dropdown is closed (Bootstrap updates to "true" when open)
- `role="button"` - Implicit role for button elements, explicit for anchor toggles

### Screen Reader Support
- Toggle announces as "button" or "link" depending on element type
- Expanded/collapsed state is announced when toggled
- Icon-only toggles should include `aria-label` for context:

```blade
<x-tabler::dropdowns.toggle
    icon="dots-vertical"
    class="btn-icon"
    aria-label="Item actions menu">
</x-tabler::dropdowns.toggle>
```

### Best Practices
- Always provide meaningful text content or `aria-label` for icon-only toggles
- Ensure sufficient color contrast (4.5:1 minimum) for button colors
- Avoid nesting interactive elements inside toggle slot
- Test keyboard navigation thoroughly
- Use semantic HTML (button for actions, link for navigation)

**Example with Aria Label:**
```blade
<x-tabler::dropdowns.toggle
    color="primary"
    icon="user"
    aria-label="User account menu with profile, settings, and logout options">
    My Account
</x-tabler::dropdowns.toggle>
```

## Browser Compatibility

### Requirements
- Bootstrap 5.x JavaScript (required for dropdown functionality)
- Popper.js (included with Bootstrap 5 for positioning)
- Modern JavaScript (ES6+)
- CSS support for flexbox and transforms

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- Opera 76+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- IE 11 does not support Bootstrap 5
- Some mobile browsers may require viewport meta tag for proper touch events
- Icon spacing may vary slightly in older Safari versions
- Link toggles (`href` prop) may have slight styling differences across browsers

### Progressive Enhancement
```blade
{{-- Graceful degradation: Link works without JavaScript --}}
<x-tabler::dropdowns.toggle href="{{ route('profile') }}" color="primary">
    Profile
</x-tabler::dropdowns.toggle>
```

## Related Components

- [Dropdown](./dropdown.md) - Main wrapper container
- [Dropdown Menu](./menu.md) - Menu container for items
- [Dropdown Item](./item.md) - Individual menu item
- [Dropdown Header](./header.md) - Section header in menu
- [Dropdown Divider](./divider.md) - Horizontal separator
- [Button](../button.md) - Standalone button component
- [Badge](../badge.md) - Badge indicators
- [Avatar](../avatar.md) - User avatar images
- [Icon](../icon.md) - Tabler icon component

## Source

**File Location:** `/tabler-blade/stubs/resources/views/tabler/dropdowns/toggle.blade.php`

**Related Files:**
- `dropdown.blade.php` - Parent dropdown container
- `menu.blade.php` - Dropdown menu component
- `item.blade.php` - Menu item component

## Changelog

- **v1.0.0** - Initial release with Bootstrap 5 integration
  - Support for button and link elements via `href` prop
  - Automatic class detection for nav-link compatibility
  - Tabler color variants
  - Icon support with automatic spacing
  - Full ARIA and accessibility support
