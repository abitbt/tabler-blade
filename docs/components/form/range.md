---
title: Range
description: A customizable range slider component for selecting numeric values within a defined range, with support for steps, decimals, and real-time value display.
---

# Range

The Range component provides an intuitive slider interface for selecting numeric values within a specified range. It's perfect for settings, filters, and any scenario where users need to select a value from a continuous or stepped numeric range.

## Basic Usage

The simplest form of a range slider requires only a name attribute:

```blade
<x-tabler::form.range name="volume" />
```

## Props

### Basic Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | `null` | Input name attribute (required) |
| `id` | `string` | `null` | Input ID (auto-generated if not provided) |
| `value` | `string\|int\|float` | `null` | Current value of the range |
| `min` | `string\|int\|float` | `0` | Minimum value of the range |
| `max` | `string\|int\|float` | `100` | Maximum value of the range |
| `step` | `string\|int\|float` | `1` | Step increment for the range |
| `label` | `string` | `null` | Label text for the input |
| `hint` | `string` | `null` | Help text displayed below the input |
| `error` | `string` | `null` | Error message to display |
| `disabled` | `bool` | `false` | Whether the input is disabled |
| `readonly` | `bool` | `false` | Whether the input is readonly |
| `required` | `bool` | `false` | Whether the input is required |
| `containerClass` | `string` | `null` | Additional CSS classes for the outer container |
| `labelClass` | `string` | `null` | Additional CSS classes for the label |
| `inputClass` | `string` | `null` | Additional CSS classes for the input |
| `hintClass` | `string` | `null` | Additional CSS classes for the hint text |
| `errorClass` | `string` | `null` | Additional CSS classes for the error message |

### Additional Attributes

Any additional HTML attributes passed to the component will be applied to the `<input>` element:

```blade
<x-tabler::form.range
    name="brightness"
    data-action="update-brightness"
    aria-label="Adjust brightness"
/>
```

## Examples

### Basic Range Slider

A simple range slider with default settings (0-100):

```blade
<x-tabler::form.range
    name="volume"
    label="Volume"
/>
```

### Range with Custom Min/Max Values

Define a custom range for your use case:

```blade
<x-tabler::form.range
    name="price"
    label="Maximum Price"
    min="0"
    max="1000"
    value="500"
/>
```

### Range with Custom Step

Control the granularity of value selection:

```blade
<x-tabler::form.range
    name="quantity"
    label="Quantity"
    min="0"
    max="100"
    step="5"
    value="50"
/>
```

### Range with Decimal Values

Support for floating-point precision:

```blade
<x-tabler::form.range
    name="rating"
    label="Product Rating"
    min="0"
    max="5"
    step="0.5"
    value="4.5"
/>
```

### Range with Fine-Grained Decimals

For precise decimal control:

```blade
<x-tabler::form.range
    name="opacity"
    label="Opacity"
    min="0"
    max="1"
    step="0.01"
    value="0.75"
/>
```

### Range with Label and Hint

Add helpful context for users:

```blade
<x-tabler::form.range
    name="brightness"
    label="Screen Brightness"
    hint="Adjust the brightness level (0% - 100%)"
    value="80"
/>
```

### Disabled Range

For display-only scenarios:

```blade
<x-tabler::form.range
    name="system_volume"
    label="System Volume"
    value="75"
    disabled
/>
```

### Readonly Range

Allow viewing but not editing:

```blade
<x-tabler::form.range
    name="current_usage"
    label="Current Storage Usage"
    value="65"
    readonly
/>
```

### Required Range

Mark as required for validation:

```blade
<x-tabler::form.range
    name="priority"
    label="Task Priority"
    min="1"
    max="10"
    required
/>
```

### Range with Error State

Display validation errors:

```blade
<x-tabler::form.range
    name="age"
    label="Age"
    min="18"
    max="100"
    value="15"
    error="You must be at least 18 years old"
/>
```

### Range with Live Value Display (Alpine.js)

Show the current value as the user drags the slider:

```blade
<div x-data="{ volume: 50 }">
    <x-tabler::form.range
        name="volume"
        label="Volume"
        min="0"
        max="100"
        x-model="volume"
    />
    <div class="mt-2 text-muted">
        Current value: <strong x-text="volume"></strong>
    </div>
</div>
```

### Range with Formatted Value Display

Display values with units or formatting:

```blade
<div x-data="{ price: 500 }">
    <x-tabler::form.range
        name="max_price"
        label="Maximum Price"
        min="0"
        max="2000"
        step="50"
        x-model="price"
    />
    <div class="mt-2 text-muted">
        Budget: <strong x-text="'$' + price.toLocaleString()"></strong>
    </div>
</div>
```

## Slots

The Range component does not support slots. All content is configured through props.

## CSS Classes

The Range component applies the following CSS classes:

### Container Classes
- `mb-3` - Bottom margin for spacing between form groups
- Custom classes via `containerClass` prop

### Label Classes
- `form-label` - Tabler's form label styling
- `required` - Added when `required` prop is true
- Custom classes via `labelClass` prop

### Input Classes
- `form-range` - Tabler's range input styling
- `is-invalid` - Applied when error prop is present
- Custom classes via `inputClass` prop

### Hint Classes
- `form-hint` - Tabler's hint text styling
- Custom classes via `hintClass` prop

### Error Classes
- `invalid-feedback` - Bootstrap's error message styling
- Custom classes via `errorClass` prop

### Example with Custom Classes

```blade
<x-tabler::form.range
    name="brightness"
    label="Brightness"
    containerClass="my-4"
    labelClass="fw-bold"
    inputClass="custom-range"
    hintClass="text-primary"
    hint="Adjust to your preference"
/>
```

## Laravel Validation

### Basic Validation Rules

Validate numeric ranges with Laravel's built-in rules:

```php
use Illuminate\Validation\Rule;

$request->validate([
    'volume' => ['required', 'numeric', 'min:0', 'max:100'],
    'price' => ['required', 'numeric', 'min:0', 'max:1000'],
    'rating' => ['required', 'numeric', 'between:0,5'],
]);
```

### Decimal Value Validation

For ranges with decimal steps:

```php
$request->validate([
    'opacity' => ['required', 'numeric', 'min:0', 'max:1'],
    'rating' => ['required', 'numeric', 'between:0,5', 'decimal:0,1'],
    'temperature' => ['required', 'numeric', 'between:16,30', 'decimal:0,1'],
]);
```

### Integer Validation

For whole number ranges:

```php
$request->validate([
    'quantity' => ['required', 'integer', 'min:1', 'max:100'],
    'age' => ['required', 'integer', 'min:18', 'max:100'],
    'priority' => ['required', 'integer', 'between:1,10'],
]);
```

### Multiple Range Validation

Validate min/max pairs:

```php
$request->validate([
    'min_price' => ['required', 'numeric', 'min:0', 'max:10000'],
    'max_price' => ['required', 'numeric', 'min:0', 'max:10000', 'gte:min_price'],
    'min_age' => ['required', 'integer', 'min:18'],
    'max_age' => ['required', 'integer', 'min:18', 'gte:min_age'],
]);
```

### Custom Error Messages

Provide user-friendly validation messages:

```php
$request->validate([
    'volume' => ['required', 'numeric', 'between:0,100'],
    'price' => ['required', 'numeric', 'min:0', 'max:5000'],
], [
    'volume.required' => 'Please set the volume level.',
    'volume.between' => 'Volume must be between 0 and 100.',
    'price.required' => 'Please specify your maximum price.',
    'price.max' => 'Price cannot exceed $5,000.',
]);
```

### Form Request Example

Create a dedicated Form Request class:

