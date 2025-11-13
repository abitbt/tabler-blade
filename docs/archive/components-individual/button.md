# Button

> A versatile button component with smart defaults, icon support, loading states, and multiple style variants.

## Overview

The Button component provides a flexible and feature-rich button implementation for Tabler UI. It automatically renders as either a `<button>` or `<a>` element depending on whether an `href` is provided. The component supports icons, loading states, color variants, sizes, shapes, animations, and accessibility features out of the box.

**Key Features:**
- Automatic element selection (`<button>` or `<a>` tag)
- Leading and trailing icon support
- Loading states with built-in spinner
- 20+ color variants with outline/ghost styles
- Size and shape modifiers
- Icon animations
- Auto-generated ARIA labels for icon-only buttons
- Full accessibility support

**Use Case:** Use buttons for user actions, form submissions, and navigation. Choose between standard buttons for actions and link buttons for navigation.

---

## Basic Usage

```blade
<x-tabler::button>
    Click Me
</x-tabler::button>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `'button'` | Button type: `button`, `submit`, `reset` |
| `href` | `string\|null` | `null` | URL to link to (renders as `<a>` instead of `<button>`) |
| `color` | `string\|null` | `null` | Color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `variant` | `string\|null` | `null` | Style variant: `outline`, `ghost` |
| `size` | `string\|null` | `null` | Size: `sm`, `lg` (default is `md`) |
| `shape` | `string\|null` | `null` | Shape: `square`, `pill` |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `iconEnd` | `string\|null` | `null` | Trailing Tabler icon name (without `tabler-` prefix) |
| `iconOnly` | `bool` | `false` | Icon-only button (no text, adds `btn-icon` class) |
| `loading` | `bool` | `false` | Show loading state with spinner |
| `disabled` | `bool` | `false` | Disable button interaction |
| `animate` | `string\|null` | `null` | Icon animation: `rotate`, `shake`, `pulse`, `tada`, `move-start` |
| `fullWidth` | `bool` | `false` | Make button full width |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Button text/content (ignored if `iconOnly` is true) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Button Styles:**
- `btn-primary`, `btn-secondary`, etc. - Color classes (prefer `color` prop)
- `btn-outline-primary` - Outline variant (prefer `variant="outline"`)
- `btn-ghost-primary` - Ghost variant (prefer `variant="ghost"`)

**Sizes:**
- `btn-sm` - Small button (also via `size="sm"`)
- `btn-lg` - Large button (also via `size="lg"`)
- `btn-icon` - Icon-only button (auto-applied with `iconOnly`)

**Shapes:**
- `btn-square` - Square button (also via `shape="square"`)
- `btn-pill` - Pill-shaped button (also via `shape="pill"`)

**States:**
- `active` - Active state
- `disabled` - Disabled state (prefer `disabled` prop)

**Layout:**
- `w-100` - Full width (also via `fullWidth` prop)
- `btn-list` - Spacing for button groups (use on parent)

---

## Examples

### Basic Example

```blade
<x-tabler::button>
    Click Me
</x-tabler::button>
```

**Output:** A default button with no color styling

---

### With Color

```blade
<x-tabler::button color="primary">
    Primary Button
</x-tabler::button>

<x-tabler::button color="success">
    Success Button
</x-tabler::button>

<x-tabler::button color="danger">
    Danger Button
</x-tabler::button>
```

---

### With Icons

```blade
{{-- Leading icon --}}
<x-tabler::button icon="plus" color="primary">
    Add New
</x-tabler::button>

{{-- Trailing icon --}}
<x-tabler::button icon-end="arrow-right" color="primary">
    Next Step
</x-tabler::button>

{{-- Both icons --}}
<x-tabler::button icon="download" icon-end="arrow-down" color="success">
    Download File
</x-tabler::button>
```

---

### Icon-Only Button

```blade
<x-tabler::button icon="search" icon-only aria-label="Search" />

<x-tabler::button icon="trash" icon-only color="danger" aria-label="Delete" />

<x-tabler::button icon="edit" icon-only color="warning" aria-label="Edit" />
```

**Note:** When using `iconOnly`, an `aria-label` is auto-generated if not provided.

---

### Link Button

Providing an `href` renders the button as an `<a>` element:

```blade
<x-tabler::button href="/dashboard" color="primary">
    Go to Dashboard
</x-tabler::button>

<x-tabler::button href="https://example.com" target="_blank" color="secondary">
    External Link
</x-tabler::button>
```

---

### Loading State

```blade
<x-tabler::button loading color="primary">
    Processing...
</x-tabler::button>

<x-tabler::button loading color="success" icon="check">
    Saving Changes
</x-tabler::button>
```

---

### Disabled State

```blade
<x-tabler::button disabled>
    Disabled Button
</x-tabler::button>

<x-tabler::button href="/link" disabled color="primary">
    Disabled Link
</x-tabler::button>
```

---

### Submit Button

```blade
<form method="POST" action="/submit">
    @csrf
    <x-tabler::button type="submit" color="primary">
        Submit Form
    </x-tabler::button>
</form>
```

---

### With Shape

```blade
<x-tabler::button shape="square" icon="plus" icon-only />

