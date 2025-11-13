# List Group

A flexible and powerful component for displaying a series of content in a structured, list-based format. Perfect for navigation menus, content groupings, and interactive item selections.

## Overview

- Flexible content display for text, links, buttons, and custom HTML
- Multiple visual styles: default, flush, and numbered variants
- Contextual color classes for different item states
- Support for active and disabled states
- Interactive action items with hover effects
- Works with both unordered (`<ul>`) and ordered (`<ol>`) lists
- Automatic element type selection based on numbered prop
- Badge and icon integration support
- Custom content support with complex markup
- Fully semantic HTML structure
- No JavaScript required for basic functionality

## Basic Usage

```blade
<x-tabler::list-group>
    <li class="list-group-item">First item</li>
    <li class="list-group-item">Second item</li>
    <li class="list-group-item">Third item</li>
</x-tabler::list-group>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `flush` | `bool` | `false` | No | Remove borders and rounded corners for edge-to-edge display |
| `numbered` | `bool` | `false` | No | Display as numbered list with automatic counters (renders as `<ol>`) |
| `class` | `string` | `''` | No | Additional CSS classes to apply to the list container |

## Slots

| Slot | Description |
|------|-------------|
| `default` | List group items. Each item should typically be an `<li>` element with `list-group-item` class. Can contain links (`<a>`), buttons (`<button>`), or plain content. |

## CSS Classes

**List Group Container:**
- `list-group` - Base list group class (applied automatically)
- `list-group-flush` - Remove borders and rounded corners (also via `flush` prop)
- `list-group-numbered` - Numbered list with automatic counters (also via `numbered` prop)

**List Group Items:**
- `list-group-item` - Individual list item (required on each item)
- `list-group-item-action` - Interactive/clickable item with hover effects
- `active` - Active/selected state
- `disabled` - Disabled state (non-interactive)

**Contextual Colors:**
- `list-group-item-primary` - Primary background color
- `list-group-item-secondary` - Secondary background color
- `list-group-item-success` - Success/positive state (green)
- `list-group-item-danger` - Danger/error state (red)
- `list-group-item-warning` - Warning/caution state (yellow)
- `list-group-item-info` - Info/notice state (cyan)

## Examples

### Basic List Group

```blade
<x-tabler::list-group>
    <li class="list-group-item">Dashboard</li>
    <li class="list-group-item">Settings</li>
    <li class="list-group-item">Profile</li>
    <li class="list-group-item">Messages</li>
    <li class="list-group-item">Logout</li>
</x-tabler::list-group>
```

A simple list of items with default styling and borders.

### Flush Style List Group

```blade
<x-tabler::list-group flush>
    <li class="list-group-item">Inbox</li>
    <li class="list-group-item">Sent Items</li>
    <li class="list-group-item">Drafts</li>
    <li class="list-group-item">Trash</li>
</x-tabler::list-group>
```

Edge-to-edge list without borders and rounded corners, perfect for sidebar layouts.

### Numbered List Group

```blade
<x-tabler::list-group numbered>
    <li class="list-group-item">Create new project repository</li>
    <li class="list-group-item">Setup continuous integration</li>
    <li class="list-group-item">Configure deployment pipeline</li>
    <li class="list-group-item">Write documentation</li>
    <li class="list-group-item">Launch to production</li>
</x-tabler::list-group>
```

Automatically numbered list items, ideal for step-by-step instructions or ordered tasks.

### List Group with Badges

```blade
<x-tabler::list-group>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Inbox
        <x-tabler::badge color="primary">14</x-tabler::badge>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Unread Messages
        <x-tabler::badge color="danger">5</x-tabler::badge>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Drafts
        <x-tabler::badge color="secondary">2</x-tabler::badge>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-center">
        Spam
        <x-tabler::badge color="warning">8</x-tabler::badge>
    </li>
