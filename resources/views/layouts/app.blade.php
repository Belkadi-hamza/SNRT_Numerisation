<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css2.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img\logo\logo.png') }}" />
    <title>SNRT | @yield('title')</title>
    @yield('style')
</head>

<body>

    <div class="wrapper">
        @include('partials.navbarA')
        <div class="main">
            @include('partials.navbarB')
            @include('layouts.breadcrumb')
            @include('partials.flashbag')
            <main class="content">
                @yield('main')
                @php
                    $segment = rtrim(Request::segment(1), 's');
                @endphp
                <x-Model :element="$segment" />
            </main>
            @include('partials.footer')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    @yield('script')



</body>

</html>
