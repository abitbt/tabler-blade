# Avatar

> User profile pictures and placeholders with status indicators and multiple size variants.

## Overview

The Avatar component displays user profile pictures with intelligent fallbacks to initials or icons when images are unavailable. It supports multiple sizes, shapes, status indicators, and accessibility features. The component automatically handles image loading errors and provides placeholder alternatives.

**Key Features:**
- Image, initials, or icon display modes
- 5 size variants (sm, md, lg, xl, xxl)
- Shape variants (rounded, circle)
- Status indicator dots (5 colors)
- Automatic fallback handling
- Custom content slot
- Built-in accessibility support
- Placeholder avatars

**Use Case:** Use avatars for user profiles, comment sections, team members, author bylines, and anywhere user representation is needed. Choose images for identified users, initials for names, and icons for generic placeholders.

---

## Basic Usage

```blade
<x-tabler::avatar src="/img/avatar.jpg" alt="John Doe" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string\|null` | `null` | Image source URL |
| `alt` | `string\|null` | `''` | Alt text for image (important for accessibility) |
| `size` | `string\|null` | `'md'` | Avatar size: `sm` (32px), `md` (48px), `lg` (64px), `xl` (80px), `xxl` (128px) |
| `status` | `string\|null` | `null` | Status indicator: `success`, `danger`, `warning`, `info`, `secondary` |
| `shape` | `string\|null` | `'rounded'` | Avatar shape: `rounded` (default), `rounded-circle` |
| `initials` | `string\|null` | `null` | Initials to display if no image (e.g., 'JD') |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) if no image or initials |
| `placeholder` | `string\|null` | `'icon'` | Placeholder style: `icon`, `initials` |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the avatar wrapper.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom avatar content (overrides image/initials/icon) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Avatar Sizes:**
- `avatar-sm` - Small avatar (32px, also via `size="sm"`)
- `avatar-md` - Medium avatar (48px, default)
- `avatar-lg` - Large avatar (64px, also via `size="lg"`)
- `avatar-xl` - Extra large avatar (80px, also via `size="xl"`)
- `avatar-xxl` - XX Large avatar (128px, also via `size="xxl"`)

**Avatar Shapes:**
- `rounded` - Slightly rounded corners (default)
- `rounded-circle` - Perfect circle

**Status Indicators:**
- `bg-success` - Green status dot (online)
- `bg-danger` - Red status dot (busy)
- `bg-warning` - Yellow status dot (away)
- `bg-info` - Blue status dot (available)
- `bg-secondary` - Gray status dot (offline)

**Layout:**
- `avatar-list` - Container for avatar groups (use on parent)
- `me-2`, `ms-2` - Spacing utilities

---

## Examples

### Basic Example

```blade
<x-tabler::avatar src="/img/user.jpg" alt="John Doe" />
```

**Output:** A medium-sized rounded avatar with the user's image

---

### With Initials

```blade
{{-- Avatar falls back to initials when no image --}}
<x-tabler::avatar initials="JD" alt="John Doe" />

<x-tabler::avatar initials="AB" alt="Alice Brown" />

<x-tabler::avatar initials="CD" alt="Carol Davis" />
```

---

### With Icon

```blade
{{-- Default user icon --}}
<x-tabler::avatar icon="user" alt="User" />

{{-- Custom icon --}}
<x-tabler::avatar icon="settings" alt="Settings" />

<x-tabler::avatar icon="star" alt="Featured" />
```

---

### Size Variants

```blade
{{-- Small avatar (32px) --}}
<x-tabler::avatar src="/img/user.jpg" size="sm" alt="User" />

{{-- Medium avatar (48px, default) --}}
<x-tabler::avatar src="/img/user.jpg" alt="User" />

{{-- Large avatar (64px) --}}
<x-tabler::avatar src="/img/user.jpg" size="lg" alt="User" />

{{-- Extra large avatar (80px) --}}
<x-tabler::avatar src="/img/user.jpg" size="xl" alt="User" />

{{-- XX Large avatar (128px) --}}
<x-tabler::avatar src="/img/user.jpg" size="xxl" alt="User" />
```

---

### Shape Variants

```blade
{{-- Rounded corners (default) --}}
<x-tabler::avatar src="/img/user.jpg" shape="rounded" alt="User" />

{{-- Perfect circle --}}
<x-tabler::avatar src="/img/user.jpg" shape="rounded-circle" alt="User" />
```

