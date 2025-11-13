# Tabs

> Complete tabbed navigation system for organizing content into switchable panes with Bootstrap 5 integration, keyboard navigation, and ARIA support.

## Overview

The Tabs component family provides a complete tabbed navigation system for organizing and switching between different content sections without page navigation. Tabs are perfect for settings panels, dashboards, profile pages, and any interface where users need to switch between related content views.

**What problems do these components solve:**
- Organize large amounts of content into manageable, focused sections
- Reduce page clutter by showing only relevant content at a time
- Provide intuitive navigation between related content areas
- Maintain application context without full page reloads
- Create professional, accessible tabbed interfaces quickly

**Common use cases:**
- User profile and settings pages with multiple sections
- Dashboard views with different data perspectives
- Multi-step forms and wizards
- Product detail pages with specifications, reviews, and related items
- Admin panels with configuration sections
- Documentation with categorized content

**How they work together:**
The tabs system consists of five components that work together: Tabs (wrapper), Nav (navigation container), Nav Item (individual tabs), Content (content wrapper), and Pane (content sections). The Nav and Nav Items create the clickable tab interface, while Content and Pane components manage the switchable content areas. Bootstrap 5's JavaScript handles the switching behavior automatically.

**When to use components from this group:**
Use tabs when you have 2-7 related content sections that users might want to switch between. For more than 7 sections, consider alternative navigation patterns like sidebars or accordions. Tabs work best when each section is equally important and users might need to access multiple sections in a single session.

**Components in this group:**
- **Tabs** - Main container wrapping the entire tabs interface
- **Nav** - Navigation container with styling options (tabs, pills, fill, justified)
- **Nav Item** - Individual clickable tab links with icon support and active states
- **Content** - Container for all tab panes
- **Pane** - Individual content sections that show/hide based on active tab

---

## Quick Start

The most common use case to get started quickly:

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="home" active>
            <h4>Home Content</h4>
            <p>Welcome to the home tab.</p>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="profile">
            <h4>Profile Content</h4>
            <p>Your profile information.</p>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="settings">
            <h4>Settings Content</h4>
            <p>Configure your preferences.</p>
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

**Installation**: No additional installation needed - included with tabler-blade package. Requires Bootstrap 5 JavaScript for tab switching functionality.

---

## Component Comparison

Choose the right component for your needs:

| Component | Best For | Key Features | When to Use |
|-----------|----------|--------------|-------------|
| **Tabs** | Full interface wrapper | Container for entire tab system | Always use as outer wrapper |
| **Nav** | Tab navigation bar | Multiple styles (tabs/pills), fill/justified | Container for clickable tabs |
| **Nav Item** | Individual tabs | Icons, active states, disabled | Each clickable tab link |
| **Content** | Content wrapper | Groups all panes | Container for switchable content |
| **Pane** | Content sections | Show/hide, fade transitions | Each content section |

**Quick Decision Tree**:
- Need to wrap entire tabs interface? → Use **Tabs**
- Creating the navigation bar? → Use **Nav**
- Adding individual tab links? → Use **Nav Item**
- Wrapping all content sections? → Use **Content**
- Creating individual content areas? → Use **Pane**

**Style Variations**:
- Traditional tabs with underline → Use Nav (default)
- Pill-style buttons → Use Nav with `pills` prop
- Full-width tabs → Use Nav with `fill` prop
- Equal-width tabs → Use Nav with `justified` prop
- Tabs in card header → Use Nav with `inCard` prop

---

## Table of Contents

