{{--
    Form Fieldset Component

    Groups related form controls with an optional legend.

    @prop string|null $legend - Legend text for the fieldset

    @slot default - Form controls to group

    Available CSS Classes (use via class="" attribute):

    Styling:
    - form-fieldset      - Default fieldset style (auto-applied)

    Usage Examples:

    Basic fieldset:
    <x-tabler::forms.fieldset legend="Personal Information">
        <x-tabler::forms.input name="first_name" label="First Name" />
        <x-tabler::forms.input name="last_name" label="Last Name" />
    </x-tabler::forms.fieldset>

    Without legend:
    <x-tabler::forms.fieldset>
        <x-tabler::forms.checkbox name="terms" label="I agree to terms" />
        <x-tabler::forms.checkbox name="newsletter" label="Subscribe to newsletter" />
    </x-tabler::forms.fieldset>
--}}

@props([
    'legend' => null,
])

<fieldset {{ $attributes->merge(['class' => 'form-fieldset']) }}>
    @if ($legend)
        <legend>{{ $legend }}</legend>
    @endif

    {{ $slot }}
</fieldset>
