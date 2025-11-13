# Form Components

> Complete collection of form input components with Laravel validation, accessibility features, and seamless integration.

## Overview

The Form Components group provides a comprehensive set of input controls for building feature-rich, accessible forms in Laravel applications. All components seamlessly integrate with Laravel's validation system, automatically displaying errors and preserving user input after validation failures. From basic text inputs to advanced visual selectors, these components handle the complexity of form building while maintaining clean, intuitive syntax.

**What problems these components solve:**
- Automatic Laravel validation integration eliminates boilerplate error handling
- Consistent styling and behavior across all input types
- Built-in accessibility with proper ARIA attributes and screen reader support
- Old input retrieval without manual `old()` helper calls
- Unified API across different input types

**Common use cases:**
- User registration and login forms
- Profile editing and settings pages
- Content creation and editing interfaces
- Search and filter forms
- Multi-step wizards and surveys

**How they work together:**
All form components share a common design philosophy with props for labels, help text, validation errors, and states. Components can be mixed and matched within forms, fieldsets, and input groups to create complex layouts. Helper components (Label, Help, Hint, Feedback) provide additional context and validation messages.

**Components in this group:**
- **Basic Inputs:** Input, Textarea, Select, Checkbox, Radio, Switch
- **File Inputs:** File, Range
- **Visual Selectors:** Color Picker, Color Check, Image Check
- **Form Helpers:** Label, Help, Hint, Valid Feedback, Invalid Feedback
- **Input Groups:** Input Group, Fieldset, Selectgroup, Selectgroup Item

---

## Quick Start

The most common use case to get started quickly:

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

    <x-tabler::forms.select
        name="role"
        label="Role"
        :options="['user' => 'User', 'admin' => 'Admin']"
        required />

    <x-tabler::forms.checkbox
        name="terms"
        label="I agree to the Terms of Service" />

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
```

**Installation**: No additional installation needed - included with tabler-blade package.

---

## Component Comparison

Choose the right component for your needs:

| Component | Best For | Key Features | When to Use |
|-----------|----------|--------------|-------------|
| Input | Single-line text | Icons, loading states, types | Email, password, name, search fields |
| Textarea | Multi-line text | Auto-resize, row control | Comments, descriptions, long text |
| Select | Predefined choices | Optgroups, multiple selection | Status, category, country selection |
| Checkbox | Multiple boolean choices | Inline layout, help text | Terms acceptance, feature selection |
| Radio | Single choice from options | Grouped selection, inline | Plan selection, yes/no questions |
| Switch | Toggle on/off | Visual toggle state | Settings, feature flags |
| File | File uploads | Multiple files, accept types | Document, image uploads |
| Range | Numeric slider | Min/max/step control | Volume, price range, ratings |
| Color Picker | Color selection | Native HTML5 picker | Theme colors, background selection |
| Color Check | Visual color choice | Radio/checkbox for colors | Color palette selection |
| Image Check | Visual image choice | Template/layout selection | Template picker, feature selection |
| Label | Standalone labels | Required indicator | Custom label placement |
| Help | Contextual help | Popover on click | Additional field information |
| Hint | Inline help text | Small descriptive text | Format examples, requirements |
| Valid Feedback | Success messages | Green validation state | Username availability |
| Invalid Feedback | Error messages | Red validation state | Custom validation errors |
| Input Group | Input with addons | Prepend/append text/buttons | Currency symbols, search buttons |
| Fieldset | Group related fields | Legend support | Billing/shipping sections |
| Selectgroup | Button-style selection | Pills, boxes, icons | View mode, size selection |

**Quick Decision Tree**:
- Need single-line text? → Use **Input**
- Need multiple lines? → Use **Textarea**
- Need to choose from list? → Use **Select** (dropdown) or **Radio** (visible options)
- Need yes/no toggle? → Use **Switch** or **Checkbox**
- Need multiple selections? → Use **Checkbox** or **Select** with `multiple`
- Need visual selection? → Use **Color Check**, **Image Check**, or **Selectgroup**
- Need file upload? → Use **File**
- Need numeric range? → Use **Range**
- Need to add text/button to input? → Use **Input Group**
- Need to group related fields? → Use **Fieldset**

---

## Table of Contents

**Basic Input Components:**
- [Input](#input) - Text, email, password, and other single-line inputs
- [Textarea](#textarea) - Multi-line text input with auto-resize
- [Select](#select) - Dropdown selection with optgroups
- [Checkbox](#checkbox) - Single or multiple checkboxes
- [Radio](#radio) - Radio button groups
- [Switch](#switch) - Toggle switches

**File & Range Components:**
- [File](#file) - File upload input
- [Range](#range) - Range slider input

**Visual Selector Components:**
- [Color Picker](#color-picker) - HTML5 color picker
- [Color Check](#color-check) - Visual color selector buttons
- [Image Check](#image-check) - Visual image selector buttons

**Form Helper Components:**
- [Label](#label) - Form labels with required indicator
- [Help](#help) - Help popover icon
- [Hint](#hint) - Inline hint text
- [Valid Feedback](#valid-feedback) - Success validation messages
- [Invalid Feedback](#invalid-feedback) - Error validation messages

**Input Group Components:**
- [Input Group](#input-group) - Group inputs with text/buttons
- [Fieldset](#fieldset) - Group related form fields
- [Selectgroup](#selectgroup) - Button-style selection group
- [Selectgroup Item](#selectgroup-item) - Individual selectgroup button

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

## Input {#input}

Flexible text input with label, validation, icons, and full Laravel integration.

### Basic Usage

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    type="email"
    required />
```

