# Table

A flexible table component for displaying tabular data with Tabler styling. Supports responsive layouts, various styling options, and seamless integration with cards.

## Overview

- Responsive table wrapper with horizontal scrolling on smaller screens
- Card table styling for seamless card integration
- Vertical centering of cell content
- Multiple style variants (striped, hover, bordered, borderless, compact)
- Responsive breakpoint options (sm, md, lg, xl)
- Mobile-first stacking for responsive tables
- Row color variants for status indication
- Sticky header support for long tables
- Column width control utilities
- Selectable rows for interactive tables
- Built-in support for avatars, badges, and status indicators
- No JavaScript required for basic functionality

## Basic Usage

```blade
<x-tabler::table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>Admin</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>User</td>
        </tr>
    </tbody>
</x-tabler::table>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `responsive` | `bool` | `true` | No | Wrap table in responsive container for horizontal scrolling on small screens |
| `card` | `bool` | `false` | No | Add card table styling (for tables inside card components) |
| `vcenter` | `bool` | `false` | No | Vertically center cell content in all rows |
| `class` | `string` | `''` | No | Additional CSS classes for styling (e.g., `'table-striped table-hover'`) |

## Slots

| Slot | Description |
|------|-------------|
| `default` | Table content including `<thead>`, `<tbody>`, and optional `<tfoot>` elements |

## CSS Classes

**Table Styles:**
- `table` - Base table class (automatically applied)
- `table-vcenter` - Vertically center cell content (also via `vcenter` prop)
- `table-nowrap` - Prevent cell content from wrapping
- `table-striped` - Add zebra-striping to table rows
- `table-hover` - Add hover state to table rows
- `table-bordered` - Add borders on all sides of table and cells
- `table-borderless` - Remove all borders
- `table-sm` - Make table more compact with smaller cell padding

**Responsive Tables:**
- `table-responsive` - Horizontal scrolling on all viewports (also via `responsive` prop)
- `table-responsive-sm` - Horizontal scrolling below sm breakpoint (576px)
- `table-responsive-md` - Horizontal scrolling below md breakpoint (768px)
- `table-responsive-lg` - Horizontal scrolling below lg breakpoint (992px)
- `table-responsive-xl` - Horizontal scrolling below xl breakpoint (1200px)

**Card Integration:**
- `card-table` - Style for tables inside cards (also via `card` prop)

**Row Color Variants (apply to `<tr>`):**
- `table-primary` - Primary color background
- `table-secondary` - Secondary color background
- `table-success` - Success color background
- `table-danger` - Danger color background
- `table-warning` - Warning color background
- `table-info` - Info color background
- `table-light` - Light color background
- `table-dark` - Dark color background
- `table-active` - Active state background

**Table Mobile (Responsive):**
- `table-mobile-sm` - Stack table on sm breakpoint and below
- `table-mobile-md` - Stack table on md breakpoint and below
- `table-mobile-lg` - Stack table on lg breakpoint and below

**Interactive Tables:**
- `table-selectable` - Add selection functionality to rows

**Sticky Elements:**
- `sticky-top` - Make thead sticky to top (apply to `<thead>`)

**Column Widths:**
- `w-1` - Minimal column width (auto-size to content)
- `w-auto` - Auto column width
- `w-25`, `w-50`, `w-75` - Percentage-based column widths

**Text Utilities (for cells):**
- `text-secondary` - Secondary text color
- `text-muted` - Muted text color
- `text-reset` - Reset link color to inherit
- `text-nowrap` - Prevent text wrapping
- `text-end` - Right-align text
- `text-center` - Center-align text
- `fw-bold` - Bold font weight

## Examples

### Basic Table

```blade
<x-tabler::table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>Active</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>Active</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Bob Johnson</td>
            <td>bob@example.com</td>
            <td>Inactive</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Striped Rows

```blade
<x-tabler::table class="table-striped">
    <thead>
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Laptop</td>
            <td>$999.99</td>
            <td>15</td>
        </tr>
        <tr>
            <td>Mouse</td>
            <td>$29.99</td>
            <td>45</td>
        </tr>
        <tr>
            <td>Keyboard</td>
            <td>$79.99</td>
            <td>23</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Hoverable Rows

```blade
<x-tabler::table class="table-hover">
    <thead>
        <tr>
            <th>Order #</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>#1001</td>
            <td>John Doe</td>
            <td>$125.00</td>
            <td>2024-01-15</td>
        </tr>
        <tr>
            <td>#1002</td>
            <td>Jane Smith</td>
            <td>$350.00</td>
            <td>2024-01-16</td>
        </tr>
        <tr>
            <td>#1003</td>
            <td>Bob Johnson</td>
            <td>$89.99</td>
            <td>2024-01-17</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Bordered Table

