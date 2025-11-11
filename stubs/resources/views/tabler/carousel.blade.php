{{--
    Carousel Component

    Slideshow for cycling through images or content using Bootstrap carousel.

    @prop string $id - Unique carousel ID (required for Bootstrap functionality)
    @prop bool $controls - Show previous/next controls (default: true)
    @prop bool $fade - Use fade transition instead of slide
    @prop bool $dark - Use dark variant controls
    @prop int|null $interval - Auto-play interval in milliseconds (default: 5000, set to false to disable)

    @slot default - Carousel items (slides)
    @slot:indicators - Optional carousel indicators (must be manually created for each slide)

    Available CSS Classes (use via class="" attribute):

    Carousel Styles:
    - carousel           - Base carousel class (applied automatically)
    - carousel-fade      - Fade transition (also via fade prop)
    - carousel-dark      - Dark variant controls (also via dark prop)

    Carousel Item:
    - carousel-item      - Individual slide
    - active             - Active/current slide (required on first item)

    Carousel Caption:
    - carousel-caption   - Caption overlay for slides

    Usage Examples:

    Basic carousel:
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

    Carousel with indicators:
    <x-tabler::carousel id="featured">
        <x-slot:indicators>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#featured" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#featured" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#featured" data-bs-slide-to="2"></button>
            </div>
        </x-slot:indicators>

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

    Carousel with captions:
    <x-tabler::carousel id="captions">
        <div class="carousel-item active">
            <img src="/img/slide1.jpg" class="d-block w-100" alt="First slide" />
            <div class="carousel-caption">
                <h5>First Slide</h5>
                <p>Description for first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/img/slide2.jpg" class="d-block w-100" alt="Second slide" />
            <div class="carousel-caption">
                <h5>Second Slide</h5>
                <p>Description for second slide.</p>
            </div>
        </div>
    </x-tabler::carousel>

    Fade carousel:
    <x-tabler::carousel id="gallery" fade>
        <div class="carousel-item active">
            <img src="/img/photo1.jpg" class="d-block w-100" alt="Photo 1" />
        </div>
        <div class="carousel-item">
            <img src="/img/photo2.jpg" class="d-block w-100" alt="Photo 2" />
        </div>
    </x-tabler::carousel>

    Carousel without controls:
    <x-tabler::carousel id="auto" :controls="false">
        <div class="carousel-item active">
            <img src="/img/banner1.jpg" class="d-block w-100" alt="Banner 1" />
        </div>
        <div class="carousel-item">
            <img src="/img/banner2.jpg" class="d-block w-100" alt="Banner 2" />
        </div>
    </x-tabler::carousel>
--}}

@props([
    'id' => '',
    'controls' => true,
    'fade' => false,
    'dark' => false,
    'interval' => 5000,
])

@php
    // Build carousel classes
    $classes = ['carousel', 'slide'];

    // Fade transition
    if ($fade) {
        $classes[] = 'carousel-fade';
    }

    // Dark variant
    if ($dark) {
        $classes[] = 'carousel-dark';
    }
@endphp

<div id="{{ $id }}" {{ $attributes->merge(['class' => implode(' ', $classes)]) }} data-bs-ride="carousel"
    @if ($interval !== null) data-bs-interval="{{ $interval }}" @endif>
    @isset($indicators)
        {{-- Custom Indicators --}}
        {{ $indicators }}
    @endisset

    {{-- Carousel Inner (slides) --}}
    <div class="carousel-inner">
        {{ $slot }}
    </div>

    @if ($controls)
        {{-- Previous Control --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#{{ $id }}" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        {{-- Next Control --}}
        <button class="carousel-control-next" type="button" data-bs-target="#{{ $id }}" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>
