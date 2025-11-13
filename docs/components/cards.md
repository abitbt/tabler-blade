# Cards

> Comprehensive card component system for organizing and displaying content in structured containers with headers, bodies, footers, and additional visual features.

## Overview

The Card component family provides a complete system for creating beautiful, functional cards in your Laravel application. Cards are versatile containers that help organize related content, display data summaries, create dashboards, showcase products, and present any content that benefits from visual grouping.

**What problems do cards solve:**
- Organizing related information visually
- Creating structured content containers
- Building dashboard widgets and stats displays
- Showcasing products, user profiles, and media content
- Providing visual hierarchy and separation

**Common use cases:**
- Dashboard stat cards and metrics
- Product listings and catalogs
- User profile cards
- Activity feeds and timelines
- Settings panels and forms
- Notification cards
- Blog post previews
- Pricing tables

**How they work together:**
The card system consists of a main container (`card`) and 8 specialized sub-components that can be composed together. You can use just the container and body for simple cards, or combine multiple sub-components for rich, interactive cards.

**Components in this group:**
- **Card** - Main container (required)
- **Header** - Title, subtitle, and action buttons
- **Body** - Primary content area
- **Footer** - Action buttons and supplementary content
- **Actions** - Standalone action button section
- **Status** - Colored status indicator bar
- **Progress** - Progress bar with percentage
- **Img** - Card images with overlay support
- **Stamp** - Corner badge/stamp with icons

---

## Quick Start

The most common use case to get started quickly:

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Card Title</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Your content goes here.
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button color="primary">Save</x-tabler::button>
        <x-tabler::button variant="outline">Cancel</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Installation**: No additional installation needed - included with tabler-blade package.

---

## Component Comparison

Choose the right component for your needs:

| Component | Best For | Key Features | When to Use |
|-----------|----------|--------------|-------------|
| Card | All cards (required) | Container, padding variants, active/inactive states | Every card needs this base component |
| Header | Titled content | Title, subtitle, action buttons | Cards with clear headings |
| Body | Main content | Scrollable mode, flexible content | Primary content area (most cards) |
| Footer | Actions | Buttons, links, meta info | Cards with bottom actions |
| Actions | Prominent actions | Standalone action section | When header actions are too small |
| Status | Visual status | Colored bar, edge positioning | Quick status indication |
| Progress | Completion tracking | Progress bar, percentage | Task/project completion |
| Img | Visual content | Top/bottom images, overlays | Photo cards, product images |
| Stamp | Badge/label | Corner stamp, icons, prices | Featured items, pricing |

**Quick Decision Tree:**
- Need a container? → Use **Card** (required for all cards)
- Need a title? → Add **Header**
- Need main content? → Add **Body** (most common)
- Need bottom buttons? → Add **Footer**
- Need a status indicator? → Add **Status**
- Need to show progress? → Add **Progress**
- Need an image? → Add **Img**
- Need a corner badge? → Add **Stamp**
- Need prominent actions? → Add **Actions**

---

## Table of Contents

