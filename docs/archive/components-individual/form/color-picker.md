# Color Picker

> HTML5 color picker component for selecting colors with validation support and seamless Laravel integration.

## Overview

The Color Picker component provides a native HTML5 color input field with automatic Laravel validation integration, old input retrieval, and error handling. It renders the browser's native color picker interface, providing a consistent user experience for selecting colors in hex format. The component is perfect for theme customization, brand color selection, UI customization, and any feature requiring color input from users.

**Key Features:**
- Laravel validation integration (automatic error display)
- Old input retrieval (auto-populated after validation failures)
- Native browser color picker UI
- Hex color format support
- Help text and error messages
- Required field indicator
- Auto-generated IDs
- Accessible labels and ARIA attributes
- Optional wrapper control
- Disabled and readonly states
- Compatible with Livewire and Alpine.js
- Lightweight and fast

**Use Case:** Use color picker for theme settings, brand colors, UI customization, highlighting colors, category colors, tag colors, text colors, background colors, and any user interface that requires color selection. The component integrates seamlessly with Laravel's validation system for hex color format validation.

---

## Basic Usage

```blade
<x-tabler::forms.color-picker
    name="primary_color"
    label="Primary Color" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name (used for validation, old input, and ID generation) |
| `id` | `string\|null` | `null` | Color picker ID (auto-generated from name if not provided) |
| `value` | `string` | `'#066fd1'` | Default color value in hex format (e.g., `#ff0000`) |
| `label` | `string\|null` | `null` | Field label text |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div for spacing |
| `class` | `string` | `''` | Additional CSS classes for color picker element |

**Note:** All additional HTML attributes are passed through to the color picker input element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Not used for color picker component |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Sizing:**
- `form-control-sm` - Small color picker
- `form-control-lg` - Large color picker

**Color Picker Specific:**
- `form-control-color` - Applied by default, provides consistent sizing

**Width Utilities:**
- `w-auto`, `w-25`, `w-50`, `w-75`, `w-100` - Width percentages

---

## Examples

### Basic Example

```blade
<x-tabler::forms.color-picker
    name="brand_color"
    label="Brand Color" />
```

**Output:** A standard color picker with label and Tabler's default blue color (#066fd1)

---

### With Custom Default Color

```blade
<x-tabler::forms.color-picker
    name="background_color"
    label="Background Color"
    value="#ffffff" />
```

---

### With Dark Default Color

```blade
<x-tabler::forms.color-picker
    name="text_color"
    label="Text Color"
    value="#000000" />
```

---

### Required Field

```blade
<x-tabler::forms.color-picker
    name="primary_color"
    label="Primary Color"
    required />
```

**Note:** Required fields automatically display a red asterisk (*) next to the label.

---

### Without Wrapper

```blade
{{-- Useful for custom layouts or grid systems --}}
<div class="row">
    <div class="col-md-4 mb-3">
        <x-tabler::forms.color-picker
            name="primary"
            label="Primary"
            :wrapper="false" />
    </div>
    <div class="col-md-4 mb-3">
        <x-tabler::forms.color-picker
            name="secondary"
            label="Secondary"
            :wrapper="false" />
    </div>
    <div class="col-md-4 mb-3">
        <x-tabler::forms.color-picker
            name="accent"
            label="Accent"
            :wrapper="false" />
    </div>
</div>
```

---

### Small Size

```blade
<x-tabler::forms.color-picker
    name="highlight_color"
    label="Highlight Color"
    class="form-control-sm" />
```

---

### Large Size

```blade
<x-tabler::forms.color-picker
    name="theme_color"
    label="Theme Color"
    class="form-control-lg" />
```

---

### Disabled State

```blade
<x-tabler::forms.color-picker
    name="system_color"
    label="System Color"
    value="#066fd1"
    disabled />
```

---

### Read-Only State

```blade
<x-tabler::forms.color-picker
    name="preset_color"
    label="Preset Color"
    value="#ff5733"
    readonly />
```

---

### Custom Width

```blade
<x-tabler::forms.color-picker
    name="accent"
    label="Accent Color"
    class="w-50" />
```

---

### With Custom ID

```blade
<x-tabler::forms.color-picker
    id="myColorPicker"
    name="custom_color"
    label="Custom Color" />
```

---

### Inline Color Pickers

