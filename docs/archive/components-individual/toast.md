# Toast

> Lightweight notification messages that appear temporarily to provide feedback or information to users.

## Overview

The Toast component displays brief, non-intrusive messages that automatically appear and disappear. Based on Bootstrap 5's toast component, it provides flexible notification functionality with support for avatars, titles, subtitles, auto-hide behavior, and dismissible actions.

**Key Features:**
- Auto-hide with configurable delay
- Optional header with title, subtitle, and avatar
- Manual show/hide control
- Dismissible with close button
- Customizable delay timing
- Header-less variant for simple messages
- ARIA attributes for accessibility
- Bootstrap 5 toast integration
- ID support for programmatic control

**Use Case:** Use toasts for brief notifications like success confirmations, error messages, undo actions, status updates, or any temporary feedback that shouldn't interrupt the user's workflow.

---

## Basic Usage

```blade
<x-tabler::toast show title="Notification">
    Your changes have been saved.
</x-tabler::toast>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string\|null` | `null` | Unique identifier for JavaScript control |
| `show` | `bool` | `false` | Initially show the toast |
| `autohide` | `bool` | `false` | Automatically hide after delay |
| `delay` | `int` | `5000` | Auto-hide delay in milliseconds (when `autohide` is true) |
| `hideHeader` | `bool` | `false` | Hide the header section entirely |
| `avatar` | `string\|null` | `null` | URL to avatar image |
| `title` | `string\|null` | `null` | Toast title text |
| `subtitle` | `string\|null` | `null` | Small subtitle text (typically timestamp) |
| `dismissible` | `bool` | `true` | Show close button in header |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the toast container element. The component automatically includes appropriate ARIA attributes (`role="alert"`, `aria-live="assertive"`, `aria-atomic="true"`).

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Main toast message content (rendered in toast-body) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Positioning Classes:**
- `position-fixed` - Fixed positioning
- `top-0`, `bottom-0` - Vertical positioning
- `start-0`, `end-0` - Horizontal positioning

**Background Colors:**
- `bg-primary`, `bg-success`, `bg-danger`, `bg-warning`, `bg-info` - Colored backgrounds
- `text-white` - White text (for dark backgrounds)

**Sizing:**
- `w-100` - Full width
- `mw-100` - Max width 100%

**Spacing:**
- `m-3`, `mt-3`, `mb-3` - Margin utilities
- `p-3` - Padding utilities

---

## Examples

### Basic Example

```blade
<x-tabler::toast show title="Notification">
    Operation completed successfully.
</x-tabler::toast>
```

**Output:** A toast notification with a header containing the title and a close button.

---

### Auto-Hide Toast

```blade
<x-tabler::toast
    show
    autohide
    :delay="3000"
    title="Auto-closing">
    This message will disappear in 3 seconds.
</x-tabler::toast>
```

**Output:** Toast automatically hides after 3 seconds.

---

### With Avatar

```blade
<x-tabler::toast
    show
    avatar="/images/user-avatar.jpg"
    title="John Doe"
    subtitle="2 mins ago">
    Commented on your post.
</x-tabler::toast>
```

**Output:** Toast with user avatar, name, and timestamp.

---

### Header-less Toast

```blade
<x-tabler::toast show :hide-header="true">
    Simple message without header.
</x-tabler::toast>
```

**Output:** Minimal toast showing only the message content.

---

### Non-Dismissible Toast

```blade
<x-tabler::toast
    show
    :dismissible="false"
    title="System Update">
    Please wait while we update the system...
</x-tabler::toast>
```

**Output:** Toast without a close button.

---

### With Custom ID

```blade
<x-tabler::toast
    id="save-notification"
    show
    title="Saved">
    Document saved successfully.
</x-tabler::toast>
```

**Output:** Toast with unique ID for JavaScript manipulation.

---

### Colored Background

```blade
<x-tabler::toast
    show
    title="Success"
    class="bg-success text-white">
    <strong>Well done!</strong> Your action was successful.
</x-tabler::toast>

<x-tabler::toast
    show
    title="Error"
    class="bg-danger text-white">
    <strong>Error!</strong> Something went wrong.
</x-tabler::toast>
```

**Output:** Colored toast notifications matching alert types.

---

### Positioned Toast

