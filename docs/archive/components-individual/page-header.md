# Page Header

> A flexible page header component that displays a page title with optional pretitle, subtitle, icon, and action buttons.

## Overview

The Page Header component is a versatile layout element designed to appear at the top of pages in your application. It provides a consistent structure for displaying page titles, contextual information, and quick access to page-level actions. This component follows Tabler UI design patterns and integrates seamlessly with the Tabler icon system.

Use this component when you need to:
- Display a clear page title with optional context
- Show breadcrumbs or category information above the title
- Provide quick access to page-level actions (buttons, links, dropdowns)
- Add descriptive text or metadata below the title
- Create a consistent header experience across your application

The Page Header component automatically handles responsive layouts, ensuring actions move to a new row on smaller screens while maintaining visual hierarchy.

---

## Basic Usage

```blade
<x-tabler::page-header title="Dashboard" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | `string\|null` | `null` | Main page title (can also use default slot for more control) |
| `pretitle` | `string\|null` | `null` | Small text above title (e.g., "Overview", category name, breadcrumbs) |
| `subtitle` | `string\|null` | `null` | Description or meta information displayed below title |
| `icon` | `string\|null` | `null` | Tabler icon name without 'tabler-' prefix (e.g., "settings", "users") |
| `border` | `bool` | `false` | Add bottom border to visually separate header from content |
| `class` | `string` | `''` | Additional CSS classes to apply to the root element |

**Note:** All additional HTML attributes (like `id`, `data-*`, etc.) are passed through to the root `<div>` element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Main title content (alternative to using the `title` prop for more complex markup) |
| `pretitle` | No | Custom pretitle markup (alternative to `pretitle` prop, useful for breadcrumbs) |
| `subtitle` | No | Custom subtitle/description markup (alternative to `subtitle` prop) |
| `actions` | No | Action buttons, links, or controls displayed on the right side of the header |

**Slot Priority:** When both a prop and corresponding slot are provided, the slot content takes precedence.

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Layout Modifiers:**
- `page-header-border` - Add bottom border separator (also via `border` prop)
- `d-print-none` - Hide header when printing (applied by default)

**Background Colors:**
- `bg-white`, `bg-light`, `bg-dark`, `bg-muted` - Basic backgrounds
- `bg-primary`, `bg-secondary`, `bg-success`, `bg-danger`, `bg-warning`, `bg-info` - Semantic colors
- `bg-primary-lt`, `bg-success-lt`, etc. - Light color variants

**Text Colors:**
- `text-white` - White text for dark backgrounds
- `text-muted`, `text-secondary` - Muted text colors
- `text-primary`, `text-success`, `text-danger` - Semantic text colors

**Spacing:**
- `mt-{0-5}`, `mb-{0-5}` - Margin top/bottom spacing
- `pt-{0-5}`, `pb-{0-5}` - Padding top/bottom spacing
- `py-{0-5}` - Vertical padding

**Shadow Effects:**
- `shadow-sm`, `shadow`, `shadow-lg` - Box shadow variants

---

## Examples

### Basic Page Header

A minimal page header with just a title.

```blade
<x-tabler::page-header title="Dashboard" />
```

---

### With Pretitle

Display context or category information above the title.

```blade
<x-tabler::page-header
    title="Monthly Report"
    pretitle="Overview"
/>
```

---

### With Subtitle

Add descriptive text or metadata below the title.

```blade
<x-tabler::page-header
    title="Photo Gallery"
    subtitle="1-12 of 241 photos"
/>
```

---

### With Icon

Display a Tabler icon before the title text.

```blade
<x-tabler::page-header
    title="Settings"
    icon="settings"
    subtitle="Manage your account preferences"
/>
```

---

### With Border

Add a visual separator between the header and page content.

```blade
<x-tabler::page-header
    title="User Management"
    border
    pretitle="Admin Panel"
/>
```

---

### With Action Buttons

Add interactive elements like buttons or links to the right side.

```blade
<x-tabler::page-header
    title="Projects"
    pretitle="All Projects"
    subtitle="Manage your active projects"
