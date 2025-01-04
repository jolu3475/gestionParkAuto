@extends('BaseDash')

@section('titre', 'Les intitulés')

@section('head')
    <link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@endsection

@section('content')
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        @session('success')
            <div
                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-4 rounded dark:bg-green-900 dark:text-green-300 mb-4">
                {{ session('success') }}
            </div>
        @endsession
        <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4">
            <p>Voici la liste des intituler ajouter : </p>
            <table id="export-table">
                <thead>
                    <tr>
                        <th>
                            <span class="flex items-center">
                                Intituler
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
                    @foreach ($intituler as $main)
                        <tr>
                            <td>{{ $main->type }}</td>
                            <td>
                                <a href="{{ route('dash.editInt', $main->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Regarder</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @include('Dashboard.intituler.addInt')

    </div>

    @include('include.simpleDatatable')
@endsection
