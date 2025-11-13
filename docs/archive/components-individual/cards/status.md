# Card Status

A colored status indicator bar for cards that can be positioned on any edge.

## Overview

- **Flexible Positioning**: Place on top, bottom, start, or end edges
- **Full Color Palette**: All Tabler color options
- **Responsive Design**: Adapts to screen sizes
- **Minimal Footprint**: Lightweight, no slots
- **Easy Integration**: Works with other card components
- **Accessibility Compliant**: Proper ARIA attributes
- **Zero JavaScript**: Pure CSS implementation

## Basic Usage

```blade
<x-tabler::card>
    <x-tabler::cards.status color="success" />
    <x-tabler::cards.body>
        <p>Card with success status indicator.</p>
    </x-tabler::cards.body>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string` | `null` | Status bar color |
| `side` | `string` | `'top'` | Position: 'top', 'start', 'end', 'bottom' |
| `class` | `string` | `null` | Additional CSS classes |

## Slots

This component does not support slots.

## CSS Classes

- `.card-status-top` - Top edge position
- `.card-status-start` - Start (left) edge
- `.card-status-end` - End (right) edge
- `.card-status-bottom` - Bottom edge

## Accessibility

Use status bars with text labels or badges for users with color vision deficiencies.

## Browser Compatibility

Compatible with all modern browsers.

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Header](./header.md)** - Card header

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/status.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Status component
