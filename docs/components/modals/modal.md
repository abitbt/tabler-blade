# Modal

> Dialog overlay for displaying content, forms, alerts, and prompts with Bootstrap 5 integration.

## Overview

The Modal component family provides a comprehensive modal dialog system for displaying overlaid content, confirmation dialogs, forms, and alerts. Modals support multiple sizes, vertical centering, scrollable content, backdrop blur effects, and full keyboard accessibility. The component uses Bootstrap 5 modal functionality with Tabler UI styling for a polished, professional appearance.

**Key Features:**
- Complete modal component family (6 sub-components)
- Multiple size variants (sm, lg, xl, fullscreen)
- Vertically centered by default
- Scrollable content support
- Backdrop blur effect
- Static backdrop option (prevents dismissal)
- Status indicator bar for alert modals
- Close button component
- Keyboard accessible (ESC to close)
- Focus trap management
- Bootstrap 5 events (show, shown, hide, hidden)
- Full ARIA support

**Component Family:**
- `<x-tabler::modals.modal>` - Main modal container
- `<x-tabler::modals.header>` - Header with title and close button
- `<x-tabler::modals.body>` - Content area
- `<x-tabler::modals.footer>` - Footer with action buttons
- `<x-tabler::modals.status>` - Status indicator bar (for alerts)
- `<x-tabler::modals.close>` - Standalone close button

**Use Case:** Use modals for confirmation dialogs, forms, detailed content display, alerts, image galleries, and any content that requires user focus and interaction before returning to the main page.

---

## Basic Usage

```blade
<x-tabler::modals.modal id="exampleModal">
    <x-tabler::modals.header title="Modal Title" />

    <x-tabler::modals.body>
        Modal content goes here.
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

---

## Component Structure

### Main Component: `<x-tabler::modals.modal>`

The main modal container.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string` | **required** | Unique modal ID (required for Bootstrap `data-bs-target`) |
| `size` | `string\|null` | `null` | Modal size: `sm` (300px), `lg` (800px), `xl` (1140px), `fullscreen` |
| `scrollable` | `bool` | `false` | Enable scrollable modal body |
| `centered` | `bool` | `true` | Center modal vertically |
| `blur` | `bool` | `true` | Apply blur effect to backdrop |
| `static` | `bool` | `false` | Prevent closing on backdrop click (requires explicit close action) |
| `class` | `string` | `''` | Additional CSS classes |

---

### Header: `<x-tabler::modals.header>`

Modal header with title and close button.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string\|null` | `null` | Modal title text |
| `hideClose` | `bool` | `false` | Hide the close button |
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Additional header content |
| `title` | No | Custom title markup (overrides `title` prop) |

---

### Body: `<x-tabler::modals.body>`

Main content area of the modal.

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Modal body content |

---

### Footer: `<x-tabler::modals.footer>`

Footer section with action buttons.

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Footer content (typically buttons) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Modal Sizes:**
- `modal-sm` - Small modal (300px, also via `size="sm"`)
- `modal-lg` - Large modal (800px, also via `size="lg"`)
- `modal-xl` - Extra large modal (1140px, also via `size="xl"`)
- `modal-fullscreen` - Full screen modal (also via `size="fullscreen"`)
- `modal-fullscreen-sm-down` - Full screen below breakpoint

**Dialog Options:**
- `modal-dialog-centered` - Vertically center (auto-applied with `centered` prop)
- `modal-dialog-scrollable` - Scrollable body (auto-applied with `scrollable` prop)
- `modal-dialog-slideout` - Slide-out panel style

**Modal Effects:**
- `modal-blur` - Blur backdrop (default with `blur` prop)

---

## Examples

### Basic Example

```blade
<x-tabler::modals.modal id="basicModal">
    <x-tabler::modals.header title="Modal Title" />

    <x-tabler::modals.body>
        <p>This is a basic modal with a title, body, and footer.</p>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
        <x-tabler::button color="primary">Save changes</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>

