# Spinner

> Loading indicator component to show in-progress actions and asynchronous operations.

## Overview

The Spinner component provides visual feedback for loading states and asynchronous operations. It supports two animation styles (border and grow), multiple sizes, and all Tabler color variants. Spinners are essential for improving user experience by indicating that the application is processing a request or loading content.

Use spinners when:
- Loading page content or data
- Processing form submissions
- Executing long-running operations
- Fetching data asynchronously
- Indicating button loading states

---

## Basic Usage

```blade
<x-tabler::spinner />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string\|null` | `'border'` | Spinner animation type: `border` (rotating circle), `grow` (pulsing dots) |
| `size` | `string\|null` | `null` | Size variant: `sm` (small) |
| `color` | `string\|null` | `null` | Color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, or any Tabler color |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root `<div>` element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Accessible label text for screen readers (visually hidden). If empty, defaults to "Loading..." |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Spinner Types:**
- `spinner-border` - Border spinner with rotating circle (default)
- `spinner-grow` - Growing spinner with pulsing animation

**Sizes:**
- `spinner-border-sm` - Small border spinner (also via `size="sm"`)
- `spinner-grow-sm` - Small grow spinner (also via `size="sm"`)

**Colors:**
- `text-primary`, `text-secondary`, `text-success`, `text-danger` - Color variants
- `text-warning`, `text-info`, `text-light`, `text-dark` - Additional colors
- `text-{color}` - Any Tabler color name

**Utilities:**
- `m-2`, `me-2`, `ms-2` - Margin utilities for spacing
- `d-inline-block`, `d-block` - Display utilities

---

## Examples

### Basic Spinner

A simple loading spinner with default styling:

```blade
<x-tabler::spinner />
```

---

### With Color

Spinners in various color variants:

```blade
<x-tabler::spinner color="primary" />
<x-tabler::spinner color="danger" />
<x-tabler::spinner color="success" />
<x-tabler::spinner color="warning" />
```

---

### With Size

Small spinner for compact spaces:

```blade
<x-tabler::spinner size="sm" />
<x-tabler::spinner size="sm" color="primary" />
```

---

### Growing Spinner

Alternative animation style using the grow effect:

```blade
<x-tabler::spinner type="grow" />
<x-tabler::spinner type="grow" color="primary" />
<x-tabler::spinner type="grow" size="sm" color="success" />
```

---

### With Accessible Label

Custom screen reader text for context-specific loading states:

```blade
<x-tabler::spinner color="primary">
    Loading user data...
</x-tabler::spinner>

<x-tabler::spinner type="grow" color="success">
    Saving changes...
</x-tabler::spinner>
```

---

### Inline Spinner

Spinner displayed inline with text or other elements:

```blade
<div class="d-flex align-items-center gap-2">
    <x-tabler::spinner size="sm" color="primary" />
    <span>Loading content...</span>
</div>
```

---

### Centered Spinner

Spinner centered within a container:

```blade
<div class="d-flex justify-content-center align-items-center" style="min-height: 200px;">
    <x-tabler::spinner color="primary" />
</div>
```

---

### Button Loading State

Spinner inside a disabled button to indicate processing:

```blade
<x-tabler::button disabled>
    <x-tabler::spinner size="sm" class="me-2" />
    Processing...
</x-tabler::button>

<x-tabler::button color="primary" disabled>
    <x-tabler::spinner size="sm" color="light" class="me-2" />
    Saving...
</x-tabler::button>
```

---

### Multiple Spinners

Animated loading indicator with multiple growing spinners:

```blade
<div class="d-flex align-items-center gap-2">
    <x-tabler::spinner type="grow" size="sm" color="primary" />
    <x-tabler::spinner type="grow" size="sm" color="primary" />
    <x-tabler::spinner type="grow" size="sm" color="primary" />
</div>
```

---

### Card Loading State

Spinner overlaying a card or content area:

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Loading Data</x-slot:title>
    </x-tabler::cards.header>
    <x-tabler::cards.body class="text-center py-5">
        <x-tabler::spinner color="primary" class="mb-3" />
        <p class="text-muted mb-0">Fetching latest information...</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Full Page Loading

