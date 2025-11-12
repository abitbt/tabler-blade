# Empty

## Overview

The Empty component displays empty state placeholders when there is no content to show. It provides a user-friendly way to communicate the absence of data with optional icons, messages, and action buttons, helping users understand why content is missing and what actions they can take.

Empty states are crucial for good UX - they turn potentially confusing blank spaces into opportunities to guide users, explain situations, and encourage engagement. The component supports various configurations from simple text messages to rich empty states with illustrations and call-to-action buttons.

## Basic Usage

```blade
<x-tabler::empty />
```

This creates a basic empty state with default styling and no content.

## Props/Attributes

### Available Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `title` | string | `null` | The main heading text for the empty state |
| `subtitle` | string | `null` | Secondary descriptive text below the title |
| `icon` | string | `null` | Tabler icon name to display (without `ti-` prefix) |
| `icon-class` | string | `''` | Additional CSS classes for the icon |
| `image` | string | `null` | URL or path to an illustration image |
| `image-alt` | string | `'Empty state'` | Alt text for the image |
| `bordered` | boolean | `false` | Whether to add a border around the empty state |
| `class` | string | `''` | Additional CSS classes for the wrapper |

### Attributes Inheritance

All additional HTML attributes passed to the component are applied to the wrapper element, allowing for custom data attributes, IDs, and other properties.

## Slots

### Default Slot

The default slot allows you to provide custom action buttons or additional content below the subtitle:

```blade
<x-tabler::empty title="No results found">
    <x-tabler::button>Create New Item</x-tabler::button>
</x-tabler::empty>
```

### Actions Slot

The `actions` slot provides an alternative way to add action buttons with semantic meaning:

```blade
<x-tabler::empty title="Empty inbox">
    <x-slot:actions>
        <x-tabler::button variant="primary">Compose Message</x-tabler::button>
    </x-slot:actions>
</x-tabler::empty>
```

### Icon Slot

Override the default icon rendering with custom SVG or HTML:

```blade
<x-tabler::empty>
    <x-slot:icon>
        <svg>...</svg>
    </x-slot:icon>
</x-tabler::empty>
```

### Image Slot

Provide custom image markup instead of using the `image` prop:

```blade
<x-tabler::empty>
    <x-slot:image>
        <img src="/illustrations/empty.svg" alt="No data" />
    </x-slot:image>
</x-tabler::empty>
```

## CSS Classes

- `.empty` - Main wrapper class for the empty state component
- `.empty-icon` - Container for the icon element
- `.empty-img` - Container for the illustration image
- `.empty-header` - Main title text styling
- `.empty-title` - Alternative title class (alias for header)
- `.empty-subtitle` - Secondary descriptive text styling
- `.empty-action` - Container for action buttons
- `.empty-bordered` - Adds border styling when `bordered` prop is true

Use Tabler's spacing utilities (`mt-*`, `mb-*`, `p-*`) and text utilities (`text-center`, `text-muted`) for additional customization.

## Examples

### Basic Empty State

```blade
<x-tabler::empty
    title="No items found"
    subtitle="There are no items to display at this time."
/>
```

### With Icon

```blade
<x-tabler::empty
    title="No notifications"
    subtitle="You're all caught up! Check back later for updates."
    icon="bell-off"
/>
```

### With Custom Icon Styling

```blade
<x-tabler::empty
    title="No messages"
    subtitle="Your inbox is empty"
    icon="mail"
    icon-class="text-primary"
/>
```

### With Illustration Image

```blade
<x-tabler::empty
    title="No results found"
    subtitle="Try adjusting your search criteria"
    image="/images/empty-search.svg"
    image-alt="Empty search results"
/>
```

### With Action Button

```blade
<x-tabler::empty
    title="No projects yet"
    subtitle="Get started by creating your first project"
    icon="folder-off"
>
    <x-tabler::button variant="primary" href="{{ route('projects.create') }}">
        Create Project
    </x-tabler::button>
</x-tabler::empty>
```

### With Multiple Action Buttons

```blade
<x-tabler::empty
    title="No team members"
    subtitle="Invite people to collaborate on your projects"
    icon="users"
>
    <div class="btn-list">
        <x-tabler::button variant="primary">
            Invite Members
        </x-tabler::button>
        <x-tabler::button variant="ghost">
            Import from CSV
        </x-tabler::button>
    </div>
</x-tabler::empty>
```

### Bordered Empty State

```blade
<x-tabler::empty
    title="No data available"
    subtitle="Upload a file to get started"
    icon="file-off"
    bordered
>
    <x-tabler::button>Upload File</x-tabler::button>
</x-tabler::empty>
```