>
    <x-slot:actions>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            <x-tabler-plus class="icon" />
            New Project
        </a>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### With Multiple Actions

Display a group of action buttons using `btn-list`.

```blade
<x-tabler::page-header title="Article Editor">
    <x-slot:actions>
        <div class="btn-list">
            <a href="#" class="btn">Preview</a>
            <a href="#" class="btn">Save Draft</a>
            <a href="#" class="btn btn-primary">Publish</a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### With Breadcrumb Navigation

Use the `pretitle` slot for breadcrumb navigation.

```blade
<x-tabler::page-header title="Article Details">
    <x-slot:pretitle>
        <ol class="breadcrumb breadcrumb-dots mb-1" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page">Article</li>
        </ol>
    </x-slot:pretitle>
    <x-slot:actions>
        <a href="{{ route('articles.edit', $article) }}" class="btn btn-primary">
            <x-tabler-edit class="icon" />
            Edit
        </a>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### With Rich Subtitle Content

Use the `subtitle` slot for complex metadata display.

```blade
<x-tabler::page-header title="John Doe">
    <x-slot:subtitle>
        <div class="row">
            <div class="col-auto">
                <x-tabler-briefcase class="icon text-muted" />
                <span class="text-reset">Senior Developer at Acme Corp</span>
            </div>
            <div class="col-auto">
                <x-tabler-map-pin class="icon text-muted" />
                <span class="text-reset">San Francisco, CA</span>
            </div>
            <div class="col-auto">
                <x-tabler-users class="icon text-muted" />
                <a href="#" class="text-reset">342 connections</a>
            </div>
        </div>
    </x-slot:subtitle>
    <x-slot:actions>
        <a href="#" class="btn btn-primary">Connect</a>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Dashboard Page Header

A complete dashboard header with stats and actions.

```blade
<x-tabler::page-header
    title="Dashboard"
    pretitle="Overview"
    subtitle="Welcome back! Here's what's happening today."
>
    <x-slot:actions>
        <div class="btn-list">
            <a href="#" class="btn" data-bs-toggle="dropdown">
                <x-tabler-calendar class="icon" />
                Last 30 days
            </a>
            <a href="#" class="btn btn-primary">
                <x-tabler-download class="icon" />
                Download Report
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Settings Page Header

Settings page with icon and navigation.

```blade
<x-tabler::page-header
    title="Account Settings"
    icon="settings"
    border
    subtitle="Manage your account preferences and security settings"
>
    <x-slot:actions>
        <a href="#" class="btn">Cancel</a>
        <button type="submit" form="settings-form" class="btn btn-primary">
            Save Changes
        </button>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### E-commerce Product List Header

Product catalog page with filters and actions.

```blade
<x-tabler::page-header title="Products">
    <x-slot:pretitle>
        <div class="text-muted">
            <x-tabler-package class="icon" />
            Catalog
        </div>
    </x-slot:pretitle>
    <x-slot:subtitle>
        Showing {{ $products->count() }} of {{ $products->total() }} products
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <button class="btn" data-bs-toggle="modal" data-bs-target="#filterModal">
                <x-tabler-filter class="icon" />
                Filters
            </button>
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <x-tabler-plus class="icon" />
                Add Product
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### User Profile Header

User profile page with status and social actions.

```blade
<x-tabler::page-header
    title="{{ $user->name }}"
    class="bg-primary-lt"
>
    <x-slot:pretitle>
        <span class="badge bg-success">Active</span>
        <span class="text-muted ms-2">Member since {{ $user->created_at->format('M Y') }}</span>
    </x-slot:pretitle>
    <x-slot:subtitle>
        <div class="mt-2">
            <span class="avatar avatar-xs me-2">
                <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}">
            </span>
            {{ $user->email }}
        </div>
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <a href="#" class="btn">
                <x-tabler-message class="icon" />
                Message
            </a>
            <a href="#" class="btn btn-primary">
                <x-tabler-user-plus class="icon" />
                Follow
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Documentation Page Header

Documentation or help page with search.

```blade
<x-tabler::page-header
    title="API Documentation"
    icon="book"
    border
