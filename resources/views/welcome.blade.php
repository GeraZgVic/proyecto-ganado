<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ArSite Ganado</title>
    @vite(['resources/js/app.js'])
</head>

<body class="selection:bg-black selection:text-white">
    <x-navbar />

    <div class="flex flex-col justify-center items-center space-y-6 h-screen">
        <h2 class="font-bold text-4xl">Sistema Integral de Ganadería</h2>
        <p class="text-2xl">Ar Site - Sistema en Construcción</p>
    </div>

</body>

</html>
