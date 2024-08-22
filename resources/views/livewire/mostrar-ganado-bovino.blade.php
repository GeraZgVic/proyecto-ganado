<div>
    <x-alerta />
    <div class="flex flex-col lg:flex-row gap-4 justify-center items-center w-full">
        <div class="p-1 w-full">
            {{-- BUSCAR POR TERMINO --}}
            <input placeholder="Buscar por término"
                class="w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm"
                id="search" type="text" wire:model.live.debounce.150ms="search">
        </div>

        <div class="p-1 w-full">
            {{-- FILTRO POR PROPIETARIO --}}
            <select wire:model.live.debounce.150ms="propietario_id"
                class="w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm">
                <option value="">Todos los Propietarios</option>
                @foreach ($propietarios as $propietario)
                    <option value="{{ $propietario->id }}">{{ $propietario->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="p-1 w-full">
            {{-- FILTRO POR RAZA --}}
            <select wire:model.live.debounce.150ms="raza_id"
                class="p-2 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm">
                <option value="">Todas las Razas</option>
                @foreach ($razas as $raza)
                    <option value="{{ $raza->id }}">{{ $raza->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="p-1 w-full">
            {{-- FILTRO POR SEXO --}}
            <select wire:model.live.debounce.150ms="sexo_id"
                class="w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm">
                <option value="">Todos los Sexos</option>
                @foreach ($sexos as $sexo)
                    <option value="{{ $sexo->id }}">{{ $sexo->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center font-Montserrat">
                <tr>
                    <th scope="col" class="px-6 py-3">

                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id Interno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Propietario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Id Siniiga
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Nacimiento
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Raza
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Sexo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @php
                    function getColorById($id)
                    {
                        if ($id >= 100 && $id <= 199) {
                            return 'bg-blue-500';
                        } elseif ($id >= 500 && $id <= 599) {
                            return 'bg-white';
                        } elseif ($id >= 600 && $id <= 699) {
                            return 'bg-amber-500';
                        } elseif ($id >= 700 && $id <= 799) {
                            return 'bg-blue-700';
                        }
                        return 'bg-gray-500'; // Color por defecto
                    }
                @endphp
                @foreach ($bovinos as $bovino)
                    <tr class="bg-white border-b hover:bg-gray-50 text-center font-Montserrat"
                        wire:key="{{ $bovino->id }}">
                        <td scope="row" class="pl-6 py-4  text-gray-500 whitespace-nowrap">
                            <a href="{{ route('bovino.show', $bovino->id) }}">
                                <svg class="h-6 w-6 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" />
                                    <circle cx="12" cy="12" r="2" />
                                    <path d="M2 12l1.5 2a11 11 0 0 0 17 0l1.5 -2" />
                                    <path d="M2 12l1.5 -2a11 11 0 0 1 17 0l1.5 2" />
                                </svg>
                            </a>
                        </td>
                        <td scope="row"
                            class="{{ getColorById($bovino->id_interno) == 'bg-white' ? 'text-black' : 'text-white' }} whitespace-nowrap">
                            <span class="{{ getColorById($bovino->id_interno) }} px-2 py-1 rounded-full shadow-md">
                                {{ $bovino->id_interno }}
                            </span>
                        </td>
                        <td scope="row" class="px-2 py-4  text-gray-500 whitespace-nowrap">
                            {{ $bovino->nombre ?? 'Sin nombre' }}
                        </td>
                        <td scope="row" class="px-2 py-4  text-gray-500 whitespace-nowrap">
                            {{ $bovino->propietario->nombre }}
                        </td>
                        <td scope="row" class="px-2 py-4  text-gray-500 whitespace-nowrap">
                            {{ $bovino->id_siniiga ?? 'N/A' }}
                        </td>
                        <td scope="row" class="px-2 py-4 text-gray-500 whitespace-nowrap">
                            {{ $bovino->fecha_nacimiento ? \Carbon\Carbon::parse($bovino->fecha_nacimiento)->format('d-m-Y') : 'N/A' }}
                        </td>
                        <td scope="row" class="px-2 py-4  text-gray-500 whitespace-nowrap">
                            {{ $bovino->raza->nombre }}
                        </td>
                        <td scope="row" class="px-2 py-4  text-gray-500 whitespace-nowrap">
                            {{ $bovino->sexo->nombre }}
                        </td>


                        <td class="px-2 py-4 text-right flex justify-end gap-2">
                            {{-- Editar --}}
                            <livewire:editar-bovino id="{{ $bovino->id }}" :key="$bovino->id" />
                            {{-- Eliminar --}}
                            <button type="button" onclick="confirmDelete({{ $bovino->id }})"
                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm  text-gray-500 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-pink-200">
                                <span
                                    class="relative px-4 py-2 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-opacity-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-5 flex-shrink-0">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m6 4.125 2.25 2.25m0 0 2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                                    </svg>
                                </span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!$bovinos->count())
            <p class="text-sm my-4 text-gray-500 text-center">No se encuentra ningún registro...</p>
        @endif
    </div>

    <div class="mt-4">
        {{ $bovinos->links() }}
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const confirmDelete = (id) => {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Sí, eliminarlo'
        }).then((result) => {
            if (result.isConfirmed) {
                // Si el usuario confirma, envía una solicitud Delete al controlador
                fetch('/bovino/delete/' + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    // Redirige a la página después de la eliminación
                    window.location.href = '/ganado-bovino';

                }).catch(error => {
                    console.error('Error al eliminar el registro:', error)
                })
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.classList.add('alert-active');
            setTimeout(() => {
                alert.classList.remove('alert-active');
            }, 5000); // Duración de la animación en milisegundos
        }
    });
</script>
