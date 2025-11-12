# Card Stamp

A decorative corner stamp or badge component for cards.

## Overview

- **Corner Positioning**: Automatically positioned in top-right corner
- **Color Variants**: All Tabler color schemes
- **Icon Support**: Optional icon display
- **Flexible Content**: Custom text, numbers, or HTML
- **Responsive Design**: Proper sizing across devices
- **Visual Hierarchy**: Ribbon-style design
- **Accessibility**: Proper semantic markup
- **Easy Integration**: Works with Card ecosystem

## Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.stamp color="blue">
        $29
    </x-tabler::cards.stamp>
    
    <x-tabler::cards.body>
        <h3 class="card-title">Premium Plan</h3>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string` | `null` | Tabler color variant |
| `icon` | `string` | `null` | Tabler icon name |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

### Default Slot

Primary content for the stamp (text, numbers, or symbols).

## CSS Classes

- `.card-stamp` - Base stamp container class
- `.card-stamp-icon` - Icon variant
- `.bg-{color}` - Background color variants

## Accessibility

Ensure stamp text is descriptive and meaningful.

## Browser Compatibility

Compatible with all modern browsers (Chrome/Edge 90+, Firefox 88+, Safari 14+).

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Status](./status.md)** - Status indicator
- **[Badge](../badge.md)** - Inline badges

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/stamp.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Stamp component
