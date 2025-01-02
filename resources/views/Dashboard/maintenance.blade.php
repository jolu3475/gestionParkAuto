@extends('BaseDash')

@section('title')
    Maintenance
@endsection

@section('head')
    <link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4">
            <h1>Voici la liste des voiture en cours de maintenance</h1>
            <table id="export-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                Matricule de la voiture
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
                                Début
                                <i class="fa-solid fa-arrow-down-a-z pl-2"></i>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Regarder
                            </span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if ($maintenances['vide'])
                        <tr>
                            <td>Vide</td>
                            <td>Vide</td>
                            <td>Vide</td>
                            <td>Vide</td>
                        </tr>
                    @else
                        @foreach ($maintenance as $main)
                            <tr>
                                <td>{{ $main->voiture()->plaque }}</td>
                                <td>{{ $main->reparation()->type }}</td>
                                <td>
                                    {{ $main->debut }}
                                </td>
                                <td>
                                    <a href="{{ route('dash.users.user', $user->id) }}"
                                        class="text-blue-500 hover:text-blue-700">Regarder</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    @include('include.simpleDatatable')
@endsection
