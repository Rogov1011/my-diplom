<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/popup-catalog.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/popup-auth.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
</head>

<body>
    @include('layouts.header')
    @include('layouts.popup-catalog')
    @include('auth.popup-auth')
    <main>
        <div class="container">
            @yield('content')
        </div>
        <div class="sticky-message"></div>
    </main>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>
    @yield('page-scripts')
    <script src="{{ asset('assets/js/script.js') }}"></script>
</body>

</html>
