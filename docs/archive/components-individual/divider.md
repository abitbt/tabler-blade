# Divider

> Horizontal rule / separator component for dividing content sections with optional text labels.

## Overview

The Divider component provides a flexible way to visually separate content sections in your application. It supports basic horizontal rules (`<hr>` elements) as well as dividers with text labels. Use dividers to improve content readability, separate form sections, distinguish between list items, or create visual breaks in long content.

---

## Basic Usage

```blade
<x-tabler::divider />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string\|null` | `null` | Text color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `muted` |
| `dashed` | `bool` | `false` | Use dashed line style instead of solid |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root element (`<hr>` or `<div>` depending on slot content).

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Optional text label displayed on the divider line |

**Note:** When the default slot contains content, the component automatically renders as a `<div>` with the `hr-text` class instead of an `<hr>` element.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Text Position:**
- `hr-text-left` - Left-aligned text label
- `hr-text-right` - Right-aligned text label
- `hr-text-center` - Center-aligned text label (default when using slot)

**Line Styles:**
- `border-dashed` - Dashed line (also via `dashed` prop)
- `border-dotted` - Dotted line style

**Colors:**
- `text-{color}` - Color the divider text (e.g., `text-primary`, `text-danger`)
- `border-{color}` - Color the divider line (e.g., `border-primary`, `border-muted`)

**Spacing:**
- `my-2`, `my-3`, `my-4` - Vertical margin utilities
- `mx-0` - Remove horizontal margins

---

## Examples

### Basic Divider

```blade
<p>Content above the divider</p>

<x-tabler::divider />

<p>Content below the divider</p>
```

---

### Divider with Text

```blade
<x-tabler::divider>OR</x-tabler::divider>
```

---

### Divider with Icon

```blade
<x-tabler::divider>
    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
        <path d="M12 5l0 14" />
        <path d="M5 12l14 0" />
    </svg>
</x-tabler::divider>
```

---

### Left-Aligned Text

```blade
<x-tabler::divider class="hr-text-left">
    Section Title
</x-tabler::divider>
```

---

### Right-Aligned Text

```blade
<x-tabler::divider class="hr-text-right">
    More Options
</x-tabler::divider>
```

---

### Dashed Divider

```blade
<x-tabler::divider dashed />
```

---

### Dashed with Text

```blade
<x-tabler::divider dashed>
    Continue Reading
</x-tabler::divider>
```

---

### Colored Divider Text

```blade
<x-tabler::divider color="primary">
    Premium Content
</x-tabler::divider>

<x-tabler::divider color="danger">
    Important Notice
</x-tabler::divider>

<x-tabler::divider color="muted">
    Optional Section
</x-tabler::divider>
```

---

### Colored Divider Line

```blade
<x-tabler::divider class="border-primary" />

<x-tabler::divider class="border-danger" />
```

---

### Dotted Line Style

```blade
<x-tabler::divider class="border-dotted" />

<x-tabler::divider class="border-dotted">
    Optional
</x-tabler::divider>
```

---

### With Custom Spacing

```blade
<x-tabler::divider class="my-5">
    Large Spacing
</x-tabler::divider>

<x-tabler::divider class="my-2">
    Compact Spacing
</x-tabler::divider>
```

---

### In Cards

```blade
<x-tabler::card>
    <x-tabler::card-body>
        <h3 class="card-title">User Profile</h3>
        <p>Basic information about the user.</p>

        <x-tabler::divider class="my-3" />

        <h4>Contact Details</h4>
        <p>Email and phone information.</p>
    </x-tabler::card-body>
</x-tabler::card>
```

---

### In Modals

```blade
<x-tabler::modal title="Settings">
    <div class="mb-3">
        <label class="form-label">Account Settings</label>
        <input type="text" class="form-control" />
    </div>

    <x-tabler::divider>Privacy</x-tabler::divider>

    <div class="mb-3">
        <label class="form-check">
            <input type="checkbox" class="form-check-input" />
            <span class="form-check-label">Make profile public</span>
        </label>
    </div>
</x-tabler::modal>
```

---

### In Forms

```blade
<form>
    <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" />
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" />
    </div>

    <x-tabler::divider class="hr-text-left">
        Optional Information
    </x-tabler::divider>

    <div class="mb-3">
        <label class="form-label">Company</label>
        <input type="text" class="form-control" />
    </div>

    <div class="mb-3">
        <label class="form-label">Website</label>
        <input type="url" class="form-control" />
    </div>
</form>
```

---

## Accessibility

- **Semantic HTML:** Uses native `<hr>` element for dividers without text, ensuring proper semantic meaning
- **Role Attributes:** The `<hr>` element has an implicit `separator` role, properly announced by screen readers
- **Visual vs Semantic:** Dividers provide both visual separation and semantic document structure breaks
- **Text Labels:** When text is included, screen readers announce the label within the separator context
- **Color Independence:** Don't rely solely on divider color to convey meaning; use text labels when important

**Best Practices:**
- Use dividers to create logical content breaks that improve document structure
- Provide text labels for dividers that separate important sections
- Ensure divider text has sufficient color contrast (4.5:1 minimum)
- Don't overuse dividers; too many can fragment content unnecessarily
- Consider using heading elements instead of dividers when introducing new sections

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (Flexbox, Border styles)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅

---

## Troubleshooting

### Common Issues

**Issue: Divider not visible**
- ✅ Check parent container background color doesn't match divider color
- ✅ Ensure Bootstrap 5 CSS is properly loaded
- ✅ Verify no `display: none` or `visibility: hidden` styles are applied
- ✅ Check z-index stacking context issues

**Issue: Text label not displaying correctly**
- ✅ Ensure slot content is not empty (even whitespace counts)
- ✅ Verify parent container has adequate width for text label
- ✅ Check for conflicting `hr-text` styles in custom CSS
- ✅ Confirm text color has sufficient contrast

