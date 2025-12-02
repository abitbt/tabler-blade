{{--
    Sidebar Header Component

    Container for logo/brand and collapse button.

    Usage:
    <tabler:sidebar.header>
        <tabler:sidebar.brand logo="/logo.png" name="My App" />
        <tabler:sidebar.collapse />
    </tabler:sidebar.header>
--}}
@blaze

<div {{ $attributes->class('d-flex align-items-center') }}>
    {{ $slot }}
</div>