>
    <x-slot:pretitle>
        <a href="{{ route('docs.index') }}" class="text-muted">
            <x-tabler-arrow-left class="icon" />
            Back to Docs
        </a>
    </x-slot:pretitle>
    <x-slot:subtitle>
        RESTful API v2.0 - Last updated {{ $lastUpdate->diffForHumans() }}
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="input-icon">
            <input type="text" class="form-control" placeholder="Search docs...">
            <span class="input-icon-addon">
                <x-tabler-search class="icon" />
            </span>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Team Management Header

Team or organization management page.

```blade
<x-tabler::page-header
    title="Engineering Team"
    icon="users"
>
    <x-slot:pretitle>
        <div class="breadcrumb breadcrumb-dots mb-1">
            <a href="{{ route('teams.index') }}" class="breadcrumb-item">Teams</a>
            <span class="breadcrumb-item active">Engineering</span>
        </div>
    </x-slot:pretitle>
    <x-slot:subtitle>
        <div class="d-flex gap-3">
            <span><strong>{{ $team->members_count }}</strong> members</span>
            <span><strong>{{ $team->projects_count }}</strong> active projects</span>
            <span><strong>{{ $team->tasks_count }}</strong> pending tasks</span>
        </div>
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <a href="#" class="btn">
                <x-tabler-settings class="icon" />
                Settings
            </a>
            <a href="#" class="btn btn-primary">
                <x-tabler-user-plus class="icon" />
                Invite Member
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Invoice Details Header

Invoice or document detail page.

```blade
<x-tabler::page-header
    title="Invoice #{{ $invoice->number }}"
    border
>
    <x-slot:pretitle>
        <a href="{{ route('invoices.index') }}" class="text-muted">
            <x-tabler-arrow-left class="icon" />
            All Invoices
        </a>
    </x-slot:pretitle>
    <x-slot:subtitle>
        <div class="row g-3">
            <div class="col-auto">
                <span class="text-muted">Status:</span>
                <span class="badge bg-{{ $invoice->status_color }} ms-1">
                    {{ $invoice->status }}
                </span>
            </div>
            <div class="col-auto">
                <span class="text-muted">Amount:</span>
                <strong class="ms-1">${{ number_format($invoice->total, 2) }}</strong>
            </div>
            <div class="col-auto">
                <span class="text-muted">Due Date:</span>
                <span class="ms-1">{{ $invoice->due_date->format('M d, Y') }}</span>
            </div>
        </div>
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <a href="#" class="btn">
                <x-tabler-printer class="icon" />
                Print
            </a>
            <a href="#" class="btn">
                <x-tabler-download class="icon" />
                Download PDF
            </a>
            <a href="#" class="btn btn-primary">
                <x-tabler-send class="icon" />
                Send Invoice
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

## Variants

### Background Color Variants

Apply background colors to create visual distinction or match your design theme.

```blade
{{-- Light backgrounds --}}
<x-tabler::page-header title="Light Header" class="bg-light" />
<x-tabler::page-header title="White Header" class="bg-white shadow-sm" />

{{-- Colored backgrounds --}}
<x-tabler::page-header title="Primary Header" class="bg-primary text-white" />
<x-tabler::page-header title="Success Header" class="bg-success-lt" />
<x-tabler::page-header title="Info Header" class="bg-info-lt" />

{{-- Dark background --}}
<x-tabler::page-header
    title="Dark Header"
    subtitle="Dark theme page header"
    class="bg-dark text-white"
/>
```

---

### Spacing Variants

Control vertical spacing with margin and padding utilities.

