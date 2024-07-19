@extends('layouts.app')

@section('titulo')
    Bovino | {{ $bovino->nombre }}
@endsection

@section('contenido')
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-cover bg-center h-[25rem] p-4"
            style="background-image: url({{ $bovino->imagen ?? 'https://images.unsplash.com/photo-1530268782463-418534b0affa?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }});">
            <div class="flex justify-end">
                <span class="bg-blue-900 text-white text-xs font-semibold tracking-wide uppercase rounded-full px-2 py-1">ID:
                    {{ $bovino->id_interno }}</span>
            </div>
        </div>
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $bovino->nombre }}</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-semibold text-gray-600">Estatus Genético</p>
                    <p class="text-lg text-gray-900">{{ $bovino->estatus_genetico }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Fecha Nacimiento</p>
                    <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($bovino->fecha_nacimiento)->format('d-m-Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Fecha Destete</p>
                    <p class="text-lg text-gray-900">{{ \Carbon\Carbon::parse($bovino->fecha_destete)->format('d-m-Y') }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">ID Siniiga</p>
                    <p class="text-lg text-gray-900">{{ $bovino->id_siniiga }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">ID Registro</p>
                    <p class="text-lg text-gray-900">{{ $bovino->id_registro }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Raza</p>
                    <p class="text-lg text-gray-900">{{ $bovino->raza->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Sexo</p>
                    <p class="text-lg text-gray-900">{{ $bovino->sexo->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Propietario</p>
                    <p class="text-lg text-gray-900">{{ $bovino->propietario->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Estatus Comercio</p>
                    <p class="text-lg text-gray-900">{{ $bovino->estatusComercio->tipo_ganado }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Madre</p>
                    <p class="text-lg text-gray-900">{{ $bovino->madre ? $bovino->madre->nombre : 'Sin madre' }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Padre</p>
                    <p class="text-lg text-gray-900">{{ $bovino->padre ? $bovino->padre->nombre : 'Sin padre' }}</p>
                </div>
                <div class="sm:col-span-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">Hijos</p>
                    @php
                     // Combina ambas relaciones (padreHijo y madreHijo) en una colección única
                        $hijos = $bovino->padreHijo->merge($bovino->madreHijo);
                    @endphp
                    @if ($hijos->isEmpty())
                        <p class="text-lg text-gray-900">Sin hijos</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($hijos as $hijo)
                                <div class="bg-gray-100 p-4 rounded-lg shadow">
                                    <p class="text-lg font-bold text-gray-800">{{ $hijo->nombre }}</p>
                                    <p class="text-sm text-gray-600">Fecha de Nacimiento: {{ \Carbon\Carbon::parse($hijo->fecha_nacimiento)->format('d-m-Y') }}</p>
                                    <p class="text-sm text-gray-600">Raza: {{ $hijo->raza->nombre }}</p>
                                    <a href="{{ route('bovino-show.index', $hijo->id) }}" class="text-blue-500 hover:text-blue-700 mt-2 inline-block">Ver más</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
@endsection
