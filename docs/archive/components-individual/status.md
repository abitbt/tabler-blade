# Status

A colored status indicator component that displays small circular dots to represent states, availability, or activity levels. Commonly used to show online/offline status, health indicators, or state changes in user interfaces.

## Overview

The Status component renders a small circular dot with customizable colors to indicate various states. It can be animated with a pulsing effect and positioned inline with text or absolutely within other components like avatars and badges.

### Key Features

- 8 semantic color variants (primary, secondary, success, danger, warning, info, light, dark)
- Optional pulsing animation effect
- Flexible positioning (inline or absolute)
- Small, unobtrusive visual indicator
- Fully customizable with additional classes
- Screen reader accessible

## Basic Usage

```blade
<x-tabler::status color="success" />
```

This renders a small green status dot indicating a positive or active state.

## Props / Attributes

### `color`
- **Type:** `string`
- **Default:** `'primary'`
- **Options:** `'primary'`, `'secondary'`, `'success'`, `'danger'`, `'warning'`, `'info'`, `'light'`, `'dark'`
- **Description:** Sets the color of the status indicator dot

### `animated`
- **Type:** `boolean`
- **Default:** `false`
- **Description:** When true, adds a pulsing animation effect to the status dot

### HTML Attributes

The component accepts standard HTML attributes which are merged with the base element:

```blade
<x-tabler::status
    color="success"
    class="ms-2"
    title="Online"
/>
```

## Slots

This component does not use slots. It renders as a simple visual indicator element.

## CSS Classes

The Status component uses Tabler's status indicator classes:

- `.status` - Base status indicator class
- `.status-primary` - Primary blue color
- `.status-secondary` - Secondary muted color
- `.status-success` - Success green color
- `.status-danger` - Danger red color
- `.status-warning` - Warning orange/yellow color
- `.status-info` - Info cyan color
- `.status-light` - Light gray color
- `.status-dark` - Dark gray/black color
- `.status-animated` - Adds pulsing animation effect

The component automatically applies the appropriate classes based on the `color` and `animated` props.

## Examples

### All Color Variants

```blade
<div class="d-flex gap-2 align-items-center">
    <x-tabler::status color="primary" />
    <x-tabler::status color="secondary" />
    <x-tabler::status color="success" />
    <x-tabler::status color="danger" />
    <x-tabler::status color="warning" />
    <x-tabler::status color="info" />
    <x-tabler::status color="light" />
    <x-tabler::status color="dark" />
</div>
```

### Animated Status Dot

```blade
<x-tabler::status color="success" :animated="true" />
```

The animated prop adds a subtle pulsing effect, useful for indicating active or live states.

### With Text Labels

```blade
<div class="d-flex align-items-center gap-2">
    <x-tabler::status color="success" :animated="true" />
    <span>Online</span>
</div>

<div class="d-flex align-items-center gap-2">
    <x-tabler::status color="danger" />
    <span>Offline</span>
</div>

<div class="d-flex align-items-center gap-2">
    <x-tabler::status color="warning" />
    <span>Away</span>
</div>
```

### Inline Usage in Lists

```blade
<ul class="list-unstyled">
    <li class="d-flex align-items-center gap-2 mb-2">
        <x-tabler::status color="success" :animated="true" />
        <span>Database: Operational</span>
    </li>
    <li class="d-flex align-items-center gap-2 mb-2">
        <x-tabler::status color="warning" />
        <span>Cache: Degraded</span>
    </li>
    <li class="d-flex align-items-center gap-2 mb-2">
        <x-tabler::status color="danger" />
        <span>Email Service: Down</span>
    </li>
</ul>
```

### In Avatar Component

```blade
<div class="position-relative d-inline-block">
    <x-tabler::avatar
        src="https://example.com/avatar.jpg"
        size="md"
    />
    <x-tabler::status
        color="success"
        :animated="true"
        class="position-absolute bottom-0 end-0"
        style="margin: 4px;"
    />
</div>
```

### In Badges

```blade
<x-tabler::badge color="secondary" class="d-inline-flex align-items-center gap-2">
    <x-tabler::status color="success" />
    <span>Active</span>
</x-tabler::badge>

<x-tabler::badge color="secondary" class="d-inline-flex align-items-center gap-2">
    <x-tabler::status color="danger" />
    <span>Inactive</span>
</x-tabler::badge>
```

### In Card Headers

```blade
<x-tabler::card>
    <x-slot:header>
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Server Status</h3>
            <div class="d-flex align-items-center gap-2">
                <x-tabler::status color="success" :animated="true" />
                <span class="text-muted">All systems operational</span>
            </div>
        </div>
    </x-slot:header>

    <x-slot:body>
        Server content here...
    </x-slot:body>
</x-tabler::card>
```

### In Dropdown Menu Items

```blade
<x-tabler::dropdown>
    <x-slot:toggle>
        Set Status
    </x-slot:toggle>

    <x-slot:menu>
        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
            <x-tabler::status color="success" />
            <span>Online</span>
        </a>
        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
            <x-tabler::status color="warning" />
            <span>Away</span>
        </a>
        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
            <x-tabler::status color="secondary" />
            <span>Busy</span>
        </a>
        <a class="dropdown-item d-flex align-items-center gap-2" href="#">
            <x-tabler::status color="danger" />
            <span>Offline</span>
        </a>
    </x-slot:menu>
</x-tabler::dropdown>
```

