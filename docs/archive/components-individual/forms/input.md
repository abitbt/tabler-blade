# Input

> Flexible text input with label, validation, icons, and full Laravel integration.

## Overview

The Input component provides a feature-rich text input field with automatic Laravel validation integration, old input retrieval, error handling, and accessibility features. It supports various input types, icons, loading states, and multiple size variants. The component automatically retrieves validation errors and old input values, making form handling seamless.

**Key Features:**
- Laravel validation integration (automatic error display)
- Old input retrieval (auto-populated after validation failures)
- Icon support (leading or trailing)
- Loading state with spinner
- Help text and error messages
- Multiple input types (text, email, password, number, etc.)
- Size variants (sm, lg)
- Required field indicator
- Auto-generated IDs
- Accessible labels and ARIA attributes
- Optional wrapper control

**Use Case:** Use input components for all text-based form fields including emails, passwords, names, search boxes, and more. The component handles Laravel validation automatically, displaying errors and preserving user input on validation failures.

---

## Basic Usage

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    type="email"
    required />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `'text'` | Input type: `text`, `email`, `password`, `number`, `tel`, `url`, `search`, `date`, `time`, `datetime-local`, `month`, `week`, `color`, etc. |
| `name` | `string\|null` | `null` | Field name (used for validation, old input, and ID generation) |
| `id` | `string\|null` | `null` | Input ID (auto-generated from name if not provided) |
| `value` | `mixed\|null` | `null` | Field value (overridden by old input if available) |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above input |
| `error` | `string\|null` | `null` | Error message (overrides automatic Laravel validation errors) |
| `required` | `bool` | `false` | Mark field as required (adds asterisk to label) |
| `disabled` | `bool` | `false` | Disable field |
| `readonly` | `bool` | `false` | Make field read-only |
| `size` | `string\|null` | `null` | Size: `sm`, `lg` (default is standard) |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `iconPosition` | `string` | `'end'` | Icon position: `start` (left), `end` (right) |
| `loading` | `bool` | `false` | Show loading spinner instead of icon |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div for spacing |
| `class` | `string` | `''` | Additional CSS classes for input element |

**Note:** All additional HTML attributes are passed through to the input element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Not used for input component |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Input States:**
- `is-valid` - Valid state styling (green border)
- `is-invalid` - Invalid state styling (auto-applied on error)

**Input Styles:**
- `form-control-light` - Light background variant
- `form-control-dark` - Dark background variant
- `form-control-rounded` - Extra rounded corners
- `form-control-flush` - Remove background and borders
- `form-control-plaintext` - Plain text style (no border)

**Sizes:**
- `form-control-sm` - Small input (also via `size="sm"`)
- `form-control-lg` - Large input (also via `size="lg"`)

**Width:**
- `w-auto`, `w-25`, `w-50`, `w-75`, `w-100` - Width percentages

---

## Examples

### Basic Example

```blade
<x-tabler::forms.input
    name="username"
    label="Username" />
```

**Output:** A standard text input with label and automatic error handling

---

### With Value

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    type="email"
    :value="$user->email" />
```

---

### With Placeholder

```blade
<x-tabler::forms.input
    name="phone"
    label="Phone Number"
    type="tel"
    placeholder="(555) 123-4567" />
```

---

### Required Field

```blade
<x-tabler::forms.input
    name="full_name"
    label="Full Name"
    required />
```

**Note:** Required fields automatically display a red asterisk (*) next to the label.

---

### With Help Text

```blade
<x-tabler::forms.input
    name="password"
    label="Password"
    type="password"
    help="Must be at least 8 characters long"
    required />
```

---

### With Icon

```blade
{{-- Trailing icon (default) --}}
<x-tabler::forms.input
    name="email"
    label="Email"
    type="email"
    icon="mail" />

{{-- Leading icon --}}
<x-tabler::forms.input
    name="search"
    label="Search"
    icon="search"
    iconPosition="start"
    placeholder="Search..." />
```

---

### With Loading State

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    :loading="$checking"
    help="Checking availability..." />
```

---

### Password Input

```blade
<x-tabler::forms.input
    name="password"
    label="Password"
    type="password"
    icon="lock"
    required />

<x-tabler::forms.input
    name="password_confirmation"
    label="Confirm Password"
    type="password"
    icon="lock"
    required />
```

---

### Email Input

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    type="email"
    icon="mail"
    placeholder="you@example.com"
    required />
```

---

### Number Input

```blade
<x-tabler::forms.input
    name="age"
    label="Age"
    type="number"
    min="0"
    max="120" />