**Output:** A standard text input with label, automatic validation error display, and old input retrieval.

---

### Examples

#### With Placeholder

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    placeholder="Enter your username" />
```

---

#### With Value

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    :value="$user->email" />
```

---

#### With Help Text

```blade
<x-tabler::forms.input
    name="password"
    label="Password"
    type="password"
    help="Must be at least 8 characters long" />
```

---

#### With Icon

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

#### With Loading State

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    :loading="$checking"
    help="Checking availability..." />
```

---

#### Size Variants

```blade
{{-- Small --}}
<x-tabler::forms.input
    name="code"
    label="Code"
    size="sm" />

{{-- Large --}}
<x-tabler::forms.input
    name="title"
    label="Title"
    size="lg" />
```

---

#### Disabled State

```blade
<x-tabler::forms.input
    name="username"
    label="Username"
    :value="$user->username"
    disabled />
```

---

#### Read-Only State

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address"
    :value="$user->email"
    readonly />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `'text'` | Input type: `text`, `email`, `password`, `number`, `tel`, `url`, `search`, `date`, `time`, `datetime-local`, `month`, `week`, `color` |
| `name` | `string\|null` | `null` | Field name (used for validation, old input, ID generation) |
| `id` | `string\|null` | `null` | Input ID (auto-generated from name if not provided) |
| `value` | `mixed\|null` | `null` | Field value (overridden by old input in Laravel) |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above input |
| `error` | `string\|null` | `null` | Error message (overrides automatic Laravel validation errors) |
| `required` | `bool` | `false` | Mark field as required (adds asterisk to label) |
| `disabled` | `bool` | `false` | Disable field |
| `readonly` | `bool` | `false` | Make field read-only |
| `size` | `string\|null` | `null` | Size: `sm`, `lg` |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `iconPosition` | `string` | `'end'` | Icon position: `start` (left), `end` (right) |
| `loading` | `bool` | `false` | Show loading spinner instead of icon |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div for spacing |
| `class` | `string` | `''` | Additional CSS classes for input element |

**Note:** All additional HTML attributes (e.g., `maxlength`, `min`, `max`, `pattern`, `autocomplete`) are passed through to the input element.

---

### Accessibility Notes

- Label is properly associated via `for`/`id` attributes
- `aria-required` applied when `required` prop is true
- `aria-invalid` applied when field has validation error
- `aria-describedby` links to help text and error messages
- Screen readers announce label, state, and errors

---

## Textarea {#textarea}

Multi-line text input with auto-resize support and validation integration.

### Basic Usage

```blade
<x-tabler::forms.textarea
    name="description"
    label="Description"
    rows="5" />
```

---

### Examples

#### With Auto-Resize

```blade
<x-tabler::forms.textarea
    name="notes"
    label="Notes"
    autosize
    placeholder="Enter your notes..." />
```

---

#### With Value

```blade
<x-tabler::forms.textarea
    name="bio"
    label="Biography"
    :value="$user->bio"
    rows="4" />
```

---

#### Custom Rows

```blade
<x-tabler::forms.textarea
    name="message"
    label="Message"
    rows="10"
    placeholder="Type your message here..." />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name (used for validation, old input, ID generation) |
| `id` | `string\|null` | `null` | Textarea ID (auto-generated from name if not provided) |
| `value` | `string\|null` | `null` | Field value (overridden by old input) |
| `placeholder` | `string\|null` | `null` | Placeholder text |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above textarea |
| `error` | `string\|null` | `null` | Error message (overrides automatic validation errors) |
| `required` | `bool` | `false` | Mark field as required |
| `disabled` | `bool` | `false` | Disable field |
| `readonly` | `bool` | `false` | Make field read-only |
| `rows` | `int` | `3` | Number of visible text rows |
| `autosize` | `bool` | `false` | Enable auto-resize based on content |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |
| `class` | `string` | `''` | Additional CSS classes |

---

### Accessibility Notes

- Proper label association via `for`/`id` attributes
- ARIA attributes for validation states
- Screen reader support for help text and errors

---

## Select {#select}

Dropdown select component with optgroups, multiple selection, and validation support.

### Basic Usage

```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    :options="['us' => 'United States', 'uk' => 'United Kingdom', 'ca' => 'Canada']" />
```

---

### Examples

#### With Placeholder

```blade
<x-tabler::forms.select
    name="status"
    label="Status"
    placeholder="Select status..."
    :options="['active' => 'Active', 'inactive' => 'Inactive']" />
```

---

#### With Selected Value

```blade
<x-tabler::forms.select
    name="role"
    label="User Role"
    :value="$user->role"
    :options="['admin' => 'Administrator', 'user' => 'User']" />
```

---

#### With Optgroups

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
            'blueberry' => 'Blueberry'
        ]
    ]" />
```

---

#### Multiple Selection

```blade
<x-tabler::forms.select
    name="skills"
    label="Skills"
    :options="[
        'php' => 'PHP',
        'javascript' => 'JavaScript',
        'python' => 'Python'
    ]"
    multiple
    :size="5" />
