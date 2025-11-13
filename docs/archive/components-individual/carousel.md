# Carousel

A responsive slideshow component for cycling through images or content with smooth transitions, navigation controls, and indicators. Built on Bootstrap's carousel functionality with Tabler styling.

## Overview

- Automatic slideshow with configurable interval timing
- Previous/next navigation controls
- Optional dot indicators for slide navigation
- Fade or slide transition effects
- Dark variant controls for light-colored content
- Support for image galleries, hero sections, and testimonials
- Touch-friendly swipe gestures on mobile devices
- Keyboard navigation support (arrow keys)
- Pause on hover for user interaction
- Fully customizable slide content with captions
- Accessible with proper ARIA attributes

## Basic Usage

```blade
<x-tabler::carousel id="hero">
    <div class="carousel-item active">
        <img src="/img/slide1.jpg" class="d-block w-100" alt="Slide 1" />
    </div>
    <div class="carousel-item">
        <img src="/img/slide2.jpg" class="d-block w-100" alt="Slide 2" />
    </div>
    <div class="carousel-item">
        <img src="/img/slide3.jpg" class="d-block w-100" alt="Slide 3" />
    </div>
</x-tabler::carousel>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `id` | `string` | `''` | Yes | Unique identifier for the carousel. Required for Bootstrap functionality and controls |
| `controls` | `bool` | `true` | No | When `true`, displays previous/next navigation buttons |
| `fade` | `bool` | `false` | No | When `true`, uses fade transition instead of slide animation |
| `dark` | `bool` | `false` | No | When `true`, uses dark variant controls (better for light-colored content) |
| `interval` | `int\|null` | `5000` | No | Auto-play interval in milliseconds. Set to `false` or `null` to disable auto-play |
| `class` | `string` | `''` | No | Additional CSS classes to apply to the carousel container |

## Slots

| Slot | Description |
|------|-------------|
| `default` | Contains all carousel items (slides). Each slide must be wrapped in a `<div>` with `carousel-item` class. The first slide must have the `active` class. |
| `indicators` | Optional slot for custom carousel indicators. Typically contains dot indicators for slide navigation. Must be manually created for each slide. |

## CSS Classes

**Carousel Styles:**
- `carousel` - Base carousel class (applied automatically)
- `slide` - Enables sliding transition (applied automatically)
- `carousel-fade` - Fade transition effect (also via `fade` prop)
- `carousel-dark` - Dark variant controls for better contrast on light backgrounds (also via `dark` prop)

**Carousel Item:**
- `carousel-item` - Individual slide container (required for each slide)
- `active` - Marks the currently visible slide (required on first item)

**Carousel Caption:**
- `carousel-caption` - Overlay caption container for text on slides
- `carousel-caption d-none d-md-block` - Caption visible only on medium+ screens

**Carousel Controls:**
- `carousel-control-prev` - Previous slide button (applied automatically when controls enabled)
- `carousel-control-next` - Next slide button (applied automatically when controls enabled)
- `carousel-control-prev-icon` - Previous arrow icon
- `carousel-control-next-icon` - Next arrow icon

**Carousel Indicators:**
- `carousel-indicators` - Container for slide indicators
- Individual indicators are `<button>` elements with `data-bs-slide-to` attributes

## Examples

### Basic Carousel with Controls

```blade
<x-tabler::carousel id="hero-carousel">
    <div class="carousel-item active">
        <img src="/images/hero-1.jpg" class="d-block w-100" alt="Welcome to our platform" />
    </div>
    <div class="carousel-item">
        <img src="/images/hero-2.jpg" class="d-block w-100" alt="Discover amazing features" />
    </div>
    <div class="carousel-item">
        <img src="/images/hero-3.jpg" class="d-block w-100" alt="Get started today" />
    </div>
