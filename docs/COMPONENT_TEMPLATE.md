# Component Name

> Brief one-line description of what this component does.

## Overview

A comprehensive description of the component's purpose, when to use it, and its key features. Include information about complexity level and any special requirements.

**Key Features:**
- Feature 1
- Feature 2
- Feature 3
- Built-in accessibility support

**Use Case:** When to use this component vs alternatives

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
| `color` | `string\|null` | `null` | Color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `variant` | `string\|null` | `null` | Style variant: `outline`, `ghost`, `light` |
| `size` | `string\|null` | `null` | Size: `sm`, `md`, `lg`, `xl` |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `iconEnd` | `string\|null` | `null` | Trailing Tabler icon name (without `tabler-` prefix) |
| `disabled` | `bool` | `false` | Disable component interaction |
| `loading` | `bool` | `false` | Show loading state with spinner |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Main content slot |
| `prepend` | No | Content before main slot |
| `append` | No | Content after main slot |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Style Modifiers:**
- `component-style` - Description
- `component-variant` - Description

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
    Basic content
</x-tabler::component-name>
```

**Output:** Description of what renders

---

### With Color

```blade
<x-tabler::component-name color="primary">
    Primary colored component
</x-tabler::component-name>

<x-tabler::component-name color="success">
    Success colored component
</x-tabler::component-name>
```

---

### With Icons

```blade
{{-- Leading icon --}}
<x-tabler::component-name icon="home">
    With Leading Icon
</x-tabler::component-name>

{{-- Trailing icon --}}
<x-tabler::component-name icon-end="arrow-right">
    With Trailing Icon
</x-tabler::component-name>

{{-- Both icons --}}
<x-tabler::component-name icon="download" icon-end="arrow-down">
    With Both Icons
</x-tabler::component-name>
```

---

### With Variants

```blade
{{-- Outline variant --}}
<x-tabler::component-name color="primary" variant="outline">
    Outline Style
</x-tabler::component-name>

{{-- Ghost variant --}}
<x-tabler::component-name color="success" variant="ghost">
    Ghost Style
</x-tabler::component-name>
```

---

### Loading State

```blade
<x-tabler::component-name loading color="primary">
    Processing...
</x-tabler::component-name>
```

---

### Disabled State

```blade
<x-tabler::component-name disabled>
    Disabled Component
</x-tabler::component-name>
```

---

### With Slots

```blade
<x-tabler::component-name color="primary">
    <x-slot:prepend>
        <x-tabler::icon name="star" />
    </x-slot:prepend>

    Main content here

    <x-slot:append>
        <x-tabler::badge>New</x-tabler::badge>
    </x-slot:append>
</x-tabler::component-name>
```

---

### Complete Example

A comprehensive real-world example showing all features:

```blade
<x-tabler::component-name
    id="example-id"
    color="primary"
    variant="outline"
    size="lg"
    icon="check"
    :disabled="$isDisabled"
    data-action="save"
    class="custom-class">

    <x-slot:prepend>
        Prepend content
    </x-slot:prepend>

    Complete example content

    <x-slot:append>
        Append content
    </x-slot:append>
</x-tabler::component-name>
```

---

## Variants

### Color Variants

Available colors: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

```blade
<x-tabler::component-name color="primary">Primary</x-tabler::component-name>
<x-tabler::component-name color="secondary">Secondary</x-tabler::component-name>
<x-tabler::component-name color="success">Success</x-tabler::component-name>
<x-tabler::component-name color="danger">Danger</x-tabler::component-name>
<x-tabler::component-name color="warning">Warning</x-tabler::component-name>
<x-tabler::component-name color="info">Info</x-tabler::component-name>
<x-tabler::component-name color="light">Light</x-tabler::component-name>
<x-tabler::component-name color="dark">Dark</x-tabler::component-name>
```

---

### Style Variants

**Outline:**
```blade
<x-tabler::component-name color="primary" variant="outline">
    Outline Style
</x-tabler::component-name>
```

**Ghost:**
```blade
<x-tabler::component-name color="primary" variant="ghost">
    Ghost Style
