# Offcanvas

A sidebar panel component that slides in from the edge of the viewport, perfect for navigation menus, filters, shopping carts, and additional content that doesn't need to be visible at all times.

## Overview

- Slides in from any edge: start (left), end (right), top, or bottom
- Optional backdrop overlay with configurable behavior
- Body scroll control while offcanvas is open
- Multiple size variants for start/end placements
- Bootstrap-powered toggle and dismiss functionality
- Customizable header, body, and footer sections
- Flexible slot-based content structure
- Built-in close button with accessibility support
- Seamless integration with Bootstrap's data attributes
- Responsive and mobile-friendly design
- Full keyboard navigation support

## Basic Usage

```blade
{{-- Define the offcanvas --}}
<x-tabler::offcanvas id="myOffcanvas" title="Menu">
    <p>Offcanvas content here</p>
</x-tabler::offcanvas>

{{-- Trigger button --}}
<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#myOffcanvas">
    Open Menu
</button>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `id` | `string` | - | Yes | Unique identifier for the offcanvas (required for Bootstrap toggle functionality) |
| `title` | `string\|null` | `null` | No | Title text displayed in the default header |
| `placement` | `string` | `'start'` | No | Position where offcanvas appears: `'start'` (left), `'end'` (right), `'top'`, or `'bottom'` |
| `backdrop` | `bool` | `true` | No | Show backdrop overlay behind the offcanvas |
| `scroll` | `bool` | `false` | No | Allow body scrolling when offcanvas is open |
| `class` | `string` | `''` | No | Additional CSS classes for sizing and styling (e.g., `'offcanvas-lg'`, `'bg-dark'`) |

## Slots

| Slot | Description |
|------|-------------|
| `default` | Main content area displayed in the offcanvas body. This is the primary content slot. |
| `title` | Custom title markup. Replaces the title prop but keeps the default header structure. Use for complex title layouts. |
| `header` | Custom header content. Completely replaces the default header including title and close button. Use when you need full header control. |
| `footer` | Optional footer content displayed below the body. Perfect for action buttons or additional information. |

## CSS Classes

**Placement Classes:**
- `offcanvas-start` - Slides from left side (default, applied automatically)
- `offcanvas-end` - Slides from right side
- `offcanvas-top` - Slides from top
- `offcanvas-bottom` - Slides from bottom

**Size Modifiers (for start/end placements):**
- `offcanvas-sm` - Small offcanvas (320px width)
- `offcanvas-md` - Medium offcanvas (400px width)
- `offcanvas-lg` - Large offcanvas (500px width)
- `offcanvas-xl` - Extra large offcanvas (800px width)
- `w-100`, `w-75`, `w-50`, `w-25` - Custom width percentages

**Height Modifiers (for top/bottom placements):**
- `h-auto` - Auto height based on content
- `h-25`, `h-50`, `h-75`, `h-100` - Height percentages
- `vh-100` - Full viewport height

**Background Colors:**
- `bg-white` - White background (default)
- `bg-light` - Light gray background
- `bg-dark` - Dark background
- `bg-primary`, `bg-secondary`, `bg-success`, `bg-danger`, `bg-warning`, `bg-info` - Colored backgrounds
- `bg-{color}-lt` - Light color variants (e.g., `bg-primary-lt`)

**Text Colors:**
- `text-white` - White text (use with dark backgrounds)
- `text-dark` - Dark text
- `text-muted` - Muted/secondary text

**State Classes (handled by Bootstrap):**
- `show` - Display the offcanvas (managed by Bootstrap JS)
- `showing` - Animation state during opening
- `hiding` - Animation state during closing

**Component Structure Classes:**
- `offcanvas-header` - Header container styling
- `offcanvas-title` - Title text styling
- `offcanvas-body` - Main content area with padding and scrolling
- `offcanvas-footer` - Footer area (custom, not standard Bootstrap)

## Examples

### Basic Offcanvas (Start Placement)

```blade
<x-tabler::offcanvas id="basicOffcanvas" title="Navigation Menu">
    <ul class="list-unstyled">
        <li><a href="/" class="d-block py-2">Home</a></li>
        <li><a href="/about" class="d-block py-2">About</a></li>
        <li><a href="/services" class="d-block py-2">Services</a></li>
        <li><a href="/contact" class="d-block py-2">Contact</a></li>
    </ul>
</x-tabler::offcanvas>

<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#basicOffcanvas">
    <i class="ti ti-menu-2"></i> Open Menu
