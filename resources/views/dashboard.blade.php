{{-- Usamos el layout principal de la aplicación --}}
<x-app-layout>
    
    {{-- Slot para el encabezado del panel --}}
    <x-slot name="header">
        <h1 class="text-3xl font-bold text-gray-900">Panel de Control</h1>
    </x-slot>

    {{-- Tarjetas con estadísticas principales --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        
        {{-- Tarjeta: Total de Vehículos --}}
        <div class="bg-white shadow rounded-lg p-6 flex flex-col">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total de Vehículos</h3>
            <p class="text-4xl font-extrabold text-indigo-600">{{ $totalVehiculos }}</p>
            <p class="mt-1 text-gray-500">Registrados en el sistema</p>
        </div>

        {{-- Tarjeta: Vehículos Disponibles --}}
        <div class="bg-white shadow rounded-lg p-6 flex flex-col">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Vehículos Disponibles</h3>
            <p class="text-4xl font-extrabold text-green-600">{{ $vehiculosDisponibles }}</p>
            <p class="mt-1 text-gray-500">Listos para la venta</p>
        </div>

        {{-- Tarjeta: Vehículos Vendidos --}}
        <div class="bg-white shadow rounded-lg p-6 flex flex-col">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Vehículos Vendidos</h3>
            <p class="text-4xl font-extrabold text-red-600">{{ $vehiculosVendidos }}</p>
            <p class="mt-1 text-gray-500">Ya vendidos a clientes</p>
        </div>
    </div>

    {{-- Sección con la tabla de últimos vehículos registrados --}}
    <div class="bg-white shadow rounded-lg p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-4">Últimos Vehículos Registrados</h3>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                {{-- Encabezados de la tabla --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Modelo</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Año</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometraje</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                    </tr>
                </thead>

                {{-- Cuerpo de la tabla --}}
                <tbody class="divide-y divide-gray-200">
                    
                    {{-- Recorremos los últimos vehículos enviados por el controlador --}}
                    @forelse($ultimosVehiculos as $vehiculo)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->marca }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->modelo }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->anio }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">Q{{ number_format($vehiculo->precio, 2) }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->estado }}</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->kilometraje }} km</td>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $vehiculo->color }}</td>
                        </tr>
                    @empty
                        {{-- Si no hay vehículos registrados, mostramos un mensaje --}}
                        <tr>
                            <td colspan="7" class="px-4 py-4 text-center text-gray-500">
                                No hay vehículos registrados.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
