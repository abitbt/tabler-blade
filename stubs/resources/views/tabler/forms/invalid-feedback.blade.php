{{--
    Form Invalid Feedback Component

    Displays validation error messages below form controls.

    @prop string|null $message - Error message (alternative to slot)

    @slot default - Error message content (alternative to message prop)

    Available CSS Classes (use via class="" attribute):

    Display:
    - d-block            - Display as block (always visible, not just when invalid)

    Usage Examples:

    With message prop:
    <x-tabler::forms.invalid-feedback message="This field is required" />

    With slot:
    <x-tabler::forms.invalid-feedback>
        Please enter a valid email address
    </x-tabler::forms.invalid-feedback>

    Always visible:
    <x-tabler::forms.invalid-feedback class="d-block" message="Email already exists" />

    With form control:
    <input type="email" class="form-control is-invalid" />
    <x-tabler::forms.invalid-feedback>Invalid email format</x-tabler::forms.invalid-feedback>
--}}

@props([
    'message' => null,
])

<div {{ $attributes->merge(['class' => 'invalid-feedback']) }}>
    @if ($message)
        {{ $message }}
    @else
        {{ $slot }}
    @endif
</div>