```blade
<div class="d-flex gap-3">
    <x-tabler::forms.color-picker
        name="bg_color"
        label="Background"
        class="w-auto"
        :wrapper="false" />

    <x-tabler::forms.color-picker
        name="fg_color"
        label="Foreground"
        class="w-auto"
        :wrapper="false" />
</div>
```

---

### Array Input Names

```blade
<x-tabler::forms.color-picker
    name="colors[primary]"
    label="Primary Color"
    value="#066fd1" />

<x-tabler::forms.color-picker
    name="colors[secondary]"
    label="Secondary Color"
    value="#6c757d" />

<x-tabler::forms.color-picker
    name="colors[success]"
    label="Success Color"
    value="#28a745" />
```

---

## Laravel Integration

### Basic Form

```blade
<form method="POST" action="{{ route('theme.store') }}">
    @csrf

    <x-tabler::forms.color-picker
        name="primary_color"
        label="Primary Color"
        required />

    <x-tabler::forms.color-picker
        name="secondary_color"
        label="Secondary Color"
        required />

    <x-tabler::button type="submit" color="primary">
        Save Theme
    </x-tabler::button>
</form>
```

---

### With Validation Errors

The component **automatically retrieves and displays validation errors** from Laravel's `$errors` bag:

```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    {{-- Error automatically displayed if validation fails --}}
    <x-tabler::forms.color-picker
        name="brand_color"
        label="Brand Color"
        :value="old('brand_color', $settings->brand_color)" />

    <x-tabler::button type="submit" color="primary">
        Update Settings
    </x-tabler::button>
</form>
```

**Controller:**
```php
public function update(Request $request)
{
    $request->validate([
        'brand_color' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
    ]);

    // If validation fails, errors automatically appear in form
}
```

---

### With Old Input

The component **automatically retrieves old input** after failed validation:

```blade
{{-- Old input automatically used if available --}}
<x-tabler::forms.color-picker
    name="theme_color"
    label="Theme Color"
    :value="old('theme_color', $theme->color ?? '#066fd1')" />
```

**How it works:**
1. User submits form
2. Validation fails
3. User redirected back
4. Component uses `old('theme_color')` if available
5. Falls back to provided `value` prop

---

### Hex Color Validation

```blade
<form method="POST" action="{{ route('brand.store') }}">
    @csrf

    <x-tabler::forms.color-picker
        name="primary"
        label="Primary Brand Color"
        :value="old('primary')"
        required />

    <x-tabler::forms.color-picker
        name="secondary"
        label="Secondary Brand Color"
        :value="old('secondary')"
        required />

    <x-tabler::button type="submit" color="primary">
        Save Brand Colors
    </x-tabler::button>
</form>
```

**Form Request:**
```php
class StoreBrandRequest extends FormRequest
{
    public function rules()
    {
        return [
            'primary' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
            'secondary' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
        ];
    }

    public function messages()
    {
        return [
            'primary.regex' => 'The primary color must be a valid hex color (e.g., #ff0000).',
            'secondary.regex' => 'The secondary color must be a valid hex color (e.g., #00ff00).',
        ];
    }
}
```

---

### Custom Validation Rules

```php
// In your controller
$request->validate([
    'background_color' => [
        'required',
        'regex:/^#[a-fA-F0-9]{6}$/',
        function ($attribute, $value, $fail) {
            // Ensure color is not too dark (for readability)
            $rgb = sscanf($value, "#%02x%02x%02x");
            $brightness = (($rgb[0] * 299) + ($rgb[1] * 587) + ($rgb[2] * 114)) / 1000;

            if ($brightness < 128) {
                $fail('The background color must be light for better readability.');
            }
        },
    ],
    'text_color' => [
        'required',
        'regex:/^#[a-fA-F0-9]{6}$/',
        'different:background_color',
    ],
]);
```

---

### With Model Binding

```blade
<form method="POST" action="{{ route('themes.update', $theme) }}">
    @csrf
    @method('PUT')

    <x-tabler::forms.color-picker
        name="primary"
        label="Primary Color"
        :value="old('primary', $theme->primary)" />

    <x-tabler::forms.color-picker
        name="secondary"
        label="Secondary Color"
        :value="old('secondary', $theme->secondary)" />

    <x-tabler::forms.color-picker
        name="accent"
        label="Accent Color"
        :value="old('accent', $theme->accent)" />

    <x-tabler::button type="submit" color="primary">
        Update Theme
    </x-tabler::button>
</form>
```

