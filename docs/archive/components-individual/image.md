# Image

> A versatile image component supporting regular images, responsive images with aspect ratios, high-DPI displays, and background images with flexible lazy loading options.

## Overview

The Image component provides a comprehensive solution for displaying images in your Laravel Blade applications. It supports standard image rendering, responsive images with predefined aspect ratios, high-DPI (retina) displays via srcset, background image modes, and lazy loading for performance optimization. This component simplifies image handling while maintaining accessibility and modern web standards.

Use this component for product images, user avatars, hero sections, gallery displays, card images, and any scenario requiring optimized image delivery. It integrates seamlessly with Bootstrap 5 utility classes and Tabler UI design patterns.

---

## Basic Usage

```blade
<x-tabler::image src="/photos/sunset.jpg" alt="Beautiful sunset" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string\|null` | `null` | Image source URL (required for regular/responsive images) |
| `src2x` | `string\|null` | `null` | Optional 2x resolution image URL for high-DPI displays (srcset) |
| `alt` | `string` | `''` | Alternative text for image accessibility |
| `width` | `string\|null` | `null` | Image width attribute (HTML attribute, not CSS) |
| `height` | `string\|null` | `null` | Image height attribute (HTML attribute, not CSS) |
| `ratio` | `string\|null` | `null` | Aspect ratio: `1x1`, `2x1`, `1x2`, `3x1`, `1x3`, `4x1`, `1x4`, `4x3`, `3x4`, `16x9`, `9x16`, `21x9`, `9x21` |
| `responsive` | `bool` | `false` | Enable responsive image mode with aspect ratio (uses background image) |
| `background` | `bool` | `false` | Use background image mode with cover sizing (no aspect ratio) |
| `lazy` | `bool` | `false` | Enable native lazy loading |
| `loading` | `string\|null` | `'eager'` | Loading strategy: `lazy` or `eager` |
| `class` | `string` | `''` | Additional CSS classes to apply |

**Note:** All additional HTML attributes are passed through to the root element (img or div depending on mode).

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Optional content slot (primarily used with `responsive` or `background` modes for overlays) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Image Utilities:**
- `img-fluid` - Responsive image that scales with container width
- `img-thumbnail` - Image with rounded border frame
- `rounded` - Rounded corners
- `rounded-circle` - Circular image (perfect for avatars)
- `shadow`, `shadow-sm`, `shadow-lg` - Shadow variants

**Responsive Image Classes:**
- `img-responsive` - Base class for responsive images (auto-applied)
- `img-responsive-1x1` - Square aspect ratio
- `img-responsive-16x9` - Widescreen aspect ratio
- `img-responsive-4x3` - Standard aspect ratio
- `img-responsive-21x9` - Ultrawide aspect ratio
- `img-responsive-grid` - Grid layout adjustments

**Card Integration:**
- `card-img-top` - Image at top of card
- `card-img-bottom` - Image at bottom of card

**Object Fit:**
- `object-fit-contain` - Fit entire image in container
- `object-fit-cover` - Cover entire container (cropping if needed)
- `object-fit-fill` - Stretch to fill
- `object-fit-none` - Original size

**Sizing:**
- `w-100` - Full width (100%)
- `mw-100` - Maximum width 100%
- `h-100` - Full height (100%)

---

## Examples

### Basic Image

```blade
<x-tabler::image
    src="/photos/landscape.jpg"
    alt="Mountain landscape"
/>
```

---

### Fluid Responsive Image

```blade
<x-tabler::image
    src="/photos/product.jpg"
    alt="Product photo"
    class="img-fluid"
/>
```

---

### High-DPI (Retina) Image

```blade
<x-tabler::image
    src="/photos/logo.png"
    src2x="/photos/logo@2x.png"
    alt="Company logo"
    width="200"
    height="80"
/>
```

---

### Rounded Image

```blade
<x-tabler::image
    src="/photos/user.jpg"
    alt="User profile"
    class="rounded"
/>
```

---

### Circular Image (Avatar)

```blade
<x-tabler::image
    src="/photos/avatar.jpg"
    alt="John Doe"
    class="rounded-circle"
    width="48"
    height="48"
/>
```

---

### Image Thumbnail

```blade
<x-tabler::image
    src="/photos/gallery-1.jpg"
    alt="Gallery image 1"
    class="img-thumbnail"
/>
```

---

### Responsive Image with Aspect Ratio

```blade
<x-tabler::image
    src="/photos/banner.jpg"
    ratio="21x9"
    responsive
    alt="Hero banner"
/>
```

