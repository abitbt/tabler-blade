# Form Hint

> Small, muted text component for displaying contextual help and guidance near form controls, providing inline hints without visual prominence.

## Overview

The Form Hint component displays subtle, supplementary information near form controls to guide users on proper input formatting, requirements, or provide additional context. Unlike the Help component which uses popovers, Hint provides always-visible, inline text guidance that doesn't require user interaction. It's rendered as small, typically muted text that complements form inputs without overwhelming the interface.

**Key Features:**
- Always-visible inline guidance
- Small, subtle text styling
- Block or inline display modes
- Compatible with all form components
- Accessible via proper ARIA associations
- Lightweight with minimal markup
- No JavaScript dependencies
- Seamlessly integrates with validation
- Supports custom styling
- Works with Laravel's old() helper

**Use Case:** Use Form Hint when you need to provide contextual help that should always be visible to users, such as password requirements, character limits, format examples, field descriptions, or helpful tips. Unlike tooltips or popovers, hints remain visible without requiring hover or click interactions.

---

## Basic Usage

```blade
<x-tabler::forms.label for="username">Username</x-tabler::forms.label>
<input type="text" id="username" name="username" class="form-control" />
<x-tabler::forms.hint>Choose a unique username between 3-20 characters</x-tabler::forms.hint>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes for the hint element |

**Note:** All additional HTML attributes are passed through to the `<small>` element. The component automatically applies the `form-hint` class.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | The hint text content to be displayed |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Display & Layout:**
- `d-block` - Display as block element (full width, own line)
- `d-inline-block` - Display as inline-block
- `d-none` - Hide the hint
- `mt-1`, `mt-2`, `mt-3` - Top margin spacing
- `mb-1`, `mb-2`, `mb-3` - Bottom margin spacing

**Text Color:**
- `text-muted` - Muted gray text (default appearance)
- `text-primary` - Primary blue text
- `text-secondary` - Secondary gray text
- `text-success` - Success green text
- `text-info` - Info blue text
- `text-warning` - Warning orange/yellow text
- `text-danger` - Danger red text

**Text Utilities:**
- `fw-normal`, `fw-bold`, `fw-semibold` - Font weight variants
- `fst-italic`, `fst-normal` - Font style variants
- `text-start`, `text-center`, `text-end` - Text alignment

---

## Examples

### Basic Hint

Simple hint text below an input:

```blade
<x-tabler::forms.label for="email">Email Address</x-tabler::forms.label>
<input type="email" id="email" name="email" class="form-control" />
<x-tabler::forms.hint>We'll never share your email with anyone else</x-tabler::forms.hint>
```

---

### Block Display Hint

Force hint to display as a block element:

```blade
<x-tabler::forms.label for="password">Password</x-tabler::forms.label>
<input type="password" id="password" name="password" class="form-control" />
<x-tabler::forms.hint class="d-block">
    Must be at least 8 characters and include uppercase, lowercase, and numbers
</x-tabler::forms.hint>
```

---

### Hint Before Input

Display hint above the form control:

```blade
<x-tabler::forms.label for="coupon">Coupon Code</x-tabler::forms.label>
<x-tabler::forms.hint class="d-block mb-2">Enter your discount code if you have one</x-tabler::forms.hint>
<input type="text" id="coupon" name="coupon" class="form-control" />
```

---

### Success Hint

Show positive feedback with green text:

```blade
<x-tabler::forms.label for="username">Username</x-tabler::forms.label>
<input type="text" id="username" name="username" class="form-control is-valid" value="john_doe" />
<x-tabler::forms.hint class="text-success">Username is available!</x-tabler::forms.hint>
```

---

### Warning Hint

Display cautionary information with warning color:

```blade
<x-tabler::forms.label for="api_key">API Key</x-tabler::forms.label>
<input type="text" id="api_key" name="api_key" class="form-control" />
<x-tabler::forms.hint class="text-warning">
    Keep your API key secret. Never share it publicly.
</x-tabler::forms.hint>
```

---

### Info Hint

Provide informational context with blue text:

```blade
<x-tabler::forms.label for="phone">Phone Number</x-tabler::forms.label>
<input type="tel" id="phone" name="phone" class="form-control" />
<x-tabler::forms.hint class="text-info">Format: +1 (555) 123-4567</x-tabler::forms.hint>
```

---

### Danger/Error Hint

Show critical information with red text:

```blade
<x-tabler::forms.label for="delete">Type DELETE to confirm</x-tabler::forms.label>
<input type="text" id="delete" name="delete" class="form-control" />
<x-tabler::forms.hint class="text-danger">
    This action cannot be undone. All data will be permanently deleted.
