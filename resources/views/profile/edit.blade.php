<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Tarjeta 1: Información del perfil -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Tarjeta 2: Cambiar contraseña -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Tarjeta 3: Eliminar usuario -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

            <!-- ✅ Tarjeta 4: Historial de acceso (separada) -->
       <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    <div class="max-w-4xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h.01M12 12h.01M9 12h.01M6 12h.01M18 12h.01M21 12h.01M3 12h.01M15 6h.01M12 6h.01M9 6h.01M6 6h.01M18 6h.01M21 6h.01M3 6h.01M15 18h.01M12 18h.01M9 18h.01M6 18h.01M18 18h.01M21 18h.01M3 18h.01" />
            </svg>
            {{ __('Historial de Inicio de Sesión') }}
        </h2>

        <div class="overflow-auto rounded-lg border border-gray-200">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs tracking-wider border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3">Fecha y hora</th>
                        <th class="px-4 py-3">IP</th>
                        <th class="px-4 py-3">Método</th>
                        <th class="px-4 py-3">Navegador</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($loginLogs as $log)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-3 whitespace-nowrap">
                                {{ $log->created_at->format('d/m/Y H:i') }}
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-flex items-center gap-1">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                    {{ $log->ip_address }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded bg-blue-100 text-blue-800 capitalize">
                                    {{ $log->login_method }}
                                </span>
                            </td>
                            <td class="px-4 py-3 truncate max-w-[250px]" title="{{ $log->user_agent }}">
                                {{ Str::limit($log->user_agent, 50) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                No hay registros aún.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>



        </div>
    </div>
</x-app-layout>
