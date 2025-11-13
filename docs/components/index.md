# Tabler Blade Components Documentation

Complete documentation for all Blade components in the tabler-blade package.

---

## Quick Start

```bash
# Install package
composer require abitbt/tabler-blade

# Publish assets (optional)
php artisan vendor:publish --tag=tabler-config
php artisan vendor:publish --tag=tabler-views
```

**Basic Usage:**
```blade
<x-tabler::button color="primary">Click Me</x-tabler::button>
<x-tabler::alert type="success">Success!</x-tabler::alert>
<x-tabler::badge color="red">New</x-tabler::badge>
```

---

## Documentation Structure

This documentation is organized using a **hybrid approach** that combines consolidated and individual documentation files:

- **Consolidated docs**: Related components grouped into single comprehensive files
- **Individual docs**: Standalone components that don't belong to a system

This structure provides the best of both worlds: comprehensive system documentation and focused individual component docs.

---

## Component Categories

### 🔘 Buttons & Actions
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| [Button](./button.md) | Versatile button with icons, loading states | Medium | ✅ Documented |
| **[Dropdowns](./dropdowns.md)** | **Complete dropdown menu system** | **Complex** | **✅ Consolidated** |
| ↳ [Dropdown](./dropdowns.md#dropdown) | Dropdown wrapper with positioning | Complex | ✅ |
| ↳ [Toggle](./dropdowns.md#toggle) | Dropdown trigger button | Complex | ✅ |
| ↳ [Menu](./dropdowns.md#menu) | Dropdown menu container | Complex | ✅ |
| ↳ [Item](./dropdowns.md#item) | Menu item | Complex | ✅ |
| ↳ [Header](./dropdowns.md#header) | Menu header | Complex | ✅ |
| ↳ [Divider](./dropdowns.md#divider) | Menu divider | Complex | ✅ |

### 🎨 Display Components
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| [Alert](./alert.md) | Alert messages with icons and actions | Medium | ✅ Documented |
| [Badge](./badge.md) | Count and label badges | Medium | ✅ Documented |
| [Avatar](./avatar.md) | User profile pictures with status indicators | Medium | ✅ Documented |
| [Avatar List](./avatar-list.md) | Stacked avatar groups | Medium | ✅ Documented |
| [Empty](./empty.md) | Empty state placeholders | Simple | ✅ Documented |
| [Image](./image.md) | Responsive images | Simple | ✅ Documented |
| [Placeholder](./placeholder.md) | Loading placeholders | Simple | ✅ Documented |
| [Progress](./progress.md) | Progress bars | Simple | ✅ Documented |
| [Spinner](./spinner.md) | Loading spinners | Simple | ✅ Documented |
| [Status](./status.md) | Status indicator dots | Simple | ✅ Documented |
| [Steps](./steps.md) | Step indicators | Medium | ✅ Documented |
| [Timeline](./timeline.md) | Timeline components | Medium | ✅ Documented |
| [Toast](./toast.md) | Toast notifications | Medium | ✅ Documented |

### 📋 Forms
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| **[Forms](./forms.md)** | **Complete form component system** | **Form** | **✅ Consolidated** |
| ↳ [Input](./forms.md#input) | Text input with validation | Form | ✅ |
| ↳ [Textarea](./forms.md#textarea) | Multi-line text input | Form | ✅ |
| ↳ [Select](./forms.md#select) | Dropdown select | Form | ✅ |
| ↳ [Checkbox](./forms.md#checkbox) | Checkbox input | Form | ✅ |
| ↳ [Radio](./forms.md#radio) | Radio button input | Form | ✅ |
| ↳ [Switch](./forms.md#switch) | Toggle switch | Form | ✅ |
| ↳ [File](./forms.md#file) | File upload input | Form | ✅ |
| ↳ [Range](./forms.md#range) | Range slider input | Form | ✅ |
| ↳ [Color Picker](./forms.md#color-picker) | Color selection input | Form | ✅ |
| ↳ [Color Check](./forms.md#color-check) | Color checkbox selection | Form | ✅ |
| ↳ [Image Check](./forms.md#image-check) | Image checkbox selection | Form | ✅ |
| ↳ [Label](./forms.md#label) | Form label | Simple | ✅ |
| ↳ [Help](./forms.md#help) | Help text | Simple | ✅ |
| ↳ [Hint](./forms.md#hint) | Hint text | Simple | ✅ |
| ↳ [Valid Feedback](./forms.md#valid-feedback) | Success message | Simple | ✅ |
| ↳ [Invalid Feedback](./forms.md#invalid-feedback) | Error message | Simple | ✅ |
| ↳ [Input Group](./forms.md#input-group) | Input with prepend/append | Form | ✅ |
| ↳ [Selectgroup](./forms.md#selectgroup) | Button-style select group | Form | ✅ |
| ↳ [Fieldset](./forms.md#fieldset) | Form fieldset wrapper | Form | ✅ |

### 🃏 Cards
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| **[Cards](./cards.md)** | **Complete card component system** | **Complex** | **✅ Consolidated** |
| ↳ [Card](./cards.md#card) | Main card container | Complex | ✅ |
| ↳ [Header](./cards.md#header) | Card header section | Complex | ✅ |
| ↳ [Body](./cards.md#body) | Card body section | Complex | ✅ |
| ↳ [Footer](./cards.md#footer) | Card footer section | Complex | ✅ |
| ↳ [Actions](./cards.md#actions) | Card action buttons | Complex | ✅ |
| ↳ [Status](./cards.md#status) | Card status indicator | Complex | ✅ |
| ↳ [Progress](./cards.md#progress) | Card progress bar | Complex | ✅ |
| ↳ [Img](./cards.md#img) | Card image | Complex | ✅ |
| ↳ [Stamp](./cards.md#stamp) | Card corner stamp | Complex | ✅ |

### 📑 Tabs & Navigation
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| **[Tabs](./tabs.md)** | **Complete tabs navigation system** | **Complex** | **✅ Consolidated** |
| ↳ [Tabs](./tabs.md#tabs) | Tab container | Complex | ✅ |
| ↳ [Nav](./tabs.md#nav) | Tab navigation | Complex | ✅ |
| ↳ [Nav Item](./tabs.md#nav-item) | Individual tab | Complex | ✅ |
| ↳ [Content](./tabs.md#content) | Tab content container | Complex | ✅ |
| ↳ [Pane](./tabs.md#pane) | Tab content pane | Complex | ✅ |
| [Breadcrumb](./breadcrumb.md) | Breadcrumb navigation | Medium | ✅ Documented |
| [Pagination](./pagination.md) | Pagination links | Medium | ✅ Documented |

### 🎯 Modals & Overlays
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| **[Modals](./modals.md)** | **Complete modal dialog system** | **Complex** | **✅ Consolidated** |
| ↳ [Modal](./modals.md#modal) | Main modal container | Complex | ✅ |
| ↳ [Header](./modals.md#header) | Modal header | Complex | ✅ |
| ↳ [Body](./modals.md#body) | Modal body | Complex | ✅ |
| ↳ [Footer](./modals.md#footer) | Modal footer | Complex | ✅ |
| ↳ [Close](./modals.md#close) | Modal close button | Complex | ✅ |
| ↳ [Status](./modals.md#status) | Modal status indicator | Complex | ✅ |
| [Offcanvas](./offcanvas.md) | Off-canvas sidebar | Complex | ✅ Documented |

### 📐 Layout & Structure
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| [Page Header](./page-header.md) | Page header with title | Medium | ✅ Documented |
| [Divider](./divider.md) | Horizontal divider | Simple | ✅ Documented |
| [Accordion](./accordion.md) | Collapsible accordion | Complex | ✅ Documented |
| [Carousel](./carousel.md) | Image carousel | Complex | ✅ Documented |
| [Ribbon](./ribbon.md) | Decorative ribbon | Simple | ✅ Documented |

### 📋 Lists & Tables
| Component | Description | Complexity | Status |
|-----------|-------------|------------|--------|
| [List Group](./list-group.md) | List group items | Medium | ✅ Documented |
| [Table](./table.md) | Data table | Medium | ✅ Documented |

---

## Component Statistics

- **Total Components:** 59
- **Documented:** 59 ✅
- **Categories:** 8
- **Documentation Files:** 30 files
  - **Consolidated:** 5 files (covering 45 components)
  - **Individual:** 25 files

**Consolidated Component Groups:**
1. **Forms** (19 components) - Complete form input system with Laravel validation
2. **Cards** (9 components) - Card container system with headers, bodies, footers
3. **Modals** (6 components) - Modal dialog system with Bootstrap 5 integration
4. **Tabs** (5 components) - Tab navigation system with content panes
5. **Dropdowns** (6 components) - Dropdown menu system with items and headers

**Individual Components:**
25 standalone components including Button, Alert, Badge, Avatar, Avatar List, Empty, Image, Placeholder, Progress, Spinner, Status, Steps, Timeline, Toast, Breadcrumb, Pagination, Page Header, List Group, Table, Accordion, Carousel, Divider, Offcanvas, and Ribbon.

**Complexity Distribution:**
- Simple: 12 components
- Medium: 17 components
- Complex: 20 components (mostly in consolidated groups)
- Form: 10 components (in Forms consolidated doc)

---

## Documentation Status

✅ **COMPLETE - ALL 59 COMPONENTS DOCUMENTED! 🎉**

### Consolidated Documentation (45 components in 5 files) ✅
- **Forms** - 19 form input components with Laravel validation integration
- **Cards** - 9 card system components for content organization
- **Modals** - 6 modal dialog components with Bootstrap 5 events
- **Tabs** - 5 tab navigation components with ARIA support
- **Dropdowns** - 6 dropdown menu components with Popper.js positioning

### Individual Documentation (24 components) ✅

**Display Components:**
- Button, Alert, Badge, Avatar, Avatar List
- Empty, Image, Placeholder, Progress, Spinner
- Status, Steps, Timeline, Toast

**Navigation:**
- Breadcrumb, Pagination, Page Header

**Layout:**
- Divider, Ribbon, Accordion, Carousel

**Lists & Tables:**
- List Group, Table

**Overlays:**
- Offcanvas

---

## Usage Patterns

### Common Component Combinations

**Form with Validation:**
```blade
<form method="POST">
    @csrf
    <x-tabler::forms.input name="email" label="Email" required />
    <x-tabler::forms.textarea name="message" label="Message" />
    <x-tabler::button type="submit" color="primary">Submit</x-tabler::button>
</form>
```

**Card with Actions:**
```blade
<x-tabler::cards.card>
    <x-tabler::cards.header>
        <x-slot:title>Title</x-slot:title>
    </x-tabler::cards.header>
    <x-tabler::cards.body>
        Content here
    </x-tabler::cards.body>
    <x-tabler::cards.footer>
        <x-tabler::button>Action</x-tabler::button>
    </x-tabler::cards.footer>
</x-tabler::cards.card>
```

**Modal Dialog:**
```blade
<x-tabler::modals.modal id="confirmModal">
    <x-tabler::modals.header title="Confirm Action" />
    <x-tabler::modals.body>
        Are you sure you want to proceed?
    </x-tabler::modals.body>
    <x-tabler::modals.footer>
        <x-tabler::button data-bs-dismiss="modal">Cancel</x-tabler::button>
        <x-tabler::button color="danger">Delete</x-tabler::button>
    </x-tabler::modals.footer>
</x-tabler::modals.modal>
```

**Tabbed Content:**
```blade
<x-tabler::tabs.tabs id="profileTabs">
    <x-tabler::tabs.nav>
        <x-tabler::tabs.nav-item target="profile" active>Profile</x-tabler::tabs.nav-item>
        <x-tabler::tabs.nav-item target="settings">Settings</x-tabler::tabs.nav-item>
    </x-tabler::tabs.nav>

    <x-tabler::tabs.content>
        <x-tabler::tabs.pane id="profile" active>Profile content</x-tabler::tabs.pane>
        <x-tabler::tabs.pane id="settings">Settings content</x-tabler::tabs.pane>
    </x-tabler::tabs.content>
</x-tabler::tabs.tabs>
```

**Dropdown Menu:**
```blade
<x-tabler::dropdowns.dropdown>
    <x-tabler::dropdowns.toggle color="primary">
        Actions
    </x-tabler::dropdowns.toggle>

    <x-tabler::dropdowns.menu>
        <x-tabler::dropdowns.item href="{{ route('edit') }}">
            Edit
        </x-tabler::dropdowns.item>
        <x-tabler::dropdowns.divider />
        <x-tabler::dropdowns.item href="{{ route('delete') }}" class="text-danger">
            Delete
        </x-tabler::dropdowns.item>
    </x-tabler::dropdowns.menu>
</x-tabler::dropdowns.dropdown>
```

---

## Template Selection Guide

When creating new component documentation, use the appropriate template:

| Component Type | Props | JavaScript | Documentation | Template |
|----------------|-------|------------|---------------|----------|
| Simple | 2-5 | No | Individual | [simple-component.md](../templates/simple-component.md) |
| Medium | 6-15 | No | Individual | [medium-component.md](../templates/medium-component.md) |
| Complex | Varies | Yes | Individual | [complex-component.md](../templates/complex-component.md) |
| Form | 10-16 | No | Individual | [form-component.md](../templates/form-component.md) |
| Component Group | Multiple | Varies | Consolidated | [consolidated-group.md](../templates/consolidated-group.md) |

See [Template README](../templates/README.md) for detailed guidance.

---

## Contributing

To add or update component documentation:

1. Choose the appropriate template from `docs/templates/`
2. Read the component source file in `stubs/resources/views/tabler/`
3. Document all props, slots, and usage examples
4. Add accessibility and troubleshooting sections
5. Test all code examples
6. Update this index with the new component

For component groups (like forms, cards, modals), use the consolidated-group.md template to create comprehensive documentation covering all related components.

---

## Resources

- [TablerMenu Documentation](../tabler-menu.md) - Menu builder system
- [Component Templates](../templates/) - Documentation templates
- [Template Guide](../templates/README.md) - How to choose templates
- [Tabler UI Official](https://tabler.io) - Original Tabler framework
- [Tabler Icons](https://tabler.io/icons) - Icon library
- [Laravel Documentation](https://laravel.com/docs) - Laravel framework

---

## Quick Links

### Most Used Components
- [Button](./button.md) - Buttons and actions
- [Alert](./alert.md) - Alert messages
- [Badge](./badge.md) - Labels and counts
- [Forms](./forms.md) - Complete form input system
- [Cards](./cards.md) - Card container system
- [Modals](./modals.md) - Modal dialog system
- [Tabs](./tabs.md) - Tab navigation system
- [Dropdowns](./dropdowns.md) - Dropdown menu system
- [Table](./table.md) - Data tables
- [Pagination](./pagination.md) - Page navigation

### By Category
- [Forms](#-forms) - Complete form component system
- [Cards](#-cards) - Card container system
- [Modals & Overlays](#-modals--overlays) - Dialog and overlay components
- [Tabs & Navigation](#-tabs--navigation) - Navigation components
- [Display Components](#-display-components) - Visual elements
- [Buttons & Actions](#-buttons--actions) - Interactive elements

### By Complexity
- [Simple Components](#-display-components) - Quick reference components
- [Medium Components](#-tabs--navigation) - Standard components
- [Complex Components](#-modals--overlays) - Multi-part systems
- [Consolidated Docs](#consolidated-documentation-45-components-in-5-files-) - Component systems

---

**Last Updated:** 2025-01-13
**Package Version:** 1.0.0
**Laravel Version:** 11+
**Bootstrap Version:** 5.x
**Documentation Status:** ✅ Complete - All 59 components documented (5 consolidated + 24 individual)
**Documentation Structure:** Hybrid (consolidated + individual)