</button>
```

### End Placement (Right Side)

```blade
<x-tabler::offcanvas id="settingsPanel" title="Settings" placement="end">
    <div class="mb-3">
        <label class="form-label">Theme</label>
        <select class="form-select">
            <option>Light</option>
            <option>Dark</option>
            <option>Auto</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-check">
            <input type="checkbox" class="form-check-input">
            <span class="form-check-label">Enable notifications</span>
        </label>
    </div>
</x-tabler::offcanvas>

<button class="btn" data-bs-toggle="offcanvas" data-bs-target="#settingsPanel">
    <i class="ti ti-settings"></i>
</button>
```

### Top Placement (Notification Banner)

```blade
<x-tabler::offcanvas id="notification" placement="top" class="h-auto">
    <div class="alert alert-info mb-0">
        <h4 class="alert-title">New Update Available!</h4>
        <p class="mb-0">Version 2.0 is now available with exciting new features.</p>
    </div>
</x-tabler::offcanvas>

<button class="btn btn-info" data-bs-toggle="offcanvas" data-bs-target="#notification">
    Show Notification
</button>
```

### Bottom Placement (Cookie Consent)

```blade
<x-tabler::offcanvas id="cookieConsent" placement="bottom" class="h-auto">
    <div class="container-xl">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="mb-1">🍪 We use cookies</h3>
                <p class="text-secondary mb-0">
                    We use cookies to improve your experience. By continuing to visit this site you agree to our use of cookies.
                </p>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" data-bs-dismiss="offcanvas">Accept</button>
                <button class="btn" data-bs-dismiss="offcanvas">Decline</button>
            </div>
        </div>
    </div>
</x-tabler::offcanvas>
```

### With Backdrop (Default)

```blade
<x-tabler::offcanvas id="withBackdrop" title="Modal-like Panel" placement="end">
    <p>This offcanvas has a backdrop overlay that dims the page content behind it.</p>
    <p>Clicking the backdrop will close the offcanvas.</p>
</x-tabler::offcanvas>

<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#withBackdrop">
    Open with Backdrop
</button>
```

### Without Backdrop

```blade
<x-tabler::offcanvas
    id="noBackdrop"
    title="No Backdrop Panel"
    :backdrop="false"
    placement="end"
>
    <p>This offcanvas has no backdrop overlay.</p>
    <p>You can still interact with the page content while this panel is open.</p>
    <p>Click the close button or press Escape to dismiss.</p>
</x-tabler::offcanvas>

<button class="btn btn-secondary" data-bs-toggle="offcanvas" data-bs-target="#noBackdrop">
    Open without Backdrop
</button>
```

### With Body Scrolling

```blade
<x-tabler::offcanvas
    id="scrollableBody"
    title="Scrollable Body Panel"
    :scroll="true"
    placement="end"
>
    <p>With body scrolling enabled, you can scroll the main page content even when this offcanvas is open.</p>
    <p>This is useful for reference panels or side-by-side comparison views.</p>
</x-tabler::offcanvas>

<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#scrollableBody">
    Open with Body Scroll
</button>
```

### Navigation Menu with Icons

```blade
<x-tabler::offcanvas id="navMenu" title="Main Menu">
    <nav class="nav flex-column">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="ti ti-home me-2"></i> Dashboard
        </a>
        <a class="nav-link" href="{{ route('projects') }}">
            <i class="ti ti-briefcase me-2"></i> Projects
        </a>
        <a class="nav-link" href="{{ route('team') }}">
            <i class="ti ti-users me-2"></i> Team
        </a>
        <a class="nav-link" href="{{ route('reports') }}">
            <i class="ti ti-chart-bar me-2"></i> Reports
        </a>
        <hr>
        <a class="nav-link" href="{{ route('settings') }}">
            <i class="ti ti-settings me-2"></i> Settings
        </a>
        <a class="nav-link" href="{{ route('logout') }}">
            <i class="ti ti-logout me-2"></i> Logout
        </a>
    </nav>
</x-tabler::offcanvas>

<button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#navMenu">
    <i class="ti ti-menu-2"></i>
