# Dropdown

> Interactive dropdown menus with support for items, headers, dividers, icons, and badges built on Bootstrap 5.

## Overview

The Dropdown component family provides a complete solution for creating dropdown menus in your Laravel application. Built on Bootstrap 5's dropdown JavaScript plugin, it offers flexible positioning, customizable styling, and comprehensive accessibility support.

**Key Features:**
- Multiple sub-components for flexible composition
- Icon and badge support in menu items
- Dark theme variant
- Card-style menus for rich content
- Arrow indicators for better UX
- Automatic positioning (dropup, dropend, dropstart)
- Bootstrap 5 JavaScript integration
- Built-in accessibility support (ARIA, keyboard navigation)

**Component Family:**
- `<x-tabler::dropdowns.dropdown>` - Main wrapper container
- `<x-tabler::dropdowns.toggle>` - Toggle button/link to trigger menu
- `<x-tabler::dropdowns.menu>` - Menu container for items
- `<x-tabler::dropdowns.item>` - Individual menu item
- `<x-tabler::dropdowns.header>` - Section header to group items
- `<x-tabler::dropdowns.divider>` - Horizontal separator line

---

## Basic Usage

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Dropdown Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('dashboard') }}">
            Dashboard
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="{{ route('logout') }}">
            Logout
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Component Structure

### Main Container: `<x-tabler::dropdowns.dropdown>`

The main wrapper that contains the toggle and menu. Provides dropdown positioning context.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes (use `dropup`, `dropend`, `dropstart` for positioning) |

**Note:** All additional HTML attributes are passed through to the wrapper element.

---

### Toggle Button: `<x-tabler::dropdowns.toggle>`

The button or link that triggers the dropdown menu. Automatically adds required Bootstrap attributes.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string\|null` | `null` | If provided, renders as `<a>` tag instead of `<button>` |
| `color` | `string\|null` | `null` | Button color: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Toggle button text/content |

**Note:** Component intelligently detects if it's styled as a nav-link to avoid adding `.btn` class automatically.

---

### Menu Container: `<x-tabler::dropdowns.menu>`

The container for dropdown menu items, headers, and dividers.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `arrow` | `bool` | `false` | Show arrow pointing to toggle button |
| `dark` | `bool` | `false` | Dark theme variant with dark background |
| `class` | `string` | `''` | Additional CSS classes (use `dropdown-menu-end` for right alignment, `dropdown-menu-card` for card style) |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Menu items, headers, and dividers |

---

### Menu Item: `<x-tabler::dropdowns.item>`

Individual clickable item within the dropdown menu.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string\|null` | `null` | Link URL (required for navigation items) |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `active` | `bool` | `false` | Mark item as active/selected |
| `disabled` | `bool` | `false` | Disable item interaction |
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Item text/content |
| `badge` | No | Badge or count indicator |
| `checkbox` | No | Checkbox for selectable items |

**Note:** Disabled items have proper ARIA attributes and visual styling.

---

### Section Header: `<x-tabler::dropdowns.header>`

Text header to organize menu items into logical groups.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Header text |

---

### Divider: `<x-tabler::dropdowns.divider>`

Horizontal line to visually separate sections within the menu.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

**Note:** This is a self-closing component with no content.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Dropdown Positioning:**
- `dropup` - Open menu above toggle (add to dropdown wrapper)
- `dropend` - Open menu to the right (add to dropdown wrapper)
- `dropstart` - Open menu to the left (add to dropdown wrapper)

**Menu Alignment:**
- `dropdown-menu-end` - Align menu to right edge
- `dropdown-menu-start` - Align menu to left edge (default)

**Menu Styling:**
- `dropdown-menu-arrow` - Show arrow pointing to toggle
- `dropdown-menu-card` - Card-style menu with padding
- `dropdown-menu-columns` - Multi-column layout

**Theme:**
- `bg-dark text-white` - Dark theme menu (or use `dark` prop)

---

## Examples