```

**Note:** When `multiple` is true, the name automatically gets `[]` suffix.

---

#### Custom Options via Slot

```blade
<x-tabler::forms.select
    name="country"
    label="Country"
    placeholder="Select a country...">
    <option value="us">🇺🇸 United States</option>
    <option value="uk">🇬🇧 United Kingdom</option>
    <option value="ca">🇨🇦 Canada</option>
</x-tabler::forms.select>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Field name |
| `id` | `string\|null` | `null` | Select ID (auto-generated if not provided) |
| `value` | `mixed\|array\|null` | `null` | Selected value(s) - string for single, array for multiple |
| `options` | `array` | `[]` | Options array (`value => label` or `group => [value => label]` for optgroups) |
| `placeholder` | `string\|null` | `null` | Placeholder option text |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above select |
| `error` | `string\|null` | `null` | Error message |
| `required` | `bool` | `false` | Mark field as required |
| `disabled` | `bool` | `false` | Disable field |
| `multiple` | `bool` | `false` | Enable multiple selection |
| `size` | `int\|null` | `null` | Visible options count (for multiple selects) |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom option elements (alternative to `options` prop) |

---

## Checkbox {#checkbox}

Checkbox input with label and help text support.

### Basic Usage

```blade
<x-tabler::forms.checkbox
    name="terms"
    label="I agree to the Terms of Service" />
```

---

### Examples

#### Checked by Default

```blade
<x-tabler::forms.checkbox
    name="newsletter"
    label="Subscribe to newsletter"
    checked />
```

---

#### With Help Text

```blade
<x-tabler::forms.checkbox
    name="remember"
    label="Remember me"
    help="Keep me logged in for 30 days" />
```

---

#### Inline Checkboxes

```blade
<x-tabler::forms.checkbox
    name="opt1"
    label="Option 1"
    class="form-check-inline"
    :wrapper="false" />
<x-tabler::forms.checkbox
    name="opt2"
    label="Option 2"
    class="form-check-inline"
    :wrapper="false" />
```

---

#### With Slot

```blade
<x-tabler::forms.checkbox name="accept">
    I accept the <a href="/terms">Terms of Service</a>
</x-tabler::forms.checkbox>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Checkbox name attribute |
| `id` | `string\|null` | `null` | Checkbox ID (auto-generated if not provided) |
| `value` | `string` | `'1'` | Checkbox value |
| `checked` | `bool` | `false` | Whether checkbox is checked |
| `label` | `string\|null` | `null` | Label text (alternative to slot) |
| `help` | `string\|null` | `null` | Help text displayed below checkbox |
| `disabled` | `bool` | `false` | Disable checkbox |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Label content (alternative to `label` prop) |

---

## Radio {#radio}

Radio button input for mutually exclusive choices.

### Basic Usage

```blade
<x-tabler::forms.radio
    name="plan"
    value="free"
    label="Free Plan"
    checked />
<x-tabler::forms.radio
    name="plan"
    value="pro"
    label="Pro Plan" />
```

---

### Examples

#### Radio Group with Help Text

```blade
<x-tabler::forms.radio
    name="billing"
    value="monthly"
    label="Monthly billing"
    help="Pay monthly, cancel anytime" />
<x-tabler::forms.radio
    name="billing"
    value="annual"
    label="Annual billing"
    help="Save 20% with annual billing" />
```

---

#### Inline Radio Buttons

```blade
<x-tabler::forms.radio
    name="size"
    value="sm"
    label="Small"
    class="form-check-inline"
    :wrapper="false" />
<x-tabler::forms.radio
    name="size"
    value="md"
    label="Medium"
    class="form-check-inline"
    :wrapper="false" />
<x-tabler::forms.radio
    name="size"
    value="lg"
    label="Large"
    class="form-check-inline"
    :wrapper="false" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Radio name attribute (groups radios with same name) |
| `id` | `string\|null` | `null` | Radio ID (auto-generated from name+value if not provided) |
| `value` | `string\|null` | `null` | Radio value |
| `checked` | `bool` | `false` | Whether radio is checked |
| `label` | `string\|null` | `null` | Label text (alternative to slot) |
| `help` | `string\|null` | `null` | Help text displayed below radio |
| `disabled` | `bool` | `false` | Disable radio |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## Switch {#switch}

Toggle switch input (styled checkbox) for on/off states.

### Basic Usage

```blade
<x-tabler::forms.switch
    name="notifications"
    label="Enable notifications" />
```

---

### Examples

#### Checked by Default

```blade
<x-tabler::forms.switch
    name="active"
    label="Active"
    checked />
```

---

#### With Help Text

```blade
<x-tabler::forms.switch
    name="2fa"
    label="Two-factor authentication"
    help="Add an extra layer of security" />
```

---

#### Reverse Layout

```blade
<x-tabler::forms.switch
    name="public"
    label="Public profile"
    class="form-check-reverse" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Switch name attribute |
| `id` | `string\|null` | `null` | Switch ID (auto-generated if not provided) |
| `value` | `string` | `'1'` | Switch value |
| `checked` | `bool` | `false` | Whether switch is checked/on |
| `label` | `string\|null` | `null` | Label text (alternative to slot) |
| `help` | `string\|null` | `null` | Help text displayed below switch |
| `disabled` | `bool` | `false` | Disable switch |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## File {#file}

File upload input with validation and multiple file support.

### Basic Usage

```blade
<x-tabler::forms.file
    name="document"
    label="Upload document" />