### In Tables

```blade
<table class="table">
    <thead>
        <tr>
            <th>User</th>
            <th>Status</th>
            <th>Last Seen</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <x-tabler::status color="success" :animated="true" />
                    <span>Online</span>
                </div>
            </td>
            <td>Now</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <x-tabler::status color="warning" />
                    <span>Away</span>
                </div>
            </td>
            <td>5 minutes ago</td>
        </tr>
        <tr>
            <td>Bob Johnson</td>
            <td>
                <div class="d-flex align-items-center gap-2">
                    <x-tabler::status color="danger" />
                    <span>Offline</span>
                </div>
            </td>
            <td>2 hours ago</td>
        </tr>
    </tbody>
</table>
```

### With Custom Styling

```blade
<x-tabler::status
    color="success"
    :animated="true"
    class="status-lg"
    style="width: 12px; height: 12px;"
/>
```

### As Notification Indicator

```blade
<button class="btn position-relative">
    Notifications
    <x-tabler::status
        color="danger"
        class="position-absolute top-0 start-100 translate-middle"
    />
</button>
```

## Accessibility

### Color Independence

The Status component uses color as a primary indicator, which may not be sufficient for users with color vision deficiencies. Always pair status indicators with text labels or other visual cues:

```blade
<!-- Good: Color + text -->
<div class="d-flex align-items-center gap-2">
    <x-tabler::status color="success" />
    <span>Online</span>
</div>

<!-- Bad: Color only -->
<x-tabler::status color="success" />
```

### ARIA Labels

Add descriptive titles or ARIA labels for screen reader users:

```blade
<x-tabler::status
    color="success"
    title="Online"
    aria-label="User is currently online"
/>
```

### Screen Reader Text

For standalone status indicators, include visually hidden text:

```blade
<div>
    <x-tabler::status color="success" :animated="true" />
    <span class="visually-hidden">User is online</span>
</div>
```

### Semantic HTML

When used in lists or tables, ensure proper semantic structure:

```blade
<ul class="list-unstyled" role="list">
    <li class="d-flex align-items-center gap-2">
        <x-tabler::status color="success" aria-hidden="true" />
        <span>Database operational</span>
    </li>
</ul>
```

### Focus Indicators

If status indicators are interactive (rare), ensure they have proper focus states:

```blade
<button class="btn btn-link p-0 d-flex align-items-center gap-2">
    <x-tabler::status color="success" />
    <span>Change status</span>
</button>
```

## Browser Compatibility

The Status component is compatible with all modern browsers:

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Opera 76+

The pulsing animation uses CSS animations which are well-supported across all modern browsers. For older browsers, the animation will gracefully degrade to a static dot.

## Troubleshooting

### Status Dot Not Visible

**Problem:** The status dot doesn't appear on the page.

**Solutions:**
- Ensure Tabler CSS is properly loaded
- Check that the parent container has proper display properties
- Verify the color prop is set to a valid value
- Check if the status is being hidden by overflow properties

```blade
<!-- Ensure parent allows visibility -->
<div class="position-relative" style="overflow: visible;">
    <x-tabler::status color="success" />
</div>
```

### Animation Not Working

**Problem:** The pulsing animation doesn't play.

**Solutions:**
- Verify the `animated` prop is set to `true` (not the string `"true"`)
- Check if animations are disabled by user preferences
- Ensure Tabler CSS includes animation classes

```blade
<!-- Correct boolean prop -->
<x-tabler::status color="success" :animated="true" />

<!-- Not this -->
<x-tabler::status color="success" animated="true" />
```

### Positioning Issues with Avatar

**Problem:** Status dot doesn't align properly with avatars.

**Solutions:**
- Use proper positioning classes and containers
- Adjust margins for visual alignment
- Ensure parent has `position: relative`

```blade
<div class="position-relative d-inline-block">
    <x-tabler::avatar src="avatar.jpg" />
    <x-tabler::status
        color="success"
        class="position-absolute bottom-0 end-0"
        style="transform: translate(-25%, -25%);"
    />
</div>
```

### Status Dot Too Small/Large

**Problem:** The status dot size doesn't match the design.

**Solutions:**
- Use custom CSS to adjust size
- Ensure proper scaling with parent elements
- Check if Bootstrap utility classes are affecting size

```blade
<!-- Larger status dot -->
<x-tabler::status
    color="success"
    style="width: 16px; height: 16px;"
/>

<!-- Smaller status dot -->
<x-tabler::status
    color="success"
    style="width: 6px; height: 6px;"
/>
```

### Color Not Matching Theme

**Problem:** Status colors don't match the application theme.

**Solutions:**
- Use appropriate Tabler color variants
- Override with custom CSS if needed
- Ensure theme CSS is loaded after Tabler

