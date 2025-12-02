@props([
    'content' => null,
    'placement' => 'top',
    'html' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-help');

    $helpContent = $content ?? $slot;
@endphp

<span
    {{ $attributes->class($classes) }}
    data-bs-toggle="popover"
    data-bs-placement="{{ $placement }}"
    @if($html) data-bs-html="true" @endif
    data-bs-content="{{ $helpContent }}"
    tabindex="0"
    role="button"
    aria-label="Help">?</span>

@once
    @push('scripts')
    <script>
        // Initialize Bootstrap popovers for form help
        document.addEventListener('DOMContentLoaded', function () {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
            popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    trigger: 'hover focus'
                });
            });
        });
    </script>
    @endpush
@endonce