<x-tabler::button shape="pill" color="primary">
    Pill Button
</x-tabler::button>
```

---

### With Animation

```blade
<x-tabler::button icon="refresh" animate="rotate" color="primary">
    Refresh
</x-tabler::button>

<x-tabler::button icon="bell" animate="shake" color="warning">
    Notifications
</x-tabler::button>

<x-tabler::button icon="heart" animate="pulse" color="danger">
    Like
</x-tabler::button>
```

---

### Complete Example

```blade
<x-tabler::button
    type="submit"
    color="primary"
    size="lg"
    icon="check"
    animate="pulse"
    full-width
    id="submit-btn"
    data-action="save">
    Save Changes
</x-tabler::button>
```

---

## Variants

### Color Variants

Available colors: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

```blade
<x-tabler::button color="primary">Primary</x-tabler::button>
<x-tabler::button color="secondary">Secondary</x-tabler::button>
<x-tabler::button color="success">Success</x-tabler::button>
<x-tabler::button color="danger">Danger</x-tabler::button>
<x-tabler::button color="warning">Warning</x-tabler::button>
<x-tabler::button color="info">Info</x-tabler::button>
<x-tabler::button color="light">Light</x-tabler::button>
<x-tabler::button color="dark">Dark</x-tabler::button>
```

---

### Style Variants

**Outline:**
```blade
<x-tabler::button color="primary" variant="outline">Outline</x-tabler::button>
<x-tabler::button color="danger" variant="outline">Outline Danger</x-tabler::button>
```

**Ghost:**
```blade
<x-tabler::button color="primary" variant="ghost">Ghost</x-tabler::button>
<x-tabler::button color="success" variant="ghost">Ghost Success</x-tabler::button>
```

**Link/Text Button (via class):**
```blade
<x-tabler::button class="btn-link">Text Button</x-tabler::button>
```

**Action Button (minimal style via class):**
```blade
<x-tabler::button class="btn-action" icon="dots-vertical" icon-only />
```

---

### Size Variants

Available sizes: `sm`, `md` (default), `lg`

```blade
<x-tabler::button size="sm">Small</x-tabler::button>
<x-tabler::button>Medium (default)</x-tabler::button>
<x-tabler::button size="lg">Large</x-tabler::button>
```

**Icon-only size variants:**
```blade
<x-tabler::button icon="star" icon-only size="sm" />
<x-tabler::button icon="star" icon-only />
<x-tabler::button icon="star" icon-only size="lg" />
```

---

### Shape Variants

```blade
<x-tabler::button shape="square" icon="plus" icon-only />
<x-tabler::button shape="pill" color="primary">Pill Button</x-tabler::button>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to/from button
- **Space/Enter:** Activates button
- **Disabled buttons:** Not focusable via keyboard

### ARIA Attributes
- `aria-label`: Auto-generated for icon-only buttons from icon name (e.g., `icon="star"` → `aria-label="Star"`)
- `aria-disabled`: Applied to disabled link buttons
- `role="button"`: Applied to `<a>` elements with href prop

### Screen Reader Support
- Buttons announced as "button" or "submit button" based on type
- Link buttons announced as "button link"
- Disabled state announced as "dimmed" or "unavailable"
- Icon-only buttons include descriptive label

### Best Practices
- Always provide explicit `aria-label` for icon-only buttons when auto-generated label isn't descriptive enough
- Use semantic button type (`submit` vs `button`) appropriately
- Don't use disabled links; use disabled button instead
- Ensure 4.5:1 contrast ratio for custom colors

**Example:**
```blade
{{-- Auto-generates aria-label="Search" --}}
<x-tabler::button icon="search" icon-only />

{{-- Custom aria-label for better context --}}
<x-tabler::button icon="search" icon-only aria-label="Search products and categories" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for styling)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon props
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Loading spinner may not animate smoothly in Safari < 14
- Icon alignment may be slightly off in Firefox < 88

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::button wire:click="save" :loading="$submitting">
    Save Changes
</x-tabler::button>

<x-tabler::button wire:click="delete" wire:confirm="Are you sure?">
    Delete
</x-tabler::button>
```

**Alpine.js:**
```blade
<x-tabler::button @click="open = true" color="primary">
    Open Panel
</x-tabler::button>

<x-tabler::button @click="$dispatch('custom-event')">
    Trigger Event
</x-tabler::button>
```

**Inertia.js:**
```blade
<x-tabler::button href="{{ route('dashboard') }}" color="primary">
    Dashboard
</x-tabler::button>
```

---

## Troubleshooting

### Common Issues

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Attributes not merging**
- ❌ Wrong: `<x-tabler::button class="btn btn-primary">Click</x-tabler::button>`
- ✅ Right: `<x-tabler::button color="primary" class="extra-class">Click</x-tabler::button>`
- Note: Use `color` prop instead of `btn-primary` class

**Issue: iconOnly not working with btn-action**
- ❌ Wrong: `<x-tabler::button iconOnly class="btn-action" icon="edit" />`
- ✅ Right: `<x-tabler::button class="btn-action" icon="edit" aria-label="Edit" />`
- Note: `btn-action` conflicts with `iconOnly` prop. Use class-only approach for action buttons.

