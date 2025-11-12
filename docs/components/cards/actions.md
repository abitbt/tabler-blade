# Card Actions

A standalone actions section component for displaying action buttons and controls within Tabler cards.

## Overview

- **Standalone Section**: Independent actions area
- **Flexible Positioning**: Can be placed anywhere within card
- **Multiple Action Types**: Supports buttons, dropdowns, icon buttons
- **Responsive Layout**: Automatically adapts to screen sizes
- **Custom Styling**: Configurable CSS classes
- **Consistent Spacing**: Maintains proper alignment
- **Icon Integration**: Works with Tabler Icons
- **Framework Agnostic**: Compatible with any content
- **Accessibility Ready**: Supports ARIA attributes
- **Laravel Integration**: Works with Laravel forms and routes

## Basic Usage

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">Project Details</h3>
    </x-slot:header>
    
    <x-slot:body>
        <p>Project information goes here...</p>
    </x-slot:body>
    
    <x-tabler::cards.actions>
        <button class="btn btn-primary">Save</button>
        <button class="btn btn-secondary">Cancel</button>
    </x-tabler::cards.actions>
</x-tabler::card>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

## Slots

### Default Slot

Contains action buttons, controls, or interactive elements.

## CSS Classes

- `.card-actions` - Main container class
- `.btn` - Standard button styling
- `.btn-group` - Grouped button container

## Difference from Header Actions Slot

**Header Actions Slot**: Actions within card header, compact, often icon-based

**Card Actions Component**: Dedicated section, more prominent, typically full buttons with labels

## Accessibility

- Provide clear button labels or ARIA labels for icon-only buttons
- All elements are keyboard accessible
- Use appropriate ARIA attributes
- Ensure proper focus management

## Browser Compatibility

Compatible with all modern browsers (Chrome/Edge 90+, Firefox 88+, Safari 14+, Opera 76+).

## Related Components

- **[Card](./card.md)** - Main card container
- **[Card Header](./header.md)** - Card header with actions slot
- **[Card Body](./body.md)** - Main content area
- **[Card Footer](./footer.md)** - Footer section

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/actions.blade.php`

## Changelog

### v1.0.0
- Initial release of Card Actions component