### In a Card

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">Recent Activity</h3>
    </x-slot:header>

    <x-tabler::empty
        title="No recent activity"
        subtitle="Your activity will appear here"
        icon="activity"
    />
</x-tabler::card>
```

### Search Results Empty State

```blade
<x-tabler::empty
    title="No results for '{{ $query }}'"
    subtitle="We couldn't find any matches. Try different keywords or check your spelling."
    icon="search"
>
    <x-tabler::button variant="ghost" onclick="document.getElementById('search').value = ''; this.form.submit();">
        Clear Search
    </x-tabler::button>
</x-tabler::empty>
```

### Filtered Results Empty State

```blade
<x-tabler::empty
    title="No matching items"
    subtitle="No items match your current filters"
    icon="filter-off"
>
    <x-tabler::button wire:click="resetFilters">
        Reset Filters
    </x-tabler::button>
</x-tabler::empty>
```

### Error State

```blade
<x-tabler::empty
    title="Unable to load data"
    subtitle="An error occurred while fetching your data. Please try again."
    icon="alert-circle"
    icon-class="text-danger"
>
    <x-tabler::button variant="primary" onclick="location.reload()">
        Retry
    </x-tabler::button>
</x-tabler::empty>
```

### Permission Denied State

```blade
<x-tabler::empty
    title="Access denied"
    subtitle="You don't have permission to view this content"
    icon="lock"
>
    <x-tabler::button href="{{ route('home') }}">
        Return Home
    </x-tabler::button>
</x-tabler::empty>
```

### Custom Image with Slot

```blade
<x-tabler::empty
    title="Start your journey"
    subtitle="Create your first workspace to get started"
>
    <x-slot:image>
        <img src="/illustrations/getting-started.svg" alt="Getting started" style="max-width: 300px;" />
    </x-slot:image>

    <x-tabler::button variant="primary" size="lg">
        Create Workspace
    </x-tabler::button>
</x-tabler::empty>
```

### With Link Instead of Button

```blade
<x-tabler::empty
    title="No bookmarks"
    subtitle="Save your favorite pages for quick access"
    icon="bookmark-off"
>
    <a href="{{ route('help.bookmarks') }}" class="text-primary">
        Learn more about bookmarks
    </a>
</x-tabler::empty>
```

### Conditional Empty State

```blade
@if($items->isEmpty())
    <x-tabler::empty
        title="No items to display"
        subtitle="Add your first item to get started"
        icon="plus"
    >
        <x-tabler::button variant="primary" href="{{ route('items.create') }}">
            Add Item
        </x-tabler::button>
    </x-tabler::empty>
@else
    @foreach($items as $item)
        {{-- Display items --}}
    @endforeach
@endif
```

### Compact Empty State

```blade
<x-tabler::empty
    title="No comments"
    icon="message-off"
    class="py-4"
/>
```

### Full Page Empty State

```blade
<div class="page-wrapper">
    <div class="page-body">
        <div class="container-xl d-flex flex-column justify-content-center">
            <x-tabler::empty
                title="Welcome to Your Dashboard"
                subtitle="Your dashboard is empty. Start by adding your first widget or connecting a data source."
                image="/images/welcome.svg"
                class="py-5"
            >
                <div class="btn-list justify-content-center">
                    <x-tabler::button variant="primary" size="lg">
                        Add Widget
                    </x-tabler::button>
                    <x-tabler::button variant="ghost" size="lg">
                        Connect Data Source
                    </x-tabler::button>
                    <x-tabler::button variant="ghost" size="lg">
                        View Tutorial
                    </x-tabler::button>
                </div>
            </x-tabler::empty>
        </div>
    </div>
</div>
```

## Accessibility

The Empty component follows accessibility best practices to ensure usability for all users:

### Semantic Structure

- Uses proper heading hierarchy with `<div>` containers and semantic classes
- Title text uses appropriate heading levels when rendered
- Maintains logical content flow for screen readers

### ARIA Attributes

```blade
<x-tabler::empty
    title="No results found"
    subtitle="Try adjusting your search"
    role="status"
    aria-live="polite"
/>
```

The component supports ARIA attributes:

- `role="status"` - Indicates a status message to assistive technologies
- `aria-live="polite"` - Announces changes when content updates dynamically
- `aria-live="assertive"` - For urgent empty states (errors, critical messages)

### Image Alt Text

Always provide descriptive alt text for images:

```blade
<x-tabler::empty
    image="/illustrations/empty.svg"
    image-alt="No data available - illustration showing an empty folder"
