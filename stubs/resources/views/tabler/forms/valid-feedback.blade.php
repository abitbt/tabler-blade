{{--
    Form Valid Feedback Component

    Displays validation success messages below form controls.

    @prop string|null $message - Success message (alternative to slot)

    @slot default - Success message content (alternative to message prop)

    Available CSS Classes (use via class="" attribute):

    Display:
    - d-block            - Display as block (always visible, not just when valid)

    Usage Examples:

    With message prop:
    <x-tabler::forms.valid-feedback message="Looks good!" />

    With slot:
    <x-tabler::forms.valid-feedback>
        Username is available
    </x-tabler::forms.valid-feedback>

    Always visible:
    <x-tabler::forms.valid-feedback class="d-block" message="Email verified successfully" />

    With form control:
    <input type="text" class="form-control is-valid" value="john_doe" />
    <x-tabler::forms.valid-feedback>Username is available</x-tabler::forms.valid-feedback>
--}}

@props([
    'message' => null,
])

<div {{ $attributes->merge(['class' => 'valid-feedback']) }}>
    @if ($message)
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
