{{--
    Modal Body Component

    Main content area of the modal.

    @slot default - Body content

    Available CSS Classes:
    - text-center        - Center-align content
    - py-4, py-5         - Vertical padding
    - px-4, px-5         - Horizontal padding

    Usage Examples:

    Basic body:
    <x-tabler::modals.body>
        Modal content goes here.
    </x-tabler::modals.body>

    Centered content (for alerts):
    <x-tabler::modals.body class="text-center py-4">
        <h3>Are you sure?</h3>
        <p class="text-secondary">This action cannot be undone.</p>
    </x-tabler::modals.body>

    Body with form:
    <x-tabler::modals.body>
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" />
            </div>
        </form>
    </x-tabler::modals.body>

    Multiple body sections (for complex forms):
    <x-tabler::modals.body>
        <div class="row">
            <div class="col-lg-6">...</div>
            <div class="col-lg-6">...</div>
        </div>
    </x-tabler::modals.body>
    <x-tabler::modals.body>
        <div class="row">
            <div class="col-12">...</div>
        </div>
    </x-tabler::modals.body>
--}}

<div {{ $attributes->merge(['class' => 'modal-body']) }}>
    {{ $slot }}
</div>
