# Component Name

> Brief one-line description of what this component does.

## Overview

A concise description of the component's purpose and when to use it. Simple components typically have 2-5 props and minimal complexity.

---

## Basic Usage

```blade
<x-tabler::component-name>
    Content here
</x-tabler::component-name>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string\|null` | `null` | Color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark` |
| `size` | `string\|null` | `null` | Size variant: `sm`, `md`, `lg` |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Main content slot |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Style Modifiers:**
- `component-style` - Description of style modifier
- `component-variant` - Description of variant

**Sizes:**
- `component-sm` - Small size (also via `size="sm"`)
- `component-lg` - Large size (also via `size="lg"`)

**Utilities:**
- `w-100` - Full width
- `shadow-sm`, `shadow`, `shadow-lg` - Shadow variants
- `m-2`, `p-2` - Spacing utilities

---

## Examples

### Basic Example

```blade
<x-tabler::component-name>
    Simple content
</x-tabler::component-name>
```

---

### With Color

```blade
<x-tabler::component-name color="primary">
    Primary colored content
</x-tabler::component-name>
```

---

### With Size

```blade
<x-tabler::component-name size="lg">
    Large sized content
</x-tabler::component-name>
```

---

### With Custom Class

```blade
<x-tabler::component-name class="custom-class">
    Content with custom styling
</x-tabler::component-name>
```

---

## Variants

### Color Variants

Available colors: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`

```blade
<x-tabler::component-name color="primary">Primary</x-tabler::component-name>
<x-tabler::component-name color="danger">Danger</x-tabler::component-name>
<x-tabler::component-name color="success">Success</x-tabler::component-name>
```

---

### Size Variants

Available sizes: `sm`, `md` (default), `lg`

```blade
<x-tabler::component-name size="sm">Small</x-tabler::component-name>
<x-tabler::component-name>Medium (default)</x-tabler::component-name>
<x-tabler::component-name size="lg">Large</x-tabler::component-name>
```

---

## Accessibility

- **Semantic HTML:** Uses appropriate semantic HTML elements
- **Screen Readers:** Properly announced to assistive technologies
- **Color Contrast:** Meets WCAG 2.1 AA standards (4.5:1 minimum)

**Best Practices:**
- Don't rely solely on color to convey meaning
- Ensure sufficient contrast ratios
- Use semantic markup

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (Flexbox, CSS Grid)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅

---

## Troubleshooting

### Common Issues

**Issue: Component not displaying correctly**
- ✅ Ensure Bootstrap 5 CSS is loaded
- ✅ Check that no conflicting styles are applied
- ✅ Verify parent container has proper layout

**Issue: Colors not applying**
- ✅ Use color prop, not class-based colors
- ✅ Verify color name is valid (see Color Variants)
- ✅ Check for CSS specificity conflicts

---

## Available Classes

Additional CSS classes you can use via the `class` attribute:

**Utility Classes:**
- `m-2`, `p-2` - Margin/padding utilities
- `text-center`, `text-end` - Text alignment
- `d-none`, `d-block` - Display utilities

---

## Notes

- This is a simple presentational component
- Minimal JavaScript dependencies
- Lightweight rendering (~50-100 bytes)

---

## Related Components

- [Related Component 1](./related-component-1.md) - Brief description
- [Related Component 2](./related-component-2.md) - Brief description

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/component-name.blade.php`

---

## Changelog

- **v1.0.0** - Initial release
