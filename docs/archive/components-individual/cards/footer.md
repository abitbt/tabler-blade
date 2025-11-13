# Card Footer

A specialized footer section component for cards that provides a dedicated area for actions and supplementary content.

## Overview

- **Dedicated Footer Area**: Creates a distinct bottom section
- **Action Container**: Perfect for buttons and links
- **Visual Separation**: Styled with top border and spacing
- **Flexible Layout**: Supports various content arrangements
- **Custom Styling**: Easily customizable
- **Semantic HTML**: Proper semantic structure
- **Consistent Spacing**: Maintains proper padding
- **Seamless Integration**: Works with other card sub-components

## Basic Usage

```blade
<x-tabler::card>
    <x-tabler::cards.body>
        This is the card content.
    </x-tabler::cards.body>
    
    <x-tabler::cards.footer>
        <x-tabler::button>Save</x-tabler::button>
        <x-tabler::button color="secondary">Cancel</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

## Slots

### Default Slot

The primary slot for footer content - typically buttons, links, or supplementary information.

## CSS Classes

- `card-footer` - Base class providing top border, background, and padding

## Common Patterns

- Form actions (Save/Cancel buttons)
- Navigation actions
- Split actions (left and right aligned elements)
- Pagination

## Accessibility

Uses semantic HTML and supports proper focus management for interactive elements.

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Header](./header.md)** - Card header section
- **[Card Body](./body.md)** - Card content area
- **[Card Actions](./card-actions.md)** - Action buttons component

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/footer.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Footer component