<x-tabler::button data-bs-toggle="modal" data-bs-target="#basicModal">
    Open Modal
</x-tabler::button>
```

---

### Small Modal

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

### Large Modal

```blade
<x-tabler::modals.modal id="largeModal" size="lg">
    <x-tabler::modals.header title="Large Modal" />

    <x-tabler::modals.body>
        <p>This modal has more space for content.</p>
        <div class="row">
            <div class="col-md-6">Left column content</div>
            <div class="col-md-6">Right column content</div>
        </div>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Scrollable Modal

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

---

### Static Backdrop Modal

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

---

### Success Alert Modal

```blade
<x-tabler::modals.modal id="successModal" size="sm" :centered="true">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="success" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="circle-check" class="icon icon-lg text-success mb-2" />
        <h3>Success!</h3>
        <div class="text-secondary">Your changes have been saved.</div>
    </x-tabler::modals.body>

    <x-tabler::modals.footer>
        <div class="w-100">
            <x-tabler::button data-bs-dismiss="modal" class="w-100">
                Close
            </x-tabler::button>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Danger Confirmation Modal

```blade
<x-tabler::modals.modal id="deleteModal" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="danger" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="alert-triangle" class="icon icon-lg text-danger mb-2" />
        <h3>Are you sure?</h3>
        <div class="text-secondary">This action cannot be undone.</div>
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
                    <x-tabler::button color="danger" class="w-100">
                        Delete
                    </x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

---

### Modal with Form

```blade
<x-tabler::modals.modal id="formModal" size="lg">
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <x-tabler::modals.header title="Create New Post" />

        <x-tabler::modals.body>
            <x-tabler::forms.input
                name="title"
                label="Title"
                required />

            <x-tabler::forms.textarea
                name="content"
                label="Content"
                rows="5"
                required />

            <x-tabler::forms.select
                name="category_id"
                label="Category"
                :options="$categories"
                required />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button type="button" data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button type="submit" color="primary">
                Create Post
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>
```

---

### Fullscreen Modal

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

### Modal without Centered

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

## Composition Patterns

### Pattern 1: Delete Confirmation

```blade
<x-tabler::modals.modal id="delete-{{ $item->id }}" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="danger" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="trash" class="icon icon-lg text-danger mb-2" />
        <h3>Delete {{ $item->name }}?</h3>
        <p class="text-secondary mb-0">This action cannot be undone.</p>
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

{{-- Trigger --}}
<x-tabler::button
    color="danger"
    icon="trash"
    size="sm"
    data-bs-toggle="modal"
    data-bs-target="#delete-{{ $item->id }}">
    Delete
</x-tabler::button>
```

---

### Pattern 2: Edit Form Modal

```blade
<x-tabler::modals.modal id="edit-{{ $user->id }}" size="lg">
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method('PUT')

        <x-tabler::modals.header title="Edit User" />

        <x-tabler::modals.body>
            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="first_name"
                        label="First Name"
                        :value="$user->first_name"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="last_name"
                        label="Last Name"
                        :value="$user->last_name"
                        required />
                </div>
            </div>

            <x-tabler::forms.input
                name="email"
                label="Email"
                type="email"
                :value="$user->email"
                required />

            <x-tabler::forms.select
                name="role"
                label="Role"
                :value="$user->role"
                :options="$roles"
                required />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button type="button" data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button type="submit" color="primary">
                Save Changes
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>
```

---

### Pattern 3: Multi-Step Wizard

