# Ribbon

Decorative corner ribbon for highlighting important content, promotions, or status indicators with various positioning and styling options.

## Overview

The Ribbon component provides a decorative element that appears as a folded corner banner on containers. It's commonly used to draw attention to special features, promotions, or status indicators. The component supports multiple positions, colors, and styles to fit various design needs.

### Key Features

- Multiple color variants (20+ Tabler colors)
- 4 position options (top-start, top-end, bottom-start, bottom-end)
- Bookmark style variant
- Icon support within ribbon text
- Absolute positioning for easy overlay
- Customizable with additional CSS classes

### When to Use

- **E-commerce**: Sale badges, discount indicators, "NEW" labels
- **Content Highlighting**: Featured items, premium content markers
- **Status Indicators**: Limited edition, exclusive, verified badges
- **Promotions**: Special offers, seasonal campaigns
- **Navigation**: Visual cues for important sections

### When Not to Use

- **Interactive Elements**: Use buttons or links for clickable items
- **Inline Content**: Use badges for inline status indicators
- **Long Text**: Ribbons work best with 1-3 words
- **Accessibility-Critical Info**: Don't rely solely on ribbons for important information

## Basic Usage

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon>
        New
    </x-tabler::ribbon>
    <div class="card-body">
        Product content here
    </div>
</div>
```

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string` | `'primary'` | Color variant (primary, secondary, success, warning, danger, info, dark, light, blue, azure, indigo, purple, pink, red, orange, yellow, lime, green, teal, cyan, muted) |
| `position` | `string` | `'top-end'` | Position of the ribbon (top-start, top-end, bottom-start, bottom-end) |
| `bookmark` | `boolean` | `false` | Use bookmark style instead of folded corner |

## Slots

### Default Slot

The ribbon text or content:

```blade
<x-tabler::ribbon color="green">
    25% Off
</x-tabler::ribbon>
```

Can include icons or other inline elements:

```blade
<x-tabler::ribbon color="yellow">
    <x-tabler::icon name="star" class="me-1" />
    Featured
</x-tabler::ribbon>
```

## CSS Classes

The component uses these Tabler CSS classes:

- `.ribbon` - Base ribbon container
- `.ribbon-top` - Positions at top (with start/end)
- `.ribbon-start` - Positions at start (left in LTR)
- `.ribbon-end` - Positions at end (right in LTR)
- `.ribbon-bottom` - Positions at bottom (with start/end)
- `.ribbon-bookmark` - Bookmark style variant
- `.bg-{color}` - Background color variants

## Examples

### Basic Ribbon

Default ribbon with primary color:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon>
        New
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>
```

### Top Positions

Ribbons at top-start and top-end:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon position="top-start" color="blue">
        Top Start
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>

<div class="card" style="position: relative;">
    <x-tabler::ribbon position="top-end" color="green">
        Top End
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>
```

### Bottom Positions

Ribbons at bottom corners:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon position="bottom-start" color="orange">
        Bottom Start
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>

<div class="card" style="position: relative;">
    <x-tabler::ribbon position="bottom-end" color="purple">
        Bottom End
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>
```

### All Color Variants

Ribbons in different colors:

```blade
<x-tabler::ribbon color="primary">Primary</x-tabler::ribbon>
<x-tabler::ribbon color="secondary">Secondary</x-tabler::ribbon>
<x-tabler::ribbon color="success">Success</x-tabler::ribbon>
<x-tabler::ribbon color="warning">Warning</x-tabler::ribbon>
<x-tabler::ribbon color="danger">Danger</x-tabler::ribbon>
<x-tabler::ribbon color="info">Info</x-tabler::ribbon>
<x-tabler::ribbon color="dark">Dark</x-tabler::ribbon>
<x-tabler::ribbon color="red">Red</x-tabler::ribbon>
<x-tabler::ribbon color="orange">Orange</x-tabler::ribbon>
<x-tabler::ribbon color="yellow">Yellow</x-tabler::ribbon>
<x-tabler::ribbon color="green">Green</x-tabler::ribbon>
<x-tabler::ribbon color="teal">Teal</x-tabler::ribbon>
<x-tabler::ribbon color="blue">Blue</x-tabler::ribbon>
<x-tabler::ribbon color="purple">Purple</x-tabler::ribbon>
<x-tabler::ribbon color="pink">Pink</x-tabler::ribbon>
```

### With Icons

Ribbons with icon content:

```blade
<x-tabler::ribbon color="yellow">
    <svg class="icon icon-tabler me-1" width="16" height="16">
        <use xlink:href="#icon-star" />
    </svg>
    Featured