---

### With Status Indicator

```blade
{{-- Online (green) --}}
<x-tabler::avatar src="/img/user.jpg" status="success" alt="Online user" />

{{-- Busy (red) --}}
<x-tabler::avatar src="/img/user.jpg" status="danger" alt="Busy user" />

{{-- Away (yellow) --}}
<x-tabler::avatar src="/img/user.jpg" status="warning" alt="Away user" />

{{-- Available (blue) --}}
<x-tabler::avatar src="/img/user.jpg" status="info" alt="Available user" />

{{-- Offline (gray) --}}
<x-tabler::avatar src="/img/user.jpg" status="secondary" alt="Offline user" />
```

---

### Circular Avatar with Status

```blade
<x-tabler::avatar
    src="/img/user.jpg"
    shape="rounded-circle"
    status="success"
    alt="Online user" />
```

---

### Avatar Group

```blade
<div class="avatar-list avatar-list-stacked">
    <x-tabler::avatar src="/img/user1.jpg" alt="User 1" />
    <x-tabler::avatar src="/img/user2.jpg" alt="User 2" />
    <x-tabler::avatar src="/img/user3.jpg" alt="User 3" />
    <x-tabler::avatar initials="+5" alt="5 more users" />
</div>
```

---

### Avatar with Custom Content

```blade
<x-tabler::avatar>
    <img src="/img/avatar.jpg" alt="Custom" class="custom-filter" />
</x-tabler::avatar>

<x-tabler::avatar>
    <div class="bg-primary text-white d-flex align-items-center justify-content-center h-100">
        👋
    </div>
</x-tabler::avatar>
```

---

### Large Profile Avatar

```blade
<div class="text-center">
    <x-tabler::avatar
        src="{{ $user->avatar_url }}"
        size="xxl"
        shape="rounded-circle"
        status="success"
        alt="{{ $user->name }}" />
    <h3 class="mt-3">{{ $user->name }}</h3>
    <p class="text-muted">{{ $user->email }}</p>
</div>
```

---

### Complete Example

```blade
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <x-tabler::avatar
                src="{{ $user->avatar_url }}"
                size="lg"
                status="{{ $user->is_online ? 'success' : 'secondary' }}"
                alt="{{ $user->name }}" />

            <div class="ms-3">
                <h4 class="mb-0">{{ $user->name }}</h4>
                <p class="text-muted mb-0">
                    {{ $user->is_online ? 'Online' : 'Offline' }}
                </p>
            </div>
        </div>
    </div>
</div>
```

---

## Variants

### Size Variants

Available sizes: `sm` (32px), `md` (48px, default), `lg` (64px), `xl` (80px), `xxl` (128px)

```blade
<x-tabler::avatar src="/img/user.jpg" size="sm" alt="Small" />
<x-tabler::avatar src="/img/user.jpg" size="md" alt="Medium" />
<x-tabler::avatar src="/img/user.jpg" size="lg" alt="Large" />
<x-tabler::avatar src="/img/user.jpg" size="xl" alt="Extra Large" />
<x-tabler::avatar src="/img/user.jpg" size="xxl" alt="XX Large" />
```

---

### Shape Variants

**Rounded (default):**
```blade
<x-tabler::avatar src="/img/user.jpg" shape="rounded" alt="Rounded avatar" />
```

**Circle:**
```blade
<x-tabler::avatar src="/img/user.jpg" shape="rounded-circle" alt="Circular avatar" />
```

---

### Display Modes

**Image:**
```blade
<x-tabler::avatar src="/img/user.jpg" alt="User with image" />
```

**Initials:**
```blade
<x-tabler::avatar initials="JD" alt="John Doe" />
```

**Icon:**
```blade
<x-tabler::avatar icon="user" alt="Generic user" />
```

**Custom:**
```blade
<x-tabler::avatar>
    <span class="text-primary">🎨</span>
</x-tabler::avatar>
```

---

### Status Variants

Available statuses: `success` (online), `danger` (busy), `warning` (away), `info` (available), `secondary` (offline)

```blade
<x-tabler::avatar src="/img/user.jpg" status="success" alt="Online" />
<x-tabler::avatar src="/img/user.jpg" status="danger" alt="Busy" />
<x-tabler::avatar src="/img/user.jpg" status="warning" alt="Away" />
<x-tabler::avatar src="/img/user.jpg" status="info" alt="Available" />
<x-tabler::avatar src="/img/user.jpg" status="secondary" alt="Offline" />
```

