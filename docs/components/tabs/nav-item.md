# Tab Nav Item

Individual clickable tab link within tab navigation.

## Overview

- **Active State Management**: Visual feedback for current tab
- **Icon Support**: Leading icons or icon-only display
- **Disabled State**: Prevent interaction when needed
- **Bootstrap Integration**: data-bs-toggle="tab" functionality
- **ARIA Compliance**: Proper tab role and attributes
- **Keyboard Accessible**: Full keyboard navigation support
- **Flexible Positioning**: Auto-align with ms-auto/me-auto
- **Badge Integration**: Support for notification counters

## Basic Usage

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string` | `'#'` | Target tab pane ID (e.g., `#home`) |
| `active` | `bool` | `false` | Whether this tab is currently active |
| `disabled` | `bool` | `false` | Disable the tab link |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `iconOnly` | `bool` | `false` | Show only icon without text |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

Use the default slot for tab label text.

## CSS Classes

- `.nav-link` - Base tab link styling
- `.active` - Active tab state
- `.disabled` - Disabled tab state
- `.ms-auto` - Push tab to right
- `.me-auto` - Push tab to left

## Accessibility

- Uses `role="tab"` for proper ARIA semantics
- `aria-selected="true"` on active tabs
- `aria-controls` links to corresponding pane
- Keyboard navigation via Arrow Left/Right, Home, End

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Tab Nav](./nav.md)** - Container for nav items
- **[Tab Pane](./pane.md)** - Corresponding content
- **[Badge](../badge.md)** - For counters/notifications

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/tabs/nav-item.blade.php`

## Changelog

### v1.0.0
- Initial release of Tab Nav Item component
