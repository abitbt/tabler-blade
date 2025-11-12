# Card Header

The Card Header component provides a structured header section for cards with support for titles, subtitles, and action buttons.

## Overview

- **Structured Layout**: Dedicated areas for title, subtitle, and action elements
- **Flexible Content**: Support for both simple text and complex HTML content
- **Light Variant**: Alternative styling option for different visual contexts
- **Action Integration**: Built-in slot for buttons and other interactive elements
- **Responsive Design**: Adapts to different screen sizes and card widths
- **Semantic HTML**: Uses appropriate heading and structural elements
- **Custom Styling**: Extensible with custom CSS classes
- **Typography Control**: Consistent heading hierarchy and text styling
- **Alignment Options**: Proper spacing and alignment of header elements
- **Accessibility Ready**: ARIA landmarks and semantic structure

## Basic Usage

```blade
<x-tabler::card>
    <x-tabler::cards.header>
        <x-slot:title>Card Title</x-slot:title>
    </x-tabler::cards.header>
    <x-tabler::cards.body>
        Card content goes here.
    </x-tabler::cards.body>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `light` | `boolean` | `false` | Applies light styling variant to the header |
| `class` | `string` | `''` | Additional CSS classes to apply to the header container |

## Slots

### title
The main title slot for the card header.

### subtitle
Optional subtitle slot for secondary text below the title.

### actions
Slot for action buttons or controls aligned to the right side of the header.

### default
The default slot for custom content within the header.

## CSS Classes

- `card-header` - Base header container class
- `card-title` - Title text styling
- `text-secondary` - Secondary text color for subtitles
- `card-actions` - Container for action buttons

## Accessibility

The component uses semantic HTML elements and supports ARIA attributes for improved accessibility.

## Browser Compatibility

Compatible with all modern browsers (Chrome, Firefox, Safari, Edge, Opera).

## Related Components

- **[Card](./card.md)** - Main card container component
- **[Card Body](./card-body.md)** - Card content area component
- **[Card Footer](./card-footer.md)** - Card footer section component
- **[Card Actions](./card-actions.md)** - Standalone actions component

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/header.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Header component
