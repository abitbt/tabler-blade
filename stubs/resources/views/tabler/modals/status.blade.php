{{--
    Modal Status Component

    Colored status bar displayed at the top of modal (for alerts and notifications).

    @prop string $color - Status color: 'primary', 'success', 'danger', 'warning', 'info', etc.

    Usage Examples:

    Success status:
    <x-tabler::modals.status color="success" />

    Danger/error status:
    <x-tabler::modals.status color="danger" />

    Warning status:
    <x-tabler::modals.status color="warning" />

    Info status:
    <x-tabler::modals.status color="info" />

    Typical usage in alert modal:
    <x-tabler::modals.modal id="success" size="sm">
        <x-tabler::modals.close />
        <x-tabler::modals.status color="success" />
        <x-tabler::modals.body class="text-center py-4">
            <h3>Success!</h3>
            <p>Your action was completed.</p>
        </x-tabler::modals.body>
    </x-tabler::modals.modal>
--}}

@props(['color'])

<div {{ $attributes->merge(['class' => 'modal-status bg-' . $color]) }}></div>
