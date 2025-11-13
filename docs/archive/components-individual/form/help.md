# Form Help

The Form Help component displays supplementary information beneath form inputs to guide users on proper input formatting, requirements, or provide additional context. This component is essential for creating accessible and user-friendly forms.

## Overview

The `<x-tabler::form.help>` component provides a standardized way to display help text, hints, and additional information for form fields. It supports text color variants, icons, and can be associated with form inputs for proper accessibility through `aria-describedby`.

### Key Features

- Clean, consistent styling for form help text
- Multiple text color variants (muted, danger, warning, success, info)
- Icon support for visual emphasis
- Accessible with proper ARIA attributes
- Seamlessly integrates with form inputs
- Responsive typography
- Support for dynamic content
- Compatible with all Tabler form components
- Lightweight and performant
- Easy to customize

## Basic Usage

The most basic usage displays help text below a form input:

```blade
<x-tabler::form.label for="email">Email</x-tabler::form.label>
<x-tabler::form.input id="email" type="email" name="email" />
<x-tabler::form.help>We'll never share your email with anyone else.</x-tabler::form.help>
```

## Props/Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | string | `null` | Unique identifier for the help text element |
| `color` | string | `'muted'` | Text color variant: `muted`, `danger`, `warning`, `success`, `info` |
| `icon` | string | `null` | Icon name to display before the help text |
| `class` | string | `''` | Additional CSS classes to apply |

## Slots

### Default Slot

The default slot contains the help text content to be displayed.

```blade
<x-tabler::form.help>
    This is the help text that will be displayed.
</x-tabler::form.help>
```

## CSS Classes

The component uses the following Tabler CSS classes:

| Class | Purpose |
|-------|---------|
| `form-hint` | Base class for help text styling |
| `text-muted` | Default muted text color (gray) |
| `text-danger` | Red text for error-related hints |
| `text-warning` | Orange/yellow text for warnings |
| `text-success` | Green text for success hints |
| `text-info` | Blue text for informational hints |

## Accessibility

Always associate help text with inputs using `aria-describedby`:

```blade
<x-tabler::form.input
    id="email"
    name="email"
    aria-describedby="email-help"
/>
<x-tabler::form.help id="email-help">
    Enter a valid email address
</x-tabler::form.help>
```

## Browser Compatibility

The Form Help component is compatible with all modern browsers:
- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)

## Related Components

- **[Form Input](./input.md)** - Text input fields that benefit from help text
- **[Form Textarea](./textarea.md)** - Multi-line text inputs with help text
- **[Form Select](./select.md)** - Dropdown selects with descriptive hints
- **[Form Label](./label.md)** - Labels that precede help text

## Source

The Form Help component source code is located at:
```
tabler-blade/resources/views/components/form/help.blade.php
```

## Changelog

### Version 1.0.0
- Initial release of Form Help component
- Support for color variants (muted, danger, warning, success, info)
- Icon support
- ARIA accessibility attributes
- Full HTML attribute pass-through
- Responsive typography
- Integration with Tabler UI design system
