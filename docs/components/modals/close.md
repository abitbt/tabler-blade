# Modal Close

Standalone close button for modals (× icon).

## Overview

- **Standalone Close**: Independent close button
- **Top-Right Positioning**: Default absolute positioning
- **Bootstrap Dismiss**: data-bs-dismiss="modal" attribute
- **ARIA Accessible**: aria-label="Close"
- **White Variant**: For dark backgrounds
- **Flexible Placement**: Customizable positioning

## Basic Usage

```blade
<x-tabler::modal id="alertModal">
    <x-tabler::modals.close />
    <x-tabler::modals.body>
        <p>This is an important alert message.</p>
    </x-tabler::modals.body>
</x-tabler::modal>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

## Slots

None (self-closing component).

## CSS Classes

- `.btn-close` - Bootstrap close button
- `.position-absolute` - Absolute positioning
- `.top-0`, `.end-0` - Position utilities
- `.m-3` - Default margin spacing
- `.btn-close-white` - White variant for dark backgrounds

## Accessibility

- Includes `aria-label="Close"` by default
- Keyboard accessible (Tab, Enter, Space)
- Part of modal focus trap
- Screen reader announces close action

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Modal Header](./header.md)** - Has built-in close button
- **[Modal](./modal.md)** - Parent container
- **[Button](../button.md)** - Alternative actions

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/close.blade.php`

## Changelog

### v1.0.0
- Initial release of Modal Close component
