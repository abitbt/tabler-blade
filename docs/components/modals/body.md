# Modal Body

Main content area for modal dialogs.

## Overview

- **Content Container**: Main modal content area
- **Bootstrap Integration**: modal-body class
- **Scrollable Support**: Works with parent modal scrollable prop
- **Flexible Content**: Forms, text, images, tables, etc.
- **Responsive**: Adapts to modal sizing
- **Nested Components**: Supports any components

## Basic Usage

```blade
<x-tabler::modal id="example-modal">
    <x-tabler::modals.header title="Modal Title" />

    <x-tabler::modals.body>
        <p>This is the modal body content.</p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modal>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

## Slots

The default slot contains modal body content (required).

## CSS Classes

- `.modal-body` - Base body class
- `.text-center` - Center align content
- `.py-{0-5}` - Vertical padding utilities
- `.p-{0-5}` - All-around padding
- `.bg-light` - Light background

## Accessibility

- Maintains proper heading hierarchy
- Form labels associated with inputs
- Keyboard navigation through content
- Screen reader friendly structure

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Modal Header](./header.md)** - Title section
- **[Modal Footer](./footer.md)** - Action buttons
- **[Modal](./modal.md)** - Parent container

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/body.blade.php`

## Changelog

### v1.0.0
- Initial release of Modal Body component
