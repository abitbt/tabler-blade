{{--
    Steps Component

    Step indicator for multi-step processes, wizards, and progress tracking.
    Shows current position in a sequence of steps.

    @prop array $steps - Array of step labels (e.g., ['Personal Info', 'Address', 'Confirmation'])
    @prop int|null $currentStep - Current active step number (1-based index)
    @prop string|null $color - Step color: 'primary', 'secondary', 'success', etc.
    @prop bool $counter - Show step numbers instead of dots

    @slot default - Custom step items (overrides automatic rendering)

    Available CSS Classes (use via class="" attribute):

    Steps Colors:
    - steps-blue         - Blue steps
    - steps-green        - Green steps
    - steps-red          - Red steps
    - steps-{color}      - Any Tabler color

    Steps Variants:
    - steps-counter      - Show numbers instead of dots (also via counter prop)

    Step States:
    - active             - Current/active step
    - done               - Completed step

    Usage Examples:

    Basic steps:
    <x-tabler::steps :steps="['Info', 'Address', 'Payment', 'Confirm']" :currentStep="2" />

    Steps with counter:
    <x-tabler::steps :steps="['Step 1', 'Step 2', 'Step 3']" :currentStep="1" counter />

    Colored steps:
    <x-tabler::steps :steps="['Start', 'Process', 'Complete']" :currentStep="2" color="success" />

    Custom steps:
    <x-tabler::steps>
        <a href="#" class="step-item done">
            <div>Step 1</div>
        </a>
        <a href="#" class="step-item active">
            <div>Step 2</div>
        </a>
        <a href="#" class="step-item">
            <div>Step 3</div>
        </a>
    </x-tabler::steps>

    Steps with counter and custom color:
    <x-tabler::steps
        :steps="['Account', 'Profile', 'Settings']"
        :currentStep="2"
        counter
        class="steps-green"
    />
--}}

@props([
    'steps' => [],
    'currentStep' => 1,
    'color' => null,
    'counter' => false,
])

@php
    // Build steps container classes
    $classes = ['steps'];

    // Color
    if ($color) {
        $classes[] = 'steps-' . $color;
    }

    // Counter variant
    if ($counter) {
        $classes[] = 'steps-counter';
    }
@endphp

@if ($slot->isNotEmpty())
    {{-- Custom steps provided --}}
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        {{ $slot }}
    </div>
@else
    {{-- Auto-generate steps from array --}}
    <div {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @foreach ($steps as $index => $step)
            @php
                $stepNumber = $index + 1;
                $itemClasses = ['step-item'];

                if ($stepNumber < $currentStep) {
                    $itemClasses[] = 'done';
                } elseif ($stepNumber == $currentStep) {
                    $itemClasses[] = 'active';
                }
            @endphp
            <a href="#" class="{{ implode(' ', $itemClasses) }}">
                {{ $step }}
            </a>
        @endforeach
    </div>
@endif
