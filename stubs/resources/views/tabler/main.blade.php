{{--
    Tabler Main Content Component

    Main content wrapper for page content.

    @props
    - class (string) - Additional CSS classes

    Usage:
    <tabler:main>
        <div class="page-header">...</div>
        <div class="page-body">...</div>
    </tabler:main>
--}}
@blaze

<div {{ $attributes->class('page-wrapper') }}>
    {{ $slot }}
</div>
