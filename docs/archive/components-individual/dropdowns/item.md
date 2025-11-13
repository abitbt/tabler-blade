# Dropdown Item

> Individual clickable menu item within dropdown menus with support for icons, badges, active states, and disabled states.

## Overview

The Dropdown Item component represents a single selectable option within a dropdown menu. It provides a clean, consistent interface for navigation links and actions with built-in support for icons, badges, active/current indicators, and disabled states. The component always renders as an anchor (`<a>`) element and integrates seamlessly with Bootstrap 5's dropdown system.

**Key Features:**
- Icon support (leading icons)
- Active/selected state indicator
- Disabled state with proper ARIA attributes
- Badge slot for counts and indicators
- Checkbox slot for multi-select items
- Automatic accessibility attributes
- Link-based navigation
- Custom action handlers (onclick, wire:click, @click)

**Use Case:** Use dropdown items for navigation menus, action menus, user account menus, filter selections, and any scenario requiring a list of clickable options within a dropdown container.

---

## Basic Usage

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('dashboard') }}">
        Dashboard
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('profile') }}">
        Profile
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

---

## Props / Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `href` | `string\|null` | `'#'` | No | Link URL for navigation (use `#` for action-only items) |
| `icon` | `string\|null` | `null` | No | Leading Tabler icon name (without `tabler-` prefix) |
| `active` | `bool` | `false` | No | Mark item as active/selected (adds visual indicator) |
| `disabled` | `bool` | `false` | No | Disable item interaction (prevents clicks, adds ARIA attributes) |
| `class` | `string` | `''` | No | Additional CSS classes |

**Note:** All additional HTML attributes (onclick, wire:click, @click, data-*, etc.) are passed through to the anchor element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Item text/content |
| `badge` | No | Badge or count indicator (positioned on right side) |
| `checkbox` | No | Checkbox input for selectable dropdown items |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**States:**
- `active` - Active/selected state (also via `active` prop)
- `disabled` - Disabled state (also via `disabled` prop)
- `text-danger` - Red text for destructive actions
- `text-success` - Green text for positive actions
- `text-warning` - Orange text for warning actions
- `text-muted` - Gray text for secondary items

**Layout:**
- `dropdown-item-text` - Non-clickable text item
- `form-check` - Checkbox item container
- `d-flex` - Flexbox layout for custom content
- `justify-content-between` - Space between content and badge
- `align-items-center` - Vertically center content

**Spacing:**
- `px-3` - Horizontal padding adjustment
- `py-2` - Vertical padding adjustment
- `mb-0` - Remove bottom margin

---

## Examples

### Basic Item

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('home') }}">
        Home
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('about') }}">
        About
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('contact') }}">
        Contact
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Simple dropdown menu items with navigation links

---

### Items with Icons

