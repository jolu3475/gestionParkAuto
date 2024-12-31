@extends('BaseDash')

@section('titre', 'Utilisateurs')

@section('head')
    <link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@endsection

@section('content')
    <div class="mt-14 mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">

        @session('success')
            <div
                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-green-900 dark:text-green-300 mb-4">
                {{ session('success') }}
            </div>
        @endsession

        <table id="export-table">
            <thead>
                <tr>
                    <th>
                        <span class="flex items-center">
                            Matricule
                            <i class="fa-solid fa-arrow-down-a-z pl-2"></i>
                        </span>
                    </th>
                    <th data-type="date" data-format="YYYY/DD/MM">
                        <span class="flex items-center">
                            <p class="pr-2">
                                Nom d'utilisateur
                            </p>
                            <i class="fa-solid fa-arrow-down-a-z"></i>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Administateur
                            <i class="fa-solid fa-arrow-down-a-z pl-2"></i>
                        </span>
                    </th>
                    <th>
                        <span class="flex items-center">
                            Modifier

                        </span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->matricule }}</td>
                        <td>{{ $user->username }}</td>
                        <td>
                            @if ($user->su)
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Administrateur</span>
                            @else
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Utilisateur</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('dash.users.user', $user->id) }}"
                                class="text-blue-500 hover:text-blue-700">Modifier</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    @include('include.simpleDatatable')

@endsection