---

### Square Responsive Image

```blade
<x-tabler::image
    src="/photos/product-square.jpg"
    ratio="1x1"
    responsive
/>
```

---

### Widescreen Image (16:9)

```blade
<x-tabler::image
    src="/photos/video-thumbnail.jpg"
    ratio="16x9"
    responsive
    alt="Video thumbnail"
/>
```

---

### Background Image Mode

```blade
<x-tabler::image
    src="/photos/hero-bg.jpg"
    background
    class="vh-100 d-flex align-items-center justify-content-center"
>
    <div class="text-white text-center">
        <h1>Welcome to Our Site</h1>
        <p>Discover amazing content</p>
    </div>
</x-tabler::image>
```

---

### Lazy Loading Image

```blade
<x-tabler::image
    src="/photos/large-image.jpg"
    alt="Large image below fold"
    lazy
    class="img-fluid"
/>
```

---

### Explicit Loading Strategy

```blade
{{-- Eager loading for above-the-fold content --}}
<x-tabler::image
    src="/photos/hero.jpg"
    alt="Hero image"
    loading="eager"
    class="img-fluid"
/>

{{-- Lazy loading for below-the-fold content --}}
<x-tabler::image
    src="/photos/footer-bg.jpg"
    alt="Footer background"
    loading="lazy"
    class="img-fluid"
/>
```

---

### Image with Shadow

```blade
<x-tabler::image
    src="/photos/featured.jpg"
    alt="Featured image"
    class="img-fluid shadow-lg rounded"
/>
```

---

### Card Image Integration

```blade
<x-tabler::cards.card>
    <x-tabler::image
        src="/photos/article-header.jpg"
        ratio="16x9"
        responsive
        class="card-img-top"
    />
    <x-tabler::cards.body>
        <h3 class="card-title">Article Title</h3>
        <p class="card-text">Article excerpt goes here...</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Object Fit Cover

```blade
<div style="width: 300px; height: 200px;">
    <x-tabler::image
        src="/photos/portrait.jpg"
        alt="Portrait photo"
        class="w-100 h-100 object-fit-cover"
    />
</div>
```

---

### Image Gallery Grid

```blade
<div class="row g-3">
    @foreach($images as $image)
        <div class="col-md-4">
            <x-tabler::image
                :src="$image->url"
                :alt="$image->title"
                ratio="4x3"
                responsive
            />
        </div>
    @endforeach
</div>
```

---

## Accessibility

### Alt Text Requirements

**Critical:** Every image MUST have appropriate `alt` text for accessibility compliance and screen reader support.

**Alt Text Guidelines:**
- **Informative images:** Describe the image content and purpose
  ```blade
  <x-tabler::image src="/chart.jpg" alt="Sales revenue chart showing 25% growth in Q4" />
  ```
- **Decorative images:** Use empty alt text (alt="")
  ```blade
  <x-tabler::image src="/divider.jpg" alt="" />
  ```
- **Functional images:** Describe the action, not appearance
  ```blade
  <x-tabler::image src="/search-icon.jpg" alt="Search" />
  ```
- **Complex images:** Provide detailed description in surrounding content
  ```blade
  <figure>
      <x-tabler::image src="/infographic.jpg" alt="Product comparison infographic" />
      <figcaption>Detailed comparison data available in table below</figcaption>
  </figure>
  ```

### ARIA Attributes

For decorative images in responsive/background mode:
```blade
<x-tabler::image
    src="/decorative-bg.jpg"
    responsive
    role="presentation"
    aria-hidden="true"
/>
```

For images that convey important information:
```blade
<x-tabler::image
    src="/warning-icon.jpg"
    alt="Warning"
    role="img"
    aria-label="Warning: Action required"
/>
```

### Best Practices

1. **Auto-dismiss timing**: Ensure `delay` is sufficient for users to read the message (minimum 5 seconds)
2. **Closable toasts**: Always provide a way to dismiss persistent toasts
3. **Color contrast**: Ensure text meets WCAG 2.1 AA contrast requirements
4. **Icon labels**: Provide text alternatives for icon-only information
5. **Action buttons**: Make action buttons keyboard accessible and clearly labeled

### Keyboard Navigation

Images are not inherently interactive, but if wrapped in links or buttons:
```blade
<a href="/product/123" class="text-decoration-none">
    <x-tabler::image
        src="/product.jpg"
        alt="Blue cotton t-shirt - Click to view details"
        class="img-fluid"
    />
</a>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for utility classes)
- Modern CSS support (object-fit, aspect-ratio)
- Native lazy loading support (loading attribute)