---

### Multiple Color Scheme

```blade
<form method="POST" action="{{ route('color-scheme.store') }}">
    @csrf

    <h4>Primary Colors</h4>
    <div class="row">
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="colors[primary]"
                label="Primary"
                :value="old('colors.primary', '#066fd1')" />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="colors[primary_hover]"
                label="Primary Hover"
                :value="old('colors.primary_hover', '#0556b3')" />
        </div>
    </div>

    <h4>Secondary Colors</h4>
    <div class="row">
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="colors[secondary]"
                label="Secondary"
                :value="old('colors.secondary', '#6c757d')" />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="colors[secondary_hover]"
                label="Secondary Hover"
                :value="old('colors.secondary_hover', '#5a6268')" />
        </div>
    </div>

    <x-tabler::button type="submit" color="primary">
        Save Color Scheme
    </x-tabler::button>
</form>
```

**Validation:**
```php
$request->validate([
    'colors' => 'required|array',
    'colors.primary' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
    'colors.primary_hover' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
    'colors.secondary' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
    'colors.secondary_hover' => 'required|regex:/^#[a-fA-F0-9]{6}$/',
]);
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to/from color picker
- **Shift+Tab:** Moves focus backward
- **Enter/Space:** Opens native color picker dialog
- **Escape:** Closes color picker dialog (browser dependent)

### ARIA Attributes
- `id` and `for`: Automatically associated for label/input
- `aria-required`: Applied when `required` prop is true
- Label properly associated via `for`/`id` attributes

### Screen Reader Support
- Label is properly associated via `for`/`id` attributes
- Required fields announced as "required"
- Color values announced in hex format
- Native browser color picker provides additional accessibility

### Best Practices
- Always provide a `label` for context
- Mark required fields with `required` prop
- Consider adding help text for color format expectations
- Ensure sufficient color contrast for UI elements
- Provide visual preview of selected color when possible

**Example:**
```blade
<x-tabler::forms.color-picker
    name="brand_color"
    label="Brand Color"
    required
    aria-describedby="brand-color-help" />
<small id="brand-color-help" class="form-hint">
    Choose your primary brand color
</small>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern browser with HTML5 `<input type="color">` support

### Supported Browsers
- Chrome 20+ ✅
- Firefox 29+ ✅
- Safari 12.1+ ✅
- Edge 14+ ✅
- Opera 12+ ✅
- IE 11 ❌ (no native color picker support)

### Native UI Variations
Different browsers display different native color picker interfaces:
- **Chrome/Edge:** Color palette with custom color option
- **Firefox:** Color palette with eyedropper tool
- **Safari:** macOS native color picker panel

### Known Issues
- Color picker appearance varies significantly across browsers
- No native support in IE 11 (falls back to text input)
- Mobile browsers may show simplified color picker
- Some browsers don't support transparency/alpha channel

### Fallback for Unsupported Browsers
```blade
{{-- Add text input fallback for older browsers --}}
<x-tabler::forms.color-picker
    name="color"
    label="Color"
    pattern="#[a-fA-F0-9]{6}"
    title="Enter a hex color (e.g., #ff0000)" />
```

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::forms.color-picker
    wire:model="primaryColor"
    name="primary_color"
    label="Primary Color" />

{{-- With live binding --}}
<x-tabler::forms.color-picker
    wire:model.live="accentColor"
    name="accent_color"
    label="Accent Color" />

{{-- With blur binding --}}
<x-tabler::forms.color-picker
    wire:model.blur="backgroundColor"
    name="background_color"
    label="Background Color" />

{{-- Live color preview --}}
<div class="card" style="background-color: {{ $backgroundColor }}">
    <div class="card-body" style="color: {{ $textColor }}">
        Preview your color scheme
    </div>
</div>
```

**Alpine.js:**
```blade
<div x-data="{ color: '#066fd1' }">
    <x-tabler::forms.color-picker
        name="demo_color"
        label="Demo Color"
        x-model="color"
        @input="console.log('Color changed:', color)" />

    <div class="mt-3 p-4 rounded" :style="`background-color: ${color}`">
        <p class="text-white mb-0">Selected color: <span x-text="color"></span></p>
    </div>
