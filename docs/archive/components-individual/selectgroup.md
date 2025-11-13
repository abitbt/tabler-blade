# Selectgroup

> A visually styled group of radio buttons or checkboxes displayed as button-style options for user selection.

## Overview

The Selectgroup component creates elegant button-style radio button or checkbox groups, perfect for presenting mutually exclusive options (radio mode) or multiple selections (checkbox mode). It provides a more modern and intuitive alternative to traditional form inputs with customizable styles including pills and boxes variants.

**Key Features:**
- Radio and checkbox input modes
- Button-style visual presentation
- Pills variant with spacing
- Boxes variant with borders
- Vertical and horizontal layouts
- Icon support in options
- Seamless Laravel validation integration
- Lightweight wrapper with flexible styling
- Accessible keyboard navigation
- Clean, semantic HTML structure

**Use Case:** Use selectgroups for presenting clear choice options like view toggles (grid/list), size selectors (S/M/L), payment periods (monthly/yearly), shipping methods, or any scenario where button-style selection improves UX over standard radio/checkboxes.

---

## Basic Usage

```blade
<x-tabler::forms.selectgroup>
    <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free" checked />
    <x-tabler::forms.selectgroup-item name="plan" value="pro" text="Pro" />
    <x-tabler::forms.selectgroup-item name="plan" value="enterprise" text="Enterprise" />
</x-tabler::forms.selectgroup>
```

---

## Props / Attributes

### Selectgroup Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wrapper` | `bool` | `true` | Wrap selectgroup in `mb-3` div for form spacing |
| `class` | `string` | `''` | Additional CSS classes (for variants like pills/boxes) |

**Note:** All additional HTML attributes are passed through to the selectgroup element.

### Selectgroup-Item Component

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Input name attribute (required for form submission) |
| `value` | `string\|null` | `null` | Input value |
| `checked` | `bool` | `false` | Whether item is selected/checked |
| `type` | `string` | `'radio'` | Input type: `radio` or `checkbox` |
| `text` | `string\|null` | `null` | Button text label (alternative to slot) |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** Use either `text` prop or slot content for the label, not both.

---

## Slots

### Selectgroup Component

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Contains `<x-tabler::forms.selectgroup-item>` components |

### Selectgroup-Item Component

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom label content (alternative to `text` prop) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute on the selectgroup component:

**Selectgroup Styles:**
- `form-selectgroup` - Base class (auto-applied)
- `form-selectgroup-pills` - Pill-shaped buttons with spacing between items
- `form-selectgroup-boxes` - Box-style buttons with borders and distinct containers

**Layout:**
- `d-flex flex-column` - Vertical layout (stack items vertically)
- `w-100` - Full width container

**Item Classes:**
- `form-selectgroup-item` - Base item class (auto-applied)
- `form-selectgroup-label` - Label wrapper (auto-applied)
- `form-selectgroup-input` - Hidden input (auto-applied)

---

## Examples

### Basic Radio Group

```blade
<x-tabler::forms.selectgroup>
    <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free" checked />
    <x-tabler::forms.selectgroup-item name="plan" value="pro" text="Pro" />
    <x-tabler::forms.selectgroup-item name="plan" value="enterprise" text="Enterprise" />
</x-tabler::forms.selectgroup>
```

**Output:** A horizontal radio button group with three options, "Free" pre-selected

---

### Pills Style

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item name="size" value="sm" text="Small" />
    <x-tabler::forms.selectgroup-item name="size" value="md" text="Medium" checked />
    <x-tabler::forms.selectgroup-item name="size" value="lg" text="Large" />
</x-tabler::forms.selectgroup>
```

**Output:** Pill-shaped buttons with spacing, "Medium" pre-selected

---

### Boxes Style

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-boxes">
    <x-tabler::forms.selectgroup-item name="payment" value="card" text="Credit Card" checked />
    <x-tabler::forms.selectgroup-item name="payment" value="paypal" text="PayPal" />
    <x-tabler::forms.selectgroup-item name="payment" value="crypto" text="Cryptocurrency" />
</x-tabler::forms.selectgroup>
```

**Output:** Box-style buttons with borders creating distinct containers

---

