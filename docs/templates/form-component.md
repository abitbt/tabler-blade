# Form Component Name

> Brief one-line description of the form component and its purpose.

## Overview

A detailed description of the form component, its integration with Laravel's validation system, and when to use it. Form components typically include automatic error handling, old input retrieval, and accessibility features.

**Key Features:**
- Laravel validation integration
- Automatic error state handling
- Old input retrieval
- Accessible labels and error messages
- Multiple variants and sizes
- Icon support
- Help text and hints

---

## Basic Usage

```blade
<x-tabler::forms.component-name
    name="field_name"
    label="Field Label" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | **required** | Field name (used for validation and old input) |
| `label` | `string\|null` | `null` | Field label text |
| `value` | `mixed\|null` | `null` | Field value (overridden by old input) |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `help` | `string\|null` | `null` | Help text displayed below field |
| `hint` | `string\|null` | `null` | Hint text displayed next to label |
| `error` | `string\|null` | `null` | Error message (auto-retrieved from `$errors` if not provided) |
| `required` | `bool` | `false` | Mark field as required |
| `disabled` | `bool` | `false` | Disable field |
| `readonly` | `bool` | `false` | Make field read-only |
| `size` | `string\|null` | `null` | Size: `sm`, `lg` |
| `icon` | `string\|null` | `null` | Leading Tabler icon name (without `tabler-` prefix) |
| `iconEnd` | `string\|null` | `null` | Trailing Tabler icon name (without `tabler-` prefix) |
| `class` | `string` | `''` | Additional CSS classes for input element |
| `containerClass` | `string` | `''` | Additional CSS classes for wrapper div |

**Note:** All additional HTML attributes are passed through to the input element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `label` | No | Custom label content (alternative to `label` prop) |
| `prepend` | No | Content prepended to input (inside input group) |
| `append` | No | Content appended to input (inside input group) |
| `help` | No | Custom help text content (alternative to `help` prop) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Input Classes** (via `class` prop):
- `form-control-sm` - Small input (also via `size="sm"`)
- `form-control-lg` - Large input (also via `size="lg"`)
- `is-valid` - Valid state styling
- `is-invalid` - Invalid state styling (auto-applied on error)

**Container Classes** (via `containerClass` prop):
- `mb-3` - Bottom margin (default)
- `mb-0` - No bottom margin
- `col-md-6` - Grid column sizing

---

## Examples

### Basic Example

```blade
<x-tabler::forms.component-name
    name="username"
    label="Username" />
```

---

### With Value

```blade
<x-tabler::forms.component-name
    name="email"
    label="Email Address"
    value="{{ $user->email }}" />
```

---

### With Placeholder

```blade
<x-tabler::forms.component-name
    name="phone"
    label="Phone Number"
    placeholder="(555) 123-4567" />
```

---

### Required Field

```blade
<x-tabler::forms.component-name
    name="full_name"
    label="Full Name"
    required />
```

**Note:** Required fields automatically display an asterisk (*) next to the label.

---

### With Help Text

```blade
<x-tabler::forms.component-name
    name="password"
    label="Password"
    type="password"
    help="Must be at least 8 characters long" />
```

---

### With Hint

```blade
<x-tabler::forms.component-name
    name="title"
    label="Title"
    hint="Max 100 characters" />
```

---

### With Icon

```blade
{{-- Leading icon --}}
<x-tabler::forms.component-name
    name="search"
    label="Search"
    icon="search"
    placeholder="Search..." />

{{-- Trailing icon --}}
<x-tabler::forms.component-name
    name="amount"
    label="Amount"
    icon-end="currency-dollar"
    placeholder="0.00" />
```

---

### Disabled State

```blade
<x-tabler::forms.component-name
    name="username"
    label="Username"
    value="{{ $user->username }}"
    disabled />
```

---

### Read-Only State

```blade
<x-tabler::forms.component-name
    name="email"
    label="Email Address"
    value="{{ $user->email }}"
    readonly />
```

---

### Size Variants

```blade
{{-- Small --}}
<x-tabler::forms.component-name
    name="code"
    label="Code"
    size="sm" />

{{-- Large --}}
<x-tabler::forms.component-name
    name="title"
    label="Title"
    size="lg" />
