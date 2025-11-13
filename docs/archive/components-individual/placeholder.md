# Placeholder Component

## Overview

The Placeholder component provides skeleton screens and loading placeholders that improve perceived performance by showing content structure while data loads. It creates visual previews of content using animated or static placeholder blocks, reducing user frustration during loading states.

**Key Features:**
- Multiple placeholder types (text, image, card)
- Wave animation effect
- Responsive sizing
- Grid and column layouts
- Customizable dimensions
- Zero dependencies

**Common Use Cases:**
- Content loading states
- Feed/list loading indicators
- Profile information loading
- Card/grid loading skeletons
- Table data loading
- Image lazy loading placeholders

## Basic Usage

### Simple Text Placeholder

```blade
<x-tabler::placeholder />
```

### Multiple Lines

```blade
<x-tabler::placeholder />
<x-tabler::placeholder />
<x-tabler::placeholder />
```

### Card Placeholder

```blade
<x-tabler::card>
    <x-tabler::placeholder class="mb-3" />
    <x-tabler::placeholder />
    <x-tabler::placeholder />
</x-tabler::card>
```

## Props/Attributes

### Component Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |
| `attributes` | `array` | `[]` | Additional HTML attributes |

### Available Modifiers (via class)

| Class | Description |
|-------|-------------|
| `placeholder` | Base placeholder element |
| `placeholder-xs` | Extra small height |
| `placeholder-sm` | Small height |
| `placeholder-lg` | Large height |
| `placeholder-xl` | Extra large height |
| `placeholder-wave` | Animated wave effect |

## Slots

This component does not use slots. Content is generated through CSS styling.

## CSS Classes

### Base Classes
- `placeholder` - Base placeholder styling
- `placeholder-wave` - Wave animation container

### Size Modifiers
- `placeholder-xs` - Extra small (0.5rem height)
- `placeholder-sm` - Small (0.75rem height)
- Default - Normal (1rem height)
- `placeholder-lg` - Large (1.5rem height)
- `placeholder-xl` - Extra large (2rem height)

### Width Utilities
- `col-*` - Column-based widths (1-12)
- `w-*` - Percentage widths (25, 50, 75, 100)

### Layout Classes
- `mb-*` - Bottom margin spacing
- `d-block` - Display block
- `d-inline-block` - Display inline-block

## Examples

### Basic Placeholder

```blade
<x-tabler::placeholder />
```

### Animated Wave Effect

```blade
<div class="placeholder-wave">
    <x-tabler::placeholder />
    <x-tabler::placeholder />
    <x-tabler::placeholder />
</div>
```

### Different Sizes

```blade
<div class="mb-3">
    <x-tabler::placeholder class="placeholder-xs" />
    <x-tabler::placeholder class="placeholder-sm" />
    <x-tabler::placeholder />
    <x-tabler::placeholder class="placeholder-lg" />
    <x-tabler::placeholder class="placeholder-xl" />
</div>
```

### Varying Widths

```blade
<div class="placeholder-wave">
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-10 mb-2" />
    <x-tabler::placeholder class="col-8 mb-2" />
    <x-tabler::placeholder class="col-6 mb-2" />
    <x-tabler::placeholder class="col-4" />
</div>
```

### Card Loading Skeleton

```blade
<x-tabler::card>
    <div class="placeholder-wave">
        <x-tabler::placeholder class="mb-3" style="height: 200px;" />
        <x-tabler::placeholder class="col-8 mb-2" />
        <x-tabler::placeholder class="col-12 mb-3" />
        <x-tabler::placeholder class="col-10 mb-2" />
        <x-tabler::placeholder class="col-12" />
    </div>
</x-tabler::card>
```

### List Item Placeholders

```blade
<div class="list-group list-group-flush">
    @for ($i = 0; $i < 5; $i++)
    <div class="list-group-item">
        <div class="row align-items-center">
            <div class="col-auto">
                <x-tabler::placeholder class="rounded-circle" style="width: 48px; height: 48px;" />
            </div>
            <div class="col placeholder-wave">
                <x-tabler::placeholder class="col-8 mb-2" />
                <x-tabler::placeholder class="col-6" />
            </div>
        </div>
    </div>
    @endfor
</div>
```

### Profile Header Loading

```blade
<div class="card-header placeholder-wave">
    <div class="row align-items-center">
        <div class="col-auto">
            <x-tabler::placeholder class="rounded-circle" style="width: 96px; height: 96px;" />
        </div>
        <div class="col">
            <x-tabler::placeholder class="col-6 mb-2 placeholder-lg" />
            <x-tabler::placeholder class="col-8 mb-2" />
            <x-tabler::placeholder class="col-4" />
        </div>
    </div>
</div>
```

### Grid Layout Skeleton

