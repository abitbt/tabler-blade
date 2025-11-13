# Input Group

> Form component that groups inputs with text addons, buttons, icons, or other elements for enhanced user experience.

## Overview

The Input Group component provides a flexible way to extend form controls with text, buttons, or custom elements before and after inputs. It's perfect for creating prefixed/suffixed inputs, search boxes with buttons, currency inputs, URL builders, and social media handles. The component follows Bootstrap 5 conventions and integrates seamlessly with Tabler's design system.

**Key Features:**
- Prepend and append text/content support
- Button integration for actions
- Icon support in addons
- Multiple addon stacking
- Size variants (small, large)
- Flat style option
- Bootstrap 5 integration
- Full accessibility support

**Use Case:** Use input groups to provide context, units, or actions for form inputs. Common uses include currency inputs, search boxes, URL fields, email domains, measurement units, and action buttons attached to inputs.

---

## Basic Usage

```blade
<x-tabler::forms.input-group prepend="@" append=".com">
    <input type="text" class="form-control" placeholder="username" />
</x-tabler::forms.input-group>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `prepend` | `string\|null` | `null` | Text or content to display before the input |
| `append` | `string\|null` | `null` | Text or content to display after the input |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root `<div>` element with the `input-group` class.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Input element or other form control |
| `prepend` | No | Custom prepend content (alternative to `prepend` prop) |
| `append` | No | Custom append content (alternative to `append` prop) |

**Note:** When using named slots (`prepend` and `append`), you have full control over the markup. The prop versions automatically wrap content in `<span class="input-group-text">`.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Input Group Sizes:**
- `input-group-sm` - Small input group
- `input-group-lg` - Large input group

**Input Group Styles:**
- `input-group-flat` - Remove border radius from inner elements (seamless appearance)

**Text Addon Classes (for custom prepend/append):**
- `input-group-text` - Standard text addon styling

**Layout:**
- `flex-nowrap` - Prevent wrapping on small screens

---

## Related Components

- [Button](./button.md) - Buttons used in input group actions
- [Form Controls](./forms/) - Input, select, textarea components
- [Validation](./forms/validation.md) - Form validation feedback

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/input-group.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with prepend/append support
