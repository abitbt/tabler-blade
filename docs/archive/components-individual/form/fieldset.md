# Fieldset

The Fieldset component provides a semantic HTML wrapper for grouping related form controls together with an optional legend. This component enhances form organization and accessibility by creating logical groups of fields.

## Overview

The `<x-tabler::form.fieldset />` component wraps the standard HTML `<fieldset>` element, providing a consistent way to group form fields with proper semantic structure. Fieldsets are essential for creating accessible forms, particularly for screen reader users who benefit from the logical grouping of related inputs.

### Key Features

- **Semantic HTML**: Uses proper `<fieldset>` and `<legend>` elements
- **Accessibility**: Improves form navigation for assistive technologies
- **Flexible Legend**: Support for text or custom HTML legends
- **Disabled State**: Can disable entire groups of form controls
- **Nested Support**: Allows nested fieldsets for complex forms
- **Customizable Styling**: Full control over appearance via CSS classes
- **Slot-based Content**: Clean, readable syntax for form field grouping

## Basic Usage

```blade
<x-tabler::form.fieldset legend="Personal Information">
    <x-tabler::form.input name="first_name" label="First Name" />
    <x-tabler::form.input name="last_name" label="Last Name" />
</x-tabler::form.fieldset>
```

## Props/Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `legend` | `string` | `null` | The legend text for the fieldset |
| `disabled` | `boolean` | `false` | Disables all form controls within the fieldset |
| `class` | `string` | `''` | Additional CSS classes for the fieldset element |
| `legend-class` | `string` | `''` | Additional CSS classes for the legend element |

All additional attributes passed to the component will be forwarded to the underlying `<fieldset>` element.

## Slots

### Legend Slot

The `legend` slot allows you to define custom HTML content for the legend instead of using the `legend` prop.

```blade
<x-tabler::form.fieldset>
    <x-slot:legend>
        <strong>Account Settings</strong>
        <span class="text-muted">(Required)</span>
    </x-slot:legend>

    <!-- Form fields -->
</x-tabler::form.fieldset>
```

### Default Slot

The default slot contains all the form fields and content that should be grouped within the fieldset.

## CSS Classes

Apply classes to the `<fieldset>` element using the `class` attribute, and to the `<legend>` element using the `legend-class` attribute.

## Accessibility

The Fieldset component provides significant accessibility benefits:

- The `<fieldset>` element creates a semantic grouping that screen readers announce
- The `<legend>` element provides a label for the entire group
- The disabled state properly announced to assistive technologies

## Browser Compatibility

The Fieldset component uses standard HTML elements supported across all modern browsers.

## Related Components

- [Input](/docs/components/input.md) - Basic text input field
- [Select](/docs/components/select.md) - Dropdown selection field
- [Checkbox](/docs/components/checkbox.md) - Checkbox input
- [Radio](/docs/components/radio.md) - Radio button input

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/forms/fieldset.blade.php`

## Changelog

- **v1.0.0** - Initial release of Fieldset component
