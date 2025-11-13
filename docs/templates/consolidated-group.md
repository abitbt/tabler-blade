# Component Group Name

> Brief one-line description of this component group and its purpose.

## Overview

A comprehensive description of the component group, explaining:
- What problems these components solve
- Common use cases
- How they work together
- When to use components from this group

**Components in this group:**
- Component 1 - Brief description
- Component 2 - Brief description
- Component 3 - Brief description
- Component 4 - Brief description

---

## Quick Start

The most common use case to get started quickly:

```blade
<x-tabler::component-name
    name="field_name"
    label="Field Label"
    placeholder="Enter value..." />
```

**Installation**: No additional installation needed - included with tabler-blade package.

---

## Component Comparison

Choose the right component for your needs:

| Component | Best For | Key Features | When to Use |
|-----------|----------|--------------|-------------|
| Component 1 | Single-line text | Validation, icons | Short text input |
| Component 2 | Multi-line text | Auto-resize | Long text content |
| Component 3 | Predefined choices | Search, groups | Selection from list |
| Component 4 | Boolean choice | Toggle state | Yes/no decisions |

**Quick Decision Tree**:
- Need single-line text? → Use Component 1
- Need multiple lines? → Use Component 2
- Need to choose from list? → Use Component 3
- Need on/off toggle? → Use Component 4

---

## Table of Contents

