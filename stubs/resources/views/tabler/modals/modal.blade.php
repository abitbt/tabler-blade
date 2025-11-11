{{--
    Modal Component

    A dialog overlay for displaying content, forms, alerts, and prompts.
    Uses Bootstrap 5 modal functionality with Tabler UI styling.

    @prop string $id - Unique modal ID (required for Bootstrap data-bs-target)
    @prop string|null $size - Modal size: 'sm', 'lg', 'xl', 'fullscreen'
    @prop bool $scrollable - Enable scrollable modal body
    @prop bool $centered - Center modal vertically (default: true)
    @prop bool $blur - Apply blur effect to backdrop
    @prop bool $static - Prevent closing on backdrop click

    @slot default - Modal content (typically header, body, footer components)

    Available CSS Classes (use via class="" attribute):

    Modal Sizes:
    - modal-sm           - Small modal (300px)
    - modal-lg           - Large modal (800px)
    - modal-xl           - Extra large modal (1140px)
    - modal-fullscreen   - Full screen modal
    - modal-fullscreen-{breakpoint} - Full screen below breakpoint (sm, md, lg, xl, xxl)

    Dialog Options:
    - modal-dialog-centered      - Vertically center modal
    - modal-dialog-scrollable    - Make modal body scrollable
    - modal-dialog-slideout      - Slide-out panel style

    Modal States:
    - modal-blur         - Blur backdrop effect

    Usage Examples:

    Basic modal:
    <x-tabler::modals.modal id="example">
        <x-tabler::modals.header title="Modal Title" />
        <x-tabler::modals.body>
            Modal content goes here.
        </x-tabler::modals.body>
        <x-tabler::modals.footer>
            <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
            <x-tabler::button color="primary">Save changes</x-tabler::button>
        </x-tabler::modals.footer>
    </x-tabler::modals.modal>

    Trigger modal with button:
    <x-tabler::button data-bs-toggle="modal" data-bs-target="#example">
        Open Modal
    </x-tabler::button>

    Small modal:
    <x-tabler::modals.modal id="confirm" size="sm">
        ...
    </x-tabler::modals.modal>

    Large modal with form:
    <x-tabler::modals.modal id="report" size="lg">
        <x-tabler::modals.header title="New Report" />
        <x-tabler::modals.body>
            <form>...</form>
        </x-tabler::modals.body>
        <x-tabler::modals.footer>
            <x-tabler::button type="submit" color="primary">Create</x-tabler::button>
        </x-tabler::modals.footer>
    </x-tabler::modals.modal>

    Success alert modal:
    <x-tabler::modals.modal id="success" size="sm" centered>
        <x-tabler::modals.close />
        <x-tabler::modals.status color="success" />
        <x-tabler::modals.body class="text-center py-4">
            <x-tabler-circle-check class="icon icon-lg text-green mb-2" />
            <h3>Payment succeeded</h3>
            <div class="text-secondary">Your payment has been processed.</div>
        </x-tabler::modals.body>
        <x-tabler::modals.footer>
            <div class="w-100">
                <div class="row">
                    <div class="col">
                        <x-tabler::button data-bs-dismiss="modal" fullWidth>Close</x-tabler::button>
                    </div>
                </div>
            </div>
        </x-tabler::modals.footer>
    </x-tabler::modals.modal>

    Danger confirmation modal:
    <x-tabler::modals.modal id="delete" size="sm" centered>
        <x-tabler::modals.close />
        <x-tabler::modals.status color="danger" />
        <x-tabler::modals.body class="text-center py-4">
            <x-tabler-alert-triangle class="icon icon-lg text-danger mb-2" />
            <h3>Are you sure?</h3>
            <div class="text-secondary">This action cannot be undone.</div>
        </x-tabler::modals.body>
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
    </x-tabler::modals.modal>

    Scrollable modal:
    <x-tabler::modals.modal id="long" scrollable>
        <x-tabler::modals.header title="Long Content" />
        <x-tabler::modals.body>
            <!-- Long scrollable content -->
        </x-tabler::modals.body>
        <x-tabler::modals.footer>
            <x-tabler::button data-bs-dismiss="modal">Close</x-tabler::button>
        </x-tabler::modals.footer>
    </x-tabler::modals.modal>

    Static modal (no backdrop dismiss):
    <x-tabler::modals.modal id="required" static>
        ...
    </x-tabler::modals.modal>
--}}

@props(['id', 'size' => null, 'scrollable' => false, 'centered' => true, 'blur' => true, 'static' => false])

@php
    // Build modal classes
    $modalClasses = ['modal', 'fade'];

    // Blur backdrop effect (Tabler default)
    if ($blur) {
        $modalClasses[] = 'modal-blur';
    }

    // Build modal-dialog classes
    $dialogClasses = ['modal-dialog'];

    // Size modifiers
    if ($size) {
        $dialogClasses[] = 'modal-' . $size;
    }

    // Vertical centering (default behavior)
    if ($centered) {
        $dialogClasses[] = 'modal-dialog-centered';
    }

    // Scrollable content
    if ($scrollable) {
        $dialogClasses[] = 'modal-dialog-scrollable';
    }

    // Static backdrop (prevent closing on backdrop click)
    $staticAttr = $static ? 'static' : null;
@endphp

<div id="{{ $id }}" {{ $attributes->merge(['class' => implode(' ', $modalClasses)]) }} tabindex="-1"
    role="dialog" aria-labelledby="{{ $id }}-title" aria-hidden="true"
    @if ($staticAttr) data-bs-backdrop="{{ $staticAttr }}"
        data-bs-keyboard="false" @endif>
    <div class="{{ implode(' ', $dialogClasses) }}" role="document">
        <div class="modal-content">
            {{ $slot }}
        </div>
    </div>
</div>
