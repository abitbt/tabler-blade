{{--
    HTML Head Section

    Shared head section for all layouts.

    Variables:
    - $title (optional) - Page title
    - $description (optional) - Meta description
--}}

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- Page Title --}}
<title>@yield('title', $title ?? config('app.name'))</title>

{{-- Meta Description --}}
@hasSection('description')
    <meta name="description" content="@yield('description')">
@elseif(isset($description))
    <meta name="description" content="{{ $description }}">
@endif

{{-- Additional Meta Tags --}}
@stack('meta')

{{-- Styles --}}
@vite(['resources/scss/app.scss', 'resources/js/app.js'])
@stack('styles')