### Basic Dropdown

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Actions
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('view') }}">
            View
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('edit') }}">
            Edit
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('delete') }}">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### With Icons

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary" icon="menu-2">
        Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('dashboard') }}" icon="home">
            Dashboard
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### With Headers and Dividers

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="secondary">
        My Account
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Account Settings</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('billing') }}" icon="credit-card">
            Billing
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.header>Help & Support</x-tabler::dropdowns.header>
        <x-tabler::dropdowns.item href="{{ route('help') }}" icon="help">
            Help Center
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('contact') }}" icon="mail">
            Contact Us
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Logout
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### With Badges

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Notifications
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('notifications.messages') }}" icon="message">
            Messages
            <x-slot:badge>
                <x-tabler::badge color="danger">5</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item href="{{ route('notifications.alerts') }}" icon="bell">
            Alerts
            <x-slot:badge>
                <x-tabler::badge color="warning">12</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item href="{{ route('notifications.all') }}">
            View All Notifications
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Active and Disabled Items

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Navigation
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('home') }}" active>
            Home (Current)
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('about') }}">
            About
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('services') }}" disabled>
            Services (Coming Soon)
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('contact') }}">
            Contact
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### With Arrow Indicator

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Options
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu arrow>
        <x-tabler::dropdowns.item href="{{ route('option1') }}">
            Option 1
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('option2') }}">
            Option 2
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('option3') }}">
            Option 3
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Right-Aligned Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        User Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Logout
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Dark Theme Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="dark">
        Dark Menu
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu dark>
        <x-tabler::dropdowns.item href="{{ route('home') }}" icon="home">
            Home
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('products') }}" icon="box">
            Products
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('about') }}" icon="info-circle">
            About
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Dropup (Menu Opens Above)

```blade
<x-tabler::dropdowns.dropdown class="dropup">
    <x-tabler::dropdowns.toggle color="primary">
        Open Above
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="#">Action 1</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Action 2</x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="#">Action 3</x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Card-Style Menu with Custom Content

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Rich Content
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-card" style="max-width: 20rem;">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Welcome back!</h4>
                <p class="text-muted">You have 3 new messages and 5 notifications.</p>

                <div class="mt-3">
                    <x-tabler::button href="{{ route('messages') }}" color="primary" size="sm" class="w-100">
                        View Messages
                    </x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Composition Patterns

### Pattern 1: User Profile Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" class="d-flex align-items-center">
        <x-tabler::avatar
            src="{{ auth()->user()->avatar }}"
            size="sm"
            class="me-2" />
        <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end">
        <x-tabler::dropdowns.header>Signed in as {{ auth()->user()->email }}</x-tabler::dropdowns.header>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('profile') }}" icon="user">
            Your Profile
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
            Settings
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.item href="{{ route('billing') }}" icon="credit-card">
            Billing
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('help') }}" icon="help">
            Help & Support
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('logout') }}" icon="logout">
            Sign Out
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Pattern 2: Notification Center

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="bell" class="position-relative">
        <x-tabler::badge color="danger" class="position-absolute top-0 start-100 translate-middle badge-notification">
            {{ $unreadCount }}
        </x-tabler::badge>
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu class="dropdown-menu-end" arrow style="min-width: 25rem;">
        <x-tabler::dropdowns.header>
            <div class="d-flex justify-content-between align-items-center">
                <span>Notifications</span>
                <x-tabler::badge color="primary">{{ $unreadCount }} new</x-tabler::badge>
            </div>
        </x-tabler::dropdowns.header>

        @foreach($notifications as $notification)
            <x-tabler::dropdowns.item
                href="{{ route('notifications.show', $notification) }}"
                :active="!$notification->read_at">
                <div class="d-flex">
                    <div>
                        <x-tabler::avatar :src="$notification->sender->avatar" size="sm" class="me-2" />
                    </div>
                    <div class="flex-fill">
                        <div>{{ $notification->title }}</div>
                        <div class="text-muted small">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                </div>
            </x-tabler::dropdowns.item>
        @endforeach

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('notifications.index') }}" class="text-center">
            View All Notifications
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

### Pattern 3: Action Menu for Table Rows

```blade
@foreach($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->status }}</td>
        <td class="text-end">
            <x-tabler::dropdowns.dropdown>
                <x-tabler::dropdowns.toggle color="light" size="sm" icon="dots-vertical" />

                <x-tabler::dropdowns.menu class="dropdown-menu-end">
                    <x-tabler::dropdowns.item href="{{ route('items.show', $item) }}" icon="eye">
                        View
                    </x-tabler::dropdowns.item>

                    @can('update', $item)
                        <x-tabler::dropdowns.item href="{{ route('items.edit', $item) }}" icon="edit">
                            Edit
                        </x-tabler::dropdowns.item>
                    @endcan

                    <x-tabler::dropdowns.item href="{{ route('items.duplicate', $item) }}" icon="copy">
                        Duplicate
                    </x-tabler::dropdowns.item>

                    <x-tabler::dropdowns.divider />

                    @can('delete', $item)
                        <x-tabler::dropdowns.item
                            href="{{ route('items.destroy', $item) }}"
                            icon="trash"
                            class="text-danger"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </x-tabler::dropdowns.item>
                    @endcan
                </x-tabler::dropdowns.menu>
            </x-tabler::dropdowns.dropdown>
        </td>
    </tr>
