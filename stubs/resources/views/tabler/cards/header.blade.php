{{--
    Card Header Component

    A flexible card header that supports title, subtitle, and actions.

    @prop bool $light - Use light header style

    @slot default - Main header content
    @slot title - Card title (displays as h3.card-title)
    @slot subtitle - Card subtitle (displays inside title as .card-subtitle)
    @slot actions - Header actions (displays as .card-actions)

    Usage Examples:

    Simple:
    <x-tabler::cards.header>My Custom Header</x-tabler::cards.header>

    With title and subtitle:
    <x-tabler::cards.header>
        <x-slot:title>Dashboard</x-slot>
        <x-slot:subtitle>Overview statistics</x-slot>
    </x-tabler::cards.header>

    With actions:
    <x-tabler::cards.header>
        <x-slot:title>Users</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" icon="plus">Add</x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>
--}}

@props([
    'light' => false,
])

@php
    $headerClasses = ['card-header'];

    if ($light) {
        $headerClasses[] = 'card-header-light';
    }
@endphp

<div {{ $attributes->merge(['class' => implode(' ', $headerClasses)]) }}>
    {{-- Structured title/subtitle or raw content --}}
    @isset($title)
        <h3 class="card-title">
            {{ $title }}
            @isset($subtitle)
                <span class="card-subtitle">{{ $subtitle }}</span>
            @endisset
        </h3>
    @else
        {{-- Raw content from default slot --}}
        {{ $slot }}
    @endisset

    {{-- Actions (buttons, dropdowns, etc.) --}}
    @isset($actions)
        <div class="card-actions">
            {{ $actions }}
        </div>
    @endisset
</div>
