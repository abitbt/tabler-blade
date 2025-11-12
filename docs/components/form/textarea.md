# Textarea

> Multi-line text input component with auto-resize, validation support, and Laravel integration for collecting longer text content like descriptions, comments, and feedback.

## Overview

The Textarea component is a full-featured multi-line text input built on Bootstrap 5's form controls with seamless Laravel validation integration. It automatically handles error states, old input retrieval, auto-resizing based on content, and provides accessibility features out of the box. Perfect for collecting descriptions, comments, notes, messages, reviews, and any content that requires more than a single line of text.

**Key Features:**
- Laravel validation integration with automatic error display
- Automatic old input retrieval after validation failures
- Auto-resize functionality based on content length
- Configurable row height and sizing variants
- Accessible labels with required field indicators
- Help text support for additional context
- Read-only and disabled states
- Light and dark background variants
- Full keyboard navigation support
- Character counting support via slots
- Compatible with Livewire and Alpine.js

---

## Basic Usage

```blade
<x-tabler::form.textarea
    name="description"
    label="Description" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name (used for validation and old input) |
| `id` | `string\|null` | `null` | Textarea ID (auto-generated from name if not provided) |
| `label` | `string\|null` | `null` | Label text displayed above textarea |
| `value` | `string\|null` | `null` | Textarea content (overridden by old input) |
| `placeholder` | `string\|null` | `null` | Placeholder text shown when empty |
| `help` | `string\|null` | `null` | Help text displayed above textarea |
| `error` | `string\|null` | `null` | Error message (auto-retrieved from `$errors` if not provided) |
| `required` | `bool` | `false` | Mark field as required (adds asterisk to label) |
| `disabled` | `bool` | `false` | Disable textarea (prevents editing and submission) |
| `readonly` | `bool` | `false` | Make textarea read-only (allows focus but prevents editing) |
| `rows` | `int` | `3` | Number of visible text rows |
| `autosize` | `bool` | `false` | Enable auto-resize based on content |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div for automatic spacing |
| `class` | `string` | `''` | Additional CSS classes for textarea element |

**Note:** All additional HTML attributes (like `maxlength`, `minlength`, `cols`, etc.) are passed through to the textarea element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Default textarea content (alternative to `value` prop) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Form Control States:**
- `is-valid` - Valid state styling (green border)
- `is-invalid` - Invalid state styling (red border, auto-applied on error)

**Textarea Styles:**
- `form-control-light` - Light background variant
- `form-control-dark` - Dark background variant

**Sizing:**
- `form-control-sm` - Small textarea
- `form-control-lg` - Large textarea

**Auto-resize:**
- `autosize` - Auto-resize based on content (also available via `autosize` prop)

**Width Utilities:**
- `w-auto`, `w-25`, `w-50`, `w-75`, `w-100` - Width percentages

---

## Related Components

- [Input](./input.md) - Single-line text input component
- [Label](./label.md) - Standalone label component
- [Select](./select.md) - Dropdown selection component
- [Checkbox](./checkbox.md) - Checkbox input component
- [Button](../button.md) - Form submission buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/textarea.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Laravel validation integration, auto-resize support, and accessibility features
