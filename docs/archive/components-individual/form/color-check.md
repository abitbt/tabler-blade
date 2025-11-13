---
title: Color Check
description: Visual color selector component with checkbox or radio behavior for Laravel Blade applications
---

# Color Check

The Color Check component provides a visually appealing color selection interface with checkbox or radio functionality. This component allows users to select one or multiple colors through interactive color swatches, perfect for product configuration, theme selection, and palette management.

## Basic Usage

The simplest color check implementation:

```blade
<x-tabler::form.color-check
    name="color"
    value="blue"
/>
```

## Props

### name
- **Type:** `string`
- **Required:** Yes
- **Description:** The name attribute for the form input

### value
- **Type:** `string`
- **Required:** Yes
- **Description:** The color value (Tabler color name or hex code)

### id
- **Type:** `string`
- **Required:** No
- **Default:** Auto-generated from name and value
- **Description:** Unique identifier for the input element

### checked
- **Type:** `boolean`
- **Required:** No
- **Default:** `false`
- **Description:** Whether the color is selected by default

### type
- **Type:** `string`
- **Required:** No
- **Default:** `'checkbox'`
- **Options:** `'checkbox'`, `'radio'`
- **Description:** Input type for single or multiple selection

### disabled
- **Type:** `boolean`
- **Required:** No
- **Default:** `false`
- **Description:** Disables the color check input

### required
- **Type:** `boolean`
- **Required:** No
- **Default:** `false`
- **Description:** Makes the field required

### class
- **Type:** `string`
- **Required:** No
- **Description:** Additional CSS classes for the container

### attributes
- **Type:** `array`
- **Required:** No
- **Description:** Additional HTML attributes for the input element

## Slots

This component does not use slots. All configuration is done through props.

## CSS Classes

### Base Classes

```blade
<!-- Default color check -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput"
/>
```

### Size Variants

```blade
<!-- Small color check -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput-sm"
/>

<!-- Large color check -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput-lg"
/>
```

### Shape Variants

```blade
<!-- Rounded (default) -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput"
/>

<!-- Square -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput-square"
/>

<!-- Circle -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    class="form-colorinput-circle"
/>
```

### State Classes

```blade
<!-- Disabled state -->
<x-tabler::form.color-check
    name="color"
    value="blue"
    disabled
    class="form-colorinput"
/>

<!-- With light border -->
<x-tabler::form.color-check
    name="color"
    value="white"
    class="form-colorinput-light"
/>
```

## Examples

### Single Color Selection (Radio)

Perfect for selecting one color from multiple options:

```blade
<div class="form-label">Select Product Color</div>
<div class="row g-2">
    <div class="col-auto">
        <x-tabler::form.color-check
            name="product_color"
            value="blue"
            type="radio"
            checked
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="product_color"
            value="red"
            type="radio"
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="product_color"
            value="green"
            type="radio"
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="product_color"
            value="yellow"
            type="radio"
        />
    </div>
</div>
```

### Multiple Color Selection (Checkbox)

Allow users to select multiple colors:

```blade
<div class="form-label">Select Favorite Colors</div>
<div class="row g-2">
    <div class="col-auto">
        <x-tabler::form.color-check
            name="favorite_colors[]"
            value="blue"
            type="checkbox"
            checked
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="favorite_colors[]"
            value="red"
            type="checkbox"
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="favorite_colors[]"
            value="green"
            type="checkbox"
            checked
        />
    </div>
    <div class="col-auto">
        <x-tabler::form.color-check
            name="favorite_colors[]"
            value="purple"
            type="checkbox"
        />
    </div>
</div>
```

### All Tabler Colors

Display all available Tabler color options:

```blade
<div class="form-label">Choose a Color</div>
<div class="row g-2">
    @foreach([
        'blue', 'azure', 'indigo', 'purple', 'pink', 'red',
        'orange', 'yellow', 'lime', 'green', 'teal', 'cyan',
        'gray', 'gray-dark', 'dark', 'white', 'primary', 'secondary',
        'success', 'info', 'warning', 'danger', 'light', 'muted'
    ] as $color)
        <div class="col-auto">
            <x-tabler::form.color-check
                name="theme_color"
                :value="$color"
                type="radio"
            />
        </div>
    @endforeach
</div>
```

(Additional examples continue...)

