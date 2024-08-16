<div>
    <x-alerta />

    <div class='mb-2 flex p-1'>
        {{-- BUSCAR POR TERMINO --}}

        <input placeholder="Buscar por termino"
            class="w-full p-2 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-md text-sm"
            id="search" type="text" wire:model.live="search">

    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nombre
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Paterno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Apellido Materno
                    </th>
                    <th scope="col" class="px-6 py-3">
                        UPP
                    </th>
                    <th scope="col" class="px-12 py-3 text-right">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($propietarios as $propietario)
                    <tr class="bg-white border-b" wire:key="propietario-{{ $propietario->id }}">
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $propietario->nombre }}

                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $propietario->apellido_paterno }}
                        </td>
                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                            {{ $propietario->apellido_materno }}
                        </td>
                        </td>
                        <td class="px-6 py-4">
                            {{ $propietario->upp ? $propietario->upp->clave_upp : 'Sin clave upp' }}
                        </td>
                        <td class="px-6 py-4 flex justify-end gap-x-2">
                            <livewire:editar-propietario :id="$propietario->id" :key="$propietario->id" />
                            {{-- Eliminar --}}
                            <button type="button" onclick="confirmDelete({{ $propietario->id }})"
                                class="relative inline-flex items-center justify-center p-0.5 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-pink-500 to-orange-400 group-hover:from-pink-500 group-hover:to-orange-400 hover:text-white focus:ring-4 focus:outline-none focus:ring-pink-200">
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

                @empty
                    <tr>
                        <td colspan="2" class="px-6 py-4 text-right text-gray-400">
                            No se encontró resultados...
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $propietarios->links() }}
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
                fetch('/propietario/delete/' + id, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }).then(response => {
                    // Redirige a la página después de la eliminación
                    window.location.href = '/propietarios';

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
