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

    <div class="flex flex-col justify-center items-center space-y-6">
        <h2 class="font-bold text-4xl">Sistema Integral de Ganadería</h2>
        <p class="text-2xl">Presentación</p>
        <p class="text-red-600 text-xl text-center">Prueba de cambios para el servidor desde Github :D</p>
        <p class="text-blue-600 text-xl text-center">Segunda prueba de cambios para el servidor desde Github :D</p>
    </div>

</body>

</html>
