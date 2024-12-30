<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('flowbite/JS/flowbite.min.js') }}"></script>
</head>

<body class="bg-gray-100 dark:bg-gray-800">

    {{-- Header --}}
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4">
            <a href="https://flowbite.com" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
            </a>
            <div class="flex items-center space-x-6 rtl:space-x-reverse">
                <a href="{{ route('auth.login') }}" class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">Se
                    connecter</a>
                <a href="{{ route('auth.register') }}"
                    class="text-sm  text-blue-600 dark:text-blue-500 hover:underline">S'enregistrer</a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}



    {{-- Footer --}}

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <p>Main component</p>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2025 <a
                    href="https://flowbite.com/" class="hover:underline">Gestion de park auto</a>. All Rights
                Reserved.</span>
        </div>
    </footer>

</body>

</html>
