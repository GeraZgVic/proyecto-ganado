@extends('layouts.app')

    
@section('titulo', 'Dashboard')

@section('contenido')
<h2 class="text-3xl text-black pb-6">{{auth()->user()->name}}</h2>
@endsection