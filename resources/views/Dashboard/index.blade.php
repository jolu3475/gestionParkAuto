@extends('BaseDash')

@section('titre', 'Dashboard')
@section('head')
    <link rel="stylesheet" href="{{ asset('SimpleDatatable/forbites/CSS/flowbite.min.css') }}">
@endsection

@section('content')

    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        <div class="flex justify-between gap-4 mb-5 w-full">
            <div class="flex align-middle rounded bg-white shadow-md dark:bg-gray-800 p-4 w-2/3 max:w-2/3 h-auto">
                <canvas id="myChart"></canvas>
            </div>
            <div class="rounded bg-white shadow-md dark:bg-gray-800 p-4">
                <canvas id="myChart1"></canvas>
            </div>
        </div>
        <div class="mb-4 rounded bg-white shadow-md dark:bg-gray-800 p-4">

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
                                    Type de réparation
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
                        {{-- <th>
                            <span class="flex items-center">
                                Regarder
                            </span>
                        </th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($maintenances as $main)
                        <tr>
                            <td>{{ $main->voiture?->plaque }}</td>
                            <td>{{ $main->reparation?->type }}</td>
                            <td>
                                {{ $main->debut }}
                            </td>
                            {{-- <td>
                                <a href="{{ route('dash.main', $main->id) }}"
                                    class="text-blue-500 hover:text-blue-700">Regarder</a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

    <script src="{{ asset('ChartJs/chart.js') }}"></script>

    <script>
        $.ajax({
            url: '/api/chart/voiture',
            type: 'GET',
            success: function(data) {
                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: 'Resultat',
                            data: data.data,
                            borderWidth: 1,
                            backgroundColor: ['#FF0000', '#0000FF', '#FFFF00', '#008000',
                                '#800080', '#FFA500'
                            ]
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                const ctxy = document.getElementById('myChart1');

                new Chart(ctxy, {
                    type: 'doughnut',
                    data: {
                        labels: data.labels,
                        datasets: [{
                            label: '# of Votes',
                            data: data.data,
                            borderWidth: 1,
                            backgroundColor: ['#FF0000', '#0000FF', '#FFFF00', '#008000']
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            },
            error: function(err) {
                console.log('test')
            }
        })
    </script>

    @include('include.simpleDatatable')

@endsection