**Components:**
- [Tabs](#tabs-component) - Main tabs container
- [Nav](#nav-component) - Navigation container
- [Nav Item](#nav-item-component) - Individual tab link
- [Content](#content-component) - Content container
- [Pane](#pane-component) - Individual content pane

**Shared Features:**
- [Styling Variants](#styling-variants) - Tabs vs Pills, Fill vs Justified
- [Icons](#icons) - Leading icons and icon-only tabs
- [States](#states) - Active and disabled states
- [Card Integration](#card-integration) - Tabs in card headers

**Advanced:**
- [Complete Examples](#complete-examples) - 6 real-world implementations
- [Composition Patterns](#composition-patterns) - Common tab layouts
- [Laravel Integration](#laravel-integration) - Dynamic tabs, permissions
- [JavaScript Events](#javascript-events) - Bootstrap tab events
- [Accessibility](#accessibility) - Keyboard navigation, ARIA
- [Best Practices](#best-practices) - Do's and don'ts
- [Troubleshooting](#troubleshooting) - Common issues

---

## Tabs Component {#tabs-component}

The main container component that wraps the entire tabs interface. This is a lightweight wrapper that provides semantic structure.

### Basic Usage

```blade
<x-tabler::tabs.tabs>
    {{-- Nav and Content components go here --}}
</x-tabler::tabs.tabs>
```

**Output:** A semantic `<div>` container for the entire tabs interface.

---

### Examples

#### Minimal Tabs Structure

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="tab1" active>
            Content 1
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="tab2">
            Content 2
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

---

#### With Custom ID

```blade
<x-tabler::tabs.tabs id="user-profile-tabs">
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="profile" active>
            Profile information
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="settings">
            Settings options
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

---

#### With Custom Classes

```blade
<x-tabler::tabs.tabs class="my-custom-tabs mb-4">
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#details">Details</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="overview" active>
            Overview content
        </x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="details">
            Detailed content
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string\|null` | `null` | Optional container ID for targeting with JavaScript |
| `class` | `string` | `''` | Additional CSS classes for the wrapper container |

**Note:** All additional HTML attributes are passed through to the container `<div>` element.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Contains Nav and Content components that make up the tabs interface |

---

### Accessibility Notes

- Provides semantic container structure for screen readers
- Works with child components' ARIA attributes for proper tab announcements
- No interactive elements at this level - accessibility handled by child components

---

## Nav Component {#nav-component}

Navigation container for tab links with support for multiple visual styles and layout options.

### Basic Usage

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab3">Tab 3</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Output:** A `<ul>` element with Bootstrap's `nav nav-tabs` classes containing tab navigation items.

---

### Examples

#### Standard Tabs Style

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

#### Pills Style

```blade
<x-tabler::tabs.nav pills>
    <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#analytics">Analytics</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#reports">Reports</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

#### Full-Width Tabs

```blade
<x-tabler::tabs.nav fill>
    <x-tabler::tabs.nav-item href="#dashboard" active>Dashboard</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#users">Users</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

#### Justified Tabs (Equal Width)

```blade
<x-tabler::tabs.nav justified>
    <x-tabler::tabs.nav-item href="#info" active>Info</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#documentation">Documentation</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#api">API Reference</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

#### Tabs in Card Header

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#details" active>Details</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#activity">Activity</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#history">History</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="details" active>Details content</x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="activity">Activity content</x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="history">History content</x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Pills in Card Header

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard pills>
            <x-tabler::tabs.nav-item href="#summary" active>Summary</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#metrics">Metrics</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#logs">Logs</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="summary" active>Summary content</x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="metrics">Metrics content</x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="logs">Logs content</x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

#### Centered Navigation

```blade
<x-tabler::tabs.nav class="justify-content-center">
    <x-tabler::tabs.nav-item href="#features" active>Features</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#pricing">Pricing</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#support">Support</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

#### Responsive Navigation

```blade
<x-tabler::tabs.nav class="flex-column flex-sm-row">
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#products">Products</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#services">Services</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#about">About</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Note:** Stacks vertically on mobile, horizontal on small screens and up.

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `inCard` | `bool` | `false` | Whether tabs are inside card header (adds `card-header-tabs` or `card-header-pills`) |
| `pills` | `bool` | `false` | Use pills style instead of tabs for rounded, button-like appearance |
| `fill` | `bool` | `false` | Make tabs fill full width proportionally based on content |
| `justified` | `bool` | `false` | Make tabs equal width regardless of content length |
| `class` | `string` | `''` | Additional CSS classes to apply to the navigation element |

**Note:** All additional HTML attributes are passed through to the root `<ul>` element.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Tab navigation items (typically `<x-tabler::tabs.nav-item>` components) |

---

### Accessibility Notes

- `role="tablist"` automatically applied to identify as tab list container
- Works with Nav Item components' ARIA attributes for proper relationships
- Keyboard navigation support requires Bootstrap 5 JavaScript
- Screen readers announce tab count and current selection

---

## Nav Item Component {#nav-item-component}

Individual clickable tab link with icon support, active states, and accessibility features.

### Basic Usage

```blade
<x-tabler::tabs.nav-item href="#home" active>
    Home
</x-tabler::tabs.nav-item>
```

**Output:** A clickable tab link with proper ARIA attributes and Bootstrap tab functionality.

---

### Examples

#### Simple Tab

```blade
<x-tabler::tabs.nav-item href="#profile">
    Profile
</x-tabler::tabs.nav-item>
```

---

#### Active Tab

```blade
<x-tabler::tabs.nav-item href="#home" active>
    Home
</x-tabler::tabs.nav-item>
```

---

#### Tab with Leading Icon

```blade
<x-tabler::tabs.nav-item href="#settings" icon="settings">
    Settings
</x-tabler::tabs.nav-item>
```

---

#### Icon-Only Tab

```blade
<x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly />
```

**Note:** Icon-only tabs should include an `aria-label` for accessibility:

```blade
<x-tabler::tabs.nav-item
    href="#settings"
    icon="settings"
    iconOnly
    aria-label="Account settings" />
```

---

#### Disabled Tab

```blade
<x-tabler::tabs.nav-item href="#premium" disabled>
    Premium (Coming Soon)
</x-tabler::tabs.nav-item>
```

---

#### Tab with Badge

```blade
<x-tabler::tabs.nav-item href="#notifications">
    Notifications
    <span class="badge bg-red ms-1">5</span>
</x-tabler::tabs.nav-item>
```

---

#### Right-Aligned Tab

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
</x-tabler::tabs.nav>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string` | `'#'` | Target tab pane ID with `#` prefix (e.g., `#home`) |
| `active` | `bool` | `false` | Whether this tab is currently active |
| `disabled` | `bool` | `false` | Disable the tab link (prevents clicking) |
| `icon` | `string\|null` | `null` | Tabler icon name without `tabler-` prefix (e.g., `home`, `user`) |
| `iconOnly` | `bool` | `false` | Show only icon without text label |
| `class` | `string` | `''` | Additional CSS classes for the link element |

**Note:**
- All additional HTML attributes are passed through to the link element
- The `href` must match a corresponding Pane's `id` (with the `#` prefix)
- Icons require `secondnetwork/blade-tabler-icons` package (included with tabler-blade)

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes (unless `iconOnly`) | Tab label text content |

---

### Accessibility Notes

- `role="tab"` automatically applied for proper ARIA semantics
- `aria-selected="true"` applied to active tabs
- `aria-controls` links to corresponding pane ID
- `data-bs-toggle="tab"` enables Bootstrap tab functionality
- Disabled tabs properly announced by screen readers
- Icon-only tabs should include `aria-label` attribute

---

## Content Component {#content-component}

Container for all tab panes in a tabbed interface. This is a lightweight structural component.

### Basic Usage

```blade
<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="home" active>
        Home content
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="profile">
        Profile content
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

**Output:** A `<div>` container with Bootstrap's `tab-content` class.

---

### Examples

#### Basic Content Container

```blade
<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="tab1" active>
        Content for tab 1
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="tab2">
        Content for tab 2
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="tab3">
        Content for tab 3
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

---

#### With Custom ID

```blade
<x-tabler::tabs.content id="profile-content">
    <x-tabler::tabs.pane id="personal" active>
        Personal information
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="security">
        Security settings
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

---

#### With Custom Classes

```blade
<x-tabler::tabs.content class="p-3 border-top">
    <x-tabler::tabs.pane id="overview" active>
        Overview content
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="details">
        Details content
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

---

### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string\|null` | `null` | Optional container ID for targeting with JavaScript |
| `class` | `string` | `''` | Additional CSS classes for the container |

**Note:** All additional HTML attributes are passed through to the container `<div>` element.

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | Contains all tab pane components |

---

### Accessibility Notes

- Works seamlessly with ARIA attributes from Nav and Pane components
- Content changes are properly announced when tabs are activated
- No direct ARIA role needed at this level

---

## Pane Component {#pane-component}

Individual content pane that displays when its corresponding tab is active.

### Basic Usage

```blade
<x-tabler::tabs.pane id="home" active>
    <h3>Welcome Home</h3>
    <p>This is the home tab content.</p>
</x-tabler::tabs.pane>
```

**Output:** A `<div>` element with Bootstrap's tab pane classes and fade transitions.

---

### Examples

#### Active Pane

```blade
<x-tabler::tabs.pane id="profile" active>
    <h4>Profile Information</h4>
    <p>View and edit your profile details.</p>
</x-tabler::tabs.pane>
```

---

#### Inactive Pane

```blade
<x-tabler::tabs.pane id="settings">
    <h4>Account Settings</h4>
    <p>Configure your account preferences.</p>
</x-tabler::tabs.pane>
```

---

#### Pane with Form

```blade
<x-tabler::tabs.pane id="general" active>
    <h4>General Settings</h4>
    <form>
        <x-tabler::forms.input name="name" label="Display Name" />
        <x-tabler::forms.input name="email" label="Email Address" type="email" />
        <x-tabler::button type="submit" color="primary">Save Changes</x-tabler::button>
    </form>
</x-tabler::tabs.pane>
```

---

#### Pane with Complex Content

```blade
<x-tabler::tabs.pane id="dashboard" active>
    <div class="row">
        <div class="col-md-3">
            <x-tabler::cards.card>
                <x-tabler::cards.body>
                    <div class="h3">1,234</div>
                    <div class="text-muted">Total Users</div>
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </div>
        <div class="col-md-3">
            <x-tabler::cards.card>
                <x-tabler::cards.body>
                    <div class="h3">$5,678</div>
                    <div class="text-muted">Revenue</div>
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </div>
    </div>
</x-tabler::tabs.pane>
```

---

#### Pane with Custom Classes

```blade
<x-tabler::tabs.pane id="notifications" class="p-4 bg-light">
    <h4>Notification Preferences</h4>
    <p>Choose how you want to receive notifications.</p>
</x-tabler::tabs.pane>
```

---

### Props / Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `id` | `string` | - | **Yes** | Unique pane identifier matching nav-item `href` without `#` prefix |
| `active` | `bool` | `false` | No | Whether this pane is currently active and visible |
| `class` | `string` | `''` | No | Additional CSS classes for the pane container |

**Note:**
- All additional HTML attributes are passed through to the container `<div>` element
- The `id` must match the corresponding Nav Item's `href` (without the `#`)
- Only one pane should have `active` prop set to `true` initially

---

### Slots

| Slot | Required | Description |
|------|----------|-------------|
| `default` | Yes | The content to display in this tab pane |

---

### Accessibility Notes

- `role="tabpanel"` automatically applied to identify as tab panel
- `aria-labelledby` references the controlling tab for proper association
- Proper keyboard navigation support through parent components
- Screen readers announce content changes when tabs are switched
- Fade transitions provide visual feedback without compromising accessibility

---

## Styling Variants {#styling-variants}

The tabs system supports multiple visual styles and layout options.

### Tabs vs Pills

**Tabs Style (Default):**
```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Pills Style:**
```blade
<x-tabler::tabs.nav pills>
    <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#details">Details</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**When to use:**
- **Tabs**: Traditional interfaces, content-heavy applications, when visual hierarchy is important
- **Pills**: Modern designs, cleaner look, navigation-focused interfaces, less formal contexts

---

### Fill vs Justified

**Fill (Proportional Width):**
```blade
<x-tabler::tabs.nav fill>
    <x-tabler::tabs.nav-item href="#tab1" active>Short</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Medium Length</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab3">Very Long Tab Title</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```
*Tabs expand proportionally based on content length*

**Justified (Equal Width):**
```blade
<x-tabler::tabs.nav justified>
    <x-tabler::tabs.nav-item href="#tab1" active>Short</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Medium</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab3">Long</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```
*All tabs have equal width regardless of content*

**When to use:**
- **Fill**: When tabs have varying content length but you want full-width coverage
- **Justified**: When you want perfect symmetry and equal visual weight for all tabs
- **Neither**: When content-based width is acceptable (default behavior)

---

### Combined Styles

```blade
{{-- Pills + Fill --}}
<x-tabler::tabs.nav pills fill>
    <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>

{{-- Pills + Justified --}}
<x-tabler::tabs.nav pills justified>
    <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

## Icons {#icons}

Add visual context to tabs with Tabler icons.

### Leading Icon Tabs

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" icon="home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#user" icon="user">Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings" icon="settings">Settings</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Icon-Only Tabs

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" icon="home" iconOnly active aria-label="Home" />
    <x-tabler::tabs.nav-item href="#user" icon="user" iconOnly aria-label="Profile" />
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly aria-label="Settings" />
</x-tabler::tabs.nav>
```

**Important:** Always provide `aria-label` for icon-only tabs for accessibility.

---

### Mixed Icon Tabs

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#dashboard" icon="home" active>Dashboard</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#users" icon="users">Users</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#reports" icon="file-analytics">Reports</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" aria-label="Settings" />
</x-tabler::tabs.nav>
```

---

### Available Icons

See [Tabler Icons](https://tabler.io/icons) for the complete icon library.

**Common tab icons:**
- `home` - Home/Dashboard
- `user` - Profile/Account
- `settings` - Settings/Configuration
- `bell` - Notifications
- `lock` - Security/Privacy
- `credit-card` - Billing/Payment
- `chart-bar` - Analytics/Reports
- `file` - Documents
- `activity` - Activity/History
- `shield` - Admin/Protection

**Note:** Icons require `secondnetwork/blade-tabler-icons` package (included with tabler-blade).

---

## States {#states}

Tabs support active and disabled states for different use cases.

### Active State

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>

<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="home" active>
        Home content
    </x-tabler::tabs.pane>
    <x-tabler::tabs.pane id="profile">
        Profile content
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

**Important:**
- Always mark exactly one tab and one pane as `active`
- The active tab and pane should correspond to each other
- Bootstrap will handle switching active states when tabs are clicked

---

### Disabled State

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#basic" active>Basic</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#premium" disabled>Premium</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#enterprise" disabled>Enterprise</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**When to use:**
- Features requiring authentication or permissions
- Paid/premium features not available to current user
- Content coming soon but not yet ready
- Conditional access based on user roles

**Accessibility:** Disabled tabs are announced by screen readers and cannot be focused or activated.

---

## Card Integration {#card-integration}

Integrate tabs seamlessly into card headers for compact, professional layouts.

### Basic Card Integration

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#details">Details</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#history">History</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="overview" active>
                Overview content
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="details">
                Details content
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="history">
                History content
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Card with Title and Tabs

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <h3 class="card-title">User Profile</h3>
        <x-tabler::tabs.nav inCard class="ms-auto">
            <x-tabler::tabs.nav-item href="#info" active>Info</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#activity">Activity</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="info" active>
                User information
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="activity">
                Recent activity
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Pills in Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard pills>
            <x-tabler::tabs.nav-item href="#daily" active>Daily</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#weekly">Weekly</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#monthly">Monthly</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="daily" active>
                Daily statistics
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="weekly">
                Weekly statistics
            </x-tabler::tabs.pane>
            <x-tabler::tabs.pane id="monthly">
                Monthly statistics
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

## Complete Examples {#complete-examples}

Real-world scenarios showing tabs in action.

### Example 1: User Profile Tabs

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <h3 class="card-title">{{ $user->name }}</h3>
        <x-tabler::tabs.nav inCard class="ms-auto">
            <x-tabler::tabs.nav-item href="#profile" icon="user" active>Profile</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#activity" icon="activity">Activity</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#notifications" icon="bell">Notifications</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly aria-label="Settings" />
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="profile" active>
                <h4>Profile Information</h4>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <x-tabler::forms.input
                        name="name"
                        label="Name"
                        :value="old('name', $user->name)"
                        required />

                    <x-tabler::forms.input
                        name="email"
                        label="Email"
                        type="email"
                        :value="old('email', $user->email)"
                        required />

                    <x-tabler::forms.textarea
                        name="bio"
                        label="Bio"
                        :value="old('bio', $user->bio)"
                        rows="4" />

                    <x-tabler::button type="submit" color="primary">
                        Save Changes
                    </x-tabler::button>
                </form>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="activity">
                <h4>Recent Activity</h4>
                @forelse($activities as $activity)
                    <div class="mb-3 pb-3 border-bottom">
                        <div class="fw-bold">{{ $activity->title }}</div>
                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                        <p class="mb-0 mt-1">{{ $activity->description }}</p>
                    </div>
                @empty
                    <p class="text-muted">No recent activity.</p>
                @endforelse
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="notifications">
                <h4>Notifications</h4>
                @foreach($notifications as $notification)
                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-grow-1">
                            <div>{{ $notification->message }}</div>
                            <small class="text-muted">{{ $notification->created_at->format('M j, Y') }}</small>
                        </div>
                        <form method="POST" action="{{ route('notifications.mark-read', $notification) }}">
                            @csrf
                            <x-tabler::button type="submit" size="sm" variant="ghost">
                                Mark Read
                            </x-tabler::button>
                        </form>
                    </div>
                @endforeach
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="settings">
                <h4>Account Settings</h4>
                <form method="POST" action="{{ route('settings.update') }}">
                    @csrf
                    @method('PUT')

                    <x-tabler::forms.switch
                        name="email_notifications"
                        label="Email Notifications"
                        :checked="old('email_notifications', $user->email_notifications)" />

                    <x-tabler::forms.switch
                        name="sms_notifications"
                        label="SMS Notifications"
                        :checked="old('sms_notifications', $user->sms_notifications)" />

                    <x-tabler::forms.switch
                        name="two_factor_enabled"
                        label="Two-Factor Authentication"
                        :checked="old('two_factor_enabled', $user->two_factor_enabled)" />

                    <x-tabler::button type="submit" color="primary">
                        Save Settings
                    </x-tabler::button>
                </form>
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Use Case:** Comprehensive user profile interface with personal info, activity feed, notifications, and settings in one organized location.

---

### Example 2: Settings Tabs

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav pills>
        <x-tabler::tabs.nav-item href="#general" icon="settings" active>General</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#security" icon="lock">Security</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#billing" icon="credit-card">Billing</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#team" icon="users">Team</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#api" icon="key">API Keys</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content class="mt-4">
        <x-tabler::tabs.pane id="general" active>
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <h3 class="card-title">General Settings</h3>
                </x-tabler::cards.header>
                <x-tabler::cards.body>
                    <form>
                        <x-tabler::forms.input name="company_name" label="Company Name" />
                        <x-tabler::forms.input name="website" label="Website URL" type="url" />
                        <x-tabler::forms.select name="timezone" label="Timezone" :options="$timezones" />
                        <x-tabler::button type="submit" color="primary">Save</x-tabler::button>
                    </form>
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="security">
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <h3 class="card-title">Security Settings</h3>
                </x-tabler::cards.header>
                <x-tabler::cards.body>
                    <form>
                        <x-tabler::forms.input
                            name="current_password"
                            label="Current Password"
                            type="password" />
                        <x-tabler::forms.input
                            name="new_password"
                            label="New Password"
                            type="password" />
                        <x-tabler::forms.input
                            name="confirm_password"
                            label="Confirm New Password"
                            type="password" />
                        <x-tabler::button type="submit" color="primary">Update Password</x-tabler::button>
                    </form>

                    <hr class="my-4">

                    <h4>Two-Factor Authentication</h4>
                    <p class="text-muted">Add an extra layer of security to your account.</p>
                    @if($user->two_factor_enabled)
                        <x-tabler::button color="danger">Disable 2FA</x-tabler::button>
                    @else
                        <x-tabler::button color="primary">Enable 2FA</x-tabler::button>
                    @endif
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="billing">
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <h3 class="card-title">Billing Information</h3>
                </x-tabler::cards.header>
                <x-tabler::cards.body>
                    <div class="mb-4">
                        <h5>Current Plan: <span class="badge bg-primary">Pro</span></h5>
                        <p class="text-muted">$29/month - Renews on {{ $renewalDate->format('F j, Y') }}</p>
                    </div>

                    <h5>Payment Method</h5>
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-grow-1">
                            <div>Visa ending in 4242</div>
                            <small class="text-muted">Expires 12/2025</small>
                        </div>
                        <x-tabler::button size="sm" variant="outline">Update</x-tabler::button>
                    </div>

                    <x-tabler::button color="danger" variant="outline">Cancel Subscription</x-tabler::button>
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="team">
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <h3 class="card-title">Team Members</h3>
                    <x-tabler::button size="sm" color="primary" class="ms-auto">
                        Invite Member
                    </x-tabler::button>
                </x-tabler::cards.header>
                <x-tabler::cards.body>
                    @foreach($teamMembers as $member)
                        <div class="d-flex align-items-center mb-3">
                            <div class="avatar avatar-sm me-3">
                                {{ substr($member->name, 0, 1) }}
                            </div>
                            <div class="flex-grow-1">
                                <div>{{ $member->name }}</div>
                                <small class="text-muted">{{ $member->email }}</small>
                            </div>
                            <span class="badge bg-secondary me-2">{{ $member->role }}</span>
                            <x-tabler::button size="sm" variant="ghost" icon="dots-vertical" />
                        </div>
                    @endforeach
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="api">
            <x-tabler::cards.card>
                <x-tabler::cards.header>
                    <h3 class="card-title">API Keys</h3>
                    <x-tabler::button size="sm" color="primary" class="ms-auto">
                        Generate New Key
                    </x-tabler::button>
                </x-tabler::cards.header>
                <x-tabler::cards.body>
                    @forelse($apiKeys as $key)
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-grow-1">
                                <div class="font-mono">{{ $key->key }}</div>
                                <small class="text-muted">Created {{ $key->created_at->diffForHumans() }}</small>
                            </div>
                            <x-tabler::button size="sm" color="danger" variant="outline">
                                Revoke
                            </x-tabler::button>
                        </div>
                    @empty
                        <p class="text-muted">No API keys created yet.</p>
                    @endforelse
                </x-tabler::cards.body>
            </x-tabler::cards.card>
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

**Use Case:** Comprehensive settings interface organizing general, security, billing, team, and API configurations into separate, focused sections.

---

### Example 3: Dashboard Statistics

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <h3 class="card-title">Analytics</h3>
        <x-tabler::tabs.nav inCard pills class="ms-auto">
            <x-tabler::tabs.nav-item href="#today" active>Today</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#week">This Week</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#month">This Month</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#year">This Year</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="today" active>
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="h3 mb-0">{{ number_format($todayStats->pageviews) }}</div>
                                        <div class="text-muted">Page Views</div>
                                    </div>
                                    <div class="ms-auto">
                                        <x-tabler::icon name="eye" class="text-primary" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="h3 mb-0">{{ number_format($todayStats->users) }}</div>
                                        <div class="text-muted">Unique Users</div>
                                    </div>
                                    <div class="ms-auto">
                                        <x-tabler::icon name="users" class="text-success" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="h3 mb-0">${{ number_format($todayStats->revenue) }}</div>
                                        <div class="text-muted">Revenue</div>
                                    </div>
                                    <div class="ms-auto">
                                        <x-tabler::icon name="currency-dollar" class="text-warning" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <div class="h3 mb-0">{{ number_format($todayStats->conversions) }}</div>
                                        <div class="text-muted">Conversions</div>
                                    </div>
                                    <div class="ms-auto">
                                        <x-tabler::icon name="chart-line" class="text-danger" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="week">
                {{-- Similar stats for week --}}
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="month">
                {{-- Similar stats for month --}}
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="year">
                {{-- Similar stats for year --}}
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Use Case:** Dashboard analytics showing different time periods with stat cards for quick data comparison.

---

### Example 4: Product Details Tabs

```blade
<div class="row">
    <div class="col-md-6">
        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="img-fluid rounded">
    </div>

    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <div class="h2 text-primary">${{ number_format($product->price, 2) }}</div>
        <p class="lead">{{ $product->short_description }}</p>

        <x-tabler::button color="primary" size="lg" class="mb-4">
            Add to Cart
        </x-tabler::button>

        <x-tabler::tabs.tabs>
            <x-tabler::tabs.nav>
                <x-tabler::tabs.nav-item href="#description" active>Description</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#specifications">Specifications</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#reviews">Reviews ({{ $product->reviews_count }})</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#shipping">Shipping</x-tabler::tabs.nav-item>
            </x-tabler::tabs.nav>

            <x-tabler::tabs.content class="mt-3">
                <x-tabler::tabs.pane id="description" active>
                    <h4>Product Description</h4>
                    {!! $product->description !!}

                    <h5 class="mt-4">Features</h5>
                    <ul>
                        @foreach($product->features as $feature)
                            <li>{{ $feature }}</li>
                        @endforeach
                    </ul>
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="specifications">
                    <h4>Technical Specifications</h4>
                    <table class="table">
                        <tbody>
                            @foreach($product->specifications as $key => $value)
                                <tr>
                                    <th style="width: 30%">{{ $key }}</th>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="reviews">
                    <div class="mb-4">
                        <h4>Customer Reviews</h4>
                        <div class="d-flex align-items-center">
                            <div class="h2 mb-0">{{ number_format($product->average_rating, 1) }}</div>
                            <div class="ms-3">
                                <div>⭐⭐⭐⭐⭐</div>
                                <small class="text-muted">Based on {{ $product->reviews_count }} reviews</small>
                            </div>
                        </div>
                    </div>

                    @foreach($product->reviews as $review)
                        <div class="mb-4 pb-4 border-bottom">
                            <div class="d-flex align-items-start">
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $review->user->name }}</div>
                                    <div>⭐ {{ $review->rating }}/5</div>
                                    <p class="mt-2">{{ $review->comment }}</p>
                                </div>
                                <small class="text-muted">{{ $review->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="shipping">
                    <h4>Shipping Information</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Shipping Method</th>
                                <th>Estimated Delivery</th>
                                <th>Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Standard Shipping</td>
                                <td>5-7 business days</td>
                                <td>$5.99</td>
                            </tr>
                            <tr>
                                <td>Express Shipping</td>
                                <td>2-3 business days</td>
                                <td>$12.99</td>
                            </tr>
                            <tr>
                                <td>Next Day Delivery</td>
                                <td>1 business day</td>
                                <td>$24.99</td>
                            </tr>
                        </tbody>
                    </table>
                </x-tabler::tabs.pane>
            </x-tabler::tabs.content>
        </x-tabler::tabs.tabs>
    </div>
</div>
```

**Use Case:** E-commerce product page with detailed information organized into description, specs, reviews, and shipping tabs.

---

### Example 5: Documentation Browser

```blade
<div class="row">
    <div class="col-md-3">
        <x-tabler::cards.card>
            <x-tabler::cards.body>
                <h5>Documentation</h5>
                <div class="list-group list-group-flush">
                    <a href="#getting-started" class="list-group-item list-group-item-action">Getting Started</a>
                    <a href="#installation" class="list-group-item list-group-item-action">Installation</a>
                    <a href="#configuration" class="list-group-item list-group-item-action">Configuration</a>
                    <a href="#api" class="list-group-item list-group-item-action">API Reference</a>
                </div>
            </x-tabler::cards.body>
        </x-tabler::cards.card>
    </div>

    <div class="col-md-9">
        <x-tabler::tabs.tabs>
            <x-tabler::tabs.nav pills>
                <x-tabler::tabs.nav-item href="#guide" active>Guide</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#examples">Examples</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#api-ref">API</x-tabler::tabs.nav-item>
                <x-tabler::tabs.nav-item href="#changelog">Changelog</x-tabler::tabs.nav-item>
            </x-tabler::tabs.nav>

            <x-tabler::tabs.content class="mt-4">
                <x-tabler::tabs.pane id="guide" active>
                    <x-tabler::cards.card>
                        <x-tabler::cards.body>
                            <h3>Getting Started Guide</h3>
                            <p>Welcome to our comprehensive getting started guide...</p>
                            {!! $guideContent !!}
                        </x-tabler::cards.body>
                    </x-tabler::cards.card>
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="examples">
                    <x-tabler::cards.card>
                        <x-tabler::cards.body>
                            <h3>Code Examples</h3>
                            @foreach($examples as $example)
                                <h5>{{ $example->title }}</h5>
                                <pre><code>{{ $example->code }}</code></pre>
                            @endforeach
                        </x-tabler::cards.body>
                    </x-tabler::cards.card>
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="api-ref">
                    <x-tabler::cards.card>
                        <x-tabler::cards.body>
                            <h3>API Reference</h3>
                            {!! $apiReference !!}
                        </x-tabler::cards.body>
                    </x-tabler::cards.card>
                </x-tabler::tabs.pane>

                <x-tabler::tabs.pane id="changelog">
                    <x-tabler::cards.card>
                        <x-tabler::cards.body>
                            <h3>Changelog</h3>
                            {!! $changelog !!}
                        </x-tabler::cards.body>
                    </x-tabler::cards.card>
                </x-tabler::tabs.pane>
            </x-tabler::tabs.content>
        </x-tabler::tabs.tabs>
    </div>
</div>
```

**Use Case:** Documentation interface with sidebar navigation and tabbed content for guides, examples, API reference, and changelog.

---

### Example 6: Admin Panel with Livewire

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <h3 class="card-title">Admin Dashboard</h3>
        <x-tabler::tabs.nav inCard class="ms-auto">
            <x-tabler::tabs.nav-item href="#users" icon="users" active>Users</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#orders" icon="shopping-cart">Orders</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#products" icon="package">Products</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#settings" icon="settings">Settings</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="users" active>
                @livewire('admin.user-management')
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="orders">
                @livewire('admin.order-management')
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="products">
                @livewire('admin.product-management')
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="settings">
                @livewire('admin.system-settings')
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**Use Case:** Admin panel using Livewire components within tabs for real-time data management without page reloads.

---

## Composition Patterns {#composition-patterns}

Common patterns for structuring tabs in your applications.

### Basic Pattern (Standalone Tabs)

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav>
        {{-- Nav items --}}
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        {{-- Panes --}}
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

**When to use:** Simple tabbed content on a page, not inside a card.

---

### Card Pattern (Tabs in Card)

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            {{-- Nav items --}}
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            {{-- Panes --}}
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**When to use:** Professional layouts, dashboards, when you need a contained appearance.

---

### Card with Title Pattern

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <h3 class="card-title">{{ $title }}</h3>
        <x-tabler::tabs.nav inCard class="ms-auto">
            {{-- Nav items --}}
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            {{-- Panes --}}
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

**When to use:** When you need both a card title and tabs, with tabs aligned to the right.

---

### Nested Tabs Pattern

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#parent1" active>Parent 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#parent2">Parent 2</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="parent1" active>
            <x-tabler::tabs.tabs>
                <x-tabler::tabs.nav pills>
                    <x-tabler::tabs.nav-item href="#child1a" active>Child 1A</x-tabler::tabs.nav-item>
                    <x-tabler::tabs.nav-item href="#child1b">Child 1B</x-tabler::tabs.nav-item>
                </x-tabler::tabs.nav>

                <x-tabler::tabs.content>
                    <x-tabler::tabs.pane id="child1a" active>
                        Nested content 1A
                    </x-tabler::tabs.pane>
                    <x-tabler::tabs.pane id="child1b">
                        Nested content 1B
                    </x-tabler::tabs.pane>
                </x-tabler::tabs.content>
            </x-tabler::tabs.tabs>
        </x-tabler::tabs.pane>

        <x-tabler::tabs.pane id="parent2">
            Parent 2 content
        </x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

**When to use:** Complex hierarchical content, but use sparingly as it can be overwhelming.

---

## Laravel Integration {#laravel-integration}

Deep integration with Laravel features for dynamic tabs.

### Dynamic Tabs from Collection

```blade
@php
    $sections = collect([
        ['id' => 'overview', 'label' => 'Overview', 'icon' => 'eye'],
        ['id' => 'users', 'label' => 'Users', 'icon' => 'users'],
        ['id' => 'settings', 'label' => 'Settings', 'icon' => 'settings'],
    ]);
@endphp

<x-tabler::tabs.nav>
    @foreach ($sections as $index => $section)
        <x-tabler::tabs.nav-item
            href="#{{ $section['id'] }}"
            :active="$index === 0"
            :icon="$section['icon']">
            {{ $section['label'] }}
        </x-tabler::tabs.nav-item>
    @endforeach
</x-tabler::tabs.nav>
```

---

### Conditional Tabs Based on Permissions

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#account">Account</x-tabler::tabs.nav-item>

    @can('view-analytics')
        <x-tabler::tabs.nav-item href="#analytics" icon="chart-bar">Analytics</x-tabler::tabs.nav-item>
    @endcan

    @can('manage-users')
        <x-tabler::tabs.nav-item href="#users" icon="users">Users</x-tabler::tabs.nav-item>
    @endcan

    @if(auth()->user()->isAdmin())
        <x-tabler::tabs.nav-item href="#admin" icon="shield">Admin</x-tabler::tabs.nav-item>
    @endif
</x-tabler::tabs.nav>
```

---

### Tabs with Route-Based Active State

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item
        href="#profile"
        :active="request()->routeIs('profile.show')">
        Profile
    </x-tabler::tabs.nav-item>

    <x-tabler::tabs.nav-item
        href="#settings"
        :active="request()->routeIs('settings.*')">
        Settings
    </x-tabler::tabs.nav-item>

    <x-tabler::tabs.nav-item
        href="#billing"
        :active="request()->routeIs('billing.*')">
        Billing
    </x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Tabs with Old Input Preservation

```blade
<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="general" :active="old('tab', 'general') === 'general'">
        <form>
            <input type="hidden" name="tab" value="general">
            {{-- Form fields --}}
        </form>
    </x-tabler::tabs.pane>

    <x-tabler::tabs.pane id="security" :active="old('tab') === 'security'">
        <form>
            <input type="hidden" name="tab" value="security">
            {{-- Form fields --}}
        </form>
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

---

### Tabs with Validation Errors

```blade
@php
    $activeTab = 'general';
    if ($errors->has('password') || $errors->has('password_confirmation')) {
        $activeTab = 'security';
    } elseif ($errors->has('card_number') || $errors->has('billing_address')) {
        $activeTab = 'billing';
    }
@endphp

<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#general" :active="$activeTab === 'general'">
        General
    </x-tabler::tabs.nav-item>

    <x-tabler::tabs.nav-item href="#security" :active="$activeTab === 'security'">
        Security
        @if($errors->has('password') || $errors->has('password_confirmation'))
            <span class="badge bg-danger ms-1">!</span>
        @endif
    </x-tabler::tabs.nav-item>

    <x-tabler::tabs.nav-item href="#billing" :active="$activeTab === 'billing'">
        Billing
        @if($errors->has('card_number') || $errors->has('billing_address'))
            <span class="badge bg-danger ms-1">!</span>
        @endif
    </x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>

<x-tabler::tabs.content>
    <x-tabler::tabs.pane id="general" :active="$activeTab === 'general'">
        {{-- General form --}}
    </x-tabler::tabs.pane>

    <x-tabler::tabs.pane id="security" :active="$activeTab === 'security'">
        {{-- Security form --}}
    </x-tabler::tabs.pane>

    <x-tabler::tabs.pane id="billing" :active="$activeTab === 'billing'">
        {{-- Billing form --}}
    </x-tabler::tabs.pane>
</x-tabler::tabs.content>
```

---

## JavaScript Events {#javascript-events}

Bootstrap 5 provides JavaScript events for tab interactions.

### Available Events

```javascript
const tabElement = document.querySelector('a[data-bs-toggle="tab"]');

// Before showing new tab
tabElement.addEventListener('show.bs.tab', (event) => {
    console.log('About to show:', event.target); // New tab
    console.log('Previous tab:', event.relatedTarget); // Previous active tab
});

// After showing new tab
tabElement.addEventListener('shown.bs.tab', (event) => {
    console.log('Now showing:', event.target);
    console.log('Previous tab:', event.relatedTarget);
});

// Before hiding current tab
tabElement.addEventListener('hide.bs.tab', (event) => {
    console.log('About to hide:', event.target); // Current tab
    console.log('Next tab:', event.relatedTarget); // Tab that will be active
});

// After hiding current tab
tabElement.addEventListener('hidden.bs.tab', (event) => {
    console.log('Now hidden:', event.target);
    console.log('Next tab:', event.relatedTarget);
});
```

---

### Prevent Tab Switch

```javascript
document.querySelectorAll('a[data-bs-toggle="tab"]').forEach(tab => {
    tab.addEventListener('show.bs.tab', (event) => {
        // Check if unsaved changes
        if (hasUnsavedChanges) {
            if (!confirm('You have unsaved changes. Do you want to leave?')) {
                event.preventDefault(); // Prevent tab switch
            }
        }
    });
});
```

---

### Load Content on Tab Show

```javascript
document.querySelector('a[href="#analytics"]').addEventListener('shown.bs.tab', () => {
    // Load analytics data when tab is shown
    fetch('/api/analytics')
        .then(response => response.json())
        .then(data => {
            // Update tab content with data
            updateAnalytics(data);
        });
});
```

---

### Save Active Tab to LocalStorage

```javascript
// Save active tab
document.querySelectorAll('a[data-bs-toggle="tab"]').forEach(tab => {
    tab.addEventListener('shown.bs.tab', (event) => {
        localStorage.setItem('activeTab', event.target.getAttribute('href'));
    });
});

// Restore active tab on page load
document.addEventListener('DOMContentLoaded', () => {
    const activeTab = localStorage.getItem('activeTab');
    if (activeTab) {
        const tab = document.querySelector(`a[href="${activeTab}"]`);
        if (tab) {
            new bootstrap.Tab(tab).show();
        }
    }
});
```

---

## Accessibility {#accessibility}

The tabs system is built with accessibility as a priority.

### Keyboard Navigation

**Tab List Navigation:**
- **Tab** - Move focus into/out of tab list
- **Arrow Left** - Navigate to previous tab
- **Arrow Right** - Navigate to next tab
- **Home** - Jump to first tab
- **End** - Jump to last tab
- **Space/Enter** - Activate focused tab

**Content Navigation:**
- **Tab** - Move focus through interactive elements in active pane
- Content switches automatically when tab is activated

---

### ARIA Attributes

The components automatically apply proper ARIA attributes:

**Tab Nav (`role="tablist"`):**
- Identifies the container as a tab list

**Nav Item (`role="tab"`):**
- `aria-selected="true"` - Applied to active tab
- `aria-selected="false"` - Applied to inactive tabs
- `aria-controls="pane-id"` - Links tab to its pane
- `aria-disabled="true"` - Applied to disabled tabs

**Pane (`role="tabpanel"`):**
- `aria-labelledby="tab-id"` - Links pane to its tab
- `tabindex="0"` - Makes pane focusable

---

### Screen Reader Support

**Announcements:**
- Tab count announced when entering tab list
- Active tab announced with "selected" state
- Tab content changes announced when switching
- Disabled tabs announced as "disabled"

**Best practices:**
- Always provide text labels (not just icons)
- Use `aria-label` for icon-only tabs
- Keep tab labels concise and descriptive
- Don't nest interactive elements in tabs

---

### Color Contrast

All tab states meet WCAG 2.1 AA standards:
- Normal text: 4.5:1 contrast ratio minimum
- Active tabs: Clear visual distinction
- Disabled tabs: Visually distinct but still readable
- Focus indicators: High contrast in all themes

---

### Focus Indicators

- Visible focus outline on keyboard navigation
- Works in both light and dark modes
- Never removed without providing alternative
- Consistent with overall application focus style

---

## Best Practices {#best-practices}

Guidelines for effective tab design and implementation.

### Do's ✅

**Keep tab count manageable:**
```blade
{{-- Good: 2-7 tabs --}}
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#details">Details</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#reviews">Reviews</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#related">Related</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Use descriptive labels:**
```blade
{{-- Good: Clear, descriptive labels --}}
<x-tabler::tabs.nav-item href="#profile">Profile Information</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#security">Security Settings</x-tabler::tabs.nav-item>

{{-- Bad: Vague labels --}}
<x-tabler::tabs.nav-item href="#tab1">Tab 1</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#info">Info</x-tabler::tabs.nav-item>
```

**Match IDs correctly:**
```blade
{{-- Good: href matches pane id --}}
<x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
<x-tabler::tabs.pane id="profile" active>Content</x-tabler::tabs.pane>

{{-- Bad: IDs don't match --}}
<x-tabler::tabs.nav-item href="#profile" active>Profile</x-tabler::tabs.nav-item>
<x-tabler::tabs.pane id="user-profile" active>Content</x-tabler::tabs.pane>
```

**Group related content:**
```blade
{{-- Good: Logical grouping --}}
<x-tabler::tabs.nav-item href="#personal">Personal Info</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#contact">Contact Details</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#preferences">Preferences</x-tabler::tabs.nav-item>
```

**Use icons for visual context:**
```blade
{{-- Good: Icons enhance understanding --}}
<x-tabler::tabs.nav-item href="#home" icon="home" active>Home</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#user" icon="user">Profile</x-tabler::tabs.nav-item>
<x-tabler::tabs.nav-item href="#settings" icon="settings">Settings</x-tabler::tabs.nav-item>
```

---

### Don'ts ❌

**Don't use too many tabs:**
```blade
{{-- Bad: Too many tabs (10+) --}}
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#tab1">Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    {{-- ... 8 more tabs ... --}}
</x-tabler::tabs.nav>
{{-- Consider alternative navigation pattern --}}
```

**Don't forget to mark one tab as active:**
```blade
{{-- Bad: No active tab --}}
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home">Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>

{{-- Good: One tab marked active --}}
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Don't use icon-only tabs without aria-label:**
```blade
{{-- Bad: Icon-only without aria-label --}}
<x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly />

{{-- Good: Icon-only with aria-label --}}
<x-tabler::tabs.nav-item
    href="#settings"
    icon="settings"
    iconOnly
    aria-label="Account settings" />
```

**Don't nest too many levels of tabs:**
```blade
{{-- Bad: Three levels of nested tabs --}}
{{-- This is confusing and hard to navigate --}}
{{-- Consider alternative UI patterns --}}
```

**Don't put critical navigation in disabled tabs:**
```blade
{{-- Bad: Important content behind disabled tab --}}
<x-tabler::tabs.nav-item href="#payment" disabled>Payment Info</x-tabler::tabs.nav-item>
{{-- Users can't access payment info! --}}

{{-- Good: Show why it's unavailable --}}
<x-tabler::tabs.nav-item href="#payment">
    Payment Info
    @if(!auth()->user()->hasPaymentMethod())
        <span class="badge bg-warning ms-1">Setup Required</span>
    @endif
</x-tabler::tabs.nav-item>
```

---

### Performance Tips

**Lazy load tab content:**
```blade
<x-tabler::tabs.pane id="reports">
    @if($activeTab === 'reports')
        {{-- Only render when tab is active --}}
        @foreach($reports as $report)
            <div>{{ $report->name }}</div>
        @endforeach
    @else
        <div>Loading...</div>
    @endif
</x-tabler::tabs.pane>
```

**Use Livewire wire:ignore for tabs:**
```blade
<x-tabler::tabs.nav wire:ignore>
    {{-- Prevent Livewire from rerendering tabs --}}
</x-tabler::tabs.nav>
```

**Cache expensive queries:**
```php
// Controller
$stats = Cache::remember('dashboard-stats', 3600, function () {
    return [
        'users' => User::count(),
        'revenue' => Order::sum('total'),
        // ... other stats
    ];
});
```

---

## Browser Compatibility

### Requirements

- **Bootstrap 5.x** (CSS + **JavaScript**)
- Modern CSS support (Flexbox)
- JavaScript enabled for tab switching

### Supported Browsers

- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

### Known Issues

- **Safari < 14**: Some flexbox issues with justified tabs
- **Firefox**: Slight visual differences in focus indicators
- **Mobile browsers**: Touch targets meet accessibility guidelines (44x44px minimum)

### Graceful Degradation

Without JavaScript:
- Tabs display as styled list of links
- All content remains accessible via anchor links
- Visual styling maintained
- Consider providing server-side tab handling for no-JS scenarios

---

## Troubleshooting

### Common Issues

**Issue: Tab content not switching**

Symptoms: Clicking tabs doesn't change content

Solutions:
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `href` matches pane `id` exactly (with `#` in href)
- ✅ Check `data-bs-toggle="tab"` is present on links
- ✅ Confirm Bootstrap version is 5.x (not 4.x or 3.x)
- ✅ Check browser console for JavaScript errors
- ✅ Verify no JavaScript conflicts with other libraries

```blade
{{-- Correct --}}
<x-tabler::tabs.nav-item href="#profile">Profile</x-tabler::tabs.nav-item>
<x-tabler::tabs.pane id="profile">Content</x-tabler::tabs.pane>

{{-- Incorrect: Missing # in href --}}
<x-tabler::tabs.nav-item href="profile">Profile</x-tabler::tabs.nav-item>
```

---

**Issue: Active tab not showing initially**

Symptoms: No tab appears selected on page load

Solutions:
- ✅ Set `active` prop on both nav-item and pane
- ✅ Only one tab should be active initially
- ✅ Verify CSS classes are applied correctly
- ✅ Check for JavaScript errors on page load

```blade
{{-- Correct --}}
<x-tabler::tabs.nav-item href="#home" active>Home</x-tabler::tabs.nav-item>
<x-tabler::tabs.pane id="home" active>Content</x-tabler::tabs.pane>
```

---

**Issue: Tabs not displaying correctly**

Symptoms: Tabs appear as plain list or misaligned

Solutions:
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check for CSS conflicts with custom styles
- ✅ Verify nav structure is correct
- ✅ Clear browser cache
- ✅ Check browser developer tools for missing CSS files

---

**Issue: Icons not displaying**

Symptoms: Icon names show as text or nothing appears

Solutions:
- ✅ Install package: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Verify icon exists at https://tabler.io/icons
- ✅ Clear view cache: `php artisan view:clear`
- ✅ Check icon package is properly registered

---

**Issue: Keyboard navigation not working**

Symptoms: Arrow keys don't switch tabs

Solutions:
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Check ARIA attributes are present
- ✅ Verify `role="tablist"` is on nav element
- ✅ Test in different browsers
- ✅ Check for JavaScript event handler conflicts

---

**Issue: Tabs not working with Livewire**

Symptoms: Tabs reset when Livewire updates

Solutions:
- ✅ Add `wire:ignore` to tab navigation
- ✅ Use JavaScript to persist active tab
- ✅ Store active tab in component property
- ✅ Emit Livewire events to coordinate tab changes

```blade
<x-tabler::tabs.nav wire:ignore>
    {{-- Tabs won't be affected by Livewire updates --}}
</x-tabler::tabs.nav>
```

---

**Issue: Content flashing during tab switch**

Symptoms: Brief flash of content before transition

Solutions:
- ✅ Ensure fade classes are applied
- ✅ Check CSS transition properties
- ✅ Add `style="display: none"` to inactive panes if needed
- ✅ Verify Bootstrap JavaScript initializes properly

---

**Issue: Tabs overflow on mobile**

Symptoms: Tabs wrap or overflow container on small screens

Solutions:
- ✅ Use responsive classes: `flex-column flex-sm-row`
- ✅ Reduce number of tabs for mobile view
- ✅ Consider pills style instead of tabs
- ✅ Use icon-only tabs to save space
- ✅ Implement horizontal scrolling for many tabs

```blade
<x-tabler::tabs.nav class="flex-column flex-md-row">
    {{-- Stacks on mobile, horizontal on medium+ --}}
</x-tabler::tabs.nav>
```

---

## Related Components

- [Card](./cards.md) - Container component for card-based layouts
- [Button](./button.md) - Action buttons within tab content
- [Form Components](./forms.md) - Input fields for forms in tabs
- [Badge](./badge.md) - Notification counters on tabs
- [Icon](./icon.md) - Icons for tab decoration

---

## Bootstrap 5 Documentation

For additional details on Bootstrap 5 tabs:
- [Bootstrap Tabs Documentation](https://getbootstrap.com/docs/5.3/components/navs-tabs/)
- [Bootstrap Tab JavaScript](https://getbootstrap.com/docs/5.3/components/navs-tabs/#javascript-behavior)

---

## Source

**Component Files:**
- `tabler-blade/stubs/resources/views/tabler/tabs/tabs.blade.php`
- `tabler-blade/stubs/resources/views/tabler/tabs/nav.blade.php`
- `tabler-blade/stubs/resources/views/tabler/tabs/nav-item.blade.php`
- `tabler-blade/stubs/resources/views/tabler/tabs/content.blade.php`
- `tabler-blade/stubs/resources/views/tabler/tabs/pane.blade.php`

---

## Changelog

- **v1.0.0** (2025-01-13) - Initial consolidated documentation with complete tabs system
