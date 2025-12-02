@props([
    'value' => null,
    'checked' => false,
    'icon' => null,
    'showCheck' => false,
    'disabled' => false,
])

@php
    // Generate unique ID for this item
    $itemId = 'selectgroup-item-' . uniqid();
@endphp

<label {{ $attributes->only('class')->class('form-selectgroup-item') }}>
    <input
        type="radio"
        name=""
        value="{{ $value }}"
        id="{{ $itemId }}"
        class="form-selectgroup-input"
        @if($checked) checked @endif
        @if($disabled) disabled @endif
        {{ $attributes->except(['class', 'value', 'checked', 'icon', 'showCheck', 'disabled']) }}
        data-selectgroup-item
    />

    @if($showCheck)
        <div class="form-selectgroup-label d-flex align-items-center p-3">
            <div class="me-3">
                <span class="form-selectgroup-check"></span>
            </div>
            <div class="form-selectgroup-label-content">
                @if($icon)
                    <tabler:icon :name="$icon" class="me-1" />
                @endif
                {{ $slot }}
            </div>
        </div>
    @else
        <span class="form-selectgroup-label">
            @if($icon)
                <tabler:icon :name="$icon" :class="$slot->isNotEmpty() ? 'me-1' : ''" />
            @endif
            {{ $slot }}
        </span>
    @endif
</label>

@once
    @push('scripts')
    <script>
        // Auto-assign type and name from parent select-group to child items
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-selectgroup-type]').forEach(function(group) {
                const type = group.getAttribute('data-selectgroup-type');
                const name = group.getAttribute('data-selectgroup-name');

                group.querySelectorAll('[data-selectgroup-item]').forEach(function(input) {
                    if (type) input.type = type;
                    if (name) input.name = name;
                });
            });
        });
    </script>
    @endpush
@endonce