```blade
<x-tabler::toast
    show
    autohide
    title="Notification"
    class="position-fixed top-0 end-0 m-3">
    Notification in top-right corner.
</x-tabler::toast>
```

**Output:** Toast positioned at the top-right of the screen.

---

### Long Delay Toast

```blade
<x-tabler::toast
    show
    autohide
    :delay="10000"
    title="Important"
    subtitle="Just now">
    This message will stay visible for 10 seconds.
</x-tabler::toast>
```

**Output:** Toast that stays visible for 10 seconds before auto-hiding.

---

### Rich Content Toast

```blade
<x-tabler::toast
    show
    avatar="/images/app-icon.png"
    title="New Feature Available"
    subtitle="5 mins ago">
    <p class="mb-2">We've added dark mode to the application!</p>
    <div class="mt-2">
        <a href="#" class="btn btn-primary btn-sm">Learn More</a>
        <a href="#" class="btn btn-sm">Dismiss</a>
    </div>
</x-tabler::toast>
```

**Output:** Toast with formatted content and action buttons.

---

### Multiple Toasts (Toast Container)

```blade
<div class="toast-container position-fixed top-0 end-0 p-3">
    <x-tabler::toast show autohide title="First Notification">
        First message
    </x-tabler::toast>

    <x-tabler::toast show autohide title="Second Notification">
        Second message
    </x-tabler::toast>

    <x-tabler::toast show autohide title="Third Notification">
        Third message
    </x-tabler::toast>
</div>
```

**Output:** Multiple stacked toasts in a container.

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to close button (when dismissible)
- **Enter/Space:** Activates close button when focused
- **Escape:** Can be configured to dismiss toast (requires JavaScript)

### ARIA Attributes

The component automatically includes:
- `role="alert"`: Identifies the element as an alert
- `aria-live="assertive"`: Announces content immediately to screen readers
- `aria-atomic="true"`: Screen readers announce the entire content as a whole
- `aria-label="Close"`: Accessible label for the close button

### Screen Reader Support
- Toasts are announced immediately when shown
- Title and content are read together
- Close button is properly labeled
- Avatar images should have alt text (add manually if needed)

### Best Practices
- Keep messages concise (screen readers read entire content)
- Don't rely solely on color to convey meaning
- Ensure auto-hide delay is sufficient for reading (minimum 5 seconds)
- Use title to provide context
- Consider users who need more time to read

**Example:**
```blade
{{-- Accessible toast with sufficient delay --}}
<x-tabler::toast
    show
    autohide
    :delay="8000"
    title="Form Submitted"
    subtitle="Just now">
    Your form has been submitted successfully. You will receive a confirmation email shortly.
</x-tabler::toast>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS + JS required for toast functionality)
- JavaScript enabled (for show/hide functionality)
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- **Safari < 14:** May not animate smoothly
- **Mobile browsers:** Ensure toasts don't block important content
- **Touch devices:** Close button may need larger tap target (add `btn-lg` class if needed)

---

## Events & Interactivity

### JavaScript Integration

**Show toast programmatically:**
```html
<x-tabler::toast id="myToast" title="Notification">
    Message content
</x-tabler::toast>

<script>
const toastElement = document.getElementById('myToast');
const toast = new bootstrap.Toast(toastElement);
toast.show();
</script>
```

**Hide toast programmatically:**
```html
<script>
const toastElement = document.getElementById('myToast');
const toast = bootstrap.Toast.getInstance(toastElement);
toast.hide();
</script>
```

**Listen to toast events:**
```html
<script>
const toastElement = document.getElementById('myToast');
toastElement.addEventListener('shown.bs.toast', () => {
    console.log('Toast shown');
});
toastElement.addEventListener('hidden.bs.toast', () => {
    console.log('Toast hidden');
});
</script>
```

### Framework Integration

**Livewire:**
```blade
<div>
    <x-tabler::toast
        id="livewire-toast"
        :show="$showToast"
        autohide
        title="Success">
        {{ $toastMessage }}
    </x-tabler::toast>

    <button wire:click="triggerToast">Show Toast</button>
</div>
```

```php
class ToastComponent extends Component
{
    public $showToast = false;
    public $toastMessage = '';

