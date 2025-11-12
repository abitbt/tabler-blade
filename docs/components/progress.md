# Progress

A flexible progress bar component for displaying task completion, loading states, and other progress indicators. Supports multiple sizes, colors, striped patterns, animations, and stacked bars.

## Overview

The Progress component provides a visual representation of progress or completion status. It's built on Tabler's progress system and offers extensive customization options including colors, sizes, animations, and the ability to stack multiple progress bars.

### Key Features

- Multiple color variants (primary, success, danger, warning, etc.)
- Size options (xs, sm, default, lg)
- Striped and animated patterns
- Stacked progress bars for multi-part completion
- Accessible with ARIA attributes
- Responsive and mobile-friendly
- Support for value labels and custom content

### When to Use

- **File Uploads**: Show upload progress for single or multiple files
- **Task Completion**: Display completion percentage for tasks or projects
- **Loading Indicators**: Show loading progress for data-heavy operations
- **Multi-Step Processes**: Visualize progress through wizards or forms
- **Storage Meters**: Display storage usage, memory consumption, etc.
- **Skill Levels**: Show proficiency or experience levels
- **Survey Completion**: Track progress through questionnaires

### When Not to Use

- **Indeterminate Loading**: Use Spinner component for unknown duration
- **Binary Status**: Use Badge or Status component for complete/incomplete states
- **Interactive Selection**: Use Range input or Slider for user-controlled values
- **Real-time Data**: Consider charts for complex data visualization

## Basic Usage

```blade
<x-tabler-progress value="75" />
```

This creates a default progress bar at 75% completion with the primary color.

## Props/Attributes

### `value`
- **Type**: `integer|float`
- **Default**: `0`
- **Description**: The current progress value (0-100)
- **Required**: No

```blade
<x-tabler-progress value="50" />
<x-tabler-progress value="75.5" />
```

### `max`
- **Type**: `integer|float`
- **Default**: `100`
- **Description**: The maximum value for the progress bar
- **Required**: No

```blade
<x-tabler-progress value="30" max="50" />
```

### `color`
- **Type**: `string`
- **Default**: `'primary'`
- **Description**: The color variant for the progress bar
- **Required**: No
- **Options**: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark`, `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`

```blade
<x-tabler-progress value="60" color="success" />
<x-tabler-progress value="80" color="danger" />
```

### `size`
- **Type**: `string`
- **Default**: `null` (default size)
- **Description**: The height/size of the progress bar
- **Required**: No
- **Options**: `xs`, `sm`, `lg`

```blade
<x-tabler-progress value="50" size="xs" />
<x-tabler-progress value="50" size="sm" />
<x-tabler-progress value="50" size="lg" />
```

### `striped`
- **Type**: `boolean`
- **Default**: `false`
- **Description**: Adds diagonal stripes to the progress bar
- **Required**: No

```blade
<x-tabler-progress value="65" striped />
```

### `animated`
- **Type**: `boolean`
- **Default**: `false`
- **Description**: Animates the striped pattern (requires `striped` to be true)
- **Required**: No

```blade
<x-tabler-progress value="70" striped animated />
```

### `label`
- **Type**: `string|boolean`
- **Default**: `null`
- **Description**: Shows a label inside the progress bar. Use `true` for percentage, or provide custom text
- **Required**: No

```blade
<x-tabler-progress value="45" :label="true" />
<x-tabler-progress value="75" label="75 of 100 complete" />
```

### `class`
- **Type**: `string`
- **Default**: `null`
- **Description**: Additional CSS classes for the progress container
- **Required**: No

```blade
<x-tabler-progress value="60" class="mb-3" />
```

### Standard HTML Attributes

The component accepts all standard HTML attributes which are applied to the outer progress container:

```blade
<x-tabler-progress
    value="50"
    id="upload-progress"
    data-module="uploader"
    aria-label="Upload progress"
/>
```

## Slots

### Default Slot

The default slot allows you to place content below or around the progress bar, useful for labels, descriptions, or additional context.

```blade
<x-tabler-progress value="60" color="success">
    <div class="d-flex justify-content-between mt-2">
        <span>Completed</span>
        <span>60%</span>
    </div>
