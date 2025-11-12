# Pagination

A flexible pagination component for navigating through paginated content. Works seamlessly with Laravel's built-in pagination objects or can be configured manually.

## Overview

- Seamless integration with Laravel's paginator objects
- Manual pagination configuration support
- Multiple size variations (small, default, large)
- Simple mode for Previous/Next only navigation
- Smart ellipsis rendering for large page counts
- First/Last page navigation options
- Descriptive titles for documentation-style navigation
- Multiple style variants (outline, circle/pill)
- Text or icon-based navigation buttons
- Fully accessible with ARIA labels
- Responsive and mobile-friendly design
- Customizable slot for complete control

## Basic Usage

```blade
{{-- With Laravel paginator --}}
<x-tabler::pagination :paginator="$users" />

{{-- Manual pagination --}}
<x-tabler::pagination :currentPage="3" :totalPages="10" />
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `paginator` | `object\|null` | `null` | No | Laravel paginator object (e.g., from `User::paginate()`) |
| `currentPage` | `int\|null` | `null` | No* | Current page number (required if not using paginator) |
| `totalPages` | `int\|null` | `null` | No* | Total number of pages (required if not using paginator) |
| `size` | `string\|null` | `null` | No | Size variant: `'sm'` for small or `'lg'` for large |
| `simple` | `bool` | `false` | No | Enable simple pagination (Previous/Next buttons only) |
| `firstLast` | `bool` | `false` | No | Show first and last page navigation links |
| `textButtons` | `bool` | `false` | No | Use text labels instead of icons for navigation buttons |
| `onEachSide` | `int\|null` | `3` | No | Number of page links to show on each side of current page |
| `prevTitle` | `string\|null` | `null` | No | Custom title for previous button (enables descriptive mode) |
| `nextTitle` | `string\|null` | `null` | No | Custom title for next button (enables descriptive mode) |
| `class` | `string` | `''` | No | Additional CSS classes for styling (e.g., `'pagination-outline'`) |

*Note: Either `paginator` OR both `currentPage` and `totalPages` must be provided.

## Slots

| Slot | Description |
|------|-------------|
| `default` | Custom pagination links. When provided, overrides automatic pagination rendering. Allows complete control over pagination structure. |

## CSS Classes

**Pagination Styles:**
- `pagination-outline` - Outlined style with borders around page links
- `pagination-circle` - Circular/pill-shaped buttons for modern look

**Pagination Sizes:**
- `pagination-sm` - Small pagination for compact layouts
- `pagination-lg` - Large pagination for emphasis

**Pagination Alignment:**
- `justify-content-center` - Center-align pagination
- `justify-content-end` - Right-align pagination

**Pagination Item States:**
- `active` - Current/active page indicator
- `disabled` - Disabled link (automatically applied to prev/next when appropriate)

**Pagination Item Classes (for custom slots):**
- `page-item` - Container for each pagination link
- `page-link` - The actual link element
- `page-text` - Text-style link (used with `textButtons`)
- `page-prev` - Previous link with descriptive title
- `page-next` - Next link with descriptive title
- `page-item-subtitle` - Subtitle text (e.g., "previous", "next")
- `page-item-title` - Main title text for descriptive navigation

## Examples

### Laravel Paginator Integration

```blade
{{-- Controller --}}
public function index()
{
    $users = User::paginate(15);
    return view('users.index', compact('users'));
}

{{-- View --}}
<x-tabler::pagination :paginator="$users" />
```

### Manual Pagination

```blade
<x-tabler::pagination
    :currentPage="5"
    :totalPages="20"
/>
```

### Size Variations

```blade
{{-- Small pagination --}}
<x-tabler::pagination :paginator="$users" size="sm" />

{{-- Default size --}}
<x-tabler::pagination :paginator="$users" />

{{-- Large pagination --}}
<x-tabler::pagination :paginator="$users" size="lg" />
```

### Style Variants

```blade
{{-- Outline style --}}
<x-tabler::pagination
    :paginator="$users"
    class="pagination-outline"
/>

{{-- Circle/pill style --}}
<x-tabler::pagination
    :paginator="$users"
    class="pagination-circle"
/>

{{-- Combined circle + outline --}}
<x-tabler::pagination
    :paginator="$users"
    class="pagination-circle pagination-outline"
/>
```

### Simple Pagination (Previous/Next Only)

```blade
<x-tabler::pagination
    :paginator="$users"
    simple
/>
```

### First and Last Page Links

```blade
<x-tabler::pagination
    :currentPage="5"
    :totalPages="20"
    firstLast
/>
```

### Text-Based Navigation

```blade
<x-tabler::pagination
    :paginator="$users"
    textButtons
/>
```

### Large Page Count with Ellipsis

```blade
{{-- Shows: 1 ... 8 9 10 11 12 ... 50 when on page 10 --}}
<x-tabler::pagination
    :currentPage="10"
    :totalPages="50"
    :onEachSide="2"
/>

{{-- Shows: 1 2 3 4 5 6 7 ... 100 when on page 3 --}}
<x-tabler::pagination
    :currentPage="3"
    :totalPages="100"
    :onEachSide="3"
/>
```

### Descriptive Titles for Documentation Navigation

```blade
<x-tabler::pagination
    :currentPage="2"
    :totalPages="5"
    prevTitle="Getting Started"
    nextTitle="Components"
/>
```

### Custom Pagination Links

```blade
<x-tabler::pagination>
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
</x-tabler::pagination>
```

### Alignment Options

```blade
{{-- Centered pagination --}}
<x-tabler::pagination
    :paginator="$users"
    class="justify-content-center"
/>

{{-- Right-aligned pagination --}}
<x-tabler::pagination
    :paginator="$users"
    class="justify-content-end"
/>
```

### Complete Example with All Options

```blade
<x-tabler::pagination
    :paginator="$products"
    size="lg"
    firstLast
    :onEachSide="2"
    class="pagination-outline justify-content-center"
/>
```

## Accessibility

- Uses semantic `<ul>` and `<li>` elements for proper structure
- Includes `aria-label` attributes on navigation links (Previous, Next, First, Last)
- Uses `rel="prev"` and `rel="next"` attributes for search engine optimization
- Disabled states prevent interaction and are properly marked
- Active page is clearly indicated with the `active` class
- Keyboard navigable with proper focus states
- Screen reader friendly with descriptive ARIA labels

## Browser Compatibility

- Works in all modern browsers (Chrome, Firefox, Safari, Edge)
- Fully responsive and mobile-friendly
- Touch-friendly tap targets for mobile devices
- Gracefully handles small screen sizes
- IE11+ support (with appropriate polyfills)

## Related Components

- [Button](./button.md) - Used internally for navigation controls
- [Breadcrumb](./breadcrumb.md) - For hierarchical navigation
- [Tabs](./tabs/tab.md) - Alternative content navigation

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/pagination.blade.php`

## Changelog

### v1.0.0
- Initial release with Laravel paginator integration
- Manual pagination support
- Multiple size variants (sm, lg)
- Simple mode (Previous/Next only)
- Smart ellipsis rendering
- First/Last page navigation
- Descriptive titles support
- Multiple style variants (outline, circle)
- Text and icon-based buttons
- Customizable slots
- Full accessibility support
