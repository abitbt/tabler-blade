# Badge

> Small count and labeling components to add extra information to interface elements.

## Overview

The Badge component provides versatile status indicators, labels, and counters for your interface. Badges can display text, icons, or simple notification dots, with support for multiple color schemes, style variants, and sizing options. The component automatically renders as either a `<span>` or `<a>` element depending on whether an `href` is provided.

**Key Features:**
- 20+ color variants with solid, light, and outline styles
- Icon support (leading, trailing, icon-only)
- Notification dots with optional blinking
- Link badges
- Multiple size variants
- Pill shape for counters
- Positioned notification badges
- Auto-generated ARIA labels for icon-only badges
- Built-in accessibility support

**Use Case:** Use badges for status indicators, count displays, labels, tags, notification dots, and inline metadata. Choose solid badges for prominence, light badges for subtlety, and outline badges for minimal emphasis.

---

## Basic Usage

```blade
<x-tabler::badge color="primary">
    Primary
</x-tabler::badge>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string\|null` | `null` | Color variant: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan` |
| `variant` | `string\|null` | `null` | Style variant: `light` (subtle/pastel), `outline` (border only) |
| `size` | `string\|null` | `null` | Size: `sm`, `lg` (default is `md`) |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `iconEnd` | `string\|null` | `null` | Trailing Tabler icon name (without `tabler-` prefix) |
| `iconOnly` | `bool` | `false` | Icon-only badge (no text, adds `badge-icononly` class) |
| `href` | `string\|null` | `null` | URL to link to (renders as `<a>` instead of `<span>`) |
| `dot` | `bool` | `false` | Minimal dot indicator (notification dot) |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Badge text/content (ignored if `iconOnly` or `dot` is true) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Badge Styles:**
- `badge-pill` - Rounded pill shape for counters
- `badge-outline` - Outline style (also via `variant="outline"`)
- `badge-dot` - Minimal dot indicator (also via `dot` prop)
- `badge-blink` - Blinking animation for notifications

**Badge Sizes:**
- `badge-sm` - Small badge (also via `size="sm"`)
- `badge-lg` - Large badge (also via `size="lg"`)
- `badge-icononly` - Icon-only badge (auto-applied with `iconOnly`)

**Positioning:**
- `badge-notification` - Position badge in top-right corner of parent
- `position-relative` - Add to parent element for badge-notification positioning

**Utilities:**
- `ms-2`, `me-2` - Margin spacing for inline badges
- `badges-list` - Container for badge groups (use on parent)

---

## Examples

### Basic Example

```blade
<x-tabler::badge color="primary">
    Primary
</x-tabler::badge>
```

**Output:** A solid primary-colored badge with white text

---

### Color Variants

```blade
{{-- Solid badges --}}
<x-tabler::badge color="primary">Primary</x-tabler::badge>
<x-tabler::badge color="success">Success</x-tabler::badge>
<x-tabler::badge color="danger">Danger</x-tabler::badge>
<x-tabler::badge color="warning">Warning</x-tabler::badge>
<x-tabler::badge color="info">Info</x-tabler::badge>
```

---

### Light/Subtle Variant

```blade
{{-- Light badges with pastel colors --}}
<x-tabler::badge color="blue" variant="light">Blue</x-tabler::badge>
<x-tabler::badge color="green" variant="light">Green</x-tabler::badge>
<x-tabler::badge color="purple" variant="light">Purple</x-tabler::badge>
```

---

### Outline Variant

```blade
{{-- Outline badges with transparent background --}}
<x-tabler::badge color="primary" variant="outline">Primary</x-tabler::badge>
<x-tabler::badge color="danger" variant="outline">Danger</x-tabler::badge>
<x-tabler::badge color="success" variant="outline">Success</x-tabler::badge>
```

---

### With Icons

```blade
{{-- Leading icon --}}
<x-tabler::badge icon="star" color="success">Featured</x-tabler::badge>

{{-- Trailing icon --}}
<x-tabler::badge icon-end="arrow-right" color="info">Next</x-tabler::badge>

