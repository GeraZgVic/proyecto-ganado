@extends('layouts.app')
@section('titulo', 'Unidad de Producción Pecuaria')

@section('contenido')
    <div class="bg-white py-6 px-4 rounded-md">
        <h2 class="font-Montserrat text-3xl font-bold pb-6 bg-gradient-to-r from-slate-500 to-slate-800 bg-clip-text text-transparent text-center">Unidad de Producción Pecuaria (UPP) </h2>
        <div
            class="inline-block uppercase text-white text-sm font-medium mb-4 mt-2">
            <livewire:agregar-upp />                        
        </div>
        
        <livewire:mostrar-upp />
    </div>
@endsection