**Issue: Dashed/dotted style not showing**
- ✅ Some browsers require minimum border width for dashed/dotted styles
- ✅ Check for CSS overrides on `border-style`
- ✅ Verify `border-dashed` or `border-dotted` class is applied correctly

**Issue: Divider line breaking in unexpected places**
- ✅ Ensure parent container has defined width
- ✅ Check for floated elements affecting layout
- ✅ Verify flexbox/grid container properties aren't interfering

---

## Real-World Examples

### Form Section Separators

```blade
<form>
    {{-- Personal Information --}}
    <div class="mb-3">
        <label class="form-label">First Name</label>
        <input type="text" class="form-control" />
    </div>
    <div class="mb-3">
        <label class="form-label">Last Name</label>
        <input type="text" class="form-control" />
    </div>

    <x-tabler::divider class="hr-text-left my-4">
        Contact Information
    </x-tabler::divider>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" />
    </div>
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="tel" class="form-control" />
    </div>

    <x-tabler::divider class="hr-text-left my-4">
        Address
    </x-tabler::divider>

    <div class="mb-3">
        <label class="form-label">Street</label>
        <input type="text" class="form-control" />
    </div>
    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" class="form-control" />
    </div>
</form>
```

---

### Content Separation in Articles

```blade
<article class="card">
    <div class="card-body">
        <h2 class="card-title">Article Title</h2>
        <p class="text-muted">Published on January 15, 2025</p>

        <x-tabler::divider class="my-3" />

        <p>Article introduction and first paragraph...</p>
        <p>More content here...</p>

        <x-tabler::divider dashed class="my-4">
            <span class="text-muted">Advertisement</span>
        </x-tabler::divider>

        <div class="bg-light p-3 text-center">
            [Ad content]
        </div>

        <x-tabler::divider dashed class="my-4" />

        <p>Continuing the article content...</p>
        <p>More paragraphs...</p>

        <x-tabler::divider class="my-4" />

        <div class="d-flex align-items-center">
            <strong>Share:</strong>
            <div class="ms-2">
                <a href="#" class="btn btn-icon btn-sm">Share on Twitter</a>
                <a href="#" class="btn btn-icon btn-sm">Share on Facebook</a>
            </div>
        </div>
    </div>
</article>
```

---

### Settings Panel Sections

```blade
<x-tabler::card>
    <x-tabler::card-header>
        <h3 class="card-title">Account Settings</h3>
    </x-tabler::card-header>
    <x-tabler::card-body>
        <h4>Profile</h4>
        <div class="mb-3">
            <label class="form-label">Display Name</label>
            <input type="text" class="form-control" value="John Doe" />
        </div>
        <div class="mb-3">
            <label class="form-label">Bio</label>
            <textarea class="form-control" rows="3"></textarea>
        </div>

        <x-tabler::divider class="my-4" />

        <h4>Privacy</h4>
        <label class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" checked />
            <span class="form-check-label">Show profile publicly</span>
        </label>
        <label class="form-check form-switch mb-2">
            <input class="form-check-input" type="checkbox" />
            <span class="form-check-label">Allow search engines to index profile</span>
        </label>

        <x-tabler::divider class="my-4" />

        <h4 class="text-danger">Danger Zone</h4>
        <p class="text-muted">Irreversible actions that affect your account.</p>
        <button class="btn btn-danger">Delete Account</button>
    </x-tabler::card-body>
</x-tabler::card>
```

---

### List Item Separation

```blade
<div class="list-group">
    <div class="list-group-item">
        <div class="d-flex align-items-center">
            <div class="flex-fill">
                <strong>Notification Title</strong>
                <div class="text-muted">Description of the notification</div>
            </div>
            <span class="badge bg-primary">New</span>
        </div>
    </div>

    <x-tabler::divider class="my-0" />

    <div class="list-group-item">
        <div class="d-flex align-items-center">
            <div class="flex-fill">
                <strong>Another Notification</strong>
                <div class="text-muted">More information here</div>
            </div>
            <span class="text-muted">2 hours ago</span>
        </div>
    </div>

    <x-tabler::divider class="my-0" />

    <div class="list-group-item">
        <div class="d-flex align-items-center">
            <div class="flex-fill">
                <strong>Older Notification</strong>
                <div class="text-muted">Additional details</div>
            </div>
            <span class="text-muted">1 day ago</span>
        </div>
    </div>
</div>
```

---

## Performance

- **Minimal Overhead:** Renders a single `<hr>` or `<div>` element
- **No JavaScript:** Pure CSS implementation
- **Lightweight:** ~50-100 bytes of HTML output
- **No Re-renders:** Static component with no reactive state
- **Efficient Rendering:** Uses conditional rendering to choose optimal element type

**Performance Tips:**
- Use basic dividers without text when possible (renders as native `<hr>`)
- Avoid excessive dividers in long lists; consider alternative visual grouping
- Combine with proper semantic HTML structure for optimal accessibility

---

## Notes

- When slot content is provided, the component renders a `<div class="hr-text">` instead of `<hr>`
- The `hr-text` class creates a divider line with centered text overlay
- Color prop only affects text color; use `border-{color}` class for line color
- Dashed and dotted styles require adequate border width to display properly
- Dividers automatically span the full width of their container
- Compatible with all Bootstrap 5 utility classes

---

## Related Components

- [Card](./card.md) - Container component often used with dividers to separate sections
- [Modal](./modal.md) - Dialog component that can use dividers to separate content areas
- [Alert](./alert.md) - Notification component that may appear between divider-separated sections

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/divider.blade.php`

---

## Changelog

- **v1.0.0** - Initial release