    public function triggerToast()
    {
        $this->showToast = true;
        $this->toastMessage = 'Action completed!';

        $this->dispatch('toast-shown');
    }
}
```

**Alpine.js:**
```blade
<div x-data="{ show: false, message: '' }">
    <x-tabler::toast
        id="alpine-toast"
        x-show="show"
        title="Notification">
        <span x-text="message"></span>
    </x-tabler::toast>

    <button @click="show = true; message = 'Hello from Alpine!'">
        Show Toast
    </button>
</div>
```

**Inertia.js:**
```blade
<x-tabler::toast
    :show="session('toast.show', false)"
    autohide
    :title="session('toast.title')"
    class="position-fixed top-0 end-0 m-3">
    {{ session('toast.message') }}
</x-tabler::toast>
```

```php
// In your controller
return redirect()->route('dashboard')
    ->with('toast', [
        'show' => true,
        'title' => 'Success',
        'message' => 'Profile updated successfully!'
    ]);
```

---

## Troubleshooting

### Common Issues

**Issue: Toast not showing**
- ✅ Ensure `show` prop is set to `true`
- ✅ Check Bootstrap JavaScript is loaded
- ✅ Verify no CSS `display: none` is overriding
- ✅ Check browser console for JavaScript errors
- ✅ Initialize with `new bootstrap.Toast()` if controlling via JS

**Issue: Auto-hide not working**
- ✅ Set both `autohide` prop and `delay` value
- ✅ Ensure Bootstrap Toast JavaScript is initialized
- ✅ Check `data-bs-autohide` attribute is present in HTML
- ✅ Verify no JavaScript errors preventing execution

**Issue: Toast not positioned correctly**
- ❌ Wrong: Setting position inline without container
- ✅ Right: Use toast container with proper positioning classes
- ✅ Add `position-fixed` and position utilities (`top-0`, `end-0`)
- ✅ Wrap multiple toasts in `.toast-container`

**Issue: Close button not working**
- ✅ Ensure `dismissible` is `true` (default)
- ✅ Bootstrap JavaScript must be loaded
- ✅ Check `data-bs-dismiss="toast"` attribute is present
- ✅ No JavaScript errors in console

**Issue: Avatar not displaying**
- ✅ Verify image URL is correct and accessible
- ✅ Check image file exists at specified path
- ✅ Use absolute URLs or correct relative paths
- ✅ Check for CORS issues if loading from external domain

**Issue: Content overflow**
- ✅ Add `text-break` class for long words
- ✅ Set `max-width` on toast container
- ✅ Use responsive classes for different screen sizes
- ✅ Test content on mobile viewports

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check `data-bs-*` attributes are correctly applied
- Verify Bootstrap CSS and JS versions match
- Test with minimal example first
- Use browser console to manually trigger `bootstrap.Toast` methods
- Check Network tab for failed image/asset requests

---

## Real-World Examples

### Example 1: Success Notification System

```blade
{{-- In your layout file --}}
<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1080;">
    @if(session('success'))
        <x-tabler::toast
            id="success-toast"
            show
            autohide
            :delay="5000"
            title="Success"
            class="bg-success text-white">
            {{ session('success') }}
        </x-tabler::toast>
    @endif
</div>
```

```php
// In your controller
public function store(Request $request)
{
    // ... save logic

    return redirect()->route('items.index')
        ->with('success', 'Item created successfully!');
}
```

**Use Case:** Display success messages after form submissions or database operations.

---

### Example 2: Undo Action Toast

```blade
<div x-data="{
    showUndo: false,
    deletedItem: null,
    deleteItem(id) {
        this.deletedItem = id;
        this.showUndo = true;

        // Soft delete or mark for deletion
        fetch(`/items/${id}/soft-delete`, { method: 'POST' });

        // Auto-confirm after 10 seconds
        setTimeout(() => {
            if (this.showUndo) {
                this.confirmDelete();
            }
        }, 10000);
    },
    undoDelete() {
        fetch(`/items/${this.deletedItem}/restore`, { method: 'POST' });
        this.showUndo = false;
    },
    confirmDelete() {
        this.showUndo = false;
    }
}">
    {{-- Toast Container --}}
    <div class="toast-container position-fixed bottom-0 start-0 p-3">
        <x-tabler::toast
            x-show="showUndo"
            :dismissible="false"
            title="Item Deleted"
            class="bg-dark text-white">
            <div class="d-flex justify-content-between align-items-center">
                <span>Item moved to trash</span>
                <button
                    type="button"
                    class="btn btn-sm btn-primary ms-3"
                    @click="undoDelete">
                    Undo
                </button>
            </div>
        </x-tabler::toast>
    </div>

    {{-- Delete Button --}}
    <button @click="deleteItem(123)" class="btn btn-danger">
        Delete Item
    </button>
