{{--
    Modal Header Component

    Header section for modals with title and close button.

    @prop string|null $title - Modal title text
    @prop bool $hideClose - Hide the close button (default: false)

    @slot:title - Custom title markup (overrides title prop)
    @slot default - Additional header content

    Usage Examples:

    Basic header with title:
    <x-tabler::modals.header title="Modal Title" />

    Custom title slot:
    <x-tabler::modals.header>
        <x-slot:title>
            <h5 class="modal-title">Custom <strong>Title</strong></h5>
        </x-slot:title>
    </x-tabler::modals.header>

    Header without close button:
    <x-tabler::modals.header title="Required Action" hideClose />

    Header with additional content:
    <x-tabler::modals.header title="Settings">
        <span class="badge bg-blue ms-auto">Pro</span>
    </x-tabler::modals.header>
--}}

@props([
    'title' => null,
    'hideClose' => false,
])

<div {{ $attributes->merge(['class' => 'modal-header']) }}>
    @if (isset($title) && $title)
        <h5 class="modal-title">{{ $title }}</h5>
    @endif

    {{ $slot }}

    @unless ($hideClose)
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    @endunless
</div>
