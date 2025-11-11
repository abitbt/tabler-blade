{{--
    Image Component

    A versatile image component supporting regular images, responsive images with aspect ratios,
    and background images. Provides srcset support for high-DPI displays.

    @prop string|null $src - Image source URL (required for regular/responsive images)
    @prop string|null $src2x - Optional 2x resolution image URL for srcset
    @prop string|null $alt - Image alt text (default: '')
    @prop string|null $width - Image width attribute
    @prop string|null $height - Image height attribute
    @prop string|null $ratio - Aspect ratio modifier: '1x1', '2x1', '1x2', '3x1', '1x3', '4x1', '1x4', '4x3', '3x4', '16x9', '9x16', '21x9', '9x21'
    @prop bool $responsive - Use responsive image mode (aspect ratio with background image)
    @prop bool $background - Use background image mode (simple background cover)
    @prop bool $lazy - Enable lazy loading (default: false)
    @prop string|null $loading - Loading attribute: 'lazy' or 'eager' (default: 'eager')

    @slot default - Custom content (not commonly used with images)

    Available CSS Classes (use via class="" attribute):

    Image Utility Classes:
    - img-fluid          - Responsive image that scales with container width
    - img-thumbnail      - Image with rounded border
    - rounded            - Rounded corners
    - rounded-circle     - Circular image
    - shadow             - Add shadow to image
    - shadow-sm          - Small shadow
    - shadow-lg          - Large shadow

    Responsive Image Classes:
    - img-responsive     - Base class for responsive images with aspect ratio
    - img-responsive-1x1 - Square (1:1 ratio)
    - img-responsive-2x1 - Landscape 2:1
    - img-responsive-1x2 - Portrait 1:2
    - img-responsive-3x1 - Wide 3:1
    - img-responsive-1x3 - Tall 1:3
    - img-responsive-4x1 - Ultra-wide 4:1
    - img-responsive-1x4 - Ultra-tall 1:4
    - img-responsive-4x3 - Standard 4:3
    - img-responsive-3x4 - Portrait 3:4
    - img-responsive-16x9 - Widescreen 16:9
    - img-responsive-9x16 - Vertical video 9:16
    - img-responsive-21x9 - Ultrawide 21:9
    - img-responsive-9x21 - Ultra-tall 9:21
    - img-responsive-grid - Use in grid layouts (adjusts for gutter)

    Background Image Classes:
    - img-bg             - Background image with cover sizing (no aspect ratio)

    Card Integration Classes:
    - card-img-top       - Image at top of card
    - card-img-bottom    - Image at bottom of card

    Sizing Classes:
    - w-100              - Full width (100%)
    - h-100              - Full height (100%)
    - mw-100             - Max width 100%
    - mh-100             - Max height 100%

    Object Fit Classes:
    - object-fit-contain - Fit entire image in container
    - object-fit-cover   - Cover entire container
    - object-fit-fill    - Stretch to fill
    - object-fit-scale   - Preserve aspect ratio
    - object-fit-none    - Original size

    Usage Examples:

    Regular image:
    <x-tabler::image src="/photos/sunset.jpg" alt="Beautiful sunset" />

    Fluid/responsive image:
    <x-tabler::image src="/photos/sunset.jpg" alt="Sunset" class="img-fluid" />

    High-DPI image with srcset:
    <x-tabler::image
        src="/photos/sunset.jpg"
        src2x="/photos/sunset@2x.jpg"
        alt="Sunset"
        class="img-fluid"
    />

    Responsive image with aspect ratio (background style):
    <x-tabler::image
        src="/photos/landscape.jpg"
        ratio="21x9"
        responsive
    />

    Square responsive image:
    <x-tabler::image src="/photos/avatar.jpg" ratio="1x1" responsive />

    Background image mode:
    <x-tabler::image src="/photos/hero.jpg" background class="vh-100" />

    Circular image:
    <x-tabler::image src="/photos/profile.jpg" alt="Profile" class="rounded-circle" />

    Card image:
    <x-tabler::cards.card>
        <x-tabler::image
            src="/photos/article.jpg"
            ratio="16x9"
            responsive
            class="card-img-top"
        />
        <x-tabler::cards.body>
            <h3 class="card-title">Article Title</h3>
        </x-tabler::cards.body>
    </x-tabler::cards.card>

    Lazy loading:
    <x-tabler::image
        src="/photos/large.jpg"
        alt="Large image"
        lazy
        class="img-fluid"
    />

    Custom loading attribute:
    <x-tabler::image src="/photos/hero.jpg" loading="eager" class="img-fluid" />
--}}

@props([
    'src' => null,
    'src2x' => null,
    'alt' => '',
    'width' => null,
    'height' => null,
    'ratio' => null,
    'responsive' => false,
    'background' => false,
    'lazy' => false,
    'loading' => null,
])

@php
    // Determine loading strategy
    $loadingAttr = $lazy ? 'lazy' : ($loading ?? 'eager');

    // Build classes based on mode
    $classes = [];

    if ($responsive) {
        // Responsive mode with aspect ratio
        $classes[] = 'img-responsive';
        if ($ratio) {
            $classes[] = 'img-responsive-' . $ratio;
        }
    } elseif ($background) {
        // Simple background image mode
        $classes[] = 'img-bg';
    }
@endphp

@if ($responsive || $background)
    {{-- Responsive or background image mode (using div with background-image) --}}
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}
         @if($src) style="background-image: url({{ $src }})" @endif>
        {{ $slot }}
    </div>
@elseif ($src2x)
    {{-- High-DPI image with srcset --}}
    <picture>
        <img src="{{ $src }}"
             srcset="{{ $src }} 1x, {{ $src2x }} 2x"
             alt="{{ $alt }}"
             @if($width) width="{{ $width }}" @endif
             @if($height) height="{{ $height }}" @endif
             loading="{{ $loadingAttr }}"
             {{ $attributes->merge(['class' => implode(' ', $classes)]) }} />
    </picture>
@else
    {{-- Regular image --}}
    <img src="{{ $src }}"
         alt="{{ $alt }}"
         @if($width) width="{{ $width }}" @endif
         @if($height) height="{{ $height }}" @endif
         loading="{{ $loadingAttr }}"
         {{ $attributes->merge(['class' => implode(' ', $classes)]) }} />
@endif