<x-tabler::forms.input
    name="price"
    label="Price"
    type="number"
    step="0.01"
    icon="currency-dollar" />
```

---

### Search Input

```blade
<x-tabler::forms.input
    name="q"
    label="Search"
    type="search"
    icon="search"
    iconPosition="start"
    placeholder="Search products..." />
```

---

### Size Variants

```blade
{{-- Small --}}
<x-tabler::forms.input
    name="code"
    label="Code"
    size="sm" />

{{-- Standard (default) --}}
<x-tabler::forms.input
    name="name"
    label="Name" />

{{-- Large --}}
<x-tabler::forms.input
    name="title"
    label="Title"
    size="lg" />
```

---

### Disabled State

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    :value="$user->username"
    disabled />
```

---

### Read-Only State

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    :value="$user->email"
    readonly />
```

---

### Without Wrapper

```blade
{{-- Useful for custom layouts or grid systems --}}
<div class="row">
    <div class="col-md-6 mb-3">
        <x-tabler::forms.input
            name="first_name"
            label="First Name"
            :wrapper="false" />
    </div>
    <div class="col-md-6 mb-3">
        <x-tabler::forms.input
            name="last_name"
            label="Last Name"
            :wrapper="false" />
    </div>
</div>
```

---

### Custom Width

```blade
<x-tabler::forms.input
    name="code"
    label="Verification Code"
    class="w-25"
    maxlength="6" />

<x-tabler::forms.input
    name="zip"
    label="ZIP Code"
    class="w-50" />
```

---

### Light Background Variant

```blade
<x-tabler::forms.input
    name="search"
    placeholder="Search..."
    class="form-control-light"
    icon="search" />
```

---

## Laravel Integration

### Basic Form

```blade
<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <x-tabler::forms.input
        name="name"
        label="Full Name"
        required />

    <x-tabler::forms.input
        name="email"
        label="Email Address"
        type="email"
        icon="mail"
        required />

    <x-tabler::forms.input
        name="password"
        label="Password"
        type="password"
        icon="lock"
        help="Minimum 8 characters"
        required />

    <x-tabler::button type="submit" color="primary">
        Create User
    </x-tabler::button>
</form>
```

---

### With Validation Errors

The component **automatically retrieves and displays validation errors** from Laravel's `$errors` bag:

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    {{-- Error automatically displayed if validation fails --}}
    <x-tabler::forms.input
        name="email"
        label="Email Address"
        type="email"
        :value="old('email', $user->email)" />

    <x-tabler::button type="submit" color="primary">
        Update Profile
    </x-tabler::button>
</form>
```

**Controller:**
```php
public function update(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:users,email,' . auth()->id(),
    ]);

    // If validation fails, errors automatically appear in form
}
```

---

### Manual Error Display

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    error="This username is already taken" />

{{-- Or with Laravel error --}}
<x-tabler::forms.input
    name="custom"
    label="Custom Field"
    :error="$errors->first('custom')" />
```

---

### With Old Input

The component **automatically retrieves old input** after failed validation:

```blade
{{-- Old input automatically used if available --}}
<x-tabler::forms.input
    name="title"
    label="Title"
    :value="old('title', $post->title ?? '')" />
```

**How it works:**
1. User submits form
2. Validation fails
3. User redirected back
4. Component uses `old('title')` if available
5. Falls back to provided `value` prop

---

### With Form Request

```blade
<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <x-tabler::forms.input
        name="title"
        label="Post Title"
        :value="old('title')"
        required />

    <x-tabler::forms.input
        name="slug"
        label="Slug"
        :value="old('slug')"
        help="URL-friendly version of the title"
        icon="link"
        required />

    <x-tabler::button type="submit" color="primary">
        Create Post
    </x-tabler::button>
</form>
```

**Form Request:**
```php
class StorePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts|alpha_dash',
        ];
    }

    public function messages()
    {
        return [
            'slug.alpha_dash' => 'The slug may only contain letters, numbers, dashes and underscores.',
        ];
    }
}
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to/from field
- **Shift+Tab:** Moves focus backward
- **Standard input interactions:** Type, delete, select, copy, paste

### ARIA Attributes
- `id` and `for`: Automatically associated for label/input
- `aria-invalid`: Applied when field has validation error
- `aria-required`: Applied when `required` prop is true
- `aria-describedby`: Links to help text and error messages

