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

<div class="{{ $containerClass }}" data-litepicker data-litepicker-config="{{ base64_encode($configJson) }}"
    data-litepicker-id="{{ $id }}" @if ($wireModel) data-litepicker-livewire @endif>
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
            document.addEventListener('DOMContentLoaded', function() {
                // Check if Litepicker is loaded
                if (typeof Litepicker === 'undefined') {
                    console.error('Litepicker library is not loaded. Please include Litepicker in your layout.');
                    return;
                }

                // Initialize all Litepicker elements
                function initializeDatepickers(root = document) {
                    root.querySelectorAll('[data-litepicker]').forEach(function(container) {
                        if (container.litepickerInstance) return; // Already initialized

                        const pickerId = container.getAttribute('data-litepicker-id');
                        const configBase64 = container.getAttribute('data-litepicker-config');
                        const hasLivewire = container.hasAttribute('data-litepicker-livewire');

                        if (!pickerId || !configBase64) {
                            console.error('Litepicker: Missing required data attributes', container);
                            return;
                        }

                        // Decode config from base64
                        const config = JSON.parse(atob(configBase64));
                        const element = document.getElementById(pickerId);

                        if (!element) {
                            console.error('Litepicker: Element not found:', pickerId);
                            return;
                        }

                        config.element = element;

                        // Initialize Litepicker
                        const picker = new Litepicker(config);

                        // Store instance on container
                        container.litepickerInstance = picker;

                        // Livewire integration
                        if (hasLivewire) {
                            picker.on('selected', (date1, date2) => {
                                let value;

                                if (config.singleMode) {
                                    value = date1.format(config.format);
                                } else {
                                    value = date1.format(config.format) + ' - ' + date2.format(config
                                        .format);
                                }

                                element.value = value;
                                element.dispatchEvent(new Event('input', {
                                    bubbles: true
                                }));
                                element.dispatchEvent(new Event('change', {
                                    bubbles: true
                                }));
                            });
                        }
                    });
                }

                // Initialize on page load
                initializeDatepickers();

                // Livewire integration
                if (window.Livewire) {
                    Livewire.hook('morph.updated', ({
                        el
                    }) => {
                        // Destroy old instances
                        el.querySelectorAll('[data-litepicker]').forEach(function(container) {
                            if (container.litepickerInstance) {
                                container.litepickerInstance.destroy();
                                delete container.litepickerInstance;
                            }
                        });

                        // Re-initialize
                        initializeDatepickers(el);
                    });
                }
            });
        </script>
    @endpush
@endonce
