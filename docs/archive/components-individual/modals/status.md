# Modal Status

Colored status indicator bar for modals.

## Overview

- **Visual Context**: Colored bar at modal top
- **All Tabler Colors**: Success, danger, warning, info, etc.
- **Alert Modals**: Perfect for notifications
- **Minimal Design**: Non-intrusive indicator
- **Easy Integration**: Works with Modal component

## Basic Usage

```blade
<x-tabler::modal id="successModal">
    <x-tabler::modals.status color="success" />
    <x-tabler::modals.body>
        <h3>Operation Successful</h3>
        <p>Your changes have been saved successfully.</p>
    </x-tabler::modals.body>
</x-tabler::modal>
```

## Props

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `color` | `string` | - | **Yes** | Tabler color variant |
| `class` | `string` | `''` | No | Additional CSS classes |

## Available Colors

- `success` - Green (successful operations)
- `danger` - Red (errors, destructive actions)
- `warning` - Yellow/orange (warnings)
- `info` - Blue (informational)
- `primary`, `secondary`, and all Tabler colors

## Slots

None (self-closing component).

## CSS Classes

- `.modal-status` - Base status bar class
- `.bg-{color}` - Background color variants

## Accessibility

- Purely visual indicator
- Must include text/icon context for color-blind users
- Don't rely solely on color for meaning

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Modal](./modal.md)** - Parent container
- **[Card Status](../cards/status.md)** - Similar indicator
- **[Alert](../alert.md)** - Alternative notifications

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/status.blade.php`

## Changelog

### v1.0.0
- Initial release of Modal Status component