### With Icons

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item name="view" value="grid" icon="layout-grid" text="Grid" />
    <x-tabler::forms.selectgroup-item name="view" value="list" icon="list" text="List" checked />
    <x-tabler::forms.selectgroup-item name="view" value="board" icon="layout-board" text="Board" />
</x-tabler::forms.selectgroup>
```

**Output:** Pill-style buttons with leading icons for visual clarity

---

### Checkbox Mode (Multiple Selection)

```blade
<x-tabler::forms.selectgroup>
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="wifi"
        text="WiFi"
        type="checkbox"
        checked />
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="parking"
        text="Parking"
        type="checkbox" />
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="pool"
        text="Swimming Pool"
        type="checkbox" />
</x-tabler::forms.selectgroup>
```

**Output:** Multiple selection group allowing users to check multiple amenities

---

### Vertical Layout

```blade
<x-tabler::forms.selectgroup class="d-flex flex-column">
    <x-tabler::forms.selectgroup-item name="shipping" value="standard" text="Standard (5-7 days)" checked />
    <x-tabler::forms.selectgroup-item name="shipping" value="express" text="Express (2-3 days)" />
    <x-tabler::forms.selectgroup-item name="shipping" value="overnight" text="Overnight" />
</x-tabler::forms.selectgroup>
```

**Output:** Vertically stacked options instead of horizontal layout

---

### With Custom Slot Content

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-boxes">
    <x-tabler::forms.selectgroup-item name="plan" value="basic">
        <strong>Basic</strong><br>
        <small class="text-muted">$9/month</small>
    </x-tabler::forms.selectgroup-item>
    <x-tabler::forms.selectgroup-item name="plan" value="pro" checked>
        <strong>Pro</strong><br>
        <small class="text-muted">$29/month</small>
    </x-tabler::forms.selectgroup-item>
    <x-tabler::forms.selectgroup-item name="plan" value="enterprise">
        <strong>Enterprise</strong><br>
        <small class="text-muted">Contact sales</small>
    </x-tabler::forms.selectgroup-item>
</x-tabler::forms.selectgroup>
```

**Output:** Complex label content with pricing information using slots

---

### Product Size Selector

```blade
<label class="form-label">Select Size</label>
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item name="size" value="xs" text="XS" />
    <x-tabler::forms.selectgroup-item name="size" value="s" text="S" />
    <x-tabler::forms.selectgroup-item name="size" value="m" text="M" checked />
    <x-tabler::forms.selectgroup-item name="size" value="l" text="L" />
    <x-tabler::forms.selectgroup-item name="size" value="xl" text="XL" />
</x-tabler::forms.selectgroup>
```

**Output:** Common e-commerce size selection with pills

---

### Payment Period Toggle

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item
        name="billing_period"
        value="monthly"
        text="Monthly"
        checked />
    <x-tabler::forms.selectgroup-item
        name="billing_period"
        value="yearly"
        text="Yearly (Save 20%)" />
</x-tabler::forms.selectgroup>
```

**Output:** Simple two-option toggle for billing frequency

---

### Without Wrapper

```blade
<x-tabler::forms.selectgroup :wrapper="false" class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item name="color" value="red" text="Red" />
    <x-tabler::forms.selectgroup-item name="color" value="blue" text="Blue" checked />
    <x-tabler::forms.selectgroup-item name="color" value="green" text="Green" />
</x-tabler::forms.selectgroup>
```

**Output:** Selectgroup without the default `mb-3` wrapper for custom layouts

---

### Full-Width Vertical Layout

```blade
<x-tabler::forms.selectgroup class="d-flex flex-column w-100">
    <x-tabler::forms.selectgroup-item
        name="notification"
        value="all"
        text="All notifications"
        checked />
    <x-tabler::forms.selectgroup-item
        name="notification"
        value="important"
        text="Important only" />
    <x-tabler::forms.selectgroup-item
        name="notification"
        value="none"
        text="None" />
</x-tabler::forms.selectgroup>
```

**Output:** Full-width vertical selection group

---

### With Icons and Pills

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item
        name="theme"
        value="light"
        icon="sun"
        text="Light" />
    <x-tabler::forms.selectgroup-item
        name="theme"
        value="dark"
        icon="moon"
        text="Dark"
        checked />
    <x-tabler::forms.selectgroup-item
        name="theme"
        value="auto"
        icon="adjustments"
        text="Auto" />
</x-tabler::forms.selectgroup>
```

**Output:** Theme selector with appropriate icons in pill style

---

### Complete Example (E-commerce Shipping)

```blade
<div class="mb-3">
    <label class="form-label">Select Shipping Method</label>
    <x-tabler::forms.selectgroup class="form-selectgroup-boxes">
        <x-tabler::forms.selectgroup-item name="shipping_method" value="standard">
            <div class="d-flex align-items-center justify-content-between w-100">
                <div>
                    <strong>Standard Delivery</strong><br>
                    <small class="text-muted">5-7 business days</small>
                </div>
                <strong>Free</strong>
            </div>
        </x-tabler::forms.selectgroup-item>
        <x-tabler::forms.selectgroup-item name="shipping_method" value="express" checked>
            <div class="d-flex align-items-center justify-content-between w-100">
                <div>
                    <strong>Express Delivery</strong><br>
                    <small class="text-muted">2-3 business days</small>
                </div>
                <strong>$9.99</strong>
            </div>
        </x-tabler::forms.selectgroup-item>
        <x-tabler::forms.selectgroup-item name="shipping_method" value="overnight">
            <div class="d-flex align-items-center justify-content-between w-100">
                <div>
                    <strong>Overnight Delivery</strong><br>
                    <small class="text-muted">Next business day</small>
                </div>
                <strong>$24.99</strong>
            </div>
        </x-tabler::forms.selectgroup-item>
    </x-tabler::forms.selectgroup>
    @error('shipping_method')
        <div class="invalid-feedback d-block">{{ $message }}</div>
    @enderror
</div>
```

**Output:** Rich shipping method selector with descriptions and prices

---

## Laravel Integration

### Form Submission

```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Notification Preferences</label>
        <x-tabler::forms.selectgroup class="form-selectgroup-pills">
            <x-tabler::forms.selectgroup-item
                name="notifications"
                value="all"
                text="All"
                :checked="old('notifications', $user->notifications) === 'all'" />
            <x-tabler::forms.selectgroup-item
                name="notifications"
                value="important"
                text="Important Only"
                :checked="old('notifications', $user->notifications) === 'important'" />
            <x-tabler::forms.selectgroup-item
                name="notifications"
                value="none"
                text="None"
                :checked="old('notifications', $user->notifications) === 'none'" />
        </x-tabler::forms.selectgroup>
        @error('notifications')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <x-tabler::button type="submit" color="primary">
        Save Preferences
    </x-tabler::button>
</form>
```

---

### Validation with Form Requests

**Form Request:**
```php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePreferencesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'plan' => ['required', 'in:free,pro,enterprise'],
            'size' => ['required', 'in:xs,s,m,l,xl'],
            'features' => ['array'],
            'features.*' => ['in:wifi,parking,pool'],
        ];
    }

    public function messages(): array
    {
        return [
            'plan.required' => 'Please select a plan.',
            'plan.in' => 'Invalid plan selected.',
            'size.required' => 'Please select a size.',
            'features.*.in' => 'Invalid feature selected.',
        ];
    }
}
```

**Controller:**
```php
namespace App\Http\Controllers;

use App\Http\Requests\UpdatePreferencesRequest;

class PreferencesController extends Controller
{
    public function update(UpdatePreferencesRequest $request)
    {
        $validated = $request->validated();

        auth()->user()->update([
            'plan' => $validated['plan'],
            'size' => $validated['size'],
            'features' => $validated['features'] ?? [],
        ]);

        return redirect()->back()->with('success', 'Preferences updated successfully!');
    }
}
```

**View:**
```blade
<form method="POST" action="{{ route('preferences.update') }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Select Plan</label>
        <x-tabler::forms.selectgroup class="form-selectgroup-boxes">
            <x-tabler::forms.selectgroup-item
                name="plan"
                value="free"
                text="Free"
                :checked="old('plan', auth()->user()->plan) === 'free'" />
            <x-tabler::forms.selectgroup-item
                name="plan"
                value="pro"
                text="Pro"
                :checked="old('plan', auth()->user()->plan) === 'pro'" />
            <x-tabler::forms.selectgroup-item
                name="plan"
                value="enterprise"
                text="Enterprise"
                :checked="old('plan', auth()->user()->plan) === 'enterprise'" />
        </x-tabler::forms.selectgroup>
        @error('plan')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>

    <x-tabler::button type="submit" color="primary">Update</x-tabler::button>
</form>
```

