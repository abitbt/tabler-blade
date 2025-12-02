@props([
    'placeholder' => null,
    'multiple' => false,
    'searchable' => true,
    'size' => null,
    'enhanced' => true,
    'invalid' => null,
    'disabled' => false,
    'required' => false,
    'name' => $attributes->whereStartsWith('wire:model')->first(),
    'id' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    // Generate unique ID if not provided
    $id = $id ?? 'select-' . uniqid();

    // Check validation state
    $invalid ??= $name && $errors->has($name);

    // Build classes
    $classes = Tabler::classes()
        ->add('form-select')
        ->add(
            match ($size) {
                'sm' => 'form-control-sm',
                'lg' => 'form-control-lg',
                default => '',
            },
        )
        ->add($invalid ? 'is-invalid' : '');
@endphp

<select {{ $attributes->class($classes) }} id="{{ $id }}" @if ($multiple) multiple @endif
    @if ($disabled) disabled @endif @if ($required) required @endif
    @if ($invalid) aria-invalid="true" @endif
    @if ($enhanced) data-tom-select @endif
    @if (!$searchable) data-tom-select-no-search @endif
    @if ($placeholder) data-placeholder="{{ $placeholder }}" @endif>
    @if ($placeholder && !$multiple)
        <option value="" disabled selected>{{ $placeholder }}</option>
    @endif

    {{ $slot }}
</select>

@if ($enhanced)
    @once
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize all Tom-Select elements
                    document.querySelectorAll('[data-tom-select]').forEach(function(el) {
                        if (el.tomselect) return; // Already initialized

                        const noSearch = el.hasAttribute('data-tom-select-no-search');
                        const placeholder = el.getAttribute('data-placeholder');

                        const tomSelect = new TomSelect(el, {
                            copyClassesToDropdown: false,
                            dropdownParent: 'body',
                            controlInput: noSearch ? null : '<input>',
                            placeholder: placeholder,
                            render: {
                                item: function(data, escape) {
                                    if (data.customProperties) {
                                        return '<div><span class="dropdown-item-indicator">' + data
                                            .customProperties + '</span>' + escape(data.text) +
                                            '</div>';
                                    }
                                    return '<div>' + escape(data.text) + '</div>';
                                },
                                option: function(data, escape) {
                                    if (data.customProperties) {
                                        return '<div><span class="dropdown-item-indicator">' + data
                                            .customProperties + '</span>' + escape(data.text) +
                                            '</div>';
                                    }
                                    return '<div>' + escape(data.text) + '</div>';
                                },
                            },
                        });

                        // Store instance on element
                        el.tomselect = tomSelect;
                    });

                    // Livewire integration
                    if (window.Livewire) {
                        Livewire.hook('morph.updated', ({
                            el
                        }) => {
                            // Re-initialize Tom-Select after Livewire updates
                            el.querySelectorAll('[data-tom-select]').forEach(function(select) {
                                if (select.tomselect) {
                                    select.tomselect.destroy();
                                    delete select.tomselect;
                                }
                            });

                            // Initialize new selects
                            el.querySelectorAll('[data-tom-select]').forEach(function(select) {
                                if (!select.tomselect) {
                                    const noSearch = select.hasAttribute('data-tom-select-no-search');
                                    const placeholder = select.getAttribute('data-placeholder');

                                    const tomSelect = new TomSelect(select, {
                                        copyClassesToDropdown: false,
                                        dropdownParent: 'body',
                                        controlInput: noSearch ? null : '<input>',
                                        placeholder: placeholder,
                                        render: {
                                            item: function(data, escape) {
                                                if (data.customProperties) {
                                                    return '<div><span class="dropdown-item-indicator">' +
                                                        data.customProperties + '</span>' +
                                                        escape(data.text) + '</div>';
                                                }
                                                return '<div>' + escape(data.text) + '</div>';
                                            },
                                            option: function(data, escape) {
                                                if (data.customProperties) {
                                                    return '<div><span class="dropdown-item-indicator">' +
                                                        data.customProperties + '</span>' +
                                                        escape(data.text) + '</div>';
                                                }
                                                return '<div>' + escape(data.text) + '</div>';
                                            },
                                        },
                                    });

                                    select.tomselect = tomSelect;
                                }
                            });
                        });
                    }
                });
            </script>
        @endpush
    @endonce
@endif