</div>
```

**Standard JavaScript:**
```blade
<x-tabler::forms.color-picker
    id="colorPicker"
    name="color"
    label="Color"
    onchange="handleColorChange(this.value)"
    oninput="handleColorInput(this.value)" />

<div id="colorPreview" style="width: 100px; height: 100px; border-radius: 4px;"></div>

<script>
function handleColorChange(color) {
    console.log('Color selected:', color);
    document.getElementById('colorPreview').style.backgroundColor = color;
}

function handleColorInput(color) {
    // Real-time preview while user is selecting
    document.getElementById('colorPreview').style.backgroundColor = color;
}
</script>
```

**Real-time Color Preview:**
```blade
<div x-data="{
    bgColor: '#ffffff',
    textColor: '#000000',
    get contrast() {
        // Calculate contrast ratio
        const bg = this.hexToRgb(this.bgColor);
        const fg = this.hexToRgb(this.textColor);
        const bgLuminance = this.luminance(bg);
        const fgLuminance = this.luminance(fg);
        const ratio = (Math.max(bgLuminance, fgLuminance) + 0.05) / (Math.min(bgLuminance, fgLuminance) + 0.05);
        return ratio.toFixed(2);
    },
    hexToRgb(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16) / 255,
            g: parseInt(result[2], 16) / 255,
            b: parseInt(result[3], 16) / 255
        } : null;
    },
    luminance(rgb) {
        const a = [rgb.r, rgb.g, rgb.b].map(v => {
            return v <= 0.03928 ? v / 12.92 : Math.pow((v + 0.055) / 1.055, 2.4);
        });
        return a[0] * 0.2126 + a[1] * 0.7152 + a[2] * 0.0722;
    }
}">
    <div class="row">
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="bg_color"
                label="Background Color"
                x-model="bgColor" />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.color-picker
                name="text_color"
                label="Text Color"
                x-model="textColor" />
        </div>
    </div>

    <div class="card mt-3" :style="`background-color: ${bgColor}`">
        <div class="card-body" :style="`color: ${textColor}`">
            <h3>Preview</h3>
            <p>This is how your text will look with these colors.</p>
            <p class="mb-0">
                <strong>Contrast Ratio:</strong> <span x-text="contrast"></span>:1
                <span x-show="contrast >= 4.5" class="badge bg-success ms-2">Good</span>
                <span x-show="contrast < 4.5" class="badge bg-danger ms-2">Poor</span>
            </p>
        </div>
    </div>
</div>
```

---

## Troubleshooting

### Common Issues

**Issue: Color picker not showing native UI**
- ✅ Ensure `type="color"` attribute is present
- ✅ Check browser supports HTML5 color input
- ✅ Verify no CSS is hiding the native control
- ✅ Test in different browser for confirmation

**Issue: Default color not displaying**
- ✅ Ensure `value` is valid hex format (`#rrggbb`)
- ✅ Use uppercase or lowercase consistently
- ✅ Include the `#` symbol in the value
- ✅ Verify 6-digit hex code (not 3-digit shorthand)

**Issue: Old input not working**
- ✅ Use `:value="old('name', $default)"` syntax
- ✅ Ensure form redirects back on validation failure
- ✅ Check session flash data is enabled
- ✅ Verify middleware includes session handling

**Issue: Validation failing for valid colors**
- ✅ Use correct regex: `/^#[a-fA-F0-9]{6}$/`
- ✅ Ensure hex values include `#` prefix
- ✅ Check for extra whitespace in validation
- ✅ Validate case-insensitive (`[a-fA-F]` not just `[A-F]`)

**Issue: Color picker too small/large**
- ✅ Use `form-control-sm` or `form-control-lg` classes
- ✅ Check Bootstrap CSS is properly loaded
- ✅ Verify no conflicting custom CSS
- ✅ Browser native size may vary

**Issue: Required asterisk not showing**
- ✅ Set `required` prop to `true`
- ✅ Ensure label is provided
- ✅ Check CSS for `.text-danger` styling

**Issue: Field not submitting value**
- ✅ Ensure `name` attribute is set
- ✅ Check field is inside `<form>` tag
- ✅ Verify field is not disabled
- ✅ Check form method matches route

