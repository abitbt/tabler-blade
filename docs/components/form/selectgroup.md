# Selectgroup

> Button-style radio or checkbox group component for visually selecting single or multiple options with enhanced UX.

## Overview

The Selectgroup component creates visually appealing button-style selection groups that function as either radio buttons (single selection) or checkboxes (multiple selection). Perfect for view toggles, size selectors, payment periods, and any scenario where visual button-based selection improves user experience.

**Key Features:**
- Radio and checkbox modes
- Pill and box variants
- Icon support
- Vertical and horizontal layouts
- Full Bootstrap 5 integration
- Laravel validation support
- Accessibility compliant
- Mobile-friendly touch targets

## Basic Usage

```blade
<x-tabler::form.selectgroup name="view_mode">
    <x-tabler::form.selectgroup-item value="grid" checked>
        Grid View
    </x-tabler::form.selectgroup-item>
    <x-tabler::form.selectgroup-item value="list">
        List View
    </x-tabler::form.selectgroup-item>
</x-tabler::form.selectgroup>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | required | Input name attribute |
| `type` | `string` | `'radio'` | Either `'radio'` or `'checkbox'` |
| `pills` | `bool` | `false` | Use pill-style buttons |
| `vertical` | `bool` | `false` | Stack buttons vertically |
| `class` | `string` | `''` | Additional CSS classes |

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Contains selectgroup-item elements |

## CSS Classes

### Container Classes
- `form-selectgroup` - Base selectgroup container
- `form-selectgroup-pills` - Pill-style variant
- `form-selectgroup-boxes` - Box-style variant (default)
- `form-selectgroup-vertical` - Vertical layout

### Item Classes
- `form-selectgroup-item` - Individual item container
- `form-selectgroup-input` - Hidden input element
- `form-selectgroup-label` - Visible label/button
- `form-selectgroup-check` - Checkmark indicator

## Related Components

- [Radio](./radio.md) - Standard radio inputs
- [Checkbox](./checkbox.md) - Standard checkbox inputs
- [Button Group](../button-group.md) - Button grouping component

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/selectgroup.blade.php`

## Changelog

- **v1.0.0** - Initial release with radio/checkbox modes and pill/box variants
