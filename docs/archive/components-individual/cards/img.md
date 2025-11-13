# Card Image

The Card Image component provides a flexible way to display images within cards.

## Overview

- **Flexible Positioning**: Display images at top or bottom
- **Overlay Support**: Add content overlays
- **Responsive Images**: Automatic sizing and aspect ratios
- **Accessibility**: Built-in alt text support
- **Custom Styling**: Extensive CSS customization
- **Click Handling**: Support for clickable images
- **Lazy Loading**: Native browser lazy loading
- **Multiple Aspect Ratios**: Various image dimensions support

## Basic Usage

```blade
<x-tabler::card>
    <x-tabler::cards.img 
        src="/images/photo.jpg" 
        alt="Mountain landscape" 
    />
    <x-tabler::cards.body>
        <h3 class="card-title">Beautiful Scenery</h3>
    </x-tabler::cards.body>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string` | `null` | Image source URL (required) |
| `alt` | `string` | `''` | Alternative text for accessibility |
| `position` | `string` | `'top'` | Image position: 'top' or 'bottom' |
| `overlay` | `bool` | `false` | Enable overlay mode |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

### Default Slot

Used for overlay content when the `overlay` prop is enabled.

## CSS Classes

- `card-img-top` - Top positioned images
- `card-img-bottom` - Bottom positioned images
- `card-img-overlay` - Overlay content container

## Accessibility

Always provide descriptive alt text for images.

## Browser Compatibility

Compatible with all modern browsers.

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Body](./body.md)** - Card content area

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/img.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Image component
