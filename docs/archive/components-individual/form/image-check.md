---
title: Image Check
description: Create visually rich selection interfaces with image-based checkboxes and radio buttons for improved user experience.
---

The Image Check component provides a visually appealing way to present options with images that users can select using checkboxes or radio buttons. This component combines the functionality of traditional form inputs with rich visual representation, making it ideal for scenarios like template selection, avatar choosers, product variants, and more.

## Basic Usage

The simplest form of an image check requires a name, value, and image path:

```blade
<x-tabler::form.image-check
    name="avatar"
    value="avatar-1"
    image="/images/avatars/avatar-1.jpg"
/>
```

This creates a single image-based checkbox that users can select by clicking on the image.

## Multiple Selection (Checkboxes)

For multiple selection scenarios, use checkboxes with array notation in the name:

```blade
<div class="row">
    <div class="col-md-4">
        <x-tabler::form.image-check
            name="features[]"
            value="analytics"
            image="/images/features/analytics.jpg"
            label="Advanced Analytics"
        />
    </div>
    <div class="col-md-4">
        <x-tabler::form.image-check
            name="features[]"
            value="reporting"
            image="/images/features/reporting.jpg"
            label="Custom Reports"
        />
    </div>
    <div class="col-md-4">
        <x-tabler::form.image-check
            name="features[]"
            value="automation"
            image="/images/features/automation.jpg"
            label="Workflow Automation"
        />
    </div>
</div>
```

## Single Selection (Radio Buttons)

For mutually exclusive options, use radio buttons by setting the same name for all options:

```blade
<div class="row">
    <div class="col-md-3">
        <x-tabler::form.image-check
            type="radio"
            name="theme"
            value="light"
            image="/images/themes/light-theme.jpg"
            label="Light Theme"
        />
    </div>
    <div class="col-md-3">
        <x-tabler::form.image-check
            type="radio"
            name="theme"
            value="dark"
            image="/images/themes/dark-theme.jpg"
            label="Dark Theme"
        />
    </div>
    <div class="col-md-3">
        <x-tabler::form.image-check
            type="radio"
            name="theme"
            value="auto"
            image="/images/themes/auto-theme.jpg"
            label="Auto Theme"
        />
    </div>
    <div class="col-md-3">
        <x-tabler::form.image-check
            type="radio"
            name="theme"
            value="custom"
            image="/images/themes/custom-theme.jpg"
            label="Custom Theme"
        />
    </div>
</div>
```

## Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string` | `null` | Name attribute for the input field (required) |
| `value` | `string\|int` | `null` | Value of the input when selected |
| `type` | `string` | `checkbox` | Input type: `checkbox` or `radio` |
| `image` | `string` | `null` | Path to the image file |
| `alt` | `string` | `''` | Alt text for the image (accessibility) |
| `label` | `string` | `null` | Label text displayed below the image |
| `checked` | `bool` | `false` | Whether the input is checked by default |
| `disabled` | `bool` | `false` | Whether the input is disabled |
| `required` | `bool` | `false` | Whether the input is required |
| `id` | `string` | Auto-generated | Unique identifier for the input |
| `imageClass` | `string` | `''` | Additional CSS classes for the image |
| `containerClass` | `string` | `''` | Additional CSS classes for the container |
| `labelClass` | `string` | `''` | Additional CSS classes for the label |

## Slots

### Default Slot

The default slot allows you to provide custom content instead of or in addition to an image:

```blade
<x-tabler::form.image-check
    name="plan"
    value="premium"
>
    <div class="text-center p-4 bg-gradient-to-br from-blue-500 to-purple-600 text-white rounded">
        <svg class="w-16 h-16 mx-auto mb-2" fill="currentColor" viewBox="0 0 20 20">
            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
        </svg>
        <h3 class="text-lg font-bold">Premium</h3>
        <p class="text-sm">$29/month</p>
    </div>
</x-tabler::form.image-check>
```

### Label Slot

The label slot provides custom label content:

```blade
<x-tabler::form.image-check
    name="template"
    value="modern"
    image="/images/templates/modern.jpg"
>
    <x-slot:label>
        <div class="d-flex align-items-center justify-content-between">
            <span class="fw-bold">Modern Template</span>
            <span class="badge bg-success">Popular</span>
        </div>
    </x-slot:label>
</x-tabler::form.image-check>
```

## CSS Classes

The Image Check component applies the following CSS classes:

### Container Classes

- `form-imagecheck` - Base container class
- `form-imagecheck-figure` - Image container
- `form-imagecheck-input` - Hidden input element
- `form-imagecheck-image` - Image element

