# Modal Footer

Footer section with action buttons for modals.

## Overview

- **Action Container**: Buttons and controls
- **Bootstrap Integration**: modal-footer class
- **Right-Aligned Default**: Standard button positioning
- **Flexible Layouts**: Grid, centered, justified options
- **Full-Width Support**: Buttons can span full width
- **Button Groups**: Multiple action patterns

## Basic Usage

```blade
<x-tabler::modal id="example-modal">
    <x-tabler::modals.body>
        Modal content goes here.
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancel
        </button>
        <button type="button" class="btn btn-primary">
            Save changes
        </button>
    </x-tabler::modals.footer>
</x-tabler::modal>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

## Slots

The default slot contains footer content (typically buttons).

## CSS Classes

- `.modal-footer` - Base footer class
- `.w-100` - Full width container
- `.justify-content-between` - Space buttons apart
- `.justify-content-center` - Center buttons
- `.justify-content-start` - Left align buttons

## Accessibility

- Clear button labels for actions
- Keyboard accessible buttons
- Proper focus order from body to footer
- ARIA labels for icon-only buttons

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Modal Header](./header.md)** - Title section
- **[Modal Body](./body.md)** - Content area
- **[Button](../button.md)** - Action buttons

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/footer.blade.php`

## Changelog

### v1.0.0
- Initial release of Modal Footer component
