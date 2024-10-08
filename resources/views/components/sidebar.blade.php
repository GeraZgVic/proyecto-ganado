    <div x-data="{ open: true }" class="flex">
        <aside x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform -translate-x-full"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform -translate-x-full"
            class="relative bg-sidebar h-screen w-[15rem] hidden sm:block ">

            <div class="flex justify-center py-3">
                <x-logo />
            </div>
            <nav class="text-white text-base font-semibold pt-3">
                <a href="{{ route('dashboard') }}"
                    class="text-sm font-Montserrat flex items-center text-white py-4 pl-6 nav-item-sidebar {{ Route::currentRouteName() == 'dashboard' ? 'active-nav-link' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
                    </svg>
                    Dashboard
                </a>

                {{-- Ganado Bovino --}}
                <div x-data="{ isActive: false, open: false }">
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="text-sm font-Montserrat flex items-center py-4 px-6 text-white transition-colors hover:bg-primary-100 nav-item-sidebar {{ Route::currentRouteName() == 'bovino.index' ? 'active-nav-link' : '' }}"
                        :class="{ 'bg-slate-700': isActive || open }" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg> --}}
                        <img src="{{ asset('img/vaca.png') }}" class="size-6" alt="icono-bovino">
                        <span class="ml-2 font-semibold">Ganado</span>
                        <span class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                        <a href="{{ route('bovino.index') }}" role="menuitem"
                            class="font-Montserrat block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-sky-200">
                            <span class="{{ Route::currentRouteName() == 'bovino.index' ? 'text-sky-200' : '' }}">Ver
                                Ganado Bovino</span>
                        </a>
                        {{-- <a href="{{route('upp.index')}}" role="menuitem"
                    class="font-Montserrat block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-sky-200">
                    <span class="{{Route::currentRouteName() == 'upp.index' ? 'text-sky-200' : ''}}">Agregar UPP</span>
                </a> --}}
                    </div>
                </div>
                {{-- Propietarios --}}
                <div x-data="{ isActive: false, open: false }">
                    <a href="#" @click="$event.preventDefault(); open = !open"
                        class="text-sm font-Montserrat flex items-center py-4 px-6 text-white transition-colors hover:bg-primary-100 nav-item-sidebar {{ Route::currentRouteName() == 'propietarios.index' ? 'active-nav-link' : '' }}"
                        :class="{ 'bg-slate-700': isActive || open }" role="button" aria-haspopup="true"
                        :aria-expanded="(open || isActive) ? 'true' : 'false'">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6 mr-3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                        <span class="ml-2 font-semibold">Propietarios</span>
                        <span class="ml-auto" aria-hidden="true">
                            <!-- active class 'rotate-180' -->
                            <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </span>
                    </a>
                    <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                        <a href="{{ route('propietarios.index') }}" role="menuitem"
                            class="font-Montserrat block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-sky-200">
                            <span
                                class="{{ Route::currentRouteName() == 'propietarios.index' ? 'text-sky-200' : '' }}">Ver
                                Propietarios</span>
                        </a>
                        <a href="{{ route('upp.index') }}" role="menuitem"
                            class="font-Montserrat block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-sky-200">
                            <span class="{{ Route::currentRouteName() == 'upp.index' ? 'text-sky-200' : '' }}">Agregar
                                UPP</span>
                        </a>
                    </div>
                </div>

                {{-- Razas --}}
                <a href="{{ route('razas.index') }}"
                    class="text-sm font-Montserrat flex items-center text-white py-4 pl-6 nav-item-sidebar {{ Route::currentRouteName() == 'razas.index' ? 'active-nav-link' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6 mr-3">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>

                    Razas
                </a>
            </nav>
        </aside>

        {{-- <button x-on:click="open = ! open">
            <span x-show="open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white bg-teal-500 hover:bg-teal-700 rounded-full">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                  </svg>                  
            </span>
            <span x-show="!open">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-white bg-gray-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                  </svg>                  
            </span>
        </button> --}}

        <button x-on:click="open = ! open" class="absolute z-20  hidden lg:inline-block mt-[1rem]">
            {{-- ARROW LEFT --}}
            <span x-show="open"
                class="relative left-[15rem] block bg-slate-800 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-600 rounded-full p-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
                </svg>

            </span>
            {{-- ARROW RIGHT --}}
            <span x-show="!open"
                class="block bg-slate-800 hover:bg-slate-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-600 rounded-full p-1.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-5 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m5.25 4.5 7.5 7.5-7.5 7.5m6-15 7.5 7.5-7.5 7.5" />
                </svg>
            </span>
        </button>
    </div>
