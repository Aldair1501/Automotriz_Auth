@extends('layouts.app') <!-- O tu layout base -->

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Historial de Inicios de Sesión</h1>

    <table class="min-w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Fecha y Hora</th>
                <th class="border px-4 py-2">Método</th>
                <th class="border px-4 py-2">IP</th>
                <th class="border px-4 py-2">Agente de Usuario</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($logs as $log)
            <tr>
                <td class="border px-4 py-2">{{ $log->created_at->format('d/m/Y H:i:s') }}</td>
                <td class="border px-4 py-2 capitalize">{{ $log->login_method }}</td>
                <td class="border px-4 py-2">{{ $log->ip_address }}</td>
                <td class="border px-4 py-2">{{ $log->user_agent }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="border px-4 py-2 text-center">No hay registros de inicio de sesión.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $logs->links() }} <!-- Paginación -->
    </div>
</div>
@endsection
