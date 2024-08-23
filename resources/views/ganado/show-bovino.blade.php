@extends('layouts.app')

@section('titulo')
    Bovino | {{ $bovino->nombre ?? 'Sin nombre' }}
@endsection

@section('contenido')
    <div class="max-w-4xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-cover bg-center h-[25rem] p-4"
            style="background-image: url({{ $bovino->imagen ?? 'https://images.unsplash.com/photo-1530268782463-418534b0affa?q=80&w=2074&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }});">
            <div class="flex justify-end">
                <span
                    class="{{ $colorClass }} {{ $colorClass == 'bg-white' ? 'text-black' : 'text-white' }} text-base font-semibold tracking-wide uppercase rounded-full px-2 py-1">ID:
                    {{ $bovino->id_interno }}</span>
            </div>
        </div>


        <div class="p-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800">{{ $bovino->nombre ?? 'Sin nombre' }}</h2>
                <span class="text-sm text-gray-500">Agregado {{$bovino->created_at->diffForHumans()}}</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-semibold text-gray-600">Etapa</p>
                    <p class="text-base text-gray-900">{{ $bovino->etapa ?? 'Sin etapa' }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Predio</p>
                    <p class="text-base text-gray-900">{{ $bovino->upp->predio ?? 'Sin predio' }}</p>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-600">Estatus Genético</p>
                    <p class="text-base text-gray-900">{{ $bovino->estatus_genetico ?? 'Sin estatus' }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Propietario</p>
                    <p class="text-base text-gray-900">{{ $bovino->propietario->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Fecha Nacimiento</p>
                    <p class="text-base text-gray-900">
                        {{ $bovino->fecha_nacimiento ? \Carbon\Carbon::parse($bovino->fecha_nacimiento)->format('d-m-Y') : 'N/A' }}
                    </p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Fecha Destete</p>
                    <p class="text-base text-gray-900">
                        {{ $bovino->fecha_destete ? \Carbon\Carbon::parse($bovino->fecha_destete)->format('d-m-Y') : 'N/A' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-semibold text-gray-600">ID Siniiga</p>
                    <p class="text-base text-gray-900">{{ $bovino->id_siniiga ?? 'S/ID'  }}</p>
                </div>

                @if ($bovino->id_registro)
                    <div>
                        <p class="text-sm font-semibold text-gray-600">ID Registro</p>
                        <p class="text-base text-gray-900">{{ $bovino->id_registro }}</p>
                    </div>
                @endif

                <div>
                    <p class="text-sm font-semibold text-gray-600">Raza</p>
                    <p class="text-base text-gray-900">{{ $bovino->raza->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Sexo</p>
                    <p class="text-base text-gray-900">{{ $bovino->sexo->nombre }}</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Estatus Comercio</p>
                    <p class="text-base text-gray-900">{{ $bovino->estatusComercio->tipo_ganado }}</p>
                </div>

                {{-- NUEVOS REGISTROS --}}
                <div>
                    <p class="text-sm font-semibold text-gray-600">Peso al nacer</p>
                    <p class="text-base text-gray-900">{{ $bovino->peso_al_nacer ?? 'S/P'}} Kg</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Peso al destete</p>
                    <p class="text-base text-gray-900">{{ $bovino->peso_al_nacer ?? 'S/P'}} Kg</p>
                </div>
                <div>
                    <p class="text-sm font-semibold text-gray-600">Peso al año</p>
                    <p class="text-base text-gray-900">{{ $bovino->peso_al_year ?? 'S/P' }} Kg</p>
                </div>



                <div class="sm:col-span-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">Hijos</p>
                    @php
                        // Combina ambas relaciones (padreHijo y madreHijo) en una colección única
                        $hijos = $bovino->padreHijo->merge($bovino->madreHijo);
                    @endphp
                    @if ($hijos->isEmpty())
                        <p class="text-base text-gray-900">Sin hijos</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach ($hijos as $hijo)
                                <div class="bg-gray-100 p-4 rounded-lg shadow">
                                    <p class="text-base font-bold text-gray-800">{{ $hijo->nombre }}</p>
                                    <p class="text-sm text-gray-600">Fecha de Nacimiento:
                                        {{ \Carbon\Carbon::parse($hijo->fecha_nacimiento)->format('d-m-Y') }}</p>
                                    <p class="text-sm text-gray-600">Raza: {{ $hijo->raza->nombre }}</p>
                                    <a href="{{ route('bovino.show', $hijo->id) }}"
                                        class="text-blue-500 hover:text-blue-700 mt-2 inline-block">Ver más</a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-4 p-4">
            {{-- Información de la Madre --}}
            @if ($bovino->madre)
                <div class="space-y-1">
                    <p class="text-sm font-semibold text-gray-800">Madre</p>
                    <p class="text-base text-gray-800">{{ $bovino->madre->nombre }}</p>
                    <a href="{{ route('bovino.show', $bovino->madre->id) }}">
                        <img class="w-full h-auto rounded-md mt-2 transition duration-150 hover:scale-105"
                            src="{{ $bovino->madre->imagen ?? 'https://definicion.de/wp-content/uploads/2015/02/vaca-1.jpg' }}"
                            alt="Imagen de la madre">
                    </a>

                </div>
            @endif

            {{-- Información del Padre --}}
            @if ($bovino->padre)
                <div class="space-y-1">
                    <p class="text-sm font-semibold text-gray-800">Padre</p>
                    <p class="text-base text-gray-800">{{ $bovino->padre->nombre }}</p>
                    <a href="{{ route('bovino.show', $bovino->padre->id) }}">
                        <img class="w-full h-auto rounded-md mt-2 transition duration-150 hover:scale-105"
                            src="{{ $bovino->padre->imagen ?? 'https://as1.ftcdn.net/v2/jpg/02/50/64/86/1000_F_250648617_7wyDhQA4bfHk9eZum62DYmSL7lvetmuq.jpg' }}"
                            alt="Imagen del padre">
                    </a>

                </div>
            @endif
        </div>
    </div>
@endsection