</x-tabler-progress>
```

### Named Slot: `bars`

For stacked progress bars, use the `bars` slot to define multiple progress segments:

```blade
<x-tabler-progress>
    <x-slot:bars>
        <div class="progress-bar bg-primary" style="width: 30%" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-success" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-warning" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
    </x-slot:bars>
</x-tabler-progress>
```

## CSS Classes

The component uses the following CSS classes from Tabler:

- **`.progress`** - Main container element
- **`.progress-bar`** - The filled portion of the progress bar
- **`.progress-xs`** - Extra small size (2px height)
- **`.progress-sm`** - Small size (4px height)
- **`.progress-lg`** - Large size (16px height)
- **`.progress-bar-striped`** - Adds diagonal stripes
- **`.progress-bar-animated`** - Animates the stripes
- **`.bg-{color}`** - Color variants (e.g., `bg-primary`, `bg-success`)

## Examples

### Example 1: Basic Progress Bar

```blade
<x-tabler-progress value="75" />
```

A simple progress bar showing 75% completion with the default primary color.

### Example 2: Progress Bar with Color

```blade
<x-tabler-progress value="90" color="success" />
<x-tabler-progress value="45" color="warning" />
<x-tabler-progress value="25" color="danger" />
```

Progress bars with different color variants to indicate different states or categories.

### Example 3: Different Sizes

```blade
<div class="mb-3">
    <x-tabler-progress value="50" size="xs" />
</div>
<div class="mb-3">
    <x-tabler-progress value="50" size="sm" />
</div>
<div class="mb-3">
    <x-tabler-progress value="50" />
</div>
<div class="mb-3">
    <x-tabler-progress value="50" size="lg" />
</div>
```

Progress bars in various sizes from extra small to large.

### Example 4: Striped Progress Bar

```blade
<x-tabler-progress value="65" color="info" striped />
```

A progress bar with diagonal stripes for visual distinction.

### Example 5: Animated Striped Progress Bar

```blade
<x-tabler-progress value="70" color="success" striped animated />
```

An animated progress bar with moving stripes, ideal for active loading states.

### Example 6: Progress Bar with Percentage Label

```blade
<x-tabler-progress value="45" color="primary" :label="true" />
```

Shows the completion percentage directly on the progress bar.

### Example 7: Progress Bar with Custom Label

```blade
<x-tabler-progress value="75" color="success" label="3 of 4 tasks complete" />
```

Displays custom text instead of percentage for more context.

### Example 8: Stacked Progress Bars

```blade
<x-tabler-progress>
    <x-slot:bars>
        <div class="progress-bar bg-success" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-warning" style="width: 25%" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
        <div class="progress-bar bg-danger" style="width: 15%" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
    </x-slot:bars>
</x-tabler-progress>
```

Multiple progress bars stacked to show different segments or categories of completion.

### Example 9: Progress Bar with External Label

```blade
<div class="mb-1">
    <div class="d-flex justify-content-between">
        <span>Project Completion</span>
        <span class="text-muted">67%</span>
    </div>
</div>
<x-tabler-progress value="67" color="azure" />
```

Label and percentage displayed above the progress bar for better readability.

### Example 10: Small Progress Indicators

```blade
<div class="row">
    <div class="col-md-6 mb-3">
        <h5 class="mb-2">HTML/CSS</h5>
        <x-tabler-progress value="90" color="blue" size="sm" />
    </div>
    <div class="col-md-6 mb-3">
        <h5 class="mb-2">JavaScript</h5>
        <x-tabler-progress value="75" color="azure" size="sm" />
    </div>
    <div class="col-md-6 mb-3">
        <h5 class="mb-2">PHP</h5>
        <x-tabler-progress value="80" color="purple" size="sm" />
    </div>
    <div class="col-md-6 mb-3">
        <h5 class="mb-2">Laravel</h5>
        <x-tabler-progress value="85" color="pink" size="sm" />
    </div>
</div>
```

Multiple small progress bars for displaying skills, ratings, or metrics.

### Example 11: Progress Bar with Min/Max Values

```blade
<x-tabler-progress value="30" max="50" color="success" />
<div class="text-muted small mt-1">30 of 50 items processed</div>
```

Progress bar with custom maximum value for non-percentage scenarios.

### Example 12: Indeterminate Loading State

```blade
<x-tabler-progress value="100" color="primary" striped animated />
<div class="text-center text-muted mt-2">Loading data...</div>
```

Full-width animated progress bar for indeterminate loading states.

### Example 13: Multi-Color Skill Display

```blade
<div class="mb-3">
    <div class="mb-2">
        <strong>Frontend Development</strong>
        <span class="float-end text-muted">Expert</span>
    </div>
    <x-tabler-progress value="95" color="green" />
