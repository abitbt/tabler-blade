# Select

> Dropdown select component with validation, optgroups, and multiple selection support.

## Overview

The Select component provides a feature-rich dropdown select field with automatic Laravel validation integration, old input retrieval, and error handling. It supports both simple options and grouped options (optgroups), multiple selection, custom options via slots, and all standard accessibility features. The component automatically handles selection state and validation errors.

**Key Features:**
- Laravel validation integration (automatic error display)
- Old input retrieval (auto-selected after validation failures)
- Options array with optgroup support
- Multiple selection support
- Placeholder option
- Help text and error messages
- Size variants for multiple selects
- Required field indicator
- Auto-generated IDs
- Custom options via slot
- Accessible labels and ARIA attributes
- Optional wrapper control

**Use Case:** Use select components for choosing from predefined options including status fields, categories, countries, user roles, and any field requiring selection from a fixed set of choices. The component seamlessly integrates with Laravel's validation system.

---

## Basic Usage

```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    :options="['us' => 'United States', 'uk' => 'United Kingdom', 'ca' => 'Canada']" />
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name (used for validation, old input, and ID generation) |
| `id` | `string\|null` | `null` | Select ID (auto-generated from name if not provided) |
| `value` | `mixed\|array\|null` | `null` | Selected value(s) - string for single, array for multiple |
| `options` | `array` | `[]` | Options array (`value => label` or `group => [value => label]` for optgroups) |
| `placeholder` | `string\|null` | `null` | Placeholder option text (e.g., "Select an option...") |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above select |
| `error` | `string\|null` | `null` | Error message (overrides automatic Laravel validation errors) |
| `required` | `bool` | `false` | Mark field as required (adds asterisk to label) |
| `disabled` | `bool` | `false` | Disable field |
| `multiple` | `bool` | `false` | Enable multiple selection (name automatically gets `[]` suffix) |
| `size` | `int\|null` | `null` | Visible options count (for multiple selects) |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div for spacing |
| `class` | `string` | `''` | Additional CSS classes for select element |

**Note:** All additional HTML attributes are passed through to the select element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom option elements (alternative to `options` prop) |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Select States:**
- `is-valid` - Valid state styling (green border)
- `is-invalid` - Invalid state styling (auto-applied on error)

**Sizes:**
- `form-select-sm` - Small select
- `form-select-lg` - Large select

**Width:**
- `w-auto`, `w-25`, `w-50`, `w-75`, `w-100` - Width percentages

---

## Examples

### Basic Example

```blade
<x-tabler::forms.select
    name="status"
    label="Status"
    :options="['active' => 'Active', 'inactive' => 'Inactive']" />
```

**Output:** A standard dropdown select with label and automatic error handling

---

### With Placeholder

```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    placeholder="Select a country..."
    :options="[
        'us' => 'United States',
        'uk' => 'United Kingdom',
        'ca' => 'Canada'
    ]" />
```

---

### With Selected Value

```blade
<x-tabler::forms.select
    name="role"
    label="User Role"
    :value="$user->role"
    :options="[
        'admin' => 'Administrator',
        'moderator' => 'Moderator',
        'user' => 'User'
    ]" />
```

---

### Required Field

```blade
<x-tabler::forms.select
    name="category"
    label="Category"
    :options="$categories"
    required />
```

**Note:** Required fields automatically display a red asterisk (*) next to the label.

---

### With Help Text

```blade
<x-tabler::forms.select
    name="timezone"
    label="Timezone"
    help="Select your local timezone"
    :options="$timezones"
    required />
```

---

### With Optgroups

```blade
<x-tabler::forms.select
    name="fruit"
    label="Favorite Fruit"
    :options="[
        'Citrus' => [
            'orange' => 'Orange',
            'lemon' => 'Lemon',
            'lime' => 'Lime'
        ],
        'Berries' => [
            'strawberry' => 'Strawberry',
            'blueberry' => 'Blueberry',
            'raspberry' => 'Raspberry'
        ],
        'Tropical' => [
            'mango' => 'Mango',
            'pineapple' => 'Pineapple',
            'papaya' => 'Papaya'
        ]
    ]" />
