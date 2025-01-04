<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    @vite('resources/css/app.css', 'ressources/js/app.js')
    <link rel="stylesheet" href="{{ asset('fontawesome-free-6.7.2-web/css/all.min.css') }}">
    <script src="{{ asset('fontawesome-free-6.7.2-web/js/all.min.js') }}"></script>
    <script src="{{ asset('flowbite/JS/flowbite.min.js') }}"></script>
    <script src="{{ asset('Datatable/JS/jquery-3.7.1.js') }}"></script>
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