</x-tabler::component-name>
```

**Light:**
```blade
<x-tabler::component-name color="primary" variant="light">
    Light Style
</x-tabler::component-name>
```

---

### Size Variants

Available sizes: `sm`, `md` (default), `lg`, `xl`

```blade
<x-tabler::component-name size="sm">Small</x-tabler::component-name>
<x-tabler::component-name>Medium (default)</x-tabler::component-name>
<x-tabler::component-name size="lg">Large</x-tabler::component-name>
<x-tabler::component-name size="xl">Extra Large</x-tabler::component-name>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to/from component
- **Space/Enter:** Activates component (if interactive)
- **Escape:** Closes component (if dismissible)
- **Arrow Keys:** Navigate within component (if applicable)

### ARIA Attributes
- `aria-label`: Provide descriptive label for icon-only components
- `aria-disabled`: Applied when `disabled` prop is true
- `aria-expanded`: For expandable components
- `aria-hidden`: Manages visibility for assistive technologies
- `role`: Appropriate role automatically applied

### Screen Reader Support
- Component is properly announced to screen readers
- State changes (loading, disabled, expanded) are communicated
- Icons include accessible text alternatives
- Error messages are associated with inputs

### Best Practices
- Always provide `aria-label` for icon-only variants
- Ensure color is not the only way to convey information
- Maintain 4.5:1 contrast ratio for text
- Use semantic HTML structure
- Test with keyboard navigation
- Test with screen readers (NVDA, JAWS, VoiceOver)

**Example:**
```blade
{{-- Accessible icon-only component --}}
<x-tabler::component-name
    icon="search"
    aria-label="Search products and categories" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS + JS if interactive)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon props
- Modern CSS support (Flexbox, CSS Grid)
- JavaScript ES6+ (for interactive components)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Issue 1: Description and workaround
- Issue 2: Description and workaround

---

## Events & Interactivity

### Bootstrap Events

For components using Bootstrap JavaScript:

```javascript
const element = document.getElementById('myComponent');

// Before action
element.addEventListener('show.bs.component', (event) => {
    console.log('About to show');
    // Call event.preventDefault() to cancel
});

// After action
element.addEventListener('shown.bs.component', (event) => {
    console.log('Now visible');
});
```

---

### Framework Integration

**Livewire:**
```blade
<x-tabler::component-name
    wire:click="handleAction"
    :loading="$processing">
    Click Me
</x-tabler::component-name>
```

**Alpine.js:**
```blade
<x-tabler::component-name
    @click="handleClick"
    :disabled="!isValid"
    x-data="{ open: false }">
    Click Me
</x-tabler::component-name>
```

**Inertia.js:**
```blade
<x-tabler::component-name
    href="{{ route('dashboard') }}">
    Dashboard
</x-tabler::component-name>
```

---

## Laravel Integration

### Form Validation

For form components:

```blade
<form method="POST" action="{{ route('submit') }}">
    @csrf

    <x-tabler::component-name
        name="field_name"
        :value="old('field_name')"
        required />

    <x-tabler::button type="submit" color="primary">
        Submit
    </x-tabler::button>
</form>
```

---

### Authorization

```blade
@can('edit-posts')
    <x-tabler::component-name color="warning">
        Edit Post
    </x-tabler::component-name>
@endcan
```

---

## Troubleshooting

### Common Issues

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Colors not applying**
- ❌ Wrong: `class="component-primary"`
- ✅ Right: `color="primary" class="extra-class"`
- ✅ Use `color` prop instead of CSS classes
- ✅ Check for CSS specificity conflicts

**Issue: Attributes not merging**
- ✅ Additional attributes are automatically merged
- ✅ `class` attribute is merged with component classes
- ✅ Use props for built-in features, not manual classes

**Issue: Component not interactive**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Check JavaScript console for errors
- ✅ Verify correct Bootstrap version (5.x)
- ✅ Test with minimal example first

**Issue: Loading state not showing**
- ✅ Set `loading="true"` or `:loading="$variable"`
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check spinner is not hidden by custom CSS

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check console for JavaScript errors
- Test with minimal example first
- Verify Bootstrap version (must be 5.x)
- Clear view cache: `php artisan view:clear`
- Check for CSS conflicts

---

## Real-World Examples

### Example 1: Common Use Case

```blade
<div class="card">
    <div class="card-body">
        <x-tabler::component-name
            color="primary"
            icon="check"
            size="lg">
            Confirm Action
        </x-tabler::component-name>
    </div>
