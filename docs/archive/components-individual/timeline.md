# Timeline

A vertical timeline component for displaying chronological events or activities in a clear, visually appealing format. Perfect for activity feeds, process visualization, event history, and tracking user actions.

## Overview

- **Vertical Layout** - Events displayed in chronological order from top to bottom
- **Icon Support** - Optional icons for each event with customizable background colors
- **Simple Mode** - Minimal timeline without icon circles for cleaner displays
- **Card Integration** - Built-in support for card-based event content
- **Flexible Content** - Supports text, avatars, badges, and custom content in events
- **Color Variants** - Multiple background color options for event icons
- **Responsive** - Works seamlessly across all device sizes
- **Semantic HTML** - Uses proper list markup for accessibility

## Basic Usage

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-check class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">2 hrs ago</div>
                <h4>Task completed</h4>
                <p class="text-secondary">Finished the homepage design.</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

## Props/Attributes

| Prop | Type | Default | Required | Description |
|------|------|---------|----------|-------------|
| `simple` | boolean | `false` | No | Use simple timeline style without icon circles |
| `class` | string | `''` | No | Additional CSS classes to apply to the timeline |

## Slots

**Default Slot** - Contains all timeline items. Each item should be wrapped in an `<li>` element with the `timeline-event` class. Timeline items typically contain:
- `timeline-event-icon` - Icon wrapper (optional, omit for simple timelines)
- `timeline-event-card` - Card container for event content

## CSS Classes

**Timeline Base:**
- `timeline` - Base timeline class (applied automatically)
- `timeline-simple` - Simple timeline without icon circles

**Timeline Items:**
- `timeline-event` - Individual timeline event/item (use on `<li>`)
- `timeline-event-icon` - Icon wrapper for event markers
- `timeline-event-card` - Card wrapper for event content

**Icon Background Colors:**
- `bg-primary-lt` - Light primary background
- `bg-success-lt` - Light success background
- `bg-danger-lt` - Light danger background
- `bg-warning-lt` - Light warning background
- `bg-info-lt` - Light info background
- `bg-facebook-lt` - Light Facebook blue
- `bg-twitter-lt` - Light Twitter blue
- `bg-x-lt` - Light X/Twitter background
- `bg-{color}-lt` - Light background variants for any Tabler color

## Examples

### Basic Timeline with Icons

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-check class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">2 hrs ago</div>
                <h4>Task completed</h4>
                <p class="text-secondary">Finished the homepage design.</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-briefcase class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">5 hrs ago</div>
                <h4>Meeting scheduled</h4>
                <p class="text-secondary">Team sync at 3 PM.</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Simple Timeline (No Icons)

```blade
<x-tabler::timeline simple>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <p class="text-secondary">8:00 AM - Morning standup</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <p class="text-secondary">10:30 AM - Client call</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <p class="text-secondary">2:00 PM - Code review</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Timeline with Avatars

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-info-lt">
            <x-tabler-user-plus class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">2 days ago</div>
                <h4>+3 Friend Requests</h4>
                <x-tabler::avatar-list class="mt-3">
                    <x-tabler::avatar src="/img/user1.jpg" />
                    <x-tabler::avatar src="/img/user2.jpg" />
                    <x-tabler::avatar src="/img/user3.jpg" />
                </x-tabler::avatar-list>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Activity Feed Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-git-commit class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">10 min ago</div>
                <h4>Code pushed to production</h4>
                <p class="text-secondary mb-0">
                    <strong>john.doe</strong> pushed 3 commits to master branch
                </p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-warning-lt">
            <x-tabler-alert-triangle class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">1 hr ago</div>
                <h4>Warning: High CPU usage detected</h4>
                <p class="text-secondary mb-0">Server load reached 85%</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-mail class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">3 hrs ago</div>
                <h4>New message received</h4>
                <p class="text-secondary mb-0">Client inquiry about pricing</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Order Status Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-package class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Order Delivered</h4>
                <p class="text-secondary mb-1">Your package has been delivered</p>
                <small class="text-muted">March 15, 2025 - 2:30 PM</small>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-info-lt">
            <x-tabler-truck class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Out for Delivery</h4>
                <p class="text-secondary mb-1">Package is on the way</p>
                <small class="text-muted">March 15, 2025 - 9:00 AM</small>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-box class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Order Shipped</h4>
                <p class="text-secondary mb-1">Package left the warehouse</p>
                <small class="text-muted">March 14, 2025 - 3:15 PM</small>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon">
            <x-tabler-circle-check class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Order Confirmed</h4>
                <p class="text-secondary mb-1">Payment received</p>
                <small class="text-muted">March 13, 2025 - 11:45 AM</small>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Project Milestone Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-flag class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">Completed</div>
                <h4>Phase 3: Testing</h4>
                <p class="text-secondary">All tests passed successfully</p>
                <x-tabler::badge color="success">100%</x-tabler::badge>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-code class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">In Progress</div>
                <h4>Phase 2: Development</h4>
                <p class="text-secondary">Building core features</p>
                <x-tabler::progress value="75" />
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon">
            <x-tabler-pencil class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">Completed</div>
                <h4>Phase 1: Planning</h4>
                <p class="text-secondary">Requirements gathered and documented</p>
                <x-tabler::badge color="success">Done</x-tabler::badge>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Social Media Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-twitter-lt">
            <x-tabler-brand-twitter class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">5 min ago</div>
                <h4>New Tweet</h4>
                <p>Just launched our new product! Check it out at example.com</p>
                <div class="text-muted">
                    <x-tabler-heart class="icon" /> 24
                    <x-tabler-message class="icon ms-2" /> 8
                </div>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-facebook-lt">
            <x-tabler-brand-facebook class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">2 hrs ago</div>
                <h4>Facebook Post</h4>
                <p>Behind the scenes of our latest project</p>
                <div class="text-muted">
                    <x-tabler-thumb-up class="icon" /> 156
                    <x-tabler-share class="icon ms-2" /> 42
                </div>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Support Ticket Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-check class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">Just now</div>
                <h4>Ticket Resolved</h4>
                <p class="text-secondary mb-2">Issue has been fixed and verified</p>
                <div>
                    <x-tabler::badge color="success">Closed</x-tabler::badge>
                    <span class="text-muted ms-2">by Support Team</span>
                </div>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-info-lt">
            <x-tabler-message class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">30 min ago</div>
                <h4>Response from Support</h4>
                <p class="text-secondary">We've identified the issue and deployed a fix...</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-warning-lt">
            <x-tabler-alert-circle class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">2 hrs ago</div>
                <h4>Ticket Escalated</h4>
                <p class="text-secondary">Assigned to senior developer</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-danger-lt">
            <x-tabler-bug class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">5 hrs ago</div>
                <h4>Bug Reported</h4>
                <p class="text-secondary mb-2">Login page not responding</p>
                <x-tabler::badge color="danger">High Priority</x-tabler::badge>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### User Registration Process

```blade
<x-tabler::timeline simple>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Step 1: Create Account</h4>
                <p class="text-secondary">Enter your email and choose a password</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Step 2: Verify Email</h4>
                <p class="text-secondary">Check your inbox for verification link</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Step 3: Complete Profile</h4>
                <p class="text-secondary">Add your personal information</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Step 4: Get Started</h4>
                <p class="text-secondary">Explore the dashboard and features</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### System Logs Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-danger-lt">
            <x-tabler-x class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">10:45 AM</div>
                <h4>Error: Database Connection Failed</h4>
                <p class="text-secondary mb-0">
                    <code>SQLSTATE[HY000] [2002] Connection refused</code>
                </p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-warning-lt">
            <x-tabler-alert-triangle class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">10:30 AM</div>
                <h4>Warning: Slow Query Detected</h4>
                <p class="text-secondary mb-0">Query took 5.2 seconds to execute</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-success-lt">
            <x-tabler-check class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">10:00 AM</div>
                <h4>Info: Backup Completed</h4>
                <p class="text-secondary mb-0">Database backup successful (2.4 GB)</p>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-refresh class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <div class="text-secondary float-end">9:00 AM</div>
                <h4>System Restart</h4>
                <p class="text-secondary mb-0">Server restarted for maintenance</p>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

