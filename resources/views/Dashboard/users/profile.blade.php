@extends('BaseDash')

@section('titre')
    Profil de l'utilisateur
@endsection
@section('head')
@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
            <div class="mt-4">
                @session('error')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ session('error') }}
                    </div>
                @endsession
                @session('success')
                    <div
                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-green-900 dark:text-green-300 mb-4">
                        {{ session('success') }}
                    </div>
                @endsession
                <div class="flex items-center">
                    <div class="ms-4">
                        <h2 class="text-xl font-semibold dark:text-gray-200">
                            Nom d'utilisateur : {{ Auth::user()->username }}
                        </h2>
                        <p class="text-gray-500 dark:text-gray-300">matricule : {{ Auth::user()->matricule }}</p>
                        <p class="text-gray-500 dark:text-gray-300">Créer le : {{ Auth::user()->created_at }}</p>
                        <p class="text-gray-500 dark:text-gray-300">Modifier le : {{ Auth::user()->updated_at }}</p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-4">
                <a href="{{ route('dash.index') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour</a>
            </div>
        </div>
        <div class="mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
            <form action="{{ route('dash.users.updateUser', Auth::user()->id) }}" method="post">
                @csrf
                @method('put')
                @error('matricule')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mt-4">
                    <label for="matricule"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Matricule</label>
                    <input type="text" name="matricule" id="matricule" value="{{ Auth::user()->matricule }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('username')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mt-4">
                    <label for="username" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom
                        d'utilisateur</label>
                    <input type="text" name="username" id="username" value="{{ Auth::user()->username }}"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('password')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mt-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de
                        passe</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                @error('password_confirmation')
                    <div
                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-red-900 dark:text-red-300 mb-4">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mt-4">
                    <label for="password_confirmation"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmer le mot de
                        passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mt-4 flex justify-end">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modifier</button>
                </div>
            </form>
        </div>
    </div>
@endsection