Full viewport loading overlay:

```blade
<div class="position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center bg-white bg-opacity-75" style="z-index: 9999;">
    <div class="text-center">
        <x-tabler::spinner color="primary" class="mb-3" />
        <p class="text-muted">Loading application...</p>
    </div>
</div>
```

---

### With Custom Styling

Spinner with additional custom classes:

```blade
<x-tabler::spinner color="primary" class="m-4" />
<x-tabler::spinner type="grow" color="danger" class="opacity-75" />
```

---

## Variants

### Type Variants

The component supports two animation types:

**Border Spinner (default):**
```blade
<x-tabler::spinner type="border" color="primary" />
```

**Grow Spinner:**
```blade
<x-tabler::spinner type="grow" color="primary" />
```

---

### Color Variants

Available colors: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`

```blade
<x-tabler::spinner color="primary">Loading...</x-tabler::spinner>
<x-tabler::spinner color="secondary">Processing...</x-tabler::spinner>
<x-tabler::spinner color="success">Saving...</x-tabler::spinner>
<x-tabler::spinner color="danger">Deleting...</x-tabler::spinner>
<x-tabler::spinner color="warning">Warning...</x-tabler::spinner>
<x-tabler::spinner color="info">Fetching...</x-tabler::spinner>
```

---

### Size Variants

Available sizes: default (standard), `sm` (small)

```blade
<x-tabler::spinner>Default size</x-tabler::spinner>
<x-tabler::spinner size="sm">Small size</x-tabler::spinner>
```

Small spinners are ideal for inline use, buttons, and compact spaces.

---

## Accessibility

- **Semantic HTML:** Uses `<div>` with `role="status"` for proper ARIA semantics
- **Screen Readers:** Includes visually hidden text ("Loading..." by default) announced to assistive technologies
- **ARIA Attributes:** `role="status"` indicates a live region that updates dynamically
- **Color Independence:** Animation provides visual feedback independent of color
- **Custom Labels:** Support for context-specific screen reader announcements via default slot

**Best Practices:**
- Always provide meaningful screen reader text that describes what is loading
- Don't rely solely on the spinner—include text labels when possible
- Use appropriate colors to match the action's semantic meaning
- Ensure spinners are visible against their background (sufficient contrast)
- Consider focus management when spinners appear/disappear dynamically

**ARIA Example:**
```blade
{{-- Good: Descriptive label --}}
<x-tabler::spinner color="primary">
    Loading user profile data...
</x-tabler::spinner>

{{-- Acceptable: Default label --}}
<x-tabler::spinner color="primary" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (animations, transforms)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅

**Note:** CSS animations are supported in all modern browsers. The component gracefully degrades in older browsers.

---

## Real-World Examples

### Example 1: Page Loading Indicator

Full page loading state when fetching initial data:

```blade
@if($loading)
    <div class="d-flex justify-content-center align-items-center" style="min-height: 400px;">
        <div class="text-center">
            <x-tabler::spinner color="primary" class="mb-3" />
            <p class="text-muted">Loading dashboard...</p>
        </div>
    </div>
@else
    {{-- Your page content --}}
    <x-tabler::cards.card>
        <x-tabler::cards.body>
            Dashboard content here
        </x-tabler::cards.body>
    </x-tabler::cards.card>
@endif
```

---

### Example 2: Form Submission Loading

Button with spinner during form submission:

```blade
<form method="POST" action="/profile/update" x-data="{ submitting: false }" @submit="submitting = true">
    @csrf

    <x-tabler::forms.input name="name" label="Name" :value="old('name', $user->name)" />
    <x-tabler::forms.input type="email" name="email" label="Email" :value="old('email', $user->email)" />

    <x-tabler::button type="submit" color="primary" x-bind:disabled="submitting">
        <template x-if="submitting">
            <x-tabler::spinner size="sm" color="light" class="me-2" />
        </template>
        <span x-text="submitting ? 'Saving...' : 'Save Changes'">Save Changes</span>
    </x-tabler::button>
</form>
```

---

### Example 3: Inline Data Loading

