@extends('BaseDash')

@section('titre', 'liste des voitures')
<link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@section('head')

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
                                Plaque
                                <i class="fa-solid fa-arrow-down-a-z pl-2"></i>
                            </span>
                        </th>
                        <th data-type="date" data-format="YYYY/DD/MM">
                            <span class="flex items-center">
                                <p class="pr-2">
                                    Marque
                                </p>
                                <i class="fa-solid fa-arrow-down-a-z"></i>
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Modele
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
                    @foreach ($voiture as $main)
                        <tr>
                            <td>{{ $main->plaque }}</td>
                            <td>{{ $main->marque }}</td>
                            <td>
                                {{ $main->modele }}
                            </td>
                            <td>
                                <a href="{{ route('dash.voi', $main->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Regarder</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (Auth::user()->su == 1)
            @include('Dashboard.voiture.addVoiture')
        @endif
    </div>

    @include('include.simpleDatatable')
@endsection
