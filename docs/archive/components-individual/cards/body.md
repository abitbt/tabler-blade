# Card Body

The Card Body component provides the main content area for Tabler cards.

## Overview

- **Flexible Content Container**: Accommodates any type of content
- **Scrollable Mode**: Optional scrollable content area
- **Consistent Spacing**: Automatic padding and spacing
- **Responsive Design**: Adapts to different screen sizes
- **Table Integration**: Special handling for tables
- **Form Support**: Optimized layout for form elements
- **List Compatibility**: Works seamlessly with lists
- **Custom Styling**: Flexible class attribute
- **Accessibility Ready**: Semantic HTML structure
- **Laravel Integration**: Full Blade template compatibility

## Basic Usage

```blade
<x-tabler::card>
    <x-tabler::cards.body>
        <p>This is the main content area of the card.</p>
    </x-tabler::cards.body>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `scrollable` | `boolean` | `false` | Enables scrollable content area with fixed height |
| `class` | `string` | `''` | Additional CSS classes to apply |

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | The main content area for the card body |

## CSS Classes

| Class | Purpose |
|-------|---------|
| `.card-body` | Base class for the card body container |
| `.card-body-scrollable` | Enables scrollable content with fixed height |

## Scrollable Mode

When `scrollable` is set to `true`, the card body applies a fixed height and enables vertical scrolling.

## Accessibility

Uses proper semantic HTML and supports ARIA attributes for scrollable regions.

## Browser Compatibility

Compatible with all modern browsers.

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Header](./header.md)** - Card header section
- **[Card Footer](./footer.md)** - Card footer section

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/body.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Body component
