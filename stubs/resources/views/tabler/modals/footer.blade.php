{{--
    Modal Footer Component

    Footer section for modal actions (buttons).

    @slot default - Footer content (typically buttons)

    Available CSS Classes:
    - justify-content-start      - Align buttons to left
    - justify-content-end        - Align buttons to right (default)
    - justify-content-center     - Center buttons
    - justify-content-between    - Space buttons apart

    Usage Examples:

    Basic footer with buttons:
    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
        <x-tabler::button color="primary">Save changes</x-tabler::button>
    </x-tabler::modals.footer>

    Footer with left-aligned button:
    <x-tabler::modals.footer>
        <x-tabler::button class="me-auto" data-bs-dismiss="modal">Close</x-tabler::button>
        <x-tabler::button color="primary">Save changes</x-tabler::button>
    </x-tabler::modals.footer>

    Footer with full-width button grid (for alerts):
    <x-tabler::modals.footer>
        <div class="w-100">
            <div class="row">
                <div class="col">
                    <x-tabler::button data-bs-dismiss="modal" fullWidth>Cancel</x-tabler::button>
                </div>
                <div class="col">
                    <x-tabler::button color="danger" fullWidth>Delete</x-tabler::button>
                </div>
            </div>
        </div>
    </x-tabler::modals.footer>

    Single centered button:
    <x-tabler::modals.footer class="justify-content-center">
        <x-tabler::button color="primary">OK</x-tabler::button>
    </x-tabler::modals.footer>
--}}

<div {{ $attributes->merge(['class' => 'modal-footer']) }}>
    {{ $slot }}
</div>