```blade
<x-tabler::modals.modal id="wizard" size="xl" static>
    <div x-data="{ step: 1 }">
        <x-tabler::modals.header>
            <h5 class="modal-title">Setup Wizard - Step <span x-text="step"></span> of 3</h5>
        </x-tabler::modals.header>

        <x-tabler::modals.body>
            <div x-show="step === 1">
                <h4>Step 1: Basic Information</h4>
                <!-- Step 1 fields -->
            </div>

            <div x-show="step === 2">
                <h4>Step 2: Configuration</h4>
                <!-- Step 2 fields -->
            </div>

            <div x-show="step === 3">
                <h4>Step 3: Review</h4>
                <!-- Step 3 review -->
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

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus through interactive elements inside modal
- **Escape:** Closes modal (unless `static` prop is true)
- **Shift+Tab:** Moves focus backward
- Focus automatically trapped within modal when open

### ARIA Attributes
- `role="dialog"`: Applied to modal element
- `aria-labelledby`: Links to modal title
- `aria-hidden`: Manages visibility for screen readers
- `tabindex="-1"`: Enables keyboard focus management

### Screen Reader Support
- Modal opening/closing is announced
- Focus is trapped within modal when open
- Focus returns to trigger element when closed
- All interactive elements are properly labeled

### Best Practices
- Always provide a title in the header
- Include close button with proper `aria-label`
- Ensure sufficient color contrast
- Test keyboard navigation thoroughly
- Provide meaningful button labels

**Example:**
```blade
<x-tabler::modals.header title="Confirm Action" />
<x-tabler::modals.footer>
    <x-tabler::button data-bs-dismiss="modal" aria-label="Cancel action">
        Cancel
    </x-tabler::button>
    <x-tabler::button color="danger" aria-label="Confirm delete action">
        Delete
    </x-tabler::button>
</x-tabler::modals.footer>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS + **JavaScript**)
- Modern JavaScript (ES6+)
- CSS support for transforms and transitions

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

---

## Events & Interactivity

### Bootstrap Events

Modals emit standard Bootstrap 5 events:

```javascript
const modalElement = document.getElementById('myModal');

// Before opening
modalElement.addEventListener('show.bs.modal', (event) => {
    console.log('Modal is about to show');
    // event.relatedTarget: Element that triggered the modal
    // Call event.preventDefault() to cancel
});

// After opening
modalElement.addEventListener('shown.bs.modal', (event) => {
    console.log('Modal is now visible');
    // Focus first input, etc.
});

// Before closing
modalElement.addEventListener('hide.bs.modal', (event) => {
    console.log('Modal is about to hide');
    // Call event.preventDefault() to cancel
});

// After closing
modalElement.addEventListener('hidden.bs.modal', (event) => {
    console.log('Modal is now hidden');
    // Clean up, reset form, etc.
});
```

---

### Programmatic Control

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

### Framework Integration

**Livewire:**
```blade
<x-tabler::modals.modal id="livewireModal" wire:ignore.self>
    <x-tabler::modals.header title="Livewire Modal" />

    <x-tabler::modals.body>
        <x-tabler::forms.input
            wire:model="search"
            name="search"
            label="Search" />
        <div>Results: {{ $results }}</div>
    </x-tabler::modals.body>
</x-tabler::modals.modal>

<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('openModal', () => {
            const modal = new bootstrap.Modal('#livewireModal');
            modal.show();
        });
    });
</script>
```

**Alpine.js:**
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

## Troubleshooting

### Common Issues

**Issue: Modal doesn't open**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `id` matches `data-bs-target="#id"`
- ✅ Check for JavaScript console errors
- ✅ Ensure no duplicate IDs on page
- ✅ Verify Bootstrap version is 5.x

**Issue: Backdrop click doesn't close modal**
- ✅ Check `static` prop (should be `false` for clickable)
- ✅ If `static="true"`, backdrop won't close modal
- ✅ Verify no JavaScript errors preventing close

**Issue: ESC key doesn't work**
- ✅ Ensure `static` prop is `false` (default)
- ✅ Check focus is inside modal
- ✅ Verify no other event listeners preventing propagation

**Issue: Modal closes when clicking inside**
- ✅ Ensure clicks are on modal body, not backdrop
- ✅ Check event propagation isn't stopped
- ✅ Verify no conflicting JavaScript

**Issue: Focus trap not working**
- ✅ Bootstrap handles this automatically
- ✅ Check all interactive elements are tabbable
- ✅ Ensure no `tabindex="-1"` on important elements