</x-tabler::carousel>
```

Creates a basic image carousel with automatic cycling and navigation controls.

### With Indicators

```blade
<x-tabler::carousel id="featured-carousel">
    <x-slot:indicators>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#featured-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#featured-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#featured-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
    </x-slot:indicators>

    <div class="carousel-item active">
        <img src="/images/feature-1.jpg" class="d-block w-100" alt="Feature 1" />
    </div>
    <div class="carousel-item">
        <img src="/images/feature-2.jpg" class="d-block w-100" alt="Feature 2" />
    </div>
    <div class="carousel-item">
        <img src="/images/feature-3.jpg" class="d-block w-100" alt="Feature 3" />
    </div>
</x-tabler::carousel>
```

Includes dot indicators at the bottom for direct slide navigation.

### Fade Transition

```blade
<x-tabler::carousel id="gallery-carousel" :fade="true">
    <div class="carousel-item active">
        <img src="/gallery/photo-1.jpg" class="d-block w-100" alt="Gallery Photo 1" />
    </div>
    <div class="carousel-item">
        <img src="/gallery/photo-2.jpg" class="d-block w-100" alt="Gallery Photo 2" />
    </div>
    <div class="carousel-item">
        <img src="/gallery/photo-3.jpg" class="d-block w-100" alt="Gallery Photo 3" />
    </div>
</x-tabler::carousel>
```

Uses fade transition instead of sliding for a smoother, more elegant effect.

### Dark Variant

```blade
<x-tabler::carousel id="light-carousel" :dark="true">
    <div class="carousel-item active">
        <img src="/images/light-bg-1.jpg" class="d-block w-100" alt="Light Background 1" />
    </div>
    <div class="carousel-item">
        <img src="/images/light-bg-2.jpg" class="d-block w-100" alt="Light Background 2" />
    </div>
    <div class="carousel-item">
        <img src="/images/light-bg-3.jpg" class="d-block w-100" alt="Light Background 3" />
    </div>
</x-tabler::carousel>
```

Perfect for light-colored or white backgrounds where default controls would be hard to see.

### Auto-playing with Custom Interval

```blade
{{-- Slower interval (8 seconds) --}}
<x-tabler::carousel id="slow-carousel" :interval="8000">
    <div class="carousel-item active">
        <img src="/images/banner-1.jpg" class="d-block w-100" alt="Banner 1" />
    </div>
    <div class="carousel-item">
        <img src="/images/banner-2.jpg" class="d-block w-100" alt="Banner 2" />
    </div>
</x-tabler::carousel>

{{-- No auto-play --}}
<x-tabler::carousel id="manual-carousel" :interval="null">
    <div class="carousel-item active">
        <img src="/images/product-1.jpg" class="d-block w-100" alt="Product 1" />
    </div>
    <div class="carousel-item">
        <img src="/images/product-2.jpg" class="d-block w-100" alt="Product 2" />
    </div>
</x-tabler::carousel>
```

Customize the auto-play speed or disable it completely for manual navigation only.

### With Captions

```blade
<x-tabler::carousel id="caption-carousel">
    <div class="carousel-item active">
        <img src="/images/team-1.jpg" class="d-block w-100" alt="Team Event 1" />
        <div class="carousel-caption d-none d-md-block">
            <h5>Annual Conference 2024</h5>
            <p>Our team gathered for the biggest event of the year.</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/team-2.jpg" class="d-block w-100" alt="Team Event 2" />
        <div class="carousel-caption d-none d-md-block">
            <h5>Product Launch</h5>
            <p>Celebrating the release of our newest innovation.</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/team-3.jpg" class="d-block w-100" alt="Team Event 3" />
        <div class="carousel-caption d-none d-md-block">
            <h5>Team Building</h5>
            <p>Strengthening bonds and collaboration.</p>
        </div>
    </div>
