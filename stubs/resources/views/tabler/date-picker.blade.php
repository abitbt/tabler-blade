@blaze

@php
    // Extract namespaced attributes BEFORE @props
    $iconTrailing ??= $attributes->pluck('icon:trailing');
    $iconLeading ??= $attributes->pluck('icon:leading');
    $iconVariant ??= $attributes->pluck('icon:variant');
@endphp

@props([
    // Core attributes
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
    'value' => null,

    // UI elements
    'label' => null,
    'placeholder' => 'Select a date',
    'help' => null,

    // State
    'required' => false,
    'disabled' => false,
    'readonly' => false,
    'error' => null,

    // Layout
    'layout' => 'default', // 'default', 'icon', 'icon-prepend', 'inline'
    'inline' => false,

    // Styling
    'size' => null, // 'sm', 'lg', null

    // Icons
    'icon' => 'calendar',
    'iconTrailing' => null,
    'iconLeading' => null,

    // Litepicker Configuration
    'mode' => 'single', // 'single', 'range'
    'format' => 'YYYY-MM-DD', // Litepicker format (not PHP format)
    'minDate' => null,
    'maxDate' => null,
    'disabledDates' => [],
    'disableWeekends' => false,
    'autoApply' => true,
    'showWeekNumbers' => false,
    'numberOfMonths' => 1,
    'numberOfColumns' => 1,

    // Dropdowns
    'monthDropdown' => false,
    'yearDropdown' => false,
    'minYear' => 1900,
    'maxYear' => null,

    // Wrapper
    'containerClass' => 'mb-3',
])

@php
    use Abitbt\TablerBlade\Tabler;
    use Illuminate\Support\Str;

    // Override layout if inline is true
    if ($inline) {
        $layout = 'inline';
    }

    // Generate unique ID
    $id = $id ?? ($name ? Str::slug($name) : 'datepicker-' . Str::random(8));

    // Detect validation errors (handle case where $errors might not exist)
    $hasError = $error !== null ? (bool) $error : $name && isset($errors) && $errors->has($name);
    $errorMessage = $hasError ? ($error ?: (isset($errors) ? $errors->first($name) : null)) : null;

    // Build input classes
    $inputClasses = Tabler::classes()
        ->add('form-control')
        ->add(
            match ($size) {
                'sm' => 'form-control-sm',
                'lg' => 'form-control-lg',
                default => '',
            },
        )
        ->add($hasError ? 'is-invalid' : '')
        ->add($attributes->pluck('class:input'));

    // Build label classes
    $labelClasses = Tabler::classes()
        ->add('form-label')
        ->add($required ? 'required' : '');

    // Determine icon setup
    $showIcon = in_array($layout, ['icon', 'icon-prepend']);
    $iconPrepend = $layout === 'icon-prepend';
    $displayIcon = $iconLeading ?? $icon;

    // Build Litepicker config
    $litepickerConfig = [
        'singleMode' => $mode === 'single',
        'format' => $format,
        'autoApply' => $autoApply,
        'mobileFriendly' => true,
    ];

    if ($layout === 'inline') {
        $litepickerConfig['inlineMode'] = true;
    }

    if ($minDate) {
        $litepickerConfig['minDate'] = $minDate;
    }
    if ($maxDate) {
        $litepickerConfig['maxDate'] = $maxDate;
    }
    if (!empty($disabledDates)) {
        $litepickerConfig['disabledDates'] = is_array($disabledDates) ? $disabledDates : [$disabledDates];
    }
    if ($disableWeekends) {
        $litepickerConfig['disableWeekends'] = true;
    }
    if ($showWeekNumbers) {
        $litepickerConfig['showWeekNumbers'] = true;
    }
    if ($numberOfMonths > 1) {
        $litepickerConfig['numberOfMonths'] = $numberOfMonths;
    }
    if ($numberOfColumns > 1) {
        $litepickerConfig['numberOfColumns'] = $numberOfColumns;
    }

    if ($monthDropdown || $yearDropdown) {
        $litepickerConfig['dropdowns'] = [
            'minYear' => $minYear,
            'maxYear' => $maxYear ?? date('Y') + 10,
            'months' => $monthDropdown,
            'years' => $yearDropdown,
        ];
    }

    // Tabler icons for calendar navigation
    $prevIcon =
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>';
    $nextIcon =
        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>';

    $litepickerConfig['buttonText'] = [
        'previousMonth' => $prevIcon,
        'nextMonth' => $nextIcon,
    ];

    $configJson = json_encode($litepickerConfig, JSON_HEX_APOS | JSON_HEX_QUOT);

    // Extract wire:model for Livewire integration
    $wireModel = $attributes->whereStartsWith('wire:model')->first();