```

---

### With Slots

```blade
<x-tabler::forms.component-name name="price" label="Price">
    <x-slot:prepend>
        <span class="input-group-text">$</span>
    </x-slot:prepend>

    <x-slot:append>
        <span class="input-group-text">.00</span>
    </x-slot:append>

    <x-slot:help>
        Enter the price in <strong>USD</strong>
    </x-slot:help>
</x-tabler::forms.component-name>
```

---

## Laravel Integration

### Basic Form

```blade
<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <x-tabler::forms.component-name
        name="name"
        label="Name"
        required />

    <x-tabler::forms.component-name
        name="email"
        label="Email"
        type="email"
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
    <x-tabler::forms.component-name
        name="email"
        label="Email Address"
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

You can also pass errors manually:

```blade
<x-tabler::forms.component-name
    name="username"
    label="Username"
    :error="$errors->first('username')" />

{{-- Or with custom error --}}
<x-tabler::forms.component-name
    name="custom"
    label="Custom Field"
    error="This field has a custom error message" />
```

---

### With Old Input

The component **automatically retrieves old input** after failed validation:

```blade
{{-- Old input automatically used if available --}}
<x-tabler::forms.component-name
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

### Validation States

```blade
{{-- Valid state (manually applied) --}}
<x-tabler::forms.component-name
    name="verified_email"
    label="Email"
    :value="$user->email"
    class="is-valid" />

{{-- Invalid state (automatically applied when errors exist) --}}
<x-tabler::forms.component-name
    name="invalid_field"
    label="Field"
    error="This field is invalid" />
```

---

### With Form Request

```blade
<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <x-tabler::forms.component-name
        name="title"
        label="Post Title"
        :value="old('title')"
        required />

    <x-tabler::forms.component-name
        name="slug"
        label="Slug"
        :value="old('slug')"
        help="URL-friendly version of the title"
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
- `aria-label`: Applied from `label` prop
- `aria-describedby`: Links to help text and error messages
- `aria-invalid`: Applied when field has validation error
- `aria-required`: Applied when `required` prop is true

### Screen Reader Support
- Label is properly associated via `for`/`id` attributes
- Required fields announced as "required"
- Error messages announced when present
- Help text announced for context
- Icon-only actions have accessible labels

### Best Practices
- Always provide a `label` (or `aria-label`)
- Use `help` text to provide additional context
- Mark required fields with `required` prop
- Ensure error messages are descriptive
- Maintain 4.5:1 contrast ratio

**Example:**
```blade
<x-tabler::forms.component-name
    name="phone"
    label="Phone Number"
    help="Include area code for faster contact"
    required
    aria-describedby="phone-help" />
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

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::forms.component-name
    wire:model="search"
    name="search"
    label="Search"
    placeholder="Type to search..." />

{{-- With debounce --}}
<x-tabler::forms.component-name
    wire:model.debounce.500ms="query"
    name="query"
    label="Search Query" />

{{-- With lazy binding --}}
<x-tabler::forms.component-name
    wire:model.lazy="title"
    name="title"
    label="Title" />
```

**Alpine.js:**
```blade
<div x-data="{ value: '' }">
    <x-tabler::forms.component-name
        name="demo"
        label="Demo Field"
        x-model="value"
        @input="console.log(value)" />

    <p>Current value: <span x-text="value"></span></p>
</div>
```

**Standard JavaScript:**
```blade
<x-tabler::forms.component-name
    id="myField"
    name="field"
    label="Field"
    onchange="handleChange(this.value)" />

<script>
function handleChange(value) {
    console.log('Field changed:', value);
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
- ✅ Ensure label is provided (via prop or slot)
- ✅ Check CSS for `.required` or `::after` styling

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

**Issue: Label not associated with input**
- ✅ Component automatically handles `for`/`id` association
- ✅ Provide unique `name` prop
- ✅ Don't manually override `id` attribute

**Issue: Help text overlapping**
- ✅ Add margin to following form elements
- ✅ Use Bootstrap spacing utilities
- ✅ Check for CSS conflicts

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
<form method="POST" action="{{ route('login') }}">
    @csrf

    <x-tabler::forms.component-name
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
        <x-tabler::forms.checkbox
            name="remember"
            label="Remember me" />
    </div>

    <x-tabler::button
        type="submit"
        color="primary"
        class="w-100">
        Sign In
    </x-tabler::button>
</form>
```

