{{--
    Form Select Group Component

    A group of visually styled radio buttons or checkboxes.

    @prop bool $wrapper - Wrap in mb-3 div (default: true)

    @slot default - Contains <x-tabler::forms.selectgroup-item> components

    Available CSS Classes (use via class="" attribute):

    Styles:
    - form-selectgroup-pills - Pill-shaped buttons with spacing
    - form-selectgroup-boxes - Box-style buttons with borders

    Usage Examples:

    Basic select group:
    <x-tabler::forms.selectgroup>
        <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free" checked />
        <x-tabler::forms.selectgroup-item name="plan" value="pro" text="Pro" />
        <x-tabler::forms.selectgroup-item name="plan" value="enterprise" text="Enterprise" />
    </x-tabler::forms.selectgroup>

    Pills style:
    <x-tabler::forms.selectgroup class="form-selectgroup-pills">
        <x-tabler::forms.selectgroup-item name="size" value="sm" text="Small" />
        <x-tabler::forms.selectgroup-item name="size" value="md" text="Medium" checked />
        <x-tabler::forms.selectgroup-item name="size" value="lg" text="Large" />
    </x-tabler::forms.selectgroup>

    With icons:
    <x-tabler::forms.selectgroup>
        <x-tabler::forms.selectgroup-item name="view" value="grid" icon="layout-grid" text="Grid" />
        <x-tabler::forms.selectgroup-item name="view" value="list" icon="list" text="List" checked />
    </x-tabler::forms.selectgroup>

    Multiple selection (checkbox):
    <x-tabler::forms.selectgroup>
        <x-tabler::forms.selectgroup-item name="features[]" value="wifi" text="WiFi" type="checkbox" />
        <x-tabler::forms.selectgroup-item name="features[]" value="parking" text="Parking" type="checkbox" />
    </x-tabler::forms.selectgroup>
--}}

@props([
    'wrapper' => true,
])

@if ($wrapper)
    <div class="mb-3">
@endif
<div {{ $attributes->merge(['class' => 'form-selectgroup']) }}>
    {{ $slot }}
</div>
@if ($wrapper)
    </div>
@endif