### Screen Reader Support
- Label is properly associated via `for`/`id` attributes
- Required fields announced as "required"
- Error messages announced when present
- Help text announced for context
- Icons include accessible attributes

### Best Practices
- Always provide a `label` (or `aria-label`)
- Use `help` text to provide additional context
- Mark required fields with `required` prop
- Ensure error messages are descriptive
- Maintain 4.5:1 contrast ratio for text

**Example:**
```blade
<x-tabler::forms.input
    name="phone"
    label="Phone Number"
    type="tel"
    help="Include area code for faster contact"
    required
    placeholder="(555) 123-4567" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon props
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Autofill styling may vary across browsers
- Icon alignment may differ slightly in older Firefox versions
- Placeholder opacity varies by browser
- Date/time inputs have different native UI across browsers

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::forms.input
    wire:model="search"
    name="search"
    label="Search"
    icon="search"
    placeholder="Type to search..." />

{{-- With debounce --}}
<x-tabler::forms.input
    wire:model.debounce.500ms="query"
    name="query"
    label="Search Query" />

{{-- With lazy binding --}}
<x-tabler::forms.input
    wire:model.lazy="title"
    name="title"
    label="Title" />

{{-- With live validation --}}
<x-tabler::forms.input
    wire:model.blur="username"
    name="username"
    label="Username"
    :loading="$checkingUsername"
    help="Checking availability..." />
```

**Alpine.js:**
```blade
<div x-data="{ value: '' }">
    <x-tabler::forms.input
        name="demo"
        label="Demo Field"
        x-model="value"
        @input="console.log(value)" />

    <p>Current value: <span x-text="value"></span></p>
</div>
```

**Standard JavaScript:**
```blade
<x-tabler::forms.input
    id="myField"
    name="field"
    label="Field"
    onchange="handleChange(this.value)"
    oninput="handleInput(this.value)" />

<script>
function handleChange(value) {
    console.log('Field changed:', value);
}

function handleInput(value) {
    console.log('Field input:', value);
}
</script>
```

---

## Troubleshooting

### Common Issues

**Issue: Validation errors not displaying**
- ✅ Ensure `name` prop matches validation rule key
- ✅ Check `$errors` bag is available in view
- ✅ Verify validation is running in controller
- ✅ Try passing error manually: `error="test error"`

**Issue: Old input not working**
- ✅ Use `:value="old('name', $default)"` syntax
- ✅ Ensure form redirects back on validation failure
- ✅ Check session flash data is enabled
- ✅ Verify middleware includes session handling

**Issue: Required asterisk not showing**
- ✅ Set `required` prop to `true`
- ✅ Ensure label is provided
- ✅ Check CSS for `.text-danger` styling

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Field not submitting value**
- ✅ Ensure `name` attribute is set
- ✅ Check field is inside `<form>` tag
- ✅ Verify field is not disabled
- ✅ Check form method matches route

**Issue: Auto-generated ID conflicts**
- ✅ Provide explicit `id` prop
- ✅ Ensure unique names for array inputs
- ✅ Check for duplicate field names

**Issue: Help text not visible**
- ✅ Verify `help` prop is set
- ✅ Check CSS for `.form-hint` styling
- ✅ Ensure Bootstrap CSS is loaded

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check `$errors` bag contents: `{{ $errors->toJson() }}`
- Verify form data in network tab
- Test with minimal example first
- Check Laravel logs for validation errors

---

## Real-World Examples

### Example 1: Login Form