```blade
{{-- Extra top margin --}}
<x-tabler::page-header title="Spaced Header" class="mt-4" />

{{-- Extra vertical padding --}}
<x-tabler::page-header title="Padded Header" class="py-4" />

{{-- Combined spacing --}}
<x-tabler::page-header
    title="Custom Spacing"
    class="mt-3 mb-4 py-3"
/>
```

---

### Border Variants

Different border styles for visual separation.

```blade
{{-- Bottom border (via prop) --}}
<x-tabler::page-header title="Bordered Header" border />

{{-- Custom border styles --}}
<x-tabler::page-header
    title="Custom Border"
    class="border-bottom border-2 border-primary"
/>

{{-- Shadow instead of border --}}
<x-tabler::page-header
    title="Shadow Header"
    class="shadow-sm"
/>
```

---

## Accessibility

The Page Header component follows WCAG 2.1 AA accessibility standards:

### Semantic Structure
- **Proper Heading Hierarchy:** Uses `<h2>` for the page title by default, ensuring proper document outline
- **Semantic Landmarks:** The header structure helps screen readers identify the page context
- **Breadcrumb ARIA:** When using breadcrumbs in pretitle slot, include `aria-label="breadcrumbs"`

### Screen Reader Support
- **Meaningful Labels:** All interactive elements should have descriptive text or `aria-label` attributes
- **Current Page:** Mark current breadcrumb item with `aria-current="page"`
- **Icon Accessibility:** Decorative icons are announced appropriately; interactive icons need labels

### Color Contrast
- **Text Readability:** Default styles meet WCAG AA contrast ratio (4.5:1 minimum)
- **Custom Backgrounds:** When using dark backgrounds, apply `text-white` class for proper contrast
- **Link Colors:** Ensure sufficient contrast for links in pretitle and subtitle areas

### Keyboard Navigation
- **Focusable Elements:** All buttons and links in actions slot are keyboard accessible
- **Focus Indicators:** Visible focus states for keyboard navigation
- **Tab Order:** Natural tab order from pretitle → title → subtitle → actions

### Best Practices

```blade
{{-- ✅ Good: Proper breadcrumb ARIA --}}
<x-tabler::page-header title="Products">
    <x-slot:pretitle>
        <ol class="breadcrumb" aria-label="breadcrumbs">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Products</li>
        </ol>
    </x-slot:pretitle>
</x-tabler::page-header>

{{-- ✅ Good: Accessible action buttons --}}
<x-tabler::page-header title="Settings">
    <x-slot:actions>
        <button class="btn btn-primary" aria-label="Save settings">
            <x-tabler-check class="icon" aria-hidden="true" />
            Save
        </button>
    </x-slot:actions>
</x-tabler::page-header>

{{-- ✅ Good: Sufficient contrast on dark background --}}
<x-tabler::page-header
    title="Dashboard"
    class="bg-dark text-white"
    subtitle="Welcome back"
/>

{{-- ❌ Avoid: Poor contrast --}}
<x-tabler::page-header
    title="Dashboard"
    class="bg-dark text-muted"
/>
```

---

## Browser Compatibility

### Requirements
- **Bootstrap 5.x:** Required for layout, spacing, and utility classes
- **Tabler UI CSS:** For page-header specific styles and design tokens
- **Modern CSS:** Flexbox for responsive layout and alignment

### Supported Browsers

| Browser | Version | Status |
|---------|---------|--------|
| Chrome | 90+ | ✅ Fully Supported |
| Firefox | 88+ | ✅ Fully Supported |
| Safari | 14+ | ✅ Fully Supported |
| Edge | 90+ | ✅ Fully Supported |
| Opera | 76+ | ✅ Fully Supported |
| Samsung Internet | 14+ | ✅ Fully Supported |

### Mobile Support
- iOS Safari 14+
- Chrome Mobile (latest)
- Android Browser (latest)
- Responsive breakpoints follow Bootstrap 5 grid system

### Print Styles
The component includes `d-print-none` class by default, hiding the header in print layouts. Override this if you need the header to appear in printed documents:

