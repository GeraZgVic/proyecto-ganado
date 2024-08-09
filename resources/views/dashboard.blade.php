@extends('layouts.app')


@section('titulo', 'Dashboard')

@section('contenido')
    <div class="container px-8 mx-auto">

        <h2 class="text-3xl text-black pb-6">Dashboard</h2>

        <div class="grid grid-cols-2 gap-10">

            <div class="flex items-center justify-between p-4 bg-white rounded-md">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Ganado Bovino
                    </h6>
                    <span class="text-xl font-semibold">{{ $bovinos ? $bovinos->count() : 'Sin ganado' }}</span>

                </div>
                <div>
                    <img src="{{ asset('img/vaca.png') }}" class="w-12 h-12" alt="icono-bovino">
                </div>
            </div>
            <div class="flex items-center justify-between p-4 bg-white rounded-md">
                <div>
                    <h6
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Propietarios
                    </h6>
                    <span
                        class="text-xl font-semibold">{{ $propietarios ? $propietarios->count() : 'Sin propietarios' }}</span>

                </div>
                <div>
                    <span>
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
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Predios
                    </h6>
                    <span class="text-xl font-semibold">{{ $upps ? $upps->count() : 'Sin predios' }}</span>

                </div>
                <div>
                    <span>
                        <svg class="h-12 w-12 text-gray-300" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                        class="text-xs font-medium leading-none tracking-wider text-gray-500 uppercase dark:text-primary-light">
                        Razas
                    </h6>
                    <span class="text-xl font-semibold">{{ $razas ? $razas->count() : 'Sin razas' }}</span>

                </div>
                <div>
                    <img src="{{ asset('img/razas.png') }}" class="w-12 h-12" alt="icono-razas">
                </div>
            </div>

        </div>
    </div>

@endsection
