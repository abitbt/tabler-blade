# Card

> Versatile card container system for organizing content with headers, bodies, footers, and additional features.

## Overview

The Card component family provides a comprehensive card system for organizing and displaying content in structured containers. Cards support headers with titles and actions, bodies with content, footers, status indicators, progress bars, images, and more. The component automatically renders as either a `<div>` or `<a>` element for clickable cards.

**Key Features:**
- Complete card component family (9 sub-components)
- Header with title, subtitle, and actions
- Scrollable body content
- Footer for buttons and actions
- Status indicators and progress bars
- Image support with overlays
- Stamps for badges and icons
- Active/inactive states
- Clickable cards (renders as link)
- Multiple padding variants
- Visual effects (stacked, borderless, rotation)
- Full color and background support
- Built-in accessibility

**Component Family:**
- `<x-tabler::cards.card>` - Main card container
- `<x-tabler::cards.header>` - Header section with title/subtitle/actions
- `<x-tabler::cards.body>` - Content area
- `<x-tabler::cards.footer>` - Footer section
- `<x-tabler::cards.actions>` - Standalone actions section
- `<x-tabler::cards.status>` - Status indicator bar
- `<x-tabler::cards.progress>` - Progress bar
- `<x-tabler::cards.img>` - Card image
- `<x-tabler::cards.stamp>` - Corner stamp/badge

**Use Case:** Use cards for organizing related content, displaying data summaries, creating dashboards, product listings, user profiles, and any content that benefits from visual grouping and structure.

---

## Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Card Title</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Card content goes here
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

## Component Structure

### Main Component: `<x-tabler::cards.card>`

The main card container.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `padding` | `string\|null` | `null` | Card padding: `sm`, `md`, `lg` |
| `active` | `bool` | `false` | Mark card as active (highlighted state) |
| `inactive` | `bool` | `false` | Mark card as inactive (dimmed state) |
| `link` | `bool` | `false` | Make entire card clickable (renders as `<a>`) |
| `class` | `string` | `''` | Additional CSS classes |

---

### Header: `<x-tabler::cards.header>`

Card header with optional title, subtitle, and actions.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `light` | `bool` | `false` | Use light header style |
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom header content |
| `title` | No | Card title (displays as `h3.card-title`) |
| `subtitle` | No | Card subtitle (within title) |
| `actions` | No | Header action buttons |

---

### Body: `<x-tabler::cards.body>`

Main content area of the card.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `scrollable` | `bool` | `false` | Enable scrollable content with max-height |
| `class` | `string` | `''` | Additional CSS classes |

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Card body content |

---

### Footer: `<x-tabler::cards.footer>`

Footer section typically containing action buttons.

#### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Footer content (usually buttons) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Card Styles:**
- `card-sm`, `card-md`, `card-lg` - Padding sizes (also via `padding` prop)
- `card-active` - Active state (also via `active` prop)
- `card-inactive` - Inactive state (also via `inactive` prop)
- `card-link` - Clickable card (auto-applied with `link` prop)

**Visual Effects:**
- `card-stacked` - Stacked card effect
- `card-borderless` - Remove card border
- `card-link-rotate` - Rotate icon on hover (with `link` prop)
- `card-link-pop` - Pop effect on hover (with `link` prop)

**Colors:**
- `bg-primary`, `bg-secondary`, `bg-success`, `bg-danger`, etc.
- `bg-primary-lt`, `bg-blue-lt` - Light color variants
- `text-primary`, `text-white`, `text-muted` - Text colors

---

## Examples

### Basic Example

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Basic Card</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        This is a basic card with header and body.
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Card with Title and Subtitle

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Dashboard Overview</x-slot>
        <x-slot:subtitle>Monthly statistics</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        View your key metrics and performance indicators.
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Card with Actions

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Users</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" icon="plus" color="primary">
                Add User
            </x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <p>Manage your application users.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Card with Footer

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Confirm Action</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Are you sure you want to proceed with this action?
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button color="primary">Confirm</x-tabler::button>
        <x-tabler::button variant="outline">Cancel</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Scrollable Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Activity Log</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body scrollable>
        <p>Long content that will scroll...</p>
        <p>More content...</p>
        <!-- Many more items -->
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Clickable Card

```blade
<x-tabler::cards.card link href="{{ route('profile') }}" class="card-link-pop">
    <x-tabler::cards.body>
        <div class="d-flex align-items-center">
            <x-tabler::avatar src="/img/user.jpg" size="lg" />
            <div class="ms-3">
                <h4 class="mb-0">{{ $user->name }}</h4>
                <p class="text-muted mb-0">View Profile</p>
            </div>
        </div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Colored Card

```blade
<x-tabler::cards.card class="bg-primary-lt text-primary">
    <x-tabler::cards.body>
        <h3 class="mb-1">145</h3>
        <p class="mb-0">Total Users</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>

<x-tabler::cards.card class="bg-success text-white">
    <x-tabler::cards.body>
        <h3 class="mb-1">$12,450</h3>
        <p class="mb-0">Revenue</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Active Card

