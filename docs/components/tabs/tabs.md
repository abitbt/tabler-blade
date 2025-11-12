# Tabs

> Tabbed navigation system for organizing content into switchable panes with Bootstrap 5 integration.

## Overview

The Tabs component family provides a complete tabbed navigation system for organizing and switching between different content sections. Tabs support multiple styles (tabs, pills), icon support, disabled states, card integration, and full keyboard accessibility. The component uses Bootstrap 5 tab functionality for seamless content switching.

**Key Features:**
- Complete tabs component family (5 sub-components)
- Tab and pill navigation styles
- Icon support (leading, icon-only)
- Disabled tab states
- Card header integration
- Full-width and justified layouts
- Active state management
- Keyboard accessible (arrow keys)
- Bootstrap 5 events (show, shown, hide, hidden)
- Full ARIA support

**Component Family:**
- `<x-tabler::tabs.tabs>` - Main tabs container
- `<x-tabler::tabs.nav>` - Navigation container
- `<x-tabler::tabs.nav-item>` - Individual tab link
- `<x-tabler::tabs.content>` - Content container
- `<x-tabler::tabs.pane>` - Individual content pane

**Use Case:** Use tabs for organizing related content sections, settings panels, data views, forms with multiple steps, and any interface where users need to switch between different content views without page navigation.

---

## Basic Usage

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

---

## Component Structure

### Main Component: `<x-tabler::tabs.tabs>`

The main tabs container.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string\|null` | `null` | Optional container ID |
| `class` | `string` | `''` | Additional CSS classes |

---

### Navigation: `<x-tabler::tabs.nav>`

Navigation container for tab links.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `inCard` | `bool` | `false` | Whether tabs are inside card header (adds `card-header-tabs`) |
| `pills` | `bool` | `false` | Use pills style instead of tabs |
| `fill` | `bool` | `false` | Make tabs fill full width proportionally |
| `justified` | `bool` | `false` | Make tabs equal width |
| `class` | `string` | `''` | Additional CSS classes |

---

### Nav Item: `<x-tabler::tabs.nav-item>`

Individual tab link.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `href` | `string` | `'#'` | Target tab pane ID (e.g., `#home`) |
| `active` | `bool` | `false` | Whether this tab is currently active |
| `disabled` | `bool` | `false` | Disable the tab link |
| `icon` | `string\|null` | `null` | Tabler icon name (without `tabler-` prefix) |
| `iconOnly` | `bool` | `false` | Show only icon without text |
| `class` | `string` | `''` | Additional CSS classes |

---

### Content: `<x-tabler::tabs.content>`

Container for tab panes.

---

### Pane: `<x-tabler::tabs.pane>`

Individual content pane.

#### Props / Attributes

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `id` | `string` | **required** | Pane ID (must match nav-item `href` without `#`) |
| `active` | `bool` | `false` | Whether this pane is currently active |
| `class` | `string` | `''` | Additional CSS classes |

---

## CSS Classes

Additional CSS classes that can be used:

**Nav Styles:**
- `nav-tabs` - Tab style (default)
- `nav-pills` - Pill style (also via `pills` prop)
- `nav-fill` - Fill full width (also via `fill` prop)
- `nav-justified` - Equal width tabs (also via `justified` prop)

**Card Integration:**
- `card-header-tabs` - Tabs in card header (auto-applied with `inCard`)
- `card-header-pills` - Pills in card header (auto-applied with `inCard` and `pills`)

**Positioning:**
- `ms-auto` - Push tab item to right
- `me-auto` - Push tab item to left

---

## Examples

### Basic Tabs

```blade
<x-tabler::tabs.tabs>
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item href="#tab3">Tab 3</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

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
</x-tabler::tabs.tabs>
```

---

### Tabs with Icons

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
    <x-tabler::tabs.nav-item href="#home" icon="home" iconOnly active />
    <x-tabler::tabs.nav-item href="#user" icon="user" iconOnly />
    <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly />
</x-tabler::tabs.nav>
```

---

### Pills Style

```blade
<x-tabler::tabs.nav pills>
    <x-tabler::tabs.nav-item href="#pills1" active>Overview</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#pills2">Details</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#pills3">History</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Full-Width Tabs

