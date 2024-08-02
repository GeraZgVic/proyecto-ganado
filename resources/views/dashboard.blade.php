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

        </div>
    </div>

@endsection
