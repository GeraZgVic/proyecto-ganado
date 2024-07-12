<div x-data="{modalIsOpen: false}" class="relative w-auto">
    <button @click="modalIsOpen = true" type="button" class="inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200">
        <span class="relative px-4 py-2 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-5 flex-shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
            </svg>
        </span>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog --> 
        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" class="flex flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700 w-full max-w-xl">                 
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-4">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black">Editar raza</h3>
                <button @click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <form wire:submit='update' class="p-4">
                <div class="grid lg:grid-cols-2 gap-2">
                    <div>
                        <label for="nombre" class="block text-sm font-medium mb-2 text-start">Nombre(s)</label>
                        <input wire:model="nombre" id="nombre"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Nombre">
                        <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
                    </div>

                    <div>
                        <label for="apellido_paterno" class="block text-sm font-medium mb-2 text-start">Apellido Paterno</label>
                        <input wire:model="apellido_paterno" id="apellido_paterno"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Apellido paterno">
                        <x-input-error :messages="$errors->get('apellido_paterno')" class="mt-2" />
                    </div>
                    <div>
                        <label for="apellido_materno" class="block text-sm font-medium mb-2 text-start">Apellido Materno</label>
                        <input wire:model="apellido_materno" id="apellido_materno"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Ingrese el apellido_materno de la raza">
                        <x-input-error :messages="$errors->get('apellido_materno')" class="mt-2" />
                    </div>
                    <div>
                        <div>
                            <label for="upp" class="block text-sm font-medium mb-2 text-start">Unidad de producción pecuaria (UPP)</label>
                            <select 
                                wire:model='upp_id' 
                                id="upp" wire:dirty.class='border-green-500 focus:border-green-500'
                                class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 
                                px-3 focus:outline-none focus:ring focus:ring-green-200">
                                <option>Seleccione el UPP</option>
                                @foreach ($upps as $upp)
                                    <option value="{{$upp->id}}">{{$upp->clave_upp}}</option>
                                @endforeach
                            </select>
                            
                            <x-input-error :messages="$errors->get('upp_id')" class="mt-2" />
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