```blade
<x-tabler::page-header
    title="Print-Friendly Header"
    class="d-print-block"
/>
```

---

## Performance

### Rendering Characteristics
- **Lightweight:** Minimal HTML structure (~200-300 bytes base)
- **CSS Only:** No JavaScript dependencies
- **Fast Rendering:** Simple DOM structure with flexbox layout
- **No External Requests:** All styles inline or from bundled CSS

### Optimization Tips

**Avoid Unnecessary Complexity:**
```blade
{{-- ❌ Heavy: Too many nested elements --}}
<x-tabler::page-header title="Dashboard">
    <x-slot:subtitle>
        <div><div><div><span>Text</span></div></div></div>
    </x-slot:subtitle>
</x-tabler::page-header>

{{-- ✅ Better: Keep subtitle content simple --}}
<x-tabler::page-header
    title="Dashboard"
    subtitle="Simple descriptive text"
/>
```

**Icon Loading:**
When using the `icon` prop, ensure Tabler icon components are available. The component uses `x-dynamic-component` for efficient icon rendering.

**Container Considerations:**
The component includes a `container-xl` wrapper by default. If you're already within a container, you may want to customize the layout:

```blade
{{-- Remove inner container if already in one --}}
{{-- (requires component customization) --}}
```

---

## Troubleshooting

### Common Issues

**Issue: Header not displaying correctly**
- ✅ Ensure Bootstrap 5 CSS is loaded
- ✅ Verify Tabler UI CSS is included after Bootstrap
- ✅ Check that parent layout doesn't have conflicting flexbox styles
- ✅ Inspect browser console for CSS loading errors

**Issue: Actions not aligning to the right**
- ✅ Verify actions slot is used correctly: `<x-slot:actions>`
- ✅ Check for CSS overrides affecting `.col-auto.ms-auto`
- ✅ Ensure no width constraints on parent container
- ✅ Test without custom CSS to isolate conflicts

**Issue: Icon not appearing**
- ✅ Verify icon name is correct (without 'tabler-' prefix)
- ✅ Ensure Tabler icon components are installed and published
- ✅ Check icon exists in your Tabler icon set
- ✅ Use `<x-tabler-{icon} />` directly in title slot as alternative

**Issue: Responsive layout breaks on mobile**
- ✅ Check viewport meta tag in layout: `<meta name="viewport" content="width=device-width, initial-scale=1">`
- ✅ Verify no fixed widths on action buttons
- ✅ Use responsive utility classes: `d-none d-md-block`, `d-sm-inline`
- ✅ Test actions slot content wraps properly

**Issue: Border not showing**
- ✅ Ensure `border` prop is set to `true` (boolean, not string)
- ✅ Check Tabler CSS includes `.page-header-border` styles
- ✅ Verify no CSS overrides removing borders
- ✅ Use class approach: `class="page-header-border"`

**Issue: Pretitle or subtitle not rendering**
- ✅ Verify slot name syntax: `<x-slot:pretitle>` (colon, not dash)
- ✅ Check for typos in slot names
- ✅ Ensure content exists within slot tags
- ✅ Try prop approach instead: `pretitle="text"`

**Issue: Custom classes not applying**
- ✅ Check class attribute syntax: `class="my-class"`
- ✅ Verify CSS specificity isn't being overridden
- ✅ Use browser DevTools to inspect computed styles
- ✅ Try `!important` temporarily to test specificity issues

---

## Real-World Examples

### Admin Dashboard

```blade
<x-tabler::page-header
    title="Admin Dashboard"
    pretitle="Overview"
    border
>
    <x-slot:subtitle>
        Last login: {{ auth()->user()->last_login_at->diffForHumans() }}
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <div class="dropdown">
                <button class="btn dropdown-toggle" data-bs-toggle="dropdown">
                    <x-tabler-calendar class="icon" />
                    {{ $dateRange }}
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="?range=today">Today</a>
                    <a class="dropdown-item" href="?range=week">This Week</a>
                    <a class="dropdown-item" href="?range=month">This Month</a>
                </div>
            </div>
            <a href="{{ route('reports.export') }}" class="btn btn-primary">
                <x-tabler-download class="icon" />
                Export
            </a>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Customer Support Ticket

```blade
<x-tabler::page-header
    title="Ticket #{{ $ticket->id }}: {{ $ticket->subject }}"
    icon="message"
