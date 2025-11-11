{{--
    Form Image Check Component

    A visual selector (radio or checkbox) with image preview.

    @prop string|null $name - Input name attribute
    @prop string|null $value - Input value
    @prop bool $checked - Whether input is checked
    @prop string $type - Input type: 'checkbox' or 'radio' (default: 'checkbox')
    @prop string|null $image - Image URL to display
    @prop string $alt - Image alt text (default: '')

    @slot default - Custom content (alternative to image prop)

    Available CSS Classes (use via class="" attribute):

    Sizing:
    - form-imagecheck-lg - Large image selector

    Usage Examples:

    Image radio group:
    <x-tabler::forms.image-check
        name="template"
        value="modern"
        type="radio"
        image="/images/templates/modern.png"
        alt="Modern template"
        checked
    />
    <x-tabler::forms.image-check
        name="template"
        value="classic"
        type="radio"
        image="/images/templates/classic.png"
        alt="Classic template"
    />

    Multiple selection:
    <x-tabler::forms.image-check
        name="features[]"
        value="feature1"
        image="/images/feature1.png"
        type="checkbox"
    />
    <x-tabler::forms.image-check
        name="features[]"
        value="feature2"
        image="/images/feature2.png"
        type="checkbox"
    />

    With slot content:
    <x-tabler::forms.image-check name="option" value="custom">
        <div class="p-3 text-center">
            <strong>Custom Option</strong>
        </div>
    </x-tabler::forms.image-check>
--}}

@props([
    'name' => null,
    'value' => null,
    'checked' => false,
    'type' => 'checkbox', // 'checkbox' or 'radio'
    'image' => null,
    'alt' => '',
])

<label {{ $attributes->merge(['class' => 'form-imagecheck']) }}>
    <input @if ($name) name="{{ $name }}" @endif type="{{ $type }}"
        @if ($value !== null) value="{{ $value }}" @endif class="form-imagecheck-input"
        @if ($checked) checked @endif />
    <span class="form-imagecheck-figure">
        @if ($image)
            <img src="{{ $image }}" alt="{{ $alt }}" class="form-imagecheck-image" />
        @else
            <span class="form-imagecheck-image">
                {{ $slot }}
            </span>
        @endif
    </span>
</label>