### Supported Browsers
- Chrome 77+ ✅ (full lazy loading support)
- Firefox 75+ ✅ (full lazy loading support)
- Safari 15.4+ ✅ (aspect-ratio support)
- Edge 79+ ✅ (full support)

### Legacy Support
- **Lazy loading:** Gracefully degrades to eager loading in older browsers
- **Aspect ratio:** Use padding-based fallback for Safari < 15.4
- **srcset:** Supported in all modern browsers (IE11 requires polyfill)

### Progressive Enhancement

The component is designed with progressive enhancement:
- Basic `<img>` tag works in all browsers
- srcset enhances for high-DPI displays
- loading="lazy" adds performance optimization
- aspect-ratio CSS enhances responsive behavior

---

## Troubleshooting

### Common Issues

**Issue: Image not displaying (broken image icon)**
- ✅ Verify the `src` path is correct and accessible
- ✅ Check file permissions on the server
- ✅ Ensure the image file exists at the specified location
- ✅ Check for CORS issues if loading from external domain
- ✅ Verify the image URL doesn't contain special characters

**Issue: Image appears stretched or distorted**
- ✅ Use `object-fit-cover` or `object-fit-contain` classes
- ✅ Avoid setting both width and height with different aspect ratios
- ✅ For responsive mode, ensure the ratio prop matches image aspect ratio
- ✅ Use `img-fluid` class for automatic responsive scaling

**Issue: Lazy loading not working**
- ✅ Check browser support (Chrome 77+, Firefox 75+, Safari 15.4+)
- ✅ Ensure images are below the viewport (not immediately visible)
- ✅ Verify `lazy` prop or `loading="lazy"` is set
- ✅ Check if JavaScript is interfering with native lazy loading
- ✅ Use browser DevTools Network tab to verify deferred loading

**Issue: High-DPI (2x) images not loading**
- ✅ Verify `src2x` path is correct
- ✅ Check browser DevTools to confirm srcset attribute is rendered
- ✅ Test on actual high-DPI display or use browser device emulation
- ✅ Ensure both src and src2x images exist and are accessible

**Issue: Responsive background image not showing**
- ✅ Ensure `responsive` or `background` prop is set to `true`
- ✅ Check that the container has defined height (responsive mode needs height)
- ✅ Verify the inline style with background-image is rendered
- ✅ Check CSS specificity conflicts overriding background-image

**Issue: Aspect ratio not maintaining correctly**
- ✅ Verify the `ratio` prop value is valid (e.g., `16x9`, `4x3`, `1x1`)
- ✅ Ensure `responsive` prop is set to `true`
- ✅ Check parent container doesn't have conflicting height constraints
- ✅ Use browser DevTools to inspect applied CSS classes

**Issue: Images loading too slowly**
- ✅ Enable lazy loading with `lazy` prop for below-fold images
- ✅ Optimize image file sizes (use WebP format, compress images)
- ✅ Use `src2x` only when necessary (increases bandwidth)
- ✅ Consider using a CDN for faster delivery
- ✅ Implement responsive images with different sizes per viewport

**Issue: Alt text not appearing**
- ✅ Ensure `alt` prop is set (defaults to empty string)
- ✅ Check if the image failed to load (alt text appears on broken images)
- ✅ Use browser DevTools to verify alt attribute in rendered HTML

---

## Real-World Examples

### Product Gallery

```blade
<div class="container">
    <div class="row g-4">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card h-100">
                    <a href="{{ route('products.show', $product) }}">
                        <x-tabler::image
                            :src="$product->image_url"
                            :src2x="$product->image_url_2x"
                            :alt="$product->name"
                            ratio="4x3"
                            responsive
                            lazy
                            class="card-img-top"
                        />
                    </a>
                    <x-tabler::cards.body>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted">${{ $product->price }}</p>
                        <x-tabler::button color="primary" href="{{ route('products.show', $product) }}">
                            View Details
                        </x-tabler::button>
                    </x-tabler::cards.body>
                </div>
            </div>
        @endforeach
    </div>
</div>
```

---

### User Avatar List

```blade
<div class="list-group">
    @foreach($users as $user)
        <div class="list-group-item d-flex align-items-center gap-3">
            <x-tabler::image
                :src="$user->avatar_url"
                :alt="$user->name . ' avatar'"
                class="rounded-circle"
                width="48"
                height="48"
            />
            <div class="flex-grow-1">
                <div class="fw-bold">{{ $user->name }}</div>
                <div class="text-muted small">{{ $user->email }}</div>
            </div>
            <x-tabler::badge color="success">Active</x-tabler::badge>
        </div>
    @endforeach
</div>
```

