<!-- Plantilla principal que extiende la estructura del layout -->
<x-app-layout>
    
    <!-- Slot de encabezado que se muestra en la parte superior del layout -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial Global de Sesiones') }}
        </h2>
    </x-slot>

    <!-- Contenedor principal con estilos responsivos -->
    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Caja blanca con sombra y borde redondeado -->
        <div class="bg-white shadow sm:rounded-lg p-6 overflow-auto">

            <!-- Tabla para mostrar los registros de sesiones -->
            <table class="table-auto w-full text-sm">

                <!-- Encabezado de la tabla -->
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2 border">Fecha y hora</th>
                        <th class="px-4 py-2 border">IP</th>
                        <th class="px-4 py-2 border">Método</th>
                        <th class="px-4 py-2 border">Navegador</th>
                        <th class="px-4 py-2 border">Usuario (ID)</th>
                    </tr>
                </thead>

                <!-- Cuerpo de la tabla -->
                <tbody>
                    
                    <!-- Directiva Blade: recorre la colección $logs -->
                    @forelse($logs as $log)
                        <tr>
                            <!-- Fecha y hora del registro, formateada -->
                            <td class="px-4 py-2 border">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                            
                            <!-- Dirección IP del usuario -->
                            <td class="px-4 py-2 border">{{ $log->ip_address }}</td>
                            
                            <!-- Método de inicio de sesión (ej: básico, Google, etc.) -->
                            <td class="px-4 py-2 border">{{ $log->login_method }}</td>
                            
                            <!-- Agente de usuario (navegador/dispositivo) -->
                            <td class="px-4 py-2 border">{{ $log->user_agent }}</td>
                            
                            <!-- ID del usuario que inició sesión -->
                            <td class="px-4 py-2 border">{{ $log->user_id }}</td>
                        </tr>
                    @empty
                        <!-- Caso en el que no hay registros -->
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center border">No hay registros aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Paginación de Laravel -->
            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