</div>
<div class="mb-3">
    <div class="mb-2">
        <strong>Backend Development</strong>
        <span class="float-end text-muted">Advanced</span>
    </div>
    <x-tabler-progress value="85" color="blue" />
</div>
<div class="mb-3">
    <div class="mb-2">
        <strong>DevOps</strong>
        <span class="float-end text-muted">Intermediate</span>
    </div>
    <x-tabler-progress value="60" color="yellow" />
</div>
```

Skill levels with descriptive labels and color-coded progress bars.

## Accessibility

### ARIA Attributes

The Progress component automatically includes appropriate ARIA attributes:

- **`role="progressbar"`**: Identifies the element as a progress bar
- **`aria-valuenow`**: Current progress value
- **`aria-valuemin`**: Minimum value (always 0)
- **`aria-valuemax`**: Maximum value (default 100)
- **`aria-label`**: Descriptive label for screen readers

```blade
<x-tabler-progress
    value="60"
    aria-label="File upload progress"
/>
```

### Screen Reader Support

Provide meaningful context for screen reader users:

```blade
<div aria-live="polite" aria-atomic="true">
    <x-tabler-progress
        value="{{ $progress }}"
        aria-label="Upload progress: {{ $progress }} percent complete"
    />
</div>
```

The `aria-live="polite"` attribute announces changes to screen readers without interrupting the user.

### Label Text

Always provide descriptive text or labels:

```blade
<label id="upload-label">File Upload</label>
<x-tabler-progress
    value="75"
    aria-labelledby="upload-label"
    aria-describedby="upload-description"
/>
<div id="upload-description" class="text-muted">
    3 of 4 files uploaded
</div>
```

### Color and Contrast

Don't rely solely on color to convey meaning. Use labels, text, or icons:

```blade
<div class="mb-2">
    <span class="badge bg-success">On Track</span>
