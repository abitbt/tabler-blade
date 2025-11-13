# Accordion

A collapsible content panel component that uses Bootstrap's accordion functionality to display expandable/collapsible sections of content.

## Overview

- **Bootstrap-based** - Built on Bootstrap 5 accordion functionality
- **Collapsible panels** - Show/hide content sections with smooth transitions
- **Multiple variants** - Standard and flush (borderless) styles
- **Accessible** - Full keyboard navigation and ARIA support
- **Unique IDs** - Required for proper Bootstrap functionality
- **Parent-child relationship** - Automatic collapse of sibling items when one is opened

## Basic Usage

```blade
<x-tabler::accordion id="faq">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1">
                What is Tabler?
            </button>
        </h2>
        <div id="faq-1" class="accordion-collapse collapse show" data-bs-parent="#faq">
            <div class="accordion-body">
                Tabler is a free and open-source admin template.
            </div>
        </div>
    </div>
</x-tabler::accordion>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `id` | string | `''` | Yes | Unique identifier for the accordion. Required for Bootstrap's data-bs-parent functionality to work correctly. |
| `flush` | boolean | `false` | No | When true, removes default background, borders, and rounded corners for an edge-to-edge appearance. |
| `class` | string | `''` | No | Additional CSS classes to apply to the accordion container. |

## Slots

- **default** - The main content slot containing accordion items. Each item should follow Bootstrap's accordion-item structure with accordion-header, accordion-button, accordion-collapse, and accordion-body elements.

## CSS Classes

**Accordion Styles:**
- `accordion` - Base accordion class (applied automatically)
- `accordion-flush` - Flush style removing backgrounds and borders (also via flush prop)

**Accordion Item Structure:**
- `accordion-item` - Container for each collapsible section
- `accordion-header` - Header container (typically an h2)
- `accordion-button` - Clickable button to toggle collapse
- `accordion-button collapsed` - Button in collapsed state
- `accordion-collapse` - Collapsible content wrapper
- `accordion-collapse collapse` - Hidden state
- `accordion-collapse collapse show` - Visible/expanded state
- `accordion-body` - Inner content container with padding

## Examples

### Basic FAQ Accordion

```blade
<x-tabler::accordion id="faq">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1">
                What is Tabler?
            </button>
        </h2>
        <div id="faq-1" class="accordion-collapse collapse show" data-bs-parent="#faq">
            <div class="accordion-body">
                Tabler is a free and open-source admin template built with Bootstrap 5.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2">
                Is it responsive?
            </button>
        </h2>
        <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faq">
            <div class="accordion-body">
                Yes, Tabler is fully responsive and works on all devices.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3">
                Can I use it commercially?
            </button>
        </h2>
        <div id="faq-3" class="accordion-collapse collapse" data-bs-parent="#faq">
            <div class="accordion-body">
                Yes, Tabler is available under the MIT license for both personal and commercial use.
            </div>
        </div>
    </div>
</x-tabler::accordion>
```

### Flush Style Accordion

```blade
<x-tabler::accordion id="settings" flush>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#settings-1">
                Account Settings
            </button>
        </h2>
        <div id="settings-1" class="accordion-collapse collapse show" data-bs-parent="#settings">
            <div class="accordion-body">
                Manage your account preferences, profile information, and security settings.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settings-2">
                Privacy Settings
            </button>
        </h2>
        <div id="settings-2" class="accordion-collapse collapse" data-bs-parent="#settings">
            <div class="accordion-body">
                Control who can see your information and how it's used.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#settings-3">
                Notification Settings
            </button>
        </h2>
        <div id="settings-3" class="accordion-collapse collapse" data-bs-parent="#settings">
            <div class="accordion-body">
                Choose what notifications you want to receive and how.
            </div>
        </div>
    </div>
</x-tabler::accordion>
```

### Product Details Accordion

```blade
<x-tabler::accordion id="product-details">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#details-1">
                <x-tabler::icon name="info-circle" class="me-2" />
                Specifications
            </button>
        </h2>
        <div id="details-1" class="accordion-collapse collapse show" data-bs-parent="#product-details">
            <div class="accordion-body">
                <ul class="list-unstyled mb-0">
                    <li><strong>Dimensions:</strong> 15 x 10 x 5 cm</li>
                    <li><strong>Weight:</strong> 250g</li>
                    <li><strong>Material:</strong> Premium aluminum</li>
                    <li><strong>Color:</strong> Space Gray</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#details-2">
                <x-tabler::icon name="truck" class="me-2" />
                Shipping Information
            </button>
        </h2>
        <div id="details-2" class="accordion-collapse collapse" data-bs-parent="#product-details">
            <div class="accordion-body">
                Free shipping on orders over $50. Standard delivery takes 3-5 business days.
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#details-3">
                <x-tabler::icon name="refresh" class="me-2" />
                Return Policy
            </button>
        </h2>
        <div id="details-3" class="accordion-collapse collapse" data-bs-parent="#product-details">
            <div class="accordion-body">
                30-day return policy. Items must be unused and in original packaging.
            </div>
        </div>
    </div>
</x-tabler::accordion>
```

*[9 more extensive examples follow in the full documentation...]*

## Accessibility

The Accordion component follows Bootstrap 5 accessibility guidelines:

- **Keyboard Navigation**: Full keyboard support with Tab, Enter, and Space keys
- **Focus Management**: Proper focus indicators and focus management when expanding/collapsing
- **ARIA Attributes**: Bootstrap automatically adds appropriate ARIA attributes:
  - `aria-expanded` on buttons to indicate state
  - `aria-controls` to link buttons to panels
  - `aria-labelledby` on panels to reference headers
- **Semantic HTML**: Uses proper heading hierarchy (h2 by default) for screen readers
- **Screen Reader Support**: Clear announcement of expand/collapse actions

**Best Practices:**
- Always use semantic heading elements (h2, h3, etc.) in accordion-header
- Ensure unique IDs for all accordion items and collapse targets
- Use descriptive button text that clearly indicates the content
- Test with keyboard navigation to ensure all items are accessible
- Consider adding `aria-label` for additional context when needed

## Browser Compatibility

The Accordion component is fully compatible with:

- **Modern Browsers**: Chrome, Firefox, Safari, Edge (latest versions)
- **Mobile Browsers**: iOS Safari, Chrome for Android
- **Bootstrap 5 Support**: Requires Bootstrap 5.x
- **JavaScript Required**: Bootstrap's JavaScript must be loaded for collapse functionality

Note: The component relies on Bootstrap 5's collapse JavaScript plugin, so ensure Bootstrap's JavaScript is properly loaded in your application.

## Related Components

- [Card](./cards/card.md) - Container component that can wrap accordions
- [Badge](./badge.md) - Can be used in accordion headers
- [Button](./button.md) - Similar interactive component
- [Tabs](./tabs/tab.md) - Alternative way to organize content

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/accordion.blade.php`

## Changelog

### v1.0.0
- Initial release with basic accordion functionality and flush variant