</x-tabler::ribbon>

<x-tabler::ribbon color="red">
    <svg class="icon icon-tabler me-1" width="16" height="16">
        <use xlink:href="#icon-flame" />
    </svg>
    Hot Deal
</x-tabler::ribbon>

<x-tabler::ribbon color="green">
    <svg class="icon icon-tabler me-1" width="16" height="16">
        <use xlink:href="#icon-check" />
    </svg>
    Verified
</x-tabler::ribbon>
```

### Bookmark Style

Ribbons with bookmark appearance:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon :bookmark="true" color="blue">
        Bookmark
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>

<div class="card" style="position: relative;">
    <x-tabler::ribbon :bookmark="true" position="top-start" color="purple">
        Featured
    </x-tabler::ribbon>
    <div class="card-body">
        Content
    </div>
</div>
```

### In Cards

Ribbons on card components:

```blade
<div class="row row-cols-1 row-cols-md-3 g-4">
    <div class="col">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="red" position="top-end">
                Sale
            </x-tabler::ribbon>
            <div class="card-img-top" style="height: 200px; background: #f0f0f0;"></div>
            <div class="card-body">
                <h3 class="card-title">Product Name</h3>
                <p class="card-text">Product description goes here.</p>
                <div class="text-muted">
                    <del>$99.99</del>
                    <span class="text-red fw-bold">$49.99</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="green" position="top-start">
                New
            </x-tabler::ribbon>
            <div class="card-img-top" style="height: 200px; background: #f0f0f0;"></div>
            <div class="card-body">
                <h3 class="card-title">New Arrival</h3>
                <p class="card-text">Just released this week.</p>
                <div class="fw-bold">$79.99</div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="yellow" position="top-end">
                <svg class="icon icon-tabler me-1" width="16" height="16">
                    <use xlink:href="#icon-star" />
                </svg>
                Featured
            </x-tabler::ribbon>
            <div class="card-img-top" style="height: 200px; background: #f0f0f0;"></div>
            <div class="card-body">
                <h3 class="card-title">Best Seller</h3>
                <p class="card-text">Our most popular item.</p>
                <div class="fw-bold">$89.99</div>
            </div>
        </div>
    </div>
</div>
```

### On Images

Ribbons directly on images:

```blade
<div style="position: relative; display: inline-block;">
    <img src="/path/to/image.jpg" alt="Product" class="rounded" style="width: 300px;">
    <x-tabler::ribbon color="red">
        50% Off
    </x-tabler::ribbon>
</div>

<div style="position: relative; display: inline-block;">
    <img src="/path/to/image.jpg" alt="Product" class="rounded" style="width: 300px;">
    <x-tabler::ribbon position="bottom-start" color="blue">
        Limited Edition
    </x-tabler::ribbon>
</div>
```

### Multiple Ribbons

Multiple ribbons on the same element:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon position="top-start" color="green">
        Organic
    </x-tabler::ribbon>
    <x-tabler::ribbon position="top-end" color="red">
        Sale
    </x-tabler::ribbon>
    <div class="card-body">
        <h3 class="card-title">Premium Product</h3>
        <p>This product has multiple highlights.</p>
    </div>
