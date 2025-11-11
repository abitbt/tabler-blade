{{--
    Navbar Search

    A search form component for the navbar.

    @var string $class - Additional CSS classes
    @var string $placeholder - Search input placeholder text
    @var string $action - Form action URL
    @var string $name - Input field name (default: 'q')
--}}

@php
    $class = $class ?? '';
    $placeholder = $placeholder ?? 'Search...';
    $action = $action ?? (Route::has('search') ? route('search') : url('/search'));
    $name = $name ?? 'q';
    $value = request($name, '');
@endphp

@if ($class)
    <div class="{{ $class }}">
    @else
        <div>
@endif
<form action="{{ $action }}" method="get" autocomplete="off" novalidate role="search">
    <div class="input-icon">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                <path d="M21 21l-6 -6" />
            </svg>
        </span>
        <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control"
            placeholder="{{ $placeholder }}" aria-label="Search in website">
    </div>
</form>
</div>
