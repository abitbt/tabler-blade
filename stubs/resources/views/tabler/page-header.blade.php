{{--
    Page Header Component

    A page header component that displays a title with optional pretitle, subtitle, and action buttons.
    Commonly used at the top of pages to show the page title and provide quick access to actions.

    @prop string|null $title - Main page title (can also use default slot)
    @prop string|null $pretitle - Small text above title (e.g., "Overview", category name)
    @prop string|null $subtitle - Description or meta information below title
    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix) to display before title
    @prop bool $border - Add bottom border to separate from content (default: false)

    @slot default - Main title content (alternative to $title prop)
    @slot:pretitle - Custom pretitle markup (alternative to $pretitle prop)
    @slot:subtitle - Custom subtitle/description markup (alternative to $subtitle prop)
    @slot:actions - Action buttons or controls (displayed on the right)

    Available CSS Classes (use via class="" attribute):

    Layout Variants:
    - page-header-border       - Add bottom border separator
    - d-print-none             - Hide header when printing (default in most layouts)

    Container Options:
    - Can wrap in container-xl, container-fluid, or no container depending on your layout

    Background Colors:
    - bg-white, bg-light, bg-dark, bg-muted
    - bg-primary, bg-secondary, bg-success, bg-danger, bg-warning, bg-info
    - bg-{color}-lt (light variants available for all colors)

    Text Colors:
    - text-white              - White text (for dark backgrounds)
    - text-muted, text-secondary - Muted text colors
    - text-primary, text-success, text-danger, etc. - Colored text

    Spacing:
    - mt-{0-5}, mb-{0-5}      - Margin top/bottom
    - pt-{0-5}, pb-{0-5}      - Padding top/bottom

    Usage Examples:

    Basic page header:
    <x-tabler::page-header title="Dashboard" pretitle="Overview" />

    With subtitle and actions:
    <x-tabler::page-header title="Gallery" subtitle="1-12 of 241 photos">
        <x-slot:actions>
            <a href="#" class="btn btn-primary">Add photo</a>
        </x-slot:actions>
    </x-tabler::page-header>

    With icon and border:
    <x-tabler::page-header
        title="Settings"
        icon="settings"
        border
        subtitle="Manage your account settings"
    />

    With breadcrumb in pretitle slot:
    <x-tabler::page-header title="Articles">
        <x-slot:pretitle>
            <ol class="breadcrumb mb-1" aria-label="breadcrumbs">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active" aria-current="page">Articles</li>
            </ol>
        </x-slot:pretitle>
        <x-slot:actions>
            <div class="btn-list">
                <a href="#" class="btn">Edit</a>
                <a href="#" class="btn btn-primary">Publish</a>
            </div>
        </x-slot:actions>
    </x-tabler::page-header>

    With custom subtitle markup:
    <x-tabler::page-header title="Paweł Kuna">
        <x-slot:subtitle>
            <div class="row">
                <div class="col-auto">
                    <x-tabler-building class="icon" />
                    <a href="#" class="text-reset">UI Designer at Tabler</a>
                </div>
                <div class="col-auto">
                    <x-tabler-users class="icon" />
                    <a href="#" class="text-reset">194 friends</a>
                </div>
            </div>
        </x-slot:subtitle>
    </x-tabler::page-header>
--}}

@props([
    'title' => null,
    'pretitle' => null,
    'subtitle' => null,
    'icon' => null,
    'border' => false,
])

@php
    // Build page header classes
    $headerClasses = 'page-header d-print-none';

    if ($border) {
        $headerClasses .= ' page-header-border';
    }

    // Icon component name
    $iconComponent = $icon ? 'tabler-' . $icon : null;
@endphp

<div {{ $attributes->merge(['class' => $headerClasses]) }}>
    <div class="container-xl">
        <div class="row g-2 align-items-center">
            <div class="col">
                {{-- Pretitle --}}
                @if ($pretitle)
                    <div class="page-pretitle">
                        {{ $pretitle }}
                    </div>
                @endif

                {{-- Page Title --}}
                <h2 class="page-title">
                    @if ($iconComponent)
                        <x-dynamic-component :component="$iconComponent" class="icon" />
                    @endif

                    {{ $title ?? $slot }}
                </h2>

                {{-- Subtitle/Description --}}
                @if ($subtitle)
                    <div class="page-subtitle">
                        {{ $subtitle }}
                    </div>
                @endif
            </div>

            {{-- Actions --}}
            @isset($actions)
                <div class="d-print-none col-auto ms-auto">
                    {{ $actions }}
                </div>
            @endisset
        </div>
    </div>
</div>