```blade
<x-tabler::table class="table-bordered">
    <thead>
        <tr>
            <th>Department</th>
            <th>Employees</th>
            <th>Budget</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Engineering</td>
            <td>45</td>
            <td>$500,000</td>
        </tr>
        <tr>
            <td>Marketing</td>
            <td>12</td>
            <td>$150,000</td>
        </tr>
        <tr>
            <td>Sales</td>
            <td>28</td>
            <td>$300,000</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Borderless Table

```blade
<x-tabler::table class="table-borderless">
    <thead>
        <tr>
            <th>Feature</th>
            <th>Basic</th>
            <th>Pro</th>
            <th>Enterprise</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Storage</td>
            <td>10 GB</td>
            <td>100 GB</td>
            <td>Unlimited</td>
        </tr>
        <tr>
            <td>Users</td>
            <td>1</td>
            <td>10</td>
            <td>Unlimited</td>
        </tr>
        <tr>
            <td>Support</td>
            <td>Email</td>
            <td>Priority</td>
            <td>24/7 Phone</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Small/Compact Table

```blade
<x-tabler::table class="table-sm">
    <thead>
        <tr>
            <th>Code</th>
            <th>Description</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>SKU001</td>
            <td>Widget A</td>
            <td>10</td>
            <td>$5.00</td>
        </tr>
        <tr>
            <td>SKU002</td>
            <td>Widget B</td>
            <td>25</td>
            <td>$7.50</td>
        </tr>
        <tr>
            <td>SKU003</td>
            <td>Widget C</td>
            <td>15</td>
            <td>$6.25</td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Responsive Table with Breakpoint

```blade
<x-tabler::table :responsive="false" class="table-responsive-md">
    <thead>
        <tr>
            <th>Date</th>
            <th>Transaction</th>
            <th>Amount</th>
            <th>Balance</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2024-01-15</td>
            <td>Payment received</td>
            <td class="text-success">+$1,250.00</td>
            <td>$5,430.00</td>
            <td><span class="badge bg-success">Completed</span></td>
        </tr>
        <tr>
            <td>2024-01-14</td>
            <td>Invoice #1001</td>
            <td class="text-danger">-$350.00</td>
            <td>$4,180.00</td>
            <td><span class="badge bg-success">Completed</span></td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Card Wrapped Table

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Recent Orders</h3>
    </div>
    <x-tabler::table :card="true" :responsive="false">
        <thead>
            <tr>
                <th>Order</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#1001</td>
                <td>John Doe</td>
                <td>$125.00</td>
                <td><span class="badge bg-success">Shipped</span></td>
            </tr>
            <tr>
                <td>#1002</td>
                <td>Jane Smith</td>
                <td>$350.00</td>
                <td><span class="badge bg-warning">Processing</span></td>
            </tr>
            <tr>
                <td>#1003</td>
                <td>Bob Johnson</td>
                <td>$89.99</td>
                <td><span class="badge bg-info">Pending</span></td>
            </tr>
        </tbody>
    </x-tabler::table>
</div>
```

### With Avatars and Status

```blade
<x-tabler::table vcenter class="table-hover">
    <thead>
        <tr>
            <th>User</th>
            <th>Role</th>
            <th>Status</th>
            <th class="w-1">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <x-tabler::avatar src="/img/user1.jpg" size="sm" class="me-2" />
                    <div>
                        <div>John Doe</div>
                        <div class="text-secondary">john@example.com</div>
                    </div>
                </div>
            </td>
            <td>Administrator</td>
            <td>
                <span class="status status-success">
                    <span class="status-dot"></span>
                    Online
                </span>
            </td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
            </td>
        </tr>
        <tr>
            <td>
                <div class="d-flex align-items-center">
                    <x-tabler::avatar initials="JS" size="sm" class="me-2" />
                    <div>
                        <div>Jane Smith</div>
                        <div class="text-secondary">jane@example.com</div>
                    </div>
                </div>
            </td>
            <td>Editor</td>
            <td>
                <span class="status status-warning">
                    <span class="status-dot"></span>
                    Away
                </span>
            </td>
            <td>
                <button class="btn btn-sm btn-primary">Edit</button>
            </td>
        </tr>
    </tbody>
