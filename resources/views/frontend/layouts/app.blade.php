<!doctype html>
<html lang="{{app()->getLocale()}}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('frontend.layouts.head')
    @yield('head_script')
</head>

<body>
    @include('frontend.layouts.upperNavbar')
    @yield('content')

    @include('frontend.layouts.lowerNavbar')
    @include('frontend.layouts.scripts')
    @yield('scripts')
</body>

</html>
