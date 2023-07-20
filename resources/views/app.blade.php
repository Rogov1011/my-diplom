<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>instrument37 - @yield("title")</title>
    <link rel="stylesheet" href="{{asset("assets/css/header.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/popup-catalog.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/popup-auth.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/bootstrap.css")}}">
</head>
<body>
    @include("layouts.header")
    @include("layouts.popup-catalog")
    @include("layouts.popup-auth")
<main>
    <div class="container">
        @yield("content")
    </div>
</main>
<script src="{{asset("assets/js/jquery-3.6.4.min.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.bundle.js")}}"></script>
<script src="{{asset("assets/js/script.js")}}"></script>
</body>
</html>