```blade
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
    <x-tabler::dropdowns.item href="{{ route('help') }}" icon="help">
        Help Center
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Menu items with leading icons for better visual identification

---

### Active Item

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('home') }}" :active="request()->routeIs('home')">
        Home
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('products') }}" :active="request()->routeIs('products')">
        Products
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('about') }}" :active="request()->routeIs('about')">
        About
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Current/active page is visually highlighted in the dropdown

---

### Disabled Item

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('dashboard') }}" icon="home">
        Dashboard
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('analytics') }}" icon="chart-bar" disabled>
        Analytics (Coming Soon)
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('reports') }}" icon="file-text" disabled>
        Reports (Premium)
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('settings') }}" icon="settings">
        Settings
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Disabled items appear grayed out and are not clickable

---

### Items with Badges

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('inbox') }}" icon="mail">
        Inbox
        <x-slot:badge>
            <x-tabler::badge color="primary">12</x-tabler::badge>
        </x-slot:badge>
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item href="{{ route('notifications') }}" icon="bell">
        Notifications
        <x-slot:badge>
            <x-tabler::badge color="danger">5</x-tabler::badge>
        </x-slot:badge>
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item href="{{ route('tasks') }}" icon="checklist">
        Tasks
        <x-slot:badge>
            <x-tabler::badge color="success">3</x-tabler::badge>
        </x-slot:badge>
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Menu items with count badges on the right side

---

### Items with Checkboxes

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="#" class="form-check">
        <x-slot:checkbox>
            <input type="checkbox" class="form-check-input m-0 me-2" id="option1" checked>
        </x-slot:checkbox>
        <label class="form-check-label" for="option1">Show Completed</label>
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item href="#" class="form-check">
        <x-slot:checkbox>
            <input type="checkbox" class="form-check-input m-0 me-2" id="option2">
        </x-slot:checkbox>
        <label class="form-check-label" for="option2">Show Archived</label>
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item href="#" class="form-check">
        <x-slot:checkbox>
            <input type="checkbox" class="form-check-input m-0 me-2" id="option3">
        </x-slot:checkbox>
        <label class="form-check-label" for="option3">Show Deleted</label>
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Multi-select dropdown with checkboxes for filter options

---

### Destructive Action Items

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('items.edit', $item) }}" icon="edit">
        Edit
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item href="{{ route('items.duplicate', $item) }}" icon="copy">
        Duplicate
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.divider />
    <x-tabler::dropdowns.item
        href="{{ route('items.archive', $item) }}"
        icon="archive"
        class="text-warning">
        Archive
    </x-tabler::dropdowns.item>
    <x-tabler::dropdowns.item
        href="{{ route('items.delete', $item) }}"
        icon="trash"
        class="text-danger"
        onclick="return confirm('Are you sure?')">
        Delete
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Action menu with color-coded destructive actions

---

### Items with Custom Content

```blade
<x-tabler::dropdowns.menu style="min-width: 280px;">
    <x-tabler::dropdowns.item href="{{ route('users.show', $user) }}">
        <div class="d-flex align-items-center">
            <x-tabler::avatar :src="$user->avatar" size="sm" class="me-2" />
            <div>
                <div class="fw-bold">{{ $user->name }}</div>
                <div class="text-muted small">{{ $user->email }}</div>
            </div>
        </div>
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item href="{{ route('teams.show', $team) }}">
        <div class="d-flex align-items-center">
            <x-tabler::avatar :initials="$team->initials" size="sm" class="me-2" />
            <div>
                <div class="fw-bold">{{ $team->name }}</div>
                <div class="text-muted small">{{ $team->members_count }} members</div>
            </div>
        </div>
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Rich dropdown items with avatars and metadata

---

### Action Items with JavaScript

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item
        href="#"
        icon="download"
        onclick="downloadFile('pdf'); return false;">
        Download as PDF
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item
        href="#"
        icon="download"
        onclick="downloadFile('excel'); return false;">
        Download as Excel
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item
        href="#"
        icon="download"
        onclick="downloadFile('csv'); return false;">
        Download as CSV
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>

<script>
function downloadFile(format) {
    console.log('Downloading as ' + format);
    // Download logic here
}
</script>
```

**Output:** Action menu triggering JavaScript functions

---

### Items with Livewire Actions

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item
        href="#"
        icon="check"
        wire:click="markAsRead({{ $notification->id }})">
        Mark as Read
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item
        href="#"
        icon="archive"
        wire:click="archive({{ $notification->id }})">
        Archive
    </x-tabler::dropdowns.item>

    <x-tabler::dropdowns.item
        href="#"
        icon="trash"
        class="text-danger"
        wire:click="delete({{ $notification->id }})"
        wire:confirm="Are you sure you want to delete this notification?">
        Delete
    </x-tabler::dropdowns.item>
</x-tabler::dropdowns.menu>
```

**Output:** Dropdown items triggering Livewire component methods

---

### Items with Alpine.js

