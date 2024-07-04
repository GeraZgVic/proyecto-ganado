<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css'])
</head>

<body>
    <section
        class="h-[100vh] bg-[url(https://images.unsplash.com/photo-1698592575303-a608cd01ecb3?q=80&w=1806&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)] bg-cover bg-center bg-fixed">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0 bg-black/60 w-full h-full">
            <a href="{{route('home')}}" class="flex items-center mb-6 text-2xl font-semibold text-gray-200 ">
                <x-logo />
            </a>
            <div class="w-full bg-transparent rounded-lg shadow  md:mt-0 sm:max-w-md xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-200 md:text-2xl text-center">
                        Inicio de Sesión
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login') }}" method="POST" novalidate>
                        @csrf
                        @if (session('mensaje'))
                            <div class="p-4 mb-4 text-sm py-2 text-red-800 rounded-lg bg-red-50"
                                role="alert">
                                <span class="font-medium">Error!</span> {{ session('mensaje') }}
                            </div>
                        @endif

                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-200 ">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-200 border text-gray-700 sm:text-sm 
                                rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 @error('email') border-red-400 @enderror"
                                placeholder="name@correo.com">
                            @error('email')
                            <div class="m-2 mb-4 text-sm text-center bg-red-100 py-2 text-red-800 rounded-lg" role="alert">
                                <span class="font-medium"></span> {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-200 ">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-200 border text-gray-700 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 @error('password') border-red-400 @enderror"">
                            @error('password')
                            <div class="m-2 mb-4 text-sm text-center bg-red-100 py-2 text-red-800 rounded-lg" role="alert">
                                <span class="font-medium"></span> {{$message}}
                            </div>
                            @enderror
                        </div>

                        <button type="submit"
                            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Iniciar
                            Sesión</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
