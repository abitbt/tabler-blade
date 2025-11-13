# Modals

> Dialog overlay system for displaying content, forms, alerts, and prompts with full Bootstrap 5 integration and keyboard accessibility.

## Overview

The Modal component family provides a comprehensive modal dialog system for displaying overlaid content, confirmation dialogs, forms, and alerts. Modals capture user attention by presenting content in a layer above the main page, requiring interaction before returning to the underlying page.

**What problems do modals solve:**
- Capturing user attention for important actions
- Confirming destructive or critical operations
- Collecting user input without page navigation
- Displaying detailed content without leaving current context
- Showing alerts and notifications
- Creating focused workflows

**Common use cases:**
- Confirmation dialogs (delete, submit, cancel)
- Forms (create, edit, quick actions)
- Image/video lightboxes
- Alert and success messages
- Multi-step wizards
- Terms acceptance and disclaimers
- Quick view and preview
- Login and registration

**How they work together:**
The modal system consists of a main container component and 5 specialized sub-components. The container manages visibility, backdrop, and positioning, while sub-components provide structure (header, body, footer) and features (close button, status indicator).

**Components in this group:**
- **Modal** - Main dialog container (required)
- **Header** - Title and close button section
- **Body** - Primary content area
- **Footer** - Action buttons section
- **Close** - Standalone close button
- **Status** - Colored status indicator bar

---

## Quick Start

The most common use case to get started quickly:

```blade
<x-tabler::modals.modal id="exampleModal">
    <x-tabler::modals.header title="Modal Title" />

    <x-tabler::modals.body>
        Your content goes here.
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
        <x-tabler::button color="primary">Save changes</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>

{{-- Trigger button --}}
<x-tabler::button data-bs-toggle="modal" data-bs-target="#exampleModal">
    Open Modal
</x-tabler::button>
```

**Installation**: No additional installation needed - included with tabler-blade package. Requires Bootstrap 5 JavaScript.

---

## Component Comparison

Choose the right component for your needs:

| Component | Best For | Key Features | When to Use |
|-----------|----------|--------------|-------------|
| Modal | All modals (required) | Container, sizes, backdrop, scrollable | Every modal needs this base component |
| Header | Titled modals | Title display, built-in close button | Modals with clear headings |
| Body | Content area | Flexible content, scrollable support | Primary content (most modals) |
| Footer | Action buttons | Button container, alignment options | Modals with bottom actions |
| Close | Alternative close | Standalone close button, custom positioning | Alert modals, custom layouts |
| Status | Visual status | Colored bar indicator | Alert/notification modals |

**Quick Decision Tree:**
- Need a dialog? → Use **Modal** (required for all modals)
- Need a title? → Add **Header**
- Need main content? → Add **Body** (most common)
- Need action buttons? → Add **Footer**
- Need custom close button? → Add **Close**
- Need status indicator? → Add **Status**

---

## Table of Contents