```blade
<x-tabler::tabs.nav fill>
    <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2">Tab 2</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab3">Tab 3</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Justified Tabs

```blade
<x-tabler::tabs.nav justified>
    <x-tabler::tabs.nav-item href="#equal1" active>Equal Width 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#equal2">Equal Width 2</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#equal3">Equal Width 3</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Disabled Tab

```blade
<x-tabler::tabs.nav>
    <x-tabler::tabs.nav-item href="#active" active>Active</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#disabled" disabled>Disabled</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#enabled">Enabled</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

---

### Tabs in Card

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#overview" active>Overview</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#details">Details</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
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
            <x-tabler::tabs.pane id="settings">
                Settings content
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Complete Example

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#profile" icon="user" active>Profile</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#activity" icon="activity">Activity</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#notifications" icon="bell">Notifications</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#settings" icon="settings" iconOnly class="ms-auto" />
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="profile" active>
                <h4>Profile Information</h4>
                <p>View and edit your profile details.</p>
                <x-tabler::forms.input name="name" label="Name" value="{{ $user->name }}" />
                <x-tabler::forms.input name="email" label="Email" value="{{ $user->email }}" />
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="activity">
                <h4>Recent Activity</h4>
                @foreach($activities as $activity)
                    <div class="mb-3">
                        <div class="fw-bold">{{ $activity->title }}</div>
                        <small class="text-muted">{{ $activity->created_at->diffForHumans() }}</small>
                    </div>
                @endforeach
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="notifications">
                <h4>Notifications</h4>
                <p>Manage your notification preferences.</p>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="settings">
                <h4>Account Settings</h4>
                <p>Configure your account settings.</p>
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

## Accessibility

### Keyboard Navigation
- **Tab:** Moves focus to active tab
- **Arrow Left/Right:** Navigate between tabs
- **Space/Enter:** Activate focused tab
- **Home:** Jump to first tab
- **End:** Jump to last tab

### ARIA Attributes
- `role="tablist"`: Applied to nav element
- `role="presentation"`: Applied to nav-item wrapper
- `role="tab"`: Applied to tab links
- `role="tabpanel"`: Applied to content panes
- `aria-selected`: Indicates active tab
- `aria-controls`: Links tab to its pane
- `aria-labelledby`: Links pane to its tab

### Screen Reader Support
- Tab count announced
- Active tab announced
- Content changes announced
- Disabled tabs properly indicated

### Best Practices
- Provide `aria-label` for icon-only tabs
- Ensure tab labels are descriptive
- Don't nest interactive elements in tabs
- Maintain logical tab order

**Example:**
```blade
<x-tabler::tabs.nav-item
    href="#settings"
    icon="settings"
    iconOnly
    aria-label="Account settings" />
```

---

## Browser Compatibility

### Requirements
- Bootstrap 5.x (CSS + **JavaScript**)
- Modern CSS support (Flexbox)

### Supported Browsers
- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- IE 11 ❌ (not supported)

---

## Events & Interactivity

### Bootstrap Events

```javascript
const tabElement = document.querySelector('a[data-bs-toggle="tab"]');

// Before showing
tabElement.addEventListener('show.bs.tab', (event) => {
    console.log('About to show:', event.target);
    console.log('Previous tab:', event.relatedTarget);
});

// After showing
tabElement.addEventListener('shown.bs.tab', (event) => {
    console.log('Now showing:', event.target);
});

// Before hiding
tabElement.addEventListener('hide.bs.tab', (event) => {
    console.log('About to hide:', event.target);
});

// After hiding
tabElement.addEventListener('hidden.bs.tab', (event) => {
    console.log('Now hidden:', event.target);
});
```

---

### Framework Integration

**Livewire:**
```blade
<x-tabler::tabs.nav wire:ignore>
    <x-tabler::tabs.nav-item href="#tab1" active>Tab 1</x-tabler::tabs.nav-item>
    <x-tabler::tabs.nav-item href="#tab2" wire:click="loadTab2">Tab 2</x-tabler::tabs.nav-item>
</x-tabler::tabs.nav>
```

**Alpine.js:**
```blade
<div x-data="{ activeTab: 'home' }">
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item
            href="#home"
            @click="activeTab = 'home'"
            :class="{ 'active': activeTab === 'home' }">
            Home
        </x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>
</div>
```

---

## Troubleshooting

### Common Issues

**Issue: Tab content not switching**
- ✅ Ensure Bootstrap JavaScript is loaded
- ✅ Verify `href` matches pane `id` (with `#`)
- ✅ Check `data-bs-toggle="tab"` is present
- ✅ Confirm Bootstrap version is 5.x