</div>
```

**Use Case:** Description of when to use this pattern

---

### Example 2: With Form

```blade
<form method="POST" action="/submit">
    @csrf

    <x-tabler::component-name
        name="field"
        :value="old('field')"
        required />

    <x-tabler::button type="submit" color="primary">
        Submit
    </x-tabler::button>
</form>
```

**Use Case:** Form submission with validation

---

### Example 3: Conditional Rendering

```blade
@if($user->can('edit'))
    <x-tabler::component-name
        icon="edit"
        color="warning">
        Edit Item
    </x-tabler::component-name>
@endif

@if($user->can('delete'))
    <x-tabler::component-name
        icon="trash"
        color="danger"
        data-confirm="Are you sure?">
        Delete Item
    </x-tabler::component-name>
@endif
```

**Use Case:** Authorization-based actions

---

## Available Classes

Additional CSS classes you can use via the `class` attribute:

**Layout:**
- `w-100` - Full width
- `w-auto` - Auto width
- `d-block` - Display block
- `d-inline-block` - Display inline-block

**Spacing:**
- `m-2`, `mt-2`, `mb-2`, `ms-2`, `me-2` - Margin utilities
- `p-2`, `pt-2`, `pb-2`, `ps-2`, `pe-2` - Padding utilities

**Effects:**
- `shadow-sm` - Small shadow
- `shadow` - Default shadow
- `shadow-lg` - Large shadow
- `rounded` - Rounded corners
- `rounded-circle` - Circle shape

**Text:**
- `text-center`, `text-start`, `text-end` - Text alignment
- `text-uppercase`, `text-lowercase` - Text transform

**Example:**
```blade
<x-tabler::component-name
    color="primary"
    class="shadow-lg w-100 rounded">
    Full Width with Shadow
</x-tabler::component-name>
```

---

## Performance Considerations

### Component Weight
- Base component: ~100-200 bytes rendered
- With icons: +2KB per icon (SVG)
- With loading state: +500 bytes (spinner)

### Best Practices
- Lazy load components not immediately visible
- Use icon-only sparingly (accessibility trade-off)
- Cache icon SVGs with proper headers
- Minimize nested components
- Batch render multiple instances

### Optimization Tips
- Preload frequently used icons
- Use CSS classes directly for repeated patterns
- Consider server-side rendering for SEO-critical content
- Minimize custom styling
- Use component caching when appropriate

---

## Notes

- Important implementation detail 1
- Important implementation detail 2
- Browser compatibility notes
- Common pitfalls to avoid
- Version-specific notes

---

## Related Components

- [Related Component 1](./related-component-1.md) - Brief description
- [Related Component 2](./related-component-2.md) - Brief description
- [Related Component 3](./related-component-3.md) - Brief description

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/component-name.blade.php`

**Related Files:**
- Sub-component files (if applicable)
- Configuration files (if applicable)

---

## Changelog

- **v1.0.0** - Initial release with full functionality

---

## Template Selection

This is a **comprehensive template** that includes all possible sections. For your component, consider using one of the specialized templates:

- **Simple Components** (2-5 props): Use `docs/templates/simple-component.md`
- **Medium Components** (6-15 props): Use `docs/templates/medium-component.md`
- **Complex/Composite** (multiple sub-components): Use `docs/templates/complex-component.md`
- **Form Components** (Laravel validation): Use `docs/templates/form-component.md`

See `docs/templates/README.md` for detailed guidance on template selection.

---

**Documentation Best Practices:**
1. Remove sections that don't apply to your component
2. Add component-specific sections if needed
3. Provide 5-10 working code examples
4. Document all props with types and defaults
5. Include accessibility guidance
6. Add troubleshooting for common issues
7. Cross-reference related components
8. Keep examples copy-pasteable
9. Test all code examples
10. Maintain consistent formatting
