{{--
    Timeline Component

    Vertical timeline for displaying chronological events or activities.
    Perfect for activity feeds, process visualization, and event history.

    @prop bool $simple - Use simple timeline style (hides icon circles)

    @slot default - Timeline items (li.timeline-event elements)

    Available CSS Classes (use via class="" attribute):

    Timeline Styles:
    - timeline           - Base timeline class (applied automatically)
    - timeline-simple    - Simple timeline without icons (also via simple prop)

    Timeline Item:
    - timeline-event     - Individual timeline event/item (use on <li>)
    - timeline-event-icon - Icon wrapper for event (use on <div>)
    - timeline-event-card - Card wrapper for event content

    Icon Background Colors:
    - bg-primary-lt, bg-success-lt, bg-danger-lt, bg-warning-lt, bg-info-lt
    - bg-facebook-lt, bg-twitter-lt, bg-x-lt
    - bg-{color}-lt      - Light background variants for any color

    Usage Examples:

    Basic timeline with icons:
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
            <div class="timeline-event-icon">
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

    Simple timeline (no icons):
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
    </x-tabler::timeline>

    Timeline with avatars:
    <x-tabler::timeline>
        <li class="timeline-event">
            <div class="timeline-event-icon">
                <x-tabler-user-plus class="icon" />
            </div>
            <div class="card timeline-event-card">
                <div class="card-body">
                    <div class="text-secondary float-end">2 days ago</div>
                    <h4>+3 Friend Requests</h4>
                    <x-tabler::avatar-list class="mt-3">
                        <x-tabler::avatar src="..." />
                        <x-tabler::avatar src="..." />
                        <x-tabler::avatar src="..." />
                    </x-tabler::avatar-list>
                </div>
            </div>
        </li>
    </x-tabler::timeline>
--}}

@props([
    'simple' => false,
])

@php
    // Build timeline classes
    $classes = ['timeline'];

    // Simple variant
    if ($simple) {
        $classes[] = 'timeline-simple';
    }
@endphp

<ul {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
    {{ $slot }}
</ul>