**Issue: Active tab not showing**
- ✅ Set `active` prop on both nav-item and pane
- ✅ Only one tab should be active initially
- ✅ Verify CSS classes are applied

**Issue: Tabs not displaying correctly**
- ✅ Ensure Bootstrap CSS is loaded
- ✅ Check for conflicting CSS
- ✅ Verify nav structure is correct

**Issue: Icons not displaying**
- ✅ Install: `composer require secondnetwork/blade-tabler-icons`
- ✅ Use icon name without `tabler-` prefix
- ✅ Clear view cache: `php artisan view:clear`

---

## Real-World Examples

### Example 1: User Settings

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-tabler::tabs.nav inCard>
            <x-tabler::tabs.nav-item href="#general" icon="user" active>General</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#security" icon="lock">Security</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#notifications" icon="bell">Notifications</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="general" active>
                <form>
                    <x-tabler::forms.input name="name" label="Display Name" />
                    <x-tabler::forms.input name="email" label="Email" type="email" />
                    <x-tabler::button type="submit" color="primary">Save Changes</x-tabler::button>
                </form>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="security">
                <form>
                    <x-tabler::forms.input name="current_password" label="Current Password" type="password" />
                    <x-tabler::forms.input name="new_password" label="New Password" type="password" />
                    <x-tabler::button type="submit" color="primary">Update Password</x-tabler::button>
                </form>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="notifications">
                <div class="mb-3">
                    <x-tabler::forms.switch name="email_notifications" label="Email Notifications" />
                </div>
                <div class="mb-3">
                    <x-tabler::forms.switch name="push_notifications" label="Push Notifications" />
                </div>
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

### Example 2: Dashboard Statistics

```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Analytics</x-slot>
        <x-tabler::tabs.nav inCard pills>
            <x-tabler::tabs.nav-item href="#today" active>Today</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#week">This Week</x-tabler::tabs.nav-item>
            <x-tabler::tabs.nav-item href="#month">This Month</x-tabler::tabs.nav-item>
        </x-tabler::tabs.nav>
    </x-tabler::cards.header>

    <x-tabler::cards.body>
        <x-tabler::tabs.content>
            <x-tabler::tabs.pane id="today" active>
                <div class="row">
                    <div class="col-md-3">
                        <div class="h3">{{ $todayStats->users }}</div>
                        <div class="text-muted">Users</div>
                    </div>
                    <div class="col-md-3">
                        <div class="h3">${{ number_format($todayStats->revenue) }}</div>
                        <div class="text-muted">Revenue</div>
                    </div>
                </div>
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="week">
                <!-- Week stats -->
            </x-tabler::tabs.pane>

            <x-tabler::tabs.pane id="month">
                <!-- Month stats -->
            </x-tabler::tabs.pane>
        </x-tabler::tabs.content>
    </x-tabler::cards.body>
</x-tabler::cards.card>
```

---

## Performance Considerations

### Component Weight
- Base tabs: ~300-500 bytes rendered
- With Bootstrap JS: ~15KB (shared)
- Each pane: ~100-200 bytes

### Best Practices
- Limit tabs to 5-7 for usability
- Lazy load tab content when possible
- Cache frequently accessed tabs
- Use pills for simpler interfaces

### Optimization Tips
- Initialize tabs only when visible
- Defer non-active tab content loading
- Use CSS Grid for tab layouts
- Minimize nested components in panes

---

## Notes

- Requires Bootstrap 5 JavaScript
- First tab/pane must have `active` prop
- `href` must match pane `id` with `#` prefix
- Icon-only tabs auto-generate ARIA labels
- Card integration requires `inCard` prop
- Pills and tabs are mutually exclusive styles

---

## Related Components

- [Card](../cards/card.md) - Container for tabs
- [Button](../button.md) - Action buttons in tabs
- [Form Components](../forms/) - Inputs for tab content

---

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/tabs/`

**Sub-components:**
- `tabs.blade.php` - Main container
- `nav.blade.php` - Navigation container
- `nav-item.blade.php` - Individual tab
- `content.blade.php` - Content container
- `pane.blade.php` - Content pane

---

## Changelog

- **v1.0.0** - Initial release with full Bootstrap 5 tabs integration