@endphp

<div class="{{ $containerClass }}" data-tabler-date-picker>
    @if ($label)
        <label for="{{ $id }}" class="{{ $labelClasses }}">
            {{ $label }}
        </label>
    @endif

    @if ($layout === 'inline')
        {{-- Inline Calendar --}}
        <div class="datepicker-inline" id="{{ $id }}"></div>
    @else
        {{-- Input Variants --}}
        @if ($showIcon)
            <div class="input-icon">
                @if ($iconPrepend)
                    <span class="input-icon-addon">
                        @if (is_string($displayIcon))
                            <tabler:icon :name="$displayIcon" />
                        @else
                            {{ $displayIcon }}
                        @endif
                    </span>
                @endif

                <input type="text" id="{{ $id }}"
                    @if ($name) name="{{ $name }}" @endif
                    @if ($value !== null) value="{{ $value }}" @endif
                    placeholder="{{ $placeholder }}" @if ($required) required @endif
                    @if ($disabled) disabled @endif @if ($readonly) readonly @endif
                    @if ($hasError) aria-invalid="true" @endif
                    @if ($required) aria-required="true" @endif
                    @if ($errorMessage) aria-describedby="{{ $id }}-error" @endif
                    {{ $attributes->except(['class', 'class:input', 'icon', 'icon:leading', 'icon:trailing', 'label', 'error', 'help', 'containerClass', 'layout', 'inline', 'mode', 'format', 'minDate', 'maxDate', 'disabledDates', 'disableWeekends', 'autoApply', 'showWeekNumbers', 'numberOfMonths', 'numberOfColumns', 'monthDropdown', 'yearDropdown', 'minYear', 'maxYear'])->class($inputClasses) }}>

                @if (!$iconPrepend)
                    <span class="input-icon-addon">
                        @if (is_string($displayIcon))
                            <tabler:icon :name="$displayIcon" />
                        @else
                            {{ $displayIcon }}
                        @endif
                    </span>
                @endif
            </div>
        @else
            {{-- Default Layout --}}
            <input type="text" id="{{ $id }}"
                @if ($name) name="{{ $name }}" @endif
                @if ($value !== null) value="{{ $value }}" @endif
                placeholder="{{ $placeholder }}" @if ($required) required @endif
                @if ($disabled) disabled @endif @if ($readonly) readonly @endif
                @if ($hasError) aria-invalid="true" @endif
                @if ($required) aria-required="true" @endif
                @if ($errorMessage) aria-describedby="{{ $id }}-error" @endif
                {{ $attributes->except(['class', 'class:input', 'icon', 'icon:leading', 'icon:trailing', 'label', 'error', 'help', 'containerClass', 'layout', 'inline', 'mode', 'format', 'minDate', 'maxDate', 'disabledDates', 'disableWeekends', 'autoApply', 'showWeekNumbers', 'numberOfMonths', 'numberOfColumns', 'monthDropdown', 'yearDropdown', 'minYear', 'maxYear'])->class($inputClasses) }}>
        @endif
    @endif

    @if ($hasError && $errorMessage)
        <div id="{{ $id }}-error" class="invalid-feedback">
            {{ $errorMessage }}
        </div>
    @endif

    @if ($help && !$hasError)
        <small class="form-hint">{{ $help }}</small>
    @endif
</div>

{{-- Litepicker initialization script --}}
@once
    @push('scripts')
        <script>
            // Check if Litepicker is loaded on page load
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof Litepicker === 'undefined') {
                    console.error('Litepicker library is not loaded. Please include Litepicker in your layout.');
                }
            });
        </script>
    @endpush
@endonce

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Litepicker === 'undefined') {
                console.error('Litepicker not loaded for #{{ $id }}');
                return;
            }

            const config = {!! $configJson !!};
            config.element = document.getElementById('{{ $id }}');

            if (!config.element) {
                console.error('Datepicker element not found: #{{ $id }}');
                return;
            }

            const picker = new Litepicker(config);

            @if ($wireModel)
                // Livewire integration
                const input = config.element;

                picker.on('selected', (date1, date2) => {
                    let value;

                    if (config.singleMode) {
                        value = date1.format(config.format);
                    } else {
                        value = date1.format(config.format) + ' - ' + date2.format(config.format);
                    }

                    input.value = value;
                    input.dispatchEvent(new Event('input', {
                        bubbles: true
                    }));
                    input.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                });

                // Handle Livewire updates
                window.addEventListener('livewire:navigated', function() {
                    if (picker) {
                        picker.destroy();
                    }
                });
            @endif
        });
    </script>
@endpush