</div>
```

**Use Case:** Provide undo functionality for destructive actions with a time window for reversal.

---

### Example 3: Multi-Step Form Progress

```blade
<div x-data="{
    currentStep: 1,
    showToast: false,
    toastMessage: '',
    nextStep() {
        this.currentStep++;
        this.showToast = true;
        this.toastMessage = `Step ${this.currentStep} completed`;
    }
}">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <x-tabler::toast
            x-show="showToast"
            autohide
            :delay="3000"
            title="Progress Saved"
            subtitle="Just now"
            @click="showToast = false">
            <span x-text="toastMessage"></span>
        </x-tabler::toast>
    </div>

    {{-- Form steps --}}
    <div class="card">
        <div class="card-body">
            <template x-if="currentStep === 1">
                <div>
                    <h3>Step 1: Personal Info</h3>
                    <button @click="nextStep" class="btn btn-primary">
                        Continue
                    </button>
                </div>
            </template>

            <template x-if="currentStep === 2">
                <div>
                    <h3>Step 2: Address</h3>
                    <button @click="nextStep" class="btn btn-primary">
                        Continue
                    </button>
                </div>
            </template>
        </div>
    </div>
</div>
```

**Use Case:** Show progress confirmations in multi-step forms without interrupting the workflow.

---

### Example 4: Real-Time Notifications

```blade
<div
    x-data="{
        notifications: [],
        addNotification(message, avatar, title) {
            const id = Date.now();
            this.notifications.push({ id, message, avatar, title });

            // Remove after 5 seconds
            setTimeout(() => {
                this.notifications = this.notifications.filter(n => n.id !== id);
            }, 5000);
        }
    }"
    @notify.window="addNotification($event.detail.message, $event.detail.avatar, $event.detail.title)">

    <div class="toast-container position-fixed top-0 end-0 p-3">
        <template x-for="notification in notifications" :key="notification.id">
            <x-tabler::toast
                show
                autohide
                :delay="5000"
                x-bind:avatar="notification.avatar"
                x-bind:title="notification.title"
                subtitle="Just now">
                <span x-text="notification.message"></span>
            </x-tabler::toast>
        </template>
    </div>
</div>

{{-- Trigger from anywhere --}}
<script>
function notifyUser(message, title, avatar) {
    window.dispatchEvent(new CustomEvent('notify', {
        detail: { message, title, avatar }
    }));
}

// Example usage
// notifyUser('New message received', 'John Doe', '/images/john.jpg');
</script>
```

**Use Case:** Display real-time notifications from WebSocket events, Pusher, or AJAX polling.

---

### Example 5: Form Validation Feedback

```blade
<form
    method="POST"
    action="/profile"
    x-data="{
        showToast: false,
        toastType: 'success',
        toastMessage: ''
    }"
    @submit.prevent="
        fetch($el.action, {
            method: 'POST',
            body: new FormData($el)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                toastType = 'success';
                toastMessage = data.message;
            } else {
                toastType = 'danger';
                toastMessage = data.error;
            }
            showToast = true;
        })
    ">
    @csrf

    {{-- Toast Container --}}
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <x-tabler::toast
            x-show="showToast"
            autohide
            :delay="5000"
            x-bind:class="'bg-' + toastType + ' text-white'"
            title="Form Status">
            <span x-text="toastMessage"></span>
        </x-tabler::toast>
    </div>

    {{-- Form fields --}}
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
```

**Use Case:** Provide non-intrusive feedback for form submissions without full page reloads.

---

### Example 6: Cookie Consent Notice

```blade
<div x-data="{ showConsent: !localStorage.getItem('cookieConsent') }">
    <x-tabler::toast
        x-show="showConsent"
        :dismissible="false"
        hide-header
        class="position-fixed bottom-0 start-0 m-3 mw-100">
        <div class="d-flex flex-column gap-2">
            <p class="mb-2">
                We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
            </p>
            <div class="d-flex gap-2">
                <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    @click="localStorage.setItem('cookieConsent', 'true'); showConsent = false">
                    Accept
                </button>
                <button
                    type="button"
                    class="btn btn-sm"
                    @click="showConsent = false">
                    Decline
                </button>
            </div>
        </div>
    </x-tabler::toast>