</x-tabler::carousel>
```

Adds overlay captions with titles and descriptions on each slide.

### Hero Section Carousel

```blade
<x-tabler::carousel id="hero" :fade="true" :interval="7000">
    <x-slot:indicators>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#hero" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#hero" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#hero" data-bs-slide-to="2"></button>
        </div>
    </x-slot:indicators>

    <div class="carousel-item active">
        <img src="/images/hero-1.jpg" class="d-block w-100" alt="Hero 1" style="height: 600px; object-fit: cover;" />
        <div class="carousel-caption">
            <h1 class="display-4">Welcome to Tabler</h1>
            <p class="lead">The best dashboard template for your projects</p>
            <a href="#" class="btn btn-primary btn-lg">Get Started</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/hero-2.jpg" class="d-block w-100" alt="Hero 2" style="height: 600px; object-fit: cover;" />
        <div class="carousel-caption">
            <h1 class="display-4">Built with Laravel</h1>
            <p class="lead">Seamless integration with your favorite framework</p>
            <a href="#" class="btn btn-primary btn-lg">Learn More</a>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/hero-3.jpg" class="d-block w-100" alt="Hero 3" style="height: 600px; object-fit: cover;" />
        <div class="carousel-caption">
            <h1 class="display-4">Start Building Today</h1>
            <p class="lead">Everything you need to create amazing applications</p>
            <a href="#" class="btn btn-primary btn-lg">View Documentation</a>
        </div>
    </div>
</x-tabler::carousel>
```

Full-featured hero section with captions, buttons, and indicators.

### Product Gallery

```blade
<x-tabler::carousel id="product-gallery" :controls="true" :fade="true" :interval="null">
    <x-slot:indicators>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#product-gallery" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#product-gallery" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#product-gallery" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#product-gallery" data-bs-slide-to="3"></button>
        </div>
    </x-slot:indicators>

    <div class="carousel-item active">
        <img src="/products/laptop-front.jpg" class="d-block w-100" alt="Front view" style="max-height: 500px; object-fit: contain;" />
    </div>
    <div class="carousel-item">
        <img src="/products/laptop-side.jpg" class="d-block w-100" alt="Side view" style="max-height: 500px; object-fit: contain;" />
    </div>
    <div class="carousel-item">
        <img src="/products/laptop-back.jpg" class="d-block w-100" alt="Back view" style="max-height: 500px; object-fit: contain;" />
    </div>
    <div class="carousel-item">
        <img src="/products/laptop-open.jpg" class="d-block w-100" alt="Open view" style="max-height: 500px; object-fit: contain;" />
    </div>
</x-tabler::carousel>
```

E-commerce product image gallery with manual navigation (no auto-play).

### Testimonials Carousel

```blade
<x-tabler::carousel id="testimonials" :controls="false" :interval="6000">
    <x-slot:indicators>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#testimonials" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#testimonials" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#testimonials" data-bs-slide-to="2"></button>
        </div>
    </x-slot:indicators>

    <div class="carousel-item active">
        <div class="text-center p-5">
            <x-tabler::avatar src="/users/john.jpg" size="xl" class="mb-3" />
            <blockquote class="blockquote">
                <p class="mb-0">"This platform transformed how we manage our business. Highly recommended!"</p>
            </blockquote>
            <figcaption class="blockquote-footer mt-2">
                John Smith, <cite title="Company">Acme Corp</cite>
            </figcaption>
        </div>
    </div>
    <div class="carousel-item">
        <div class="text-center p-5">
            <x-tabler::avatar src="/users/jane.jpg" size="xl" class="mb-3" />
            <blockquote class="blockquote">
                <p class="mb-0">"Outstanding support and easy to use. Our team loves it!"</p>
            </blockquote>
            <figcaption class="blockquote-footer mt-2">
                Jane Doe, <cite title="Company">TechStart</cite>
            </figcaption>
        </div>
    </div>
    <div class="carousel-item">
        <div class="text-center p-5">
            <x-tabler::avatar src="/users/mike.jpg" size="xl" class="mb-3" />
            <blockquote class="blockquote">
                <p class="mb-0">"Best investment we've made for our workflow efficiency."</p>
            </blockquote>
            <figcaption class="blockquote-footer mt-2">
                Mike Johnson, <cite title="Company">DataFlow Inc</cite>
            </figcaption>
        </div>
    </div>
