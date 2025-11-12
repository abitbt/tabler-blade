# Component Family Name

> Brief one-line description of the component system and its purpose.

## Overview

A comprehensive description of the component family, including its main purpose, sub-components, and when to use this component system. Complex components typically have multiple related sub-components and require Bootstrap JavaScript.

**Key Features:**
- Feature 1
- Feature 2
- Multiple sub-components for composition
- Bootstrap 5 JavaScript integration
- Advanced interaction patterns
- Built-in accessibility support

**Component Family:**
- `<x-tabler::component>` - Main wrapper component
- `<x-tabler::component.header>` - Header section
- `<x-tabler::component.body>` - Content area
- `<x-tabler::component.footer>` - Footer/action area
- `<x-tabler::component.close>` - Close button

---

## Basic Usage

```blade
<x-tabler::component id="example">
    <x-tabler::component.header>
        <x-slot:title>Title</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        Main content
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button>Action</x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

## Component Structure

### Main Component: `<x-tabler::component>`

The main wrapper that contains all sub-components.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string` | `null` | Unique identifier (required for JavaScript interactions) |
| `size` | `string\|null` | `null` | Size: `sm`, `lg`, `xl`, `fullscreen` |
| `centered` | `bool` | `false` | Center the component on screen |
| `scrollable` | `bool` | `false` | Enable scrollable body |
| `backdrop` | `string\|bool` | `true` | Backdrop behavior: `true`, `false`, `'static'` |
| `keyboard` | `bool` | `true` | Close on ESC key press |
| `class` | `string` | `''` | Additional CSS classes |

---

### Header: `<x-tabler::component.header>`

The header section with optional title and close button.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Header content |
| `title` | No | Header title text |
| `subtitle` | No | Header subtitle text |

---

### Body: `<x-tabler::component.body>`

The main content area.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Body content |

---

### Footer: `<x-tabler::component.footer>`

The footer section typically containing action buttons.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Footer content (usually buttons) |

---

### Close Button: `<x-tabler::component.close>`

A styled close button for dismissing the component.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `aria-label` | `string` | `'Close'` | Accessible label for screen readers |
| `class` | `string` | `''` | Additional CSS classes |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Size Modifiers:**
- `component-sm` - Small component
- `component-lg` - Large component
- `component-xl` - Extra large component
- `component-fullscreen` - Full screen component

**Position:**
- `component-dialog-centered` - Vertically centered
- `component-dialog-scrollable` - Scrollable content

**Animation:**
- `fade` - Fade animation (default)

---

## Examples

### Basic Example

```blade
<x-tabler::component id="basicExample">
    <x-tabler::component.header>
        <x-slot:title>Basic Example</x-slot:title>
        <x-tabler::component.close />
    </x-tabler::component.header>

    <x-tabler::component.body>
        <p>This is a basic example of the component.</p>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button data-bs-dismiss="component">Close</x-tabler::button>
        <x-tabler::button color="primary">Save Changes</x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

### With Size Variants

```blade
{{-- Small --}}
<x-tabler::component id="smallExample" size="sm">
    <x-tabler::component.body>
        Small sized component
    </x-tabler::component.body>
</x-tabler::component>

{{-- Large --}}
<x-tabler::component id="largeExample" size="lg">
    <x-tabler::component.body>
        Large sized component
    </x-tabler::component.body>
</x-tabler::component>

{{-- Extra Large --}}
<x-tabler::component id="xlExample" size="xl">
    <x-tabler::component.body>
        Extra large sized component
    </x-tabler::component.body>
</x-tabler::component>
```

---

### Centered Component

```blade
<x-tabler::component id="centeredExample" centered>
    <x-tabler::component.header>
        <x-slot:title>Centered Component</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        This component is vertically centered on the screen.
    </x-tabler::component.body>
</x-tabler::component>
```

---

### Scrollable Content

```blade
<x-tabler::component id="scrollableExample" scrollable>
    <x-tabler::component.header>
        <x-slot:title>Scrollable Content</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        <p>Long content that scrolls...</p>
        <p>More content...</p>
        <!-- Many more paragraphs -->
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button color="primary">Submit</x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

### Static Backdrop

```blade
<x-tabler::component id="staticExample" backdrop="static" keyboard="false">
    <x-tabler::component.header>
        <x-slot:title>Confirmation Required</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        <p>This component requires explicit user action to close.</p>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button data-bs-dismiss="component">Cancel</x-tabler::button>
        <x-tabler::button color="primary">Confirm</x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

### Trigger Button

```blade
{{-- Button that opens the component --}}
<x-tabler::button
    data-bs-toggle="component"
    data-bs-target="#exampleComponent"
    color="primary">
    Open Component