</button>
```

### Shopping Cart

```blade
<x-tabler::offcanvas id="shoppingCart" title="Shopping Cart" placement="end" class="offcanvas-lg">
    @foreach($cartItems as $item)
        <div class="d-flex mb-3 pb-3 border-bottom">
            <img src="{{ $item->image }}" alt="{{ $item->name }}" class="me-3" style="width: 80px; height: 80px; object-fit: cover;">
            <div class="flex-fill">
                <h4 class="mb-1">{{ $item->name }}</h4>
                <div class="text-secondary">Qty: {{ $item->quantity }}</div>
                <div class="mt-2">
                    <strong>${{ number_format($item->price * $item->quantity, 2) }}</strong>
                </div>
            </div>
            <button class="btn btn-icon btn-ghost-danger">
                <i class="ti ti-trash"></i>
            </button>
        </div>
    @endforeach

    <x-slot:footer>
        <div class="offcanvas-footer border-top p-3">
            <div class="d-flex justify-content-between mb-3">
                <strong>Total:</strong>
                <strong>${{ number_format($total, 2) }}</strong>
            </div>
            <a href="{{ route('checkout') }}" class="btn btn-primary w-100 mb-2">
                Proceed to Checkout
            </a>
            <button class="btn w-100" data-bs-dismiss="offcanvas">
                Continue Shopping
            </button>
        </div>
    </x-slot:footer>
</x-tabler::offcanvas>

<button class="btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#shoppingCart">
    <i class="ti ti-shopping-cart"></i>
    <span class="badge bg-red badge-notification">{{ $cartCount }}</span>
</button>
```

### Filter Panel

```blade
<x-tabler::offcanvas id="filterPanel" title="Filters" placement="end">
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-select">
            <option>All Categories</option>
            <option>Electronics</option>
            <option>Clothing</option>
            <option>Books</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Price Range</label>
        <div class="row g-2">
            <div class="col">
                <input type="number" class="form-control" placeholder="Min" value="0">
            </div>
            <div class="col">
                <input type="number" class="form-control" placeholder="Max" value="1000">
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Rating</label>
        <div class="form-selectgroup">
            <label class="form-selectgroup-item">
                <input type="radio" name="rating" class="form-selectgroup-input">
                <span class="form-selectgroup-label">⭐⭐⭐⭐⭐</span>
            </label>
            <label class="form-selectgroup-item">
                <input type="radio" name="rating" class="form-selectgroup-input">
                <span class="form-selectgroup-label">⭐⭐⭐⭐+</span>
            </label>
            <label class="form-selectgroup-item">
                <input type="radio" name="rating" class="form-selectgroup-input">
                <span class="form-selectgroup-label">⭐⭐⭐+</span>
            </label>
        </div>
    </div>

    <x-slot:footer>
        <div class="offcanvas-footer border-top p-3">
            <button class="btn btn-primary w-100 mb-2">Apply Filters</button>
            <button class="btn w-100">Clear All</button>
        </div>
    </x-slot:footer>
</x-tabler::offcanvas>

<button class="btn" data-bs-toggle="offcanvas" data-bs-target="#filterPanel">
    <i class="ti ti-filter"></i> Filters
