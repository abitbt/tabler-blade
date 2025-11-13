# Alert

> Alert messages that inform users of the status of their action and help them solve problems.

## Overview

The Alert component displays important messages to users in a prominent, non-intrusive way. It supports various types (success, info, warning, danger), icons, titles, dismissible functionality, and action buttons.

**Key Features:**
- Multiple type variants (success, info, warning, danger)
- Optional icon support
- Dismissible with close button
- Important/filled background style
- Title and description structure
- Action buttons slot
- Bootstrap 5 integration

**Use Case:** Use alerts to provide feedback for user actions, display important information, show warnings, or communicate errors.

---

## Basic Usage

```blade
<x-tabler::alert type="success">
    Your changes have been saved.
</x-tabler::alert>
```

---

## Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `type` | `string` | `'info'` | Alert type: `success`, `info`, `warning`, `danger` |
| `title` | `string\|null` | `null` | Alert title/heading |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `dismissible` | `bool` | `false` | Show close button for dismissing |
| `important` | `bool` | `false` | Use filled background (more prominent) |
| `class` | `string` | `''` | Additional CSS classes |

**Note:** All additional HTML attributes are passed through to the alert element.

---

## Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Main alert content |
| `title` | No | Custom title markup (alternative to `title` prop) |
| `actions` | No | Action buttons |

---

## CSS Classes

Additional CSS classes that can be used via the `class` attribute:

**Alert Types:**
- `alert-success` - Success message (green)
- `alert-info` - Information (blue)
- `alert-warning` - Warning (yellow/orange)
- `alert-danger` - Error/danger (red)
- `alert-{color}` - Any Tabler color (lime, cyan, purple, etc.)

**Alert Variants:**
- `alert-important` - Filled background style (also via `important` prop)

**Content Styling:**
- `alert-link` - Link styling within alerts

---

## Examples

### Basic Example

```blade
<x-tabler::alert type="success">
    Your changes have been saved.
</x-tabler::alert>
```

**Output:** A success alert with default styling

---

### With Title

```blade
<x-tabler::alert type="success" title="Success!">
    Your changes have been saved successfully.
</x-tabler::alert>

<x-tabler::alert type="warning" title="Warning">
    Please review your information before proceeding.
</x-tabler::alert>
```

---

### With Icon

```blade
<x-tabler::alert type="success" icon="check" title="Success!">
    Your profile has been updated.
</x-tabler::alert>

<x-tabler::alert type="warning" icon="alert-triangle" title="Warning">
    This action cannot be undone.
</x-tabler::alert>

<x-tabler::alert type="danger" icon="x-circle" title="Error">
    Failed to process your request.
</x-tabler::alert>
```

---

### Dismissible Alert

```blade
<x-tabler::alert type="info" dismissible title="Information">
    This is a dismissible alert. Click the X to close.
</x-tabler::alert>

<x-tabler::alert type="success" dismissible icon="check">
    Task completed successfully!
</x-tabler::alert>
```

---

### Important Alert (Filled Background)

```blade
<x-tabler::alert type="info" important dismissible>
    <strong>Note:</strong> This is an important message with filled background.
</x-tabler::alert>

<x-tabler::alert type="danger" important title="Critical Error">
    System maintenance in progress.
</x-tabler::alert>
```

---

### With Custom Title Slot

```blade
<x-tabler::alert type="success" icon="check">
    <x-slot:title>
        <strong>Completed!</strong> <x-tabler::badge color="success">New</x-tabler::badge>
    </x-slot:title>
    All tasks have been finished successfully.
</x-tabler::alert>
```

---

### With Action Buttons

```blade
<x-tabler::alert type="warning" dismissible>
    <x-slot:title>Confirm Action</x-slot:title>
    Are you sure you want to proceed with this action?
    <x-slot:actions>
        <x-tabler::button color="warning" size="sm">Confirm</x-tabler::button>
        <x-tabler::button variant="outline" size="sm">Cancel</x-tabler::button>
    </x-slot:actions>
</x-tabler::alert>
```

---

### With Link

```blade
<x-tabler::alert type="info" title="New update available">
    Version 2.0 is now available. <a href="#" class="alert-link">Learn more</a>
</x-tabler::alert>
```

---

### Without Title (Simple)

```blade
<x-tabler::alert type="success" icon="check" dismissible>
    Operation completed successfully!
</x-tabler::alert>
```

---

### Complete Example

```blade
<x-tabler::alert
    type="warning"
    icon="alert-triangle"
    title="Confirm Deletion"
    dismissible
    id="delete-warning">
    <p>This will permanently delete <strong>{{ $item->name }}</strong>.</p>
    <x-slot:actions>
        <x-tabler::button color="danger" size="sm" wire:click="confirmDelete">
            Delete
        </x-tabler::button>
        <x-tabler::button variant="outline" size="sm" data-bs-dismiss="alert">
            Cancel
        </x-tabler::button>
    </x-slot:actions>
</x-tabler::alert>
```