</x-tabler::button>

{{-- The component --}}
<x-tabler::component id="exampleComponent">
    <x-tabler::component.header>
        <x-slot:title>Example Component</x-slot:title>
        <x-tabler::component.close />
    </x-tabler::component.header>

    <x-tabler::component.body>
        Component content here
    </x-tabler::component.body>
</x-tabler::component>
```

---

### Complete Example

```blade
<x-tabler::component
    id="completeExample"
    size="lg"
    centered
    scrollable
    backdrop="static">

    <x-tabler::component.header>
        <x-slot:title>Complete Example</x-slot:title>
        <x-slot:subtitle>Showing all features</x-slot:subtitle>
        <x-tabler::component.close />
    </x-tabler::component.header>

    <x-tabler::component.body>
        <form id="exampleForm">
            <x-tabler::forms.input
                name="name"
                label="Name"
                required />

            <x-tabler::forms.textarea
                name="description"
                label="Description"
                rows="5" />
        </form>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button
            variant="outline"
            data-bs-dismiss="component">
            Cancel
        </x-tabler::button>
        <x-tabler::button
            color="primary"
            type="submit"
            form="exampleForm">
            Submit
        </x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

## Composition Patterns

### Pattern 1: Confirmation Dialog

```blade
<x-tabler::component id="confirmDelete" size="sm" centered>
    <x-tabler::component.header>
        <x-slot:title>Confirm Deletion</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        <p>Are you sure you want to delete this item?</p>
        <p class="text-danger">This action cannot be undone.</p>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button variant="outline" data-bs-dismiss="component">
            Cancel
        </x-tabler::button>
        <x-tabler::button color="danger" wire:click="delete">
            Delete
        </x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

### Pattern 2: Form Component

```blade
<x-tabler::component id="createUser" size="lg">
    <form wire:submit.prevent="save">
        <x-tabler::component.header>
            <x-slot:title>Create New User</x-slot:title>
            <x-tabler::component.close />
        </x-tabler::component.header>

        <x-tabler::component.body>
            <x-tabler::forms.input
                wire:model="name"
                name="name"
                label="Full Name"
                required />

            <x-tabler::forms.input
                wire:model="email"
                name="email"
                type="email"
                label="Email Address"
                required />

            <x-tabler::forms.select
                wire:model="role"
                name="role"
                label="Role"
                required>
                <option value="">Select role...</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </x-tabler::forms.select>
        </x-tabler::component.body>

        <x-tabler::component.footer>
            <x-tabler::button
                type="button"
                variant="outline"
                data-bs-dismiss="component">
                Cancel
            </x-tabler::button>
            <x-tabler::button
                type="submit"
                color="primary"
                :loading="$loading">
                Create User
            </x-tabler::button>
        </x-tabler::component.footer>
    </form>
</x-tabler::component>
```

---

### Pattern 3: Multi-Step Process

```blade
<x-tabler::component id="wizard" size="xl">
    <x-tabler::component.header>
        <x-slot:title>Setup Wizard - Step {{ $currentStep }} of 3</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        @if($currentStep === 1)
            {{-- Step 1 content --}}
        @elseif($currentStep === 2)
            {{-- Step 2 content --}}
        @else
            {{-- Step 3 content --}}
        @endif
    </x-tabler::component.body>

    <x-tabler::component.footer>
        @if($currentStep > 1)
            <x-tabler::button
                variant="outline"
                wire:click="previousStep">
                Previous
            </x-tabler::button>
        @endif

        @if($currentStep < 3)
            <x-tabler::button
                color="primary"
                wire:click="nextStep">
                Next
            </x-tabler::button>
        @else
            <x-tabler::button
                color="success"
                wire:click="complete">
                Finish
            </x-tabler::button>
        @endif
    </x-tabler::component.footer>
</x-tabler::component>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus through interactive elements inside component
- **Escape:** Closes component (if `keyboard` prop is `true`)
- **Shift+Tab:** Moves focus backward

### ARIA Attributes
- `role="dialog"`: Applied to main component wrapper
- `aria-modal="true"`: Indicates modal behavior
- `aria-labelledby`: Links to title for screen readers
- `aria-describedby`: Links to description content
- `aria-hidden`: Manages visibility for assistive tech

### Screen Reader Support
- Component opening/closing is announced
- Focus is trapped within component when open
- Focus returns to trigger element when closed
- All interactive elements are properly labeled