```

---

### Examples

#### Accept Specific File Types

```blade
<x-tabler::forms.file
    name="avatar"
    label="Profile picture"
    accept="image/png,image/jpeg" />
```

---

#### Multiple File Upload

```blade
<x-tabler::forms.file
    name="attachments"
    label="Attachments"
    multiple
    help="You can select multiple files" />
```

---

#### Required Field

```blade
<x-tabler::forms.file
    name="resume"
    label="Resume"
    accept=".pdf,.doc,.docx"
    required />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | File input name attribute |
| `id` | `string\|null` | `null` | File input ID (auto-generated if not provided) |
| `label` | `string\|null` | `null` | Field label text |
| `help` | `string\|null` | `null` | Help text displayed above input |
| `error` | `string\|null` | `null` | Error message |
| `accept` | `string\|null` | `null` | Accepted file types (e.g., `"image/*"`, `".pdf,.doc"`) |
| `multiple` | `bool` | `false` | Allow multiple file selection |
| `required` | `bool` | `false` | Mark field as required |
| `disabled` | `bool` | `false` | Disable file input |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## Range {#range}

Range slider input for selecting numeric values within a range.

### Basic Usage

```blade
<x-tabler::forms.range
    name="volume"
    label="Volume" />
```

---

### Examples

#### Custom Range

```blade
<x-tabler::forms.range
    name="price"
    label="Price"
    min="0"
    max="1000"
    step="10"
    value="500" />
```

---

#### Percentage Slider

```blade
<x-tabler::forms.range
    name="opacity"
    label="Opacity"
    min="0"
    max="100"
    step="5" />
```

---

#### Small Increments

```blade
<x-tabler::forms.range
    name="zoom"
    label="Zoom level"
    min="0.5"
    max="2.0"
    step="0.1"
    value="1.0" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Range input name attribute |
| `id` | `string\|null` | `null` | Range input ID (auto-generated if not provided) |
| `value` | `int\|float` | `50` | Current value |
| `min` | `int\|float` | `0` | Minimum value |
| `max` | `int\|float` | `100` | Maximum value |
| `step` | `int\|float` | `1` | Step increment |
| `label` | `string\|null` | `null` | Field label text |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## Color Picker {#color-picker}

HTML5 color picker input for selecting colors.

### Basic Usage

```blade
<x-tabler::forms.color-picker
    name="theme_color"
    label="Theme color" />
```

---

### Examples

#### Custom Default Color

```blade
<x-tabler::forms.color-picker
    name="background"
    label="Background color"
    value="#ffffff" />
```

---

#### Small Color Picker

```blade
<x-tabler::forms.color-picker
    name="highlight"
    label="Highlight"
    class="form-control-sm" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Color picker name attribute |
| `id` | `string\|null` | `null` | Color picker ID (auto-generated if not provided) |
| `value` | `string` | `'#066fd1'` | Default color value in hex format |
| `label` | `string\|null` | `null` | Field label text |
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## Color Check {#color-check}

Visual color selector input (radio or checkbox) for choosing colors.

### Basic Usage

```blade
<x-tabler::forms.color-check
    name="theme"
    value="primary"
    color="primary"
    checked />
<x-tabler::forms.color-check
    name="theme"
    value="danger"
    color="danger" />
```

---

### Examples

#### Rounded Color Selectors

```blade
<x-tabler::forms.color-check
    name="color"
    value="blue"
    color="blue"
    class="form-colorinput-rounded" />
<x-tabler::forms.color-check
    name="color"
    value="red"
    color="red"
    class="form-colorinput-rounded" />
```

---

#### Multiple Selection (Checkbox)

```blade
<x-tabler::forms.color-check
    name="colors[]"
    value="primary"
    color="primary"
    type="checkbox" />
<x-tabler::forms.color-check
    name="colors[]"
    value="success"
    color="success"
    type="checkbox" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Input name attribute |
| `value` | `string\|null` | `null` | Input value |
| `color` | `string` | `'primary'` | Color name (e.g., `primary`, `danger`, `success`, `blue`, `red`) |
| `checked` | `bool` | `false` | Whether input is checked |
| `type` | `string` | `'radio'` | Input type: `radio` or `checkbox` |

**Available colors:** `primary`, `secondary`, `success`, `info`, `warning`, `danger`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

---

## Image Check {#image-check}

Visual selector (radio or checkbox) with image preview.

### Basic Usage

```blade
<x-tabler::forms.image-check
    name="template"
    value="modern"
    type="radio"
    image="/images/templates/modern.png"
    alt="Modern template"
    checked />
```

---

### Examples

#### Multiple Selection

```blade
<x-tabler::forms.image-check
    name="features[]"
    value="feature1"
    image="/images/feature1.png"
    type="checkbox" />
<x-tabler::forms.image-check
    name="features[]"
    value="feature2"
    image="/images/feature2.png"
    type="checkbox" />
```

---

#### With Slot Content

```blade
<x-tabler::forms.image-check name="option" value="custom">
    <div class="p-3 text-center">
        <strong>Custom Option</strong>
    </div>
</x-tabler::forms.image-check>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Input name attribute |
| `value` | `string\|null` | `null` | Input value |
| `checked` | `bool` | `false` | Whether input is checked |
| `type` | `string` | `'checkbox'` | Input type: `checkbox` or `radio` |
| `image` | `string\|null` | `null` | Image URL to display |
| `alt` | `string` | `''` | Image alt text |