```blade
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">Sign In</h3>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-tabler::forms.input
                name="email"
                label="Email Address"
                type="email"
                icon="mail"
                :value="old('email')"
                required
                autofocus />

            <x-tabler::forms.input
                name="password"
                label="Password"
                type="password"
                icon="lock"
                required />

            <div class="form-check mb-3">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember me</label>
            </div>

            <x-tabler::button
                type="submit"
                color="primary"
                class="w-100">
                Sign In
            </x-tabler::button>

            <div class="text-center mt-3">
                <a href="{{ route('password.request') }}" class="text-muted">
                    Forgot password?
                </a>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** User authentication form with email and password

---

### Example 2: Profile Update Form

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="first_name"
                        label="First Name"
                        :value="old('first_name', $user->first_name)"
                        required />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.input
                        name="last_name"
                        label="Last Name"
                        :value="old('last_name', $user->last_name)"
                        required />
                </div>
            </div>

            <x-tabler::forms.input
                name="email"
                label="Email Address"
                type="email"
                icon="mail"
                :value="old('email', $user->email)"
                help="We'll never share your email"
                required />

            <x-tabler::forms.input
                name="phone"
                label="Phone Number"
                type="tel"
                icon="phone"
                :value="old('phone', $user->phone)"
                placeholder="(555) 123-4567" />

            <x-tabler::forms.input
                name="website"
                label="Website"
                type="url"
                icon="world"
                :value="old('website', $user->website)"
                placeholder="https://example.com" />

            <div class="btn-list">
                <x-tabler::button type="submit" color="primary">
                    Save Changes
                </x-tabler::button>
                <x-tabler::button
                    type="button"
                    variant="outline"
                    onclick="history.back()">
                    Cancel
                </x-tabler::button>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** User profile edit form with multiple fields

---

### Example 3: Search Form with Livewire

```blade
<div class="card">
    <div class="card-body">
        <x-tabler::forms.input
            wire:model.debounce.300ms="search"
            name="search"
            label="Search Products"
            icon="search"
            iconPosition="start"
            placeholder="Enter product name..."
            :wrapper="false" />

        @if($search)
            <div class="list-group mt-3">
                @forelse($results as $product)
                    <a href="{{ route('products.show', $product) }}"
                       class="list-group-item list-group-item-action">
                        <div class="d-flex align-items-center">
                            <x-tabler::avatar
                                src="{{ $product->image_url }}"
                                size="sm"
                                alt="{{ $product->name }}" />
                            <div class="ms-3">
                                <div class="fw-bold">{{ $product->name }}</div>
                                <div class="text-muted">${{ $product->price }}</div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="list-group-item">
                        No products found
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
```

**Use Case:** Real-time search with live results

---

### Example 4: Registration Form

```blade
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">Create Account</h3>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-tabler::forms.input
                name="name"
                label="Full Name"
                icon="user"
                :value="old('name')"
                required
                autofocus />

            <x-tabler::forms.input
                name="email"
                label="Email Address"
                type="email"
                icon="mail"
                :value="old('email')"
                help="We'll send a verification email to this address"
                required />

            <x-tabler::forms.input
                name="username"
                label="Username"
                icon="at"
                :value="old('username')"
                help="Choose a unique username (letters, numbers, and underscores only)"
                required />

            <x-tabler::forms.input
                name="password"
                label="Password"
                type="password"
                icon="lock"
                help="Minimum 8 characters, include letters and numbers"
                required />

            <x-tabler::forms.input
                name="password_confirmation"
                label="Confirm Password"
                type="password"
                icon="lock"
                required />

            <div class="form-check mb-3">
                <input type="checkbox" name="terms" id="terms" class="form-check-input" required>
                <label for="terms" class="form-check-label">
                    I agree to the <a href="/terms">Terms of Service</a>
                </label>
            </div>

            <x-tabler::button
                type="submit"
                color="primary"
                class="w-100">
                Create Account
            </x-tabler::button>

            <div class="text-center mt-3">
                <span class="text-muted">Already have an account?</span>
                <a href="{{ route('login') }}">Sign in</a>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** User registration with validation and terms acceptance

---

## Performance Considerations

### Component Weight
- Base component: ~200-300 bytes rendered
- With icon: +2KB (icon SVG)
- With wrapper: +50 bytes (div wrapper)
- With validation: +100 bytes (error message)

### Best Practices
- Use `old()` only when necessary (adds session lookup)
- Batch validation in form requests
- Lazy load icons for large forms
- Consider pagination for long forms
- Use debounce for live validation

### Optimization Tips
- Cache frequently used validation rules
- Use database indexes for unique validation
- Minimize custom styling
- Avoid excessive real-time validation (use debounce)
- Disable autocomplete when not needed

---

## Notes

- `name` prop is **required** for Laravel integration
- Old input automatically overrides `value` prop
- Errors automatically retrieved from `$errors` bag
- Required asterisk automatically added to labels
- Component handles `for`/`id` association automatically
- All HTML5 input types supported
- IDs auto-generated from field names
- Wrapper can be disabled for custom layouts
- Icon position defaults to trailing (end)

---

## Related Components

- [Textarea](./textarea.md) - Multi-line text input
- [Select](./select.md) - Dropdown select input
- [Checkbox](./checkbox.md) - Checkbox input
- [Input Group](./input-group.md) - Input with prepend/append content
- [Label](./label.md) - Standalone label component
- [Help](./help.md) - Help text component
- [Invalid Feedback](./invalid-feedback.md) - Error message component
- [Button](../button.md) - Form submission buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/input.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Laravel validation integration and icon support
