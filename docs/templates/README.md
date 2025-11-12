# Component Documentation Templates

This directory contains documentation templates for different types of Blade components in the tabler-blade package.

## Template Selection Guide

Choose the appropriate template based on your component's characteristics:

### 📄 [simple-component.md](./simple-component.md)

**Use for:** Simple presentational components with minimal logic

**Characteristics:**
- 2-5 props
- No sub-components
- Minimal complexity
- Few variations
- No JavaScript required

**Examples:**
- `divider` - Visual separator
- `status` - Status indicator dot
- `spinner` - Loading spinner
- `ribbon` - Decorative ribbon
- `badge` (simple variant)

**Template Features:**
- Simplified structure
- Essential sections only
- Basic examples
- Quick reference format

---

### 📄 [medium-component.md](./medium-component.md)

**Use for:** Standard components with moderate complexity

**Characteristics:**
- 6-15 props
- Moderate logic
- Multiple variants (color, size, style)
- May include icons
- Common use cases
- Minimal or no sub-components

**Examples:**
- `button` - Interactive button
- `alert` - Alert messages
- `badge` - Count/label badges
- `avatar` - User avatars
- `breadcrumb` - Navigation breadcrumbs
- `progress` - Progress bars
- `table` - Data tables
- `toast` - Toast notifications

**Template Features:**
- Comprehensive prop documentation
- Multiple example sections
- Variants section (colors, sizes, styles)
- Accessibility section
- Troubleshooting section
- Real-world examples
- Framework integration examples

---

### 📄 [complex-component.md](./complex-component.md)

**Use for:** Complex component families with multiple sub-components

**Characteristics:**
- Multiple related sub-components
- Complex interactions
- Requires Bootstrap JavaScript
- Composite component pattern
- Advanced composition patterns

**Examples:**
- `modals` - Modal dialogs
  - `modal`, `header`, `body`, `footer`, `close`
- `tabs` - Tab navigation
  - `tabs`, `nav`, `nav-item`, `content`, `pane`
- `dropdowns` - Dropdown menus
  - `dropdown`, `toggle`, `menu`, `item`, `divider`
- `cards` - Card components
  - `card`, `header`, `body`, `footer`, `img`, etc.
- `accordion` - Accordion panels
- `offcanvas` - Off-canvas panels

**Template Features:**
- Component family overview
- Props for each sub-component
- Composition patterns section
- Bootstrap events documentation
- Programmatic control examples
- Complex real-world scenarios
- Framework integration (Livewire, Alpine)
- Performance considerations

---

### 📄 [form-component.md](./form-component.md)

**Use for:** Form input components with Laravel validation integration

**Characteristics:**
- Laravel validation integration
- Automatic error handling
- Old input retrieval
- Label/help text support
- Form-specific features

**Examples:**
- `input` - Text input
- `textarea` - Multi-line text input
- `select` - Select dropdown
- `checkbox` - Checkbox input
- `radio` - Radio button
- `switch` - Toggle switch
- `file` - File upload
- `color-picker` - Color picker
- `range` - Range slider

**Template Features:**
- Laravel integration section
- Validation examples
- Old input handling
- Error display patterns
- Form request examples
- Accessibility for forms
- Form-specific troubleshooting
- Login/registration examples

---

## Template Structure

All templates follow this consistent structure:

1. **Header** - Component name and brief description
2. **Overview** - Detailed explanation and key features
3. **Basic Usage** - Simple example
4. **Props/Attributes** - Complete prop reference table
5. **Slots** - Available slots and requirements
6. **Examples** - Progressive examples (basic → advanced)
7. **Variants** - Color, size, and style variations
8. **Accessibility** - WCAG compliance and best practices
9. **Browser Compatibility** - Requirements and browser support
10. **Events & Interactivity** - JavaScript events and framework integration
11. **Troubleshooting** - Common issues and solutions
12. **Real-World Examples** - Complete usage scenarios
13. **Available Classes** - Additional CSS classes
14. **Performance** - Optimization tips (for complex components)
15. **Notes** - Important implementation details
16. **Related Components** - Cross-references
17. **Source** - File location
18. **Changelog** - Version history

## Quick Reference

| Component | Props Count | Sub-components | JavaScript | Template |
|-----------|-------------|----------------|------------|----------|
| Divider | 2-3 | No | No | Simple |
| Status | 2-4 | No | No | Simple |
| Spinner | 3-5 | No | No | Simple |
| Button | 13 | No | No | Medium |
| Alert | 5 | No | No | Medium |
| Badge | 8 | No | No | Medium |
| Avatar | 10 | No | No | Medium |
| Input | 16 | No | No | Form |
| Select | 13 | No | No | Form |
| Checkbox | 12 | No | No | Form |
| Modal | 6 | 5 sub-components | Yes | Complex |
| Tabs | 4 | 5 sub-components | Yes | Complex |
| Dropdown | 5 | 6 sub-components | Yes | Complex |
| Cards | 8 | 9 sub-components | No | Complex |

## Template Usage Tips

### 1. Start with the Right Template
- Analyze your component first
- Count props and sub-components
- Check JavaScript requirements
- Review existing similar components

### 2. Customize Appropriately
- Remove sections that don't apply
- Add component-specific sections if needed
- Maintain consistent formatting
- Follow existing documentation style

### 3. Focus on These Sections
**High Priority:**
- Basic Usage
- Props/Attributes table
- Examples (5-10 minimum)
- Accessibility
- Troubleshooting

**Medium Priority:**
- Variants
- Browser Compatibility
- Real-World Examples
- Available Classes

**Lower Priority (but still valuable):**
- Events & Interactivity
- Performance
- Notes

### 4. Write Clear Examples
- Start with simplest possible example
- Progress to more complex usage
- Include copy-pasteable code
- Show common patterns
- Demonstrate edge cases

### 5. Test Your Documentation
- Verify all examples work
- Test code snippets
- Check prop descriptions
- Validate links to related components
- Ensure consistency

## Component Categories

### Structure & Layout
- `accordion`, `divider`, `offcanvas`, `page-header`, `cards`, `carousel`, `ribbon`

### Form Components
- `input`, `textarea`, `select`, `checkbox`, `radio`, `switch`, `file`, `color-picker`, `range`, `input-group`, `selectgroup`, `fieldset`, `label`, `help`, `feedback`

### Modals & Dialogs
- `modal`, `header`, `body`, `footer`, `close`, `status`

### Navigation
- `tabs`, `nav`, `nav-item`, `content`, `pane`, `breadcrumb`, `pagination`

### Dropdowns
- `dropdown`, `toggle`, `menu`, `item`, `header`, `divider`

### Display Components
- `alert`, `badge`, `button`, `avatar`, `avatar-list`, `empty`, `image`, `list-group`, `placeholder`, `progress`, `spinner`, `status`, `steps`, `table`, `timeline`, `toast`

## Documentation Best Practices

1. **Consistency** - Use same structure across all docs
2. **Completeness** - Cover all props, examples, edge cases
3. **Clarity** - Write for developers of all skill levels
4. **Examples** - Show, don't just tell
5. **Accessibility** - Always include accessibility guidance
6. **Troubleshooting** - Document common pitfalls
7. **Cross-reference** - Link to related components
8. **Update** - Keep docs in sync with code changes

## Need Help?

- Review existing component documentation
- Check the demo files in `resources/views/demo/`
- Examine the component source code in `stubs/resources/views/tabler/`
- Follow the template that best matches your component type
- Maintain consistency with existing documentation style

---

**Last Updated:** 2025-01-12