</x-tabler::carousel>
```

Testimonials slider without navigation controls, using only dot indicators.

### Full-screen Carousel

```blade
<x-tabler::carousel id="fullscreen" :fade="true" :dark="true" class="vh-100">
    <div class="carousel-item active">
        <img src="/images/bg-1.jpg" class="d-block w-100 h-100" alt="Background 1" style="object-fit: cover;" />
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-2 fw-bold">Innovation</h1>
            <p class="fs-4">Pushing boundaries every day</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/bg-2.jpg" class="d-block w-100 h-100" alt="Background 2" style="object-fit: cover;" />
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-2 fw-bold">Excellence</h1>
            <p class="fs-4">Quality in everything we do</p>
        </div>
    </div>
    <div class="carousel-item">
        <img src="/images/bg-3.jpg" class="d-block w-100 h-100" alt="Background 3" style="object-fit: cover;" />
        <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-2 fw-bold">Success</h1>
            <p class="fs-4">Your goals, our mission</p>
        </div>
    </div>
</x-tabler::carousel>
```

Full viewport height carousel perfect for landing pages and presentations.

### Without Controls or Indicators

```blade
<x-tabler::carousel id="banner" :controls="false" :interval="4000">
    <div class="carousel-item active">
        <div class="bg-primary text-white p-4 text-center">
            <h4>Special Offer: 30% Off!</h4>
            <p class="mb-0">Use code SAVE30 at checkout</p>
        </div>
    </div>
    <div class="carousel-item">
        <div class="bg-success text-white p-4 text-center">
            <h4>Free Shipping on Orders $50+</h4>
            <p class="mb-0">Limited time offer</p>
        </div>
    </div>
    <div class="carousel-item">
        <div class="bg-info text-white p-4 text-center">
            <h4>New Arrivals Weekly</h4>
            <p class="mb-0">Check back often for updates</p>
        </div>
    </div>
</x-tabler::carousel>
```

Simple rotating banner without any controls, ideal for promotional messages.

## Accessibility

The Carousel component follows accessibility best practices:

- Each carousel has a unique `id` attribute for proper control functionality
- Navigation controls include `visually-hidden` text for screen readers ("Previous" and "Next")
- Keyboard navigation support with arrow keys for slide control
- All control buttons are properly labeled with `aria-label` attributes
- Images should include descriptive `alt` text for screen readers
- Carousel automatically pauses on hover or focus for better user control
- Indicators include `aria-label` attributes indicating slide numbers
- Active indicator has `aria-current="true"` to mark current position
- Color is not the only means of conveying information (text, icons, and structure are used)
- Supports keyboard focus for all interactive elements

**Best Practices:**
- Always provide meaningful `alt` text for all images
- Use captions to provide context when images alone don't convey full meaning
- Consider disabling auto-play (`interval="null"`) for content-heavy slides
- Ensure sufficient color contrast for caption text over images
- Test with screen readers to verify announcement behavior

## Browser Compatibility

The Carousel component is compatible with all modern browsers:

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Opera (latest)
- Mobile browsers (iOS Safari, Chrome Mobile, Samsung Internet)

The component uses Bootstrap 5's carousel JavaScript plugin, ensuring broad compatibility. Touch gestures (swipe left/right) are supported on mobile and tablet devices for intuitive navigation.

**Requirements:**
- Bootstrap 5 JavaScript bundle must be included in your application
- The carousel relies on `data-bs-*` attributes for Bootstrap functionality

## Related Components

- [Badge](./badge.md) - Can be used within carousel captions for labels
- [Button](./button.md) - Custom call-to-action buttons in captions
- [Avatar](./avatar.md) - For testimonial carousels
- [Card](./card.md) - Carousel can be integrated within card components

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/carousel.blade.php`

## Changelog

### v1.0.0
- Initial release of Carousel component
- Automatic slideshow with configurable interval
- Previous/next navigation controls
- Optional dot indicators via slot
- Fade and slide transition support
- Dark variant for light backgrounds
- Touch gesture support for mobile
- Keyboard navigation support
- Customizable captions with overlay support
- Full accessibility with ARIA attributes
- Bootstrap 5 carousel integration
