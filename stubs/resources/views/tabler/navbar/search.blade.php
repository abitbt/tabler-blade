@props([
    'action' => '/',
    'method' => 'get',
    'placeholder' => 'Search...',
    'name' => 'q',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('d-none')
        ->add('d-md-flex');
@endphp

<div {{ $attributes->class($classes) }}>
    <form action="{{ $action }}" method="{{ $method }}" autocomplete="off" novalidate role="search">
        <div class="input-icon">
            <span class="input-icon-addon">
                <tabler:icon name="search" />
            </span>
            <input
                type="text"
                name="{{ $name }}"
                class="form-control"
                placeholder="{{ $placeholder }}"
                aria-label="{{ $placeholder }}"
            />
        </div>
    </form>
</div>