{{-- Icon-only badge --}}
<x-tabler::badge icon="heart" iconOnly color="danger" aria-label="Favorite" />
```

---

### Size Variants

```blade
{{-- Small badge --}}
<x-tabler::badge size="sm" color="primary">Small</x-tabler::badge>

{{-- Medium badge (default) --}}
<x-tabler::badge color="primary">Medium</x-tabler::badge>

{{-- Large badge --}}
<x-tabler::badge size="lg" color="primary">Large</x-tabler::badge>
```

---

### Pill Badges

```blade
{{-- Perfect for counters and numbers --}}
<x-tabler::badge color="primary" class="badge-pill">1</x-tabler::badge>
<x-tabler::badge color="blue" class="badge-pill">99+</x-tabler::badge>
<x-tabler::badge color="purple" variant="light" class="badge-pill">New</x-tabler::badge>
```

---

### Link Badges

```blade
{{-- Badge as link --}}
<x-tabler::badge href="/profile" color="blue" variant="light">
    View Profile
</x-tabler::badge>

<x-tabler::badge href="/settings" color="info" icon="settings">
    Settings
</x-tabler::badge>
```

---

### Notification Dot

```blade
{{-- Simple notification dot --}}
<button class="btn position-relative">
    Profile
    <x-tabler::badge color="red" dot class="badge-notification" />
</button>

{{-- Blinking notification dot --}}
<button class="btn position-relative">
    Settings
    <x-tabler::badge color="red" dot class="badge-notification badge-blink" />
</button>
```

---

### Positioned Notification Badge

```blade
{{-- Positioned in top-right corner --}}
<button class="btn position-relative">
    Inbox
    <x-tabler::badge color="red" class="badge-notification badge-pill">9+</x-tabler::badge>
</button>

<div class="avatar position-relative">
    <img src="/avatar.jpg" alt="User" />
    <x-tabler::badge color="success" dot class="badge-notification" />
</div>
```

---

### Badge in Heading

```blade
<h2>
    Product Title
    <x-tabler::badge color="success">New</x-tabler::badge>
</h2>

<h3>
    Feature Update
    <x-tabler::badge color="blue" variant="light">v2.0</x-tabler::badge>
</h3>
```

---

### Badge in Button

```blade
{{-- Inline badge --}}
<x-tabler::button color="primary">
    Notifications
    <x-tabler::badge color="red" class="ms-2">4</x-tabler::badge>
</x-tabler::button>

{{-- Positioned badge --}}
<x-tabler::button color="primary" class="position-relative">
    Messages
    <x-tabler::badge color="danger" class="badge-notification badge-pill">12</x-tabler::badge>
</x-tabler::button>
```

---

### Badge Group

```blade
<div class="badges-list">
    <x-tabler::badge color="blue" variant="light">Design</x-tabler::badge>
    <x-tabler::badge color="green" variant="light">Development</x-tabler::badge>
    <x-tabler::badge color="purple" variant="light">Marketing</x-tabler::badge>
    <x-tabler::badge color="orange" variant="light">Sales</x-tabler::badge>
</div>
```

---

### Complete Example

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Project Tasks
            <x-tabler::badge color="blue" variant="light" class="ms-2">24</x-tabler::badge>
        </h3>
    </div>
    <div class="card-body">
        <div class="d-flex align-items-center mb-3">
            <span class="me-2">Status:</span>
            <x-tabler::badge color="success" icon="check">Completed</x-tabler::badge>
        </div>
        <div class="d-flex align-items-center mb-3">
            <span class="me-2">Priority:</span>
            <x-tabler::badge color="danger" icon="alert-triangle">High</x-tabler::badge>
        </div>
        <div class="d-flex align-items-center">
            <span class="me-2">Tags:</span>
            <div class="badges-list">
                <x-tabler::badge color="blue" variant="light">Backend</x-tabler::badge>
                <x-tabler::badge color="green" variant="light">API</x-tabler::badge>
                <x-tabler::badge color="purple" variant="light">Urgent</x-tabler::badge>
            </div>
        </div>
    </div>
</div>
```

---

## Variants

### Color Variants

Available colors: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