</x-tabler::table>
```

### User Management Table

```blade
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Team Members</h3>
        <div class="card-actions">
            <button class="btn btn-primary">Add Member</button>
        </div>
    </div>
    <x-tabler::table :card="true" vcenter>
        <thead>
            <tr>
                <th>Member</th>
                <th>Email</th>
                <th>Role</th>
                <th>Last Active</th>
                <th class="w-1">Status</th>
                <th class="w-1"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <x-tabler::avatar src="/img/user1.jpg" size="sm" class="me-2" />
                        <div class="fw-bold">John Doe</div>
                    </div>
                </td>
                <td>john@example.com</td>
                <td><span class="badge bg-purple">Admin</span></td>
                <td class="text-secondary">2 minutes ago</td>
                <td>
                    <span class="status status-success"></span>
                </td>
                <td>
                    <div class="btn-list">
                        <a href="#" class="btn btn-sm btn-icon">
                            <x-tabler-pencil class="icon" />
                        </a>
                        <a href="#" class="btn btn-sm btn-icon text-danger">
                            <x-tabler-trash class="icon" />
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <x-tabler::avatar initials="JS" size="sm" class="me-2" />
                        <div class="fw-bold">Jane Smith</div>
                    </div>
                </td>
                <td>jane@example.com</td>
                <td><span class="badge bg-blue">Editor</span></td>
                <td class="text-secondary">1 hour ago</td>
                <td>
                    <span class="status status-warning"></span>
                </td>
                <td>
                    <div class="btn-list">
                        <a href="#" class="btn btn-sm btn-icon">
                            <x-tabler-pencil class="icon" />
                        </a>
                        <a href="#" class="btn btn-sm btn-icon text-danger">
                            <x-tabler-trash class="icon" />
                        </a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                        <x-tabler::avatar src="/img/user3.jpg" size="sm" class="me-2" />
                        <div class="fw-bold">Bob Johnson</div>
                    </div>
                </td>
                <td>bob@example.com</td>
                <td><span class="badge bg-cyan">Viewer</span></td>
                <td class="text-secondary">3 days ago</td>
                <td>
                    <span class="status status-secondary"></span>
                </td>
                <td>
                    <div class="btn-list">
                        <a href="#" class="btn btn-sm btn-icon">
                            <x-tabler-pencil class="icon" />
                        </a>
                        <a href="#" class="btn btn-sm btn-icon text-danger">
                            <x-tabler-trash class="icon" />
                        </a>
                    </div>
                </td>
            </tr>
        </tbody>
    </x-tabler::table>
</div>
```

### Data Table with Actions

```blade
<x-tabler::table class="table-striped table-hover" vcenter>
    <thead>
        <tr>
            <th><input type="checkbox" class="form-check-input"></th>
            <th>Product</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th class="text-end">Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="checkbox" class="form-check-input"></td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="/img/product1.jpg" alt="Product" class="avatar avatar-sm me-2">
                    <div>
                        <div class="fw-bold">Wireless Headphones</div>
                        <div class="text-secondary">SKU: WH-2024-001</div>
                    </div>
                </div>
            </td>
            <td>Electronics</td>
            <td class="fw-bold">$129.99</td>
            <td>
                <span class="badge bg-success">In Stock (45)</span>
            </td>
            <td>
                <span class="status status-success">
                    <span class="status-dot"></span>
                    Active
                </span>
            </td>
            <td class="text-end">
                <div class="btn-list justify-content-end">
                    <button class="btn btn-sm btn-ghost-primary">View</button>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-ghost-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" class="form-check-input"></td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="/img/product2.jpg" alt="Product" class="avatar avatar-sm me-2">
                    <div>
                        <div class="fw-bold">Mechanical Keyboard</div>
                        <div class="text-secondary">SKU: MK-2024-002</div>
                    </div>
                </div>
            </td>
            <td>Accessories</td>
            <td class="fw-bold">$89.99</td>
            <td>
                <span class="badge bg-warning">Low Stock (3)</span>
            </td>
            <td>
                <span class="status status-success">
                    <span class="status-dot"></span>
                    Active
                </span>
            </td>
            <td class="text-end">
                <div class="btn-list justify-content-end">
                    <button class="btn btn-sm btn-ghost-primary">View</button>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-ghost-danger">Delete</button>
                </div>
            </td>
        </tr>
        <tr>
            <td><input type="checkbox" class="form-check-input"></td>
            <td>
                <div class="d-flex align-items-center">
                    <img src="/img/product3.jpg" alt="Product" class="avatar avatar-sm me-2">
                    <div>
                        <div class="fw-bold">USB-C Cable</div>
                        <div class="text-secondary">SKU: UC-2024-003</div>
                    </div>
                </div>
            </td>
            <td>Accessories</td>
            <td class="fw-bold">$15.99</td>
            <td>
                <span class="badge bg-danger">Out of Stock</span>
            </td>
            <td>
                <span class="status status-secondary">
                    <span class="status-dot"></span>
                    Inactive
                </span>
            </td>
            <td class="text-end">
                <div class="btn-list justify-content-end">
                    <button class="btn btn-sm btn-ghost-primary">View</button>
                    <button class="btn btn-sm btn-primary">Edit</button>
                    <button class="btn btn-sm btn-ghost-danger">Delete</button>
                </div>
            </td>
        </tr>
    </tbody>