---

## Accessibility

### Keyboard Navigation
- Avatars are non-interactive by default (no keyboard navigation)
- Wrap in `<a>` or `<button>` for interactive avatars

### ARIA Attributes
- `alt` attribute provides description for screen readers
- Status indicators include visually-hidden text
- Use descriptive `alt` text, not just "avatar"

### Screen Reader Support
- Image avatars announce alt text
- Initials are announced as text content
- Icon avatars have proper labeling
- Status dots are described to screen readers

### Best Practices
- Always provide descriptive `alt` text
- Use initials for identified users without images
- Describe status in alt text (e.g., "John Doe (online)")
- Ensure sufficient contrast for initials/icons
- Don't use avatar as only identifier (include text)

**Example:**
```blade
{{-- Good: Descriptive alt text --}}
<x-tabler::avatar
    src="/img/user.jpg"
    status="success"
    alt="John Doe (online)" />

{{-- Better: Alt text includes status context --}}
<x-tabler::avatar
    initials="JD"
    status="danger"
    alt="John Doe (busy, do not disturb)" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon placeholders
- Modern CSS support (Border-radius, Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Image loading failures don't trigger fallback automatically
- Status dot positioning may vary slightly in older Safari
- Avatar groups may stack differently on small screens

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
{{-- Dynamic avatar with status --}}
<x-tabler::avatar
    src="{{ $user->avatar_url }}"
    :status="$user->is_online ? 'success' : 'secondary'"
    alt="{{ $user->name }}" />

{{-- Clickable avatar --}}
<button wire:click="viewProfile({{ $user->id }})" class="btn p-0">
    <x-tabler::avatar
        src="{{ $user->avatar_url }}"
        size="lg"
        alt="View {{ $user->name }}'s profile" />
</button>
```

**Alpine.js:**
```blade
<div x-data="{ status: 'success' }">
    <x-tabler::avatar
        src="/img/user.jpg"
        :status="status"
        @click="status = status === 'success' ? 'danger' : 'success'"
        alt="User" />

    <button @click="status = 'warning'" class="btn btn-sm">
        Set Away
    </button>
</div>
```

**Interactive Avatar:**
```blade
{{-- Link avatar --}}
<a href="{{ route('profile', $user) }}">
    <x-tabler::avatar
        src="{{ $user->avatar_url }}"
        status="success"
        alt="View {{ $user->name }}'s profile" />
</a>

{{-- Button avatar --}}
<button onclick="openProfile()" class="btn btn-ghost p-0">
    <x-tabler::avatar src="/img/user.jpg" alt="Open profile" />
</button>
```

---

## Troubleshooting

### Common Issues

**Issue: Image not displaying**
- ✅ Verify `src` URL is correct and accessible
- ✅ Check image file permissions
- ✅ Ensure image exists at specified path
- ✅ Check for CORS issues with external images
- ✅ Provide fallback with `initials` or `icon` prop

**Issue: Status indicator not showing**
- ✅ Ensure `status` prop is set correctly
- ✅ Verify status value is valid: success, danger, warning, info, secondary
- ✅ Check Bootstrap CSS is loaded
- ✅ Inspect for CSS z-index conflicts

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Avatar too large or small**
- ✅ Use `size` prop: sm, md, lg, xl, xxl
- ✅ Check for conflicting CSS styles
- ✅ Verify Bootstrap sizing classes aren't overridden

**Issue: Initials not displaying**
- ✅ Ensure `initials` prop is set
- ✅ Don't provide `src` prop (image takes precedence)
- ✅ Check text color contrast
- ✅ Verify placeholder classes are applied

**Issue: Avatar not circular**
- ✅ Use `shape="rounded-circle"` prop
- ✅ Check for conflicting border-radius CSS
- ✅ Ensure Bootstrap classes aren't overridden

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if image URL returns 200 status
- Verify Bootstrap avatar classes are applied
- Test with different browsers
- Use browser console to check for loading errors

---

## Real-World Examples

### Example 1: User Profile Header