>
    <x-slot:pretitle>
        <a href="{{ route('tickets.index') }}" class="text-muted">
            <x-tabler-arrow-left class="icon" />
            Back to All Tickets
        </a>
    </x-slot:pretitle>
    <x-slot:subtitle>
        <div class="d-flex gap-3 align-items-center">
            <span class="badge bg-{{ $ticket->priority_color }}">
                {{ $ticket->priority }}
            </span>
            <span class="text-muted">
                Opened {{ $ticket->created_at->diffForHumans() }} by
                <strong>{{ $ticket->customer->name }}</strong>
            </span>
            <span class="text-muted">
                Assigned to <strong>{{ $ticket->assignee->name }}</strong>
            </span>
        </div>
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <button class="btn" onclick="markResolved({{ $ticket->id }})">
                <x-tabler-check class="icon" />
                Mark Resolved
            </button>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#replyModal">
                <x-tabler-message class="icon" />
                Reply
            </button>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

### Blog Post Editor

```blade
<x-tabler::page-header
    title="{{ $post->title ?: 'New Blog Post' }}"
    icon="edit"
    border
>
    <x-slot:pretitle>
        <div class="breadcrumb breadcrumb-dots mb-1">
            <a href="{{ route('posts.index') }}">All Posts</a>
            <span class="breadcrumb-item active">
                {{ $post->exists ? 'Edit' : 'Create' }}
            </span>
        </div>
    </x-slot:pretitle>
    <x-slot:subtitle>
        @if($post->exists)
            Last saved {{ $post->updated_at->diffForHumans() }}
            @if($post->published_at)
                • Published {{ $post->published_at->format('M d, Y') }}
            @else
                • <span class="text-warning">Draft</span>
            @endif
        @else
            Start writing your blog post below
        @endif
    </x-slot:subtitle>
    <x-slot:actions>
        <div class="btn-list">
            <a href="{{ route('posts.index') }}" class="btn">Cancel</a>
            <button type="submit" form="post-form" name="action" value="draft" class="btn">
                <x-tabler-device-floppy class="icon" />
                Save Draft
            </button>
            <button type="submit" form="post-form" name="action" value="publish" class="btn btn-primary">
                <x-tabler-send class="icon" />
                {{ $post->published_at ? 'Update' : 'Publish' }}
            </button>
        </div>
    </x-slot:actions>
</x-tabler::page-header>
```

---

## Related Components

- [Breadcrumb](./breadcrumb.md) - Hierarchical navigation component perfect for pretitle slot
- [Button](./button.md) - Action buttons for the actions slot
- [Badge](./badge.md) - Status indicators for pretitle or subtitle areas
- [Dropdown](./dropdown.md) - Menu component for complex actions
- [Avatar](./avatar.md) - User profile images in subtitle content
- [Page](./page.md) - Full page layout wrapper that works with page headers
- [Container](./container.md) - Layout containers for content organization

---

## Notes

- The component includes a `container-xl` wrapper by default for consistent page width
- Print styles hide the header automatically via `d-print-none` class
- Icons use the Tabler icon system and require icon components to be published
- The responsive layout automatically stacks actions below the title on smaller screens
- All slots are optional and can be mixed with props for maximum flexibility
- The component uses Bootstrap 5 flexbox utilities for alignment and spacing

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/page-header.blade.php`

---

## Changelog

- **v1.0.0** - Initial release
  - Basic page header with title, pretitle, subtitle
  - Icon support via Tabler icon system
  - Actions slot for buttons and controls
  - Border variant
  - Responsive layout with Bootstrap 5 grid
  - Print-friendly styles
