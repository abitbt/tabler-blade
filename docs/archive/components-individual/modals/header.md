# Modal Header

Modal header section with title and optional close button.

## Overview

- **Modal Title Display**: Text or custom markup
- **Integrated Close Button**: Dismiss functionality
- **Flexible Content**: Additional header elements
- **Optional Close Hiding**: Force completion of actions
- **Bootstrap Integration**: modal-header class
- **Accessible**: ARIA labels on close button

## Basic Usage

```blade
<x-tabler::modal id="example-modal">
    <x-tabler::modals.header title="Modal Title" />
    <x-tabler::modals.body>
        Modal content goes here.
    </x-tabler::modals.body>
</x-tabler::modal>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string\|null` | `null` | Modal title text |
| `hideClose` | `bool` | `false` | Hide the close button |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

- `default` - Additional header content
- `title` - Custom title markup (overrides `title` prop)

## CSS Classes

- `.modal-header` - Base header class
- `.modal-title` - Title styling
- `.btn-close` - Close button

## Accessibility

- Close button includes `aria-label="Close"`
- Keyboard accessible (Tab, Enter, Space)
- Screen reader support for title and close action

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Modal](./modal.md)** - Parent container
- **[Modal Body](./body.md)** - Content section
- **[Modal Footer](./footer.md)** - Footer with actions
- **[Modal Close](./close.md)** - Standalone close button

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/header.blade.php`

## Changelog

### v1.0.0
- Initial release of Modal Header component