</x-tabler::forms.hint>
```

---

### Multiple Hints

Display multiple pieces of information:

```blade
<x-tabler::forms.label for="bio">Biography</x-tabler::forms.label>
<textarea id="bio" name="bio" class="form-control" rows="4"></textarea>
<x-tabler::forms.hint class="d-block">Tell us about yourself</x-tabler::forms.hint>
<x-tabler::forms.hint class="d-block text-muted">Maximum 500 characters</x-tabler::forms.hint>
```

---

### Hint with Icon

Combine with Tabler icons for enhanced visual cues:

```blade
<x-tabler::forms.label for="backup_email">Backup Email</x-tabler::forms.label>
<input type="email" id="backup_email" name="backup_email" class="form-control" />
<x-tabler::forms.hint class="d-block">
    <x-tabler-icon name="info-circle" class="icon icon-inline" />
    Used for account recovery only
</x-tabler::forms.hint>
```

---

### Conditional Hint

Show hints based on conditions:

```blade
<x-tabler::forms.label for="discount_code">Discount Code</x-tabler::forms.label>
<input type="text" id="discount_code" name="discount_code" class="form-control" />

@if($user->isEligibleForDiscount())
    <x-tabler::forms.hint class="text-success">
        You're eligible for a 20% discount on this purchase
    </x-tabler::forms.hint>
@else
    <x-tabler::forms.hint>
        Discount codes are applied at checkout
    </x-tabler::forms.hint>
@endif
```

---

### Hint with Character Counter

Display remaining character count:

```blade
<div x-data="{ text: '', maxLength: 160 }">
    <x-tabler::forms.label for="bio">Short Bio</x-tabler::forms.label>
    <textarea
        id="bio"
        name="bio"
        class="form-control"
        rows="3"
        x-model="text"
        maxlength="160"></textarea>
    <x-tabler::forms.hint class="d-block">
        <span x-text="`${maxLength - text.length} characters remaining`"></span>
    </x-tabler::forms.hint>
</div>
```

---

### Responsive Hint

Adjust hint visibility based on screen size:

```blade
<x-tabler::forms.label for="search">Search</x-tabler::forms.label>
<input type="text" id="search" name="search" class="form-control" />
<x-tabler::forms.hint class="d-none d-md-block">
    Use quotes for exact phrase matching, e.g., "John Doe"
</x-tabler::forms.hint>
```

---

### Custom Styled Hint

Apply custom styling for specific use cases:

```blade
<x-tabler::forms.label for="promo">Promo Code</x-tabler::forms.label>
<input type="text" id="promo" name="promo" class="form-control" />
<x-tabler::forms.hint class="d-block fw-bold text-primary mt-2">
    New customers receive 25% off with code: WELCOME25
</x-tabler::forms.hint>
```

---

## Laravel Integration

### Basic Form with Hints

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <x-tabler::forms.label for="username">Username</x-tabler::forms.label>
        <input
            type="text"
            id="username"
            name="username"
            class="form-control @error('username') is-invalid @enderror"
            value="{{ old('username', $user->username) }}" />
        <x-tabler::forms.hint>3-20 alphanumeric characters only</x-tabler::forms.hint>
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update Profile</button>
</form>
```

---

### Password Requirements Hint

```blade
<div class="mb-3">
    <x-tabler::forms.label for="password">New Password</x-tabler::forms.label>
    <input
        type="password"
        id="password"
        name="password"
        class="form-control @error('password') is-invalid @enderror" />
    <x-tabler::forms.hint class="d-block">
        Your password must contain:
        <ul class="mb-0 mt-1">
            <li>At least 8 characters</li>
            <li>One uppercase letter</li>
            <li>One lowercase letter</li>
            <li>One number</li>
            <li>One special character (@$!%*?&)</li>
        </ul>
    </x-tabler::forms.hint>
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

### With Old Input Helper

```blade
<div class="mb-3">
    <x-tabler::forms.label for="website">Website</x-tabler::forms.label>
    <input
        type="url"
        id="website"
        name="website"
        class="form-control @error('website') is-invalid @enderror"
        value="{{ old('website') }}"
        placeholder="https://example.com" />
    <x-tabler::forms.hint>Include the full URL with https://</x-tabler::forms.hint>
    @error('website')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