---

### With Livewire

```blade
<div>
    <label class="form-label">Payment Method</label>
    <x-tabler::forms.selectgroup class="form-selectgroup-pills">
        <x-tabler::forms.selectgroup-item
            name="payment_method"
            value="card"
            icon="credit-card"
            text="Credit Card"
            wire:model.live="paymentMethod"
            :checked="$paymentMethod === 'card'" />
        <x-tabler::forms.selectgroup-item
            name="payment_method"
            value="paypal"
            icon="brand-paypal"
            text="PayPal"
            wire:model.live="paymentMethod"
            :checked="$paymentMethod === 'paypal'" />
        <x-tabler::forms.selectgroup-item
            name="payment_method"
            value="crypto"
            icon="currency-bitcoin"
            text="Crypto"
            wire:model.live="paymentMethod"
            :checked="$paymentMethod === 'crypto'" />
    </x-tabler::forms.selectgroup>

    @if($paymentMethod === 'card')
        {{-- Credit card form fields --}}
    @elseif($paymentMethod === 'paypal')
        {{-- PayPal integration --}}
    @elseif($paymentMethod === 'crypto')
        {{-- Crypto wallet address --}}
    @endif
</div>
```

**Component:**
```php
use Livewire\Component;

class PaymentForm extends Component
{
    public string $paymentMethod = 'card';

    public function render()
    {
        return view('livewire.payment-form');
    }
}
```

---

### Old Input Handling

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item
        name="size"
        value="s"
        text="Small"
        :checked="old('size', $product->size ?? 'm') === 's'" />
    <x-tabler::forms.selectgroup-item
        name="size"
        value="m"
        text="Medium"
        :checked="old('size', $product->size ?? 'm') === 'm'" />
    <x-tabler::forms.selectgroup-item
        name="size"
        value="l"
        text="Large"
        :checked="old('size', $product->size ?? 'm') === 'l'" />
</x-tabler::forms.selectgroup>
```

---

### Checkbox Mode with Collections

```blade
<label class="form-label">Select Features</label>
<x-tabler::forms.selectgroup class="form-selectgroup-boxes">
    @php
        $userFeatures = old('features', $user->features ?? []);
    @endphp

    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="notifications"
        text="Email Notifications"
        type="checkbox"
        :checked="in_array('notifications', $userFeatures)" />
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="newsletter"
        text="Newsletter"
        type="checkbox"
        :checked="in_array('newsletter', $userFeatures)" />
    <x-tabler::forms.selectgroup-item
        name="features[]"
        value="promotions"
        text="Promotions"
        type="checkbox"
        :checked="in_array('promotions', $userFeatures)" />
</x-tabler::forms.selectgroup>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus between selectgroup items
- **Space:** Toggles selection on focused item
- **Arrow Keys:** Navigate between items within group
- **Enter:** Selects focused radio item

### ARIA Attributes
- Native radio/checkbox semantics maintained
- Labels properly associated with inputs
- Keyboard navigation fully supported

### Screen Reader Support
- Radio groups announced as "radio group"
- Checkbox groups announced as "checkbox group"
- Selected state announced: "checked" or "not checked"
- Item labels read clearly

### Best Practices
- Always provide a visible label for the group (use `<label class="form-label">`)
- Use descriptive text for each option
- Include icons for visual clarity (not required for accessibility)
- Show validation errors in accessible format
- Ensure sufficient color contrast (handled by Tabler defaults)
- Use radio for mutually exclusive options
- Use checkbox for multiple selections

