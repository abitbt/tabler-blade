# Avatar List

> Display multiple avatars in a stacked or inline list layout for team members, contributors, and user groups.

## Overview

The Avatar List component is a container for displaying multiple Avatar components together, either in a horizontal row or stacked with overlap. It's perfect for showing teams, contributors, participants, or any group of users in a compact, visually appealing way.

**Key Features:**
- Horizontal inline layout (default)
- Stacked/overlapped layout variant
- Consistent size control for all avatars
- Automatic spacing between avatars
- Support for overflow indicators (+N)
- Works seamlessly with Avatar component
- Tooltip integration support
- Responsive behavior

**Use Case:** Use avatar lists for displaying project teams, contributors, participants in meetings/events, followers, group members, or any scenario where you need to show multiple users in a compact space. The stacked variant is ideal when space is limited.

---

## Basic Usage

```blade
<x-tabler::avatar-list>
    <x-tabler::avatar src="/img/user1.jpg" alt="User 1" />
    <x-tabler::avatar src="/img/user2.jpg" alt="User 2" />
    <x-tabler::avatar src="/img/user3.jpg" alt="User 3" />
</x-tabler::avatar-list>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `stacked` | `bool` | `false` | Stack avatars with overlap effect |
| `size` | `string\|null` | `null` | Avatar size for all items: `sm`, `md`, `lg`, `xl`, `xxl` (Note: You still need to set size on individual avatars) |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the wrapper `<div>` element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Avatar components to display in the list |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Layout:**
- `avatar-list` - Base avatar list class (applied automatically)
- `avatar-list-stacked` - Stacked/overlapped avatars (also via `stacked` prop)

**Spacing:**
- `mb-3`, `mt-3` - Vertical margin spacing
- `me-2`, `ms-2` - Horizontal margin spacing

---

## Examples

### Basic Inline Avatar List

```blade
<x-tabler::avatar-list>
    <x-tabler::avatar src="/img/user1.jpg" alt="John Doe" />
    <x-tabler::avatar src="/img/user2.jpg" alt="Jane Smith" />
    <x-tabler::avatar src="/img/user3.jpg" alt="Bob Johnson" />
    <x-tabler::avatar src="/img/user4.jpg" alt="Alice Brown" />
</x-tabler::avatar-list>
```

**Output:** A horizontal row of avatars with default spacing

---

### Stacked Avatar List

```blade
<x-tabler::avatar-list stacked>
    <x-tabler::avatar src="/img/user1.jpg" alt="User 1" />
    <x-tabler::avatar src="/img/user2.jpg" alt="User 2" />
    <x-tabler::avatar src="/img/user3.jpg" alt="User 3" />
    <x-tabler::avatar src="/img/user4.jpg" alt="User 4" />
</x-tabler::avatar-list>
```

**Output:** Overlapping avatars creating a stacked effect

---

### Stacked Avatars with Overflow Indicator

```blade
<x-tabler::avatar-list stacked>
    <x-tabler::avatar src="/img/user1.jpg" alt="User 1" />
    <x-tabler::avatar src="/img/user2.jpg" alt="User 2" />
    <x-tabler::avatar src="/img/user3.jpg" alt="User 3" />
    <x-tabler::avatar initials="+5" alt="5 more members" />
</x-tabler::avatar-list>
```

**Output:** First 3 avatars visible with a "+5" indicator showing additional members

---

### Small Stacked Avatars

```blade
<x-tabler::avatar-list stacked>
    <x-tabler::avatar src="/img/user1.jpg" size="sm" alt="User 1" />
    <x-tabler::avatar src="/img/user2.jpg" size="sm" alt="User 2" />
    <x-tabler::avatar src="/img/user3.jpg" size="sm" alt="User 3" />
    <x-tabler::avatar src="/img/user4.jpg" size="sm" alt="User 4" />
</x-tabler::avatar-list>
```

**Output:** Compact stacked avatars (32px each)

---

### Avatars with Status Indicators

```blade
<x-tabler::avatar-list stacked>
    <x-tabler::avatar src="/img/user1.jpg" status="success" alt="User 1 (online)" />
    <x-tabler::avatar src="/img/user2.jpg" status="success" alt="User 2 (online)" />
    <x-tabler::avatar src="/img/user3.jpg" status="warning" alt="User 3 (away)" />
    <x-tabler::avatar src="/img/user4.jpg" status="secondary" alt="User 4 (offline)" />
</x-tabler::avatar-list>
```

**Output:** Stacked avatars showing online status of each member

---

### Dynamic Avatar List from Collection

```blade
<x-tabler::avatar-list stacked>
    @foreach($project->members->take(5) as $member)
        <x-tabler::avatar
            src="{{ $member->avatar_url }}"
            alt="{{ $member->name }}"
            data-bs-toggle="tooltip"
            title="{{ $member->name }}" />
    @endforeach

    @if($project->members->count() > 5)
        <x-tabler::avatar
            initials="+{{ $project->members->count() - 5 }}"
            alt="{{ $project->members->count() - 5 }} more members" />
    @endif
</x-tabler::avatar-list>
```

**Output:** Dynamic list showing first 5 members with overflow count

---

### With Tooltips

```blade
<x-tabler::avatar-list stacked>
    @foreach($contributors as $contributor)
        <x-tabler::avatar
            src="{{ $contributor->avatar_url }}"
            alt="{{ $contributor->name }}"
            data-bs-toggle="tooltip"
            data-bs-placement="top"
            title="{{ $contributor->name }} - {{ $contributor->contributions }} contributions" />
    @endforeach
</x-tabler::avatar-list>

@push('scripts')
<script>
    // Initialize Bootstrap tooltips
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
</script>
@endpush
```

---

## Accessibility

### Keyboard Navigation
- Avatar list is a visual container (no keyboard navigation)
- Individual avatars can be wrapped in `<a>` or `<button>` for interactivity
- Ensure tab order flows logically through interactive avatars

### ARIA Attributes
- Each avatar should have descriptive `alt` text
- Consider `role="list"` and `role="listitem"` for semantic markup
- Use `aria-label` on container if context is needed

### Screen Reader Support
- Screen readers announce each avatar's alt text sequentially
- Overflow indicators ("+5") should include descriptive alt text
- Interactive avatars announce as links or buttons

### Best Practices
- Provide descriptive alt text for each avatar
- Don't rely solely on visual stacking to convey meaning
- Include text labels when context is important
- Use tooltips to provide additional information
- Ensure clickable avatars have sufficient click target size

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (Flexbox)
- No JavaScript required (unless using tooltips)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Stacking order may vary in older browsers
- Overlap effect requires CSS transforms
- Very long lists may wrap differently on mobile
- Tooltip functionality requires Bootstrap JavaScript

---

## Related Components

- [Avatar](./avatar.md) - Individual user avatar component
- [Badge](./badge.md) - Status indicators and labels
- [Button](./button.md) - Interactive buttons
- [Status](./status.md) - Status indicators

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/avatar-list.blade.php`

---

## Changelog

### v1.0.0
- Initial release with inline and stacked layout variants
