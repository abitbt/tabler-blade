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
            <x-tabler-search class="icon" />
        </span>
        <input type="text" name="{{ $name }}" value="{{ $value }}" class="form-control"
            placeholder="{{ $placeholder }}" aria-label="Search in website">
    </div>
</form>
</div>