@endforeach
```

---

### Pattern 4: Multi-Level Navigation Menu

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Products
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Categories</x-tabler::dropdowns.header>

        @foreach($categories as $category)
            <x-tabler::dropdowns.item href="{{ route('products.category', $category) }}" icon="folder">
                {{ $category->name }}
                <x-slot:badge>
                    <x-tabler::badge color="light">{{ $category->products_count }}</x-tabler::badge>
                </x-slot:badge>
            </x-tabler::dropdowns.item>
        @endforeach

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item href="{{ route('products.new') }}" icon="sparkles">
            New Arrivals
            <x-slot:badge>
                <x-tabler::badge color="success">New</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item href="{{ route('products.sale') }}" icon="discount">
            On Sale
            <x-slot:badge>
                <x-tabler::badge color="danger">-50%</x-tabler::badge>
            </x-slot:badge>
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to dropdown toggle
- **Enter/Space:** Opens dropdown menu
- **Arrow Down:** Opens menu and moves to first item (when closed)
- **Arrow Up:** Opens menu and moves to last item (when closed)
- **Arrow Down/Up:** Navigate between menu items (when open)
- **Escape:** Closes dropdown menu
- **Home/End:** Jump to first/last menu item

### ARIA Attributes
- `role="button"`: Applied to toggle button
- `aria-expanded`: Indicates menu open/closed state
- `aria-haspopup="true"`: Indicates presence of dropdown menu
- `data-bs-toggle="dropdown"`: Bootstrap dropdown trigger
- `aria-disabled="true"`: Applied to disabled menu items

### Screen Reader Support
- Toggle button properly announces "button, has popup"
- Menu state (expanded/collapsed) is announced
- Active items are indicated with visual and ARIA markers
- Disabled items announced as "disabled"
- Section headers provide context for grouped items

### Best Practices
- Always provide meaningful text in toggle button
- Use icons with descriptive labels
- Group related items with headers
- Mark current/active selections
- Ensure sufficient color contrast (4.5:1 minimum)
- Test keyboard navigation thoroughly

**Example:**
```blade
<x-tabler::dropdowns.toggle
    color="primary"
    aria-label="User account menu with profile and settings options">
    Account
</x-tabler::dropdowns.toggle>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (**JavaScript required**)
- Popper.js (included with Bootstrap)
- Modern JavaScript (ES6+)
- CSS support for transforms and absolute positioning

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Dropdown positioning may need adjustment in scrollable containers
- Mobile touch events may require additional handling
- Some older browsers don't support automatic positioning
- RTL layout support varies by Bootstrap version

---

## Events & Interactivity

### Bootstrap Events

The dropdown component emits standard Bootstrap 5 events:

```javascript
const dropdownElement = document.getElementById('myDropdown');

// Before opening
dropdownElement.addEventListener('show.bs.dropdown', (event) => {
    console.log('Dropdown is about to show');
    // event.relatedTarget: The toggle button element
    // Call event.preventDefault() to cancel
});

// After opening
dropdownElement.addEventListener('shown.bs.dropdown', (event) => {
    console.log('Dropdown is now visible');
    // Load dynamic content, focus search input, etc.
});

// Before closing
dropdownElement.addEventListener('hide.bs.dropdown', (event) => {
    console.log('Dropdown is about to hide');
    // event.clickEvent: The click event object (if triggered by click)
    // Call event.preventDefault() to cancel
});

// After closing
dropdownElement.addEventListener('hidden.bs.dropdown', (event) => {
    console.log('Dropdown is now hidden');
    // Clean up, reset state, etc.
});
```

---

### Programmatic Control

