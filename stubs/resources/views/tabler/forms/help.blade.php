{{--
    Form Help Component

    A question mark icon that displays a popover with help text when clicked.

    @prop string|null $content - Help text to display in popover (alternative to slot)
    @prop string $placement - Popover placement: 'top', 'bottom', 'left', 'right' (default: 'top')

    @slot default - Help text content (alternative to content prop)

    Usage Examples:

    Basic help:
    <x-tabler::forms.help content="This field is required" />

    Different placement:
    <x-tabler::forms.help placement="right" content="Click for more info" />

    With slot:
    <x-tabler::forms.help>
        This is <strong>important</strong> information
    </x-tabler::forms.help>

    In label:
    <label class="form-label">
        Password
        <x-tabler::forms.help content="Must be at least 8 characters" />
    </label>
--}}

@props([
    'content' => null,
    'placement' => 'top',
])

<span {{ $attributes->merge(['class' => 'form-help']) }} data-bs-toggle="popover" data-bs-placement="{{ $placement }}"
    data-bs-html="true" data-bs-content="{{ $content ?? $slot }}">?</span>
