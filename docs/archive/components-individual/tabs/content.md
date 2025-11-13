# Tab Content

Container for all tab panes in a tabbed interface.

## Overview

- **Structural Container**: Groups all tab panes
- **Bootstrap Integration**: tab-content class
- **Minimal Component**: Lightweight wrapper
- **Flexible Content**: Supports any nested components
- **Works with Tab Nav**: Coordinated content switching

## Basic Usage

```blade
<x-tabler::tabs.nav id="profile-tabs">
    <x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>

<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="profile" active>
        <p>Profile content goes here</p>
    </x-tabler::tabs.pane>

    <x-tabler::tabs.pane id="settings">
        <p>Settings content goes here</p>
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string\|null` | `null` | Optional container ID |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

The default slot contains all tab panes.

## CSS Classes

- `.tab-content` - Base content container class

## Accessibility

Works with ARIA attributes from Tab Nav component. Content is properly announced when tabs are activated.

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Tab Pane](./pane.md)** - Individual content sections
- **[Tab Nav](./nav.md)** - Navigation container
- **[Card Body](../cards/body.md)** - For card integration

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/tabs/content.blade.php`

## Changelog

### v1.0.0
- Initial release of Tab Content component
