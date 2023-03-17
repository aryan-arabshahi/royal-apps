<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ env('APP_NAME') }}">
    <meta name="author" content="Aryan Arabshahi">
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" >
    @yield('styles')
    <script src={{ asset('/assets/js/tailwindcss.js') }}></script>
    @yield('scripts.start')
    <title>{{ env('APP_NAME') }}</title>
</head>
<body>

    @yield('content')

    @yield('scripts.end')

</body>
</html>