---

## Variants

### Type Variants

Available types: `success`, `info`, `warning`, `danger`

```blade
<x-tabler::alert type="success" title="Success">
    Operation completed successfully.
</x-tabler::alert>

<x-tabler::alert type="info" title="Information">
    Please read the instructions carefully.
</x-tabler::alert>

<x-tabler::alert type="warning" title="Warning">
    This action requires confirmation.
</x-tabler::alert>

<x-tabler::alert type="danger" title="Error">
    An error occurred while processing.
</x-tabler::alert>
```

---

### Style Variants

**Default (Subtle):**
```blade
<x-tabler::alert type="info">
    Subtle styling with light background.
</x-tabler::alert>
```

**Important (Filled):**
```blade
<x-tabler::alert type="info" important>
    Prominent styling with filled background.
</x-tabler::alert>
```

---

### Custom Colors

You can use any Tabler color via the `class` attribute:

```blade
<x-tabler::alert class="alert-lime" title="Custom Color">
    Using lime color variant.
</x-tabler::alert>

<x-tabler::alert class="alert-cyan" title="Cyan Alert">
    Using cyan color variant.
</x-tabler::alert>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Focuses on dismissible close button
- **Enter/Space:** Closes alert (when close button focused)
- **Tab:** Focuses on action buttons (if present)

### ARIA Attributes
- `role="alert"`: Automatically applied to alert element
- `aria-label="close"`: Applied to close button

### Screen Reader Support
- Alert content is announced when displayed
- Close button properly labeled for screen readers
- Alert type communicated through semantic markup

### Best Practices
- Keep alert messages concise and actionable
- Use appropriate type for the message context
- Provide descriptive titles for complex alerts
- Include action buttons when user response is needed
- Ensure sufficient color contrast (handled by default)

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS + JS for dismissible functionality)
- Tabler Icons (`secondnetwork/blade-tabler-icons`) - if using icon prop
- Modern CSS support

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues
- None reported

---

## Events & Interactivity

### Bootstrap Events

Dismissible alerts emit Bootstrap 5 events:

```javascript
const alertElement = document.getElementById('myAlert');

// Before close
alertElement.addEventListener('close.bs.alert', (event) => {
    console.log('Alert closing');
    // Call event.preventDefault() to cancel
});

// After close
alertElement.addEventListener('closed.bs.alert', (event) => {
    console.log('Alert closed');
    // Clean up, track event, etc.
});
```

---

### Framework Integration

**Livewire:**
```blade
<x-tabler::alert type="success" dismissible>
    {{ session('success') }}
</x-tabler::alert>

@if($showAlert)
    <x-tabler::alert type="warning" wire:key="warning-alert">
        <x-slot:title>Warning</x-slot:title>
        {{ $warningMessage }}
        <x-slot:actions>
            <x-tabler::button size="sm" wire:click="dismiss">
                Dismiss
            </x-tabler::button>
        </x-slot:actions>
    </x-tabler::alert>
@endif
```

**Alpine.js:**
```blade
<div x-data="{ show: true }">
    <x-tabler::alert
        type="info"
        x-show="show"
        @click.away="show = false">
        Click outside to dismiss
    </x-tabler::alert>
</div>
```

---

## Laravel Integration

### Session Flash Messages

```blade
@if(session('success'))
    <x-tabler::alert type="success" dismissible icon="check">
        {{ session('success') }}
    </x-tabler::alert>
@endif

@if(session('error'))
    <x-tabler::alert type="danger" dismissible icon="x-circle">
        {{ session('error') }}
    </x-tabler::alert>
@endif

@if(session('warning'))
    <x-tabler::alert type="warning" dismissible icon="alert-triangle">
        {{ session('warning') }}
    </x-tabler::alert>
@endif
```

**Controller:**
```php
return redirect()->back()->with('success', 'Profile updated successfully!');
```

---

### Validation Errors

```blade
@if($errors->any())
    <x-tabler::alert type="danger" dismissible title="Please fix the following errors:">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-tabler::alert>
@endif
```

---

## Troubleshooting

### Common Issues

**Issue: Alert doesn't close when dismiss button clicked**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `dismissible` prop is set to `true`
- ✅ Check JavaScript console for errors
- ✅ Confirm Bootstrap version is 5.x

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`

**Issue: Alert styling not applied**
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check for CSS conflicts
- ✅ Verify `type` prop is valid: success, info, warning, danger
- ✅ Use custom colors via `class="alert-{color}"`