### Dynamic Hint Content

```blade
<div class="mb-3">
    <x-tabler::forms.label for="file">Profile Picture</x-tabler::forms.label>
    <input
        type="file"
        id="file"
        name="file"
        class="form-control @error('file') is-invalid @enderror"
        accept="image/*" />
    <x-tabler::forms.hint>
        Maximum file size: {{ config('app.max_upload_size', '2MB') }}.
        Allowed formats: JPG, PNG, GIF
    </x-tabler::forms.hint>
    @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
```

---

### ARIA Described By Association

```blade
<div class="mb-3">
    <x-tabler::forms.label for="card_number">Credit Card Number</x-tabler::forms.label>
    <input
        type="text"
        id="card_number"
        name="card_number"
        class="form-control"
        aria-describedby="card-hint"
        value="{{ old('card_number') }}" />
    <x-tabler::forms.hint id="card-hint">
        Enter the 16-digit number on the front of your card
    </x-tabler::forms.hint>
</div>
```

---

### Validation with Success Hint

```blade
<div class="mb-3" x-data="{ username: '{{ old('username') }}', available: false }">
    <x-tabler::forms.label for="username">Username</x-tabler::forms.label>
    <input
        type="text"
        id="username"
        name="username"
        class="form-control"
        x-model="username"
        @blur="checkAvailability(username)" />

    <x-tabler::forms.hint x-show="!available && username.length > 0">
        Checking availability...
    </x-tabler::forms.hint>

    <x-tabler::forms.hint x-show="available" class="text-success">
        Username is available!
    </x-tabler::forms.hint>
</div>
```

---

### Combined Hint and Error Display

```blade
<div class="mb-3">
    <x-tabler::forms.label for="slug">URL Slug</x-tabler::forms.label>
    <input
        type="text"
        id="slug"
        name="slug"
        class="form-control @error('slug') is-invalid @enderror"
        value="{{ old('slug') }}" />

    @error('slug')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @else
        <x-tabler::forms.hint>
            Lowercase letters, numbers, and hyphens only
        </x-tabler::forms.hint>
    @enderror
</div>
```

---

### Form Request Validation Example

**Blade Template:**
```blade
<form method="POST" action="{{ route('articles.store') }}">
    @csrf

    <div class="mb-3">
        <x-tabler::forms.label for="title">Article Title</x-tabler::forms.label>
        <input
            type="text"
            id="title"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title') }}" />
        <x-tabler::forms.hint>Maximum 200 characters</x-tabler::forms.hint>
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <x-tabler::forms.label for="slug">URL Slug</x-tabler::forms.label>
        <input
            type="text"
            id="slug"
            name="slug"
            class="form-control @error('slug') is-invalid @enderror"
            value="{{ old('slug') }}" />
        <x-tabler::forms.hint>Automatically generated from title if left empty</x-tabler::forms.hint>
        @error('slug')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Create Article</button>
</form>
```

**Form Request:**
```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:200'],
            'slug' => ['nullable', 'string', 'max:200', 'unique:articles,slug'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter an article title.',
            'title.max' => 'Article title cannot exceed 200 characters.',
            'slug.unique' => 'This URL slug is already in use.',
            'slug.max' => 'URL slug cannot exceed 200 characters.',
        ];
    }
}
```

---

## Accessibility

### Keyboard Navigation

The hint component is a non-interactive text element and doesn't require keyboard navigation. Focus moves through form inputs naturally.

---

### ARIA Attributes

Associate hints with inputs using `aria-describedby` for screen reader support:

```blade
<x-tabler::forms.label for="email">Email Address</x-tabler::forms.label>
<input
    type="email"
    id="email"
    name="email"
    class="form-control"
    aria-describedby="email-hint" />
<x-tabler::forms.hint id="email-hint">
    We'll send a verification link to this address
</x-tabler::forms.hint>
```

---

### Screen Reader Support

Screen readers announce hint text when:
- Properly associated via `aria-describedby`
- User focuses on the associated input field
- Hint is visible and not hidden with `display: none`