---

## Label {#label}

Form label with optional required indicator and description.

### Basic Usage

```blade
<x-tabler::forms.label for="email">Email Address</x-tabler::forms.label>
```

---

### Examples

#### Required Field

```blade
<x-tabler::forms.label for="password" required>Password</x-tabler::forms.label>
```

---

#### With Description

```blade
<x-tabler::forms.label for="username" description="Optional">
    Username
</x-tabler::forms.label>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `for` | `string\|null` | `null` | Input ID this label is associated with |
| `required` | `bool` | `false` | Show required indicator (*) |
| `description` | `string\|null` | `null` | Additional description text (right-aligned) |

---

## Help {#help}

Question mark icon that displays a popover with help text when clicked.

### Basic Usage

```blade
<x-tabler::forms.help content="This field is required" />
```

---

### Examples

#### Different Placement

```blade
<x-tabler::forms.help placement="right" content="Click for more info" />
```

---

#### In Label

```blade
<label class="form-label">
    Password
    <x-tabler::forms.help content="Must be at least 8 characters" />
</label>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `content` | `string\|null` | `null` | Help text to display in popover (alternative to slot) |
| `placement` | `string` | `'top'` | Popover placement: `top`, `bottom`, `left`, `right` |

---

## Hint {#hint}

Displays small help text below or above form controls.

### Basic Usage

```blade
<x-tabler::forms.hint>Enter your email address</x-tabler::forms.hint>
```

---

### Examples

#### Block Display

```blade
<x-tabler::forms.hint class="d-block">This will be visible to others</x-tabler::forms.hint>
```

---

#### With Form Control

```blade
<label class="form-label">Username</label>
<x-tabler::forms.hint>Choose a unique username</x-tabler::forms.hint>
<input type="text" class="form-control" />
```

---

## Valid Feedback {#valid-feedback}

Displays validation success messages below form controls.

### Basic Usage

```blade
<x-tabler::forms.valid-feedback message="Looks good!" />
```

---

### Examples

#### With Slot

```blade
<x-tabler::forms.valid-feedback>
    Username is available
</x-tabler::forms.valid-feedback>
```

---

#### Always Visible

```blade
<x-tabler::forms.valid-feedback class="d-block" message="Email verified successfully" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `message` | `string\|null` | `null` | Success message (alternative to slot) |

---

## Invalid Feedback {#invalid-feedback}

Displays validation error messages below form controls.

### Basic Usage

```blade
<x-tabler::forms.invalid-feedback message="This field is required" />
```

---

### Examples

#### With Slot

```blade
<x-tabler::forms.invalid-feedback>
    Please enter a valid email address
</x-tabler::forms.invalid-feedback>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `message` | `string\|null` | `null` | Error message (alternative to slot) |

---

## Input Group {#input-group}

Groups form controls with text addons, buttons, or other elements.

### Basic Usage

```blade
<x-tabler::forms.input-group prepend="@" append=".com">
    <input type="text" class="form-control" />
</x-tabler::forms.input-group>
```

---

### Examples

#### Flat Style

```blade
<x-tabler::forms.input-group prepend="$" class="input-group-flat">
    <input type="text" class="form-control" />
</x-tabler::forms.input-group>
```

---

#### With Button

```blade
<x-tabler::forms.input-group>
    <input type="text" class="form-control" placeholder="Search..." />
    <button class="btn btn-primary" type="button">Search</button>
</x-tabler::forms.input-group>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `prepend` | `string\|null` | `null` | Text to display before input |
| `append` | `string\|null` | `null` | Text to display after input |

---

## Fieldset {#fieldset}

Groups related form controls with an optional legend.

### Basic Usage

```blade
<x-tabler::forms.fieldset legend="Personal Information">
    <x-tabler::forms.input name="first_name" label="First Name" />
    <x-tabler::forms.input name="last_name" label="Last Name" />
</x-tabler::forms.fieldset>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `legend` | `string\|null` | `null` | Legend text for the fieldset |

---

## Selectgroup {#selectgroup}

A group of visually styled radio buttons or checkboxes.

### Basic Usage

```blade
<x-tabler::forms.selectgroup>
    <x-tabler::forms.selectgroup-item name="plan" value="free" text="Free" checked />
    <x-tabler::forms.selectgroup-item name="plan" value="pro" text="Pro" />
    <x-tabler::forms.selectgroup-item name="plan" value="enterprise" text="Enterprise" />
</x-tabler::forms.selectgroup>
```

---

### Examples

#### Pills Style

```blade
<x-tabler::forms.selectgroup class="form-selectgroup-pills">
    <x-tabler::forms.selectgroup-item name="size" value="sm" text="Small" />
    <x-tabler::forms.selectgroup-item name="size" value="md" text="Medium" checked />
    <x-tabler::forms.selectgroup-item name="size" value="lg" text="Large" />
</x-tabler::forms.selectgroup>
```

---

#### With Icons

```blade
<x-tabler::forms.selectgroup>
    <x-tabler::forms.selectgroup-item name="view" value="grid" icon="layout-grid" text="Grid" />
    <x-tabler::forms.selectgroup-item name="view" value="list" icon="list" text="List" checked />
</x-tabler::forms.selectgroup>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wrapper` | `bool` | `true` | Wrap in `mb-3` div |