```blade
{{-- Solid colors --}}
<x-tabler::badge color="primary">Primary</x-tabler::badge>
<x-tabler::badge color="blue">Blue</x-tabler::badge>
<x-tabler::badge color="green">Green</x-tabler::badge>
```

---

### Style Variants

**Solid (default):**
```blade
<x-tabler::badge color="primary">Solid Badge</x-tabler::badge>
```

**Light/Subtle:**
```blade
<x-tabler::badge color="primary" variant="light">Light Badge</x-tabler::badge>
```

**Outline:**
```blade
<x-tabler::badge color="primary" variant="outline">Outline Badge</x-tabler::badge>
```

---

### Size Variants

Available sizes: `sm`, `md` (default), `lg`

```blade
<x-tabler::badge size="sm" color="primary">Small</x-tabler::badge>
<x-tabler::badge color="primary">Medium (default)</x-tabler::badge>
<x-tabler::badge size="lg" color="primary">Large</x-tabler::badge>
```

---

## Accessibility

### Keyboard Navigation
- Link badges are keyboard accessible via **Tab** key
- **Enter/Space:** Activates link badges
- Standard badges are not interactive and don't receive focus

### ARIA Attributes
- `aria-label`: Auto-generated for icon-only badges
- Custom `aria-label` can be provided for context

### Screen Reader Support
- Badge content is announced to screen readers
- Icon-only badges have descriptive ARIA labels
- Dot badges include visually-hidden text for screen readers

### Best Practices
- Always provide `aria-label` for icon-only badges
- Use semantic colors (success=green, danger=red)
- Don't rely solely on color to convey meaning
- Ensure sufficient contrast (handled by default)
- Provide text alternatives for dot badges

**Example:**
```blade
{{-- Accessible icon-only badge --}}
<x-tabler::badge
    icon="star"
    iconOnly
    color="warning"
    aria-label="Featured item" />

{{-- Accessible notification dot --}}
<x-tabler::badge color="red" dot>
    3 new notifications
</x-tabler::badge>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon props
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Blink animation may be reduced with `prefers-reduced-motion`
- Positioned badges may require adjustment in some legacy browsers

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::badge
    color="{{ $status === 'active' ? 'success' : 'secondary' }}"
    wire:click="toggleStatus">
    {{ ucfirst($status) }}
</x-tabler::badge>

{{-- Dynamic counter --}}
<button class="btn position-relative" wire:click="markAsRead">
    Notifications
    @if($unreadCount > 0)
        <x-tabler::badge
            color="red"
            class="badge-notification badge-pill">
            {{ $unreadCount }}
        </x-tabler::badge>
    @endif
</button>
```

**Alpine.js:**
```blade
<div x-data="{ count: 5 }">
    <button @click="count++" class="btn position-relative">
        Increment
        <x-tabler::badge
            color="primary"
            class="badge-notification badge-pill"
            x-show="count > 0"
            x-text="count"></x-tabler::badge>
    </button>
</div>
```

---

## Troubleshooting

### Common Issues

**Issue: Badge colors not applying**
- ✅ Use `color` prop instead of manual CSS classes
- ✅ Verify color name is valid (see Color Variants)
- ✅ Check for CSS specificity conflicts
- ✅ Ensure Bootstrap CSS is loaded

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Positioned badge not showing correctly**
- ✅ Add `position-relative` class to parent element
- ✅ Use `badge-notification` class on badge
- ✅ Verify parent has content (not empty)
- ✅ Check z-index conflicts

**Issue: Dot badge shows text**
- ✅ Set `dot` prop to `true`
- ✅ Text content is automatically hidden with `visually-hidden` class
- ✅ Don't use `iconOnly` with `dot` prop

**Issue: Icon-only badge too large**
- ✅ Use `size="sm"` for compact icon badges
- ✅ Apply custom width/height via CSS if needed
- ✅ Ensure `iconOnly` prop is set to `true`

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if Bootstrap classes are applied correctly
- Verify icon component is rendering
- Test with minimal example first
- Check for CSS conflicts with custom styles

---

## Real-World Examples

