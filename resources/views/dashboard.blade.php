@extends('layouts.app')


@section('titulo', 'Dashboard')

@section('contenido')
    <div class="container lg:px-8 mx-auto">
        <h2 class="font-Montserrat text-3xl font-bold pb-6 bg-gradient-to-r from-slate-500 to-slate-800 bg-clip-text text-transparent">Dashboard</h2>

        <div class="grid grid-cols-2 gap-3 lg:gap-10">
            <div class="flex items-center justify-between p-4 bg-white rounded-md">
                <div>
                    <h6
                        class="font-Montserrat text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                        Ganado Bovino
                    </h6>
                    <span class="text-xl font-semibold font-Montserrat">{{ $bovinos ? $bovinos->count() : 'Sin ganado' }}</span>

                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('img/vaca.png') }}" class="w-12 h-12" alt="icono-bovino">
                </div>
            </div>
            <div class="flex items-center justify-between p-4 w-full bg-white rounded-md">
                <div>
                    <h6
                        class="font-Montserrat text-xs font-medium leading-none tracking-wider text-gray-500 uppercase">
                        Propietarios
                    </h6>
                    <span
                        class="text-xl font-semibold font-Montserrat">{{ $propietarios ? $propietarios->count() : 'Sin propietarios' }}</span>
                </div>
                <div>
                    <span class="hidden lg:block">
                        <svg class="w-12 h-12 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-white rounded-md">
                <div>
                    <h6
                        class="font-Montserrat text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Predios
                    </h6>
                    <span class="text-xl font-semibold font-Montserrat">{{ $upps ? $upps->count() : 'Sin predios' }}</span>

                </div>
                <div>
                    <span class="hidden lg:block">
                        <svg class="h-12 w-12 text-gray-300" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <line x1="4" y1="19" x2="20" y2="19" />
                            <polyline points="4 15 8 9 12 11 16 6 20 10 20 15 4 15" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-white rounded-md">
                <div>
                    <h6
                        class="font-Montserrat text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Razas
                    </h6>
                    <span class="text-xl font-semibold font-Montserrat">{{ $razas ? $razas->count() : 'Sin razas' }}</span>

                </div>
                <div class="hidden lg:block">
                    <img src="{{ asset('img/razas.png') }}" class="w-12 h-12" alt="icono-razas">
                </div>
            </div>

        </div>
        <div class="bg-white shadow-md rounded-lg lg:p-6 mt-4 w-full" style="height: 400px;">
            <canvas id="etapasChart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   
    <script>
        var ctx = document.getElementById('etapasChart').getContext('2d');
        var etapasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lactante hembra', 'Lactante macho', 'Becerro hembra', 'Becerro macho', 'Vaquilla', 'Novillo', 'Vaca', 'Toro'],
                datasets: [{
                    label: 'Cantidad de animales',
                    data: [
                        {{ $etapas['Lactante hembra'] }},
                        {{ $etapas['Lactante macho'] }},
                        {{ $etapas['Becerro hembra'] }},
                        {{ $etapas['Becerro macho'] }},
                        {{ $etapas['Vaquilla'] }},
                        {{ $etapas['Novillo'] }},
                        {{ $etapas['Vaca'] }},
                        {{ $etapas['Toro'] }}
                    ],
                    backgroundColor: [
                        '#0e7490',
                        '#0e7490',
                        '#0e7490',
                        '#0e7490',
                        '#0e7490',
                        '#0e7490',
                        '#0e7490',
                        '#0e7490'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 205, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 2,
                    hoverBackgroundColor: [
                        'rgba(75, 192, 192, 0.4)',
                        'rgba(54, 162, 235, 0.4)',
                        'rgba(255, 206, 86, 0.4)',
                        'rgba(153, 102, 255, 0.4)',
                        'rgba(255, 159, 64, 0.4)',
                        'rgba(255, 99, 132, 0.4)',
                        'rgba(255, 205, 86, 0.4)',
                        'rgba(75, 192, 192, 0.4)'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(200, 200, 200, 0.3)'
                        },
                        ticks: {
                            color: '#4B5563',
                            font: {
                                size: window.innerWidth < 768 ? 12 : 14
                            }
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#4B5563',
                            font: {
                                size: window.innerWidth < 768 ? 12 : 14
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#374151',
                            font: {
                                size: window.innerWidth < 768 ? 14 : 16
                            }
                        }
                    }
                }
            }
        });
    </script>

@endsection
