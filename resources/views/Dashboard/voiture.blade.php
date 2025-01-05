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
                                Utilisateur
                            </span>
                        </th>
                        <th>
                            <span class="flex items-center">
                                Etat
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
                                {{ $main->utilisateur }}
                            </td>
                            <td>
                                @if ($main->etat == 0)
                                    <span class="bg-red-500 text-white rounded-full py-1 px-2">Sur cale</span>
                                @elseif($main->etat == 1)
                                    <span class="bg-green-500 text-white rounded-full py-1 px-2">En marche</span>
                                @else
                                    <span class="bg-yellow-500 text-white rounded-full py-1 px-2">Condanné</span>
                                @endif
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