```blade
<div class="row row-cards">
    @for ($i = 0; $i < 6; $i++)
    <div class="col-md-4">
        <x-tabler::card>
            <div class="placeholder-wave">
                <x-tabler::placeholder class="mb-3" style="height: 180px;" />
                <x-tabler::placeholder class="col-10 mb-2" />
                <x-tabler::placeholder class="col-12 mb-2" />
                <x-tabler::placeholder class="col-8" />
            </div>
        </x-tabler::card>
    </div>
    @endfor
</div>
```

### Text Content Loading

```blade
<div class="placeholder-wave">
    <x-tabler::placeholder class="col-12 mb-3 placeholder-lg" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-11 mb-2" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-9 mb-4" />

    <x-tabler::placeholder class="col-10 mb-3 placeholder-lg" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-10" />
</div>
```

### Image Gallery Placeholder

```blade
<div class="row g-2 placeholder-wave">
    @for ($i = 0; $i < 8; $i++)
    <div class="col-6 col-md-3">
        <x-tabler::placeholder style="aspect-ratio: 1; height: auto;" />
    </div>
    @endfor
</div>
```

### Form Loading State

```blade
<form>
    <div class="placeholder-wave">
        <div class="mb-3">
            <x-tabler::placeholder class="col-3 mb-2 placeholder-sm" />
            <x-tabler::placeholder class="col-12" style="height: 38px;" />
        </div>
        <div class="mb-3">
            <x-tabler::placeholder class="col-4 mb-2 placeholder-sm" />
            <x-tabler::placeholder class="col-12" style="height: 38px;" />
        </div>
        <div class="mb-3">
            <x-tabler::placeholder class="col-5 mb-2 placeholder-sm" />
            <x-tabler::placeholder class="col-12" style="height: 120px;" />
        </div>
        <x-tabler::placeholder class="col-3" style="height: 38px;" />
    </div>
</form>
```

### Table Loading Skeleton

```blade
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                @for ($i = 0; $i < 4; $i++)
                <th><x-tabler::placeholder class="col-8" /></th>
                @endfor
            </tr>
        </thead>
        <tbody class="placeholder-wave">
            @for ($row = 0; $row < 5; $row++)
            <tr>
                @for ($col = 0; $col < 4; $col++)
                <td><x-tabler::placeholder class="col-{{ [12, 10, 8, 6][rand(0, 3)] }}" /></td>
                @endfor
            </tr>
            @endfor
        </tbody>
    </table>
</div>
```

### Conditional Loading State

```blade
@if($loading)
    <div class="placeholder-wave">
        <x-tabler::placeholder class="col-12 mb-2" />
        <x-tabler::placeholder class="col-10 mb-2" />
        <x-tabler::placeholder class="col-11" />
    </div>
@else
    <div>
        <h3>{{ $title }}</h3>
        <p>{{ $content }}</p>
    </div>
@endif
```

## Accessibility

### ARIA Attributes

```blade
<div aria-busy="true" aria-live="polite">
    <div class="placeholder-wave">
        <x-tabler::placeholder class="col-12 mb-2" />
        <x-tabler::placeholder class="col-10" />
    </div>
</div>
```

### Screen Reader Announcements

```blade
<div aria-busy="true" role="status" aria-label="Loading content">
    <span class="visually-hidden">Loading, please wait...</span>
    <div class="placeholder-wave">
        <x-tabler::placeholder class="col-12 mb-2" />
        <x-tabler::placeholder class="col-10" />
    </div>
</div>
```

### Best Practices

**Loading States:**
- Always use `aria-busy="true"` on container elements during loading
- Provide screen reader text explaining the loading state
- Use `role="status"` for live region announcements
- Remove placeholders and update `aria-busy="false"` when content loads

**Visual Indicators:**
- Use wave animation to indicate active loading
- Match placeholder structure to actual content layout
- Maintain consistent sizing and spacing with loaded content
- Avoid layout shifts when replacing placeholders

**User Experience:**
```blade
{{-- Good: Complete loading pattern --}}
<div
    x-data="{ loading: true }"
    :aria-busy="loading"
    role="status"
>
    <span class="visually-hidden" x-show="loading">Loading content...</span>
    <div x-show="loading" class="placeholder-wave">
        <x-tabler::placeholder class="col-12 mb-2" />
        <x-tabler::placeholder class="col-10" />
    </div>
    <div x-show="!loading">
        <!-- Actual content -->
    </div>
</div>
```

**Keyboard Navigation:**
- Placeholders are non-interactive and should not receive focus
- Ensure loading state doesn't trap keyboard focus
- Announce when content finishes loading to screen readers

## Browser Compatibility

The Placeholder component is compatible with all modern browsers:

- **Chrome/Edge:** Full support (version 90+)
- **Firefox:** Full support (version 88+)
- **Safari:** Full support (version 14+)
- **Mobile Browsers:** Full support on iOS Safari 14+ and Chrome Android