</x-tabler::list-group>
```

Combine list items with badges to show counts or status indicators.

### List Group with Icons

```blade
<x-tabler::list-group>
    <li class="list-group-item">
        <x-tabler-home class="icon me-2" />
        Home
    </li>
    <li class="list-group-item">
        <x-tabler-settings class="icon me-2" />
        Settings
    </li>
    <li class="list-group-item">
        <x-tabler-user class="icon me-2" />
        Profile
    </li>
    <li class="list-group-item">
        <x-tabler-bell class="icon me-2" />
        Notifications
    </li>
</x-tabler::list-group>
```

Add visual context with icons alongside list item text.

### Active and Disabled Items

```blade
<x-tabler::list-group>
    <li class="list-group-item active">Dashboard (Current)</li>
    <li class="list-group-item">Projects</li>
    <li class="list-group-item">Team Members</li>
    <li class="list-group-item disabled">Analytics (Coming Soon)</li>
    <li class="list-group-item">Settings</li>
</x-tabler::list-group>
```

Highlight the current page and disable unavailable options.

### As Navigation Menu

```blade
<x-tabler::list-group>
    <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action active">
        <x-tabler-home class="icon me-2" />
        Dashboard
    </a>
    <a href="{{ route('projects.index') }}" class="list-group-item list-group-item-action">
        <x-tabler-folder class="icon me-2" />
        Projects
    </a>
    <a href="{{ route('team.index') }}" class="list-group-item list-group-item-action">
        <x-tabler-users class="icon me-2" />
        Team
    </a>
    <a href="{{ route('settings') }}" class="list-group-item list-group-item-action">
        <x-tabler-settings class="icon me-2" />
        Settings
    </a>
</x-tabler::list-group>
```

Interactive navigation menu with clickable links and hover effects.

### With Custom Content

```blade
<x-tabler::list-group>
    <li class="list-group-item">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">List group item heading</h5>
            <small>3 days ago</small>
        </div>
        <p class="mb-1">Some placeholder content in a paragraph.</p>
        <small>And some small print.</small>
    </li>
    <li class="list-group-item">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Another heading</h5>
            <small class="text-muted">1 week ago</small>
        </div>
        <p class="mb-1">More detailed content with multiple lines of text.</p>
        <small class="text-muted">Additional metadata here.</small>
    </li>
    <li class="list-group-item">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">Third item heading</h5>
            <small class="text-muted">2 weeks ago</small>
        </div>
        <p class="mb-1">Complex content structure with headings and paragraphs.</p>
        <small class="text-muted">Supporting information.</small>
    </li>
</x-tabler::list-group>
```

Rich content items with headings, paragraphs, timestamps, and structured layouts.

### Contextual Color Classes

```blade
<x-tabler::list-group>
    <li class="list-group-item">Default item style</li>
    <li class="list-group-item list-group-item-primary">Primary colored item</li>
    <li class="list-group-item list-group-item-secondary">Secondary colored item</li>
    <li class="list-group-item list-group-item-success">Success: Operation completed</li>
    <li class="list-group-item list-group-item-danger">Danger: Critical error detected</li>
    <li class="list-group-item list-group-item-warning">Warning: Review required</li>
    <li class="list-group-item list-group-item-info">Info: New update available</li>
</x-tabler::list-group>
```

Use contextual colors to convey status, importance, or categorization.

### Interactive Button List

```blade
<x-tabler::list-group>
    <button type="button" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <strong>Export to PDF</strong>
            <x-tabler-file-download class="icon" />
        </div>
    </button>
    <button type="button" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <strong>Export to Excel</strong>
            <x-tabler-file-spreadsheet class="icon" />
        </div>
    </button>
    <button type="button" class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
            <strong>Export to CSV</strong>
            <x-tabler-file-text class="icon" />
        </div>
    </button>
    <button type="button" class="list-group-item list-group-item-action disabled">
        <div class="d-flex w-100 justify-content-between">
            <strong>Export to JSON</strong>
            <x-tabler-file-code class="icon" />
        </div>
        <small class="text-muted">Coming soon</small>
    </button>