```

---

### Multiple Selection

```blade
<x-tabler::forms.select
    name="skills"
    label="Skills"
    :options="[
        'php' => 'PHP',
        'javascript' => 'JavaScript',
        'python' => 'Python',
        'ruby' => 'Ruby',
        'go' => 'Go'
    ]"
    multiple
    :size="5" />
```

**Note:** When `multiple` is true, the name automatically gets `[]` suffix (e.g., `skills[]`).

---

### Multiple with Selected Values

```blade
<x-tabler::forms.select
    name="categories"
    label="Categories"
    :value="$post->categories->pluck('id')->toArray()"
    :options="$categories"
    multiple
    help="Hold Ctrl (Cmd on Mac) to select multiple"
    required />
```

---

### Custom Options via Slot

```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    placeholder="Select a country...">
    <option value="us">🇺🇸 United States</option>
    <option value="uk">🇬🇧 United Kingdom</option>
    <option value="ca">🇨🇦 Canada</option>
    <option value="au">🇦🇺 Australia</option>
</x-tabler::forms.select>
```

---

### Disabled State

```blade
<x-tabler::forms.select
    name="role"
    label="Role"
    :value="$user->role"
    :options="$roles"
    disabled />
```

---

### Custom Width

```blade
<x-tabler::forms.select
    name="month"
    label="Month"
    class="w-50"
    :options="[
        '01' => 'January',
        '02' => 'February',
        '03' => 'March'
    ]" />
```

---

### Size Variants

```blade
{{-- Small --}}
<x-tabler::forms.select
    name="status"
    label="Status"
    class="form-select-sm"
    :options="$statuses" />

{{-- Large --}}
<x-tabler::forms.select
    name="category"
    label="Category"
    class="form-select-lg"
    :options="$categories" />
```

---

### Without Wrapper

```blade
<div class="row">
    <div class="col-md-6 mb-3">
        <x-tabler::forms.select
            name="country"
            label="Country"
            :options="$countries"
            :wrapper="false" />
    </div>
    <div class="col-md-6 mb-3">
        <x-tabler::forms.select
            name="state"
            label="State"
            :options="$states"
            :wrapper="false" />
    </div>
</div>
```

---

## Laravel Integration

### Basic Form

```blade
<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <x-tabler::forms.select
        name="category_id"
        label="Category"
        placeholder="Select category..."
        :options="$categories->pluck('name', 'id')"
        required />

    <x-tabler::forms.select
        name="status"
        label="Status"
        :options="[
            'draft' => 'Draft',
            'published' => 'Published',
            'archived' => 'Archived'
        ]"
        required />

    <x-tabler::button type="submit" color="primary">
        Create Post
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
    <x-tabler::forms.select
        name="country"
        label="Country"
        :value="old('country', $user->country)"
        :options="$countries" />

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
        'country' => 'required|string|in:' . implode(',', array_keys($countries)),
    ]);

    // If validation fails, errors automatically appear in form
}
```

---

### With Old Input

The component **automatically retrieves old input** after failed validation:

```blade
{{-- Old input automatically used if available --}}
<x-tabler::forms.select
    name="role"
    label="Role"
    :value="old('role', $user->role ?? 'user')"
    :options="$roles" />
```

---

### With Eloquent Collections

```blade
{{-- From Eloquent collection --}}
<x-tabler::forms.select
    name="category_id"
    label="Category"
    :value="old('category_id')"
    :options="$categories->pluck('name', 'id')"
    required />

{{-- With placeholder --}}
<x-tabler::forms.select
    name="author_id"
    label="Author"
    placeholder="Select author..."
    :value="old('author_id', $post->author_id ?? null)"
    :options="$authors->pluck('name', 'id')" />
```

---

### Multiple with Relationships

```blade
<form method="POST" action="{{ route('posts.update', $post) }}">
    @csrf
    @method('PUT')

    <x-tabler::forms.select
        name="tags"
        label="Tags"
        :value="old('tags', $post->tags->pluck('id')->toArray())"
        :options="$tags->pluck('name', 'id')"
        multiple
        :size="6"
        help="Select multiple tags" />

    <x-tabler::button type="submit" color="primary">
        Update Post
    </x-tabler::button>
</form>
```

**Controller:**
```php
public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
    ]);

    $post->tags()->sync($validated['tags'] ?? []);
}
```

---

### Dynamic Optgroups

```blade
<x-tabler::forms.select
    name="location"
    label="Location"
    :options="$locations->groupBy('region')->map(fn($items) => $items->pluck('name', 'id'))->toArray()" />
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to/from select
- **Shift+Tab:** Moves focus backward
- **Arrow Up/Down:** Navigate options
- **Space/Enter:** Open dropdown
- **Type:** Quick search options
- **Ctrl+Click:** Select multiple (when `multiple` is enabled)

### ARIA Attributes
- `id` and `for`: Automatically associated for label/select
- `aria-invalid`: Applied when field has validation error
- `aria-required`: Applied when `required` prop is true
- `aria-describedby`: Links to help text and error messages

### Screen Reader Support
- Label is properly associated via `for`/`id` attributes
- Required fields announced as "required"
- Error messages announced when present
- Help text announced for context
- Optgroups properly announced

### Best Practices
- Always provide a `label` (or `aria-label`)
- Use descriptive option text
- Mark required fields with `required` prop
- Provide placeholder for better UX
- Use optgroups to organize long lists
- Ensure error messages are descriptive

**Example:**
```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    placeholder="Select your country..."
    help="This helps us customize your experience"
    required
    :options="$countries" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS)
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- Native select styling varies across browsers/OS
- Multiple select height may differ on mobile devices
- Some mobile browsers show custom native UI

---

## Events & Interactivity

### Framework Integration

**Livewire:**
```blade
<x-tabler::forms.select
    wire:model="status"
    name="status"
    label="Status"
    :options="[
        'pending' => 'Pending',
        'approved' => 'Approved',
        'rejected' => 'Rejected'
    ]" />

{{-- With lazy binding --}}
<x-tabler::forms.select
    wire:model.lazy="category"
    name="category"
    label="Category"
    :options="$categories" />

{{-- Dependent dropdowns --}}
<x-tabler::forms.select
    wire:model="country"
    name="country"
    label="Country"
    :options="$countries" />

<x-tabler::forms.select
    wire:model="state"
    name="state"
    label="State"
    :options="$states"
    :disabled="!$country" />
```

**Alpine.js:**
```blade
<div x-data="{ selected: '' }">
    <x-tabler::forms.select
        name="option"
        label="Select Option"
        x-model="selected"
        @change="console.log(selected)"
        :options="[
            'a' => 'Option A',
            'b' => 'Option B',
            'c' => 'Option C'
        ]" />

    <p x-show="selected">You selected: <span x-text="selected"></span></p>
</div>
```

**Standard JavaScript:**
```blade
<x-tabler::forms.select
    id="mySelect"
    name="select"
    label="Select"
    onchange="handleChange(this.value)"
    :options="$options" />