**Components:**
- [Modal](#modal) - Main container (required)
- [Header](#header) - Title and close button
- [Body](#body) - Content area
- [Footer](#footer) - Action buttons
- [Close](#close) - Standalone close button
- [Status](#status) - Status indicator

**Shared Features:**
- [Modal Sizes](#modal-sizes)
- [Backdrop Options](#backdrop-options)
- [Scrollable Content](#scrollable-content)
- [Vertical Centering](#vertical-centering)
- [Bootstrap Events](#bootstrap-events)

**Advanced:**
- [Complete Examples](#complete-examples)
- [Composition Patterns](#composition-patterns)
- [Programmatic Control](#programmatic-control)
- [Laravel Integration](#laravel-integration)
- [Accessibility](#accessibility)
- [Best Practices](#best-practices)

---

## Modal {#modal}

The main modal container component - required for all modals.

### Basic Usage

```blade
<x-tabler::modals.modal id="basicModal">
    <x-tabler::modals.body>
        Simple modal content
    </x-tabler::modals.body>
</x-tabler::modals.modal>

<x-tabler::button data-bs-toggle="modal" data-bs-target="#basicModal">
    Open
</x-tabler::button>
```

**Output:** Renders a centered modal dialog with backdrop and blur effect.

---

### Examples

#### Standard Modal

```blade
<x-tabler::modals.modal id="standardModal">
    <x-tabler::modals.header title="Standard Modal" />

    <x-tabler::modals.body>
        <p>This is a standard modal with header, body, and footer.</p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

#### Small Modal

```blade
<x-tabler::modals.modal id="smallModal" size="sm">
    <x-tabler::modals.header title="Confirm" />

    <x-tabler::modals.body>
        Are you sure you want to proceed?
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Cancel</x-tabler::button>
        <x-tabler::button color="primary">Confirm</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

#### Large Modal

```blade
<x-tabler::modals.modal id="largeModal" size="lg">
    <x-tabler::modals.header title="Large Modal" />

    <x-tabler::modals.body>
        <div class="row">
            <div class="col-md-6">
                Left column content
            </div>
            <div class="col-md-6">
                Right column content
            </div>
        </div>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Extra Large Modal

```blade
<x-tabler::modals.modal id="xlModal" size="xl">
    <x-tabler::modals.header title="Extra Large Modal" />

    <x-tabler::modals.body>
        <p>Wide modal with plenty of space for complex layouts.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Fullscreen Modal

```blade
<x-tabler::modals.modal id="fullscreenModal" size="fullscreen">
    <x-tabler::modals.header title="Fullscreen Modal" />

    <x-tabler::modals.body>
        <p>This modal takes up the entire screen.</p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

#### Scrollable Modal

```blade
<x-tabler::modals.modal id="scrollableModal" scrollable>
    <x-tabler::modals.header title="Long Content" />

    <x-tabler::modals.body>
        <p>Long content that will scroll...</p>
        <p>More content...</p>
        <!-- Many more paragraphs -->
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**Note:** Scrollable modals have a fixed height and scroll the body content independently.

---

#### Static Backdrop Modal

```blade
<x-tabler::modals.modal id="staticModal" static>
    <x-tabler::modals.header title="Required Action" />

    <x-tabler::modals.body>
        You must complete this action before continuing.
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button color="primary" data-bs-dismiss="modal">
            Complete
        </x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**Note:** Static backdrop prevents closing by clicking outside the modal or pressing ESC.

---

#### Top-Aligned Modal

```blade
<x-tabler::modals.modal id="topModal" :centered="false">
    <x-tabler::modals.header title="Top Aligned" />

    <x-tabler::modals.body>
        This modal appears at the top of the viewport.
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string` | **required** | Unique modal ID (required for Bootstrap `data-bs-target`) |
| `size` | `string\|null` | `null` | Modal size: `sm` (300px), `lg` (800px), `xl` (1140px), `fullscreen` |
| `scrollable` | `bool` | `false` | Enable scrollable modal body with fixed height |
| `centered` | `bool` | `true` | Center modal vertically in viewport |
| `blur` | `bool` | `true` | Apply blur effect to backdrop |
| `static` | `bool` | `false` | Prevent closing on backdrop click (requires explicit close action) |
| `class` | `string` | `''` | Additional CSS classes for modal dialog |

**Note:** The `id` prop is **required** and must match the `data-bs-target` attribute on trigger buttons.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Modal content (typically header, body, footer sub-components) |

---

### CSS Classes

**Modal Sizes:**
- `modal-sm` - Small modal (300px, also via `size="sm"`)
- `modal-lg` - Large modal (800px, also via `size="lg"`)
- `modal-xl` - Extra large modal (1140px, also via `size="xl"`)
- `modal-fullscreen` - Full screen modal (also via `size="fullscreen"`)
- `modal-fullscreen-sm-down` - Full screen below small breakpoint

**Dialog Options:**
- `modal-dialog-centered` - Vertically center (auto-applied with `centered` prop)
- `modal-dialog-scrollable` - Scrollable body (auto-applied with `scrollable` prop)

**Modal Effects:**
- `modal-blur` - Blur backdrop (applied by default with `blur` prop)

---

### Accessibility Notes

- Modals include proper ARIA attributes (`role="dialog"`, `aria-labelledby`, `aria-hidden`)
- Focus is automatically trapped within modal when open
- Focus returns to trigger element when closed
- ESC key closes modal (unless `static` prop is true)
- Screen readers announce modal opening and closing

---

## Header {#header}

Modal header with title and close button.

### Basic Usage

```blade
<x-tabler::modals.modal id="headerModal">
    <x-tabler::modals.header title="Modal Title" />

    <x-tabler::modals.body>
        Content goes here
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Examples

#### Header with Title Only

```blade
<x-tabler::modals.header title="Simple Title" />
```

---

#### Header without Close Button

```blade
<x-tabler::modals.header title="No Close Button" hideClose />
```

**Use Case:** Force users to complete an action via footer buttons.

---

#### Header with Custom Content

```blade
<x-tabler::modals.header>
    <div class="d-flex align-items-center">
        <x-tabler::icon name="info-circle" class="me-2 text-primary" />
        <div>
            <h5 class="modal-title mb-0">Important Information</h5>
            <small class="text-muted">Please read carefully</small>
        </div>
    </div>
</x-tabler::modals.header>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string\|null` | `null` | Modal title text |
| `hideClose` | `bool` | `false` | Hide the close button (forces explicit actions) |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom header content (overrides title) |
| `title` | No | Custom title markup (overrides `title` prop) |

---

### Accessibility Notes

- Title is associated with modal via `aria-labelledby`
- Close button includes `aria-label="Close"`
- Close button is keyboard accessible
- Screen readers announce title when modal opens

---

## Body {#body}

Main content area of the modal.

### Basic Usage

```blade
<x-tabler::modals.modal id="bodyModal">
    <x-tabler::modals.body>
        <p>This is the modal body content.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Examples

#### Body with Text Content

```blade
<x-tabler::modals.body>
    <h4>Welcome</h4>
    <p>This is the main content area of the modal.</p>
    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
    </ul>
</x-tabler::modals.body>
```

---

#### Body with Form

```blade
<x-tabler::modals.body>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <x-tabler::forms.input
            name="name"
            label="Name"
            required />

        <x-tabler::forms.input
            name="email"
            type="email"
            label="Email"
            required />
    </form>
</x-tabler::modals.body>
```

---

#### Centered Body Content

```blade
<x-tabler::modals.body class="text-center py-4">
    <x-tabler::icon name="circle-check" class="icon icon-lg text-success mb-3" />
    <h3>Success!</h3>
    <p>Your changes have been saved.</p>
</x-tabler::modals.body>
```

---

#### Body with Custom Padding

```blade
{{-- No padding for images --}}
<x-tabler::modals.body class="p-0">
    <img src="/image.jpg" alt="Full width" class="w-100" />
</x-tabler::modals.body>

{{-- Extra padding --}}
<x-tabler::modals.body class="py-5">
    Spacious content area
</x-tabler::modals.body>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Modal body content |

---

### Accessibility Notes

- Content maintains logical reading order
- Form labels are properly associated with inputs
- Keyboard navigation works through all interactive elements
- Screen readers announce content in proper sequence

---

## Footer {#footer}

Footer section with action buttons.

### Basic Usage

```blade
<x-tabler::modals.modal id="footerModal">
    <x-tabler::modals.body>
        Content goes here
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
        <x-tabler::button color="primary">Save</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Examples

#### Footer with Two Buttons

```blade
<x-tabler::modals.footer>
    <x-tabler::button data-bs-dismiss="modal">Cancel</x-tabler::button>
    <x-tabler::button color="primary">Confirm</x-tabler::button>
</x-tabler::modals.footer>
```

---

#### Footer with Full-Width Buttons

```blade
<x-tabler::modals.footer>
    <div class="w-100">
        <x-tabler::button data-bs-dismiss="modal" class="w-100">
            Close
        </x-tabler::button>
    </div>
</x-tabler::modals.footer>
```

---

#### Footer with Split Actions

```blade
<x-tabler::modals.footer>
    <div class="w-100">
        <div class="row">
            <div class="col">
                <x-tabler::button data-bs-dismiss="modal" class="w-100">
                    Cancel
                </x-tabler::button>
            </div>
            <div class="col">
                <x-tabler::button color="danger" class="w-100">
                    Delete
                </x-tabler::button>
            </div>
        </div>
    </div>
</x-tabler::modals.footer>
```

---

#### Footer with Justified Buttons

```blade
<x-tabler::modals.footer class="justify-content-between">
    <x-tabler::button variant="link" data-bs-dismiss="modal">
        Skip
    </x-tabler::button>
    <x-tabler::button color="primary">
        Continue
    </x-tabler::button>
</x-tabler::modals.footer>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Footer content (typically buttons) |

---

### Accessibility Notes

- Buttons maintain proper focus order
- Clear button labels for all actions
- ARIA labels for icon-only buttons
- Keyboard accessible (Tab, Enter, Space)

---

## Close {#close}

Standalone close button component.

### Basic Usage

```blade
<x-tabler::modals.modal id="closeModal">
    <x-tabler::modals.close />

    <x-tabler::modals.body>
        Content with custom close button placement
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Examples

#### Top-Right Close Button

```blade
<x-tabler::modals.modal id="alertModal">
    <x-tabler::modals.close />

    <x-tabler::modals.body class="text-center py-4">
        <h3>Alert Message</h3>
        <p>Important information goes here</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Close Button on Dark Background

```blade
<x-tabler::modals.modal id="darkModal">
    <x-tabler::modals.close class="btn-close-white" />

    <x-tabler::modals.body class="bg-dark text-white">
        Dark themed content
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

**Note:** Use `btn-close-white` class for close buttons on dark backgrounds.

---

### Slots

This component does not support slots (self-closing).

---

### Accessibility Notes

- Includes `aria-label="Close"` by default
- Keyboard accessible (Tab, Enter, Space)
- Part of modal focus trap
- Screen readers announce close action

---

## Status {#status}

Colored status indicator bar for alert modals.

### Basic Usage

```blade
<x-tabler::modals.modal id="statusModal">
    <x-tabler::modals.status color="success" />

    <x-tabler::modals.body>
        <h3>Operation Successful</h3>
        <p>Your changes have been saved.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Examples

#### Success Status

```blade
<x-tabler::modals.modal id="successModal" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="success" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="circle-check" class="icon icon-lg text-success mb-2" />
        <h3>Success!</h3>
        <p>Your changes have been saved.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Danger Status

```blade
<x-tabler::modals.modal id="dangerModal" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="danger" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="alert-triangle" class="icon icon-lg text-danger mb-2" />
        <h3>Are you sure?</h3>
        <p>This action cannot be undone.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Warning Status

```blade
<x-tabler::modals.modal id="warningModal" size="sm">
    <x-tabler::modals.status color="warning" />

    <x-tabler::modals.body>
        <h4>Warning</h4>
        <p>Please review your input before proceeding.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

#### Info Status

```blade
<x-tabler::modals.modal id="infoModal">
    <x-tabler::modals.status color="info" />

    <x-tabler::modals.body>
        <h4>Information</h4>
        <p>Here's some helpful information.</p>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string` | **required** | Tabler color variant: `success`, `danger`, `warning`, `info`, `primary`, etc. |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

This component does not support slots (self-closing).

---

### Accessibility Notes

- Purely visual indicator
- Must include text/icon context for color-blind users
- Don't rely solely on color for meaning
- Pair with descriptive text and icons

---

## Shared Features {#shared-features}

Features common to multiple modal components.

### Modal Sizes {#modal-sizes}

Control modal width with the `size` prop:

```blade
{{-- Small (300px) --}}
<x-tabler::modals.modal id="sm" size="sm">
    <x-tabler::modals.body>Compact modal</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Default (500px) --}}
<x-tabler::modals.modal id="default">
    <x-tabler::modals.body>Standard modal</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Large (800px) --}}
<x-tabler::modals.modal id="lg" size="lg">
    <x-tabler::modals.body>Wide modal</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Extra Large (1140px) --}}
<x-tabler::modals.modal id="xl" size="xl">
    <x-tabler::modals.body>Very wide modal</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Fullscreen --}}
<x-tabler::modals.modal id="fs" size="fullscreen">
    <x-tabler::modals.body>Full viewport modal</x-tabler::modals.body>
</x-tabler::modals.modal>
```

**Size Guide:**
- `sm`: Confirmations, simple alerts
- Default: Standard forms, messages
- `lg`: Complex forms, two-column layouts
- `xl`: Rich content, dashboards
- `fullscreen`: Image galleries, editors

---

### Backdrop Options {#backdrop-options}

Control backdrop behavior:

```blade
{{-- Default: Blur + click to close --}}
<x-tabler::modals.modal id="default">
    <x-tabler::modals.body>Click backdrop to close</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Static backdrop (no close on click) --}}
<x-tabler::modals.modal id="static" static>
    <x-tabler::modals.body>Must use button to close</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- No blur effect --}}
<x-tabler::modals.modal id="noBlur" :blur="false">
    <x-tabler::modals.body>Sharp backdrop</x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Scrollable Content {#scrollable-content}

Enable scrolling for long content:

```blade
<x-tabler::modals.modal id="scrollable" scrollable>
    <x-tabler::modals.header title="Long Content" />

    <x-tabler::modals.body>
        <p>Paragraph 1...</p>
        <p>Paragraph 2...</p>
        <!-- Many more paragraphs -->
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**When to use scrollable:**
- Terms of service
- Privacy policies
- Long articles
- Detailed product descriptions

---

### Vertical Centering {#vertical-centering}

Control vertical position:

```blade
{{-- Centered (default) --}}
<x-tabler::modals.modal id="centered" centered>
    <x-tabler::modals.body>Vertically centered</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Top aligned --}}
<x-tabler::modals.modal id="top" :centered="false">
    <x-tabler::modals.body>Appears at top</x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

### Bootstrap Events {#bootstrap-events}

Modals emit standard Bootstrap 5 events:

```javascript
const modal = document.getElementById('myModal');

// Before showing
modal.addEventListener('show.bs.modal', (event) => {
    console.log('About to show');
    // event.relatedTarget: trigger button
    // event.preventDefault() to cancel
});

// After showing
modal.addEventListener('shown.bs.modal', () => {
    console.log('Now visible');
    // Focus first input, etc.
});

// Before hiding
modal.addEventListener('hide.bs.modal', (event) => {
    console.log('About to hide');
    // event.preventDefault() to cancel
});

// After hiding
modal.addEventListener('hidden.bs.modal', () => {
    console.log('Now hidden');
    // Clean up, reset form, etc.
});
```

---

## Complete Examples {#complete-examples}

Real-world scenarios showing multiple components working together.

### Example 1: Delete Confirmation

```blade
<x-tabler::modals.modal id="deleteConfirm" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="danger" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="trash" class="icon icon-lg text-danger mb-3" />
        <h3>Delete Item?</h3>
        <p class="text-secondary mb-0">
            This action cannot be undone. All data will be permanently deleted.
        </p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <div class="w-100">
            <div class="row">
                <div class="col">
                    <x-tabler::button data-bs-dismiss="modal" class="w-100">
                        Cancel
                    </x-tabler::button>
                </div>
                <div class="col">
                    <form method="POST" action="{{ route('items.destroy', $item) }}">
                        @csrf
                        @method('DELETE')
                        <x-tabler::button type="submit" color="danger" class="w-100">
                            Delete
                        </x-tabler::button>
                    </form>
                </div>
            </div>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>

{{-- Trigger button --}}
<x-tabler::button
    color="danger"
    icon="trash"
    data-bs-toggle="modal"
    data-bs-target="#deleteConfirm">
    Delete Item
</x-tabler::button>
```

**Use Case:** Confirmation dialog for destructive actions with visual warning.

---

### Example 2: Create User Form

```blade
<x-tabler::modals.modal id="createUser" size="lg">
    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <x-tabler::modals.header title="Create New User" />

        <x-tabler::modals.body>
            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="first_name"
                        label="First Name"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="last_name"
                        label="Last Name"
                        required />
                </div>
            </div>

            <x-tabler::forms.input
                name="email"
                type="email"
                label="Email Address"
                required />

            <x-tabler::forms.select
                name="role"
                label="Role"
                :options="$roles"
                required />

            <x-tabler::forms.checkbox
                name="send_welcome_email"
                label="Send welcome email"
                checked />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button type="button" data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button type="submit" color="primary">
                Create User
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>
```

**Use Case:** Quick user creation without leaving current page.

---

### Example 3: Payment Success

```blade
<x-tabler::modals.modal id="paymentSuccess" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="success" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="circle-check" class="icon icon-lg text-success mb-3" />
        <h3>Payment Successful</h3>
        <p class="text-secondary">
            Your payment of <strong>${{ number_format($amount, 2) }}</strong> has been processed.
        </p>
        <p class="text-muted small mb-0">
            Transaction ID: {{ $transactionId }}
        </p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <div class="w-100">
            <div class="row">
                <div class="col">
                    <x-tabler::button
                        href="{{ route('receipt', $transactionId) }}"
                        variant="outline"
                        class="w-100">
                        View Receipt
                    </x-tabler::button>
                </div>
                <div class="col">
                    <x-tabler::button data-bs-dismiss="modal" color="success" class="w-100">
                        Done
                    </x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**Use Case:** Payment confirmation with transaction details and receipt option.

---

### Example 4: Multi-Step Wizard

```blade
<x-tabler::modals.modal id="setupWizard" size="xl" static>
    <div x-data="{ step: 1 }">
        <x-tabler::modals.header>
            <h5 class="modal-title">Setup Wizard - Step <span x-text="step"></span> of 3</h5>
        </x-tabler::modals.header>

        <x-tabler::modals.body>
            <div x-show="step === 1">
                <h4>Step 1: Basic Information</h4>
                <x-tabler::forms.input name="company_name" label="Company Name" />
                <x-tabler::forms.input name="website" label="Website" />
            </div>

            <div x-show="step === 2">
                <h4>Step 2: Configuration</h4>
                <x-tabler::forms.select name="timezone" label="Timezone" :options="$timezones" />
                <x-tabler::forms.select name="currency" label="Currency" :options="$currencies" />
            </div>

            <div x-show="step === 3">
                <h4>Step 3: Review & Confirm</h4>
                <p>Please review your settings before completing setup.</p>
            </div>
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button
                x-show="step > 1"
                @click="step--"
                variant="outline">
                Previous
            </x-tabler::button>

            <x-tabler::button
                x-show="step < 3"
                @click="step++"
                color="primary">
                Next
            </x-tabler::button>

            <x-tabler::button
                x-show="step === 3"
                color="success">
                Finish
            </x-tabler::button>
        </x-tabler::modals.footer>
    </div>
</x-tabler::modals.modal>
```

**Use Case:** Multi-step onboarding or configuration process.

---

### Example 5: Image Gallery

```blade
<x-tabler::modals.modal id="imageGallery" size="xl">
    <x-tabler::modals.header title="Image Gallery" />

    <x-tabler::modals.body class="p-0">
        <div id="galleryCarousel" class="carousel slide">
            <div class="carousel-inner">
                @foreach($images as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img
                            src="{{ $image->url }}"
                            alt="{{ $image->alt }}"
                            class="d-block w-100">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" data-bs-target="#galleryCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

**Use Case:** Full-screen image viewing with navigation controls.

---

## Composition Patterns {#composition-patterns}

Common patterns for composing modal components effectively.

### Pattern 1: Alert Modal

```blade
<x-tabler::modals.modal id="alert" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="info" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="info-circle" class="icon icon-lg text-info mb-3" />
        <h3>Information</h3>
        <p class="mb-0">{{ $message }}</p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <div class="w-100">
            <x-tabler::button data-bs-dismiss="modal" class="w-100">
                OK
            </x-tabler::button>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Pattern 2: Quick Edit Form

```blade
<x-tabler::modals.modal id="quickEdit-{{ $item->id }}">
    <form wire:submit.prevent="update">
        <x-tabler::modals.header title="Quick Edit" />

        <x-tabler::modals.body>
            <x-tabler::forms.input
                wire:model="name"
                name="name"
                label="Name" />

            <x-tabler::forms.textarea
                wire:model="description"
                name="description"
                label="Description" />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button type="button" data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button type="submit" color="primary" wire:loading.attr="disabled">
                Save
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>
```

---

## Programmatic Control {#programmatic-control}

Control modals programmatically with JavaScript.

### Show/Hide Modals

```javascript
// Get modal instance
const modal = new bootstrap.Modal(
    document.getElementById('myModal')
);

// Show modal
modal.show();

// Hide modal
modal.hide();

// Toggle modal
modal.toggle();

// Dispose (cleanup)
modal.dispose();
```

---

### Update Modal Options

```javascript
// Create with options
const modal = new bootstrap.Modal('#myModal', {
    backdrop: 'static',
    keyboard: false
});
```

---

### Listen to Events

```javascript
const modalEl = document.getElementById('myModal');

modalEl.addEventListener('show.bs.modal', () => {
    console.log('Modal is about to show');
});

modalEl.addEventListener('shown.bs.modal', () => {
    console.log('Modal is now visible');
    document.getElementById('firstInput').focus();
});
```

---

## Laravel Integration {#laravel-integration}

Modals integrate seamlessly with Laravel features.

### With Livewire

```blade
<x-tabler::modals.modal id="livewireModal" wire:ignore.self>
    <x-tabler::modals.header title="Search Users" />

    <x-tabler::modals.body>
        <x-tabler::forms.input
            wire:model.live="search"
            name="search"
            label="Search"
            placeholder="Type to search..." />

        <div class="mt-3">
            @foreach($users as $user)
                <div>{{ $user->name }}</div>
            @endforeach
        </div>
    </x-tabler::modals.body>
</x-tabler::modals.modal>

<script>
    Livewire.on('openModal', () => {
        new bootstrap.Modal('#livewireModal').show();
    });
</script>
```

---

### With Alpine.js

```blade
<div x-data="{ open: false }">
    <x-tabler::button @click="open = true">
        Open Modal
    </x-tabler::button>

    <x-tabler::modals.modal
        id="alpineModal"
        x-show="open"
        @hide.bs.modal="open = false">
        <x-tabler::modals.header title="Alpine Modal" />
        <x-tabler::modals.body>
            Alpine.js integrated modal
        </x-tabler::modals.body>
    </x-tabler::modals.modal>
</div>
```

---

### With Form Validation

```blade
<x-tabler::modals.modal id="contactModal">
    <form method="POST" action="{{ route('contact.send') }}">
        @csrf

        <x-tabler::modals.header title="Contact Us" />

        <x-tabler::modals.body>
            <x-tabler::forms.input
                name="name"
                label="Name"
                :value="old('name')"
                :error="$errors->first('name')"
                required />

            <x-tabler::forms.input
                name="email"
                type="email"
                label="Email"
                :value="old('email')"
                :error="$errors->first('email')"
                required />

            <x-tabler::forms.textarea
                name="message"
                label="Message"
                :value="old('message')"
                :error="$errors->first('message')"
                rows="4"
                required />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button type="button" data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button type="submit" color="primary">
                Send Message
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>

@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new bootstrap.Modal('#contactModal').show();
        });
    </script>
@endif
```

---

## Accessibility {#accessibility}

Modals are built with accessibility as a priority.

### Keyboard Navigation

- **Tab**: Move focus through interactive elements
- **Shift + Tab**: Move focus backward
- **Escape**: Close modal (unless `static` prop is true)
- **Enter/Space**: Activate focused button
- Focus is automatically trapped within modal when open

---

### ARIA Attributes

Modals automatically include proper ARIA attributes:

- `role="dialog"`: Applied to modal element
- `aria-labelledby`: Links to modal title
- `aria-hidden`: Manages visibility for screen readers
- `tabindex="-1"`: Enables keyboard focus management
- `aria-modal="true"`: Indicates modal behavior

---

### Screen Reader Support

- Modal opening/closing is announced
- Focus is trapped within modal when open
- Focus returns to trigger element when closed
- Title is announced when modal opens
- All interactive elements are properly labeled

---

### Best Practices

1. **Always provide a title** in the header
2. **Include close button** with proper `aria-label`
3. **Ensure sufficient color contrast** (4.5:1 minimum)
4. **Test keyboard navigation** thoroughly
5. **Provide meaningful button labels** (not just "OK")
6. **Don't rely solely on color** for status indicators
7. **Test with screen readers** (NVDA, JAWS, VoiceOver)
8. **Maintain logical focus order**
9. **Use semantic HTML** in modal content
10. **Provide alternative text** for images

---

## Best Practices {#best-practices}

Guidelines for effective modal design and usage.

### Do's ✅

**Use appropriate sizes:**
```blade
{{-- Good: Small for simple confirmations --}}
<x-tabler::modals.modal id="confirm" size="sm">
    <x-tabler::modals.body>Confirm action?</x-tabler::modals.body>
</x-tabler::modals.modal>

{{-- Good: Large for complex forms --}}
<x-tabler::modals.modal id="form" size="lg">
    <x-tabler::modals.body>
        {{-- Multi-column form --}}
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

**Provide clear titles:**
```blade
<x-tabler::modals.header title="Delete Account" />
```

**Use status indicators:**
```blade
<x-tabler::modals.status color="danger" />
```

**Include close options:**
```blade
{{-- Header close button OR footer cancel button --}}
<x-tabler::modals.header title="Edit Profile" />
<x-tabler::modals.footer>
    <x-tabler::button data-bs-dismiss="modal">Cancel</x-tabler::button>
</x-tabler::modals.footer>
```

---

### Don'ts ❌

**Don't use modals for long content:**
```blade
{{-- Bad: Better as separate page --}}
<x-tabler::modals.modal id="terms">
    <x-tabler::modals.body>
        {{-- 50 paragraphs of terms... --}}
    </x-tabler::modals.body>
</x-tabler::modals.modal>
```

**Don't nest modals:**
```blade
{{-- Bad: Confusing UX --}}
<x-tabler::modals.modal id="outer">
    <x-tabler::button data-bs-target="#inner">Open Another</x-tabler::button>
</x-tabler::modals.modal>
<x-tabler::modals.modal id="inner">...</x-tabler::modals.modal>
```

**Don't omit IDs:**
```blade
{{-- Bad: ID is required --}}
<x-tabler::modals.modal>
    <x-tabler::modals.body>No ID!</x-tabler::modals.body>
</x-tabler::modals.modal>
```

**Don't overuse static backdrop:**
```blade
{{-- Bad: Frustrating for users --}}
<x-tabler::modals.modal id="info" static>
    <x-tabler::modals.body>Simple info message</x-tabler::modals.body>
</x-tabler::modals.modal>
```

---

## Browser Compatibility

### Requirements

- **Bootstrap 5.x** (CSS + **JavaScript** required)
- **Modern JavaScript** (ES6+)
- **CSS transforms and transitions**

### Supported Browsers

- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues

- Backdrop blur may not work in older Safari versions
- Animation performance varies on mobile devices
- Focus trap may conflict with some third-party libraries
- Nested modals are not officially supported by Bootstrap

---

## Troubleshooting

### Common Issues

**Issue: Modal doesn't open**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `id` matches `data-bs-target="#id"`
- ✅ Check for JavaScript console errors
- ✅ Ensure no duplicate IDs on page
- ✅ Verify Bootstrap version is 5.x

**Issue: Backdrop click doesn't close modal**
- ✅ Check `static` prop (should be `false`)
- ✅ If `static="true"`, backdrop won't close modal
- ✅ Verify no JavaScript errors preventing close

**Issue: ESC key doesn't work**
- ✅ Ensure `static` prop is `false`
- ✅ Check focus is inside modal
- ✅ Verify no other event listeners preventing propagation

**Issue: Modal closes when clicking inside**
- ✅ Ensure clicks are on modal content, not backdrop
- ✅ Check event propagation isn't stopped
- ✅ Verify no conflicting JavaScript

**Issue: Focus trap not working**
- ✅ Bootstrap handles this automatically
- ✅ Check all interactive elements are tabbable
- ✅ Ensure no `tabindex="-1"` on important elements

**Issue: Form validation not showing in modal**
- ✅ Reopen modal after validation failure
- ✅ Use JavaScript to show modal if `$errors` exist
- ✅ Consider using AJAX for form submission

---

## Related Components

- [Button](./button.md) - Trigger buttons for modals
- [Forms](./forms.md) - Form inputs for modal forms
- [Alert](./alert.md) - In-modal notifications
- [Card](./cards.md) - Alternative content containers

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/modals/`

**Sub-components:**
- `modal.blade.php` - Main container
- `header.blade.php` - Header section
- `body.blade.php` - Body section
- `footer.blade.php` - Footer section
- `close.blade.php` - Close button
- `status.blade.php` - Status indicator

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation with full Bootstrap 5 modal integration