**Example:**
```blade
<fieldset>
    <legend class="form-label">Select Your Plan</legend>
    <x-tabler::forms.selectgroup class="form-selectgroup-boxes">
        <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free Plan" />
        <x-tabler::forms.selectgroup-item name="plan" value="pro" text="Pro Plan" />
    </x-tabler::forms.selectgroup>
</fieldset>
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS for styling)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon prop
- Modern CSS support (Flexbox, CSS custom properties)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Pills spacing may vary slightly in older Safari versions
- Focus outline styling may differ across browsers (use CSS custom properties)

---

## Troubleshooting

### Common Issues

**Issue: Form not submitting selected value**
- ✅ Ensure `name` attribute is set on selectgroup-item
- ✅ Check form `method` is POST
- ✅ Verify `@csrf` token is included in form
- ✅ Inspect browser devtools to see if input value is in form data
- ✅ For checkboxes, use `name="field[]"` array notation

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix (e.g., `icon="check"` not `icon="tabler-check"`)
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Checked state not working**
- ✅ Use `checked` not `checked="true"` (it's a boolean prop)
- ✅ For dynamic checked state, use `:checked="$variable === 'value'"`
- ✅ Check old input: `old('field', $default) === 'value'`
- ✅ Only one radio item should have `checked` in radio mode

**Issue: Pills/boxes style not applying**
- ✅ Add class to selectgroup component, not selectgroup-item
- ✅ Use correct class name: `form-selectgroup-pills` or `form-selectgroup-boxes`
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check for CSS conflicts in custom stylesheets

**Issue: Validation errors not showing**
- ✅ Use `@error('field')` directive below selectgroup
- ✅ Add `d-block` class to invalid-feedback: `<div class="invalid-feedback d-block">`
- ✅ Verify field name matches validation rule key
- ✅ For checkbox arrays, use `@error('features')`

**Issue: Selectgroup too narrow/wide**
- ✅ Use parent container width control: wrap in `<div class="col-md-6">`
- ✅ Add `w-100` class for full width
- ✅ Use CSS Grid or Flexbox on parent for custom sizing
- ✅ Pills naturally wrap on smaller screens

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if input `name` and `value` attributes are present
- Verify checked attribute exists on selected items
- Test form submission in network tab
- Validate that form data includes expected field
- Clear view cache when changes don't appear

---

## Real-World Examples

### Example 1: E-commerce Product Options

```blade
<form method="POST" action="{{ route('cart.add', $product) }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Select Color</label>
        <x-tabler::forms.selectgroup class="form-selectgroup-pills">
            @foreach($product->colors as $color)
                <x-tabler::forms.selectgroup-item
                    name="color"
                    :value="$color->id"
                    :text="$color->name"
                    :checked="$loop->first" />
            @endforeach
        </x-tabler::forms.selectgroup>
    </div>

    <div class="mb-3">
        <label class="form-label">Select Size</label>
        <x-tabler::forms.selectgroup class="form-selectgroup-pills">
            @foreach($product->sizes as $size)
                <x-tabler::forms.selectgroup-item
                    name="size"
                    :value="$size->id"
                    :text="$size->name"
                    :checked="$size->name === 'M'" />
            @endforeach
        </x-tabler::forms.selectgroup>
    </div>

    <x-tabler::button type="submit" color="primary" icon="shopping-cart">
        Add to Cart
    </x-tabler::button>
</form>
```

**Use Case:** Dynamic product variant selection in e-commerce

---

### Example 2: Survey/Quiz Interface

```blade
<form method="POST" action="{{ route('survey.submit') }}">
    @csrf

    @foreach($questions as $question)
        <div class="mb-4">
            <label class="form-label">{{ $question->text }}</label>
            <x-tabler::forms.selectgroup class="d-flex flex-column">
                @foreach($question->options as $option)
                    <x-tabler::forms.selectgroup-item
                        name="answers[{{ $question->id }}]"
                        :value="$option->id"
                        :text="$option->text" />
                @endforeach
            </x-tabler::forms.selectgroup>
            @error("answers.{$question->id}")
                <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
        </div>
    @endforeach

    <x-tabler::button type="submit" color="primary">Submit Survey</x-tabler::button>