**Animation Support:**
- CSS animations supported in all modern browsers
- Wave effect uses CSS gradients and keyframe animations
- Gracefully degrades to static placeholders in older browsers

**Notes:**
- No JavaScript required for basic functionality
- Uses CSS-only animations for wave effect
- Works with server-side rendering

## Troubleshooting

### Animation Not Showing

**Problem:** Wave animation doesn't appear

```blade
{{-- Wrong: Missing wave wrapper --}}
<x-tabler::placeholder />
<x-tabler::placeholder />

{{-- Correct: Wrap in placeholder-wave --}}
<div class="placeholder-wave">
    <x-tabler::placeholder />
    <x-tabler::placeholder />
</div>
```

### Layout Shift When Loading

**Problem:** Content jumps when placeholder is replaced

```blade
{{-- Wrong: Placeholder doesn't match content height --}}
<div class="placeholder-wave">
    <x-tabler::placeholder />
</div>

{{-- Correct: Match actual content dimensions --}}
<div class="placeholder-wave">
    <x-tabler::placeholder class="col-8 mb-2 placeholder-lg" />
    <x-tabler::placeholder class="col-12 mb-2" />
    <x-tabler::placeholder class="col-10" />
</div>
```

### Placeholder Width Issues

**Problem:** Placeholder takes full width unexpectedly

```blade
{{-- Wrong: No width constraint --}}
<x-tabler::placeholder />

{{-- Correct: Use column or width classes --}}
<x-tabler::placeholder class="col-6" />
<x-tabler::placeholder class="w-75" />
```

### Circular Placeholder Not Round

**Problem:** Circle appears as oval or square

```blade
{{-- Wrong: No explicit dimensions --}}
<x-tabler::placeholder class="rounded-circle" />

{{-- Correct: Set equal width and height --}}
<x-tabler::placeholder class="rounded-circle" style="width: 64px; height: 64px;" />
```

### Performance with Many Placeholders

**Problem:** Page lag with numerous animated placeholders

```blade
{{-- Solution: Limit wave animations to visible containers --}}
<div class="placeholder-wave">
    @for ($i = 0; $i < 5; $i++)
    <x-tabler::placeholder class="mb-2" />
    @endfor
</div>

{{-- Instead of individual wave wrappers --}}
```

## Real-World Examples

### Content Feed Loading

```blade
<div class="card">
    <div class="card-body">
        @if($postsLoaded)
            @foreach($posts as $post)
                <div class="mb-4">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $post->author->avatar }}" class="avatar rounded-circle me-2" />
                        <div>
                            <strong>{{ $post->author->name }}</strong>
                            <div class="text-muted small">{{ $post->created_at->diffForHumans() }}</div>
                        </div>
                    </div>
                    <p>{{ $post->content }}</p>
                    @if($post->image)
                        <img src="{{ $post->image }}" class="img-fluid rounded" />
                    @endif
                </div>
            @endforeach
        @else
            <div class="placeholder-wave" aria-busy="true" role="status">
                <span class="visually-hidden">Loading posts...</span>
                @for ($i = 0; $i < 3; $i++)
                    <div class="mb-4">
                        <div class="d-flex align-items-center mb-2">
                            <x-tabler::placeholder class="rounded-circle me-2" style="width: 40px; height: 40px;" />
                            <div class="flex-fill">
                                <x-tabler::placeholder class="col-4 mb-1" />
                                <x-tabler::placeholder class="col-3 placeholder-xs" />
                            </div>
                        </div>
                        <x-tabler::placeholder class="col-12 mb-2" />
                        <x-tabler::placeholder class="col-11 mb-2" />
                        <x-tabler::placeholder class="col-9 mb-3" />
                        <x-tabler::placeholder style="height: 200px;" />
                    </div>
                @endfor
            </div>
        @endif
    </div>
</div>
```

### User Profile Loading

```blade
<div x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 2000)">
    <x-tabler::card>
        <div x-show="loading" class="placeholder-wave" aria-busy="true">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <x-tabler::placeholder class="rounded-circle" style="width: 96px; height: 96px;" />
                    </div>
                    <div class="col">
                        <x-tabler::placeholder class="col-6 mb-2 placeholder-lg" />
                        <x-tabler::placeholder class="col-8 mb-2" />
                        <x-tabler::placeholder class="col-4" />
                    </div>
                </div>
            </div>

            <div class="card-body border-top">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <x-tabler::placeholder class="col-4 mb-2 placeholder-sm" />
                        <x-tabler::placeholder class="col-8" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-tabler::placeholder class="col-5 mb-2 placeholder-sm" />
                        <x-tabler::placeholder class="col-10" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-tabler::placeholder class="col-3 mb-2 placeholder-sm" />
                        <x-tabler::placeholder class="col-7" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-tabler::placeholder class="col-4 mb-2 placeholder-sm" />
                        <x-tabler::placeholder class="col-6" />
                    </div>
                </div>
            </div>
        </div>

        <div x-show="!loading" style="display: none;">
            <!-- Actual profile content -->
        </div>
    </x-tabler::card>
</div>
```