</x-tabler::table>
```

### Pricing Table

```blade
<x-tabler::table class="table-borderless" vcenter :responsive="false">
    <thead>
        <tr>
            <th>Features</th>
            <th class="text-center">
                <div class="fw-bold fs-3">Basic</div>
                <div class="text-secondary">$9/month</div>
            </th>
            <th class="text-center">
                <div class="fw-bold fs-3">Pro</div>
                <div class="text-secondary">$29/month</div>
            </th>
            <th class="text-center">
                <div class="fw-bold fs-3">Enterprise</div>
                <div class="text-secondary">$99/month</div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Storage Space</td>
            <td class="text-center">10 GB</td>
            <td class="text-center">100 GB</td>
            <td class="text-center">Unlimited</td>
        </tr>
        <tr>
            <td>Team Members</td>
            <td class="text-center">1 User</td>
            <td class="text-center">10 Users</td>
            <td class="text-center">Unlimited</td>
        </tr>
        <tr>
            <td>API Access</td>
            <td class="text-center">
                <x-tabler-x class="icon text-danger" />
            </td>
            <td class="text-center">
                <x-tabler-check class="icon text-success" />
            </td>
            <td class="text-center">
                <x-tabler-check class="icon text-success" />
            </td>
        </tr>
        <tr>
            <td>Priority Support</td>
            <td class="text-center">
                <x-tabler-x class="icon text-danger" />
            </td>
            <td class="text-center">
                <x-tabler-check class="icon text-success" />
            </td>
            <td class="text-center">
                <x-tabler-check class="icon text-success" />
            </td>
        </tr>
        <tr>
            <td>Custom Integrations</td>
            <td class="text-center">
                <x-tabler-x class="icon text-danger" />
            </td>
            <td class="text-center">
                <x-tabler-x class="icon text-danger" />
            </td>
            <td class="text-center">
                <x-tabler-check class="icon text-success" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td class="text-center">
                <button class="btn btn-outline-primary">Choose Plan</button>
            </td>
            <td class="text-center">
                <button class="btn btn-primary">Choose Plan</button>
            </td>
            <td class="text-center">
                <button class="btn btn-outline-primary">Contact Sales</button>
            </td>
        </tr>
    </tbody>
</x-tabler::table>
```

## Accessibility

The Table component follows accessibility best practices:

- Uses semantic `<table>`, `<thead>`, `<tbody>`, and `<tfoot>` elements
- Column headers use `<th>` elements for proper structure
- Responsive tables maintain readability on all screen sizes
- Keyboard navigation works naturally through table cells
- Screen readers announce table structure and headers
- Color variants include sufficient contrast ratios
- Hover states are supplemented with other visual indicators
- Use `scope` attribute on `<th>` elements for complex tables
- Consider adding `<caption>` for tables that need additional context
- Interactive elements (buttons, checkboxes) are fully keyboard accessible

**Best Practices:**
- Add `<caption>` to describe table purpose for screen readers
- Use `scope="col"` on column headers and `scope="row"` on row headers
- Avoid empty cells or use `<th scope="row">` for row identifiers
- Don't rely solely on color to convey information (use badges, icons, text)
- Ensure clickable/interactive elements have sufficient size (44x44px minimum)
- Use `aria-label` or `aria-labelledby` for complex tables
- Provide alternative views for complex data on mobile devices

## Browser Compatibility

The Table component is compatible with all modern browsers:

- Chrome 90+ ✅
- Firefox 88+ ✅
- Safari 14+ ✅
- Edge 90+ ✅
- Opera 76+ ✅

**Features:**
- Responsive tables use CSS overflow scrolling (widely supported)
- Sticky headers require CSS `position: sticky` (IE11 not supported)
- All styling uses standard CSS without vendor prefixes
- No JavaScript required for core functionality
- Mobile stacking uses CSS Grid (IE11 not supported)
- Works on all modern mobile browsers (iOS Safari, Chrome Mobile, Firefox Mobile)

**Known Issues:**
- IE11 does not support sticky table headers
- Very wide tables may require horizontal scrolling on mobile
- Print styles may need customization for multi-page tables

## Related Components

- [Card](./card.md) - Container component for card table styling
- [Avatar](./avatar.md) - Display user avatars in table cells
- [Badge](./badge.md) - Status indicators and labels
- [Status](./status.md) - Status dots and indicators
- [Button](./button.md) - Action buttons in table cells
- [Pagination](./pagination.md) - Navigate through paginated table data
- [Checkbox](./form/checkbox.md) - Row selection functionality

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/table.blade.php`

## Changelog

### v1.0.0
- Initial release with responsive wrapper support
- Vertical centering prop
- Card table styling integration
- Multiple style variants (striped, hover, bordered, borderless, compact)
- Responsive breakpoint options
- Row color variants for status indication
- Sticky header support
- Column width control utilities
- Full accessibility support
- Mobile-first responsive design
