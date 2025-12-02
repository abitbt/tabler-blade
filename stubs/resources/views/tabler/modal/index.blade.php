@blaze

@props([
    'id' => null,
    'size' => null,
    'scrollable' => false,
    'centered' => true,
    'blur' => true,
    'top' => false,
    'fullscreen' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $id ??= 'modal-' . uniqid();

    $modalClasses = Tabler::classes()
        ->add('modal')
        ->add($blur ? 'modal-blur' : '')
        ->add('fade');

    $dialogClasses = Tabler::classes()
        ->add('modal-dialog')
        ->add(
            match ($size) {
                'sm', 'small' => 'modal-sm',
                'lg', 'large' => 'modal-lg',
                'xl', 'extra-large' => 'modal-xl',
                'full-width' => 'modal-full-width',
                default => '',
            },
        )
        ->add($centered && !$top ? 'modal-dialog-centered' : '')
        ->add($scrollable ? 'modal-dialog-scrollable' : '')
        ->add($fullscreen ? 'modal-fullscreen' : '');
@endphp

<div {{ $attributes->class($modalClasses) }} id="{{ $id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="{{ $dialogClasses }}" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