</x-tabler::list-group>
```

Use buttons for actions that trigger JavaScript or form submissions.

### Flush List in Sidebar

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Quick Links</h3>
    </div>
    <x-tabler::list-group flush>
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action">
            <x-tabler-home class="icon me-2" />
            Dashboard
        </a>
        <a href="{{ route('analytics') }}" class="list-group-item list-group-item-action">
            <x-tabler-chart-bar class="icon me-2" />
            Analytics
        </a>
        <a href="{{ route('reports') }}" class="list-group-item list-group-item-action">
            <x-tabler-file-text class="icon me-2" />
            Reports
        </a>
        <a href="{{ route('settings') }}" class="list-group-item list-group-item-action">
            <x-tabler-settings class="icon me-2" />
            Settings
        </a>
    </x-tabler::list-group>
</div>
```

Flush style works perfectly inside cards for seamless edge-to-edge navigation.

### Dynamic List from Collection

```blade
<x-tabler::list-group numbered>
    @foreach($tasks as $task)
        <li class="list-group-item {{ $task->completed ? 'list-group-item-success' : '' }}">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ $task->title }}</span>
                @if($task->completed)
                    <x-tabler::badge color="success">Completed</x-tabler::badge>
                @else
                    <x-tabler::badge color="secondary">Pending</x-tabler::badge>
                @endif
            </div>
            @if($task->description)
                <small class="text-muted d-block mt-1">{{ $task->description }}</small>
            @endif
        </li>
    @endforeach
</x-tabler::list-group>
```

Generate list items dynamically from database collections or arrays.

## Accessibility

### Semantic HTML
- Uses proper `<ul>` element by default (unordered list)
- Automatically switches to `<ol>` when `numbered` prop is true (ordered list)
- Each item uses semantic `<li>` element
- Links use `<a>` elements, buttons use `<button>` elements

### Keyboard Navigation
- Interactive items (`list-group-item-action`) are keyboard accessible
- Links can be navigated with Tab key
- Buttons can be activated with Enter or Space keys
- Disabled items are not focusable

### ARIA Attributes
- Use `aria-current="page"` on the active navigation item
- Disabled items should include `aria-disabled="true"` when using links
- Consider adding `role="menu"` for navigation menus
- Use descriptive text or `aria-label` for icon-only items

### Screen Reader Support
- List structure is announced to screen readers
- Active state is conveyed through visual and semantic means
- Disabled items are announced as disabled
- Contextual colors should not be the only means of conveying information

### Best Practices
- Provide descriptive text for all interactive items
- Don't rely solely on color to convey meaning
- Use proper semantic elements (`<a>` for links, `<button>` for actions)
- Include visible text labels, not just icons
- Ensure sufficient color contrast for text and backgrounds
- Maintain logical tab order for keyboard navigation

## Browser Compatibility

The List Group component is compatible with all modern browsers:

- Chrome (latest) ✅
- Firefox (latest) ✅
- Safari (latest) ✅
- Edge (latest) ✅
- Opera (latest) ✅
- IE11 ❌ (not supported)

### Requirements
- Bootstrap 5.x CSS
- Modern CSS support (Flexbox, CSS Grid for layouts)
- No JavaScript required for basic functionality

### Known Issues
- None reported for modern browsers
- Gracefully degrades to standard list in unsupported browsers
- Interactive hover effects require CSS `:hover` support

## Related Components

- [Badge](./badge.md) - Add counts and status indicators to list items
- [Button](./button.md) - Action buttons that can be used in list items
- [Avatar](./avatar.md) - User avatars in list items
- [Icon](./icon.md) - Icons to enhance visual communication

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/list-group.blade.php`

## Changelog

### v1.0.0
- Initial release of List Group component
- Support for default and flush styles
- Numbered list variant
- Interactive action items with hover effects
- Contextual color classes (primary, secondary, success, danger, warning, info)
- Active and disabled state support
- Automatic element type selection (`<ul>` or `<ol>`)
- Full semantic HTML structure
- Complete accessibility support
- Badge and icon integration
- Custom content support