</div>
<x-tabler-progress value="75" color="success" />
```

### Keyboard Navigation

Progress bars are not interactive and don't require keyboard navigation. However, if they're part of a larger interactive component, ensure proper focus management.

## Browser Compatibility

The Progress component is compatible with all modern browsers:

- **Chrome**: 90+
- **Firefox**: 88+
- **Safari**: 14+
- **Edge**: 90+
- **Opera**: 76+

### Legacy Browser Support

For older browsers that don't support CSS custom properties:

- The component gracefully degrades to solid colors
- Animations may not work in IE11 and below
- Consider using a polyfill for CSS custom properties if needed

### Mobile Support

- **iOS Safari**: 14+
- **Chrome Mobile**: 90+
- **Samsung Internet**: 14+

The component is fully responsive and touch-friendly on mobile devices.

## Troubleshooting

### Progress Bar Not Showing

**Problem**: The progress bar appears empty or doesn't display.

**Solutions**:
1. Ensure the `value` prop is set and is a valid number:
   ```blade
   <x-tabler-progress value="50" />
   ```
2. Check that Tabler CSS is properly loaded
3. Verify that the value is between 0 and the max value

### Animation Not Working

**Problem**: The animated stripes don't move.

**Solutions**:
1. Ensure both `striped` and `animated` props are set:
   ```blade
   <x-tabler-progress value="70" striped animated />
   ```
2. Check that CSS animations aren't disabled in the browser
3. Verify that `prefers-reduced-motion` isn't overriding animations

### Wrong Color Appearing

**Problem**: Progress bar shows a different color than expected.

**Solutions**:
1. Verify the color prop uses a valid Tabler color name:
   ```blade
   <x-tabler-progress value="60" color="success" />
   ```
2. Check for CSS conflicts or overrides in custom stylesheets
3. Ensure you're using the correct Tabler version

### Label Not Displaying

**Problem**: The label doesn't appear on the progress bar.

**Solutions**:
1. For percentage labels, use `:label="true"`:
   ```blade
   <x-tabler-progress value="75" :label="true" />
   ```
2. For custom labels, ensure you're passing a string:
   ```blade
   <x-tabler-progress value="75" label="Custom text" />
   ```
3. Check that the progress value is high enough for text to be visible (at least 20-30%)

### Stacked Bars Not Aligning

**Problem**: Multiple progress bars don't stack properly.

**Solutions**:
1. Ensure you're using the `bars` slot correctly:
   ```blade
   <x-tabler-progress>
       <x-slot:bars>
           <!-- Bar elements here -->
       </x-slot:bars>
   </x-tabler-progress>
   ```
2. Verify that each bar has the correct `progress-bar` class
3. Check that widths add up to 100% or less

### Progress Bar Too Thin/Thick

**Problem**: Size doesn't match expectations.

**Solutions**:
1. Use the appropriate size prop:
   ```blade
   <x-tabler-progress value="50" size="lg" />
   ```
2. Valid size options are: `xs`, `sm`, `lg`, or null for default
3. Check for CSS overrides affecting height

### Dynamic Updates Not Reflecting

**Problem**: Progress bar doesn't update when value changes.

**Solutions**:
1. Ensure you're using Livewire or Alpine.js for reactivity:
   ```blade
   <x-tabler-progress :value="$progress" />
   ```
2. Check that the parent component is properly re-rendering
3. Verify that the value is being updated correctly in the backend

## Real-World Examples

### Example 1: File Upload Progress Tracker

```blade
<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-4">Uploading Files</h3>

        @foreach($uploads as $upload)
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <svg class="icon icon-tabler me-2" width="20" height="20">
                            <use xlink:href="#icon-file" />
                        </svg>
                        <span class="fw-medium">{{ $upload['filename'] }}</span>
                    </div>
                    <span class="text-muted">
                        {{ $upload['progress'] }}%
                    </span>
                </div>

                <x-tabler-progress
                    :value="$upload['progress']"
                    :color="$upload['progress'] === 100 ? 'success' : 'primary'"
                    :striped="$upload['progress'] < 100"
                    :animated="$upload['progress'] < 100"
                />

                @if($upload['progress'] === 100)
                    <div class="text-success small mt-1">
                        <svg class="icon icon-tabler" width="16" height="16">
                            <use xlink:href="#icon-check" />
                        </svg>
                        Complete
                    </div>
                @else
                    <div class="text-muted small mt-1">
                        {{ formatBytes($upload['uploaded']) }} of {{ formatBytes($upload['total']) }}
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
```

### Example 2: Project Task Completion Dashboard

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Project Status</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Design Phase</span>
                        <x-tabler-badge color="success">Complete</x-tabler-badge>
                    </div>
                    <x-tabler-progress value="100" color="success" size="sm" />
                    <div class="text-muted small mt-1">8 of 8 tasks completed</div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Development</span>
                        <x-tabler-badge color="primary">In Progress</x-tabler-badge>
                    </div>
                    <x-tabler-progress value="65" color="primary" size="sm" striped animated />
                    <div class="text-muted small mt-1">13 of 20 tasks completed</div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Testing</span>
                        <x-tabler-badge color="warning">Started</x-tabler-badge>
                    </div>
                    <x-tabler-progress value="25" color="warning" size="sm" />
                    <div class="text-muted small mt-1">3 of 12 tasks completed</div>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-2">
                        <span class="fw-medium">Deployment</span>
                        <x-tabler-badge>Not Started</x-tabler-badge>
                    </div>
                    <x-tabler-progress value="0" color="secondary" size="sm" />
                    <div class="text-muted small mt-1">0 of 5 tasks completed</div>
                </div>
            </div>
        </div>

        <hr class="my-4" />

        <div>
            <div class="d-flex justify-content-between mb-2">
                <span class="fw-bold">Overall Progress</span>
                <span class="fw-bold">51%</span>
            </div>
            <x-tabler-progress value="51" color="primary" size="lg" />
            <div class="text-muted mt-2">24 of 47 total tasks completed</div>
        </div>
    </div>
</div>
```