### Best Practices
- Always provide a title in the header
- Include close button with proper `aria-label`
- Ensure sufficient color contrast
- Test keyboard navigation thoroughly
- Add `aria-label` to action buttons

**Example:**
```blade
<x-tabler::component.close aria-label="Close user creation dialog" />
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

The component emits standard Bootstrap 5 events:

```javascript
const componentElement = document.getElementById('myComponent');

// Before opening
componentElement.addEventListener('show.bs.component', (event) => {
    console.log('Component is about to show');
    // event.relatedTarget: Element that triggered the component
    // Call event.preventDefault() to cancel
});

// After opening
componentElement.addEventListener('shown.bs.component', (event) => {
    console.log('Component is now visible');
    // Focus first input, etc.
});

// Before closing
componentElement.addEventListener('hide.bs.component', (event) => {
    console.log('Component is about to hide');
    // Call event.preventDefault() to cancel
});

// After closing
componentElement.addEventListener('hidden.bs.component', (event) => {
    console.log('Component is now hidden');
    // Clean up, reset form, etc.
});
```

---

### Programmatic Control

```javascript
// Get component instance
const component = new bootstrap.Component(
    document.getElementById('myComponent')
);

// Show component
component.show();

// Hide component
component.hide();

// Toggle component
component.toggle();

// Dispose (cleanup)
component.dispose();
```

---

### Framework Integration

**Livewire:**
```blade
<x-tabler::component id="livewireExample" wire:ignore.self>
    <x-tabler::component.body>
        <input wire:model="search" />
        <div>Results: {{ $results }}</div>
    </x-tabler::component.body>
</x-tabler::component>

<script>
    document.addEventListener('livewire:load', () => {
        Livewire.on('openComponent', () => {
            const modal = new bootstrap.Modal('#livewireExample');
            modal.show();
        });
    });
</script>
```

**Alpine.js:**
```blade
<div x-data="{ open: false }">
    <x-tabler::button @click="open = true">
        Open Component
    </x-tabler::button>

    <x-tabler::component
        id="alpineExample"
        x-show="open"
        @hide.bs.component="open = false">
        <x-tabler::component.body>
            Alpine.js integrated content
        </x-tabler::component.body>
    </x-tabler::component>
</div>
```

---

## Troubleshooting

### Common Issues

**Issue: Component doesn't open**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `id` matches `data-bs-target="#id"`
- ✅ Check for JavaScript console errors
- ✅ Ensure no duplicate IDs on page
- ✅ Verify Bootstrap version is 5.x

**Issue: Backdrop click doesn't close component**
- ✅ Check `backdrop` prop (should be `true` for clickable)
- ✅ If `backdrop="static"`, backdrop won't close component
- ✅ Verify no JavaScript errors preventing close

**Issue: ESC key doesn't work**
- ✅ Ensure `keyboard` prop is `true` (default)
- ✅ Check focus is inside component
- ✅ Verify no other event listeners preventing propagation

**Issue: Component closes when clicking inside**
- ✅ Ensure clicks are on component body, not backdrop
- ✅ Check event propagation isn't stopped
- ✅ Verify no conflicting JavaScript

**Issue: Focus trap not working**
- ✅ Bootstrap handles this automatically
- ✅ Check all interactive elements are tabbable
- ✅ Ensure no `tabindex="-1"` on important elements

**Issue: Animation stutters or doesn't work**
- ✅ Check CSS transitions are not disabled
- ✅ Verify no conflicting animation CSS
- ✅ Test browser animation performance
- ✅ Use `prefers-reduced-motion` media query

**Issue: Livewire/Alpine conflicts**
- ✅ Use `wire:ignore.self` on component wrapper
- ✅ Listen to Bootstrap events, not just Alpine/Livewire
- ✅ Re-initialize Bootstrap after Livewire updates
- ✅ Check component lifecycle management

### Debugging Tips
- Open browser console and look for errors
- Test with minimal example first
- Use Bootstrap documentation for JavaScript API
- Check z-index conflicts with other positioned elements
- Verify all required Bootstrap files are loaded

---

## Real-World Examples

### Example 1: Delete Confirmation

```blade
{{-- Trigger --}}
<x-tabler::button
    color="danger"
    icon="trash"
    data-bs-toggle="component"
    data-bs-target="#delete-{{ $item->id }}">
    Delete
</x-tabler::button>