**Issue: Actions slot not showing**
- ✅ Use named slot syntax: `<x-slot:actions>`
- ✅ Ensure content is inside slot tags
- ✅ Check alert has title or icon (actions positioned based on layout)

**Issue: Title not displaying**
- ✅ Use `title` prop or `<x-slot:title>` (not both)
- ✅ Check for typos in prop name
- ✅ Verify title content is not empty

### Debugging Tips
- Inspect rendered HTML in browser devtools
- Check if Bootstrap classes are applied
- Verify JavaScript is loaded (for dismissible alerts)
- Test with minimal example first
- Check Laravel logs for Blade errors

---

## Real-World Examples

### Example 1: Success Notification After Save

```blade
@if(session('success'))
    <x-tabler::alert type="success" icon="check" dismissible>
        {{ session('success') }}
    </x-tabler::alert>
@endif

<form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')
    {{-- Form fields --}}
    <x-tabler::button type="submit" color="primary">
        Save Changes
    </x-tabler::button>
</form>
```

**Use Case:** Showing success message after form submission

---

### Example 2: Validation Errors Summary

```blade
@if($errors->any())
    <x-tabler::alert type="danger" icon="x-circle" dismissible>
        <x-slot:title>
            {{ $errors->count() }} {{ Str::plural('error', $errors->count()) }} found
        </x-slot:title>
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-tabler::alert>
@endif
```

**Use Case:** Displaying all validation errors in one alert

---

### Example 3: Confirmation Alert with Actions

```blade
<x-tabler::alert type="warning" icon="alert-triangle" important>
    <x-slot:title>Confirm Account Deletion</x-slot:title>
    <p>This will permanently delete your account and all associated data.</p>
    <p class="mb-0"><strong>This action cannot be undone.</strong></p>
    <x-slot:actions>
        <x-tabler::button
            color="danger"
            size="sm"
            wire:click="deleteAccount"
            wire:confirm="Type 'DELETE' to confirm">
            Delete Account
        </x-tabler::button>
        <x-tabler::button
            variant="outline"
            size="sm"
            wire:click="$set('showDeleteWarning', false)">
            Cancel
        </x-tabler::button>
    </x-slot:actions>
</x-tabler::alert>
```

**Use Case:** Critical action confirmation with prominent styling

---

### Example 4: Information Alert with Link

```blade
<x-tabler::alert type="info" icon="info-circle">
    <x-slot:title>New Features Available</x-slot:title>
    <p>We've added new features to improve your experience.</p>
    <a href="{{ route('changelog') }}" class="alert-link">
        View changelog
    </a>
</x-tabler::alert>
```

**Use Case:** Informing users about updates

---

## Available Classes

Additional CSS classes you can use via the `class` attribute:

**Alert Types:**
- `alert-success` - Success message (green)
- `alert-info` - Information (blue)
- `alert-warning` - Warning (yellow/orange)
- `alert-danger` - Error/danger (red)
- `alert-{color}` - Any Tabler color (lime, cyan, purple, etc.)

**Alert Variants:**
- `alert-important` - Filled background style (also via `important` prop)
- `alert-dismissible` - Dismissible (also via `dismissible` prop)

**Content Styling:**
- `alert-heading` - Title/heading style (auto-applied)
- `alert-description` - Description wrapper (auto-applied)
- `alert-icon` - Icon wrapper (auto-applied)
- `alert-link` - Link styling within alerts

---

## Performance Considerations

### Component Weight
- Base alert: ~200-300 bytes rendered
- With icon: +2KB (icon SVG)
- With dismissible: +100 bytes (close button)

### Best Practices
- Use session flash for one-time messages
- Dismiss alerts automatically after timeout (custom JS)
- Avoid showing multiple alerts simultaneously
- Cache frequently shown alert messages

### Optimization Tips
- Lazy load non-critical alerts
- Use Livewire for dynamic alerts
- Batch multiple messages into one alert
- Consider toast notifications for transient messages

---

## Notes

- Alert type determines color scheme
- `important` prop makes background filled (more prominent)
- Icons are optional but improve visual recognition
- Close button requires Bootstrap JavaScript
- Use `role="alert"` for accessibility (auto-applied)
- Action buttons positioned based on layout (icon/title presence)

---

## Related Components

- [Toast](./toast.md) - Toast notifications (auto-dismissing)
- [Badge](./badge.md) - Small inline status indicators
- [Button](./button.md) - Action buttons in alerts
- [Modal](./modals/modal.md) - Modal dialogs for critical messages

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/alert.blade.php`

---

## Changelog

- **v1.0.0** - Initial release with full alert functionality
