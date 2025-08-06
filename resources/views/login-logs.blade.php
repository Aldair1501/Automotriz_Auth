<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial Global de Sesiones') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow sm:rounded-lg p-6 overflow-auto">
            <table class="table-auto w-full text-sm">
                <thead class="bg-gray-100 text-left">
                    <tr>
                        <th class="px-4 py-2 border">Fecha y hora</th>
                        <th class="px-4 py-2 border">IP</th>
                        <th class="px-4 py-2 border">Método</th>
                        <th class="px-4 py-2 border">Navegador</th>
                        <th class="px-4 py-2 border">Usuario (ID)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($logs as $log)
                        <tr>
                            <td class="px-4 py-2 border">{{ $log->created_at->format('d/m/Y H:i') }}</td>
                            <td class="px-4 py-2 border">{{ $log->ip_address }}</td>
                            <td class="px-4 py-2 border">{{ $log->login_method }}</td>
                            <td class="px-4 py-2 border">{{ $log->user_agent }}</td>
                            <td class="px-4 py-2 border">{{ $log->user_id }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center border">No hay registros aún.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $logs->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
