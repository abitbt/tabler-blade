# Label

> Standalone form label component with optional required indicator and description for use with custom form layouts and inputs.

## Overview

The Label component provides a semantic and accessible form label that can be used independently or alongside form inputs. It includes built-in support for required field indicators, right-aligned descriptions, and proper input association via the `for` attribute. Perfect for custom form layouts, floating labels, or when building form components from scratch.

**Key Features:**
- Semantic HTML `<label>` element
- Automatic `for` attribute association
- Required field indicator with asterisk (*)
- Right-aligned description text
- Small label variant
- Proper ARIA attributes for accessibility
- Auto-applied Tabler form label styling
- Works standalone or with any input
- Compatible with custom form builders
- Bootstrap 5 integration

**Use Case:** Use the Label component when building custom form layouts, creating reusable input wrappers, implementing floating labels, or when you need granular control over label placement and styling.

## Basic Usage

```blade
<x-tabler::forms.label for="email">
    Email Address
</x-tabler::forms.label>
<input type="email" id="email" name="email" class="form-control">
```

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `for` | `string\|null` | `null` | The ID of the input element this label is associated with |
| `required` | `bool` | `false` | Show required indicator (red asterisk) |
| `description` | `string\|null` | `null` | Additional description text displayed on the right side |
| `class` | `string` | `''` | Additional CSS classes for the label element |

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | The label text content |

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Label Styles:**
- `form-label` - Default label style (automatically applied)
- `form-label-small` - Smaller label text
- `required` - Shows required indicator (also via `required` prop)

**Text Utilities:**
- `text-muted`, `text-primary`, `text-success`, `text-danger` - Text color variants
- `fw-bold`, `fw-semibold`, `fw-normal` - Font weight variants

## Examples

### Basic Label

```blade
<x-tabler::forms.label for="username">
    Username
</x-tabler::forms.label>
<input type="text" id="username" name="username" class="form-control">
```

### Required Field

```blade
<x-tabler::forms.label for="email" required>
    Email Address
</x-tabler::forms.label>
<input type="email" id="email" name="email" class="form-control" required>
```

### With Description

```blade
<x-tabler::forms.label for="username" description="Optional">
    Username
</x-tabler::forms.label>
<input type="text" id="username" name="username" class="form-control">
```

## Accessibility

### Label-Input Association

Always associate labels with inputs using the `for` attribute:

```blade
<x-tabler::forms.label for="username">
    Username
</x-tabler::forms.label>
<input type="text" id="username" name="username" class="form-control">
```

### Required Field Announcement

The required indicator is properly announced to screen readers.

### Best Practices

1. Always provide labels for form inputs
2. Use `for` attribute to properly associate labels
3. Mark required fields with the `required` prop
4. Use clear, concise label text
5. Maintain proper contrast ratios

## Browser Compatibility

Fully supported across all modern browsers:
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅

## Related Components

- [Input](../forms/input.md) - Text input with integrated label
- [Textarea](./textarea.md) - Multi-line text input with label
- [Select](../forms/select.md) - Dropdown select with label
- [Checkbox](./checkbox.md) - Checkbox input with label

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/label.blade.php`

## Changelog

- **v1.0.0** - Initial release with required indicator and description support