### Example 3: Storage Usage Meter

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Storage Usage</h3>
    </div>
    <div class="card-body">
        <div class="mb-4">
            <div class="d-flex justify-content-between mb-2">
                <span>Used Storage</span>
                <span class="fw-medium">{{ $usedStorage }} GB of {{ $totalStorage }} GB</span>
            </div>

            @php
                $usagePercent = ($usedStorage / $totalStorage) * 100;
                $color = $usagePercent > 90 ? 'danger' : ($usagePercent > 75 ? 'warning' : 'success');
            @endphp

            <x-tabler-progress :value="$usagePercent" :color="$color" size="lg" />

            @if($usagePercent > 90)
                <div class="alert alert-danger mt-3">
                    <h4 class="alert-title">Storage Almost Full</h4>
                    <p class="mb-0">You're using {{ number_format($usagePercent, 1) }}% of your storage. Consider upgrading your plan or removing old files.</p>
                </div>
            @elseif($usagePercent > 75)
                <div class="alert alert-warning mt-3">
                    <h4 class="alert-title">Storage Running Low</h4>
                    <p class="mb-0">You're using {{ number_format($usagePercent, 1) }}% of your storage.</p>
                </div>
            @endif
        </div>

        <hr />

        <h4 class="mb-3">Storage by Type</h4>

        <x-tabler-progress class="mb-3">
            <x-slot:bars>
                <div class="progress-bar bg-blue" style="width: {{ $storageTypes['documents'] }}%"
                     role="progressbar"
                     aria-valuenow="{{ $storageTypes['documents'] }}"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     title="Documents: {{ $storageTypes['documents'] }}%"></div>
                <div class="progress-bar bg-azure" style="width: {{ $storageTypes['images'] }}%"
                     role="progressbar"
                     aria-valuenow="{{ $storageTypes['images'] }}"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     title="Images: {{ $storageTypes['images'] }}%"></div>
                <div class="progress-bar bg-purple" style="width: {{ $storageTypes['videos'] }}%"
                     role="progressbar"
                     aria-valuenow="{{ $storageTypes['videos'] }}"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     title="Videos: {{ $storageTypes['videos'] }}%"></div>
                <div class="progress-bar bg-pink" style="width: {{ $storageTypes['other'] }}%"
                     role="progressbar"
                     aria-valuenow="{{ $storageTypes['other'] }}"
                     aria-valuemin="0"
                     aria-valuemax="100"
                     title="Other: {{ $storageTypes['other'] }}%"></div>
            </x-slot:bars>
        </x-tabler-progress>

        <div class="row mt-3">
            <div class="col-6 col-md-3">
                <div class="d-flex align-items-center">
                    <div class="bg-blue" style="width: 12px; height: 12px; border-radius: 2px;"></div>
                    <span class="ms-2 small">Documents</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex align-items-center">
                    <div class="bg-azure" style="width: 12px; height: 12px; border-radius: 2px;"></div>
                    <span class="ms-2 small">Images</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex align-items-center">
                    <div class="bg-purple" style="width: 12px; height: 12px; border-radius: 2px;"></div>
                    <span class="ms-2 small">Videos</span>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="d-flex align-items-center">
                    <div class="bg-pink" style="width: 12px; height: 12px; border-radius: 2px;"></div>
                    <span class="ms-2 small">Other</span>
                </div>
            </div>
        </div>
    </div>