**Issue: Color picker shows text input (IE11)**
- ✅ This is expected behavior in IE11
- ✅ Add `pattern` attribute for validation
- ✅ Consider JavaScript polyfill for better UX
- ✅ Use placeholder to guide users

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check `$errors` bag contents: `{{ $errors->toJson() }}`
- Verify form data in network tab
- Test color value format: `{{ $colorValue }}`
- Check Laravel logs for validation errors
- Use browser console to inspect color value

---

## Real-World Examples

### Example 1: Theme Customizer

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Customize Theme</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('theme.update') }}">
            @csrf
            @method('PUT')

            <h4>Primary Colors</h4>
            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="theme[primary]"
                        label="Primary Color"
                        :value="old('theme.primary', $theme->primary ?? '#066fd1')"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="theme[primary_dark]"
                        label="Primary Dark"
                        :value="old('theme.primary_dark', $theme->primary_dark ?? '#0556b3')"
                        required />
                </div>
            </div>

            <h4>Secondary Colors</h4>
            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="theme[secondary]"
                        label="Secondary Color"
                        :value="old('theme.secondary', $theme->secondary ?? '#6c757d')"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="theme[accent]"
                        label="Accent Color"
                        :value="old('theme.accent', $theme->accent ?? '#fd7e14')"
                        required />
                </div>
            </div>

            <h4>Semantic Colors</h4>
            <div class="row">
                <div class="col-md-4">
                    <x-tabler::forms.color-picker
                        name="theme[success]"
                        label="Success"
                        :value="old('theme.success', $theme->success ?? '#28a745')" />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.color-picker
                        name="theme[warning]"
                        label="Warning"
                        :value="old('theme.warning', $theme->warning ?? '#ffc107')" />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.color-picker
                        name="theme[danger]"
                        label="Danger"
                        :value="old('theme.danger', $theme->danger ?? '#dc3545')" />
                </div>
            </div>

            <div class="btn-list">
                <x-tabler::button type="submit" color="primary">
                    Save Theme
                </x-tabler::button>
                <x-tabler::button
                    type="button"
                    variant="outline"
                    onclick="window.location.reload()">
                    Reset
                </x-tabler::button>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** Complete theme customization with preview

---

### Example 2: Email Template Builder

```blade
<div class="card" x-data="{
    bgColor: '{{ old('email.background', $template->background ?? '#ffffff') }}',
    headerBg: '{{ old('email.header_background', $template->header_background ?? '#066fd1') }}',
    headerText: '{{ old('email.header_text', $template->header_text ?? '#ffffff') }}',
    bodyText: '{{ old('email.body_text', $template->body_text ?? '#333333') }}',
    linkColor: '{{ old('email.link_color', $template->link_color ?? '#066fd1') }}'
}">
    <div class="card-header">
        <h3 class="card-title">Email Template Colors</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('email-templates.update', $template) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="email[background]"
                        label="Background Color"
                        x-model="bgColor"
                        required />

                    <x-tabler::forms.color-picker
                        name="email[header_background]"
                        label="Header Background"
                        x-model="headerBg"
                        required />

                    <x-tabler::forms.color-picker
                        name="email[header_text]"
                        label="Header Text"
                        x-model="headerText"
                        required />

                    <x-tabler::forms.color-picker
                        name="email[body_text]"
                        label="Body Text"
                        x-model="bodyText"
                        required />

                    <x-tabler::forms.color-picker
                        name="email[link_color]"
                        label="Link Color"
                        x-model="linkColor"
                        required />

                    <x-tabler::button type="submit" color="primary">
                        Save Template
                    </x-tabler::button>
                </div>

                <div class="col-md-6">
                    <div class="border rounded" :style="`background-color: ${bgColor}`">
                        <div class="p-4 rounded-top" :style="`background-color: ${headerBg}; color: ${headerText}`">
                            <h3 class="mb-0">Email Header</h3>
                        </div>
                        <div class="p-4" :style="`color: ${bodyText}`">
                            <p>This is a preview of your email template with the colors you've selected.</p>
                            <p>
                                <a href="#" :style="`color: ${linkColor}`">This is a sample link</a>
                            </p>
                            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** Email template customization with live preview

---

### Example 3: Brand Color Manager

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Brand Colors</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('brand.store') }}">
            @csrf

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Color Name</th>
                            <th>Color Value</th>
                            <th>Preview</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(['primary', 'secondary', 'success', 'info', 'warning', 'danger'] as $colorName)
                        <tr x-data="{ color: '{{ old('colors.' . $colorName, $colors[$colorName] ?? '#066fd1') }}' }">
                            <td>
                                <label class="form-label mb-0">
                                    {{ ucfirst($colorName) }}
                                </label>
                            </td>
                            <td>
                                <x-tabler::forms.color-picker
                                    name="colors[{{ $colorName }}]"
                                    x-model="color"
                                    :wrapper="false"
                                    required />
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div
                                        class="rounded"
                                        style="width: 50px; height: 30px;"
                                        :style="`background-color: ${color}`">
                                    </div>
                                    <code class="small" x-text="color"></code>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <x-tabler::button type="submit" color="primary">
                Save Brand Colors
            </x-tabler::button>
        </form>
    </div>
</div>
```