## Available Colors

The component supports all Tabler color options:

### Primary Colors
- `blue` - Primary blue
- `azure` - Light blue
- `indigo` - Deep indigo
- `purple` - Purple
- `pink` - Pink
- `red` - Red
- `orange` - Orange
- `yellow` - Yellow
- `lime` - Lime green
- `green` - Green
- `teal` - Teal
- `cyan` - Cyan

### Neutral Colors
- `gray` - Gray
- `gray-dark` - Dark gray
- `dark` - Dark (near black)
- `white` - White

### Semantic Colors
- `primary` - Primary theme color
- `secondary` - Secondary theme color
- `success` - Success green
- `info` - Info blue
- `warning` - Warning yellow/orange
- `danger` - Danger red
- `light` - Light background
- `muted` - Muted/subdued color

## Validation

### Single Color Selection

```php
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'color' => [
                'required',
                'string',
                Rule::in([
                    'blue', 'azure', 'indigo', 'purple', 'pink', 'red',
                    'orange', 'yellow', 'lime', 'green', 'teal', 'cyan',
                    'gray', 'gray-dark', 'dark', 'white'
                ])
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'color.required' => 'Please select a color.',
            'color.in' => 'The selected color is invalid.',
        ];
    }
}
```

### Multiple Color Selection

```php
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePaletteRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'palette_colors' => [
                'required',
                'array',
                'min:2',
                'max:5'
            ],
            'palette_colors.*' => [
                'required',
                'string',
                Rule::in([
                    'blue', 'azure', 'indigo', 'purple', 'pink', 'red',
                    'orange', 'yellow', 'lime', 'green', 'teal', 'cyan'
                ])
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'palette_colors.required' => 'Please select at least one color.',
            'palette_colors.min' => 'Please select at least 2 colors.',
            'palette_colors.max' => 'You can select up to 5 colors.',
            'palette_colors.*.in' => 'One or more selected colors are invalid.',
        ];
    }
}
```

## Accessibility

### Keyboard Navigation

The color check component supports full keyboard navigation:

- **Tab**: Move focus between color swatches
- **Space** or **Enter**: Select the focused color
- **Arrow keys**: Navigate between color options in the same group

### Screen Reader Support

Provide descriptive labels for screen readers:

```blade
<div class="form-label" id="theme-color-label">
    Choose Theme Color
    <span class="form-help" data-bs-toggle="tooltip" title="This color will be used throughout your dashboard">?</span>
</div>
<div class="row g-2" role="radiogroup" aria-labelledby="theme-color-label">
    <div class="col-auto">
        <label class="form-colorinput">
            <input
                type="radio"
                name="theme_color"
                value="blue"
                class="form-colorinput-input"
                aria-label="Blue theme"
            />
            <span class="form-colorinput-color bg-blue"></span>
        </label>
    </div>
    <div class="col-auto">
        <label class="form-colorinput">
            <input
                type="radio"
                name="theme_color"
                value="green"
                class="form-colorinput-input"
                aria-label="Green theme"
            />
            <span class="form-colorinput-color bg-green"></span>
        </label>
    </div>
</div>
```

## Best Practices

1. **Limit Options**: Don't overwhelm users with too many color choices. 6-12 colors is usually sufficient.

2. **Provide Context**: Add labels or descriptions to help users understand what the color selection affects.

3. **Show Preview**: Display a preview of how the selected color will be used in the interface.

4. **Group Related Colors**: Organize colors logically (e.g., warm colors, cool colors, neutrals).

5. **Consider Accessibility**: Ensure sufficient contrast between colors and provide text labels for screen readers.

6. **Default Selection**: Pre-select a sensible default color to guide users.

7. **Disabled States**: Clearly indicate when colors are unavailable (e.g., out of stock).

8. **Mobile Friendly**: Ensure color swatches are large enough for touch targets (minimum 44x44px).

9. **Validation**: Always validate color selections on the server side.

10. **Consistent Sizing**: Use consistent swatch sizes within the same context.

## Related Components

- [Radio](/docs/components/radio) - Single selection inputs
- [Checkbox](/docs/components/checkbox) - Multiple selection inputs
- [Form Group](/docs/components/form-group) - Form field containers
- [Button Group](/docs/components/button-group) - Grouped button controls
