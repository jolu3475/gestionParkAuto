@extends('BaseAuth')

@section('titre', 'Se connecter')

@section('content')
    <h1 class="text-3xl font-semibold text-center">Se connecter</h1>
    <form action="{{ route('auth.doLogin') }}" method="POST" class="space-y-4">
        @csrf
        @session('success')
            <div class="text-green-500">{{ session('success') }}</div>
        @endsession
        @session('error')
            <div class="text-red-500">{{ session('error') }}</div>
        @endsession
        <div class="relative">
            <input type="text" id="username" name="username" value="{{ old('username') }}"
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="username"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                Nom de l'utilisateur</label>
        </div>
        <div class="relative">
            <input type="password" id="password" name="password" value="{{ old('password') }}"
                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                placeholder=" " />
            <label for="password"
                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto start-1">
                Mot de passe</label>
        </div>
        <div>
            <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Se
                connecter</button>
        </div>
        <div>
            <a href="{{ route('auth.register') }}" class="text-blue-500 hover:underline">Créer un compte</a>
        </div>
    </form>
@endsection