```blade
<div class="card">
    <div class="card-body">
        <div class="d-flex align-items-center mb-4">
            <x-tabler::avatar
                src="{{ auth()->user()->avatar_url }}"
                size="xl"
                shape="rounded-circle"
                status="{{ auth()->user()->is_online ? 'success' : 'secondary' }}"
                alt="{{ auth()->user()->name }}" />

            <div class="ms-4">
                <h3 class="mb-1">{{ auth()->user()->name }}</h3>
                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                <div class="mt-2">
                    <x-tabler::badge color="blue" variant="light">
                        {{ auth()->user()->role }}
                    </x-tabler::badge>
                </div>
            </div>
        </div>

        <div class="btn-list">
            <x-tabler::button color="primary">Edit Profile</x-tabler::button>
            <x-tabler::button variant="outline">Settings</x-tabler::button>
        </div>
    </div>
</div>
```

**Use Case:** User profile page header with avatar and user info

---

### Example 2: Comment Section

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Comments</h3>
    </div>
    <div class="card-body">
        @foreach($comments as $comment)
            <div class="d-flex mb-4">
                <x-tabler::avatar
                    src="{{ $comment->user->avatar_url }}"
                    initials="{{ $comment->user->initials }}"
                    alt="{{ $comment->user->name }}" />

                <div class="ms-3 flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <h5 class="mb-1">{{ $comment->user->name }}</h5>
                        <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    </div>
                    <p class="mb-0">{{ $comment->content }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
```

**Use Case:** Comment threads with user avatars

---

### Example 3: Team Member List

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Team Members</h3>
    </div>
    <div class="list-group list-group-flush">
        @foreach($team->members as $member)
            <div class="list-group-item">
                <div class="d-flex align-items-center">
                    <x-tabler::avatar
                        src="{{ $member->avatar_url }}"
                        status="{{ $member->status }}"
                        alt="{{ $member->name }}" />

                    <div class="ms-3 flex-grow-1">
                        <div class="fw-bold">{{ $member->name }}</div>
                        <div class="text-muted">{{ $member->role }}</div>
                    </div>

                    <div class="ms-auto">
                        <x-tabler::button
                            size="sm"
                            variant="outline"
                            icon="mail"
                            href="mailto:{{ $member->email }}">
                            Email
                        </x-tabler::button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
```

**Use Case:** Team member directory with online status

---

### Example 4: Avatar List (Stacked)

```blade
<div class="card">
    <div class="card-body">
        <h4 class="mb-3">Project Contributors</h4>

        <div class="avatar-list avatar-list-stacked">
            @foreach($project->contributors->take(5) as $contributor)
                <x-tabler::avatar
                    src="{{ $contributor->avatar_url }}"
                    alt="{{ $contributor->name }}"
                    data-bs-toggle="tooltip"
                    title="{{ $contributor->name }}" />
            @endforeach

            @if($project->contributors->count() > 5)
                <x-tabler::avatar
                    initials="+{{ $project->contributors->count() - 5 }}"
                    alt="{{ $project->contributors->count() - 5 }} more contributors" />
            @endif
        </div>
    </div>
</div>
```

**Use Case:** Showing multiple contributors with overflow indicator

---

## Performance Considerations

### Component Weight
- Base avatar: ~100 bytes rendered
- With image: +image file size
- With icon: +2KB (icon SVG)
- With status: +50 bytes

### Best Practices
- Optimize avatar images (compress, resize)
- Use appropriate image dimensions (32px-128px)
- Lazy load avatars in long lists
- Cache avatar URLs
- Provide initials fallback for faster rendering

### Optimization Tips
- Serve avatars from CDN
- Use WebP format for modern browsers
- Implement lazy loading with Intersection Observer
- Cache avatar components in production
- Consider placeholder avatars during loading

---

## Notes

- Avatar renders as `<span>` element (wrap in `<a>` or `<button>` for interactivity)
- Image takes precedence over initials and icons
- Initials are automatically uppercased
- Default icon is `user` if no icon specified
- Status indicator is positioned absolutely in top-right
- Multiple display modes: image, initials, icon, custom content
- Supports all Tabler icon names

---

## Related Components

- [Badge](./badge.md) - Status indicators and labels
- [Button](./button.md) - Interactive buttons (avatars often used inside)
- [Avatar List](./avatar-list.md) - Group of avatars with stacking
- [User Card](./user-card.md) - User profile cards with avatars

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/avatar.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with image, initials, icon, and status support
