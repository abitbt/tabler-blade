@blaze

@props([
    // Button configuration
    'buttonText' => 'Dropdown',
    'buttonVariant' => null, // primary|secondary|success|warning|danger|info|dark|light
    'buttonSize' => null, // xs|sm|lg|xl
    'buttonClass' => '', // Additional classes for button

    // Menu configuration
    'align' => null, // start|end (default: start)
    'direction' => null, // up|down|start|end (default: down)
    'arrow' => false, // Show arrow pointing to button
    'card' => false, // Card-style dropdown menu
    'dark' => false, // Dark dropdown theme
    'scrollable' => false, // Scrollable dropdown menu

    // Split button
    'split' => false, // Split dropdown button
    'splitAction' => null, // URL for main split button action

    // Advanced
    'menuClass' => '', // Additional classes for dropdown-menu
    'autoClose' => true, // Auto-close behavior
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Build wrapper classes
    $wrapperClasses = Tabler::classes()->add(
        match ($direction) {
            'up' => 'dropup',
            'start' => 'dropstart',
            'end' => 'dropend',
            default => 'dropdown',
        },
    );

    // Build button classes
    $buttonClasses = Tabler::classes()
        ->add('btn')
        ->add($buttonVariant ? "btn-{$buttonVariant}" : '')
        ->add($buttonSize ? "btn-{$buttonSize}" : '')
        ->add($split ? '' : 'dropdown-toggle')
        ->add($buttonClass);

    // Build menu classes
    $menuClasses = Tabler::classes()
        ->add('dropdown-menu')
        ->add($align === 'end' ? 'dropdown-menu-end' : '')
        ->add($arrow ? 'dropdown-menu-arrow' : '')
        ->add($card ? 'dropdown-menu-card' : '')
        ->add($scrollable ? 'dropdown-menu-scrollable' : '')
        ->add($menuClass);

    // Auto-close attributes
    $autoCloseAttr = match ($autoClose) {
        false => 'false',
        'inside' => 'inside',
        'outside' => 'outside',
        default => 'true',
    };
@endphp

<div {{ $attributes->merge(['class' => $wrapperClasses]) }}>
    @if ($split)
        {{-- Split button dropdown --}}
        @if ($splitAction)
            <a href="{{ $splitAction }}" class="{{ $buttonClasses }}">
                {{ $buttonText }}
            </a>
        @else
            <button type="button" class="{{ $buttonClasses }}">
                {{ $buttonText }}
            </button>
        @endif
        <button type="button"
            class="btn {{ $buttonVariant ? "btn-{$buttonVariant}" : '' }} {{ $buttonSize ? "btn-{$buttonSize}" : '' }} dropdown-toggle dropdown-toggle-split"
            data-bs-toggle="dropdown" data-bs-auto-close="{{ $autoCloseAttr }}" aria-expanded="false">
            <span class="visually-hidden">Toggle Dropdown</span>
        </button>
    @else
        {{-- Regular dropdown button --}}
        <a href="#" class="{{ $buttonClasses }}" data-bs-toggle="dropdown"
            data-bs-auto-close="{{ $autoCloseAttr }}" aria-expanded="false">
            {{ $buttonText }}
        </a>
    @endif

    <div class="{{ $menuClasses }}"@if ($dark) data-bs-theme="dark" @endif>
        {{ $slot }}
    </div>
</div>