</div>
```

**Use Case:** Display cookie consent or other persistent notices that users can accept or dismiss.

---

### Example 7: File Upload Progress

```blade
<div x-data="{
    uploading: false,
    progress: 0,
    fileName: '',
    uploadFile(event) {
        const file = event.target.files[0];
        if (!file) return;

        this.uploading = true;
        this.fileName = file.name;
        this.progress = 0;

        const formData = new FormData();
        formData.append('file', file);

        const xhr = new XMLHttpRequest();

        xhr.upload.addEventListener('progress', (e) => {
            if (e.lengthComputable) {
                this.progress = (e.loaded / e.total) * 100;
            }
        });

        xhr.addEventListener('load', () => {
            this.uploading = false;
            if (xhr.status === 200) {
                this.progress = 100;
            }
        });

        xhr.open('POST', '/upload');
        xhr.send(formData);
    }
}">
    <input type="file" @change="uploadFile" class="form-control">

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <x-tabler::toast
            x-show="uploading"
            :dismissible="false"
            title="Uploading">
            <div>
                <p class="mb-2" x-text="fileName"></p>
                <x-tabler::progress>
                    <x-tabler::progress-bar
                        x-bind:style="`width: ${progress}%`"
                        color="primary">
                    </x-tabler::progress-bar>
                </x-tabler::progress>
                <small class="text-muted" x-text="`${Math.round(progress)}%`"></small>
            </div>
        </x-tabler::toast>
    </div>
</div>
```

**Use Case:** Show upload progress in a non-blocking toast notification.

---

### Example 8: Offline/Online Status

```blade
<div x-data="{
    isOnline: navigator.onLine,
    showToast: false
}"
@online.window="isOnline = true; showToast = true"
@offline.window="isOnline = false; showToast = true">

    <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
        <x-tabler::toast
            x-show="showToast"
            autohide
            :delay="4000"
            x-bind:class="isOnline ? 'bg-success text-white' : 'bg-danger text-white'"
            x-bind:title="isOnline ? 'Back Online' : 'No Connection'"
            @hidden.bs.toast="showToast = false">
            <span x-text="isOnline ? 'Your internet connection has been restored.' : 'You are currently offline.'"></span>
        </x-tabler::toast>
    </div>
</div>
```

**Use Case:** Notify users about connectivity status changes in web applications.

---

### Example 9: Shopping Cart Updates

```blade
<div x-data="{
    cartToast: false,
    cartMessage: '',
    addedItem: '',
    addToCart(itemName) {
        this.addedItem = itemName;
        this.cartToast = true;

        // Simulate API call
        fetch('/cart/add', { method: 'POST' });
    }
}">
    <div class="toast-container position-fixed top-0 end-0 p-3">
        <x-tabler::toast
            x-show="cartToast"
            autohide
            :delay="4000"
            avatar="/images/cart-icon.png"
            title="Added to Cart"
            class="bg-white">
            <div class="d-flex flex-column gap-2">
                <span x-text="`${addedItem} has been added to your cart.`"></span>
                <div class="d-flex gap-2 mt-2">
                    <a href="/cart" class="btn btn-sm btn-primary">View Cart</a>
                    <button
                        type="button"
                        class="btn btn-sm"
                        @click="cartToast = false">
                        Continue Shopping
                    </button>
                </div>
            </div>
        </x-tabler::toast>
    </div>

    <button @click="addToCart('Wireless Mouse')" class="btn btn-primary">
        Add to Cart
    </button>
</div>
```

**Use Case:** Confirm items added to shopping cart with quick navigation options.

---

### Example 10: Scheduled Task Reminders

```blade
<div x-data="{
    reminders: @js($upcomingReminders ?? []),
    showReminder(reminder) {
        return {
            show: true,
            title: reminder.title,
            time: reminder.time,
            message: reminder.message
        }
    }
}">
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <template x-for="reminder in reminders" :key="reminder.id">
            <x-tabler::toast
                show
                avatar="/images/clock-icon.png"
                x-bind:title="reminder.title"
                x-bind:subtitle="reminder.time">
                <div class="d-flex flex-column gap-2">
                    <span x-text="reminder.message"></span>
                    <div class="d-flex gap-2 mt-2">
                        <button class="btn btn-sm btn-primary">
                            View Details
                        </button>
                        <button class="btn btn-sm">
                            Snooze
                        </button>
                    </div>
                </div>
            </x-tabler::toast>
        </template>
    </div>