**Issue: Scrollbar appears behind modal**
- ✅ This is normal Bootstrap behavior
- ✅ Check `overflow` CSS on body
- ✅ Verify Bootstrap modal CSS is loaded

### Debugging Tips
- Open browser console and look for errors
- Test with minimal example first
- Use Bootstrap documentation for JavaScript API
- Check z-index conflicts with other positioned elements
- Verify all required Bootstrap files are loaded

---

## Real-World Examples

### Example 1: User Profile Edit

```blade
<x-tabler::modals.modal id="editProfile" size="lg">
    <form wire:submit.prevent="updateProfile">
        <x-tabler::modals.header title="Edit Profile" />

        <x-tabler::modals.body>
            <div class="text-center mb-4">
                <x-tabler::avatar
                    src="{{ auth()->user()->avatar_url }}"
                    size="xxl"
                    alt="{{ auth()->user()->name }}" />
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.input
                        wire:model="firstName"
                        name="first_name"
                        label="First Name"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.input
                        wire:model="lastName"
                        name="last_name"
                        label="Last Name"
                        required />
                </div>
            </div>

            <x-tabler::forms.input
                wire:model="email"
                name="email"
                type="email"
                label="Email"
                required />

            <x-tabler::forms.textarea
                wire:model="bio"
                name="bio"
                label="Bio"
                rows="4" />
        </x-tabler::modals.body>

        <x-tabler::modals.footer>
            <x-tabler::button
                type="button"
                data-bs-dismiss="modal">
                Cancel
            </x-tabler::button>
            <x-tabler::button
                type="submit"
                color="primary"
                :loading="$saving">
                Save Changes
            </x-tabler::button>
        </x-tabler::modals.footer>
    </form>
</x-tabler::modals.modal>
```

**Use Case:** In-place profile editing without page navigation

---

### Example 2: Image Gallery Viewer

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

**Use Case:** Full-screen image viewing with navigation

---

### Example 3: Payment Success

```blade
<x-tabler::modals.modal id="paymentSuccess" size="sm">
    <x-tabler::modals.close />
    <x-tabler::modals.status color="success" />

    <x-tabler::modals.body class="text-center py-4">
        <x-tabler::icon name="circle-check" class="icon icon-lg text-success mb-3" />
        <h3>Payment Successful</h3>
        <p class="text-secondary mb-0">
            Your payment of <strong>${{ number_format($amount, 2) }}</strong> has been processed.
        </p>
        <p class="text-muted small mt-2">
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
                    <x-tabler::button
                        data-bs-dismiss="modal"
                        color="success"
                        class="w-100">
                        Done
                    </x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**Use Case:** Payment confirmation with transaction details

---

## Performance Considerations

### Component Weight
- Base modal: ~1-2KB rendered HTML
- With Bootstrap JS: ~15KB (shared across all modals)
- Each sub-component: ~200-500 bytes

### Best Practices
- Lazy load modals not immediately needed
- Use `static="true"` only when necessary
- Avoid complex animations on low-end devices
- Limit number of simultaneous modals
- Clean up event listeners after modal closes

### Optimization Tips
- Initialize Bootstrap modals only when needed
- Use `wire:ignore.self` with Livewire to prevent re-renders
- Consider static HTML for simple dialogs
- Preload images shown in modals
- Use CSS transforms instead of position changes

---

## Notes

- Requires Bootstrap 5 JavaScript for full functionality
- Modal automatically manages focus trap
- Supports nested modals (use with caution)
- Backdrop click behavior can be customized
- Multiple size variants available
- Fully keyboard accessible
- Compatible with Livewire and Alpine.js
- `id` prop is **required** for Bootstrap functionality
- Centered by default, can be disabled
- Blur backdrop enabled by default

---

## Related Components

- [Button](../button.md) - Trigger buttons for modals
- [Form Components](../forms/) - Input fields for modal forms
- [Alert](../alert.md) - In-modal notifications
- [Card](../cards/card.md) - Alternative content containers

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

- **v1.0.0** - Initial release with full Bootstrap 5 modal integration
