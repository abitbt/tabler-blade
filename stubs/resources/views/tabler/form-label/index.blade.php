@props([
    'for' => null,
    'required' => false,
    'description' => null,
    'help' => null,
    'helpPlacement' => 'top',
    'helpHtml' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('form-label')
        ->add($required ? 'required' : '');

    // Generate unique ID for help popover
    $helpId = $help ? 'help-' . uniqid() : null;
@endphp

<label {{ $attributes->only('for')->merge(['for' => $for])->class($classes) }}>
    {{ $slot }}

    @if($description)
        <span class="form-label-description">
            {{ $description }}
        </span>
    @endif

    @if($help)
        <span
            class="form-help"
            data-bs-toggle="popover"
            data-bs-placement="{{ $helpPlacement }}"
            @if($helpHtml) data-bs-html="true" @endif
            data-bs-content="{{ $help }}"
            tabindex="0"
            role="button"
            aria-label="Help">?</span>
    @endif
</label>

@if($help)
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
@endif