---

### Example 2: Profile Update Form

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-md-6">
            <x-tabler::forms.component-name
                name="first_name"
                label="First Name"
                :value="old('first_name', $user->first_name)"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.component-name
                name="last_name"
                label="Last Name"
                :value="old('last_name', $user->last_name)"
                required />
        </div>
    </div>

    <x-tabler::forms.component-name
        name="email"
        label="Email Address"
        type="email"
        :value="old('email', $user->email)"
        help="We'll never share your email"
        required />

    <x-tabler::forms.component-name
        name="phone"
        label="Phone Number"
        :value="old('phone', $user->phone)"
        placeholder="(555) 123-4567"
        hint="Optional" />

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
```

---

### Example 3: Search Form with Livewire

```blade
<div>
    <x-tabler::forms.component-name
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
                    {{ $product->name }}
                </a>
            @empty
                <div class="list-group-item">
                    No products found
                </div>
            @endforelse
        </div>
    @endif
</div>
```

---

### Example 4: Dynamic Form Fields

```blade
<form method="POST" action="{{ route('contacts.store') }}">
    @csrf

    <div id="contacts-container">
        @foreach(old('contacts', ['']) as $index => $contact)
            <div class="contact-group mb-3">
                <x-tabler::forms.component-name
                    name="contacts[{{ $index }}]"
                    label="Contact {{ $index + 1 }}"
                    :value="$contact"
                    required />
            </div>
        @endforeach
    </div>

    <x-tabler::button
        type="button"
        variant="outline"
        icon="plus"
        onclick="addContact()">
        Add Contact
    </x-tabler::button>

    <x-tabler::button type="submit" color="primary">
        Save Contacts
    </x-tabler::button>
</form>

<script>
let contactIndex = {{ count(old('contacts', [''])) }};

function addContact() {
    const container = document.getElementById('contacts-container');
    const html = `
        <div class="contact-group mb-3">
            <x-tabler::forms.component-name
                name="contacts[${contactIndex}]"
                label="Contact ${contactIndex + 1}"
                required />
        </div>
    `;
    container.insertAdjacentHTML('beforeend', html);
    contactIndex++;
}
</script>
```

---

## Available Classes

Additional CSS classes you can use:

**Input Classes** (via `class` prop):
- `form-control-sm` - Small input (also via `size="sm"`)
- `form-control-lg` - Large input (also via `size="lg"`)
- `is-valid` - Valid state styling
- `is-invalid` - Invalid state styling (auto-applied on error)

**Container Classes** (via `containerClass` prop):
- `mb-3` - Bottom margin (default)
- `mb-0` - No bottom margin
- `col-md-6` - Grid column sizing

**Example:**
```blade
<x-tabler::forms.component-name
    name="code"
    label="Code"
    class="text-uppercase"
    containerClass="col-md-6" />
```

---

## Performance Considerations

### Component Weight
- Base component: ~200-300 bytes rendered
- With icon: +2KB (icon SVG)
- With validation: +100 bytes (error message)

### Best Practices
- Use `old()` only when necessary (adds session lookup)
- Batch validation in form requests
- Lazy load icons for large forms
- Consider pagination for long forms

### Optimization Tips
- Cache frequently used validation rules
- Use database indexes for unique validation
- Minimize custom styling
- Avoid excessive real-time validation (use debounce)

---

## Notes

- `name` prop is **required** for Laravel integration
- Old input automatically overrides `value` prop
- Errors automatically retrieved from `$errors` bag
- Required asterisk automatically added to labels
- Component handles `for`/`id` association automatically
- All HTML5 input types supported

---

## Related Components

- [Label](./label.md) - Standalone label component
- [Help](./help.md) - Help text component
- [Invalid Feedback](./invalid-feedback.md) - Error message component
- [Input Group](./input-group.md) - Input with prepend/append content
- [Button](./button.md) - Form submission buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/component-name.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Laravel validation integration