**Use Case:** Brand color palette management with preview swatches

---

### Example 4: Category Color Coding

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Category Settings</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <x-tabler::forms.input
                name="name"
                label="Category Name"
                :value="old('name', $category->name)"
                required />

            <x-tabler::forms.color-picker
                name="color"
                label="Category Color"
                :value="old('color', $category->color ?? '#066fd1')"
                required />
            <small class="form-hint">
                This color will be used to identify items in this category
            </small>

            <div class="mt-3 p-3 border rounded">
                <strong>Preview:</strong>
                <div class="mt-2">
                    <span
                        class="badge"
                        style="background-color: {{ old('color', $category->color ?? '#066fd1') }}">
                        {{ old('name', $category->name) }}
                    </span>
                </div>
            </div>

            <x-tabler::button type="submit" color="primary" class="mt-3">
                Update Category
            </x-tabler::button>
        </form>
    </div>
</div>
```

**Use Case:** Category color assignment for visual organization

---

### Example 5: Chart Color Configuration

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Chart Color Scheme</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('chart-settings.update') }}">
            @csrf
            @method('PUT')

            <p class="text-muted">Define colors for your data visualization charts</p>

            <h4>Data Series Colors</h4>
            @for($i = 1; $i <= 5; $i++)
            <x-tabler::forms.color-picker
                name="chart_colors[{{ $i }}]"
                label="Series {{ $i }}"
                :value="old('chart_colors.' . $i, $chartColors[$i] ?? '#066fd1')" />
            @endfor

            <h4>Special Colors</h4>
            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="chart_colors[grid]"
                        label="Grid Lines"
                        :value="old('chart_colors.grid', $chartColors['grid'] ?? '#e9ecef')" />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.color-picker
                        name="chart_colors[text]"
                        label="Text & Labels"
                        :value="old('chart_colors.text', $chartColors['text'] ?? '#495057')" />
                </div>
            </div>

            <x-tabler::button type="submit" color="primary">
                Save Chart Colors
            </x-tabler::button>
        </form>
    </div>
</div>
```

**Use Case:** Chart and data visualization color configuration

---

## Performance Considerations

### Component Weight
- Base component: ~150-200 bytes rendered
- With wrapper: +50 bytes (div wrapper)
- Minimal JavaScript required (browser native)
- No external dependencies

### Best Practices
- Native browser implementation is lightweight
- No additional JavaScript libraries needed
- Use hex format for consistency
- Cache color preferences when possible
- Validate on server side always

### Optimization Tips
- Store colors in database as hex strings
- Cache compiled color schemes
- Use CSS variables for theme colors
- Minimize color picker instances on complex forms
- Consider color palette preset options

---

## Notes

- `name` prop is recommended for Laravel integration
- Old input automatically overrides `value` prop via `old()` helper
- Default value is Tabler's primary blue (`#066fd1`)
- Color format is always hex with 6 digits (`#rrggbb`)
- Browser native UI provides the picker interface
- IDs auto-generated from field names
- Wrapper can be disabled for custom layouts
- Component handles `for`/`id` association automatically
- No alpha/transparency channel support in HTML5 color input
- Consider adding visual color preview for better UX

---

## Related Components

- [Input](./input.md) - Single-line text input
- [Select](./select.md) - Dropdown selection
- [Textarea](../form/textarea.md) - Multi-line text input
- [Checkbox](./checkbox.md) - Checkbox input
- [Label](./label.md) - Standalone label component
- [Button](../button.md) - Form submission buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/color-picker.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Laravel validation integration and native HTML5 color picker support
