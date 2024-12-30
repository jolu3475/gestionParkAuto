<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    @vite('resources/css/app.css', 'ressources/js/app.js')
    <script src="{{ asset('flowbite/JS/flowbite.min.js') }}"></script>
    @yield('head')
</head>

<body class="bg-gray-100">

    @include('component.header')

    @include('component.sidebar')

    <div class="p-4 sm:ml-64">
        @yield('content')
    </div>

</body>

</html>
