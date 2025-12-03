@props([
    'items' => [],
    'currentRoute' => null,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $currentRoute = $currentRoute ?? request()->route()?->getName();
@endphp

@foreach($items as $item)
    @if(isset($item['children']) && count($item['children']) > 0)
        {{-- Dropdown Menu Item --}}
        <li class="nav-item dropdown">
            <a
                class="nav-link dropdown-toggle"
                href="#"
                data-bs-toggle="dropdown"
                data-bs-auto-close="outside"
                role="button"
                aria-haspopup="true"
                aria-expanded="false"
            >
                @if(isset($item['icon']))
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <tabler:icon :name="$item['icon']" />
                    </span>
                @endif
                <span class="nav-link-title">{{ $item['title'] }}</span>
            </a>

            <div class="dropdown-menu{{ isset($item['align']) && $item['align'] === 'end' ? ' dropdown-menu-end' : '' }}">
                @foreach($item['children'] as $child)
                    @php
                        $isActive = isset($child['route']) && $currentRoute === $child['route'];
                    @endphp
                    <a
                        href="{{ $child['url'] ?? '#' }}"
                        class="dropdown-item{{ $isActive ? ' active' : '' }}"
                    >
                        @if(isset($child['icon']))
                            <tabler:icon :name="$child['icon']" class="dropdown-item-icon" />
                        @endif
                        {{ $child['title'] }}
                    </a>
                @endforeach
            </div>
        </li>
    @else
        {{-- Regular Menu Item --}}
        @php
            $isActive = (isset($item['route']) && $currentRoute === $item['route']) ||
                        (isset($item['active']) && $item['active']);
        @endphp
        <li class="nav-item{{ $isActive ? ' active' : '' }}">
            <a
                class="nav-link"
                href="{{ $item['url'] ?? '#' }}"
                @if($isActive) aria-current="page" @endif
            >
                @if(isset($item['icon']))
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <tabler:icon :name="$item['icon']" />
                    </span>
                @endif
                <span class="nav-link-title">{{ $item['title'] }}</span>
            </a>
        </li>
    @endif
@endforeach