{{-- Component --}}
<x-tabler::component id="delete-{{ $item->id }}" size="sm" centered>
    <x-tabler::component.header>
        <x-slot:title>Confirm Deletion</x-slot:title>
    </x-tabler::component.header>

    <x-tabler::component.body>
        <p>Are you sure you want to delete <strong>{{ $item->name }}</strong>?</p>
        <p class="text-danger">This action cannot be undone.</p>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <x-tabler::button
            variant="outline"
            data-bs-dismiss="component">
            Cancel
        </x-tabler::button>
        <x-tabler::button
            color="danger"
            wire:click="delete({{ $item->id }})">
            Delete
        </x-tabler::button>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

### Example 2: User Profile Editor

```blade
<x-tabler::component id="editProfile" size="lg">
    <form wire:submit.prevent="updateProfile">
        <x-tabler::component.header>
            <x-slot:title>Edit Profile</x-slot:title>
            <x-slot:subtitle>Update your account information</x-slot:subtitle>
            <x-tabler::component.close />
        </x-tabler::component.header>

        <x-tabler::component.body>
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
                label="Email Address"
                help="We'll never share your email"
                required />

            <x-tabler::forms.textarea
                wire:model="bio"
                name="bio"
                label="Bio"
                rows="4"
                help="Tell us about yourself" />
        </x-tabler::component.body>

        <x-tabler::component.footer>
            <x-tabler::button
                type="button"
                variant="outline"
                data-bs-dismiss="component">
                Cancel
            </x-tabler::button>
            <x-tabler::button
                type="submit"
                color="primary"
                :loading="$saving">
                Save Changes
            </x-tabler::button>
        </x-tabler::component.footer>
    </form>
</x-tabler::component>
```

---

### Example 3: Image Gallery Viewer

```blade
<x-tabler::component id="imageGallery" size="xl" centered>
    <x-tabler::component.header>
        <x-slot:title>Image Gallery</x-slot:title>
        <x-tabler::component.close />
    </x-tabler::component.header>

    <x-tabler::component.body>
        <x-tabler::carousel id="galleryCarousel">
            @foreach($images as $image)
                <x-tabler::carousel.item :active="$loop->first">
                    <img
                        src="{{ $image->url }}"
                        alt="{{ $image->alt }}"
                        class="d-block w-100">
                </x-tabler::carousel.item>
            @endforeach
        </x-tabler::carousel>
    </x-tabler::component.body>

    <x-tabler::component.footer>
        <div class="d-flex justify-content-between w-100">
            <x-tabler::button
                data-bs-target="#galleryCarousel"
                data-bs-slide="prev"
                icon="chevron-left">
                Previous
            </x-tabler::button>
            <span>{{ count($images) }} images</span>
            <x-tabler::button
                data-bs-target="#galleryCarousel"
                data-bs-slide="next"
                icon-end="chevron-right">
                Next
            </x-tabler::button>
        </div>
    </x-tabler::component.footer>
</x-tabler::component>
```

---

## Performance Considerations

### Component Weight
- Base component: ~1-2KB rendered HTML
- With Bootstrap JS: ~15KB (shared across all components)
- Each sub-component: ~200-500 bytes

### Best Practices
- Lazy load components not immediately needed
- Use `backdrop="static"` only when necessary
- Avoid complex animations on low-end devices
- Limit number of simultaneous components
- Clean up event listeners after component closes

### Optimization Tips
- Initialize Bootstrap components only when needed
- Use `wire:ignore.self` with Livewire to prevent re-renders
- Consider static HTML for simple dialogs
- Preload images shown in components
- Use CSS transforms instead of position changes

---

## Available Classes

Additional CSS classes you can use:

**Size Modifiers:**
- `component-sm` - Small component
- `component-lg` - Large component
- `component-xl` - Extra large component
- `component-fullscreen` - Full screen component

**Position:**
- `component-dialog-centered` - Vertically centered
- `component-dialog-scrollable` - Scrollable content

**Animation:**
- `fade` - Fade animation (default)

---

## Notes

- Requires Bootstrap 5 JavaScript for full functionality
- Component automatically manages focus trap
- Supports nested components (use with caution)
- Backdrop click behavior can be customized
- Multiple size variants available
- Fully keyboard accessible
- Compatible with Livewire and Alpine.js

---

## Related Components

- [Button](./button.md) - Trigger buttons for components
- [Form Components](./forms/) - Input fields for component forms
- [Alert](./alert.md) - In-component notifications
- [Spinner](./spinner.md) - Loading states

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/component-name/`

**Sub-components:**
- `component.blade.php` - Main wrapper
- `header.blade.php` - Header section
- `body.blade.php` - Body section
- `footer.blade.php` - Footer section
- `close.blade.php` - Close button

---

## Changelog

- **v1.0.0** - Initial release with full Bootstrap 5 integration