```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingsRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'volume' => ['required', 'numeric', 'between:0,100'],
            'brightness' => ['required', 'numeric', 'between:0,200'],
            'font_size' => ['required', 'integer', 'between:12,32'],
            'zoom_level' => ['required', 'numeric', 'in:25,50,75,100,125,150,175,200'],
        ];
    }

    public function messages(): array
    {
        return [
            'volume.required' => 'Volume setting is required.',
            'volume.between' => 'Volume must be between 0 and 100.',
            'brightness.between' => 'Brightness must be between 0% and 200%.',
            'font_size.between' => 'Font size must be between 12px and 32px.',
            'zoom_level.in' => 'Please select a valid zoom level.',
        ];
    }
}
```

### Displaying Validation Errors

Show errors in the component:

```blade
<x-tabler::form.range
    name="volume"
    label="Volume"
    min="0"
    max="100"
    :value="old('volume')"
    :error="$errors->first('volume')"
/>
```

### Complete Form Example with Validation

```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <x-tabler::form.range
        name="volume"
        label="System Volume"
        min="0"
        max="100"
        :value="old('volume', $settings->volume)"
        :error="$errors->first('volume')"
        hint="Adjust the system volume level"
    />

    <x-tabler::form.range
        name="brightness"
        label="Screen Brightness"
        min="0"
        max="200"
        :value="old('brightness', $settings->brightness)"
        :error="$errors->first('brightness')"
        hint="100% is normal brightness"
    />

    <x-tabler::form.range
        name="font_size"
        label="Font Size"
        min="12"
        max="32"
        :value="old('font_size', $settings->font_size)"
        :error="$errors->first('font_size')"
    />

    <button type="submit" class="btn btn-primary">
        Save Settings
    </button>
</form>
```

## Accessibility

The Range component follows accessibility best practices:

### Keyboard Navigation

Range sliders support full keyboard control:

- **Arrow Left/Down**: Decrease value by one step
- **Arrow Right/Up**: Increase value by one step
- **Home**: Jump to minimum value
- **End**: Jump to maximum value
- **Page Up**: Increase by larger increment (typically 10 steps)
- **Page Down**: Decrease by larger increment (typically 10 steps)

### ARIA Attributes

The component automatically includes appropriate ARIA attributes:

```blade
<x-tabler::form.range
    name="volume"
    label="Volume Control"
    min="0"
    max="100"
    value="50"
    aria-label="Adjust volume level"
    aria-valuemin="0"
    aria-valuemax="100"
    aria-valuenow="50"
/>
```

### Screen Reader Support

Ensure screen readers announce values clearly:

```blade
<x-tabler::form.range
    name="rating"
    label="Product Rating"
    min="1"
    max="5"
    step="1"
    value="4"
    aria-label="Rate this product from 1 to 5 stars"
/>
```

### Focus States

The range input includes visible focus indicators for keyboard users. Tabler UI provides default focus styling that meets WCAG requirements.

### Label Association

Always provide labels for better accessibility:

```blade
<x-tabler::form.range
    name="priority"
    label="Task Priority"
    min="1"
    max="10"
    required
/>
```

### Visual Context

Provide additional visual context with hints:

```blade
<x-tabler::form.range
    name="temperature"
    label="Target Temperature"
    min="16"
    max="30"
    hint="Recommended range: 20-24°C"
/>
```

### High Contrast Support

The component works well in high contrast mode and respects user color preferences.

## Browser Compatibility

The Range component is built on native HTML5 `<input type="range">` and is supported across all modern browsers:

### Desktop Support
- **Chrome/Edge**: 4+ (full support)
- **Firefox**: 23+ (full support)
- **Safari**: 3.1+ (full support)
- **Opera**: 11+ (full support)

### Mobile Support
- **Chrome Mobile**: Full support
- **Safari iOS**: 5+ (full support)
- **Firefox Android**: Full support
- **Opera Mobile**: Full support
- **Samsung Internet**: Full support