```blade
<x-tabler::cards.card active>
    <x-tabler::cards.body>
        <h4>Selected Plan</h4>
        <p>This card is currently active/selected.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Card with Custom Padding

```blade
{{-- Small padding --}}
<x-tabler::cards.card padding="sm">
    <x-tabler::cards.body>
        Compact card with small padding
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Large padding --}}
<x-tabler::cards.card padding="lg">
    <x-tabler::cards.body>
        Spacious card with large padding
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Stacked Card Effect

```blade
<x-tabler::cards.card class="card-stacked card-borderless">
    <x-tabler::cards.body>
        Floating card with stacked effect
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Complete Example

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Project Details</x-slot>
        <x-slot:subtitle>Last updated 2 hours ago</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" icon="edit" variant="outline">
                Edit
            </x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Status:</strong> In Progress</p>
                <p><strong>Due Date:</strong> Dec 31, 2025</p>
            </div>
            <div class="col-md-6">
                <p><strong>Team:</strong> 5 members</p>
                <p><strong>Completion:</strong> 75%</p>
            </div>
        </div>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <div class="d-flex justify-content-between w-100">
            <x-tabler::button variant="outline">View Details</x-tabler::button>
            <x-tabler::button color="primary">Mark Complete</x-tabler::button>
        </div>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

## Composition Patterns

### Pattern 1: Stats Card

```blade
<div class="row">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <div class="d-flex align-items-center">
                    <div class="subheader">Total Users</div>
                    <div class="ms-auto">
                        <x-tabler::icon name="users" class="text-muted" />
                    </div>
                </div>
                <div class="h1 mb-0">2,450</div>
                <div class="text-success">
                    +12% <x-tabler::icon name="trending-up" class="icon-sm" />
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

---

### Pattern 2: User Profile Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <div class="d-flex align-items-center mb-3">
            <x-tabler::avatar
                src="{{ $user->avatar_url }}"
                size="xl"
                alt="{{ $user->name }}" />
            <div class="ms-3">
                <h3 class="mb-0">{{ $user->name }}</h3>
                <p class="text-muted mb-0">{{ $user->email }}</p>
            </div>
        </div>

        <div class="row">
            <div class="col-4 text-center">
                <div class="h4 mb-0">145</div>
                <div class="text-muted">Posts</div>
            </div>
            <div class="col-4 text-center">
                <div class="h4 mb-0">2.5k</div>
                <div class="text-muted">Followers</div>
            </div>
            <div class="col-4 text-center">
                <div class="h4 mb-0">180</div>
                <div class="text-muted">Following</div>
            </div>
        </div>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button color="primary" class="w-100">
            Follow
        </x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Pattern 3: Card Grid Layout

```blade
<div class="row row-cards">
    @foreach($projects as $project)
        <div class="col-md-4">
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <x-slot:title>{{ $project->name }}</x-slot>
                    <x-slot:actions>
                        <x-tabler::badge color="success">Active</x-tabler::badge>
                    </x-slot>
                </x-tabler::cards.header>

                <x-tabler::cards.body>
                    <p>{{ $project->description }}</p>
                </x-tabler::cards.body>

                <x-tabler::cards.footer>
                    <x-tabler::button size="sm" href="{{ route('projects.show', $project) }}">
                        View Details
                    </x-tabler::button>
                </x-tabler::cards.footer>
            </x-tabler::cards.card>
        </div>
    @endforeach
</div>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus through interactive elements inside card
- **Enter/Space:** Activates clickable cards or buttons
- Clickable cards are fully keyboard accessible

### ARIA Attributes
- Clickable cards include proper link semantics
- Headers use semantic heading tags (`<h3>`)
- Interactive elements have proper roles

### Screen Reader Support
- Card structure is properly announced
- Headers and content are logically ordered
- Clickable cards announced as links
- Action buttons properly labeled

### Best Practices
- Use semantic heading tags in headers
- Provide descriptive link text for clickable cards
- Ensure sufficient color contrast
- Don't rely solely on color for information
- Maintain logical tab order

**Example:**
```blade
<x-tabler::cards.card link href="/details" aria-label="View project details">
    <x-tabler::cards.body>
        <h4>Project Name</h4>
        <p>Project description</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (Flexbox, Grid)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Card shadows may render slightly differently across browsers
- Some card effects require modern CSS support

---

## Troubleshooting

### Common Issues

**Issue: Card not displaying properly**
- ✅ Ensure Bootstrap 5 CSS is loaded
- ✅ Check that parent container has proper layout
- ✅ Verify no conflicting CSS styles
- ✅ Use proper card structure (header/body/footer)

**Issue: Clickable card not working**
- ✅ Set `link` prop to `true`
- ✅ Provide `href` attribute
- ✅ Check JavaScript console for errors
- ✅ Verify no parent elements preventing clicks

**Issue: Header actions not aligning**
- ✅ Use `actions` slot, not default slot
- ✅ Check button sizes (use `size="sm"` for compact)
- ✅ Verify Bootstrap CSS is loaded
- ✅ Inspect with browser devtools

