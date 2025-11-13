# Steps

A step indicator component for multi-step processes, wizards, and progress tracking that shows the current position in a sequence of steps.

## Overview

- Display sequential steps in a process or workflow
- Automatically highlight current, completed, and pending steps
- Support for numbered counters or simple dot indicators
- Customizable colors using Tabler color palette
- Fully responsive and accessible
- Support for custom step rendering via slots
- Automatic state management based on current step
- Clickable step items for navigation

## Basic Usage

```blade
<x-tabler::steps
    :steps="['Personal Info', 'Address', 'Payment', 'Confirmation']"
    :currentStep="2"
/>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `steps` | array | `[]` | No | Array of step labels to display. Each item represents one step in the sequence. |
| `currentStep` | int\|null | `1` | No | Current active step number (1-based index). Steps before this are marked as done, this step is marked as active. |
| `color` | string\|null | `null` | No | Color theme for the steps. Accepts any Tabler color: 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'blue', 'green', 'red', etc. |
| `counter` | bool | `false` | No | Show step numbers instead of dots. When true, displays numbered circles for each step. |
| `class` | string | `''` | No | Additional CSS classes to apply to the steps container. |

## Slots

**Default Slot**

The default slot allows you to provide custom step items, completely overriding the automatic rendering from the `steps` array. When using the slot, you have full control over the markup and can create custom step structures.

Each step item should use the `step-item` class and can have state classes like `done` or `active` applied.

## CSS Classes

**Steps Colors:**
- `steps-blue` - Blue colored steps
- `steps-green` - Green colored steps
- `steps-red` - Red colored steps
- `steps-yellow` - Yellow colored steps
- `steps-orange` - Orange colored steps
- `steps-purple` - Purple colored steps
- `steps-pink` - Pink colored steps
- `steps-cyan` - Cyan colored steps
- `steps-{color}` - Any Tabler color name

**Steps Variants:**
- `steps-counter` - Display numbers instead of dots (can also be set via `counter` prop)

**Step Item States:**
- `active` - Current/active step indicator
- `done` - Completed step indicator (appears before active step)
- (no class) - Pending/future step (appears after active step)

## Examples

### Basic Steps

Simple step indicator showing progress through a multi-step form:

```blade
<x-tabler::steps
    :steps="['Personal Info', 'Address', 'Payment', 'Confirmation']"
    :currentStep="2"
/>
```

### Steps with Counter

Display numbered steps instead of dots for clearer progress indication:

```blade
<x-tabler::steps
    :steps="['Create Account', 'Verify Email', 'Complete Profile']"
    :currentStep="1"
    counter
/>
```

### Colored Steps

Apply color themes to match your application's design:

```blade
<x-tabler::steps
    :steps="['Start', 'In Progress', 'Complete']"
    :currentStep="2"
    color="success"
/>
```

### Registration Wizard

Multi-step registration process with numbered indicators:

```blade
<x-tabler::steps
    :steps="['Account Details', 'Personal Information', 'Preferences', 'Review & Submit']"
    :currentStep="3"
    counter
    color="primary"
/>
```

### E-commerce Checkout

Track customer progress through checkout flow:

```blade
<x-tabler::steps
    :steps="['Cart', 'Shipping', 'Payment', 'Confirmation']"
    :currentStep="2"
    color="blue"
/>
```

### Custom Steps with Links

Full control over step rendering with custom markup and navigation:

```blade
<x-tabler::steps>
    <a href="{{ route('wizard.step1') }}" class="step-item done">
        <div>Company Details</div>
    </a>
    <a href="{{ route('wizard.step2') }}" class="step-item active">
        <div>Team Members</div>
    </a>
    <a href="{{ route('wizard.step3') }}" class="step-item">
        <div>Billing Info</div>
    </a>
    <a href="{{ route('wizard.step4') }}" class="step-item">
        <div>Review</div>
    </a>
</x-tabler::steps>
```

### Project Onboarding

Guide users through initial project setup:

```blade
<x-tabler::steps
    :steps="['Create Project', 'Invite Team', 'Configure Settings', 'Import Data', 'Launch']"
    :currentStep="3"
    counter
    class="steps-green"
/>
```

### Survey Progress

Track completion of a multi-page survey:

```blade
<x-tabler::steps
    :steps="['Demographics', 'Experience', 'Feedback', 'Final Thoughts']"
    :currentStep="2"
    color="purple"
/>
```

### Application Review Process

Display approval workflow stages:

```blade
<x-tabler::steps
    :steps="['Submit', 'Under Review', 'Interview', 'Decision']"
    :currentStep="3"
    counter
    color="orange"
/>
```

### Course Progress

Show student progress through course modules:

```blade
<x-tabler::steps
    :steps="['Introduction', 'Basics', 'Intermediate', 'Advanced', 'Final Project']"
    :currentStep="4"
    counter
    color="cyan"
/>
```

### Installation Wizard

Guide users through software installation steps:

```blade
<x-tabler::steps
    :steps="['Welcome', 'Requirements Check', 'Database Setup', 'Configuration', 'Complete']"
    :currentStep="2"
    counter
    color="info"
/>
```

### Document Approval Flow

Track document through approval stages:

```blade
<x-tabler::steps
    :steps="['Draft', 'Manager Review', 'Legal Review', 'Executive Approval', 'Published']"
    :currentStep="3"
    class="steps-red"
/>
```

## Accessibility

The Steps component follows accessibility best practices:

- **Semantic Links**: Uses `<a>` elements for step items, making them keyboard navigable
- **Keyboard Navigation**: All steps are accessible via Tab key navigation
- **Visual Indicators**: Clear visual differentiation between done, active, and pending states
- **Focus States**: Built-in focus indicators for keyboard users
- **Screen Readers**: Text labels provide clear step descriptions
- **ARIA Enhancement**: Consider adding `aria-current="step"` to the active step for enhanced screen reader support
- **Color Independence**: Status is conveyed through multiple visual cues (position, state classes) not just color

**Recommended Enhancements:**

```blade
<x-tabler::steps>
    <a href="#step1" class="step-item done" aria-label="Step 1 of 3: Personal Info - Completed">
        <div>Personal Info</div>
    </a>
    <a href="#step2" class="step-item active" aria-current="step" aria-label="Step 2 of 3: Address - Current Step">
        <div>Address</div>
    </a>
    <a href="#step3" class="step-item" aria-label="Step 3 of 3: Confirmation - Not Started">
        <div>Confirmation</div>
    </a>
</x-tabler::steps>
```

## Browser Compatibility

The Steps component is compatible with all modern browsers:

- Chrome/Edge (latest)
- Firefox (latest)
- Safari (latest)
- Opera (latest)

The component uses standard CSS flexbox and does not require any browser-specific prefixes or polyfills.

## Related Components

- [Progress](./progress.md) - For showing completion percentage
- [Timeline](./timeline.md) - For displaying chronological events
- [Badge](./badge.md) - For status indicators
- [Button](./button.md) - For navigation actions

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/steps.blade.php`

## Changelog

### v1.0.0
- Initial release of Steps component
- Support for automatic step generation from array
- Current step highlighting with done/active states
- Counter variant for numbered steps
- Color customization via props
- Custom step rendering via slots
- Responsive design
- Full accessibility support