</div>
```

### Example 4: Multi-Step Form Progress

```blade
<div class="card">
    <div class="card-body">
        <div class="mb-4">
            <h3 class="card-title">Account Setup</h3>
            <p class="text-muted">Step {{ $currentStep }} of {{ $totalSteps }}</p>
        </div>

        <div class="mb-4">
            <x-tabler-progress
                :value="($currentStep / $totalSteps) * 100"
                color="primary"
                size="lg"
            />
        </div>

        <div class="steps steps-counter steps-vertical">
            <div class="step-item {{ $currentStep >= 1 ? 'active' : '' }}">
                <div class="h4 m-0">Personal Information</div>
                <div class="text-muted">Tell us about yourself</div>
                @if($currentStep > 1)
                    <x-tabler-badge color="success" class="mt-2">
                        <svg class="icon icon-tabler" width="16" height="16">
                            <use xlink:href="#icon-check" />
                        </svg>
                        Complete
                    </x-tabler-badge>
                @endif
            </div>

            <div class="step-item {{ $currentStep >= 2 ? 'active' : '' }}">
                <div class="h4 m-0">Company Details</div>
                <div class="text-muted">Information about your organization</div>
                @if($currentStep > 2)
                    <x-tabler-badge color="success" class="mt-2">
                        <svg class="icon icon-tabler" width="16" height="16">
                            <use xlink:href="#icon-check" />
                        </svg>
                        Complete
                    </x-tabler-badge>
                @elseif($currentStep === 2)
                    <x-tabler-badge color="primary" class="mt-2">In Progress</x-tabler-badge>
                @endif
            </div>

            <div class="step-item {{ $currentStep >= 3 ? 'active' : '' }}">
                <div class="h4 m-0">Preferences</div>
                <div class="text-muted">Customize your experience</div>
                @if($currentStep > 3)
                    <x-tabler-badge color="success" class="mt-2">
                        <svg class="icon icon-tabler" width="16" height="16">
                            <use xlink:href="#icon-check" />
                        </svg>
                        Complete
                    </x-tabler-badge>
                @elseif($currentStep === 3)
                    <x-tabler-badge color="primary" class="mt-2">In Progress</x-tabler-badge>
                @endif
            </div>

            <div class="step-item {{ $currentStep >= 4 ? 'active' : '' }}">
                <div class="h4 m-0">Review & Confirm</div>
                <div class="text-muted">Verify your information</div>
                @if($currentStep === 4)
                    <x-tabler-badge color="primary" class="mt-2">In Progress</x-tabler-badge>
                @endif
            </div>
        </div>
    </div>
</div>
```

## Performance

### Rendering Performance

The Progress component is lightweight and renders quickly:

- Minimal DOM nodes (1-2 elements)
- Pure CSS styling without JavaScript dependencies
- No images or external resources required
- Efficient CSS animations using GPU acceleration

### Animation Performance

Striped and animated progress bars use CSS transforms for optimal performance:

```css
/* Efficient GPU-accelerated animation */
.progress-bar-animated {
    animation: progress-bar-stripes 1s linear infinite;
}
```

### Best Practices

1. **Limit concurrent animations**: Avoid animating more than 5-10 progress bars simultaneously
2. **Use appropriate sizes**: Smaller progress bars (xs, sm) render faster
3. **Debounce updates**: When updating progress frequently, debounce to reduce re-renders:
   ```javascript
   const updateProgress = debounce((value) => {
       @this.set('progress', value);
   }, 100);
   ```
4. **Respect prefers-reduced-motion**: Tabler automatically respects user motion preferences

### Memory Considerations

- Each progress bar instance uses minimal memory (~1KB)
- No memory leaks from event listeners or timers
- Safe to use in loops or repeated components

### Server-Side Rendering

The component is fully compatible with server-side rendering and doesn't require client-side JavaScript for basic functionality.

## Notes

- Progress values are automatically clamped between 0 and the max value
- Percentages are calculated automatically based on value and max
- The component uses Bootstrap's progress bar structure under the hood
- Animated stripes only work when both `striped` and `animated` are true
- For indeterminate loading states, consider using a Spinner component instead
- The component is responsive and adapts to container width
- Color variants use Tabler's color system and CSS custom properties
- Labels may not be visible if progress is very low (< 20%)
- Stacked progress bars should not exceed 100% total width
- ARIA attributes are automatically generated for accessibility
- The component works seamlessly with Livewire for reactive updates

## Related Components

- [**Badge**](/docs/components/badge.md) - For displaying status or counts
- [**Spinner**](/docs/components/spinner.md) - For indeterminate loading states
- [**Card**](/docs/components/card.md) - For containing progress displays
- [**Alert**](/docs/components/alert.md) - For displaying progress-related messages

## Source

View the source code for this component:

- [progress.blade.php](https://github.com/tabler/tabler-blade/blob/main/stubs/resources/views/tabler/progress.blade.php)

## Changelog

- **v1.0.0** - Initial release with basic progress bar functionality
- **v1.1.0** - Added striped and animated variants
- **v1.2.0** - Added size options (xs, sm, lg)
- **v1.3.0** - Added label support for percentages and custom text
- **v1.4.0** - Added stacked progress bar support via bars slot
- **v1.5.0** - Enhanced accessibility with automatic ARIA attributes
