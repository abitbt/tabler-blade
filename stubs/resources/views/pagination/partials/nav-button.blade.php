{{--
    Pagination Navigation Button Partial

    Renders a previous or next button for pagination.

    @param bool $isDisabled - Whether the button is disabled
    @param string|null $url - URL to navigate to (null if disabled)
    @param string $direction - 'prev' or 'next'
    @param string $icon - Icon component name (e.g., 'tabler-chevron-left')
    @param string $label - Button label text
    @param string|null $rel - Link relationship attribute (e.g., 'prev', 'next')
    @param string|null $ariaLabel - Accessible label for screen readers
--}}

@php
    $isDisabled = $isDisabled ?? false;
    $url = $url ?? null;
    $direction = $direction ?? 'prev';
    $icon = $icon ?? ($direction === 'prev' ? 'chevron-left' : 'chevron-right');
    $label = $label ?? $direction;
    $rel = $rel ?? $direction;
    $ariaLabel = $ariaLabel ?? null;
    $iconPosition = $direction === 'prev' ? 'before' : 'after';
@endphp

<li class="page-item{{ $isDisabled ? ' disabled' : '' }}" @if ($isDisabled) aria-disabled="true" @endif
    @if ($ariaLabel) aria-label="{{ $ariaLabel }}" @endif>
    @if ($isDisabled)
        <span class="page-link"{{ $isDisabled ? ' aria-hidden="true"' : '' }}>
            @if ($iconPosition === 'before')
                <tabler:icon :name="$icon" />
            @endif
            {{ $label }}
            @if ($iconPosition === 'after')
                <tabler:icon :name="$icon" />
            @endif
        </span>
    @else
        <a class="page-link" href="{{ $url }}" @if ($rel) rel="{{ $rel }}" @endif
            @if ($ariaLabel) aria-label="{{ $ariaLabel }}" @endif>
            @if ($iconPosition === 'before')
                <tabler:icon :name="$icon" />
            @endif
            {{ $label }}
            @if ($iconPosition === 'after')
                <tabler:icon :name="$icon" />
            @endif
        </a>
    @endif
</li>