</form>
```

**Use Case:** Multi-question survey with vertical layouts

---

### Example 3: Settings Panel with Multiple Sections

```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Notification Settings</h3>

            <div class="mb-3">
                <label class="form-label">Email Frequency</label>
                <x-tabler::forms.selectgroup class="form-selectgroup-pills">
                    <x-tabler::forms.selectgroup-item
                        name="email_frequency"
                        value="realtime"
                        text="Real-time"
                        :checked="$settings->email_frequency === 'realtime'" />
                    <x-tabler::forms.selectgroup-item
                        name="email_frequency"
                        value="daily"
                        text="Daily Digest"
                        :checked="$settings->email_frequency === 'daily'" />
                    <x-tabler::forms.selectgroup-item
                        name="email_frequency"
                        value="weekly"
                        text="Weekly"
                        :checked="$settings->email_frequency === 'weekly'" />
                    <x-tabler::forms.selectgroup-item
                        name="email_frequency"
                        value="never"
                        text="Never"
                        :checked="$settings->email_frequency === 'never'" />
                </x-tabler::forms.selectgroup>
            </div>

            <div class="mb-3">
                <label class="form-label">Notification Types</label>
                <x-tabler::forms.selectgroup class="form-selectgroup-boxes">
                    <x-tabler::forms.selectgroup-item
                        name="notification_types[]"
                        value="updates"
                        text="Product Updates"
                        type="checkbox"
                        :checked="in_array('updates', $settings->notification_types)" />
                    <x-tabler::forms.selectgroup-item
                        name="notification_types[]"
                        value="promotions"
                        text="Promotions"
                        type="checkbox"
                        :checked="in_array('promotions', $settings->notification_types)" />
                    <x-tabler::forms.selectgroup-item
                        name="notification_types[]"
                        value="newsletter"
                        text="Newsletter"
                        type="checkbox"
                        :checked="in_array('newsletter', $settings->notification_types)" />
                </x-tabler::forms.selectgroup>
            </div>
        </div>

        <div class="card-footer text-end">
            <x-tabler::button type="submit" color="primary">
                Save Settings
            </x-tabler::button>
        </div>
    </div>
</form>
```

**Use Case:** Comprehensive settings page with mixed radio/checkbox groups

---

## Performance Considerations

### Component Weight
- Base selectgroup: ~100-150 bytes rendered
- Each item: ~150-200 bytes
- With icons: +2KB per icon (SVG)
- Pills/boxes style: +50 bytes per variant

### Best Practices
- Limit number of items (5-8 ideal, max 12 for usability)
- Use vertical layout for many options
- Consider dropdown for 10+ options
- Lazy load dynamic options when possible

### Optimization Tips
- Cache icon SVGs with proper headers
- Pre-render static selectgroups
- Use CSS classes directly for repeated patterns
- Minimize DOM re-renders in dynamic scenarios
- Consider radio over checkbox when only one selection needed

---

## Notes

### Radio vs Checkbox Mode
- **Radio:** Mutually exclusive (only one selection)
  - Use `type="radio"` (default)
  - All items must share same `name` attribute
  - One item should have `checked` attribute
- **Checkbox:** Multiple selections allowed
  - Use `type="checkbox"`
  - Use array notation: `name="features[]"`
  - Multiple items can have `checked` attribute

### Pills vs Boxes
- **Pills:** Rounded, spaced buttons (modern look)
  - Use `class="form-selectgroup-pills"`
  - Best for: view toggles, simple options, theme selection
- **Boxes:** Bordered containers (structured look)
  - Use `class="form-selectgroup-boxes"`
  - Best for: pricing plans, shipping methods, detailed options

### Wrapper Prop
- Default `wrapper="true"` adds `<div class="mb-3">` for form spacing
- Set `wrapper="false"` for custom layouts or when nesting in other components
- Wrapper only affects outer div, not the selectgroup itself

---

## Related Components

- [Select](./select.md) - Dropdown select for many options (pending)
- [Radio](./radio.md) - Traditional radio buttons (pending)
- [Checkbox](./checkbox.md) - Traditional checkboxes (pending)
- [Button](./button.md) - Button component for form actions
- [Input](./input.md) - Text input fields (pending)

---

## Source

**File Location:**
- Main component: `tabler-blade/stubs/resources/views/tabler/forms/selectgroup.blade.php`
- Item component: `tabler-blade/stubs/resources/views/tabler/forms/selectgroup-item.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with radio/checkbox modes, pills/boxes variants, icon support
