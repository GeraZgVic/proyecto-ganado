@extends('layouts.app')
@section('titulo', 'Ganado Bovino')

@section('contenido')
    <div class="bg-white py-6 px-4 rounded-md">
        <h2 class="text-center text-2xl font-bold uppercase my-4 font-Montserrat">Ganado Bovino</h2>
        <div
            class="inline-block uppercase text-white text-sm font-medium mb-4 mt-2">
            <livewire:agregar-ganado-bovino />                        
        </div>

        <livewire:mostrar-ganado-bovino />
    </div>
@endsection
