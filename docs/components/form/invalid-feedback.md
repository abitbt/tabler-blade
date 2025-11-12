# Form Invalid Feedback

The Invalid Feedback component displays Bootstrap-styled error validation messages for form fields. It provides deep integration with Laravel's validation system, the `$errors` bag, and the `@error` directive.

## Key Features

- **Laravel Integration**: Native support for Laravel's `$errors` bag and `@error` directive
- **Bootstrap Styling**: Uses Bootstrap's `.invalid-feedback` class for consistent error styling
- **Automatic Display**: Automatically shows/hides based on validation state
- **Form Request Support**: Seamlessly works with Laravel Form Request validation
- **ARIA Support**: Built-in accessibility with `aria-live`, `aria-describedby`, and `aria-invalid`
- **Array Validation**: Handles validation errors for array and nested fields

## Basic Usage

```blade
<x-tabler::form.label for="email">Email</x-tabler::form.label>
<x-tabler::form.input
    type="email"
    name="email"
    id="email"
    @class(['is-invalid' => $errors->has('email')])
/>
@error('email')
    <x-tabler::form.invalid-feedback>
        {{ $message }}
    </x-tabler::form.invalid-feedback>
@enderror
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `message` | `string` | `null` | Error message to display |
| `id` | `string` | `null` | ID attribute for the feedback element |
| `class` | `string` | `''` | Additional CSS classes to apply |
| `style` | `string` | `null` | Inline styles to apply |
| `aria-live` | `string` | `'polite'` | ARIA live region politeness setting |

## Slots

| Slot | Description |
|------|-------------|
| Default | The error message content (can include HTML) |

## CSS Classes

| Class | Purpose |
|-------|---------|
| `.invalid-feedback` | Base class that styles the error message (red text, small font) |
| `.d-block` | Display block utility (shown when field has `.is-invalid`) |

**Note**: The `.invalid-feedback` class is only visible when the associated form field has the `.is-invalid` class applied.

## Laravel Integration

### Using @error Directive

```blade
@error('email')
    <x-tabler::form.invalid-feedback>
        {{ $message }}
    </x-tabler::form.invalid-feedback>
@enderror
```

### Working with $errors Bag

```blade
@if($errors->has('email'))
    <x-tabler::form.invalid-feedback>
        {{ $errors->first('email') }}
    </x-tabler::form.invalid-feedback>
@endif
```

### Form Request Validation

```php
// Form Request
public function rules()
{
    return [
        'email' => 'required|email|unique:users',
    ];
}

public function messages()
{
    return [
        'email.required' => 'Email address is required.',
        'email.email' => 'Please provide a valid email address.',
        'email.unique' => 'This email is already registered.',
    ];
}
```

Display in view:

```blade
<x-tabler::form.input
    type="email"
    name="email"
    @class(['is-invalid' => $errors->has('email')])
/>
@error('email')
    <x-tabler::form.invalid-feedback>
        {{ $message }}
    </x-tabler::form.invalid-feedback>
@enderror
```

## Accessibility

The component follows WCAG 2.1 Level AA guidelines:

```blade
<x-tabler::form.input
    type="email"
    name="email"
    id="email"
    aria-describedby="email-error"
    aria-invalid="{{ $errors->has('email') ? 'true' : 'false' }}"
    @class(['is-invalid' => $errors->has('email')])
/>
@error('email')
    <x-tabler::form.invalid-feedback
        id="email-error"
        aria-live="polite"
    >
        {{ $message }}
    </x-tabler::form.invalid-feedback>
@enderror
```

## Browser Compatibility

Compatible with all modern browsers that support Bootstrap 5:
- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+

## Related Components

- **[Form Valid Feedback](./valid-feedback.md)** - Success validation messages
- **[Form Label](./label.md)** - Labels for form fields
- **[Form Input](./input.md)** - Text input fields
- **[Form Help](./help.md)** - Help text for form fields
- **[Form Hint](./hint.md)** - Hint text for form fields

## Source

**File Location:** `tabler-blade/resources/views/components/form/invalid-feedback.blade.php`

## Changelog

### Version 1.0.0
- Initial release
- Bootstrap `.invalid-feedback` class support
- Laravel `$errors` bag integration
- `@error` directive compatibility
- ARIA accessibility features
