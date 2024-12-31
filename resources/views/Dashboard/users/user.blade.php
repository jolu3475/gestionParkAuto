@extends('BaseDash')

@section('titre', 'Utilisateur')

@section('head')
@endsection

@section('content')

    <div class="mt-14 mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">
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
                    <h2 class="text-xl font-semibold dark:text-gray-200">Nom d'utilisateur : {{ $user->username }}</h2>
                    <p class="text-gray-500 dark:text-gray-300">matricule : {{ $user->matricule }}</p>
                    <p class="text-gray-500 dark:text-gray-300">Créer le : {{ $user->created_at }}</p>
                </div>
            </div>
        </div>

        <div class="flex justify-end mt-4">
            <a href="{{ route('dash.users.users') }}"
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour</a>
        </div>
    </div>

    @include('Dashboard.users.component.addSu')

    @include('Dashboard.users.component.remove')

@endsection