**Issue: Scrollable body not scrolling**
- ✅ Set `scrollable` prop to `true`
- ✅ Ensure content is longer than container
- ✅ Check for conflicting overflow styles
- ✅ Verify Bootstrap CSS includes scrollable styles

**Issue: Card padding incorrect**
- ✅ Use `padding` prop: `sm`, `md`, `lg`
- ✅ Check for conflicting padding classes
- ✅ Verify Bootstrap version is 5.x
- ✅ Inspect rendered classes in devtools

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if Bootstrap classes are applied
- Test with minimal card example first
- Verify card structure follows documentation
- Check for CSS specificity conflicts

---

## Real-World Examples

### Example 1: Dashboard Stats Grid

```blade
<div class="row row-cards">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <div class="subheader">Total Revenue</div>
                <div class="h1 mb-2">${{ number_format($revenue, 2) }}</div>
                <div class="text-success d-flex align-items-center">
                    <x-tabler::icon name="trending-up" class="icon-sm me-1" />
                    +15% from last month
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <div class="subheader">New Users</div>
                <div class="h1 mb-2">{{ number_format($users) }}</div>
                <div class="text-primary d-flex align-items-center">
                    <x-tabler::icon name="user-plus" class="icon-sm me-1" />
                    +{{ $newUsers }} this week
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <div class="subheader">Active Projects</div>
                <div class="h1 mb-2">{{ $activeProjects }}</div>
                <div class="text-muted">
                    {{ $totalProjects }} total
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <div class="subheader">Completion Rate</div>
                <div class="h1 mb-2">{{ $completionRate }}%</div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: {{ $completionRate }}%"></div>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

**Use Case:** Dashboard statistics overview with key metrics

---

### Example 2: Product Listing

```blade
<div class="row row-cards">
    @foreach($products as $product)
        <div class="col-md-4">
            <x-tabler::cards.card link href="{{ route('products.show', $product) }}" class="card-link-pop">
                <x-tabler::cards.body>
                    <div class="text-center mb-3">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded" />
                    </div>

                    <h4 class="mb-2">{{ $product->name }}</h4>
                    <p class="text-muted mb-3">{{ Str::limit($product->description, 100) }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h3 mb-0">${{ number_format($product->price, 2) }}</div>
                        @if($product->in_stock)
                            <x-tabler::badge color="success">In Stock</x-tabler::badge>
                        @else
                            <x-tabler::badge color="danger">Out of Stock</x-tabler::badge>
                        @endif
                    </div>
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </div>
    @endforeach
</div>
```

**Use Case:** E-commerce product grid with clickable cards

---

### Example 3: Activity Feed

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Recent Activity</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" variant="outline" icon="refresh">
                Refresh
            </x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body scrollable>
        @foreach($activities as $activity)
            <div class="d-flex mb-3">
                <x-tabler::avatar
                    src="{{ $activity->user->avatar_url }}"
                    size="sm"
                    alt="{{ $activity->user->name }}" />

                <div class="ms-3 flex-grow-1">
                    <div>
                        <strong>{{ $activity->user->name }}</strong>
                        {{ $activity->description }}
                    </div>
                    <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                </div>
            </div>
        @endforeach
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <a href="{{ route('activity.all') }}" class="text-muted">
            View all activity →
        </a>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Use Case:** Activity feed with scrollable content

---

## Performance Considerations

### Component Weight
- Base card: ~100-200 bytes rendered
- With header: +100 bytes
- With footer: +50 bytes
- Nested cards: +weight per card

### Best Practices
- Limit nested cards to 2-3 levels
- Use pagination for large card grids
- Lazy load images in cards
- Cache card content when possible
- Minimize DOM manipulation

### Optimization Tips
- Use CSS Grid for card layouts
- Implement virtual scrolling for large lists
- Preload critical card images
- Consider server-side rendering
- Minimize inline styles

---

## Notes

- Card automatically renders as `<a>` when `link` prop is set
- Headers use semantic `<h3>` tags for accessibility
- Multiple sub-components can be composed freely
- All Bootstrap card CSS classes are supported
- Padding variants map to Tabler card classes
- Active/inactive states affect visual appearance
- Clickable cards include hover effects
- Card structure is flexible (header/body/footer optional)

---

## Related Components

- [Button](../button.md) - Action buttons in cards
- [Avatar](../avatar.md) - User avatars in cards
- [Badge](../badge.md) - Status badges in cards
- [Progress](../progress.md) - Progress bars in cards

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/`

**Sub-components:**
- `card.blade.php` - Main container
- `header.blade.php` - Header section
- `body.blade.php` - Body section
- `footer.blade.php` - Footer section
- `actions.blade.php` - Actions section
- `status.blade.php` - Status indicator
- `progress.blade.php` - Progress bar
- `img.blade.php` - Card image
- `stamp.blade.php` - Corner stamp

---

## Changelog

- **v1.0.0** - Initial release with full card family components
