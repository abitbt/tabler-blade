@blaze

@props([
    'variant' => null,
    'active' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes();

    if ($variant) {
        $classes->add(
            match ($variant) {
                'primary' => 'table-primary',
                'secondary' => 'table-secondary',
                'success' => 'table-success',
                'danger' => 'table-danger',
                'warning' => 'table-warning',
                'info' => 'table-info',
                'light' => 'table-light',
                'dark' => 'table-dark',
                default => '',
            },
        );
    }

    if ($active) {
        $classes->add('table-active');
    }
@endphp

<tr {{ $attributes->class($classes) }}>
    {{ $slot }}
</tr>