**Best Practice Example:**
```blade
<x-tabler::forms.label for="password">Password</x-tabler::forms.label>
<input
    type="password"
    id="password"
    name="password"
    class="form-control"
    aria-describedby="password-hint"
    required />
<x-tabler::forms.hint id="password-hint">
    Must be at least 8 characters with uppercase, lowercase, and numbers
</x-tabler::forms.hint>
```

---

### Multiple Hints with ARIA

When using multiple hints, space-separate IDs:

```blade
<x-tabler::forms.label for="username">Username</x-tabler::forms.label>
<input
    type="text"
    id="username"
    name="username"
    class="form-control"
    aria-describedby="username-hint username-format" />
<x-tabler::forms.hint id="username-hint" class="d-block">
    Your public display name
</x-tabler::forms.hint>
<x-tabler::forms.hint id="username-format" class="d-block">
    3-20 characters, letters and numbers only
</x-tabler::forms.hint>
```

---

### Color Contrast

Ensure sufficient contrast for readability:
- Default muted text meets WCAG AA standards
- Colored hints (success, warning, danger) maintain proper contrast
- Test with color blindness simulators when using colors

---

### WCAG 2.1 AA Compliance

The Form Hint component supports WCAG 2.1 Level AA compliance when:
- Text contrast ratio is at least 4.5:1
- Hint text is programmatically associated with inputs
- Color is not the only means of conveying information
- Text size is readable (Tabler's default is compliant)

---

### Best Practices

1. **Always associate hints with inputs** using `aria-describedby`
2. **Keep hint text concise** and easy to understand
3. **Don't rely solely on color** to convey meaning
4. **Test with screen readers** to ensure proper announcement
5. **Ensure sufficient contrast** for all text colors
6. **Place hints near their inputs** for visual association
7. **Use semantic HTML** structure
8. **Make hints visible** without requiring interaction

---

## Browser Compatibility

The Form Hint component uses standard HTML elements and is compatible with all modern browsers:

### Desktop Support
- **Chrome/Edge**: Full support (all versions) ✅
- **Firefox**: Full support (all versions) ✅
- **Safari**: Full support (all versions) ✅
- **Opera**: Full support (all versions) ✅

### Mobile Support
- **Chrome Mobile**: Full support ✅
- **Safari iOS**: Full support ✅
- **Firefox Android**: Full support ✅
- **Opera Mobile**: Full support ✅
- **Samsung Internet**: Full support ✅

### Legacy Browser Support
- **IE 11**: Full support ✅ (basic HTML/CSS)
- **IE 10**: Full support ✅

---

### Requirements

- **HTML**: Standard `<small>` element (universal support)
- **CSS**: Tabler CSS classes (`form-hint`, text utilities)
- **JavaScript**: None required
- **Dependencies**: Bootstrap 5.x CSS (for text utilities)

---

## Real-World Examples

### Example 1: User Registration Form

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create Account</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <x-tabler::forms.label for="name">Full Name</x-tabler::forms.label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}"
                    required />
                <x-tabler::forms.hint>Enter your first and last name</x-tabler::forms.hint>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="email">Email Address</x-tabler::forms.label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}"
                    required />
                <x-tabler::forms.hint>We'll send a verification link to this address</x-tabler::forms.hint>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="password">Password</x-tabler::forms.label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control @error('password') is-invalid @enderror"
                    required />
                <x-tabler::forms.hint class="d-block">
                    Password requirements:
                    <ul class="mb-0 mt-1 small">
                        <li>Minimum 8 characters</li>
                        <li>At least one uppercase letter</li>
                        <li>At least one number</li>
                    </ul>
                </x-tabler::forms.hint>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Create Account</button>
        </form>
    </div>