**Components:**
- [Card](#card) - Main container (required)
- [Header](#header) - Title and actions
- [Body](#body) - Content area
- [Footer](#footer) - Bottom actions
- [Actions](#actions) - Standalone actions
- [Status](#status) - Status indicator
- [Progress](#progress) - Progress bar
- [Img](#img) - Card image
- [Stamp](#stamp) - Corner badge

**Shared Features:**
- [Visual Variants](#visual-variants)
- [Padding Sizes](#padding-sizes)
- [Active/Inactive States](#active-inactive-states)
- [Clickable Cards](#clickable-cards)
- [Color Customization](#color-customization)

**Advanced:**
- [Complete Examples](#complete-examples)
- [Composition Patterns](#composition-patterns)
- [Laravel Integration](#laravel-integration)
- [Accessibility](#accessibility)
- [Best Practices](#best-practices)

---

## Card {#card}

The main card container component - required for all cards.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        Basic card content
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Output:** Renders a white card container with rounded corners and shadow.

---

### Examples

#### Simple Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h3>Hello World</h3>
        <p>This is a simple card with just a body.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Card with Padding Variant

```blade
{{-- Small padding --}}
<x-tabler::cards.card padding="sm">
    <x-tabler::cards.body>
        Compact card with small padding
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Large padding --}}
<x-tabler::cards.card padding="lg">
    <x-tabler::cards.body>
        Spacious card with large padding
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Active Card

```blade
<x-tabler::cards.card active>
    <x-tabler::cards.body>
        <h4>Selected Plan</h4>
        <p>This card is currently active/selected.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Inactive Card

```blade
<x-tabler::cards.card inactive>
    <x-tabler::cards.body>
        <h4>Disabled Option</h4>
        <p>This card is dimmed/inactive.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Clickable Card

```blade
<x-tabler::cards.card link href="{{ route('profile') }}" class="card-link-pop">
    <x-tabler::cards.body>
        <div class="d-flex align-items-center">
            <x-tabler::avatar src="/img/user.jpg" size="lg" />
            <div class="ms-3">
                <h4 class="mb-0">{{ $user->name }}</h4>
                <p class="text-muted mb-0">View Profile</p>
            </div>
        </div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Note:** When `link` prop is set, the card renders as an `<a>` element instead of `<div>`.

---

#### Colored Background

```blade
{{-- Light color variants --}}
<x-tabler::cards.card class="bg-primary-lt text-primary">
    <x-tabler::cards.body>
        <h3 class="mb-1">145</h3>
        <p class="mb-0">Total Users</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Solid color --}}
<x-tabler::cards.card class="bg-success text-white">
    <x-tabler::cards.body>
        <h3 class="mb-1">$12,450</h3>
        <p class="mb-0">Revenue</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Stacked Card Effect

```blade
<x-tabler::cards.card class="card-stacked card-borderless">
    <x-tabler::cards.body>
        Floating card with stacked effect
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `padding` | `string\|null` | `null` | Card padding size: `sm`, `md`, `lg` |
| `active` | `bool` | `false` | Mark card as active (highlighted state) |
| `inactive` | `bool` | `false` | Mark card as inactive (dimmed state) |
| `link` | `bool` | `false` | Make entire card clickable (renders as `<a>`) |
| `href` | `string\|null` | `null` | URL for clickable cards (requires `link` prop) |
| `class` | `string` | `''` | Additional CSS classes for card element |

**Note:** When using `link` prop, include an `href` attribute to specify the destination URL.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Card content (typically other card sub-components) |

---

### CSS Classes

**Card Styles:**
- `card-sm`, `card-md`, `card-lg` - Padding sizes (also via `padding` prop)
- `card-active` - Active state (also via `active` prop)
- `card-inactive` - Inactive state (also via `inactive` prop)
- `card-link` - Clickable card (auto-applied with `link` prop)

**Visual Effects:**
- `card-stacked` - Stacked card effect
- `card-borderless` - Remove card border
- `card-link-rotate` - Rotate icon on hover (with `link` prop)
- `card-link-pop` - Pop effect on hover (with `link` prop)

**Colors:**
- `bg-primary`, `bg-secondary`, `bg-success`, `bg-danger`, `bg-warning`, `bg-info`
- `bg-primary-lt`, `bg-blue-lt` - Light color variants
- `text-primary`, `text-white`, `text-muted` - Text colors

---

### Accessibility Notes

- Clickable cards are rendered as `<a>` elements for proper semantics
- Provide descriptive link text or `aria-label` for clickable cards
- Active/inactive states should not rely solely on color
- Ensure sufficient color contrast for text on colored backgrounds
- Maintain logical focus order

---

## Header {#header}

Card header with title, subtitle, and action buttons.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Card Title</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Card content
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Header with Title and Subtitle

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Dashboard Overview</x-slot>
        <x-slot:subtitle>Monthly statistics</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        View your key metrics and performance indicators.
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Header with Actions

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Users</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" icon="plus" color="primary">
                Add User
            </x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <p>Manage your application users.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Light Header Style

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header light>
        <x-slot:title>Light Header</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Card with light-styled header
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Custom Header Content

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <div class="d-flex align-items-center">
            <x-tabler::avatar src="/img/user.jpg" size="sm" class="me-2" />
            <div>
                <h3 class="card-title mb-0">John Doe</h3>
                <small class="text-muted">Administrator</small>
            </div>
        </div>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        User details go here
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `light` | `bool` | `false` | Use light header style |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Custom header content (overrides title/subtitle/actions) |
| `title` | No | Card title (displays as `h3.card-title`) |
| `subtitle` | No | Card subtitle (displays below title) |
| `actions` | No | Header action buttons (aligned right) |

---

### Accessibility Notes

- Headers use semantic `<h3>` tags for proper document outline
- Title hierarchy follows HTML heading structure
- Action buttons maintain keyboard accessibility
- Screen readers announce header structure properly

---

## Body {#body}

Main content area of the card.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <p>This is the main content area of the card.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Standard Body

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Welcome</h4>
        <p>This is a standard card body with some content.</p>
        <ul>
            <li>Item 1</li>
            <li>Item 2</li>
            <li>Item 3</li>
        </ul>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Scrollable Body

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Activity Log</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body scrollable>
        <p>Entry 1: User logged in</p>
        <p>Entry 2: Profile updated</p>
        <p>Entry 3: Password changed</p>
        <!-- Many more entries that will scroll -->
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Note:** Scrollable bodies have a fixed max-height and enable vertical scrolling.

---

#### Body with Table

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Recent Orders</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Order #</th>
                    <th>Customer</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#1001</td>
                    <td>John Doe</td>
                    <td>$125.00</td>
                </tr>
            </tbody>
        </table>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Body with Form

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Contact Form</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <form method="POST" action="{{ route('contact.send') }}">
            @csrf

            <x-tabler::forms.input
                name="name"
                label="Your Name"
                required />

            <x-tabler::forms.textarea
                name="message"
                label="Message"
                rows="4"
                required />
        </form>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button type="submit" color="primary">Send</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `scrollable` | `bool` | `false` | Enable scrollable content with max-height |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Card body content |

---

### Accessibility Notes

- Scrollable regions include proper ARIA attributes
- Content maintains logical reading order
- Focus management works correctly in scrollable areas
- Screen readers announce scrollable regions

---

## Footer {#footer}

Footer section typically containing action buttons or supplementary information.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        Card content
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button color="primary">Save</x-tabler::button>
        <x-tabler::button variant="outline">Cancel</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Examples

#### Footer with Action Buttons

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Confirm Action</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        Are you sure you want to proceed with this action?
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <x-tabler::button color="primary">Confirm</x-tabler::button>
        <x-tabler::button variant="outline">Cancel</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

#### Footer with Split Actions

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        Project details and information
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <div class="d-flex justify-content-between w-100">
            <x-tabler::button variant="outline">View Details</x-tabler::button>
            <x-tabler::button color="primary">Mark Complete</x-tabler::button>
        </div>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

#### Footer with Meta Information

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Blog Post Title</h4>
        <p>{{ Str::limit($post->excerpt, 150) }}</p>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <div class="d-flex align-items-center text-muted">
            <div class="me-3">
                <x-tabler::icon name="calendar" class="icon-sm me-1" />
                {{ $post->published_at->format('M d, Y') }}
            </div>
            <div>
                <x-tabler::icon name="user" class="icon-sm me-1" />
                {{ $post->author->name }}
            </div>
        </div>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

#### Footer with Pagination

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <table class="table">
            <!-- Table content -->
        </table>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        {{ $items->links() }}
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Footer content (typically buttons, links, or meta info) |

---

### Accessibility Notes

- Footer maintains proper focus order
- Interactive elements are keyboard accessible
- Screen readers announce footer content correctly
- Use semantic HTML for footer content

---

## Actions {#actions}

Standalone actions section for displaying prominent action buttons.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        Card content
    </x-tabler::cards.body>

    <x-tabler::cards.actions>
        <button class="btn btn-primary">Save</button>
        <button class="btn btn-secondary">Cancel</button>
    </x-tabler::cards.actions>
</x-tabler::cards.card>
```

---

### Examples

#### Actions with Tabler Buttons

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Project Settings</h4>
        <p>Configure your project options.</p>
    </x-tabler::cards.body>

    <x-tabler::cards.actions>
        <x-tabler::button color="primary" icon="device-floppy">
            Save Changes
        </x-tabler::button>
        <x-tabler::button variant="outline" icon="x">
            Discard
        </x-tabler::button>
    </x-tabler::cards.actions>
</x-tabler::cards.card>
```

---

#### Actions vs Footer

**Use Actions when:**
- You want a dedicated, prominent actions section
- Actions need to stand out visually
- You're using full-sized buttons with labels

**Use Footer when:**
- You need additional footer content beyond buttons
- You want a more subtle actions area
- You're including meta information or links

```blade
{{-- Using Actions component --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>Content</x-tabler::cards.body>
    <x-tabler::cards.actions>
        <x-tabler::button color="primary">Primary Action</x-tabler::button>
    </x-tabler::cards.actions>
</x-tabler::cards.card>

{{-- Using Footer component --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>Content</x-tabler::cards.body>
    <x-tabler::cards.footer>
        <x-tabler::button color="primary">Primary Action</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Action buttons or controls |

---

### Accessibility Notes

- All action buttons are keyboard accessible
- Provide clear button labels or ARIA labels for icon-only buttons
- Maintain logical focus order
- Screen readers announce actions properly

---

## Status {#status}

Colored status indicator bar that can be positioned on any edge of the card.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.status color="success" />

    <x-tabler::cards.body>
        <p>Card with success status indicator.</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Status on Different Edges

```blade
{{-- Top edge (default) --}}
<x-tabler::cards.card>
    <x-tabler::cards.status color="primary" />
    <x-tabler::cards.body>Status on top</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Start (left) edge --}}
<x-tabler::cards.card>
    <x-tabler::cards.status color="success" side="start" />
    <x-tabler::cards.body>Status on left</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- End (right) edge --}}
<x-tabler::cards.card>
    <x-tabler::cards.status color="danger" side="end" />
    <x-tabler::cards.body>Status on right</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Bottom edge --}}
<x-tabler::cards.card>
    <x-tabler::cards.status color="warning" side="bottom" />
    <x-tabler::cards.body>Status on bottom</x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Status with Different Colors

```blade
<div class="row row-cards">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="success" />
            <x-tabler::cards.body>
                <h4>Completed</h4>
                <p>Task is done</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="warning" />
            <x-tabler::cards.body>
                <h4>In Progress</h4>
                <p>Currently working</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="danger" />
            <x-tabler::cards.body>
                <h4>Failed</h4>
                <p>Task failed</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="info" />
            <x-tabler::cards.body>
                <h4>Pending</h4>
                <p>Awaiting approval</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string\|null` | `null` | Status bar color: `primary`, `secondary`, `success`, `danger`, `warning`, `info` |
| `side` | `string` | `'top'` | Position: `top`, `start`, `end`, `bottom` |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

This component does not support slots.

---

### Accessibility Notes

- Status bars provide visual indication but should be paired with text labels
- Don't rely solely on color for status information
- Include text or icons to support users with color vision deficiencies
- Use descriptive text within the card to explain the status

---

## Progress {#progress}

Progress bar component that displays task or project completion status.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.progress value="75" color="primary" />

    <x-tabler::cards.body>
        <h3 class="card-title">Project Completion</h3>
        <p>3 of 4 milestones completed</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Progress at Different Positions

```blade
{{-- Top position (default) --}}
<x-tabler::cards.card>
    <x-tabler::cards.progress value="60" color="success" />
    <x-tabler::cards.body>
        <h4>Development Phase</h4>
        <p>60% complete</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Bottom position --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Testing Phase</h4>
        <p>80% complete</p>
    </x-tabler::cards.body>
    <x-tabler::cards.progress value="80" color="primary" position="bottom" />
</x-tabler::cards.card>
```

---

#### Progress with Different Colors

```blade
<div class="row row-cards">
    <div class="col-md-4">
        <x-tabler::cards.card>
            <x-tabler::cards.progress value="30" color="danger" />
            <x-tabler::cards.body>
                <h4>Low Progress</h4>
                <p>Just getting started</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-4">
        <x-tabler::cards.card>
            <x-tabler::cards.progress value="65" color="warning" />
            <x-tabler::cards.body>
                <h4>Medium Progress</h4>
                <p>Making good progress</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-4">
        <x-tabler::cards.card>
            <x-tabler::cards.progress value="95" color="success" />
            <x-tabler::cards.body>
                <h4>Almost Done</h4>
                <p>Nearly complete</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

---

#### Dynamic Progress with Laravel

```blade
<x-tabler::cards.card>
    <x-tabler::cards.progress
        value="{{ $project->completion_percentage }}"
        color="{{ $project->completion_percentage >= 75 ? 'success' : 'warning' }}" />

    <x-tabler::cards.body>
        <h4>{{ $project->name }}</h4>
        <p>{{ $project->completed_tasks }} of {{ $project->total_tasks }} tasks complete</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `value` | `int\|float` | `0` | Progress value from 0 to 100 |
| `color` | `string` | `'primary'` | Progress bar color |
| `position` | `string` | `'top'` | Position: `top` or `bottom` |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

This component does not support slots (the card body is added as a sibling).

---

### Accessibility Notes

- Progress bars include proper ARIA attributes (`role="progressbar"`, `aria-valuenow`, `aria-valuemin`, `aria-valuemax`)
- Screen readers announce progress values
- Include text description of progress in card body
- Don't rely solely on color to indicate progress level

---

## Img {#img}

Card image component with support for top/bottom positioning and overlays.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.img
        src="/images/photo.jpg"
        alt="Mountain landscape" />

    <x-tabler::cards.body>
        <h3 class="card-title">Beautiful Scenery</h3>
        <p>Explore amazing landscapes</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Image at Top (Default)

```blade
<x-tabler::cards.card>
    <x-tabler::cards.img
        src="/images/product.jpg"
        alt="Product photo" />

    <x-tabler::cards.body>
        <h4>Product Name</h4>
        <p>$49.99</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Image at Bottom

```blade
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Mountain Hike</h4>
        <p>Join us for an amazing mountain hiking experience.</p>
    </x-tabler::cards.body>

    <x-tabler::cards.img
        src="/images/mountain.jpg"
        alt="Mountain trail"
        position="bottom" />
</x-tabler::cards.card>
```

---

#### Image with Overlay Content

```blade
<x-tabler::cards.card>
    <x-tabler::cards.img
        src="/images/hero.jpg"
        alt="Hero image"
        overlay>
        <div class="text-white">
            <h3 class="card-title">Overlay Title</h3>
            <p>Content displayed over the image</p>
            <x-tabler::button color="light">Learn More</x-tabler::button>
        </div>
    </x-tabler::cards.img>
</x-tabler::cards.card>
```

---

#### Clickable Image Card

```blade
<x-tabler::cards.card link href="{{ route('gallery.show', $photo) }}">
    <x-tabler::cards.img
        src="{{ $photo->thumbnail_url }}"
        alt="{{ $photo->title }}" />

    <x-tabler::cards.body>
        <h4>{{ $photo->title }}</h4>
        <p class="text-muted">{{ $photo->created_at->diffForHumans() }}</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `src` | `string` | *required* | Image source URL |
| `alt` | `string` | `''` | Alternative text for accessibility |
| `position` | `string` | `'top'` | Image position: `top` or `bottom` |
| `overlay` | `bool` | `false` | Enable overlay mode for text over image |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Overlay content (only used when `overlay` prop is true) |

---

### Accessibility Notes

- Always provide descriptive `alt` text for images
- Alt text should describe the image content, not repeat nearby text
- For decorative images, use `alt=""`
- Ensure overlay text has sufficient contrast with background image
- Clickable image cards should have clear indication they're interactive

---

## Stamp {#stamp}

Decorative corner stamp or badge component, typically positioned in the top-right corner.

### Basic Usage

```blade
<x-tabler::cards.card>
    <x-tabler::cards.stamp color="blue">
        $29
    </x-tabler::cards.stamp>

    <x-tabler::cards.body>
        <h3 class="card-title">Premium Plan</h3>
        <p>All features included</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Examples

#### Stamp with Price

```blade
<x-tabler::cards.card>
    <x-tabler::cards.stamp color="success">
        $99/mo
    </x-tabler::cards.stamp>

    <x-tabler::cards.body>
        <h4>Business Plan</h4>
        <ul>
            <li>Unlimited users</li>
            <li>24/7 support</li>
            <li>Custom domain</li>
        </ul>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Stamp with Icon

```blade
<x-tabler::cards.card>
    <x-tabler::cards.stamp color="primary" icon="star">
    </x-tabler::cards.stamp>

    <x-tabler::cards.body>
        <h4>Featured Product</h4>
        <p>This is a popular item</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Stamp with Text Badge

```blade
<x-tabler::cards.card>
    <x-tabler::cards.stamp color="danger">
        NEW
    </x-tabler::cards.stamp>

    <x-tabler::cards.body>
        <h4>Latest Release</h4>
        <p>Check out our newest product</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Multiple Cards with Different Stamps

```blade
<div class="row row-cards">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.stamp color="blue">
                Free
            </x-tabler::cards.stamp>
            <x-tabler::cards.body>
                <h4>Basic</h4>
                <p>For individuals</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.stamp color="green">
                $19
            </x-tabler::cards.stamp>
            <x-tabler::cards.body>
                <h4>Pro</h4>
                <p>For professionals</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.stamp color="red" icon="star">
            </x-tabler::cards.stamp>
            <x-tabler::cards.body>
                <h4>Enterprise</h4>
                <p>For organizations</p>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `color` | `string\|null` | `null` | Tabler color variant |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `class` | `string` | `''` | Additional CSS classes |

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | No | Stamp content (text, numbers, or symbols) |

---

### Accessibility Notes

- Ensure stamp text is meaningful and descriptive
- Don't rely solely on stamps for critical information
- Stamps are decorative but should complement accessible content
- Screen readers will announce stamp content
- Consider providing context in the card body

---

## Shared Features {#shared-features}

Features and patterns common to multiple card components.

### Visual Variants {#visual-variants}

Cards support various visual styles through CSS classes:

**Borderless cards:**
```blade
<x-tabler::cards.card class="card-borderless">
    <x-tabler::cards.body>
        Card without border
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Stacked effect:**
```blade
<x-tabler::cards.card class="card-stacked">
    <x-tabler::cards.body>
        Floating stacked card
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Rotate effect on hover:**
```blade
<x-tabler::cards.card link href="/details" class="card-link-rotate">
    <x-tabler::cards.body>
        Hover to see rotation
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Padding Sizes {#padding-sizes}

Control card padding with the `padding` prop:

```blade
{{-- Small padding --}}
<x-tabler::cards.card padding="sm">
    <x-tabler::cards.body>Compact</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Medium padding (default) --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>Normal</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Large padding --}}
<x-tabler::cards.card padding="lg">
    <x-tabler::cards.body>Spacious</x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Active/Inactive States {#active-inactive-states}

Highlight or dim cards based on state:

```blade
{{-- Active (highlighted) --}}
<x-tabler::cards.card active>
    <x-tabler::cards.body>
        Selected option
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Inactive (dimmed) --}}
<x-tabler::cards.card inactive>
    <x-tabler::cards.body>
        Disabled option
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Use cases:**
- Active: Selected pricing plan, current step in wizard, highlighted option
- Inactive: Sold-out products, unavailable features, disabled options

---

### Clickable Cards {#clickable-cards}

Make entire cards clickable by setting the `link` prop:

```blade
<x-tabler::cards.card link href="{{ route('products.show', $product) }}">
    <x-tabler::cards.body>
        <h4>{{ $product->name }}</h4>
        <p>{{ $product->price }}</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Hover effects:**
```blade
{{-- Pop effect --}}
<x-tabler::cards.card link href="/details" class="card-link-pop">
    <x-tabler::cards.body>Pops on hover</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Rotate effect --}}
<x-tabler::cards.card link href="/details" class="card-link-rotate">
    <x-tabler::cards.body>Rotates on hover</x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Color Customization {#color-customization}

Customize card colors using Bootstrap/Tabler CSS classes:

**Background colors:**
```blade
{{-- Primary color --}}
<x-tabler::cards.card class="bg-primary text-white">
    <x-tabler::cards.body>Primary card</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Light variants --}}
<x-tabler::cards.card class="bg-primary-lt">
    <x-tabler::cards.body>Light primary</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Custom colors --}}
<x-tabler::cards.card class="bg-blue-lt text-blue">
    <x-tabler::cards.body>Blue themed</x-tabler::cards.body>
</x-tabler::cards.card>
```

**Available colors:**
- `primary`, `secondary`, `success`, `danger`, `warning`, `info`
- `blue`, `azure`, `indigo`, `purple`, `pink`, `red`, `orange`, `yellow`, `lime`, `green`, `teal`, `cyan`
- Light variants: Add `-lt` suffix (e.g., `bg-primary-lt`)

---

## Complete Examples {#complete-examples}

Real-world scenarios showing multiple components working together.

### Example 1: Dashboard Stats Grid

```blade
<div class="row row-cards">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="success" />
            <x-tabler::cards.body>
                <div class="subheader">Total Revenue</div>
                <div class="h1 mb-2">${{ number_format($revenue, 2) }}</div>
                <div class="text-success d-flex align-items-center">
                    <x-tabler::icon name="trending-up" class="icon-sm me-1" />
                    +15% from last month
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="primary" />
            <x-tabler::cards.body>
                <div class="subheader">New Users</div>
                <div class="h1 mb-2">{{ number_format($users) }}</div>
                <div class="text-primary d-flex align-items-center">
                    <x-tabler::icon name="user-plus" class="icon-sm me-1" />
                    +{{ $newUsers }} this week
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.progress value="{{ $completionRate }}" color="success" />
            <x-tabler::cards.body>
                <div class="subheader">Projects</div>
                <div class="h1 mb-2">{{ $activeProjects }}</div>
                <div class="text-muted">
                    {{ $completionRate }}% completion rate
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.status color="warning" />
            <x-tabler::cards.body>
                <div class="subheader">Pending Tasks</div>
                <div class="h1 mb-2">{{ $pendingTasks }}</div>
                <div class="text-warning">
                    Requires attention
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>
</div>
```

**Use Case:** Dashboard overview with key metrics and visual status indicators.

---

### Example 2: Product Catalog

```blade
<div class="row row-cards">
    @foreach($products as $product)
        <div class="col-md-4">
            <x-tabler::cards.card link href="{{ route('products.show', $product) }}" class="card-link-pop">
                @if($product->is_featured)
                    <x-tabler::cards.stamp color="red" icon="star"></x-tabler::cards.stamp>
                @endif

                <x-tabler::cards.img
                    src="{{ $product->image_url }}"
                    alt="{{ $product->name }}" />

                <x-tabler::cards.body>
                    <h4 class="mb-2">{{ $product->name }}</h4>
                    <p class="text-muted mb-3">{{ Str::limit($product->description, 80) }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="h3 mb-0">${{ number_format($product->price, 2) }}</div>
                        @if($product->in_stock)
                            <x-tabler::badge color="success">In Stock</x-tabler::badge>
                        @else
                            <x-tabler::badge color="danger">Out of Stock</x-tabler::badge>
                        @endif
                    </div>
                </x-tabler::cards.body>

                @if($product->discount_percentage > 0)
                    <x-tabler::cards.status color="success" side="bottom" />
                @endif
            </x-tabler::cards.card>
        </div>
    @endforeach
</div>
```

**Use Case:** E-commerce product grid with images, pricing, stock status, and featured indicators.

---

### Example 3: User Profile Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.img
        src="{{ $user->cover_image_url }}"
        alt="Cover"
        overlay>
        <div class="text-center text-white">
            <x-tabler::avatar
                src="{{ $user->avatar_url }}"
                size="xl"
                alt="{{ $user->name }}" />
            <h3 class="mt-3 mb-0">{{ $user->name }}</h3>
            <p class="mb-0">{{ $user->title }}</p>
        </div>
    </x-tabler::cards.img>

    <x-tabler::cards.body>
        <div class="row text-center">
            <div class="col-4">
                <div class="h4 mb-0">{{ number_format($user->posts_count) }}</div>
                <div class="text-muted">Posts</div>
            </div>
            <div class="col-4">
                <div class="h4 mb-0">{{ number_format($user->followers_count) }}</div>
                <div class="text-muted">Followers</div>
            </div>
            <div class="col-4">
                <div class="h4 mb-0">{{ number_format($user->following_count) }}</div>
                <div class="text-muted">Following</div>
            </div>
        </div>

        <hr class="my-3">

        <p>{{ $user->bio }}</p>

        <div class="d-flex flex-wrap gap-2">
            @foreach($user->interests as $interest)
                <x-tabler::badge color="azure-lt">{{ $interest }}</x-tabler::badge>
            @endforeach
        </div>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        @auth
            @if(auth()->id() === $user->id)
                <x-tabler::button href="{{ route('profile.edit') }}" variant="outline" class="w-100">
                    Edit Profile
                </x-tabler::button>
            @else
                <x-tabler::button color="primary" class="w-100">
                    Follow
                </x-tabler::button>
            @endif
        @endauth
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Use Case:** Social media user profile with cover image, avatar, stats, bio, and follow button.

---

### Example 4: Activity Feed

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Recent Activity</x-slot>
        <x-slot:subtitle>Last 24 hours</x-slot>
        <x-slot:actions>
            <x-tabler::button size="sm" variant="outline" icon="refresh">
                Refresh
            </x-tabler::button>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body scrollable>
        @foreach($activities as $activity)
            <div class="d-flex mb-3 pb-3 border-bottom">
                <x-tabler::avatar
                    src="{{ $activity->user->avatar_url }}"
                    size="sm"
                    alt="{{ $activity->user->name }}" />

                <div class="ms-3 flex-grow-1">
                    <div>
                        <strong>{{ $activity->user->name }}</strong>
                        {{ $activity->description }}
                    </div>
                    <small class="text-muted">
                        {{ $activity->created_at->diffForHumans() }}
                    </small>
                </div>

                @if($activity->hasStatus())
                    <div>
                        <x-tabler::badge color="{{ $activity->status_color }}">
                            {{ $activity->status_text }}
                        </x-tabler::badge>
                    </div>
                @endif
            </div>
        @endforeach
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <a href="{{ route('activity.all') }}" class="text-muted">
            View all activity →
        </a>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Use Case:** Activity feed with scrollable content, avatars, timestamps, and status badges.

---

### Example 5: Pricing Cards

```blade
<div class="row row-cards">
    @foreach($plans as $plan)
        <div class="col-md-4">
            <x-tabler::cards.card
                class="{{ $plan->is_popular ? 'border-primary' : '' }}"
                :active="$plan->is_popular">

                @if($plan->is_popular)
                    <x-tabler::cards.stamp color="primary">
                        Popular
                    </x-tabler::cards.stamp>
                @endif

                <x-tabler::cards.body>
                    <div class="text-center">
                        <h3 class="mb-3">{{ $plan->name }}</h3>
                        <div class="display-5 fw-bold mb-3">
                            ${{ number_format($plan->price, 0) }}
                            <span class="fs-4 fw-normal text-muted">/month</span>
                        </div>
                        <p class="text-muted mb-4">{{ $plan->description }}</p>
                    </div>

                    <ul class="list-unstyled mb-4">
                        @foreach($plan->features as $feature)
                            <li class="mb-2">
                                <x-tabler::icon name="check" class="text-success me-2" />
                                {{ $feature }}
                            </li>
                        @endforeach
                    </ul>
                </x-tabler::cards.body>

                <x-tabler::cards.footer>
                    <x-tabler::button
                        :color="$plan->is_popular ? 'primary' : 'outline'"
                        class="w-100">
                        Choose {{ $plan->name }}
                    </x-tabler::button>
                </x-tabler::cards.footer>
            </x-tabler::cards.card>
        </div>
    @endforeach
</div>
```

**Use Case:** Pricing table with features, popular badge, and CTA buttons.

---

### Example 6: Project Kanban Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.progress value="{{ $task->progress_percentage }}" color="primary" />

    <x-tabler::cards.header>
        <x-slot:title>{{ $task->title }}</x-slot>
        <x-slot:actions>
            <x-tabler::dropdown>
                <x-slot:toggle>
                    <button class="btn btn-sm btn-icon">
                        <x-tabler::icon name="dots-vertical" />
                    </button>
                </x-slot:toggle>
                <x-tabler::dropdown-item>Edit</x-tabler::dropdown-item>
                <x-tabler::dropdown-item>Delete</x-tabler::dropdown-item>
            </x-tabler::dropdown>
        </x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <p class="text-muted mb-3">{{ $task->description }}</p>

        <div class="mb-3">
            @foreach($task->tags as $tag)
                <x-tabler::badge color="azure-lt">{{ $tag }}</x-tabler::badge>
            @endforeach
        </div>

        <div class="d-flex justify-content-between text-muted">
            <div>
                <x-tabler::icon name="calendar" class="icon-sm me-1" />
                {{ $task->due_date->format('M d') }}
            </div>
            <div>
                <x-tabler::icon name="message" class="icon-sm me-1" />
                {{ $task->comments_count }}
            </div>
        </div>
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="avatar-list">
                @foreach($task->assignees->take(3) as $assignee)
                    <x-tabler::avatar
                        src="{{ $assignee->avatar_url }}"
                        size="sm"
                        alt="{{ $assignee->name }}" />
                @endforeach
                @if($task->assignees->count() > 3)
                    <span class="avatar avatar-sm">+{{ $task->assignees->count() - 3 }}</span>
                @endif
            </div>
            <x-tabler::badge :color="$task->priority_color">
                {{ $task->priority }}
            </x-tabler::badge>
        </div>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Use Case:** Kanban task card with progress, tags, due date, assignees, and priority.

---

## Composition Patterns {#composition-patterns}

Common patterns for composing card components effectively.

### Pattern 1: Stats Card with Icon

```blade
<x-tabler::cards.card>
    <x-tabler::cards.status color="success" />
    <x-tabler::cards.body>
        <div class="d-flex align-items-center">
            <div class="flex-grow-1">
                <div class="subheader">Total Sales</div>
                <div class="h1 mb-0">$45,890</div>
            </div>
            <div class="ms-auto">
                <div class="bg-success-lt text-success rounded p-3">
                    <x-tabler::icon name="shopping-cart" size="lg" />
                </div>
            </div>
        </div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Pattern 2: Media Object Card

```blade
<x-tabler::cards.card link href="/article" class="card-link-pop">
    <x-tabler::cards.body>
        <div class="row g-3">
            <div class="col-auto">
                <img src="/article-thumb.jpg" alt="Article" class="rounded" width="120" />
            </div>
            <div class="col">
                <h4 class="mb-1">{{ $article->title }}</h4>
                <p class="text-muted mb-2">{{ Str::limit($article->excerpt, 120) }}</p>
                <div class="text-muted small">
                    {{ $article->published_at->format('M d, Y') }} ·
                    {{ $article->read_time }} min read
                </div>
            </div>
        </div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Pattern 3: Form Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Update Settings</x-slot>
        <x-slot:subtitle>Configure your preferences</x-slot>
    </x-tabler::cards.header>

    <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')

        <x-tabler::cards.body>
            <x-tabler::forms.input
                name="company_name"
                label="Company Name"
                :value="old('company_name', $settings->company_name)"
                required />

            <x-tabler::forms.textarea
                name="bio"
                label="Biography"
                :value="old('bio', $settings->bio)"
                rows="4" />

            <x-tabler::forms.checkbox
                name="email_notifications"
                label="Enable email notifications"
                :checked="old('email_notifications', $settings->email_notifications)" />
        </x-tabler::cards.body>

        <x-tabler::cards.footer>
            <x-tabler::button type="submit" color="primary">
                Save Changes
            </x-tabler::button>
            <x-tabler::button type="button" variant="outline">
                Cancel
            </x-tabler::button>
        </x-tabler::cards.footer>
    </form>
</x-tabler::cards.card>
```

---

### Pattern 4: List Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Recent Orders</x-slot>
        <x-slot:actions>
            <a href="{{ route('orders.all') }}" class="btn btn-sm">View All</a>
        </x-slot>
    </x-tabler::cards.header>

    <div class="list-group list-group-flush">
        @foreach($orders as $order)
            <div class="list-group-item">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <x-tabler::badge :color="$order->status_color">
                            {{ $order->status }}
                        </x-tabler::badge>
                    </div>
                    <div class="col">
                        <div class="fw-bold">Order #{{ $order->number }}</div>
                        <div class="text-muted small">{{ $order->customer->name }}</div>
                    </div>
                    <div class="col-auto">
                        <div class="fw-bold">${{ number_format($order->total, 2) }}</div>
                        <div class="text-muted small">{{ $order->created_at->format('M d') }}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-tabler::cards.card>
```

---

## Laravel Integration {#laravel-integration}

Cards integrate seamlessly with Laravel features.

### Using Eloquent Models

```blade
{{-- Product Card --}}
<x-tabler::cards.card>
    <x-tabler::cards.img
        src="{{ $product->getImageUrl() }}"
        alt="{{ $product->name }}" />

    <x-tabler::cards.body>
        <h4>{{ $product->name }}</h4>
        <p>${{ $product->formatted_price }}</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### With Livewire

```blade
<div wire:poll.30s>
    <x-tabler::cards.card>
        <x-tabler::cards.progress value="{{ $this->completionPercentage }}" color="primary" />

        <x-tabler::cards.body>
            <h4>{{ $task->name }}</h4>
            <p>{{ $task->status }}</p>
        </x-tabler::cards.body>

        <x-tabler::cards.footer>
            <button wire:click="markComplete" class="btn btn-primary">
                Mark Complete
            </button>
        </x-tabler::cards.footer>
    </x-tabler::cards.card>
</div>
```

---

### With Collections

```blade
<div class="row row-cards">
    @foreach($users->chunk(3) as $chunk)
        @foreach($chunk as $user)
            <div class="col-md-4">
                <x-tabler::cards.card link href="{{ route('users.show', $user) }}">
                    <x-tabler::cards.body>
                        <x-tabler::avatar src="{{ $user->avatar }}" />
                        <h4>{{ $user->name }}</h4>
                    </x-tabler::cards.body>
                </x-tabler::cards.card>
            </div>
        @endforeach
    @endforeach
</div>
```

---

### With Pagination

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>All Products ({{ $products->total() }})</x-slot>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        @foreach($products as $product)
            {{-- Product list items --}}
        @endforeach
    </x-tabler::cards.body>

    <x-tabler::cards.footer>
        {{ $products->links() }}
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

---

### With Form Requests

```php
// App\Http\Controllers\ProjectController.php
public function store(StoreProjectRequest $request)
{
    $project = Project::create($request->validated());

    return redirect()
        ->route('projects.show', $project)
        ->with('success', 'Project created successfully!');
}
```

```blade
{{-- resources/views/projects/create.blade.php --}}
<x-tabler::cards.card>
    <form method="POST" action="{{ route('projects.store') }}">
        @csrf

        <x-tabler::cards.header>
            <x-slot:title>Create Project</x-slot>
        </x-tabler::cards.header>

        <x-tabler::cards.body>
            <x-tabler::forms.input
                name="name"
                label="Project Name"
                :value="old('name')"
                required />

            <x-tabler::forms.textarea
                name="description"
                label="Description"
                :value="old('description')"
                rows="4" />
        </x-tabler::cards.body>

        <x-tabler::cards.footer>
            <x-tabler::button type="submit" color="primary">
                Create Project
            </x-tabler::button>
        </x-tabler::cards.footer>
    </form>
</x-tabler::cards.card>
```

---

## Accessibility {#accessibility}

Cards are built with accessibility as a priority.

### Keyboard Navigation

- **Tab**: Move focus through interactive elements within cards
- **Enter/Space**: Activate clickable cards or buttons
- **Arrow keys**: Navigate between cards in grid layouts (browser default)
- Clickable cards are fully keyboard accessible as link elements

---

### ARIA Attributes

**Clickable cards:**
```blade
<x-tabler::cards.card link href="/details" aria-label="View project details">
    <x-tabler::cards.body>
        <h4>Project Name</h4>
        <p>Project description</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Progress bars:**
- Include `role="progressbar"`
- Include `aria-valuenow`, `aria-valuemin`, `aria-valuemax`
- Automatically applied by the Progress component

**Scrollable regions:**
- Scrollable card bodies include appropriate ARIA attributes
- Screen readers announce scrollable regions

---

### Screen Reader Support

- **Headers**: Use semantic `<h3>` tags, announced as headings
- **Structure**: Cards maintain logical document outline
- **Links**: Clickable cards announced as links with destination
- **Images**: Always provide descriptive alt text
- **Status**: Color-coded status should be paired with text
- **Progress**: Progress values are announced

**Example with good accessibility:**
```blade
<x-tabler::cards.card link href="{{ route('products.show', $product) }}" aria-label="View {{ $product->name }} details">
    <x-tabler::cards.status color="success" />

    <x-tabler::cards.img
        src="{{ $product->image_url }}"
        alt="{{ $product->name }} product photo" />

    <x-tabler::cards.body>
        <h4>{{ $product->name }}</h4>
        <p class="text-muted">{{ $product->category }}</p>
        <div>
            <span class="visually-hidden">Price:</span>
            <strong>${{ number_format($product->price, 2) }}</strong>
        </div>
        <x-tabler::badge color="success">
            In Stock
        </x-tabler::badge>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Color Contrast

All card components meet WCAG 2.1 AA standards:

- **Text on white backgrounds**: Minimum 4.5:1 contrast
- **Text on colored backgrounds**: Tested for sufficient contrast
- **Status indicators**: Don't rely solely on color
- **Colored cards**: Use light variants (`bg-primary-lt`) for better text contrast

**Testing contrast:**
```blade
{{-- Good: Light background with dark text --}}
<x-tabler::cards.card class="bg-primary-lt text-primary">
    <x-tabler::cards.body>High contrast</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Be careful: Solid backgrounds need white text --}}
<x-tabler::cards.card class="bg-primary text-white">
    <x-tabler::cards.body>Ensure sufficient contrast</x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Focus Indicators

- **Visible focus**: Clear outline on focused interactive elements
- **High contrast**: Focus indicators work in both light and dark themes
- **Never remove**: Don't use `outline: none` without providing alternative focus indicator

---

### Best Practices for Accessibility

1. **Always provide alt text for images**
2. **Use semantic heading tags** in card headers
3. **Provide descriptive link text** for clickable cards
4. **Don't rely solely on color** for important information
5. **Maintain logical focus order** through cards
6. **Test with keyboard navigation**
7. **Test with screen readers** (NVDA, JAWS, VoiceOver)
8. **Ensure sufficient color contrast**
9. **Provide text alternatives** for icon-only buttons
10. **Use ARIA labels** when context isn't clear from visible text

---

## Best Practices {#best-practices}

Guidelines for effective card design and usage.

### Do's ✅

**Use semantic structure:**
```blade
{{-- Good: Proper component hierarchy --}}
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Title</x-slot>
    </x-tabler::cards.header>
    <x-tabler::cards.body>Content</x-tabler::cards.body>
    <x-tabler::cards.footer>Actions</x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Group related content:**
```blade
{{-- Good: Related stats in one card --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <div class="row">
            <div class="col-6">
                <div class="subheader">Views</div>
                <div class="h3">1,234</div>
            </div>
            <div class="col-6">
                <div class="subheader">Clicks</div>
                <div class="h3">567</div>
            </div>
        </div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Provide clear CTAs:**
```blade
<x-tabler::cards.footer>
    <x-tabler::button color="primary">
        View Details
    </x-tabler::button>
</x-tabler::cards.footer>
```

**Use consistent card heights in grids:**
```blade
<div class="row row-cards row-deck">
    <div class="col-md-4">
        <x-tabler::cards.card>...</x-tabler::cards.card>
    </div>
    <div class="col-md-4">
        <x-tabler::cards.card>...</x-tabler::cards.card>
    </div>
</div>
```

**Use appropriate padding:**
```blade
{{-- Good: Compact stats card --}}
<x-tabler::cards.card padding="sm">
    <x-tabler::cards.body>
        <div class="h3 mb-0">145</div>
        <div class="text-muted">Users</div>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Don'ts ❌

**Don't overuse clickable cards:**
```blade
{{-- Bad: Card with both clickable container and buttons --}}
<x-tabler::cards.card link href="/details">
    <x-tabler::cards.body>Content</x-tabler::cards.body>
    <x-tabler::cards.footer>
        {{-- These buttons won't work as expected --}}
        <x-tabler::button>Action</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Don't nest cards too deeply:**
```blade
{{-- Bad: Overly nested structure --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <x-tabler::cards.card>
                    {{-- Too deep! --}}
                </x-tabler::cards.card>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Don't use cards without padding:**
```blade
{{-- Bad: No padding specified when needed --}}
<x-tabler::cards.card class="p-0">
    {{-- Content touching edges looks wrong --}}
</x-tabler::cards.card>
```

**Don't rely only on color for status:**
```blade
{{-- Bad: Only color indicates status --}}
<x-tabler::cards.card class="bg-danger">
    <x-tabler::cards.body>Important</x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Good: Color + icon + text --}}
<x-tabler::cards.card class="bg-danger-lt">
    <x-tabler::cards.body>
        <x-tabler::icon name="alert-triangle" class="text-danger me-2" />
        <strong>Error:</strong> Important message
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Don't create cards with no visual hierarchy:**
```blade
{{-- Bad: Everything is the same size --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <p>Title</p>
        <p>Content</p>
        <p>More content</p>
    </x-tabler::cards.body>
</x-tabler::cards.card>

{{-- Good: Clear hierarchy --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        <h4>Title</h4>
        <p>Content</p>
        <small class="text-muted">Additional details</small>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Performance Tips

**Lazy load images:**
```blade
<x-tabler::cards.img
    src="{{ $product->image_url }}"
    alt="{{ $product->name }}"
    loading="lazy" />
```

**Paginate large card grids:**
```blade
<div class="row row-cards">
    @foreach($products as $product)
        <div class="col-md-4">
            <x-tabler::cards.card>...</x-tabler::cards.card>
        </div>
    @endforeach
</div>

{{ $products->links() }}
```

**Use responsive images:**
```blade
<x-tabler::cards.img
    src="{{ $product->getResponsiveImage('medium') }}"
    srcset="{{ $product->getResponsiveImage('small') }} 400w,
            {{ $product->getResponsiveImage('medium') }} 800w,
            {{ $product->getResponsiveImage('large') }} 1200w"
    alt="{{ $product->name }}" />
```

**Minimize nested components:**
```blade
{{-- Good: Flat structure --}}
<x-tabler::cards.card>
    <x-tabler::cards.body>
        Simple content
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Layout Tips

**Use Bootstrap grid for card layouts:**
```blade
<div class="row row-cards">
    <div class="col-md-4">
        <x-tabler::cards.card>...</x-tabler::cards.card>
    </div>
    <div class="col-md-8">
        <x-tabler::cards.card>...</x-tabler::cards.card>
    </div>
</div>
```

**Use row-deck for equal height cards:**
```blade
<div class="row row-cards row-deck">
    {{-- All cards will have equal height --}}
</div>
```

**Add spacing between cards:**
```blade
<div class="row row-cards g-3">
    {{-- g-3 adds gap between cards --}}
</div>
```

---

## Browser Compatibility

### Requirements

- **Bootstrap 5.x** (CSS)
- **Modern CSS** (Flexbox, CSS Grid)
- **Tabler Icons** (`secondnetwork/blade-tabler-icons`) - optional, for icon props

### Supported Browsers

- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues

- **Card shadows**: May render slightly differently across browsers
- **Image aspect ratios**: Native `aspect-ratio` CSS not supported in older browsers
- **Hover effects**: Transform and transition effects require modern CSS
- **Backdrop blur**: Overlay effects may not work in older Safari versions

---

## Troubleshooting

### Common Issues

**Issue: Card not displaying properly**
- ✅ Ensure Bootstrap 5 CSS is loaded
- ✅ Check that parent container has proper layout (grid/flex)
- ✅ Verify no conflicting CSS styles
- ✅ Use proper card structure (header/body/footer order)
- ✅ Inspect with browser devtools for CSS conflicts

**Issue: Clickable card not working**
- ✅ Set `link` prop to `true`
- ✅ Provide `href` attribute
- ✅ Check JavaScript console for errors
- ✅ Verify no parent elements preventing clicks
- ✅ Don't put interactive elements inside clickable cards

**Issue: Header actions not aligning**
- ✅ Use `actions` slot, not default slot
- ✅ Check button sizes (use `size="sm"` for compact headers)
- ✅ Verify Bootstrap CSS is loaded
- ✅ Inspect with browser devtools for flexbox issues

**Issue: Scrollable body not scrolling**
- ✅ Set `scrollable` prop to `true`
- ✅ Ensure content is longer than max-height
- ✅ Check for conflicting `overflow` styles
- ✅ Verify Bootstrap CSS includes scrollable styles

**Issue: Card padding incorrect**
- ✅ Use `padding` prop: `sm`, `md`, `lg`
- ✅ Check for conflicting padding classes on body
- ✅ Verify Bootstrap version is 5.x
- ✅ Inspect rendered classes in devtools

**Issue: Images not displaying**
- ✅ Verify image `src` path is correct
- ✅ Check file permissions
- ✅ Ensure images are publicly accessible
- ✅ Provide valid `alt` text
- ✅ Check browser console for 404 errors

**Issue: Status bar not visible**
- ✅ Provide `color` prop to Status component
- ✅ Ensure status is inside card container
- ✅ Check z-index and positioning
- ✅ Verify Tabler CSS is loaded

**Issue: Progress bar not showing**
- ✅ Set `value` prop (0-100)
- ✅ Provide `color` prop
- ✅ Check if progress is inside card structure
- ✅ Verify Bootstrap progress styles are loaded

**Issue: Card grid layout broken**
- ✅ Use Bootstrap grid classes correctly (`row`, `col-*`)
- ✅ Add `row-cards` class to row
- ✅ Use `row-deck` for equal height cards
- ✅ Check responsive breakpoints
- ✅ Inspect with devtools for grid issues

---

### Debugging Tips

1. **Inspect HTML structure** in browser devtools
2. **Check applied CSS classes** match documentation
3. **Test with minimal card** example first
4. **Verify card structure** follows component order
5. **Check for CSS specificity** conflicts
6. **Clear browser cache** and reload
7. **Test in different browsers** to isolate browser-specific issues
8. **Review Laravel logs** for Blade compilation errors
9. **Use `php artisan view:clear`** to clear compiled views
10. **Check Tabler CSS version** matches package requirements

---

## Related Components

- [Button](./button.md) - Action buttons in card footers
- [Avatar](./avatar.md) - User avatars in cards
- [Badge](./badge.md) - Status badges and labels
- [Progress](./progress.md) - Standalone progress bars
- [Alert](./alert.md) - Alert messages in cards
- [Modal](./modals.md) - Cards in modal dialogs
- [Dropdown](./dropdowns.md) - Dropdown menus in card headers
- [Forms](./forms.md) - Form inputs in card bodies

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/cards/`

**Sub-components:**
- `card.blade.php` - Main container
- `header.blade.php` - Header section
- `body.blade.php` - Body section
- `footer.blade.php` - Footer section
- `actions.blade.php` - Actions section
- `status.blade.php` - Status indicator
- `progress.blade.php` - Progress bar
- `img.blade.php` - Card image
- `stamp.blade.php` - Corner stamp

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation with all 9 card sub-components