</div>
```

**Use Case:** Display scheduled reminders or calendar notifications without interrupting user workflow.

---

## Available Classes

Additional CSS classes you can use via the `class` attribute:

**Layout:**
- `w-100` - Full width toast
- `mw-100` - Maximum width 100%
- `d-block` - Display as block

**Positioning:**
- `position-fixed`, `position-absolute` - Positioning type
- `top-0`, `bottom-0` - Vertical position
- `start-0`, `end-0` - Horizontal position (LTR/RTL aware)
- `start-50`, `top-50` - Center positioning
- `translate-middle`, `translate-middle-x`, `translate-middle-y` - Center alignment

**Background Colors:**
- `bg-primary`, `bg-secondary` - Theme colors
- `bg-success`, `bg-danger`, `bg-warning`, `bg-info` - Status colors
- `bg-white`, `bg-light`, `bg-dark` - Neutral colors

**Text Colors:**
- `text-white`, `text-dark` - Text contrast
- `text-muted` - Subdued text

**Spacing:**
- `m-2`, `m-3`, `m-4` - Margin
- `p-2`, `p-3`, `p-4` - Padding
- `mt-2`, `mb-2`, `ms-2`, `me-2` - Directional spacing

**Effects:**
- `shadow-sm`, `shadow`, `shadow-lg` - Drop shadows
- `opacity-75`, `opacity-50` - Transparency

**Example:**
```blade
<x-tabler::toast
    show
    title="Notification"
    class="position-fixed top-0 end-0 m-3 shadow-lg bg-primary text-white">
    Styled notification message
</x-tabler::toast>
```

---

## Performance Considerations

### Component Weight
- Base component: ~300-400 bytes rendered HTML
- With header: +150 bytes
- With avatar: +100 bytes + image size
- Bootstrap Toast JS: ~2KB (shared across all toasts)

### Best Practices
- Limit simultaneous toasts (3-5 maximum recommended)
- Use `autohide` to prevent toast accumulation
- Lazy load avatar images with `loading="lazy"`
- Remove dismissed toasts from DOM with JavaScript
- Use toast containers to manage multiple toasts efficiently
- Consider using a toast service/manager for complex applications

### Optimization Tips
- Preconnect to avatar image domains
- Use appropriately sized avatar images (24x24 or 32x32px)
- Implement virtual scrolling for many notifications
- Cache toast markup for repeated messages
- Use CSS `will-change` sparingly for animations
- Debounce rapid toast triggers

**Example Toast Manager:**
```javascript
class ToastManager {
    constructor(maxToasts = 5) {
        this.maxToasts = maxToasts;
        this.toasts = [];
    }

    show(message, title) {
        // Remove oldest if at limit
        if (this.toasts.length >= this.maxToasts) {
            const oldest = this.toasts.shift();
            oldest.remove();
        }

        // Add new toast
        // Implementation here...
    }
}
```

---

## Notes

- Toasts require Bootstrap 5 JavaScript to function
- The `show` class controls visibility; use JavaScript for dynamic control
- Auto-hide only works when `autohide` is `true`
- Avatar images should be square for best appearance
- Toasts stack naturally when using a toast container
- Z-index is important for overlay positioning (use 1080+ for fixed toasts)
- Consider using a centralized notification system for complex applications
- Subtitle is typically used for timestamps or secondary information
- Header can be completely hidden for minimal toast design

---

## Related Components

- [Alert](./alert.md) - For more prominent, persistent messages
- [Badge](./badge.md) - For small status indicators within toasts
- [Avatar](./avatar.md) - Avatar styling (can be used in toast headers)
- [Button](./button.md) - For action buttons within toast content
- [Progress](./progress.md) - For showing progress within toasts

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/toast.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with full Bootstrap 5 toast integration
  - Avatar support in header
  - Auto-hide functionality with configurable delay
  - Title and subtitle support
  - Dismissible close button
  - Header-less variant
  - ARIA accessibility attributes
  - Full attribute pass-through support
