<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="flex justify-center py-3">
        <x-logo />
    </div>
    <nav class="text-white text-base font-semibold pt-3">
        <a href="{{route('dashboard')}}" class="flex items-center text-white py-4 pl-6 nav-item-sidebar {{ Route::currentRouteName() == 'dashboard' ? 'active-nav-link' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5M9 11.25v1.5M12 9v3.75m3-6v6" />
              </svg>
            Dashboard
        </a>
        <a href="{{route('razas.index')}}" class="flex items-center text-white py-4 pl-6 nav-item-sidebar {{Route::currentRouteName() == 'razas.index' ? 'active-nav-link' : ''}}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
              
            Razas
        </a>
        <div x-data="{ isActive: false, open: false }">
            <a href="#" @click="$event.preventDefault(); open = !open"
                class="flex items-center py-4 px-6 text-white transition-colors hover:bg-primary-100 nav-item-sidebar {{Route::currentRouteName() == 'propietarios.index' ? 'active-nav-link': ''}}"
                :class="{ 'bg-teal-400': isActive || open }" role="button" aria-haspopup="true"
                :aria-expanded="(open || isActive) ? 'true' : 'false'">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 mr-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                  </svg>                         
                <span class="ml-2 text-base font-semibold">Propietarios</span>
                <span class="ml-auto" aria-hidden="true">
                    <!-- active class 'rotate-180' -->
                    <svg class="w-4 h-4 transition-transform transform" :class="{ 'rotate-180': open }"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </span>
            </a>
            <div role="menu" x-show="open" class="mt-2 space-y-2 px-7" aria-label="Dashboards">
                <a href="{{route('propietarios.index')}}" role="menuitem"
                    class="block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-emerald-200 {{Route::currentRouteName() == 'propietarios.index' ? 'text-emerald-200' : ''}}">
                    Ver Propietarios
                </a>
                <a href="{{route('upp.index')}}" role="menuitem"
                    class="block p-2 text-sm text-gray-100 transition-colors duration-200 rounded-md hover:text-emerald-200 {{Route::currentRouteName() == 'upp.index' ? 'text-emerald-200' : ''}}">
                    Agregar UPP
                </a>
            </div>
        </div>
    </nav>

</aside>