Loading state for dynamic content sections:

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Recent Activity</x-slot:title>
    </x-tabler::cards.header>
    <x-tabler::cards.body>
        @if($loadingActivities)
            <div class="d-flex align-items-center gap-2 text-muted">
                <x-tabler::spinner size="sm" color="primary" />
                <span>Loading activities...</span>
            </div>
        @else
            <div class="list-group list-group-flush">
                @foreach($activities as $activity)
                    <div class="list-group-item">
                        {{ $activity->description }}
                    </div>
                @endforeach
            </div>
        @endif
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Example 4: AJAX Content Loading

Alpine.js integration for dynamic content loading:

```blade
<div x-data="{ loading: false, content: null }" x-init="
    loading = true;
    fetch('/api/content')
        .then(response => response.json())
        .then(data => { content = data; loading = false; });
">
    <template x-if="loading">
        <div class="text-center py-5">
            <x-tabler::spinner color="primary" />
        </div>
    </template>

    <template x-if="!loading && content">
        <div x-html="content"></div>
    </template>
</div>
```

---

## Troubleshooting

### Common Issues

**Issue: Spinner not visible or appearing cut off**
- ✅ Ensure parent container has sufficient height
- ✅ Check that parent doesn't have `overflow: hidden` cutting off animation
- ✅ Verify Bootstrap 5 CSS is properly loaded
- ✅ Ensure background provides sufficient contrast

**Issue: Spinner color not displaying**
- ✅ Use `color` prop, not manual CSS color classes
- ✅ Verify color name is valid (see Color Variants)
- ✅ Check for conflicting text color styles on parent elements
- ✅ Ensure `text-{color}` utilities are available in your CSS

**Issue: Spinner not animating**
- ✅ Confirm Bootstrap 5 CSS is loaded (contains animation keyframes)
- ✅ Check browser developer tools for CSS errors
- ✅ Verify no CSS is disabling animations globally (`* { animation: none; }`)
- ✅ Test in different browsers to rule out browser-specific issues

**Issue: Spinner too large or too small**
- ✅ Use `size="sm"` prop for smaller spinners
- ✅ Add custom sizing via CSS if needed (e.g., `style="width: 3rem; height: 3rem;"`)
- ✅ Check parent container constraints
- ✅ Use appropriate spinner type for the space available

**Issue: Screen reader not announcing spinner**
- ✅ Ensure `role="status"` is present on the element
- ✅ Verify visually hidden text is not being removed by CSS
- ✅ Provide descriptive text via default slot for context
- ✅ Test with actual screen readers (NVDA, JAWS, VoiceOver)

**Issue: Spinner alignment problems**
- ✅ Use flexbox utilities (`d-flex`, `align-items-center`, `justify-content-center`)
- ✅ Add margin utilities for spacing (`me-2`, `mb-3`, etc.)
- ✅ Check parent element's display and positioning properties
- ✅ Use `d-inline-block` for inline alignment

---

## Performance Considerations

- **Lightweight:** Minimal HTML output (~100-150 bytes)
- **CSS-Only Animation:** No JavaScript required for animation
- **Hardware Accelerated:** CSS transforms are GPU-accelerated on modern browsers
- **No Dependencies:** Only requires Bootstrap 5 CSS

**Best Practices:**
- Remove spinners from DOM when not needed (don't just hide them)
- Use conditional rendering to prevent unnecessary rendering
- Limit the number of simultaneous spinners on a page
- Consider using `v-if`/`x-if` instead of `v-show`/`x-show` for better performance

---

## Notes

- Default spinner type is `border` (rotating circle animation)
- Only `sm` size variant is available; default size is standard
- Grow spinners may appear slightly different across browsers due to animation rendering
- The `role="status"` attribute makes spinners accessible to screen readers
- Visually hidden text defaults to "Loading..." but can be customized via slot
- All color variants use Tabler's color system via `text-{color}` utility classes

---

## Related Components

- [Button](./button.md) - Button component with built-in loading state support
- [Card](./cards/card.md) - Card component for loading state overlays
- [Badge](./badge.md) - Badge component for status indicators

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/spinner.blade.php`

---

## Changelog

- **v1.0.0** - Initial release