### State Classes

- `form-imagecheck-checked` - Applied when the input is checked
- `form-imagecheck-disabled` - Applied when the input is disabled

### Custom Classes

You can add custom classes to different parts of the component:

```blade
<x-tabler::form.image-check
    name="product"
    value="pro"
    image="/images/products/pro.jpg"
    containerClass="border border-primary"
    imageClass="rounded-3"
    labelClass="text-primary fw-bold"
/>
```

## Pre-selected Values

Set default selections using the `checked` prop:

```blade
<x-tabler::form.image-check
    name="language"
    value="en"
    image="/images/flags/en.png"
    label="English"
    checked
/>
```

For multiple selections with old input values:

```blade
<x-tabler::form.image-check
    name="interests[]"
    value="sports"
    image="/images/interests/sports.jpg"
    label="Sports"
    :checked="in_array('sports', old('interests', []))"
/>
```

For radio buttons with old input:

```blade
<x-tabler::form.image-check
    type="radio"
    name="subscription"
    value="monthly"
    image="/images/plans/monthly.jpg"
    label="Monthly Plan"
    :checked="old('subscription') === 'monthly'"
/>
```

## Disabled State

Prevent selection by disabling specific options:

```blade
<x-tabler::form.image-check
    name="plan"
    value="enterprise"
    image="/images/plans/enterprise.jpg"
    label="Enterprise Plan (Coming Soon)"
    disabled
/>
```

Combine disabled with checked to show pre-selected, locked options:

```blade
<x-tabler::form.image-check
    name="current_plan"
    value="basic"
    image="/images/plans/basic.jpg"
    label="Basic Plan (Current)"
    checked
    disabled
/>
```

## Required Input

Make selections mandatory with the `required` prop:

```blade
<x-tabler::form.image-check
    type="radio"
    name="shipping_method"
    value="express"
    image="/images/shipping/express.jpg"
    label="Express Shipping"
    required
/>
```

## Accessibility

### Alt Text

Always provide descriptive alt text for images:

```blade
<x-tabler::form.image-check
    name="avatar"
    value="avatar-1"
    image="/images/avatars/avatar-1.jpg"
    alt="Professional avatar with blue background"
    label="Avatar 1"
/>
```

### Keyboard Navigation

The component supports standard keyboard navigation:

- **Tab** - Move focus between image checks
- **Space** - Toggle selection for checkboxes
- **Enter** - Select radio button
- **Arrow Keys** - Navigate between radio buttons in a group

### ARIA Attributes

The component automatically includes appropriate ARIA attributes:

```blade
<x-tabler::form.image-check
    name="category"
    value="tech"
    image="/images/categories/tech.jpg"
    label="Technology"
    required
/>
```

This generates HTML with `aria-required="true"` when required.

## Laravel Validation

### Form Request Validation

Create a form request for validating image check selections:

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTemplateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'template' => ['required', 'string', 'in:minimal,modern,classic,creative,business,premium'],
        ];
    }

    public function messages(): array
    {
        return [
            'template.required' => 'Please select a template.',
            'template.in' => 'The selected template is invalid.',
        ];
    }
}
```

For multiple selections:

```php
<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubscriptionFeaturesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'features' => ['nullable', 'array'],
            'features.*' => ['string', 'in:analytics,priority_support,api_access,white_label,custom_domain,team_collaboration'],
        ];
    }

    public function messages(): array
    {
        return [
            'features.array' => 'Invalid features format.',
            'features.*.in' => 'One or more selected features are invalid.',
        ];
    }
}
```

### Controller Usage

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateTemplateRequest;
use Illuminate\Http\RedirectResponse;

class SettingsController extends Controller
{
    public function updateTemplate(UpdateTemplateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $user->update(['template' => $request->validated('template')]);

        return back()->with('success', 'Template updated successfully!');
    }
}
```

For multiple selections:

```php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateSubscriptionFeaturesRequest;
use Illuminate\Http\RedirectResponse;

class SubscriptionController extends Controller
{
    public function updateFeatures(UpdateSubscriptionFeaturesRequest $request): RedirectResponse
    {
        $subscription = $request->user()->subscription;
        $features = $request->validated('features', []);

        $subscription->update(['features' => $features]);

        return back()->with('success', 'Subscription features updated successfully!');
    }
}
```

## Browser Support

The Image Check component works in all modern browsers:

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Related Components

- [Checkbox](checkbox.md) - Standard checkbox inputs
- [Radio](radio.md) - Standard radio button inputs
- [Switch](switch.md) - Toggle switch inputs
- [Select](select.md) - Dropdown selection inputs