---

## Selectgroup Item {#selectgroup-item}

Individual item for use within `<x-tabler::forms.selectgroup>`.

### Basic Usage

```blade
<x-tabler::forms.selectgroup-item
    name="plan"
    value="free"
    text="Free Plan"
    checked />
```

---

### Examples

#### With Icon

```blade
<x-tabler::forms.selectgroup-item
    name="view"
    value="grid"
    text="Grid"
    icon="layout-grid" />
```

---

#### Checkbox Type

```blade
<x-tabler::forms.selectgroup-item
    name="features[]"
    value="wifi"
    text="WiFi"
    type="checkbox" />
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `name` | `string\|null` | `null` | Input name attribute |
| `value` | `string\|null` | `null` | Input value |
| `checked` | `bool` | `false` | Whether item is selected |
| `type` | `string` | `'radio'` | Input type: `radio` or `checkbox` |
| `text` | `string\|null` | `null` | Button text (alternative to slot) |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |

---

## Shared Features {#shared-features}

Features and patterns common to all form components in this group.

### Labels & Help Text {#labels-help-text}

All components support labels and help text for better usability:

```blade
<x-tabler::forms.input
    label="Field Label"
    name="field_name"
    help="Additional context about this field" />
```

**Required Field Indicator:**

```blade
<x-tabler::forms.input
    label="Email Address"
    name="email"
    required />
{{-- Automatically shows asterisk (*) next to label --}}
```

**Help Text Positioning:**

```blade
{{-- Help text appears above the input by default --}}
<x-tabler::forms.input
    label="Password"
    name="password"
    help="Must be at least 8 characters" />
```

---

### Validation {#validation}

All components integrate seamlessly with Laravel validation:

#### Automatic Error Display

```blade
<x-tabler::forms.input
    name="email"
    label="Email Address" />
{{-- Errors automatically retrieved from $errors->first('email') --}}
```

#### Manual Error Display

```blade
<x-tabler::forms.input
    name="custom_field"
    label="Custom Field"
    error="Custom error message" />
```

#### Laravel Form Request Example

```blade
<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <x-tabler::forms.input
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

Most input components support small and large sizes:

```blade
{{-- Small --}}
<x-tabler::forms.input
    size="sm"
    label="Small Size"
    name="small" />

{{-- Medium (default) --}}
<x-tabler::forms.input
    label="Medium Size (default)"
    name="medium" />

{{-- Large --}}
<x-tabler::forms.input
    size="lg"
    label="Large Size"
    name="large" />
```

**Select sizing via CSS classes:**
```blade
<x-tabler::forms.select
    name="status"
    label="Status"
    class="form-select-sm"
    :options="$statuses" />
```

---

### Icons {#icons}

Add visual context with Tabler icons (Input component):

```blade
{{-- Leading icon --}}
<x-tabler::forms.input
    icon="mail"
    iconPosition="start"
    label="Email"
    name="email" />

{{-- Trailing icon (default) --}}
<x-tabler::forms.input
    icon="arrow-right"
    label="Next Step"
    name="next" />
```

