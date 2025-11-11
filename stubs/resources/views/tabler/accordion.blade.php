{{--
    Accordion Component

    Collapsible content panels using Bootstrap accordion functionality.

    @prop string $id - Unique accordion ID (required for Bootstrap functionality)
    @prop bool $flush - Remove default background and borders

    @slot default - Accordion items

    Available CSS Classes (use via class="" attribute):

    Accordion Styles:
    - accordion          - Base accordion class (applied automatically)
    - accordion-flush    - Flush style (also via flush prop)

    Usage Examples:

    Basic accordion:
    <x-tabler::accordion id="faq">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1">
                    What is Tabler?
                </button>
            </h2>
            <div id="faq-1" class="accordion-collapse collapse show" data-bs-parent="#faq">
                <div class="accordion-body">
                    Tabler is a free and open-source admin template.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2">
                    Is it responsive?
                </button>
            </h2>
            <div id="faq-2" class="accordion-collapse collapse" data-bs-parent="#faq">
                <div class="accordion-body">
                    Yes, Tabler is fully responsive.
                </div>
            </div>
        </div>
    </x-tabler::accordion>

    Flush accordion:
    <x-tabler::accordion id="settings" flush>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#settings-1">
                    Account Settings
                </button>
            </h2>
            <div id="settings-1" class="accordion-collapse collapse show" data-bs-parent="#settings">
                <div class="accordion-body">
                    Account settings content...
                </div>
            </div>
        </div>
    </x-tabler::accordion>
--}}

@props([
    'id' => '',
    'flush' => false,
])

@php
    // Build accordion classes
    $classes = ['accordion'];

    // Flush variant
    if ($flush) {
        $classes[] = 'accordion-flush';
    }
@endphp

<div id="{{ $id }}" {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
</div>