</div>
```

**Use Case:** Complete registration form with helpful hints for each field

---

### Example 2: Payment Form with Validation

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Payment Information</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('payment.process') }}">
            @csrf

            <div class="mb-3">
                <x-tabler::forms.label for="card_number">Card Number</x-tabler::forms.label>
                <input
                    type="text"
                    id="card_number"
                    name="card_number"
                    class="form-control @error('card_number') is-invalid @enderror"
                    maxlength="19"
                    placeholder="1234 5678 9012 3456"
                    required />
                <x-tabler::forms.hint>Enter the 16-digit number on your card</x-tabler::forms.hint>
                @error('card_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <x-tabler::forms.label for="expiry">Expiration Date</x-tabler::forms.label>
                    <input
                        type="text"
                        id="expiry"
                        name="expiry"
                        class="form-control @error('expiry') is-invalid @enderror"
                        placeholder="MM/YY"
                        maxlength="5"
                        required />
                    <x-tabler::forms.hint>Format: MM/YY</x-tabler::forms.hint>
                    @error('expiry')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <x-tabler::forms.label for="cvv">CVV</x-tabler::forms.label>
                    <input
                        type="text"
                        id="cvv"
                        name="cvv"
                        class="form-control @error('cvv') is-invalid @enderror"
                        maxlength="4"
                        placeholder="123"
                        required />
                    <x-tabler::forms.hint>3-4 digits on back of card</x-tabler::forms.hint>
                    @error('cvv')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <x-tabler::forms.hint class="d-block text-warning">
                    <x-tabler-icon name="lock" class="icon icon-inline" />
                    Your payment information is encrypted and secure
                </x-tabler::forms.hint>
            </div>

            <button type="submit" class="btn btn-primary">Process Payment</button>
        </form>
    </div>
</div>
```

**Use Case:** Secure payment form with format hints and security assurance

---

### Example 3: Blog Post Editor

```blade
<div class="card" x-data="{
    title: '{{ old('title', $post->title ?? '') }}',
    slug: '{{ old('slug', $post->slug ?? '') }}',
    content: '{{ old('content', $post->content ?? '') }}'
}">
    <div class="card-header">
        <h3 class="card-title">{{ isset($post) ? 'Edit' : 'Create' }} Post</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="mb-3">
                <x-tabler::forms.label for="title">Post Title</x-tabler::forms.label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    class="form-control @error('title') is-invalid @enderror"
                    x-model="title"
                    maxlength="200"
                    required />
                <x-tabler::forms.hint class="d-block">
                    <span x-text="`${200 - title.length} characters remaining`"></span>
                </x-tabler::forms.hint>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="slug">URL Slug</x-tabler::forms.label>
                <input
                    type="text"
                    id="slug"
                    name="slug"
                    class="form-control @error('slug') is-invalid @enderror"
                    x-model="slug" />
                <x-tabler::forms.hint>
                    Leave empty to auto-generate from title. Use lowercase and hyphens.
                </x-tabler::forms.hint>
                @error('slug')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="excerpt">Excerpt</x-tabler::forms.label>
                <textarea
                    id="excerpt"
                    name="excerpt"
                    class="form-control @error('excerpt') is-invalid @enderror"
                    rows="3"
                    maxlength="300">{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                <x-tabler::forms.hint>
                    Brief summary shown in post listings (max 300 characters)
                </x-tabler::forms.hint>
                @error('excerpt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="content">Content</x-tabler::forms.label>
                <textarea
                    id="content"
                    name="content"
                    class="form-control @error('content') is-invalid @enderror"
                    rows="15"
                    x-model="content"
                    required>{{ old('content', $post->content ?? '') }}</textarea>
                <x-tabler::forms.hint>
                    Markdown and HTML supported. Use images at 1200x630px for best results.
                </x-tabler::forms.hint>
                @error('content')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="published_at">Publish Date</x-tabler::forms.label>
                <input
                    type="datetime-local"
                    id="published_at"
                    name="published_at"
                    class="form-control @error('published_at') is-invalid @enderror"
                    value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i') ?? '') }}" />
                <x-tabler::forms.hint>Leave empty to save as draft</x-tabler::forms.hint>
                @error('published_at')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="btn-list">
                <button type="submit" class="btn btn-primary">
                    {{ isset($post) ? 'Update' : 'Create' }} Post
                </button>
                <a href="{{ route('posts.index') }}" class="btn btn-link">Cancel</a>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** Rich blog post editor with contextual hints for each field

---

### Example 4: Settings Page with Multiple Hints

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Account Settings</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            @method('PUT')

            <h4>Profile Information</h4>

            <div class="mb-3">
                <x-tabler::forms.label for="display_name">Display Name</x-tabler::forms.label>
                <input
                    type="text"
                    id="display_name"
                    name="display_name"
                    class="form-control @error('display_name') is-invalid @enderror"
                    value="{{ old('display_name', $settings->display_name) }}" />
                <x-tabler::forms.hint>This is how your name appears to others</x-tabler::forms.hint>
                @error('display_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <x-tabler::forms.label for="timezone">Timezone</x-tabler::forms.label>
                <select
                    id="timezone"
                    name="timezone"
                    class="form-select @error('timezone') is-invalid @enderror">
                    <option value="">Select timezone...</option>
                    @foreach(timezone_identifiers_list() as $timezone)
                        <option value="{{ $timezone }}" @selected(old('timezone', $settings->timezone) === $timezone)>
                            {{ $timezone }}
                        </option>
                    @endforeach
                </select>
                <x-tabler::forms.hint>All dates and times will be displayed in this timezone</x-tabler::forms.hint>
                @error('timezone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <hr class="my-4" />

            <h4>Privacy Settings</h4>

            <div class="mb-3">
                <div class="form-check">
                    <input
                        type="checkbox"
                        id="profile_public"
                        name="profile_public"
                        class="form-check-input"
                        value="1"
                        @checked(old('profile_public', $settings->profile_public)) />
                    <label class="form-check-label" for="profile_public">
                        Make profile public
                    </label>
                </div>
                <x-tabler::forms.hint class="ms-4">
                    Public profiles can be viewed by anyone, even without an account
                </x-tabler::forms.hint>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input
                        type="checkbox"
                        id="email_notifications"
                        name="email_notifications"
                        class="form-check-input"
                        value="1"
                        @checked(old('email_notifications', $settings->email_notifications)) />
                    <label class="form-check-label" for="email_notifications">
                        Email notifications
                    </label>
                </div>
                <x-tabler::forms.hint class="ms-4 text-info">
                    Receive notifications about important account activity
                </x-tabler::forms.hint>
            </div>

            <hr class="my-4" />

            <x-tabler::forms.hint class="d-block text-warning mb-3">
                <x-tabler-icon name="alert-triangle" class="icon icon-inline" />
                Changes will take effect immediately after saving
            </x-tabler::forms.hint>

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
</div>
```

