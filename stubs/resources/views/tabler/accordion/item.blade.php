@blaze

@props([
    'open' => false,
    'id' => null,
    'icon' => null,
    'plusIcon' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID for this item
    $itemId = $id ?? 'accordion-item-' . uniqid();
    $collapseId = 'collapse-' . $itemId;

    // Get parent accordion ID and settings
    $accordionId = null;
    $accordionInverted = false;
    $accordionPlusIcon = $plusIcon;

    // Try to get from parent accordion attributes via Alpine or data attributes
    // This will be set by the parent accordion component

    $classes = Tabler::classes()->add('accordion-item');

    // Determine toggle icon
    $toggleIconName = $accordionPlusIcon ? 'plus' : 'chevron-down';
@endphp

<div {{ $attributes->class($classes) }} data-accordion-item-id="{{ $itemId }}" x-data="{
    open: {{ $open ? 'true' : 'false' }},
    itemId: '{{ $itemId }}',
    collapseId: '{{ $collapseId }}',
    accordionId: null,
    init() {
        // Get parent accordion ID from closest accordion element
        const accordion = this.$el.closest('[data-accordion-id]');
        if (accordion) {
            this.accordionId = accordion.getAttribute('data-accordion-id');
        }
    }
}">
    <div class="accordion-header" id="heading-{{ $itemId }}">
        <button class="accordion-button{{ $open ? '' : ' collapsed' }}" type="button" data-bs-toggle="collapse"
            data-bs-target="#{{ $collapseId }}" aria-expanded="{{ $open ? 'true' : 'false' }}"
            aria-controls="{{ $collapseId }}">
            @if ($icon)
                <div class="accordion-button-icon">
                    <tabler:icon :name="$icon" />
                </div>
            @endif

            @if (isset($heading))
                {{ $heading }}
            @else
                {{ $slot }}
            @endif

            <div class="accordion-button-toggle{{ $accordionPlusIcon ? ' accordion-button-toggle-plus' : '' }}">
                <tabler:icon :name="$toggleIconName" />
            </div>
        </button>
    </div>

    @if (isset($content))
        <div id="{{ $collapseId }}" class="accordion-collapse collapse{{ $open ? ' show' : '' }}"
            x-bind:data-bs-parent="accordionId ? '#' + accordionId : null"
            aria-labelledby="heading-{{ $itemId }}">
            <div class="accordion-body">
                {{ $content }}
            </div>
        </div>
    @endif
</div>
