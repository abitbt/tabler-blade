{{--
    Form Hint Component

    Displays small help text below or above form controls.

    @slot default - Hint text content

    Available CSS Classes (use via class="" attribute):

    Display:
    - d-block            - Display as block (full width)
    - text-muted         - Muted text color

    Usage Examples:

    Basic hint:
    <x-tabler::forms.hint>Enter your email address</x-tabler::forms.hint>

    Block display:
    <x-tabler::forms.hint class="d-block">This will be visible to others</x-tabler::forms.hint>

    With form control:
    <label class="form-label">Username</label>
    <x-tabler::forms.hint>Choose a unique username</x-tabler::forms.hint>
    <input type="text" class="form-control" />
--}}

@props([])

<small {{ $attributes->merge(['class' => 'form-hint']) }}>
    {{ $slot }}
</small>