### Styling Differences

Range inputs have different default appearances across browsers:

- **Chrome/Edge**: Blue track with circular thumb
- **Firefox**: Blue track with circular thumb
- **Safari**: White track with circular thumb

Tabler UI normalizes these differences to provide a consistent experience.

### Touch Support

The range slider is fully touch-enabled on mobile devices:
- Touch and drag to adjust value
- Tap anywhere on the track to jump to that value
- Smooth gesture support

### Testing Across Browsers

When implementing custom range sliders, test across multiple browsers:

```blade
<!-- Works consistently across all browsers -->
<x-tabler::form.range
    name="brightness"
    label="Brightness"
    min="0"
    max="100"
    value="80"
/>
```

### Fallback for Older Browsers

For IE 10 and older browsers that don't fully support range inputs, the component gracefully degrades to a text input, though this is rarely needed in modern applications.

## Best Practices

### Choose Appropriate Min/Max Values

Select ranges that make sense for your use case:

```blade
<!-- Good: Clear, reasonable range -->
<x-tabler::form.range
    name="age"
    label="Age"
    min="18"
    max="100"
/>

<!-- Avoid: Too wide or impractical range -->
<x-tabler::form.range
    name="age"
    min="0"
    max="200"
/>
```

### Use Appropriate Step Values

Match step values to your data precision:

```blade
<!-- Whole numbers -->
<x-tabler::form.range name="quantity" step="1" />

<!-- Half increments -->
<x-tabler::form.range name="rating" step="0.5" />

<!-- Large increments -->
<x-tabler::form.range name="price" min="0" max="10000" step="100" />
```

### Provide Visual Feedback

Always show the current value:

```blade
<div x-data="{ value: 50 }">
    <x-tabler::form.range
        name="setting"
        label="Setting"
        x-model="value"
    />
    <div class="mt-2">Current: <strong x-text="value"></strong></div>
</div>
```

### Label Ranges Clearly

Use descriptive labels and hints:

```blade
<x-tabler::form.range
    name="volume"
    label="System Volume"
    hint="Adjust the master volume level (0-100%)"
/>
```

### Consider Mobile Users

Ensure adequate spacing for touch targets:

```blade
<div class="mb-4">
    <x-tabler::form.range
        name="slider"
        label="Mobile-Friendly Slider"
        containerClass="py-2"
    />
</div>
```

### Validate Ranges Properly

Always validate on the backend:

```php
$request->validate([
    'volume' => ['required', 'numeric', 'between:0,100'],
]);
```

### Use Presets for Common Values

Provide quick-select buttons:

```blade
<div x-data="{ value: 50 }">
    <x-tabler::form.range name="quality" x-model="value" />
    <div class="btn-group mt-2">
        <button type="button" @click="value = 25">Low</button>
        <button type="button" @click="value = 50">Medium</button>
        <button type="button" @click="value = 75">High</button>
    </div>
</div>
```

### Test Across Browsers

Range inputs render differently across browsers. Test your implementation in:
- Chrome/Edge
- Firefox
- Safari
- Mobile browsers

### Consider Keyboard Users

Range inputs have built-in keyboard support. Don't interfere with default behavior:
- Arrow keys: Increment/decrement
- Home/End: Jump to min/max
- Page Up/Down: Larger increments

### Provide Context

Show min/max labels:

```blade
<div x-data="{ value: 50 }">
    <x-tabler::form.range name="range" x-model="value" />
    <div class="d-flex justify-content-between text-muted small">
        <span>Min</span>
        <span x-text="value"></span>
        <span>Max</span>
    </div>
</div>
```

## Related Components

- [Text](/components/text) - For precise numeric input
- [Number](/components/number) - For numeric input with spinners
- [Select](/components/select) - For discrete value selection
- [Checkbox](/components/checkbox) - For boolean toggles
- [Radio](/components/radio) - For single selection from options
