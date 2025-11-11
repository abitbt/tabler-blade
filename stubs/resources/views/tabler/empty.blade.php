{{--
    Empty State Component

    Display empty states when there's no content to show.

    @prop string|null $icon - Tabler icon name (without 'tabler-' prefix)
    @prop string|null $title - Empty state title/heading
    @prop string|null $description - Empty state description text

    @slot default - Custom content (overrides auto-generated layout)
    @slot:action - Action buttons or links

    Available CSS Classes (use via class="" attribute):

    Empty State Styles:
    - empty              - Base empty state class (applied automatically)
    - empty-icon         - Icon wrapper
    - empty-title        - Title text
    - empty-subtitle     - Subtitle/description text
    - empty-action       - Action buttons wrapper

    Usage Examples:

    Basic empty state:
    <x-tabler::empty
        icon="inbox"
        title="No messages"
        description="You don't have any messages yet."
    />

    Empty state with action:
    <x-tabler::empty icon="folder" title="No files" description="Start by uploading your first file.">
        <x-slot:action>
            <x-tabler::button color="primary">Upload file</x-tabler::button>
        </x-slot:action>
    </x-tabler::empty>

    Custom empty state:
    <x-tabler::empty>
        <div class="empty-icon">
            <x-tabler-inbox class="icon" />
        </div>
        <p class="empty-title">No results found</p>
        <p class="empty-subtitle">Try adjusting your search or filter criteria.</p>
        <div class="empty-action">
            <x-tabler::button>Clear filters</x-tabler::button>
        </div>
    </x-tabler::empty>
--}}

@props([
    'icon' => null,
    'title' => null,
    'description' => null,
])

@php
    // Prepare icon component name
    $iconComponent = $icon ? 'tabler-' . $icon : null;
@endphp

<div {{ $attributes->merge(['class' => 'empty']) }}>
    @if ($slot->isNotEmpty())
        {{-- Custom empty state --}}
        {{ $slot }}
    @else
        {{-- Auto-generated empty state --}}
        @if ($iconComponent)
            <div class="empty-icon">
                <x-dynamic-component :component="$iconComponent" class="icon" />
            </div>
        @endif

        @if ($title)
            <p class="empty-title">{{ $title }}</p>
        @endif

        @if ($description)
            <p class="empty-subtitle text-secondary">{{ $description }}</p>
        @endif

        @isset($action)
            <div class="empty-action">
                {{ $action }}
            </div>
        @endisset
    @endif
</div>
