@blaze

@props([
    'striped' => false,
    'bordered' => false,
    'borderless' => false,
    'hover' => false,
    'size' => null,
    'responsive' => false,
    'responsiveBreakpoint' => null,
    'vcenter' => false,
    'nowrap' => false,
    'mobile' => false,
    'mobileBreakpoint' => null,
    'transparent' => false,
    'card' => false,
    'selectable' => false,
])

@php
    use Abitbt\TablerBlade\Tabler;

    $classes = Tabler::classes()
        ->add('table')
        ->add($striped ? 'table-striped' : '')
        ->add($bordered ? 'table-bordered' : '')
        ->add($borderless ? 'table-borderless' : '')
        ->add($hover ? 'table-hover' : '')
        ->add(
            match ($size) {
                'sm', 'small' => 'table-sm',
                default => '',
            },
        )
        ->add($vcenter ? 'table-vcenter' : '')
        ->add($nowrap ? 'table-nowrap' : '')
        ->add($transparent ? 'table-transparent' : '')
        ->add($card ? 'card-table' : '')
        ->add($selectable ? 'table-selectable' : '');

    // Mobile responsive classes
    if ($mobile) {
        $mobileSuffix = match ($mobileBreakpoint) {
            'sm' => '-sm',
            'md' => '-md',
            'lg' => '-lg',
            'xl' => '-xl',
            default => '-md',
        };
        $classes->add('table-mobile' . $mobileSuffix);
    }

    // Responsive wrapper classes
    $wrapperClasses = '';
    if ($responsive) {
        if ($responsiveBreakpoint) {
            $wrapperClasses = match ($responsiveBreakpoint) {
                'sm' => 'table-responsive-sm',
                'md' => 'table-responsive-md',
                'lg' => 'table-responsive-lg',
                'xl' => 'table-responsive-xl',
                default => 'table-responsive',
            };
        } else {
            $wrapperClasses = 'table-responsive';
        }
    }

    $shouldWrap =
        $responsive || ($attributes->has('class') && str_contains($attributes->get('class'), 'table-responsive'));
@endphp

@if ($shouldWrap || $responsive)
    <div class="{{ $wrapperClasses }}">
        <table {{ $attributes->class($classes) }}>
            {{ $slot }}
        </table>
    </div>
@else
    <table {{ $attributes->class($classes) }}>
        {{ $slot }}
    </table>
@endif