/>
```

### Icon Accessibility

Icons are decorative and hidden from screen readers by default. The title and subtitle provide the necessary context.

### Keyboard Navigation

- Action buttons within the empty state are fully keyboard accessible
- Focus indicators are visible for interactive elements
- Tab order follows logical content flow

### Screen Reader Considerations

- Empty states announce their content clearly to screen readers
- Titles are read first, followed by subtitles and action options
- Icon labels are not announced as they're decorative

### Color Contrast

- All text meets WCAG AA standards for contrast ratios
- Error states use sufficient contrast for color-blind users
- Don't rely solely on color to convey meaning

### Best Practices

```blade
{{-- Good: Descriptive title and subtitle --}}
<x-tabler::empty
    title="No notifications"
    subtitle="You're all caught up"
    icon="bell-off"
/>

{{-- Better: With screen reader context --}}
<x-tabler::empty
    title="No notifications"
    subtitle="You're all caught up. Check back later for updates."
    icon="bell-off"
    role="status"
    aria-live="polite"
/>
```

## Browser Compatibility

The Empty component is compatible with all modern browsers:

- Chrome/Edge 90+
- Firefox 88+
- Safari 14+
- Opera 76+

The component uses standard HTML and CSS without requiring JavaScript, ensuring broad compatibility. Flexbox and CSS Grid features are used for layout, which are well-supported across all modern browsers.

### Responsive Design

The component is fully responsive and adapts to different screen sizes automatically. Text scales appropriately, and action buttons stack on smaller screens.

## Troubleshooting

### Icon Not Displaying

**Problem:** The icon doesn't appear when using the `icon` prop.

**Solution:** Ensure Tabler Icons CSS is included and you're using the icon name without the `ti-` prefix:

```blade
{{-- Correct --}}
<x-tabler::empty icon="inbox" />

{{-- Incorrect --}}
<x-tabler::empty icon="ti-inbox" />
```

### Image Not Loading

**Problem:** The illustration image doesn't display.

**Solution:** Verify the image path is correct and accessible. Use absolute URLs or Laravel's `asset()` helper:

```blade
<x-tabler::empty image="{{ asset('images/empty.svg') }}" />
```

### Buttons Not Styling Correctly

**Problem:** Action buttons don't have proper spacing or alignment.

**Solution:** Wrap multiple buttons in a `.btn-list` container:

```blade
<x-tabler::empty title="No data">
    <div class="btn-list">
        <x-tabler::button>Action 1</x-tabler::button>
        <x-tabler::button>Action 2</x-tabler::button>
    </div>
</x-tabler::empty>
```

### Empty State Too Large/Small

**Problem:** The empty state takes up too much or too little space.

**Solution:** Add padding utilities to control spacing:

```blade
{{-- Compact --}}
<x-tabler::empty title="No items" class="py-3" />

{{-- Spacious --}}
<x-tabler::empty title="No items" class="py-6" />
```

### Text Not Centered

**Problem:** Content appears left-aligned instead of centered.

**Solution:** The component centers content by default. If it's not centering, check for parent container overrides:

```blade
<div class="text-start"> {{-- This will override centering --}}
    <x-tabler::empty title="No data" />
</div>
```

### Border Not Showing

**Problem:** The `bordered` prop doesn't add a border.

**Solution:** Ensure the Tabler CSS is loaded and you're using the boolean prop correctly:

```blade
{{-- Correct --}}
<x-tabler::empty bordered />
<x-tabler::empty :bordered="true" />

{{-- Incorrect --}}
<x-tabler::empty bordered="true" />
```

## Real-World Examples

### Empty Search Results Page

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">Search Results for "{{ $query }}"</h3>
    </x-slot:header>

    @if($results->isEmpty())
        <x-tabler::empty
            title="No results found"
            subtitle="We couldn't find any results matching '{{ $query }}'. Try using different keywords or browse our categories."
            icon="search"
        >
            <div class="btn-list justify-content-center">
                <x-tabler::button wire:click="clearSearch">
                    Clear Search
                </x-tabler::button>
                <x-tabler::button variant="ghost" href="{{ route('browse') }}">
                    Browse All
                </x-tabler::button>
            </div>
        </x-tabler::empty>
    @else
        @foreach($results as $result)
            {{-- Display results --}}
        @endforeach
    @endif
</x-tabler::card>
```

### Dashboard with No Data

```blade
<div class="row row-deck row-cards">
    <div class="col-12">
        <x-tabler::card>
            <x-slot:header>
                <h3 class="card-title">Analytics Overview</h3>
            </x-slot:header>

            @if($hasData)
                {{-- Display charts and statistics --}}
            @else
                <x-tabler::empty
                    title="No data available"
                    subtitle="Connect your data source to see analytics and insights here."
                    image="{{ asset('images/illustrations/no-data.svg') }}"
                    image-alt="No analytics data"
                >
                    <x-tabler::button variant="primary" href="{{ route('integrations.create') }}">
                        Connect Data Source
                    </x-tabler::button>
                </x-tabler::empty>
            @endif
        </x-tabler::card>
    </div>
</div>
```

