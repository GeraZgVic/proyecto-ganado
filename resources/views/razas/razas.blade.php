@extends('layouts.app')
@section('titulo', 'Razas')

@section('contenido')
    <div class="bg-white py-6 px-4 rounded-md">
        <h2 class="text-center text-2xl font-bold uppercase my-4">Razas</h2>
        <div
            class="text-white text-sm font-medium mb-4 mt-2">
            <livewire:agregar-raza />
        </div>
    
        <livewire:mostrar-razas />
    </div>
@endsection