<script>
function handleChange(value) {
    console.log('Selected:', value);
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

**Issue: Selected value not showing**
- ✅ Verify value matches an option value exactly
- ✅ Check for type mismatch (string vs integer)
- ✅ Use `:value` (colon) for dynamic values
- ✅ Ensure old input is being used: `old('name', $value)`

**Issue: Options not displaying**
- ✅ Verify `:options` (with colon) for array binding
- ✅ Check array structure is correct (`value => label`)
- ✅ Ensure collection is converted: `->pluck('name', 'id')`
- ✅ Try using slot with manual options for debugging

**Issue: Multiple selection not working**
- ✅ Set `multiple` prop to `true`
- ✅ Pass array to `value` prop
- ✅ Validate as array in controller
- ✅ Check browser console for errors

**Issue: Required asterisk not showing**
- ✅ Set `required` prop to `true`
- ✅ Ensure label is provided
- ✅ Check CSS for `.text-danger` styling

**Issue: Placeholder showing when value selected**
- ✅ Ensure placeholder only for single selects
- ✅ Check if value actually matches an option
- ✅ Verify old input isn't empty string

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check `$errors` bag: `{{ $errors->toJson() }}`
- Verify form data in network tab
- Use `dd($options)` to check options array
- Test with manual `<option>` tags via slot
- Check Laravel logs for validation errors

---

## Real-World Examples

### Example 1: User Registration with Role Selection

```blade
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">Create User</h3>

        <form method="POST" action="{{ route('users.store') }}">
            @csrf

            <x-tabler::forms.input
                name="name"
                label="Full Name"
                :value="old('name')"
                required />

            <x-tabler::forms.input
                name="email"
                label="Email"
                type="email"
                :value="old('email')"
                required />

            <x-tabler::forms.select
                name="role"
                label="Role"
                placeholder="Select role..."
                :value="old('role', 'user')"
                :options="[
                    'admin' => 'Administrator',
                    'moderator' => 'Moderator',
                    'user' => 'User'
                ]"
                help="User permissions level"
                required />

            <x-tabler::forms.select
                name="department_id"
                label="Department"
                placeholder="Select department..."
                :value="old('department_id')"
                :options="$departments->pluck('name', 'id')"
                required />

            <x-tabler::button type="submit" color="primary">
                Create User
            </x-tabler::button>
        </form>
    </div>
</div>
```

**Use Case:** User creation with role and department selection

---

### Example 2: Post Editor with Categories and Tags

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Post</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('posts.update', $post) }}">
            @csrf
            @method('PUT')

            <x-tabler::forms.input
                name="title"
                label="Title"
                :value="old('title', $post->title)"
                required />

            <x-tabler::forms.select
                name="category_id"
                label="Category"
                :value="old('category_id', $post->category_id)"
                :options="$categories->pluck('name', 'id')"
                required />

            <x-tabler::forms.select
                name="tags"
                label="Tags"
                :value="old('tags', $post->tags->pluck('id')->toArray())"
                :options="$tags->pluck('name', 'id')"
                multiple
                :size="6"
                help="Select one or more tags" />

            <x-tabler::forms.select
                name="status"
                label="Status"
                :value="old('status', $post->status)"
                :options="[
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived'
                ]"
                required />

            <div class="btn-list">
                <x-tabler::button type="submit" color="primary">
                    Update Post
                </x-tabler::button>
                <x-tabler::button variant="outline" href="{{ route('posts.index') }}">
                    Cancel
                </x-tabler::button>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** Blog post editor with categories and multiple tags

---

### Example 3: Filter Form with Dependent Dropdowns

```blade
<div class="card" x-data="{ country: '{{ old('country') }}' }">
    <div class="card-body">
        <form method="GET" action="{{ route('users.index') }}">
            <div class="row">
                <div class="col-md-4">
                    <x-tabler::forms.select
                        name="country"
                        label="Country"
                        placeholder="All countries"
                        x-model="country"
                        :options="$countries"
                        :wrapper="false" />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.select
                        wire:model="state"
                        name="state"
                        label="State"
                        placeholder="All states"
                        :options="$states"
                        :disabled="!country"
                        :wrapper="false" />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.select
                        name="status"
                        label="Status"
                        placeholder="All statuses"
                        :options="[
                            'active' => 'Active',
                            'inactive' => 'Inactive'
                        ]"
                        :wrapper="false" />
                </div>
            </div>

            <div class="mt-3">
                <x-tabler::button type="submit" color="primary">
                    Apply Filters
                </x-tabler::button>
                <x-tabler::button type="button" variant="outline" onclick="window.location='{{ route('users.index') }}'">
                    Clear
                </x-tabler::button>
            </div>
        </form>
    </div>
</div>
```