### Example 1: Status Indicators

```blade
<div class="list-group">
    @foreach($projects as $project)
        <div class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <span>{{ $project->name }}</span>
                @if($project->status === 'active')
                    <x-tabler::badge color="success" icon="check">Active</x-tabler::badge>
                @elseif($project->status === 'pending')
                    <x-tabler::badge color="warning" icon="clock">Pending</x-tabler::badge>
                @else
                    <x-tabler::badge color="secondary" icon="x">Inactive</x-tabler::badge>
                @endif
            </div>
        </div>
    @endforeach
</div>
```

**Use Case:** Displaying project or item statuses with colored indicators

---

### Example 2: Notification Counter

```blade
<nav class="navbar">
    <div class="navbar-nav">
        <a href="/notifications" class="nav-link position-relative">
            <x-tabler::icon name="bell" />
            Notifications
            @if($unreadNotifications > 0)
                <x-tabler::badge
                    color="red"
                    class="badge-notification badge-pill">
                    {{ $unreadNotifications > 99 ? '99+' : $unreadNotifications }}
                </x-tabler::badge>
            @endif
        </a>

        <a href="/messages" class="nav-link position-relative">
            <x-tabler::icon name="mail" />
            Messages
            @if($unreadMessages > 0)
                <x-tabler::badge
                    color="blue"
                    dot
                    class="badge-notification badge-blink" />
            @endif
        </a>
    </div>
</nav>
```

**Use Case:** Notification counters and indicators in navigation

---

### Example 3: Tag System

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Blog Post</h3>
    </div>
    <div class="card-body">
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->excerpt }}</p>

        <div class="mt-3">
            <span class="text-muted me-2">Tags:</span>
            <div class="badges-list">
                @foreach($post->tags as $tag)
                    <x-tabler::badge
                        href="{{ route('posts.tag', $tag->slug) }}"
                        color="{{ $tag->color }}"
                        variant="light">
                        {{ $tag->name }}
                    </x-tabler::badge>
                @endforeach
            </div>
        </div>
    </div>
</div>
```

**Use Case:** Tag and category displays with clickable links

---

### Example 4: User Role Badges

```blade
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if($user->role === 'admin')
                            <x-tabler::badge color="purple" icon="shield">Admin</x-tabler::badge>
                        @elseif($user->role === 'moderator')
                            <x-tabler::badge color="blue" icon="user-check">Moderator</x-tabler::badge>
                        @else
                            <x-tabler::badge color="secondary" icon="user">User</x-tabler::badge>
                        @endif
                    </td>
                    <td>
                        <span class="position-relative">
                            {{ $user->is_online ? 'Online' : 'Offline' }}
                            @if($user->is_online)
                                <x-tabler::badge color="success" dot class="ms-1" />
                            @endif
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
```

**Use Case:** User roles and online status in data tables

---

## Performance Considerations

### Component Weight
- Base badge: ~50-100 bytes rendered
- With icon: +2KB (icon SVG)
- Positioned badge: +50 bytes (positioning CSS)

### Best Practices
- Use light variant for subtle indicators
- Limit badge groups to 10-15 badges
- Cache frequently displayed badges
- Avoid excessive badge animations

### Optimization Tips
- Lazy load icon SVGs for large lists
- Use CSS classes directly for repeated patterns
- Minimize positioned badges (extra DOM wrapping)
- Consider server-side rendering for static badges

---

## Notes

- Badge automatically renders as `<a>` when `href` is provided
- `iconOnly` and `dot` badges ignore slot content
- Icon-only badges auto-generate ARIA labels
- Dot badges hide text with `visually-hidden` for screen readers
- Badge supports all 20+ Tabler color variants
- Positioned badges require parent with `position-relative`
- Blink animation respects `prefers-reduced-motion`

---

## Related Components

- [Button](./button.md) - Action buttons (badges often used inside buttons)
- [Avatar](./avatar.md) - User avatars (often combined with status badges)
- [Alert](./alert.md) - Alert messages (can contain badges)
- [Card](./cards/card.md) - Card containers (badge in headers)

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/badge.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with full badge functionality