### E-commerce Product Grid

```blade
<div wire:loading.delay class="row row-cards">
    @for ($i = 0; $i < 12; $i++)
    <div class="col-sm-6 col-lg-3">
        <x-tabler::card>
            <div class="placeholder-wave">
                <x-tabler::placeholder class="mb-3" style="aspect-ratio: 1; height: auto;" />
                <x-tabler::placeholder class="col-10 mb-2" />
                <x-tabler::placeholder class="col-12 mb-2" />
                <x-tabler::placeholder class="col-4 placeholder-lg" />
            </div>
        </x-tabler::card>
    </div>
    @endfor
</div>

<div wire:loading.remove.delay class="row row-cards">
    @foreach($products as $product)
        <div class="col-sm-6 col-lg-3">
            <x-tabler::card>
                <img src="{{ $product->image }}" class="card-img-top" />
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p class="text-muted">{{ $product->description }}</p>
                    <div class="h2">${{ number_format($product->price, 2) }}</div>
                </div>
            </x-tabler::card>
        </div>
    @endforeach
</div>
```

### Data Table with Pagination

```blade
<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter card-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <tbody>
                @if($loading)
                    <tr class="placeholder-wave">
                        <td colspan="5" class="p-0">
                            @for ($i = 0; $i < 10; $i++)
                            <div class="d-flex p-3 border-bottom">
                                <div class="flex-fill pe-3">
                                    <x-tabler::placeholder class="col-6" />
                                </div>
                                <div class="flex-fill pe-3">
                                    <x-tabler::placeholder class="col-8" />
                                </div>
                                <div class="flex-fill pe-3">
                                    <x-tabler::placeholder class="col-4" />
                                </div>
                                <div class="flex-fill pe-3">
                                    <x-tabler::placeholder class="col-5" />
                                </div>
                                <div style="width: 60px;">
                                    <x-tabler::placeholder class="col-12" />
                                </div>
                            </div>
                            @endfor
                        </td>
                    </tr>
                @else
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <span class="badge bg-{{ $user->status_color }}">
                                {{ $user->status }}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    @if(!$loading)
    <div class="card-footer">
        {{ $users->links() }}
    </div>
    @endif
</div>
```

## Performance

### Optimization Tips

**Limit Animation Scope:**
```blade
{{-- Good: One animation wrapper for multiple placeholders --}}
<div class="placeholder-wave">
    <x-tabler::placeholder />
    <x-tabler::placeholder />
    <x-tabler::placeholder />
</div>

{{-- Avoid: Multiple animation wrappers --}}
<div class="placeholder-wave">
    <x-tabler::placeholder />
</div>
<div class="placeholder-wave">
    <x-tabler::placeholder />
</div>
```

**Use CSS Properties:**
- Placeholders use CSS animations (GPU-accelerated)
- Wave effect is optimized with transform and opacity
- No JavaScript overhead
- Minimal repaints and reflows

**Lazy Loading Integration:**
```blade
<div x-intersect="$wire.loadMore()" class="placeholder-wave">
    @for ($i = 0; $i < 5; $i++)
    <x-tabler::placeholder class="mb-2" />
    @endfor
</div>
```

**Bundle Size:**
- CSS-only component (no JavaScript)
- Minimal CSS footprint (~2KB)
- No external dependencies

## Notes

- Placeholders are purely presentational and should not contain interactive elements
- Always provide proper ARIA attributes for screen readers during loading states
- Match placeholder structure to actual content to minimize layout shifts
- The wave animation creates a shimmer effect that moves left to right
- Use `placeholder-wave` class on parent container, not individual placeholders
- Consider using static placeholders (without wave) for better performance with many items
- Placeholders inherit border-radius from utility classes (rounded, rounded-circle, etc.)
- Custom dimensions can be set using inline styles or custom CSS classes
- The component uses Bootstrap's color system for consistent theming

## Related Components

- [Spinner](/docs/components/spinner.md) - Alternative loading indicators
- [Card](/docs/components/card.md) - Container for placeholder layouts
- [Avatar](/docs/components/avatar.md) - Circular placeholder reference

## Source

**Component Source:** `/resources/views/tabler/placeholder.blade.php`

**Tabler UI Reference:** [Placeholders](https://preview.tabler.io/docs/placeholders.html)

## Changelog

### Version 1.0.0
- Initial release
- Support for multiple sizes (xs, sm, lg, xl)
- Wave animation effect
- Responsive width utilities
- Full accessibility support
