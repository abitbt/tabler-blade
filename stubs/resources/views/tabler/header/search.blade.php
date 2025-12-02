{{--
    Header Search Component

    Search input in the header.

    @props
    - placeholder (string) - Search placeholder text
    - action (string) - Form action URL
    - method (string) - Form method (default: 'GET')
    - name (string) - Input name (default: 'q')
    - class (string) - Additional CSS classes

    Usage:
    <tabler:header.search placeholder="Search..." action="/search" />
--}}
@blaze

@props([
    'placeholder' => 'Search...',
    'action' => '/search',
    'method' => 'GET',
    'name' => 'q',
])

<form {{ $attributes->class('d-none d-md-flex') }} action="{{ $action }}" method="{{ $method }}">
    <div class="input-icon">
        <span class="input-icon-addon">
            <tabler:icon name="search" />
        </span>
        <input type="search" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}"
            aria-label="{{ $placeholder }}">
    </div>
</form>