```javascript
// Get dropdown instance
const dropdown = new bootstrap.Dropdown(
    document.getElementById('myDropdownToggle')
);

// Show dropdown
dropdown.show();

// Hide dropdown
dropdown.hide();

// Toggle dropdown
dropdown.toggle();

// Update Popper.js positioning
dropdown.update();

// Dispose (cleanup)
dropdown.dispose();
```

---

### Framework Integration

**Livewire:**
```blade
<x-tabler::dropdowns.dropdown wire:ignore>
    <x-tabler::dropdowns.toggle color="primary">
        Filter: {{ $selectedFilter }}
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        @foreach($filters as $filter)
            <x-tabler::dropdowns.item
                wire:click="setFilter('{{ $filter }}')"
                :active="$selectedFilter === $filter">
                {{ $filter }}
            </x-tabler::dropdowns.item>
        @endforeach
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

<script>
    // Re-initialize dropdown after Livewire update
    Livewire.hook('message.processed', () => {
        const dropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
        dropdowns.forEach(el => new bootstrap.Dropdown(el));
    });
</script>
```

**Alpine.js:**
```blade
<div x-data="{ selected: 'All' }">
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="primary">
            <span x-text="'Filter: ' + selected"></span>
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item @click="selected = 'All'">
                All Items
            </x-tabler::dropdowns.item>
            <x-tabler::dropdowns.item @click="selected = 'Active'">
                Active Only
            </x-tabler::dropdowns.item>
            <x-tabler::dropdowns.item @click="selected = 'Archived'">
                Archived Only
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
</div>
```

**AJAX Loading:**
```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle id="dynamicDropdown" color="primary">
        Load Content
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu id="dynamicMenu">
        <div class="dropdown-item disabled">Loading...</div>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

<script>
document.getElementById('dynamicDropdown').addEventListener('show.bs.dropdown', async function() {
    const menu = document.getElementById('dynamicMenu');

    const response = await fetch('/api/dropdown-items');
    const items = await response.json();

    menu.innerHTML = items.map(item =>
        `<a class="dropdown-item" href="${item.url}">${item.name}</a>`
    ).join('');
});
</script>
```

---

## Troubleshooting

### Common Issues

**Issue: Dropdown doesn't open**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify Popper.js is included (required for positioning)
- ✅ Check JavaScript console for errors
- ✅ Confirm Bootstrap version is 5.x
- ✅ Ensure no JavaScript conflicts with other libraries

**Issue: Dropdown closes immediately after opening**
- ✅ Check for click event propagation issues
- ✅ Verify no `stopPropagation()` on parent elements
- ✅ Ensure menu items are inside dropdown-menu div
- ✅ Check for JavaScript errors in console

**Issue: Dropdown positioned incorrectly**
- ✅ Ensure parent container allows overflow
- ✅ Check z-index of dropdown and parent elements
- ✅ Verify no conflicting CSS positioning
- ✅ Try using `dropdown.update()` to recalculate position
- ✅ Check if parent has `overflow: hidden`

**Issue: Menu cut off by container**
- ✅ Add `overflow: visible` to parent containers
- ✅ Use `data-bs-boundary="viewport"` on toggle
- ✅ Consider using dropup/dropend/dropstart
- ✅ Adjust z-index if needed

**Issue: Icons not displaying in items**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Livewire/Alpine interactions not working**
- ✅ Use `wire:ignore` on dropdown wrapper
- ✅ Re-initialize Bootstrap after Livewire updates
- ✅ Use `@click` instead of `wire:click` for immediate response
- ✅ Listen to Bootstrap events for state synchronization

**Issue: Mobile touch not working**
- ✅ Ensure viewport meta tag is set
- ✅ Check for touch event conflicts
- ✅ Test on actual device, not just emulator
- ✅ Verify no CSS preventing touch events

### Debugging Tips
- Open browser console and look for errors
- Test with minimal example first
- Check Bootstrap documentation for JavaScript API
- Inspect rendered HTML for correct classes and attributes
- Verify all required Bootstrap files are loaded in correct order
- Test dropdown positioning in different scroll contexts

---

## Real-World Examples

### Example 1: User Authentication Menu