---

### Blog Post with Featured Image

```blade
<article class="container my-5">
    {{-- Hero image --}}
    <x-tabler::image
        src="/blog/featured/{{ $post->slug }}.jpg"
        src2x="/blog/featured/{{ $post->slug }}@2x.jpg"
        :alt="$post->title"
        ratio="21x9"
        responsive
        loading="eager"
        class="rounded shadow mb-4"
    />

    {{-- Post metadata --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <x-tabler::image
            :src="$post->author->avatar_url"
            :alt="$post->author->name"
            class="rounded-circle"
            width="40"
            height="40"
        />
        <div>
            <div class="fw-bold">{{ $post->author->name }}</div>
            <div class="text-muted small">{{ $post->published_at->format('M d, Y') }}</div>
        </div>
    </div>

    {{-- Post content --}}
    <h1>{{ $post->title }}</h1>
    <div class="post-content">
        {!! $post->content !!}
    </div>

    {{-- Inline images within content --}}
    @foreach($post->images as $image)
        <figure class="my-4">
            <x-tabler::image
                :src="$image->url"
                :alt="$image->caption"
                lazy
                class="img-fluid rounded"
            />
            <figcaption class="text-muted small mt-2">{{ $image->caption }}</figcaption>
        </figure>
    @endforeach
</article>
```

---

### Portfolio Grid with Lightbox

```blade
<div class="container">
    <div class="row g-3">
        @foreach($portfolioItems as $item)
            <div class="col-lg-4 col-md-6">
                <a
                    href="{{ $item->full_image_url }}"
                    data-lightbox="portfolio"
                    :data-title="$item->title"
                    class="d-block position-relative overflow-hidden rounded"
                >
                    <x-tabler::image
                        :src="$item->thumbnail_url"
                        :alt="$item->title"
                        ratio="1x1"
                        responsive
                        lazy
                        class="img-responsive-grid"
                    />
                    <div class="position-absolute bottom-0 start-0 end-0 bg-dark bg-opacity-75 text-white p-3">
                        <h5 class="mb-0">{{ $item->title }}</h5>
                        <small>{{ $item->category }}</small>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
```

---

## Performance

### Optimization Strategies

**Lazy Loading:**
- Enable `lazy` prop for images below the fold
- Reduces initial page load time
- Improves Core Web Vitals (LCP, FID)

**High-DPI Images:**
- Use `src2x` only for critical images (logos, hero images)
- Increases bandwidth usage by ~2-4x
- Consider using responsive images with multiple resolutions

**Image Formats:**
- Use WebP for better compression (30% smaller than JPEG)
- Provide fallback formats for older browsers
- Consider AVIF for even better compression

**File Size Optimization:**
- Compress images before upload (TinyPNG, ImageOptim)
- Use appropriate dimensions (don't serve 4K images for thumbnails)
- Implement responsive images with srcset for different viewports

**CDN Usage:**
- Serve images from CDN for faster delivery
- Enable browser caching with proper headers
- Consider image transformation services (Cloudinary, imgix)

### Performance Benchmarks

- **Regular image:** ~500 bytes overhead (HTML)
- **Responsive image:** ~600 bytes overhead (HTML + inline style)
- **High-DPI image:** ~700 bytes overhead (HTML + srcset)
- **Lazy loading:** Reduces initial page weight by 40-70% on image-heavy pages

### Best Practices

- Use `loading="eager"` for above-the-fold images
- Use `lazy` prop for below-the-fold images
- Specify width/height attributes to prevent layout shift (CLS)
- Optimize image dimensions to match display size
- Use responsive mode with aspect ratios to prevent reflow

---

## Notes

- The component automatically handles three rendering modes: regular image, responsive (aspect ratio), and background
- High-DPI support via srcset is automatically applied when `src2x` is provided
- Lazy loading uses native browser implementation (no JavaScript required)
- Responsive mode uses CSS background-image for better aspect ratio control
- All Bootstrap 5 utility classes work seamlessly with this component
- The `alt` attribute defaults to empty string but should always be set explicitly
- Width and height attributes help prevent Cumulative Layout Shift (CLS)

---

## Related Components

- [Avatar](./avatar.md) - Specialized component for user profile images with fallback initials
- [Card](./card.md) - Container component that integrates with card-img-top/bottom classes

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/image.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with regular, responsive, and background image modes, high-DPI support, and lazy loading