**Available Icons**: See [Tabler Icons](https://tabler.io/icons)

**Note**: Icons require `secondnetwork/blade-tabler-icons` package (included with tabler-blade).

---

### States {#states}

All components support various interaction states:

#### Disabled State

```blade
<x-tabler::forms.input
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
<x-tabler::forms.input
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
<x-tabler::forms.input
    label="Loading..."
    name="field"
    :loading="true" />
```

**When to use:**
- Fetching data dynamically
- During form submission
- Waiting for API responses

---

## Complete Examples {#complete-examples}

Real-world scenarios showing multiple components working together.

### Example 1: Contact Form

```blade
<form method="POST" action="{{ route('contact.send') }}">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <x-tabler::forms.input
                name="first_name"
                label="First Name"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.input
                name="last_name"
                label="Last Name"
                required />
        </div>
    </div>

    <x-tabler::forms.input
        name="email"
        label="Email Address"
        type="email"
        icon="mail"
        required />

    <x-tabler::forms.select
        name="subject"
        label="Subject"
        :options="[
            'general' => 'General Inquiry',
            'support' => 'Support Request',
            'sales' => 'Sales Question',
        ]"
        required />

    <x-tabler::forms.textarea
        name="message"
        label="Message"
        rows="5"
        required />

    <x-tabler::forms.checkbox
        name="send_copy"
        label="Send me a copy of this message" />

    <div class="btn-list">
        <button type="submit" class="btn btn-primary">Send Message</button>
        <button type="button" class="btn">Cancel</button>
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
            <x-tabler::forms.input
                name="first_name"
                label="First Name"
                required />
        </div>
        <div class="col-md-6">
            <x-tabler::forms.input
                name="last_name"
                label="Last Name"
                required />
        </div>
    </div>

    <x-tabler::forms.input
        name="email"
        label="Email Address"
        type="email"
        icon="mail"
        help="We'll send a verification email"
        required />

    <x-tabler::forms.input
        name="password"
        label="Password"
        type="password"
        icon="lock"
        help="Must be at least 8 characters"
        required />

    <x-tabler::forms.input
        name="password_confirmation"
        label="Confirm Password"
        type="password"
        icon="lock"
        required />

    <h3 class="mt-4">Preferences</h3>

    <x-tabler::forms.switch
        name="newsletter"
        label="Subscribe to newsletter"
        help="Get weekly updates about new features" />

    <x-tabler::forms.checkbox
        name="terms"
        label="I agree to the Terms of Service and Privacy Policy"
        required />

    <div class="btn-list mt-4">
        <button type="submit" class="btn btn-primary">Create Account</button>
        <a href="{{ route('login') }}" class="btn">Already have an account?</a>
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
        :value="old('email', $user->email)"
        help="We'll never share your email"
        readonly />

    <x-tabler::forms.input
        name="phone"
        label="Phone Number"
        type="tel"
        :value="old('phone', $user->phone)"
        placeholder="(555) 123-4567"
        hint="Optional" />

    <h3 class="mt-4">Bio</h3>

    <x-tabler::forms.textarea
        name="bio"
        label="About You"
        :value="old('bio', $user->bio)"
        rows="4"
        help="Tell us about yourself" />

    <h3 class="mt-4">Notification Preferences</h3>

    <x-tabler::forms.switch
        name="email_notifications"
        label="Email notifications"
        help="Receive email updates about your account"
        :checked="old('email_notifications', $user->email_notifications)" />

    <x-tabler::forms.switch
        name="sms_notifications"
        label="SMS notifications"
        help="Receive text message alerts"
        :checked="old('sms_notifications', $user->sms_notifications)" />

    <div class="btn-list mt-4">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn" onclick="history.back()">Cancel</button>
    </div>
</form>
```

**Use Case:** Profile update form with personal info, bio, and notification preferences.

---

### Example 4: Search Form with Filters

```blade
<form method="GET" action="{{ route('products.index') }}">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <x-tabler::forms.input
                        name="q"
                        label="Search"
                        icon="search"
                        iconPosition="start"
                        placeholder="Search products..." />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.select
                        name="category"
                        label="Category"
                        placeholder="All categories"
                        :options="$categories" />
                </div>
                <div class="col-md-4">
                    <x-tabler::forms.select
                        name="status"
                        label="Status"
                        placeholder="All statuses"
                        :options="['active' => 'Active', 'inactive' => 'Inactive']" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <x-tabler::forms.range
                        name="min_price"
                        label="Minimum Price"
                        min="0"
                        max="1000"
                        step="10" />
                </div>
                <div class="col-md-6">
                    <x-tabler::forms.range
                        name="max_price"
                        label="Maximum Price"
                        min="0"
                        max="1000"
                        step="10"
                        value="1000" />
                </div>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
                <a href="{{ route('products.index') }}" class="btn">Clear</a>
            </div>
        </div>
    </div>
</form>
```

**Use Case:** Product search with category filters and price range sliders.

---

### Example 5: Advanced Form with Visual Selectors

```blade
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @method('PUT')

    <h3>Theme Settings</h3>

    <label class="form-label">Primary Color</label>
    <div class="mb-3">
        <x-tabler::forms.color-check
            name="primary_color"
            value="blue"
            color="blue"
            class="form-colorinput-rounded"
            checked />
        <x-tabler::forms.color-check
            name="primary_color"
            value="green"
            color="green"
            class="form-colorinput-rounded" />
        <x-tabler::forms.color-check
            name="primary_color"
            value="red"
            color="red"
            class="form-colorinput-rounded" />
        <x-tabler::forms.color-check
            name="primary_color"
            value="purple"
            color="purple"
            class="form-colorinput-rounded" />
    </div>

    <label class="form-label">Layout Template</label>
    <div class="mb-3">
        <x-tabler::forms.image-check
            name="template"
            value="modern"
            type="radio"
            image="/images/templates/modern.png"
            alt="Modern template"
            checked />
        <x-tabler::forms.image-check
            name="template"
            value="classic"
            type="radio"
            image="/images/templates/classic.png"
            alt="Classic template" />
        <x-tabler::forms.image-check
            name="template"
            value="minimal"
            type="radio"
            image="/images/templates/minimal.png"
            alt="Minimal template" />
    </div>

    <x-tabler::forms.selectgroup class="form-selectgroup-pills">
        <x-tabler::forms.selectgroup-item
            name="view_mode"
            value="grid"
            icon="layout-grid"
            text="Grid"
            checked />
        <x-tabler::forms.selectgroup-item
            name="view_mode"
            value="list"
            icon="list"
            text="List" />
        <x-tabler::forms.selectgroup-item
            name="view_mode"
            value="table"
            icon="table"
            text="Table" />
    </x-tabler::forms.selectgroup>

    <button type="submit" class="btn btn-primary mt-4">Save Settings</button>
</form>
```

**Use Case:** Settings page with visual color, template, and layout selection.

---

## Laravel Integration {#laravel-integration}

Deep integration with Laravel's form and validation systems.

### Automatic Old Input Retrieval

All components automatically retrieve old input after failed validation:

```blade
<x-tabler::forms.input
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
<x-tabler::forms.input
    name="email"
    label="Email Address" />
{{-- Error message from $errors->first('email') shown automatically --}}
```

**Custom error bags:**
```blade
<x-tabler::forms.input
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
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user()->id,
            'phone' => 'nullable|string|max:20',
            'bio' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
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
<x-tabler::forms.input
    name="company"
    label="Company Name"
    :required="$accountType === 'business'" />

<x-tabler::forms.input
    name="tax_id"
    label="Tax ID"
    v-if="$accountType === 'business'"
    required />
```

---

### Working with Relationships

```blade
{{-- Many-to-Many: Tags --}}
<x-tabler::forms.select
    name="tags"
    label="Tags"
    :value="old('tags', $post->tags->pluck('id')->toArray())"
    :options="$tags->pluck('name', 'id')"
    multiple />

{{-- Belongs To: Category --}}
<x-tabler::forms.select
    name="category_id"
    label="Category"
    :value="old('category_id', $post->category_id)"
    :options="$categories->pluck('name', 'id')"
    required />
```

**Controller:**
```php
public function update(Request $request, Post $post)
{
    $validated = $request->validate([
        'tags' => 'array',
        'tags.*' => 'exists:tags,id',
        'category_id' => 'required|exists:categories,id',
    ]);

    $post->update(['category_id' => $validated['category_id']]);
    $post->tags()->sync($validated['tags'] ?? []);
}
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
<x-tabler::forms.input
    label="Email Address"
    name="email" />

{{-- Bad --}}
<x-tabler::forms.input
    name="email"
    placeholder="Email Address" />
{{-- Placeholders are not labels! --}}
```

**Use help text for context:**
```blade
<x-tabler::forms.input
    label="Password"
    name="password"
    type="password"
    help="Must be at least 8 characters with one number and one symbol" />
```

**Mark required fields clearly:**
```blade
<x-tabler::forms.input
    label="Email Address"
    name="email"
    required />
{{-- Shows asterisk automatically --}}
```

**Group related fields:**
```blade
<x-tabler::forms.fieldset legend="Billing Address">
    <x-tabler::forms.input name="billing_street" label="Street Address" />
    <x-tabler::forms.input name="billing_city" label="City" />
    <x-tabler::forms.input name="billing_zip" label="ZIP Code" />
</x-tabler::forms.fieldset>
```

**Use appropriate input types:**
```blade
<x-tabler::forms.input type="email" />   {{-- For emails --}}
<x-tabler::forms.input type="tel" />     {{-- For phones --}}
<x-tabler::forms.input type="url" />     {{-- For URLs --}}
<x-tabler::forms.input type="number" />  {{-- For numbers --}}
<x-tabler::forms.input type="date" />    {{-- For dates --}}
```

---

### Don'ts ❌

**Don't use placeholders as labels:**
```blade
{{-- Bad --}}
<x-tabler::forms.input
    name="email"
    placeholder="Email Address" />

{{-- Good --}}
<x-tabler::forms.input
    label="Email Address"
    name="email"
    placeholder="you@example.com" />
```

**Don't hide labels:**
```blade
{{-- Bad --}}
<x-tabler::forms.input
    name="email"
    aria-label="Email" />

{{-- Good --}}
<x-tabler::forms.input
    label="Email Address"
    name="email" />
```

**Don't over-validate:**
```blade
{{-- Bad: Too restrictive --}}
<x-tabler::forms.input
    label="Name"
    name="name"
    pattern="[A-Za-z]+"  {{-- Prevents spaces, hyphens, etc --}}
    required />

{{-- Good: Accept various formats --}}
<x-tabler::forms.input
    label="Name"
    name="name"
    required />
```

**Don't use vague error messages:**
```blade
{{-- Bad --}}
<x-tabler::forms.input
    name="email"
    error="Invalid" />

{{-- Good --}}
<x-tabler::forms.input
    name="email"
    error="Please enter a valid email address (e.g., you@example.com)" />
```

---

### Performance Tips

**Minimize real-time validation:**
```blade
{{-- Instead of validating on every keystroke --}}
<x-tabler::forms.input
    wire:model="email"
    name="email" />

{{-- Use debounce or lazy binding --}}
<x-tabler::forms.input
    wire:model.debounce.500ms="email"
    name="email" />

{{-- Or validate on blur --}}
<x-tabler::forms.input
    wire:model.lazy="email"
    name="email" />
```

**Use appropriate field types:**
```blade
{{-- Use textarea for long text, not input --}}
<x-tabler::forms.textarea
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
- **File input styling**: Native file inputs have limited styling options

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
- ✅ Check CSS for `.text-danger` styling

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

**Issue: Select options not displaying**
- ✅ Verify `:options` (with colon) for array binding
- ✅ Check array structure is correct (`value => label`)
- ✅ Ensure collection is converted: `->pluck('name', 'id')`
- ✅ Try using slot with manual options for debugging

**Issue: Multiple file upload not working**
- ✅ Set `multiple` prop to `true`
- ✅ Ensure form has `enctype="multipart/form-data"`
- ✅ Validate as array in controller
- ✅ Check `php.ini` upload limits

---

## Related Components

- [Button](../button.md) - Submit buttons and actions
- [Alert](../alerts.md) - Success/error messages
- [Modal](../modals.md) - Forms in dialogs
- [Card](../cards.md) - Form containers

---

## Source

**Component Files:**
- `tabler-blade/stubs/resources/views/tabler/forms/input.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/textarea.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/select.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/checkbox.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/radio.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/switch.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/file.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/range.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/color-picker.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/color-check.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/image-check.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/input-group.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/fieldset.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/selectgroup.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/selectgroup-item.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/label.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/help.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/hint.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/valid-feedback.blade.php`
- `tabler-blade/stubs/resources/views/tabler/forms/invalid-feedback.blade.php`

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation with 19 form components