**Use Case:** Search filters with dependent dropdowns

---

### Example 4: Settings Form with Grouped Options

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Application Settings</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            @method('PUT')

            <x-tabler::forms.select
                name="timezone"
                label="Timezone"
                :value="old('timezone', $settings->timezone)"
                :options="[
                    'America' => [
                        'America/New_York' => 'Eastern Time',
                        'America/Chicago' => 'Central Time',
                        'America/Denver' => 'Mountain Time',
                        'America/Los_Angeles' => 'Pacific Time'
                    ],
                    'Europe' => [
                        'Europe/London' => 'London',
                        'Europe/Paris' => 'Paris',
                        'Europe/Berlin' => 'Berlin'
                    ],
                    'Asia' => [
                        'Asia/Tokyo' => 'Tokyo',
                        'Asia/Shanghai' => 'Shanghai',
                        'Asia/Dubai' => 'Dubai'
                    ]
                ]"
                help="Your local timezone"
                required />

            <x-tabler::forms.select
                name="language"
                label="Language"
                :value="old('language', $settings->language)"
                :options="[
                    'en' => 'English',
                    'es' => 'Spanish',
                    'fr' => 'French',
                    'de' => 'German',
                    'ja' => 'Japanese'
                ]"
                required />

            <x-tabler::forms.select
                name="date_format"
                label="Date Format"
                :value="old('date_format', $settings->date_format)"
                :options="[
                    'Y-m-d' => date('Y-m-d') . ' (YYYY-MM-DD)',
                    'm/d/Y' => date('m/d/Y') . ' (MM/DD/YYYY)',
                    'd/m/Y' => date('d/m/Y') . ' (DD/MM/YYYY)'
                ]"
                required />

            <x-tabler::button type="submit" color="primary">
                Save Settings
            </x-tabler::button>
        </form>
    </div>
</div>
```

**Use Case:** Application settings with grouped timezone options

---

## Performance Considerations

### Component Weight
- Base component: ~200-300 bytes rendered
- With options: +size of options HTML
- With wrapper: +50 bytes (div wrapper)
- With validation: +100 bytes (error message)

### Best Practices
- Limit options to reasonable number (~100-200)
- Use search/autocomplete for very long lists
- Lazy load options for dependent dropdowns
- Cache frequently used option lists
- Use pagination for very large datasets

### Optimization Tips
- Cache Eloquent collections for options
- Use select2/choices.js for better UX with many options
- Eager load relationships for option generation
- Minimize database queries for options
- Consider API-based autocomplete for large datasets

---

## Notes

- `name` prop is **required** for Laravel integration
- Old input automatically overrides `value` prop
- Errors automatically retrieved from `$errors` bag
- Required asterisk automatically added to labels
- Component handles `for`/`id` association automatically
- IDs auto-generated from field names
- Multiple selection automatically adds `[]` to name
- Optgroups created from nested arrays
- Wrapper can be disabled for custom layouts
- Placeholder only shown when no value selected

---

## Related Components

- [Input](./input.md) - Text input field
- [Textarea](./textarea.md) - Multi-line text input
- [Checkbox](./checkbox.md) - Checkbox input
- [Radio](./radio.md) - Radio button input
- [Label](./label.md) - Standalone label component
- [Help](./help.md) - Help text component
- [Invalid Feedback](./invalid-feedback.md) - Error message component
- [Button](../button.md) - Form submission buttons

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/select.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with Laravel validation integration, optgroups, and multiple selection support
