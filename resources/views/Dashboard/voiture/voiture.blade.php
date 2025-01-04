@extends('BaseDash')

@section('titre', 'voiture')

@section('head')
    <link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4">
            @session('success')
                <div
                    class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-green-900 dark:text-green-300 mb-4">
                    {{ session('success') }}
                </div>
            @endsession
            <p>La voiture est une <span class="text-red-500">{{ $voiture->marque }}</span> de modèle <span
                    class="text-red-500">{{ $voiture->modele }}</span> avec la plaque <span class="text-red-500">
                    {{ $voiture->plaque }}</span>
            </p>
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
                                    Type de maintenance
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
                    @foreach ($voiture->maintenances as $main)
                        @dd($main->voiture())
                        <tr>
                            <td>{{ $voiture->maintenances->voiture()->plaque }}</td>
                            <td>{{ $voiture->maintenances->reparation()->type }}</td>
                            <td>
                                {{ $voiture->maintenances->debut }}
                            </td>
                            <td>
                                <a href="{{ route('dash.users.user', $user->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Regarder</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="flex justify-end mt-4">
                <a href="{{ route('dash.voiture') }}"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Retour</a>
            </div>
        </div>
        <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4 mt-5">
            @include('Dashboard.voiture.editVoiture')
        </div>
        @include('include.simpleDatatable')
    @endsection
