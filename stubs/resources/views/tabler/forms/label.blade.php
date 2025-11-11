{{--
    Form Label Component

    A form label with optional required indicator and description.

    @prop string|null $for - Input ID this label is associated with
    @prop bool $required - Show required indicator (*)
    @prop string|null $description - Additional description text (right-aligned)

    @slot default - Label text

    Available CSS Classes (use via class="" attribute):

    Styling:
    - form-label         - Default label style (auto-applied)
    - required           - Shows required indicator (also via required prop)
    - form-label-small   - Smaller label text

    Usage Examples:

    Basic label:
    <x-tabler::forms.label for="email">Email Address</x-tabler::forms.label>

    Required field:
    <x-tabler::forms.label for="password" required>Password</x-tabler::forms.label>

    With description:
    <x-tabler::forms.label for="username" description="Optional">
        Username
    </x-tabler::forms.label>

    Standalone:
    <x-tabler::forms.label required>Select an option</x-tabler::forms.label>
--}}

@props([
    'for' => null,
    'required' => false,
    'description' => null,
])

<label {{ $attributes->merge(['class' => 'form-label' . ($required ? ' required' : '')]) }}
    @if ($for) for="{{ $for }}" @endif>
    {{ $slot }}
    @if ($required && (!$attributes->has('class') || !str_contains($attributes->get('class', ''), 'required')))
        <span class="text-danger">*</span>
    @endif
    @if ($description)
        <span class="form-label-description">{{ $description }}</span>
    @endif
</label>
