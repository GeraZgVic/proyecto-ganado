<div x-data="{ modalIsOpen: false }" class="relative w-auto">
    <button @click="modalIsOpen = true" type="button"
        class="inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200">
        <span class="relative px-4 py-2 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </span>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="flex flex-col gap-4 rounded-xl border border-slate-300 bg-white text-slate-700 w-full h-[95vh] overflow-auto max-w-xl">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-4">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black">Editar Bovino</h3>
                <button @click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form wire:submit="update" class="p-4">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-2">
                    {{-- Información básica --}}
                    <h2 class="text-xs text-start text-gray-400 lg:col-span-2">Información Básica</h2>
                    <div>
                        <label for="nombre" class="block text-sm font-medium mb-2 text-start">Nombre Bovino</label>
                        <input wire:model="nombre" id="nombre"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Nombre del bovino">
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>
                    <div>
                        <label for="estatus_genetico" class="block text-sm font-medium mb-2 text-start">Estatus
                            Genético</label>

                        <select wire:model="estatus_genetico" id="estatus_genetico"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option value="">Selecciona una opción</option>
                            <option value="Ninguno">Ninguno</option>
                            <option value="Semental">Semental</option>
                            <option value="Vacía">Vacía</option>
                            <option value="Preñada">Preñada</option>
                            <option value="Donadora">Donadora</option>
                            <option value="Receptora">Receptora</option>
                        </select>

                        <x-input-error :messages="$errors->get('estatus_genetico')" class="mt-2" />
                    </div>

                    <div>
                        <label for="fecha_nacimiento" class="block text-sm font-medium mb-2 text-start">Fecha de
                            nacimiento</label>
                        <input wire:model="fecha_nacimiento" id="fecha_nacimiento"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="date">
                        <x-input-error :messages="$errors->get('fecha_nacimiento')" class="mt-2" />
                    </div>


                    {{-- Registrar peso ? --}}

                    <div>
                        <label for="fecha_destete" class="block text-sm font-medium mb-2 text-start">Fecha
                            destete</label>
                        <input wire:model="fecha_destete" id="fecha_destete"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="date">
                        <x-input-error :messages="$errors->get('fecha_destete')" class="mt-2" />
                    </div>

                    {{-- PARENTESCO --}}
                    <h2 class="text-xs text-start text-gray-400 lg:col-span-2">Parentesco</h2>
                    <div>
                        <label for="madre_id_interno" class="block text-sm font-medium mb-2 text-start">ID
                            Madre</label>
                        <input wire:model="madre_id_interno" id="madre_id_interno"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="ID Madre">
                        <x-input-error :messages="$errors->get('madre_id_interno')" class="mt-2" />
                    </div>
                    <div>
                        <label for="padre_id_interno" class="block text-sm font-medium mb-2 text-start">ID
                            Padre</label>
                        <input wire:model="padre_id_interno" id="padre_id_interno"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="ID padre">
                        <x-input-error :messages="$errors->get('padre_id_interno')" class="mt-2" />
                    </div>
                    {{-- Identificación --}}
                    <h2 class="text-xs text-start text-gray-400 lg:col-span-2">Identificación</h2>
                    <div>
                        <label for="id_interno" class="block text-sm font-medium mb-2 text-start">Id Interno</label>
                        <input wire:model="id_interno" id="id_interno"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Id Interno del bovino">
                        <x-input-error :messages="$errors->get('id_interno')" class="mt-2" />
                    </div>

                    <div>
                        <label for="id_siniiga" class="block text-sm font-medium mb-2 text-start">Id Siniiga</label>
                        <input wire:model="id_siniiga" id="id_siniiga"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="ID Siniiga">
                        <x-input-error :messages="$errors->get('id_siniiga')" class="mt-2" />
                    </div>

                    {{-- Campos foráneos --}}
                    <div>
                        <label for="raza_id" class="block text-sm font-medium mb-2 text-start">Raza</label>
                        <select id="raza_id" wire:model="raza_id"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option>Seleccionar Raza</option>
                            @foreach ($razas as $raza)
                                <option value="{{ $raza->id }}">{{ $raza->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('raza_id')" class="mt-2" />
                    </div>
                    <div>
                        <label for="sexo_id" class="block text-sm font-medium mb-2 text-start">Sexo</label>
                        <select id="sexo_id" wire:model="sexo_id"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option>Seleccionar Sexo</option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->id }}">{{ $sexo->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('sexo_id')" class="mt-2" />
                    </div>



                    <div>
                        <label for="propietario_id"
                            class="block text-sm font-medium mb-2 text-start">Propietario</label>
                        <select id="propietario_id" wire:model="propietario_id"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option>Seleccionar Propietario</option>
                            @foreach ($propietarios as $propietario)
                                <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('propietario_id')" class="mt-2" />
                    </div>

                    <div>
                        <label for="upp_id" class="block text-sm font-medium mb-2 text-start">Predio</label>
                        <select id="upp_id" wire:model="upp_id"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option>Seleccionar Predio</option>
                            @foreach ($upps as $upp)
                                <option value="{{ $upp->id }}">{{ $upp->predio }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('upp_id')" class="mt-2" />
                    </div>
                </div>

                {{-- Estatus comercio --}}
                <div x-data="{ selectedOption: $wire.entangle('estatus_comercio_id') }" class="">
                    <div>
                        <label for="estatus_comercio_id" class="block text-sm font-medium mb-2 text-start">Estatus
                            Comercio (Tipo)</label>
                        <select id="estatus_comercio_id" wire:model="estatus_comercio_id"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200">
                            <option>Seleccionar Tipo</option>
                            @foreach ($estatusComercios as $estatusComercio)
                                <option value="{{ $estatusComercio->id }}">{{ $estatusComercio->tipo_ganado }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('estatus_comercio_id')" class="mt-2" />
                    </div>

                    <div x-show="selectedOption === '1'">
                        <label for="id_registro" class="block text-sm font-medium mb-2 text-start">ID
                            Registro</label>
                        <input wire:model="id_registro" id="id_registro"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Id Registro">
                        <x-input-error :messages="$errors->get('id_registro')" class="mt-2" />
                    </div>
                </div>

                <div class="mt-3">
                    <h2 class="text-xs text-start text-gray-400 lg:col-span-2">Pesos registrados</h2>
                    <div class="mt-4 grid lg:grid-cols-3 gap-3">
                        <div>
                            <label for="peso_al_nacer" class="block text-sm font-medium mb-2 text-start">Peso al
                                Nacer (kg):</label>
                            <input wire:model="peso_al_nacer" id="peso_al_nacer"
                                wire:dirty.class="border-green-500 focus:border-green-500"
                                class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                                type="number" step="0.01" min="0">
                            <x-input-error :messages="$errors->get('peso_al_nacer')" class="mt-2" />
                        </div>

                        <div>
                            <label for="peso_al_destete" class="block text-sm font-medium mb-2 text-start">Peso al
                                destete (kg):</label>
                            <input wire:model="peso_al_destete" id="peso_al_destete"
                                wire:dirty.class="border-green-500 focus:border-green-500"
                                class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                                type="number" step="0.01" min="0">
                            <x-input-error :messages="$errors->get('peso_al_destete')" class="mt-2" />
                        </div>

                        <div>
                            <label for="peso_al_year" class="block text-sm font-medium mb-2 text-start">Peso al año
                                (kg):</label>
                            <input wire:model="peso_al_year" id="peso_al_year"
                                wire:dirty.class="border-green-500 focus:border-green-500"
                                class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                                type="number" step="0.01" min="0">
                            <x-input-error :messages="$errors->get('peso_al_year')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center sm:justify-end mt-4">
                    <button type="submit"
                        class="bg-green-500 w-full sm:w-auto hover:bg-green-600 text-white font-medium py-2 px-4 rounded focus:outline-none focus:ring focus:ring-green-200">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
