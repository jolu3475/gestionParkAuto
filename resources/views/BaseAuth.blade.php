<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titre')</title>
    @vite('resources/css/app.css', 'resources/js/app.js')
    <script src="{{ asset('flowbite/JS/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-800">

    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-4 space-y-4 bg-white rounded-lg shadow-lg dark:bg-gray-800">
            @yield('content')
        </div>

    </div>

</body>

</html>
