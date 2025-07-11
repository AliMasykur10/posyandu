@extends('layouts.app')

@section('title', 'Perkembangan Bayi')

@push('style')
    <!-- CSS Libraries -->
    <link href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}" rel="stylesheet">

    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
@endpush


@section('main')


    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Grafik Perkembangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">perkembangan</a></div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <canvas id="grafikBerat"></canvas>

                            <script>
                                var ctx = document.getElementById('grafikBerat').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($who['usia']),
                                        datasets: [{
                                                label: '-2 SD (Bawah)',
                                                data: @json($who['-2sd']),
                                                borderColor: 'red',
                                                borderDash: [5, 5],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: 'Median WHO',
                                                data: @json($who['median']),
                                                borderColor: 'green',
                                                borderDash: [2, 2],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: '+2 SD (Atas)',
                                                data: @json($who['+2sd']),
                                                borderColor: 'orange',
                                                borderDash: [5, 5],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: 'Berat Badan Bayi',
                                                data: @json($berat),
                                                borderColor: 'blue',
                                                backgroundColor: 'blue',
                                                fill: false,
                                                lineTension: 0.4,
                                                pointRadius: 5
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        title: {
                                            display: true,
                                            text: 'Grafik Berat Badan Bayi vs Standar WHO'
                                        },
                                        scales: {
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Usia (bulan)'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Berat Badan (kg)'
                                                },
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        legend: {
                                            position: 'top'
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <canvas id="grafikTinggi"></canvas>

                            <script>
                                var ctx = document.getElementById('grafikTinggi').getContext('2d');
                                var chart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($who['usia']),
                                        datasets: [{
                                                label: '-2 SD (Bawah)',
                                                data: @json($who['-2sd']),
                                                borderColor: 'red',
                                                borderDash: [5, 5],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: 'Median WHO',
                                                data: @json($who['median']),
                                                borderColor: 'green',
                                                borderDash: [2, 2],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: '+2 SD (Atas)',
                                                data: @json($who['+2sd']),
                                                borderColor: 'orange',
                                                borderDash: [5, 5],
                                                fill: false,
                                                lineTension: 0.4
                                            },
                                            {
                                                label: 'Berat Badan Bayi',
                                                data: @json($berat),
                                                borderColor: 'blue',
                                                backgroundColor: 'blue',
                                                fill: false,
                                                lineTension: 0.4,
                                                pointRadius: 5
                                            }
                                        ]
                                    },
                                    options: {
                                        responsive: true,
                                        title: {
                                            display: true,
                                            text: 'Grafik Tinggi Badan Bayi vs Standar WHO'
                                        },
                                        scales: {
                                            xAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Usia (bulan)'
                                                }
                                            }],
                                            yAxes: [{
                                                scaleLabel: {
                                                    display: true,
                                                    labelString: 'Berat Badan (kg)'
                                                },
                                                ticks: {
                                                    beginAtZero: true
                                                }
                                            }]
                                        },
                                        legend: {
                                            position: 'top'
                                        }
                                    }
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