### Meeting Notes Timeline

```blade
<x-tabler::timeline>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-primary-lt">
            <x-tabler-calendar class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Q1 Planning Meeting - March 15, 2025</h4>
                <p class="text-secondary">Discussed goals and objectives for the quarter</p>
                <ul class="mb-0">
                    <li>Launch new feature set</li>
                    <li>Improve performance by 30%</li>
                    <li>Expand team by 5 members</li>
                </ul>
            </div>
        </div>
    </li>
    <li class="timeline-event">
        <div class="timeline-event-icon bg-info-lt">
            <x-tabler-users class="icon" />
        </div>
        <div class="card timeline-event-card">
            <div class="card-body">
                <h4>Team Sync - March 10, 2025</h4>
                <p class="text-secondary">Weekly progress review</p>
                <ul class="mb-0">
                    <li>Sprint retrospective completed</li>
                    <li>3 features deployed to production</li>
                    <li>2 blockers identified and resolved</li>
                </ul>
            </div>
        </div>
    </li>
</x-tabler::timeline>
```

## Accessibility

- **Semantic HTML**: Uses `<ul>` and `<li>` elements for proper list semantics
- **Screen Readers**: Timeline structure is naturally announced as a list by screen readers
- **Keyboard Navigation**: All interactive elements within timeline cards are keyboard accessible
- **Focus Management**: Ensure proper focus indicators on all clickable elements
- **Time Information**: Include clear timestamps for each event
- **Icon Labels**: Use `aria-label` on icon-only elements for screen reader context
- **Color Independence**: Don't rely solely on icon colors to convey meaning; include text descriptions
- **Heading Hierarchy**: Use proper heading levels (`<h4>`, `<h5>`) within timeline cards
- **High Contrast**: Timeline line and icons maintain sufficient contrast ratios
- **Reading Order**: Events are presented in logical chronological order

## Browser Compatibility

- **Modern Browsers**: Full support in Chrome, Firefox, Safari, and Edge (latest versions)
- **Mobile Browsers**: Optimized for iOS Safari and Chrome on Android
- **Responsive Design**: Adapts seamlessly to all screen sizes
- **CSS Flexbox**: Uses modern CSS layout techniques
- **Icon Support**: Compatible with Tabler Icons component system
- **No JavaScript Required**: Pure CSS implementation for timeline structure
- **Print Friendly**: Timeline renders correctly when printed

## Related Components

- [Badge](./badge.md) - Add status indicators to timeline events
- [Avatar](./avatar.md) - Show user avatars in timeline items
- [Card](./cards/card.md) - Timeline events use card components for content
- [Progress](./progress.md) - Show progress indicators in timeline items
- [Alert](./alert.md) - Add contextual alerts within timeline events
- [Steps](./steps.md) - Alternative for step-by-step processes

## Source

**File Location:** `tabler-blade/stubs/resources/views/tabler/timeline.blade.php`

## Changelog

### v1.0.0
- Initial release of Timeline component with icon support and simple mode variant