### Inbox Zero State

```blade
<x-tabler::card class="card-lg">
    <x-slot:header>
        <div class="d-flex align-items-center">
            <h3 class="card-title">Inbox</h3>
            <div class="ms-auto">
                <x-tabler::button size="sm" href="{{ route('messages.compose') }}">
                    Compose
                </x-tabler::button>
            </div>
        </div>
    </x-slot:header>

    @forelse($messages as $message)
        {{-- Display messages --}}
    @empty
        <x-tabler::empty
            title="Inbox Zero!"
            subtitle="Congratulations! You've read all your messages. Enjoy your productivity."
            icon="inbox"
            icon-class="text-success"
            class="py-5"
        >
            <x-tabler::button variant="primary" href="{{ route('messages.compose') }}">
                Compose New Message
            </x-tabler::button>
        </x-tabler::empty>
    @endforelse
</x-tabler::card>
```

### Empty Shopping Cart

```blade
<x-tabler::card>
    <x-slot:header>
        <h3 class="card-title">Shopping Cart</h3>
    </x-slot:header>

    @if($cartItems->isEmpty())
        <x-tabler::empty
            title="Your cart is empty"
            subtitle="Add items to your cart to continue shopping"
            icon="shopping-cart-off"
        >
            <div class="btn-list justify-content-center">
                <x-tabler::button variant="primary" href="{{ route('shop') }}">
                    Continue Shopping
                </x-tabler::button>
                <x-tabler::button variant="ghost" href="{{ route('wishlist') }}">
                    View Wishlist
                </x-tabler::button>
            </div>
        </x-tabler::empty>
    @else
        @foreach($cartItems as $item)
            {{-- Display cart items --}}
        @endforeach

        <x-slot:footer>
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted">
                    Total: <strong>${{ number_format($total, 2) }}</strong>
                </div>
                <x-tabler::button variant="primary" href="{{ route('checkout') }}">
                    Proceed to Checkout
                </x-tabler::button>
            </div>
        </x-slot:footer>
    @endif
</x-tabler::card>
```

## Performance

The Empty component is lightweight and performance-optimized:

- **No JavaScript Required** - Pure HTML and CSS implementation
- **Minimal DOM Nodes** - Simple structure with few elements
- **CSS-Only Styling** - No runtime style calculations
- **Lazy Loading Images** - Use native lazy loading for illustrations:

```blade
<x-tabler::empty image="{{ asset('images/large-illustration.svg') }}" />
```

### Optimization Tips

**Use SVG illustrations** instead of raster images when possible:

```blade
<x-tabler::empty
    image="{{ asset('illustrations/empty.svg') }}"
/>
```

**Avoid unnecessary re-renders** in Livewire:

```blade
<div wire:key="empty-state">
    <x-tabler::empty title="No data" />
</div>
```

**Cache blade views** in production:

```bash
php artisan view:cache
```

**Conditional loading** - Only render when needed:

```blade
@if($shouldShowEmpty)
    <x-tabler::empty title="No data" />
@endif
```

## Notes

- The Empty component is designed to be centered by default, making it ideal for card bodies and page content areas
- Use empty states consistently throughout your application to maintain a cohesive user experience
- Consider the emotional tone of your empty state messages - they can be friendly, helpful, or playful depending on your brand
- Empty states are excellent opportunities for user onboarding and feature discovery
- For data-driven empty states, consider showing suggestions or related content rather than just a blank message
- The component works seamlessly with Livewire for dynamic content updates
- Empty states should be contextual - explain why the space is empty and what users can do about it
- Use illustrations sparingly and ensure they don't slow down page load times
- The `bordered` prop is useful when the empty state needs visual separation from surrounding content
- Action buttons in empty states typically have higher engagement rates than regular CTAs

## Related Components

- **[Card](card.md)** - Often contains empty states when no data is available
- **[Alert](alert.md)** - For displaying error or warning messages in empty scenarios
- **[Button](button.md)** - Used for action buttons within empty states
- **[Icon](icon.md)** - Used to display decorative icons in empty states

## Source

Component source code: `/resources/views/tabler/empty.blade.php`

Package repository: [tabler-blade](https://github.com/abitbt/tabler-blade)

## Changelog

### Version 1.0.0
- Initial release of Empty component
- Support for icons and images
- Customizable title and subtitle
- Action button slots
- Bordered variant option
- Accessibility features and ARIA support