</button>
```

### Notification Center

```blade
<x-tabler::offcanvas id="notifications" title="Notifications" placement="end">
    @foreach($notifications as $notification)
        <div class="list-group-item">
            <div class="row align-items-center">
                <div class="col-auto">
                    <span class="status-dot status-dot-animated bg-{{ $notification->color }}"></span>
                </div>
                <div class="col">
                    <div class="text-truncate">
                        <strong>{{ $notification->title }}</strong>
                    </div>
                    <div class="text-secondary">{{ $notification->message }}</div>
                    <div class="text-secondary small mt-1">
                        {{ $notification->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="col-auto">
                    <button class="btn btn-icon btn-ghost-secondary">
                        <i class="ti ti-x"></i>
                    </button>
                </div>
            </div>
        </div>
    @endforeach

    <x-slot:footer>
        <div class="offcanvas-footer border-top p-3 text-center">
            <a href="{{ route('notifications') }}" class="text-secondary">
                View all notifications
            </a>
        </div>
    </x-slot:footer>
</x-tabler::offcanvas>

<button class="btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#notifications">
    <i class="ti ti-bell"></i>
    @if($unreadCount > 0)
        <span class="badge bg-red badge-notification">{{ $unreadCount }}</span>
    @endif
</button>
```

### Settings Panel with Dark Theme

```blade
<x-tabler::offcanvas
    id="settingsPanel"
    placement="end"
    class="offcanvas-lg bg-dark text-white"
>
    <x-slot:header>
        <div class="offcanvas-header bg-dark text-white border-bottom border-dark">
            <h2 class="offcanvas-title">
                <i class="ti ti-settings me-2"></i> Application Settings
            </h2>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>
    </x-slot:header>

    <div class="mb-3">
        <h3 class="mb-3">Appearance</h3>
        <div class="form-selectgroup">
            <label class="form-selectgroup-item">
                <input type="radio" name="theme" class="form-selectgroup-input" checked>
                <span class="form-selectgroup-label">
                    <i class="ti ti-sun me-2"></i> Light
                </span>
            </label>
            <label class="form-selectgroup-item">
                <input type="radio" name="theme" class="form-selectgroup-input">
                <span class="form-selectgroup-label">
                    <i class="ti ti-moon me-2"></i> Dark
                </span>
            </label>
            <label class="form-selectgroup-item">
                <input type="radio" name="theme" class="form-selectgroup-input">
                <span class="form-selectgroup-label">
                    <i class="ti ti-device-laptop me-2"></i> Auto
                </span>
            </label>
        </div>
    </div>

    <hr class="border-dark">

    <div class="mb-3">
        <h3 class="mb-3">Notifications</h3>
        <label class="form-check form-switch mb-2">
            <input type="checkbox" class="form-check-input" checked>
            <span class="form-check-label">Email notifications</span>
        </label>
        <label class="form-check form-switch mb-2">
            <input type="checkbox" class="form-check-input" checked>
            <span class="form-check-label">Push notifications</span>
        </label>
        <label class="form-check form-switch">
            <input type="checkbox" class="form-check-input">
            <span class="form-check-label">SMS notifications</span>
        </label>
    </div>

    <x-slot:footer>
        <div class="offcanvas-footer border-top border-dark p-3 bg-dark">
            <button class="btn btn-white w-100 mb-2">Save Changes</button>
            <button class="btn w-100 text-white" data-bs-dismiss="offcanvas">Cancel</button>
        </div>
    </x-slot:footer>
</x-tabler::offcanvas>
```

## Accessibility

The Offcanvas component follows accessibility best practices:

- **Keyboard Navigation:**
  - Can be dismissed with the `Escape` key
  - Tab key navigation is trapped within the offcanvas when open
  - Focus automatically moves to the offcanvas when opened
  - Focus returns to the trigger element when closed

- **ARIA Attributes:**
  - `tabindex="-1"` on the offcanvas container for focus management
  - `aria-labelledby` references the title element for screen readers
  - `aria-label="Close"` on the close button for clear purpose
  - `data-bs-dismiss="offcanvas"` marks dismissible elements

- **Screen Reader Support:**
  - The title is announced when the offcanvas opens
  - Close button is clearly identified as "Close"
  - Content within the offcanvas is fully navigable by screen readers
  - Backdrop (when enabled) prevents interaction with background content

- **Best Practices:**
  - Always provide a descriptive `title` or custom header
  - Ensure sufficient color contrast, especially with custom backgrounds
  - Keep offcanvas content focused and task-oriented
  - Provide clear close/dismiss actions
  - Test keyboard navigation flow
  - Consider reduced motion preferences

## Browser Compatibility

The Offcanvas component is compatible with all modern browsers:

- **Chrome 90+** ✅ Full support
- **Firefox 88+** ✅ Full support
- **Safari 14+** ✅ Full support
- **Edge 90+** ✅ Full support
- **Opera 76+** ✅ Full support
- **Mobile browsers** ✅ iOS Safari 14+, Chrome Mobile, Samsung Internet

**Requirements:**
- Bootstrap 5.0+ JavaScript
- CSS transforms and transitions support
- Backdrop requires backdrop-filter support (optional)

**Known Issues:**
- Older browsers may not support smooth animations
- IE11 is not supported (Bootstrap 5 requirement)
- Some mobile browsers may have viewport height issues with `vh` units

## Related Components

- [Modal](./modal.md) - Centered dialog boxes for focused content
- [Dropdown](./dropdown.md) - Contextual menus and options
- [Navbar](./navbar.md) - Top navigation bars
- [Sidebar](./sidebar.md) - Persistent side navigation
- [Button](./button.md) - Trigger buttons for offcanvas

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/offcanvas.blade.php`

## Changelog

### v1.0.0
- Initial release of Offcanvas component
- Support for four placement positions (start, end, top, bottom)
- Configurable backdrop and body scroll options
- Multiple size variants for start/end placements
- Flexible slot system (default, title, header, footer)
- Bootstrap integration with data attributes
- Full keyboard and screen reader accessibility
- Responsive design with mobile support
- Comprehensive theming support with background and text colors