```blade
@auth
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="light" class="d-flex align-items-center">
            <x-tabler::avatar
                :src="auth()->user()->avatar_url"
                :alt="auth()->user()->name"
                size="sm"
                class="me-2" />
            <div class="d-none d-md-block">
                <div>{{ auth()->user()->name }}</div>
                <div class="text-muted small">{{ auth()->user()->role }}</div>
            </div>
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu class="dropdown-menu-end">
            <x-tabler::dropdowns.header>
                {{ auth()->user()->email }}
            </x-tabler::dropdowns.header>

            <x-tabler::dropdowns.divider />

            <x-tabler::dropdowns.item href="{{ route('profile.show') }}" icon="user">
                My Profile
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item href="{{ route('settings.account') }}" icon="settings">
                Account Settings
            </x-tabler::dropdowns.item>

            @if(auth()->user()->isAdmin())
                <x-tabler::dropdowns.divider />

                <x-tabler::dropdowns.header>Administration</x-tabler::dropdowns.header>

                <x-tabler::dropdowns.item href="{{ route('admin.dashboard') }}" icon="dashboard">
                    Admin Dashboard
                </x-tabler::dropdowns.item>

                <x-tabler::dropdowns.item href="{{ route('admin.users') }}" icon="users">
                    Manage Users
                </x-tabler::dropdowns.item>
            @endif

            <x-tabler::dropdowns.divider />

            <x-tabler::dropdowns.item
                href="{{ route('logout') }}"
                icon="logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign Out
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@else
    <x-tabler::button href="{{ route('login') }}" color="primary">
        Sign In
    </x-tabler::button>
@endauth
```

**Use Case:** Complete user authentication menu with profile, settings, admin links, and logout.

---

### Example 2: Language Selector

```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="light" icon="world">
        {{ $currentLanguage['name'] }}
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.header>Select Language</x-tabler::dropdowns.header>

        @foreach($availableLanguages as $code => $language)
            <x-tabler::dropdowns.item
                href="{{ route('locale.switch', $code) }}"
                :active="app()->getLocale() === $code">
                <div class="d-flex align-items-center">
                    <span class="me-2">{{ $language['flag'] }}</span>
                    <span>{{ $language['name'] }}</span>
                </div>
            </x-tabler::dropdowns.item>
        @endforeach
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

**Use Case:** Multi-language site with flag icons and active language indicator.

---

### Example 3: Bulk Actions for Data Table

```blade
<div class="d-flex align-items-center mb-3">
    <div class="form-check me-3">
        <input
            type="checkbox"
            class="form-check-input"
            id="selectAll"
            onchange="toggleAll(this)">
        <label class="form-check-label" for="selectAll">
            Select All
        </label>
    </div>

    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="primary" :disabled="!hasSelected">
            Bulk Actions (<span id="selectedCount">0</span>)
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item onclick="bulkAction('activate')" icon="check">
                Activate Selected
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item onclick="bulkAction('deactivate')" icon="x">
                Deactivate Selected
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item onclick="bulkAction('export')" icon="download">
                Export Selected
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.divider />

            <x-tabler::dropdowns.item
                onclick="bulkAction('delete')"
                icon="trash"
                class="text-danger">
                Delete Selected
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
</div>

<script>
function toggleAll(checkbox) {
    const checkboxes = document.querySelectorAll('.item-checkbox');
    checkboxes.forEach(cb => cb.checked = checkbox.checked);
    updateSelectedCount();
}

function updateSelectedCount() {
    const count = document.querySelectorAll('.item-checkbox:checked').length;
    document.getElementById('selectedCount').textContent = count;
}

function bulkAction(action) {
    const selected = Array.from(document.querySelectorAll('.item-checkbox:checked'))
        .map(cb => cb.value);

    if (action === 'delete' && !confirm(`Delete ${selected.length} items?`)) {
        return;
    }

    // Perform bulk action
    fetch('/api/bulk-action', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ action, ids: selected })
    }).then(() => location.reload());
}
</script>
```

**Use Case:** Bulk actions dropdown for data tables with dynamic count and confirmation.

---

### Example 4: Context Menu (Right-Click)

```blade
@foreach($files as $file)
    <div
        class="file-item"
        data-file-id="{{ $file->id }}"
        oncontextmenu="showContextMenu(event, {{ $file->id }}); return false;">

        <x-tabler::icon name="file" />
        <span>{{ $file->name }}</span>
    </div>
@endforeach

