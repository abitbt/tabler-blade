{{--
    Tabler Spacer Component

    Flexible spacer to push elements apart.
    Can be used in headers, sidebars, or any flex container.

    Usage:
    <tabler:header>
        <tabler:header.brand />
        <tabler:spacer />
        <tabler:header.utilities />
    </tabler:header>
--}}
@blaze

<div {{ $attributes->class('flex-grow-1') }}></div>