**Components:**
- [Component 1](#component-1) - Brief description
- [Component 2](#component-2) - Brief description
- [Component 3](#component-3) - Brief description
- [Component 4](#component-4) - Brief description

**Shared Features:**
- [Labels & Help Text](#labels-help-text)
- [Validation](#validation)
- [Sizing](#sizing)
- [Icons](#icons)
- [States](#states)

**Advanced:**
- [Complete Examples](#complete-examples)
- [Laravel Integration](#laravel-integration)
- [Accessibility](#accessibility)
- [Best Practices](#best-practices)

---

## Component 1 {#component-1}

Brief description of Component 1 and when to use it.

### Basic Usage

```blade
<x-tabler::component-1
    name="field_name"
    label="Field Label" />
```

**Output:** Description of what renders

---

### Examples

#### With Placeholder

```blade
<x-tabler::component-1
    name="username"
    label="Username"
    placeholder="Enter your username" />
```

---

#### With Value

```blade
<x-tabler::component-1
    name="email"
    label="Email Address"
    value="{{ $user->email }}" />
```

---

#### With Help Text

```blade
<x-tabler::component-1
    name="password"
    label="Password"
    help="Must be at least 8 characters long" />
```

---

#### With Icon

```blade
<x-tabler::component-1
    name="search"
    label="Search"
    icon="search"
    placeholder="Search..." />
```

---

#### With Validation Error

```blade
<x-tabler::component-1
    name="email"
    label="Email Address"
    error="Please enter a valid email address" />
```

---

#### Required Field

```blade
<x-tabler::component-1
    name="full_name"
    label="Full Name"
    required />
```

**Note:** Required fields automatically display an asterisk (*) next to the label.

---

#### Disabled State

```blade
<x-tabler::component-1
    name="username"
    label="Username"
    value="{{ $user->username }}"
    disabled />
```

---

#### Read-Only State

```blade
<x-tabler::component-1
    name="email"
    label="Email Address"
    value="{{ $user->email }}"
    readonly />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | **required** | Field name (used for form submission and validation) |
| `label` | `string\|null` | `null` | Field label text |
| `value` | `mixed\|null` | `null` | Field value (overridden by old input in Laravel) |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `help` | `string\|null` | `null` | Help text displayed below field |
| `error` | `string\|null` | `null` | Error message (auto-retrieved from `$errors` if not provided) |
| `required` | `bool` | `false` | Mark field as required (shows asterisk) |
| `disabled` | `bool` | `false` | Disable field interaction |
| `readonly` | `bool` | `false` | Make field read-only |
| `size` | `string\|null` | `null` | Size: `sm`, `md`, `lg` |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `iconEnd` | `string\|null` | `null` | Trailing Tabler icon name |
| `class` | `string` | `''` | Additional CSS classes for input element |
| `containerClass` | `string` | `''` | Additional CSS classes for wrapper div |

**Note:** All additional HTML attributes are passed through to the input element.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `label` | No | Custom label content (alternative to `label` prop) |
| `prepend` | No | Content prepended to input (inside input group) |
| `append` | No | Content appended to input (inside input group) |
| `help` | No | Custom help text content (alternative to `help` prop) |

---

### Accessibility Notes

- Label is properly associated via `for`/`id` attributes
- `aria-required` applied when `required` prop is true
- `aria-invalid` applied when field has validation error
- `aria-describedby` links to help text and error messages
- Screen readers announce label, state, and errors

---

## Component 2 {#component-2}

Brief description of Component 2 and when to use it.

### Basic Usage

```blade
<x-tabler::component-2
    name="field_name"
    label="Field Label" />
```

---

### Examples

[Follow same pattern as Component 1]

---

### Props / Attributes

[Props table for Component 2]

---

### Slots

[Slots table for Component 2]

---

### Accessibility Notes

[Accessibility information for Component 2]

---

## Component 3 {#component-3}

[Repeat structure for each component in the group]

---

## Component 4 {#component-4}

[Repeat structure for each component in the group]

---

## Shared Features {#shared-features}

Features and patterns common to all components in this group.

### Labels & Help Text {#labels-help-text}

All components support labels and help text for better usability:

```blade
<x-tabler::component
    label="Field Label"
    name="field_name"
    help="Additional context about this field" />
```

**Label Variations:**

```blade
{{-- Prop-based label --}}
<x-tabler::component
    label="Email Address"
    name="email" />

{{-- Slot-based label (for custom HTML) --}}
<x-tabler::component name="email">
    <x-slot:label>
        Email Address <span class="badge">Required</span>
    </x-slot:label>
</x-tabler::component>
```

**Required Field Indicator:**

```blade
<x-tabler::component
    label="Email Address"
    name="email"
    required />
{{-- Automatically shows asterisk (*) next to label --}}
```

**Help Text vs Hints:**

```blade
{{-- Help text: below the input --}}
<x-tabler::component
    label="Password"
    name="password"
    help="Must be at least 8 characters" />

{{-- Hint: next to the label --}}
<x-tabler::component
    label="Phone Number"
    name="phone"
    hint="Optional" />
```

---

### Validation {#validation}

All components integrate seamlessly with Laravel validation:

#### Automatic Error Display

```blade
<x-tabler::component
    name="email"
    label="Email Address" />
{{-- Errors automatically retrieved from $errors->first('email') --}}
```

#### Manual Error Display

```blade
<x-tabler::component
    name="custom_field"
    label="Custom Field"
    error="Custom error message" />
```

#### Success State

```blade
<x-tabler::component
    name="username"
    label="Username"
    success="Username is available" />
```

#### Laravel Form Request Example

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <x-tabler::component
        name="email"
        label="Email Address"
        :value="old('email', $user->email)"
        :error="$errors->first('email')" />

    <button type="submit">Update Profile</button>
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

### Sizing {#sizing}

Most components support small, medium (default), and large sizes:

```blade
{{-- Small --}}
<x-tabler::component
    size="sm"
    label="Small Size"
    name="small" />

{{-- Medium (default) --}}
<x-tabler::component
    label="Medium Size (default)"
    name="medium" />

{{-- Large --}}
<x-tabler::component
    size="lg"
    label="Large Size"
    name="large" />
```

---

### Icons {#icons}

Add visual context with Tabler icons:

```blade
{{-- Leading icon --}}
<x-tabler::component
    icon="mail"
    label="Email"
    name="email" />

{{-- Trailing icon --}}
<x-tabler::component
    icon-end="arrow-right"
    label="Next Step"
    name="next" />

{{-- Both icons --}}
<x-tabler::component
    icon="search"
    icon-end="x"
    label="Search"
    name="search" />
```

**Available Icons**: See [Tabler Icons](https://tabler.io/icons)

**Note**: Icons require `secondnetwork/blade-tabler-icons` package (included with tabler-blade).

---

### States {#states}

All components support various interaction states:

#### Disabled State

```blade
<x-tabler::component
    label="Disabled Field"
    name="disabled_field"
    value="Cannot edit this"
    disabled />
```

**When to use:**
- Fields that should not be edited
- Showing system-generated values
- Conditional access based on permissions

---

#### Read-Only State

```blade
<x-tabler::component
    label="Read-Only Field"
    name="readonly_field"
    value="Can copy but not edit"
    readonly />
```

**Difference from disabled:**
- Read-only: Can select/copy text, value submitted with form
- Disabled: Cannot interact, value NOT submitted with form

---

#### Loading State

```blade
<x-tabler::component
    label="Loading..."
    name="field"
    loading />
```

**When to use:**
- Fetching data dynamically
- During form submission
- Waiting for API responses

---

### CSS Classes {#css-classes}

Additional CSS classes for customization:

**Input Classes** (via `class` prop):
```blade
<x-tabler::component
    name="code"
    label="Code"
    class="font-mono text-uppercase" />
```

**Common Input Classes:**
- `form-control-sm` - Small size (also via `size="sm"`)
- `form-control-lg` - Large size (also via `size="lg"`)
- `is-valid` - Valid state styling
- `is-invalid` - Invalid state styling (auto-applied on error)
- `font-mono` - Monospace font (for code)
- `text-uppercase` - Uppercase text

**Container Classes** (via `containerClass` prop):
```blade
<x-tabler::component
    name="field"
    label="Field"
    containerClass="col-md-6 mb-0" />
```

**Common Container Classes:**
- `mb-3` - Bottom margin (default)
- `mb-0` - No bottom margin
- `col-md-6` - Half-width column
- `col-md-4` - Third-width column

---

## Complete Examples {#complete-examples}

Real-world scenarios showing multiple components working together.

### Example 1: Contact Form

```blade
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <x-tabler::component-1
                name="first_name"
                label="First Name"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::component-1
                name="last_name"
                label="Last Name"
                required />
        </div>
    </div>

    <x-tabler::component-1
        name="email"
        label="Email Address"
        type="email"
        icon="mail"
        required />

    <x-tabler::component-3
        name="subject"
        label="Subject"
        :options="[
            'general' => 'General Inquiry',
            'support' => 'Support Request',
            'sales' => 'Sales Question',
        ]"
        required />

    <x-tabler::component-2
        name="message"
        label="Message"
        rows="5"
        required />

    <x-tabler::component-4
        name="send_copy"
        label="Send me a copy of this message" />

    <div class="btn-list">
        <x-tabler::button type="submit" color="primary">
            Send Message
        </x-tabler::button>
        <x-tabler::button type="button" variant="outline">
            Cancel
        </x-tabler::button>
    </div>
</form>
```

**Use Case:** Standard contact form with name, email, subject, message, and preferences.

---

### Example 2: Registration Form

```blade
<form method="POST" action="{{ route('register') }}">
    @csrf

    <h3>Account Information</h3>

    <div class="row">
        <div class="col-md-6">
            <x-tabler::component-1
                name="first_name"
                label="First Name"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::component-1
                name="last_name"
                label="Last Name"
                required />
        </div>
    </div>

    <x-tabler::component-1
        name="email"
        label="Email Address"
        type="email"
        icon="mail"
        help="We'll send a verification email"
        required />

    <x-tabler::component-1
        name="password"
        label="Password"
        type="password"
        icon="lock"
        help="Must be at least 8 characters"
        required />

    <x-tabler::component-1
        name="password_confirmation"
        label="Confirm Password"
        type="password"
        icon="lock"
        required />

    <h3 class="mt-4">Preferences</h3>

    <x-tabler::component-4
        name="newsletter"
        label="Subscribe to newsletter"
        description="Get weekly updates about new features" />

    <x-tabler::component-4
        name="terms"
        label="I agree to the Terms of Service and Privacy Policy"
        required />

    <div class="btn-list mt-4">
        <x-tabler::button type="submit" color="primary">
            Create Account
        </x-tabler::button>
        <x-tabler::button
            type="button"
            variant="ghost"
            onclick="window.location='{{ route('login') }}'">
            Already have an account?
        </x-tabler::button>
    </div>
</form>
```

**Use Case:** User registration with validation, password confirmation, and terms acceptance.

---

### Example 3: Profile Settings

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <h3>Personal Information</h3>

    <div class="row">
        <div class="col-md-6">
            <x-tabler::component-1
                name="first_name"
                label="First Name"
                :value="old('first_name', $user->first_name)"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::component-1
                name="last_name"
                label="Last Name"
                :value="old('last_name', $user->last_name)"
                required />
        </div>
    </div>

    <x-tabler::component-1
        name="email"
        label="Email Address"
        type="email"
        :value="old('email', $user->email)"
        help="We'll never share your email"
        readonly />

    <x-tabler::component-1
        name="phone"
        label="Phone Number"
        :value="old('phone', $user->phone)"
        placeholder="(555) 123-4567"
        hint="Optional" />

    <h3 class="mt-4">Bio</h3>

    <x-tabler::component-2
        name="bio"
        label="About You"
        :value="old('bio', $user->bio)"
        rows="4"
        help="Tell us about yourself" />

    <h3 class="mt-4">Notification Preferences</h3>

    <x-tabler::component-4
        name="email_notifications"
        label="Email notifications"
        description="Receive email updates about your account"
        :checked="old('email_notifications', $user->email_notifications)" />

    <x-tabler::component-4
        name="sms_notifications"
        label="SMS notifications"
        description="Receive text message alerts"
        :checked="old('sms_notifications', $user->sms_notifications)" />

    <div class="btn-list mt-4">
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
```

**Use Case:** Profile update form with personal info, bio, and notification preferences.

---

### Example 4: Search Form with Livewire

```blade
<div wire:poll.5s>
    <x-tabler::component-1
        wire:model.debounce.300ms="search"
        name="search"
        label="Search Products"
        icon="search"
        placeholder="Enter product name..."
        hint="{{ count($results) }} results" />

    @if($search)
        <div class="list-group mt-3">
            @forelse($results as $product)
                <a href="{{ route('products.show', $product) }}"
                   class="list-group-item list-group-item-action">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <strong>{{ $product->name }}</strong>
                            <div class="text-muted">{{ $product->category }}</div>
                        </div>
                        <div class="text-end">
                            <div class="h3 mb-0">${{ $product->price }}</div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="list-group-item text-muted">
                    No products found matching "{{ $search }}"
                </div>
            @endforelse
        </div>
    @endif
</div>
```

**Use Case:** Real-time search with Livewire, showing results as user types.

---

## Laravel Integration {#laravel-integration}

Deep integration with Laravel's form and validation systems.

### Automatic Old Input Retrieval

All components automatically retrieve old input after failed validation:

```blade
<x-tabler::component-1
    name="email"
    label="Email"
    :value="old('email', $user->email ?? '')" />
```

**How it works:**
1. User submits form
2. Validation fails
3. User is redirected back
4. Component uses `old('email')` if available
5. Falls back to provided `value` prop

---

### Error Bag Integration

Components automatically display errors from Laravel's `$errors` bag:

```blade
{{-- Automatic error retrieval --}}
<x-tabler::component-1
    name="email"
    label="Email Address" />
{{-- Error message from $errors->first('email') shown automatically --}}
```

**Custom error bags:**
```blade
<x-tabler::component-1
    name="email"
    label="Email"
    :error="$errors->customBag->first('email')" />
```

---

### Form Request Validation

Example Laravel form request:

```php
// app/Http/Requests/UpdateProfileRequest.php
class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'This email address is already taken.',
            'phone.max' => 'Phone number must not exceed 20 characters.',
        ];
    }
}
```

**Usage in controller:**
```php
public function update(UpdateProfileRequest $request)
{
    $validated = $request->validated();

    auth()->user()->update($validated);

    return redirect()->route('profile.show')
        ->with('success', 'Profile updated successfully!');
}
```

---

### Conditional Validation

```blade
<x-tabler::component-3
    name="company"
    label="Company Name"
    :options="$companies"
    :required="$accountType === 'business'" />

<x-tabler::component-1
    name="tax_id"
    label="Tax ID"
    v-if="$accountType === 'business'"
    required />
```

---

## Accessibility {#accessibility}

All components are built with accessibility as a priority.

### Keyboard Navigation

- **Tab**: Move focus between form fields
- **Shift + Tab**: Move focus backward
- **Enter**: Submit form (when focused on button)
- **Escape**: Clear field (component-specific)
- **Arrow Keys**: Navigate options (select, radio)
- **Space**: Toggle (checkbox, switch)

---

### ARIA Attributes

Components automatically include appropriate ARIA attributes:

- `aria-label`: Applied from `label` prop
- `aria-describedby`: Links to help text and error messages
- `aria-invalid`: Applied when field has validation error
- `aria-required`: Applied when `required` prop is true
- `aria-disabled`: Applied when `disabled` prop is true

**Example rendered HTML:**
```html
<input
    type="text"
    id="email"
    name="email"
    aria-label="Email Address"
    aria-describedby="email-help email-error"
    aria-invalid="true"
    aria-required="true">
<div id="email-help">We'll never share your email</div>
<div id="email-error">Please enter a valid email address</div>
```

---

### Screen Reader Support

- **Labels**: Properly associated using `for`/`id` attributes
- **Help text**: Announced when field is focused
- **Errors**: Announced immediately when they appear
- **Required fields**: Announced as "required"
- **State changes**: Disabled/readonly states announced

**Testing your forms:**
- Test with screen readers (NVDA, JAWS, VoiceOver)
- Ensure all fields have labels
- Verify error messages are announced
- Check focus order is logical

---

### Color Contrast

All components meet WCAG 2.1 AA standards:

- **Normal text**: 4.5:1 contrast ratio minimum
- **Large text**: 3:1 contrast ratio minimum
- **Form borders**: 3:1 contrast with background
- **Error states**: Clear visual distinction beyond color alone

---

### Focus Indicators

- **Visible focus**: Clear outline on focused fields
- **High contrast**: Works in both light and dark modes
- **Never remove**: Don't use `outline: none` without alternative

---

## Best Practices {#best-practices}

Guidelines for effective form design with these components.

### Do's ✅

**Always provide labels:**
```blade
{{-- Good --}}
<x-tabler::component-1
    label="Email Address"
    name="email" />

{{-- Bad --}}
<x-tabler::component-1
    name="email"
    placeholder="Email Address" />
{{-- Placeholders are not labels! --}}
```

**Use help text for context:**
```blade
<x-tabler::component-1
    label="Password"
    name="password"
    type="password"
    help="Must be at least 8 characters with one number and one symbol" />
```

**Mark required fields clearly:**
```blade
<x-tabler::component-1
    label="Email Address"
    name="email"
    required />
{{-- Shows asterisk automatically --}}
```

**Group related fields:**
```blade
<fieldset>
    <legend>Billing Address</legend>

    <x-tabler::component-1 name="billing_street" label="Street Address" />
    <x-tabler::component-1 name="billing_city" label="City" />
    <x-tabler::component-1 name="billing_zip" label="ZIP Code" />
</fieldset>
```

**Use appropriate input types:**
```blade
<x-tabler::component-1 type="email" />   {{-- For emails --}}
<x-tabler::component-1 type="tel" />     {{-- For phones --}}
<x-tabler::component-1 type="url" />     {{-- For URLs --}}
<x-tabler::component-1 type="number" />  {{-- For numbers --}}
<x-tabler::component-1 type="date" />    {{-- For dates --}}
```

---

### Don'ts ❌

**Don't use placeholders as labels:**
```blade
{{-- Bad --}}
<x-tabler::component-1
    name="email"
    placeholder="Email Address" />

{{-- Good --}}
<x-tabler::component-1
    label="Email Address"
    name="email"
    placeholder="you@example.com" />
```

**Don't hide labels:**
```blade
{{-- Bad --}}
<x-tabler::component-1
    name="email"
    aria-label="Email" />

{{-- Good --}}
<x-tabler::component-1
    label="Email Address"
    name="email" />
```

**Don't over-validate:**
```blade
{{-- Bad: Too restrictive --}}
<x-tabler::component-1
    label="Name"
    name="name"
    pattern="[A-Za-z]+"  {{-- Prevents spaces, hyphens, etc --}}
    required />

{{-- Good: Accept various formats --}}
<x-tabler::component-1
    label="Name"
    name="name"
    required />
```

**Don't use vague error messages:**
```blade
{{-- Bad --}}
<x-tabler::component-1
    name="email"
    error="Invalid" />

{{-- Good --}}
<x-tabler::component-1
    name="email"
    error="Please enter a valid email address (e.g., you@example.com)" />
```

---

### Performance Tips

**Minimize real-time validation:**
```blade
{{-- Instead of validating on every keystroke --}}
<x-tabler::component-1
    wire:model="email"
    name="email" />

{{-- Use debounce or lazy binding --}}
<x-tabler::component-1
    wire:model.debounce.500ms="email"
    name="email" />

{{-- Or validate on blur --}}
<x-tabler::component-1
    wire:model.lazy="email"
    name="email" />
```

**Use appropriate field types:**
```blade
{{-- Use textarea for long text, not input --}}
<x-tabler::component-2
    name="description"
    rows="5" />
```

---

## Browser Compatibility

### Requirements

- **Bootstrap 5.x** (CSS)
- **Modern CSS** (Flexbox, CSS Grid)
- **Tabler Icons** (`secondnetwork/blade-tabler-icons`) - if using icon props

### Supported Browsers

- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues

- **Autofill styling**: Browser autofill colors may vary
- **Placeholder opacity**: Varies by browser (use CSS to normalize)
- **Date pickers**: Native date inputs look different across browsers
- **Number spinners**: Chrome shows up/down arrows, Firefox doesn't (by default)

---

## Troubleshooting

### Common Issues

**Issue: Validation errors not displaying**
- ✅ Ensure `name` prop matches validation rule key exactly
- ✅ Check that `$errors` bag is available in view
- ✅ Verify validation is running in controller
- ✅ Try manually passing error: `error="test error"`
- ✅ Check error bag name if using multiple bags

**Issue: Old input not working**
- ✅ Use `:value="old('name', $default)"` syntax (colon for PHP)
- ✅ Ensure form redirects back on validation failure
- ✅ Check session flash data is enabled in config
- ✅ Verify session middleware is active

**Issue: Required asterisk not showing**
- ✅ Set `required` prop to `true` (or just `required`)
- ✅ Ensure label is provided (via prop or slot)
- ✅ Check CSS for `.required` styling

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Form not submitting**
- ✅ Ensure all fields have `name` attribute
- ✅ Check fields are inside `<form>` tag
- ✅ Verify form has `action` and `method` attributes
- ✅ Include `@csrf` token
- ✅ Ensure submit button has `type="submit"`

**Issue: Styling not applied**
- ✅ Ensure Bootstrap 5 CSS is loaded
- ✅ Check for CSS specificity conflicts
- ✅ Verify Tabler CSS is loaded
- ✅ Clear browser cache

---

## Related Components

- [Button](../button.md) - Submit buttons and actions
- [Alert](../alert.md) - Success/error messages
- [Modal](../modals.md) - Forms in dialogs
- [Card](../cards.md) - Form containers

---

## Source

**Component Files:**
- `tabler-blade/stubs/resources/views/tabler/component-name.blade.php`

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation
