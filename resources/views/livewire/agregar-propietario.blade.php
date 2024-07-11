<div x-data="{ modalIsOpen: false }" class="relative w-auto">
    <button @click="modalIsOpen = true" type="button"
        class="inline-flex items-center justify-center gap-x-2 py-2.5 px-4 me-2 focus:outline-none bg-green-500 rounded-lg border border-green-300 hover:bg-green-600 hover:text-gray-200 focus:z-10 focus:ring-4 focus:ring-green-200 uppercase">
        Agregar
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
    </button>
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        @keydown.esc.window="modalIsOpen = false" @click.self="modalIsOpen = false"
        class="fixed inset-0 z-30 flex items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            class="flex flex-col gap-4 overflow-hidden rounded-xl border border-slate-300 bg-white text-slate-700 w-full max-w-2xl">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-slate-300 bg-slate-100/60 p-4">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-black">Agregar propietario</h3>
                <button @click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form wire:submit='save' class="p-4">
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
                        <label for="upp" class="block text-sm font-medium mb-2 text-start">Unidad de producción pecuaria (UPP)</label>
                        <input wire:model="upp" id="upp"
                            wire:dirty.class="border-green-500 focus:border-green-500"
                            class="w-full border border-gray-100 rounded-md shadow-sm text-sm py-2 px-3 focus:outline-none focus:ring focus:ring-green-200"
                            type="text" placeholder="Ingrese el upp">
                        <x-input-error :messages="$errors->get('upp')" class="mt-2" />
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
