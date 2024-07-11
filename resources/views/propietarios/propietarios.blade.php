@extends('layouts.app')
@section('titulo', 'Propietarios')

@section('contenido')
    <div class="bg-white py-6 px-4 rounded-md">
        <h2 class="text-center text-2xl font-bold uppercase my-4">Propietarios</h2>
        <div
            class="inline-block uppercase text-white text-sm font-medium mb-4 mt-2">
            <livewire:agregar-propietario />                        
        </div>


        <livewire:mostrar-propietarios />
    </div>
@endsection