```blade
<!-- Use theme-aware colors -->
<x-tabler::status color="primary" />

<!-- Or custom color -->
<x-tabler::status
    color="success"
    style="background-color: var(--tblr-custom-green);"
/>
```

## Real-World Examples

### User Online Status in Chat Application

```blade
<div class="list-group">
    @foreach($users as $user)
        <div class="list-group-item d-flex align-items-center">
            <div class="position-relative me-3">
                <x-tabler::avatar
                    src="{{ $user->avatar }}"
                    size="md"
                />
                <x-tabler::status
                    color="{{ $user->is_online ? 'success' : 'secondary' }}"
                    :animated="$user->is_online"
                    class="position-absolute bottom-0 end-0"
                />
            </div>
            <div class="flex-grow-1">
                <h4 class="mb-1">{{ $user->name }}</h4>
                <div class="text-muted small">
                    @if($user->is_online)
                        Active now
                    @else
                        Last seen {{ $user->last_seen->diffForHumans() }}
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Server Health Dashboard

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">System Health</h3>
    </x-slot:header>

    <x-slot:body>
        <div class="list-group list-group-flush">
            @foreach($services as $service)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-2">
                        <x-tabler::status
                            color="{{ $service->status_color }}"
                            :animated="$service->is_healthy"
                        />
                        <div>
                            <div class="fw-bold">{{ $service->name }}</div>
                            <div class="small text-muted">{{ $service->description }}</div>
                        </div>
                    </div>
                    <div class="text-end">
                        <div class="small">Response time</div>
                        <div class="fw-bold">{{ $service->response_time }}ms</div>
                    </div>
                </div>
            @endforeach
        </div>
    </x-slot:body>
</x-tabler::card>
```

### Order Status Timeline

```blade
<div class="timeline">
    @foreach($order->statuses as $status)
        <div class="timeline-item">
            <div class="timeline-badge">
                <x-tabler::status
                    color="{{ $status->color }}"
                    :animated="$loop->last"
                />
            </div>
            <div class="timeline-content">
                <h4 class="mb-1">{{ $status->name }}</h4>
                <p class="text-muted mb-0">
                    {{ $status->description }}
                </p>
                <div class="small text-muted mt-1">
                    {{ $status->created_at->format('M d, Y h:i A') }}
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
.timeline {
    position: relative;
    padding-left: 2rem;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 0.5rem;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--tblr-border-color);
}

.timeline-item {
    position: relative;
    margin-bottom: 2rem;
}

.timeline-badge {
    position: absolute;
    left: -1.5rem;
    width: 1rem;
    height: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    background: white;
}

.timeline-content {
    padding-left: 1rem;
}
</style>
```

### Task Progress Indicator

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">Project Tasks</h3>
    </x-slot:header>

    <x-slot:body>
        <div class="list-group list-group-flush">
            @foreach($tasks as $task)
                <div class="list-group-item">
                    <div class="d-flex align-items-center mb-2">
                        <x-tabler::status
                            color="{{ $task->status_color }}"
                            :animated="$task->in_progress"
                        />
                        <h4 class="ms-2 mb-0">{{ $task->title }}</h4>
                        <x-tabler::badge
                            color="{{ $task->priority_color }}"
                            class="ms-auto"
                        >
                            {{ $task->priority }}
                        </x-tabler::badge>
                    </div>
                    <div class="text-muted small">
                        Assigned to {{ $task->assignee->name }} •
                        Due {{ $task->due_date->format('M d') }}
                    </div>
                    @if($task->in_progress)
                        <div class="progress mt-2" style="height: 4px;">
                            <div
                                class="progress-bar"
                                style="width: {{ $task->progress }}%"
                            ></div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </x-slot:body>
</x-tabler::card>
```

## Performance

The Status component is extremely lightweight and has minimal performance impact:

- Renders as a simple HTML element with CSS classes
- No JavaScript required for basic functionality
- CSS animations are GPU-accelerated
- Very small DOM footprint

### Optimization Tips

1. **Avoid Excessive Animation:** Limit animated status indicators to what's necessary
2. **Batch Rendering:** When displaying many status indicators, consider lazy loading
3. **CSS Over JS:** The component uses pure CSS, maintaining excellent performance
4. **Reduce Reflows:** Keep status indicators in their own layout containers

## Notes

- The Status component is purely presentational and doesn't handle state management
- Always pair status colors with text labels for accessibility
- The default size is optimized for inline usage with text
- The animated prop uses CSS animations which respect user motion preferences
- Status indicators work well with both light and dark themes
- The component can be customized with inline styles or additional CSS classes
- Consider using consistent color meanings across your application (e.g., green always means "active")

## Related Components

- [Badge](/docs/components/badge.md) - For labeled status indicators
- [Avatar](/docs/components/avatar.md) - Often used with status indicators for user presence
- [Dropdown](/docs/components/dropdown.md) - Can contain status options in menus

## Source

View the source code for this component:
- [status.blade.php](https://github.com/tabler/tabler-blade/blob/main/stubs/resources/views/tabler/status.blade.php)

## Changelog

### Version 1.0.0
- Initial release of Status component
- Support for 8 color variants
- Animated status indicator option
- Full accessibility support
