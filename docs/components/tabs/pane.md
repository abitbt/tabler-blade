# Tab Pane

Individual content pane within a tab content container.

## Overview

- **Switchable Content**: Displays when corresponding tab is active
- **Active State Management**: Show/hide with transitions
- **ARIA Tabpanel Role**: Proper accessibility
- **Linked to Navigation**: ID matches nav-item href
- **Fade Animations**: Smooth transitions
- **Flexible Content**: Any HTML, Blade components

## Basic Usage

```blade
<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="home" active>
        <h3>Home Content</h3>
        <p>This is the home tab pane content.</p>
    </x-tabler::tabs.pane>

    <x-tabler::tabs.pane id="profile">
        <h3>Profile Content</h3>
        <p>This is the profile tab pane content.</p>
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

## Props

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `id` | `string` | - | **Yes** | Unique pane identifier matching nav-item `href` (without `#`) |
| `active` | `bool` | `false` | No | Whether this pane is currently active |
| `class` | `string` | `''` | No | Additional CSS classes |

## Slots

The default slot contains the pane content.

## CSS Classes

- `.tab-pane` - Base pane styling
- `.fade` - Fade transition
- `.show` - Visible state (with active)
- `.active` - Active pane state

## Accessibility

- `role="tabpanel"` - Identifies as tab panel
- `aria-labelledby` - References controlling tab
- Proper keyboard navigation support
- Screen reader announces content changes

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Tab Content](./content.md)** - Parent container
- **[Tab Nav Item](./nav-item.md)** - Corresponding navigation
- **[Tabs](./tabs.md)** - Parent component

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/tabs/pane.blade.php`

## Changelog

### v1.0.0
- Initial release of Tab Pane component