</div>
```

### In Grid Layout

Ribbons in a product grid:

```blade
<div class="row row-cols-2 row-cols-lg-4 g-3">
    @foreach($products as $product)
        <div class="col">
            <div class="card" style="position: relative;">
                @if($product->is_new)
                    <x-tabler::ribbon color="green">New</x-tabler::ribbon>
                @endif

                @if($product->on_sale)
                    <x-tabler::ribbon color="red" position="top-start">
                        {{ $product->discount }}% Off
                    </x-tabler::ribbon>
                @endif

                @if($product->is_featured)
                    <x-tabler::ribbon color="yellow" :bookmark="true">
                        <svg class="icon icon-tabler" width="16" height="16">
                            <use xlink:href="#icon-star" />
                        </svg>
                    </x-tabler::ribbon>
                @endif

                <div class="card-body">
                    <h4>{{ $product->name }}</h4>
                    <div class="text-muted">${{ $product->price }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

## Accessibility

### ARIA Labels

Add descriptive ARIA labels for screen readers:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon color="red" aria-label="Product on sale">
        Sale
    </x-tabler::ribbon>
    <div class="card-body">
        Product content
    </div>
</div>
```

### Screen Reader Text

Include additional context for screen readers:

```blade
<x-tabler::ribbon color="green">
    <span class="visually-hidden">This product is </span>
    New
</x-tabler::ribbon>

<x-tabler::ribbon color="yellow">
    <span class="visually-hidden">This item is </span>
    Featured
    <span class="visually-hidden"> and highly recommended</span>
</x-tabler::ribbon>
```

### Semantic Meaning

Use appropriate semantic HTML within ribbons:

```blade
<x-tabler::ribbon color="red">
    <strong>50% Off</strong>
</x-tabler::ribbon>

<x-tabler::ribbon color="blue">
    <span role="status">Limited Stock</span>
</x-tabler::ribbon>
```

### Role Attributes

Add role attributes when ribbons convey important status:

```blade
<x-tabler::ribbon color="green" role="status" aria-live="polite">
    Available Now
</x-tabler::ribbon>

<x-tabler::ribbon color="red" role="alert">
    Last Chance
</x-tabler::ribbon>
```

### Keyboard Navigation

Ribbons are decorative and don't require keyboard interaction, but the parent container should be accessible:

```blade
<a href="/product/123" class="card text-decoration-none" style="position: relative;">
    <x-tabler::ribbon color="red" aria-hidden="true">
        Sale
    </x-tabler::ribbon>
    <div class="card-body">
        <h3 class="card-title">Product Name</h3>
        <p>Description with sale information included for accessibility.</p>
    </div>
</a>
```

## Browser Compatibility

The Ribbon component is compatible with all modern browsers:

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

The component uses standard CSS positioning and transforms that are widely supported. For older browsers, ribbons will still display but may not have the folded corner effect.

## Troubleshooting

### Ribbon Not Visible

**Problem:** Ribbon doesn't appear on the page.

**Solution:** Ensure the parent container has `position: relative` or `position: absolute`:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon color="red">Sale</x-tabler::ribbon>
    <div class="card-body">Content</div>
</div>
```

### Ribbon Behind Content

**Problem:** Ribbon appears behind other content.

**Solution:** The ribbon has a default z-index, but you may need to adjust it:

```blade
<x-tabler::ribbon color="red" style="z-index: 10;">
    Sale
</x-tabler::ribbon>
```

Or adjust the parent container's stacking context.

### Ribbon Cut Off

**Problem:** Ribbon is clipped by parent container.

**Solution:** Ensure the parent doesn't have `overflow: hidden`, or adjust padding:

```blade
<div class="card" style="position: relative; overflow: visible;">
    <x-tabler::ribbon color="red">Sale</x-tabler::ribbon>
    <div class="card-body">Content</div>
</div>
```

### Text Too Long

**Problem:** Long text doesn't fit in the ribbon.

**Solution:** Keep ribbon text concise (1-3 words). For longer text, consider using a badge instead:

```blade
{{-- Good --}}
<x-tabler::ribbon color="red">Sale</x-tabler::ribbon>

{{-- Too long --}}
<x-tabler::ribbon color="red">Limited Time Special Offer</x-tabler::ribbon>

{{-- Better alternative --}}
<x-tabler::badge color="red">Limited Time Special Offer</x-tabler::badge>
```

### Position Conflicts

**Problem:** Multiple ribbons overlap each other.

**Solution:** Use different corner positions:

```blade
<div class="card" style="position: relative;">
    <x-tabler::ribbon position="top-start" color="green">New</x-tabler::ribbon>
    <x-tabler::ribbon position="top-end" color="red">Sale</x-tabler::ribbon>
    <div class="card-body">Content</div>
</div>
```

### Responsive Issues

**Problem:** Ribbon looks too large or small on certain screen sizes.

**Solution:** Ribbons scale with text size. Use responsive font utilities if needed:

```blade
<x-tabler::ribbon color="red" class="fs-5 fs-md-4">
    Sale
</x-tabler::ribbon>
```

## Real-World Examples

### E-commerce Product Card

Product card with sale ribbon and discount information:

```blade
<div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($products as $product)
        <div class="col">
            <div class="card h-100" style="position: relative;">
                @if($product->discount > 0)
                    <x-tabler::ribbon color="red" position="top-end">
                        -{{ $product->discount }}%
                    </x-tabler::ribbon>
                @endif

                <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-muted">{{ $product->description }}</p>

                    <div class="d-flex align-items-center gap-2">
                        @if($product->discount > 0)
                            <span class="text-muted text-decoration-line-through">
                                ${{ $product->original_price }}
                            </span>
                            <span class="text-red fw-bold fs-4">
                                ${{ $product->sale_price }}
                            </span>
                        @else
                            <span class="fw-bold fs-4">${{ $product->price }}</span>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary w-100">Add to Cart</button>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Content Status Indicators

Blog posts or articles with status ribbons:

```blade
<div class="row g-3">
    @foreach($posts as $post)
        <div class="col-12 col-md-6">
            <div class="card" style="position: relative;">
                @if($post->is_new && $post->created_at->diffInDays() <= 7)
                    <x-tabler::ribbon color="green" position="top-end">
                        New
                    </x-tabler::ribbon>
                @endif

                @if($post->is_featured)
                    <x-tabler::ribbon color="yellow" position="top-start" :bookmark="true">
                        <svg class="icon icon-tabler me-1" width="16" height="16">
                            <use xlink:href="#icon-star" />
                        </svg>
                        Featured
                    </x-tabler::ribbon>
                @endif

                @if($post->is_premium)
                    <x-tabler::ribbon color="purple" position="bottom-end">
                        <svg class="icon icon-tabler me-1" width="16" height="16">
                            <use xlink:href="#icon-crown" />
                        </svg>
                        Premium
                    </x-tabler::ribbon>
                @endif

                <div class="card-body">
                    <h3 class="card-title">{{ $post->title }}</h3>
                    <p class="text-muted">{{ $post->excerpt }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary btn-sm">
                            Read More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Course or Membership Badges

Educational platform with course status ribbons:

```blade
<div class="row row-cols-1 row-cols-lg-3 g-4">
    @foreach($courses as $course)
        <div class="col">
            <div class="card h-100" style="position: relative;">
                @if($course->is_bestseller)
                    <x-tabler::ribbon color="orange" position="top-end">
                        <svg class="icon icon-tabler me-1" width="16" height="16">
                            <use xlink:href="#icon-trophy" />
                        </svg>
                        Bestseller
                    </x-tabler::ribbon>
                @endif

                @if($course->is_new)
                    <x-tabler::ribbon color="blue" position="top-start">
                        New Course
                    </x-tabler::ribbon>
                @endif

                @if($course->difficulty === 'beginner')
                    <x-tabler::ribbon color="green" position="bottom-start">
                        Beginner
                    </x-tabler::ribbon>
                @elseif($course->difficulty === 'advanced')
                    <x-tabler::ribbon color="red" position="bottom-start">
                        Advanced
                    </x-tabler::ribbon>
                @endif

                <img src="{{ $course->thumbnail }}" class="card-img-top" alt="{{ $course->title }}">

                <div class="card-body">
                    <h4 class="card-title">{{ $course->title }}</h4>
                    <p class="text-muted small">{{ $course->instructor }}</p>

                    <div class="d-flex align-items-center gap-2 mb-2">
                        <div class="text-warning">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="icon icon-sm" width="16" height="16">
                                    <use xlink:href="#icon-{{ $i < $course->rating ? 'star-filled' : 'star' }}" />
                                </svg>
                            @endfor
                        </div>
                        <span class="text-muted small">({{ $course->reviews_count }})</span>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold fs-3">${{ $course->price }}</span>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-primary">
                            Enroll Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
```

### Dashboard Notification Cards

Dashboard cards with status ribbons:

```blade
<div class="row g-3">
    <div class="col-md-6 col-lg-4">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="red" position="top-end">
                <svg class="icon icon-tabler me-1" width="16" height="16">
                    <use xlink:href="#icon-alert-circle" />
                </svg>
                Urgent
            </x-tabler::ribbon>

            <div class="card-body">
                <h3 class="card-title">System Update Required</h3>
                <p class="text-muted">A critical security update is available.</p>
                <button class="btn btn-danger">Update Now</button>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="blue" position="top-end">
                <svg class="icon icon-tabler me-1" width="16" height="16">
                    <use xlink:href="#icon-info-circle" />
                </svg>
                Info
            </x-tabler::ribbon>

            <div class="card-body">
                <h3 class="card-title">New Features Available</h3>
                <p class="text-muted">Check out the latest improvements.</p>
                <button class="btn btn-primary">Learn More</button>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="card" style="position: relative;">
            <x-tabler::ribbon color="green" position="top-end">
                <svg class="icon icon-tabler me-1" width="16" height="16">
                    <use xlink:href="#icon-check" />
                </svg>
                Complete
            </x-tabler::ribbon>

            <div class="card-body">
                <h3 class="card-title">Profile Setup</h3>
                <p class="text-muted">Your profile is fully configured.</p>
                <button class="btn btn-success">View Profile</button>
            </div>
        </div>
    </div>
</div>
```

## Performance

The Ribbon component is lightweight and has minimal performance impact:

- **Render time:** < 1ms per ribbon
- **CSS size:** ~2KB (part of Tabler CSS framework)
- **No JavaScript required**
- **Pure CSS positioning and transforms**

### Best Practices

1. **Limit ribbon count:** Use 1-2 ribbons per container to avoid visual clutter
2. **Keep text short:** Use 1-3 words for optimal readability
3. **Avoid overflow:** Ensure parent containers don't clip ribbons
4. **Use appropriate colors:** Match ribbon colors to their semantic meaning (red for sales, green for new, etc.)

## Notes

- Ribbons are purely decorative visual elements
- The parent container must have `position: relative` or `position: absolute`
- Ribbons use CSS transforms for the folded corner effect
- Text should be concise for best visual appearance
- For more complex status indicators, consider using badges instead
- Ribbons are not interactive elements; they're for display only
- The bookmark variant provides a different visual style without the folded corner
- Multiple ribbons can be used on the same element at different corners

## Related Components

- [Badge](/docs/components/badge.md) - For inline status indicators and labels
- [Card](/docs/components/card.md) - Container component commonly used with ribbons
- [Avatar](/docs/components/avatar.md) - User representation that can be enhanced with ribbons

## Source

View the source code for this component:

- [ribbon.blade.php](https://github.com/your-repo/tabler-blade/blob/main/resources/views/tabler/ribbon.blade.php)

## Changelog

- **v1.0.0** - Initial release with position, color, and bookmark variants
