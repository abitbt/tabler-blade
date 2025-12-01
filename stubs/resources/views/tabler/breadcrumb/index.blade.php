@blaze

@props([
    'items' => [],
    'separator' => null, // 'dots'|'arrows'|'bullets'
    'muted' => false,
    'homeIcon' => false,
    'ariaLabel' => 'Breadcrumb',
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('breadcrumb')
        ->add($separator ? "breadcrumb-{$separator}" : '')
        ->add($muted ? 'breadcrumb-muted' : '');
@endphp

<nav aria-label="{{ $ariaLabel }}" {{ $attributes->except('class') }}>
    <ol {{ $attributes->only('class')->class($classes) }}>
        @if ($slot->isEmpty())
            {{-- Render from items prop --}}
            @foreach ($items as $index => $item)
                <li class="breadcrumb-item {{ $item['active'] ?? false ? 'active' : '' }} {{ $item['disabled'] ?? false ? 'disabled' : '' }}"
                    @if ($item['active'] ?? false) aria-current="page" @endif>
                    @if (($item['url'] ?? null) && !($item['active'] ?? false))
                        <a href="{{ $item['url'] }}">
                            @if ($homeIcon && $index === 0)
                                <tabler:icon name="home" />
                            @endif
                            {{ $item['label'] }}
                        </a>
                    @else
                        {{ $item['label'] }}
                    @endif
                </li>
            @endforeach
        @else
            {{-- Render from slot --}}
            {{ $slot }}
        @endif
    </ol>
</nav>
