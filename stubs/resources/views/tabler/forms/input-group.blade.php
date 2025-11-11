{{--
    Form Input Group Component

    Groups form controls with text addons, buttons, or other elements.

    @prop string|null $prepend - Text to display before input
    @prop string|null $append - Text to display after input

    @slot default - Input or other form controls

    Available CSS Classes (use via class="" attribute):

    Styles:
    - input-group-flat   - Remove border radius from inner elements
    - input-group-sm     - Small input group
    - input-group-lg     - Large input group

    Usage Examples:

    Basic prepend/append:
    <x-tabler::forms.input-group prepend="@" append=".com">
        <input type="text" class="form-control" />
    </x-tabler::forms.input-group>

    Flat style (no inner borders):
    <x-tabler::forms.input-group prepend="$" class="input-group-flat">
        <input type="text" class="form-control" />
    </x-tabler::forms.input-group>

    With button:
    <x-tabler::forms.input-group>
        <input type="text" class="form-control" placeholder="Search..." />
        <button class="btn btn-primary" type="button">Search</button>
    </x-tabler::forms.input-group>

    Multiple addons:
    <x-tabler::forms.input-group prepend="$">
        <x-slot:append>
            <span class="input-group-text">.00</span>
        </x-slot:append>
        <input type="text" class="form-control" />
    </x-tabler::forms.input-group>
--}}

@props([
    'prepend' => null,
    'append' => null,
])

<div {{ $attributes->merge(['class' => 'input-group']) }}>
    @if ($prepend)
        <span class="input-group-text">{{ $prepend }}</span>
    @endif

    {{ $slot }}

    @if ($append)
        <span class="input-group-text">{{ $append }}</span>
    @endif
</div>