**Use Case:** Comprehensive settings page with contextual hints for various options

---

## Performance Considerations

### Component Weight
- **Base component**: ~50-80 bytes rendered HTML
- **With text content**: Variable based on hint length
- **CSS overhead**: Minimal (uses existing Tabler classes)
- **JavaScript**: None required

---

### Best Practices

1. **Keep hint text concise** - Brief, actionable guidance
2. **Avoid excessive hints** - Only add where truly helpful
3. **Use conditional rendering** - Hide hints when not needed
4. **Cache dynamic content** - When hints include database queries
5. **Leverage CSS classes** - Reuse existing Tabler utility classes

---

### Optimization Tips

- Render hints server-side (no JavaScript overhead)
- Use Blade `@once` directive for repeated hints
- Cache translated hint text when using localization
- Minimize DOM nodes by combining multiple hints when possible
- Use CSS classes instead of inline styles

**Example:**
```blade
@once
    @push('styles')
        <style>
            .hint-compact { font-size: 0.75rem; margin-top: 0.25rem; }
        </style>
    @endpush
@endonce

<x-tabler::forms.hint class="hint-compact">Compact hint style</x-tabler::forms.hint>
```

---

## Notes

- Hint component renders as `<small>` element with `form-hint` class
- No JavaScript dependencies required
- Automatically inherits Tabler's form styling
- Compatible with all Tabler form components
- Use `d-block` class for full-width display
- Can be placed before or after form controls
- Supports HTML content in slot
- Works seamlessly with Laravel's validation system
- Always visible (unlike tooltips that require interaction)
- Ideal for critical information that shouldn't be hidden

---

## Related Components

- **[Help](./help.md)** - Popover-based help icon with hidden content
- **[Label](./label.md)** - Form label component
- **[Valid Feedback](./valid-feedback.md)** - Success validation feedback
- **[Invalid Feedback](./invalid-feedback.md)** - Error validation feedback
- **[Input Group](./input-group.md)** - Input with prepended/appended content
- **[Fieldset](./fieldset.md)** - Grouped form fields with legend

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/hint.blade.php`

---

## Changelog

### Version 1.0.0
- Initial release of Form Hint component
- Simple `<small>` element with `form-hint` class
- Full HTML attribute pass-through support
- Compatible with all Tabler form components
- Bootstrap 5 utility class support
- Accessible and semantic HTML structure
- No JavaScript dependencies
- Works with Laravel validation system