{{-- Hidden context menu --}}
<x-tabler::dropdowns.dropdown id="contextMenu" style="position: fixed; z-index: 1050;">
    <x-tabler::dropdowns.menu show style="display: block;">
        <x-tabler::dropdowns.item onclick="fileAction('open')" icon="eye">
            Open
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item onclick="fileAction('download')" icon="download">
            Download
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item onclick="fileAction('rename')" icon="edit">
            Rename
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.item onclick="fileAction('share')" icon="share">
            Share
        </x-tabler::dropdowns.item>

        <x-tabler::dropdowns.divider />

        <x-tabler::dropdowns.item onclick="fileAction('delete')" icon="trash" class="text-danger">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>

<script>
let currentFileId = null;

function showContextMenu(event, fileId) {
    event.preventDefault();
    currentFileId = fileId;

    const menu = document.getElementById('contextMenu');
    menu.style.left = event.pageX + 'px';
    menu.style.top = event.pageY + 'px';
    menu.querySelector('.dropdown-menu').classList.add('show');
}

function fileAction(action) {
    console.log(`${action} file ${currentFileId}`);
    // Implement file actions
    hideContextMenu();
}

function hideContextMenu() {
    const menu = document.getElementById('contextMenu');
    menu.querySelector('.dropdown-menu').classList.remove('show');
}

// Hide on click outside
document.addEventListener('click', hideContextMenu);
</script>
```

**Use Case:** Right-click context menu for file management interface.

---

## Performance Considerations

### Component Weight
- Base dropdown: ~200-500 bytes rendered HTML
- With Bootstrap JS: ~15KB (shared across all dropdowns)
- Each menu item: ~100-200 bytes
- With icons: +2KB per icon (SVG)

### Best Practices
- Initialize dropdowns only when needed (lazy initialization)
- Use event delegation for multiple dropdowns
- Avoid deep nesting of dropdowns
- Limit number of menu items (<20 for performance)
- Use virtual scrolling for very long menus
- Clean up event listeners when removing dropdowns

### Optimization Tips
- Load dropdown content dynamically via AJAX when opened
- Use CSS `will-change` for smooth animations
- Preload frequently accessed menu data
- Cache menu HTML for static dropdowns
- Use `dropdown.update()` sparingly (it recalculates positioning)
- Consider native `<select>` for simple choice selection

---

## Available Classes

Additional CSS classes you can use:

**Dropdown Positioning:**
- `dropup` - Open menu above toggle
- `dropend` - Open menu to the right
- `dropstart` - Open menu to the left
- `dropdown-center` - Center dropdown toggle

**Menu Alignment:**
- `dropdown-menu-end` - Align menu to right
- `dropdown-menu-start` - Align menu to left
- `dropdown-menu-sm-end` - Right align on small screens and up
- `dropdown-menu-lg-start` - Left align on large screens and up

**Menu Styling:**
- `dropdown-menu-arrow` - Add arrow indicator
- `dropdown-menu-card` - Card-style with padding
- `dropdown-menu-columns` - Multi-column layout

**Toggle Styling:**
- `btn-sm`, `btn-lg` - Size variants
- `btn-icon` - Icon-only button
- `nav-link` - Navigation link style

---

## Notes

- Bootstrap 5 JavaScript is **required** for dropdown functionality
- Popper.js is included with Bootstrap 5 (handles positioning)
- Dropdowns automatically close on outside click
- Toggle smartly detects nav-link class to avoid adding `.btn`
- Menu items support href for links or wire:click/onclick for actions
- Disabled items have proper ARIA attributes
- Dark theme works with both `dark` prop or manual classes
- Arrow indicator improves UX by showing menu origin

---

## Related Components

- [Button](../button.md) - Used as dropdown toggle
- [Badge](../badge.md) - Notification counts in menu items
- [Avatar](../avatar.md) - User profile in toggle
- [Divider](../divider.md) - Standalone divider component
- [Nav](../nav.md) - Navigation components

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/dropdowns/`

**Sub-components:**
- `dropdown.blade.php` - Main wrapper container
- `toggle.blade.php` - Toggle button/link
- `menu.blade.php` - Menu container
- `item.blade.php` - Individual menu item
- `header.blade.php` - Section header
- `divider.blade.php` - Horizontal divider

---

## Changelog

- **v1.0.0** - Initial release with full Bootstrap 5 integration and Tabler styling
