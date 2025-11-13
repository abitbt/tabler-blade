# Card Progress

A progress bar component for cards that displays completion status.

## Overview

- **Visual Progress Tracking**: Animated progress bar
- **Flexible Positioning**: Top or bottom placement
- **Color Customization**: Any Tabler color theme
- **Percentage Display**: Optional text labels
- **Lightweight Design**: Minimal markup
- **Responsive Layout**: Adapts to card width
- **State Management**: 0% to 100% support
- **Accessibility Ready**: ARIA attributes
- **Laravel Integration**: Works with Eloquent models

## Basic Usage

```blade
<x-tabler::cards.progress
    value="75"
    color="primary"
    position="top"
>
    <x-tabler::card.body>
        <h3 class="card-title">Project Completion</h3>
        <p>3 of 4 milestones completed</p>
    </x-tabler::card.body>
</x-tabler::cards.progress>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | `number` | `0` | Progress value from 0 to 100 |
| `color` | `string` | `'primary'` | Tabler color theme |
| `position` | `string` | `'top'` | Position: 'top' or 'bottom' |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

Use the default slot to add card content.

## CSS Classes

Card container and progress bar styling classes available.

## Accessibility

Includes proper ARIA attributes (role="progressbar", aria-valuenow, etc.).

## Browser Compatibility

Compatible with all modern browsers (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+).

## Related Components

- **[Card](./card.md)** - Base card component
- **[Card Status](./status.md)** - Status indicators
- **[Progress Bar](../progress.md)** - Standalone progress

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/progress.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Progress component