**Issue: Link button shows hand cursor but doesn't navigate**
- ✅ Check `href` attribute is set and valid
- ✅ Disabled link buttons prevent navigation by design
- ✅ Check JavaScript isn't preventing default behavior

**Issue: Loading state not showing**
- ✅ Set `loading="true"` or `:loading="$variable"`
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check spinner isn't hidden by custom CSS

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if element renders as `<button>` or `<a>`
- Verify classes are applied correctly
- Test with minimal example first
- Clear view cache if changes don't appear

---

## Real-World Examples

### Example 1: Form Actions (Save/Cancel)

```blade
<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    {{-- Form fields --}}

    <div class="btn-list">
        <x-tabler::button
            type="submit"
            color="primary"
            :loading="$submitting">
            Save Changes
        </x-tabler::button>
        <x-tabler::button
            type="button"
            variant="outline"
            onclick="history.back()">
            Cancel
        </x-tabler::button>
    </div>
</form>
```

**Use Case:** Standard form submission with save and cancel actions

---

### Example 2: Data Table Row Actions

```blade
<td class="text-end">
    <div class="btn-list">
        <x-tabler::button
            href="{{ route('users.edit', $user) }}"
            class="btn-action"
            icon="edit"
            aria-label="Edit {{ $user->name }}" />
        <x-tabler::button
            class="btn-action"
            icon="trash"
            data-bs-toggle="modal"
            data-bs-target="#delete-{{ $user->id }}"
            aria-label="Delete {{ $user->name }}" />
    </div>
</td>
```

**Use Case:** Compact action buttons in data tables

---

### Example 3: Modal Trigger Button

```blade
<x-tabler::button
    color="primary"
    icon="plus"
    data-bs-toggle="modal"
    data-bs-target="#createModal">
    Create New Item
</x-tabler::button>

<x-tabler::modals.modal id="createModal">
    {{-- Modal content --}}
</x-tabler::modals.modal>
```

**Use Case:** Opening modals with Bootstrap data attributes

---

## Button Groups & Lists

Wrap multiple buttons in a container for proper spacing:

```blade
<div class="btn-list">
    <x-tabler::button color="primary">Save</x-tabler::button>
    <x-tabler::button variant="outline">Cancel</x-tabler::button>
    <x-tabler::button color="danger" variant="outline">Delete</x-tabler::button>
</div>
```

---

## Available Classes

Additional CSS classes you can use via the `class` attribute:

**Button Styles:**
- `btn-link` - Text button style (no background)
- `btn-action` - Minimal action button (for icons)
- `btn-floating` - Floating action button

**Icon Sizes (for icon-only buttons):**
- `btn-icon-sm` - Small icon button
- `btn-icon-lg` - Large icon button

**Layout:**
- `w-100` - Full width (also via `fullWidth` prop)
- `w-auto` - Auto width

**Shadow:**
- `shadow-sm` - Small shadow
- `shadow` - Default shadow
- `shadow-lg` - Large shadow

**Spacing (in button groups):**
- `me-2`, `ms-2` - Margin end/start
- `mb-2`, `mt-2` - Margin bottom/top

**Example:**
```blade
<x-tabler::button color="primary" class="shadow-lg me-2">
    Elevated Button
</x-tabler::button>
```

---

## Performance Considerations

### Component Weight
- Base button: ~50-100 bytes rendered
- With icons: +2KB per icon (SVG)
- With loading state: +500 bytes (spinner)

### Best Practices
- Use icon-only buttons sparingly (accessibility consideration)
- Minimize number of different icon animations on one page
- Preload frequently used icons
- Use `btn-action` class for compact table actions

### Optimization Tips
- Batch render multiple buttons
- Cache icon SVGs with proper headers
- Use CSS classes directly for repeated button patterns
- Consider using Livewire wire:loading for loading states

---

## Notes

### btn-action vs btn-icon

- Use `iconOnly` prop for regular icon-only buttons (adds `btn-icon` class)
- Use `class="btn-action"` for minimal action buttons (no `iconOnly` prop needed)
- **Don't combine** `iconOnly` prop with `btn-action` class - they conflict

```blade
{{-- Regular icon button (use iconOnly) --}}
<x-tabler::button icon="star" icon-only />

{{-- Action button (use btn-action class) --}}
<x-tabler::button class="btn-action" icon="dots-vertical" icon-only />
```

### Link vs Button

The component intelligently chooses the HTML element:
- Provides `href` → renders `<a>` tag with `role="button"`
- No `href` → renders `<button>` tag

### Icon Animations

Available animations: `rotate`, `shake`, `pulse`, `tada`, `move-start`

Animation applies to the icon, not the button itself.

---

## Related Components

- [Badge](./badge.md) - For small count indicators on buttons
- [Spinner](./spinner.md) - Loading spinner used in loading state (pending)
- [Dropdown](./dropdowns/dropdown.md) - Dropdown menus triggered by buttons
- [Modal](./modals/modal.md) - Modals opened by buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/button.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with full button functionality
