{{--
    Breadcrumb Component

    Navigation aid showing the current page location and hierarchy.
    Helps users understand their position and navigate back through parent pages.

    @prop array $items - Array of breadcrumb items. Each item can be:
                         - string: Simple text for the item
                         - array with 'label' and optional 'url' keys
    @prop string|null $separator - Separator style: 'dots', 'arrows', 'bullets' (default: chevron)
    @prop bool $homeIcon - Show home icon for first item instead of text (default: false)

    @slot default - Alternative to $items prop for manual breadcrumb content

    Available CSS Classes (use via class="" attribute):

    Separator Styles:
    - breadcrumb-dots        - Dot separators between items
    - breadcrumb-arrows      - Arrow separators between items
    - breadcrumb-bullets     - Bullet separators between items
    - (default)              - Chevron separators (no class needed)

    Visual Styles:
    - breadcrumb-muted       - Muted/subtle appearance for secondary breadcrumbs

    Item States:
    - breadcrumb-item        - Individual breadcrumb item (automatically applied)
    - active                 - Current/active page (automatically applied to last item)

    Spacing:
    - mb-1, mb-2, mb-3       - Margin bottom
    - mt-1, mt-2, mt-3       - Margin top

    Usage Examples:

    Simple breadcrumb (array of strings):
    <x-tabler::breadcrumb :items="['Home', 'Library', 'Data']" />

    Breadcrumb with URLs (array of arrays):
    <x-tabler::breadcrumb :items="[
        ['label' => 'Home', 'url' => '/'],
        ['label' => 'Library', 'url' => '/library'],
        ['label' => 'Data']
    ]" />

    With dots separator:
    <x-tabler::breadcrumb
        :items="['Home', 'Library', 'Data']"
        separator="dots"
    />

    With arrows separator:
    <x-tabler::breadcrumb
        :items="['Home', 'Library', 'Data']"
        separator="arrows"
    />

    With bullets separator:
    <x-tabler::breadcrumb
        :items="['Home', 'Library', 'Data']"
        separator="bullets"
    />

    With home icon:
    <x-tabler::breadcrumb
        :items="['Home', 'Library', 'Data']"
        :home-icon="true"
    />

    Muted style (via CSS class):
    <x-tabler::breadcrumb
        :items="['Home', 'Library', 'Data']"
        class="breadcrumb-muted"
    />

    In page header:
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <x-tabler::breadcrumb
                    :items="[
                        ['label' => 'Home', 'url' => '/'],
                        ['label' => 'Library', 'url' => '/library'],
                        ['label' => 'Articles']
                    ]"
                    class="mb-1"
                />
                <h2 class="page-title">Current Article Title</h2>
            </div>
        </div>
    </div>

    Manual content (using slot):
    <x-tabler::breadcrumb>
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/library">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </x-tabler::breadcrumb>
--}}

@props([
    'items' => [],
    'separator' => null,
    'homeIcon' => false,
])

@php
    // Build breadcrumb classes
    $classes = ['breadcrumb'];

    // Separator style
    if ($separator) {
        $classes[] = 'breadcrumb-' . $separator;
    }

    // Normalize items array
    $breadcrumbItems = collect($items)->map(function ($item) {
        if (is_string($item)) {
            return ['label' => $item, 'url' => null];
        }
        return $item;
    });
@endphp

<nav aria-label="breadcrumb">
    <ol {{ $attributes->merge(['class' => implode(' ', $classes)]) }}>
        @if ($slot->isEmpty() && $breadcrumbItems->isNotEmpty())
            @foreach ($breadcrumbItems as $index => $item)
                @php
                    $isLast = $index === $breadcrumbItems->count() - 1;
                    $isFirst = $index === 0;
                @endphp

                @if ($isLast)
                    {{-- Last item (current page) --}}
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ $item['label'] }}
                    </li>
                @else
                    {{-- Regular item with link --}}
                    <li class="breadcrumb-item">
                        @if ($isFirst && $homeIcon)
                            {{-- Home icon for first item --}}
                            <a href="{{ $item['url'] ?? '/' }}">
                                <x-tabler-home class="icon" />
                            </a>
                        @else
                            {{-- Regular link --}}
                            <a href="{{ $item['url'] ?? '#' }}">
                                {{ $item['label'] }}
                            </a>
                        @endif
                    </li>
                @endif
            @endforeach
        @else
            {{-- Manual slot content --}}
            {{ $slot }}
        @endif
    </ol>
</nav>
