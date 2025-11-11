{{--
    Modal Close Button Component

    Standalone close button for modals (typically used in alert-style modals without headers).

    Usage Examples:

    Basic close button:
    <x-tabler::modals.close />

    Close button with custom aria-label:
    <x-tabler::modals.close aria-label="Dismiss" />

    Typical usage in alert modal:
    <x-tabler::modals.modal id="alert" size="sm">
        <x-tabler::modals.close />
        <x-tabler::modals.status color="danger" />
        <x-tabler::modals.body class="text-center py-4">
            <h3>Error</h3>
            <p>Something went wrong.</p>
        </x-tabler::modals.body>
    </x-tabler::modals.modal>
--}}

<button type="button" {{ $attributes->merge(['class' => 'btn-close']) }} data-bs-dismiss="modal"
    aria-label="Close"></button>