```blade
<div x-data="{ selected: 'all' }">
    <x-tabler::dropdowns.dropdown>
        <x-tabler::dropdowns.toggle color="primary">
            <span x-text="'Filter: ' + selected"></span>
        </x-tabler::dropdowns.toggle>

        <x-tabler::dropdowns.menu>
            <x-tabler::dropdowns.item
                href="#"
                @click.prevent="selected = 'all'"
                :class="{ 'active': selected === 'all' }">
                All Items
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item
                href="#"
                @click.prevent="selected = 'active'"
                :class="{ 'active': selected === 'active' }">
                Active Only
            </x-tabler::dropdowns.item>

            <x-tabler::dropdowns.item
                href="#"
                @click.prevent="selected = 'archived'"
                :class="{ 'active': selected === 'archived' }">
                Archived Only
            </x-tabler::dropdowns.item>
        </x-tabler::dropdowns.menu>
    </x-tabler::dropdowns.dropdown>
</div>
```

**Output:** Interactive filter dropdown with Alpine.js state management

---

### Conditional Items with Authorization

```blade
<x-tabler::dropdowns.menu>
    <x-tabler::dropdowns.item href="{{ route('projects.show', $project) }}" icon="eye">
        View Project
    </x-tabler::dropdowns.item>

    @can('update', $project)
        <x-tabler::dropdowns.item href="{{ route('projects.edit', $project) }}" icon="edit">
            Edit Project
        </x-tabler::dropdowns.item>
    @endcan

    @can('share', $project)
        <x-tabler::dropdowns.item href="{{ route('projects.share', $project) }}" icon="share">
            Share Project
        </x-tabler::dropdowns.item>
    @endcan

    @can('delete', $project)
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item
            href="{{ route('projects.destroy', $project) }}"
            icon="trash"
            class="text-danger"
            onclick="return confirm('Delete this project?')">
            Delete Project
        </x-tabler::dropdowns.item>
    @endcan
</x-tabler::dropdowns.menu>
```

**Output:** Permission-based menu items using Laravel's authorization gates

---

## Accessibility

### Keyboard Navigation
- **Tab:** Focus moves to dropdown toggle (not individual items)
- **Arrow Down/Up:** Navigate between menu items (when dropdown is open)
- **Enter/Space:** Activates focused item
- **Escape:** Closes dropdown and returns focus to toggle
- **Home/End:** Jump to first/last menu item

### ARIA Attributes
- `tabindex="-1"`: Applied to disabled items (prevents keyboard focus)
- `aria-disabled="true"`: Applied to disabled items (announces disabled state)
- `href="#"`: Valid href for action items (prevents browser warnings)

### Screen Reader Support
- Active items announce "selected" or "current" state
- Disabled items announce as "disabled, not clickable"
- Icon-only items should include descriptive text
- Badge content is read after item text
- Checkbox items include proper label associations

### Best Practices
- Always provide meaningful text content
- Use semantic HTML (anchor tags for links)
- Combine icons with text labels (not icon-only)
- Mark current/active selections visually
- Use consistent item ordering across similar menus
- Ensure sufficient color contrast for text and icons
- Provide clear visual feedback for hover/focus states

**Example:**
```blade
{{-- Accessible item with icon and active state --}}
<x-tabler::dropdowns.item
    href="{{ route('dashboard') }}"
    icon="home"
    :active="request()->routeIs('dashboard')"
    aria-current="page">
    Dashboard
</x-tabler::dropdowns.item>

{{-- Accessible disabled item with explanation --}}
<x-tabler::dropdowns.item
    href="#"
    icon="star"
    disabled
    title="Upgrade to Premium to access this feature">
    Premium Features (Upgrade Required)
</x-tabler::dropdowns.item>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for dropdown styles)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon prop
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Active state styling may vary slightly across browsers
- Disabled items can still be triggered via JavaScript in some browsers
- Icon alignment may need adjustment in older Safari versions
- Focus indicators may differ between browsers (use custom focus styles if needed)

---

## Related Components

- [Dropdown](./dropdown.md) - Parent dropdown container
- [Dropdown Toggle](./toggle.md) - Toggle button component
- [Dropdown Menu](./menu.md) - Menu container component
- [Dropdown Header](./header.md) - Section header component
- [Dropdown Divider](./divider.md) - Separator component
- [Badge](../badge.md) - Count indicators (used in badge slot)
- [Button](../button.md) - Alternative to dropdowns for single actions

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/dropdowns/item.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with full dropdown item functionality
