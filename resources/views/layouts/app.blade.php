<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar fijo -->
    <nav class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 p-6 flex flex-col">
        <!-- Logo / Nombre App -->
        <div class="mb-10">
            <a href="{{ route('dashboard') }}" 
               class="text-3xl font-extrabold text-indigo-600 hover:text-indigo-700 transition">
                {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <!-- Menú principal -->
        <ul class="flex-grow space-y-6">
            <li>
                <a href="{{ route('dashboard') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono Home -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-7 11h8a2 2 0 002-2v-5a2 2 0 00-2-2h-8a2 2 0 00-2 2v5a2 2 0 002 2z"/>
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('vehiculos.index') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono lista -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3 10h18M3 14h18M6 18h12M6 6h12"/>
                    </svg>
                    Vehículos
                </a>
            </li>
            <li>
                <a href="{{ route('vehiculos.create') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                    <!-- Icono + -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    Nuevo Vehículo
                </a>
            </li>
        </ul>

        <!-- Separador -->
        <hr class="my-6 border-gray-200" />

        <!-- Perfil -->
        <ul class="space-y-4">
            <li>
                <a href="{{ route('profile.edit') }}"
                   class="flex items-center gap-3 text-gray-700 hover:text-indigo-600 font-semibold transition">
                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                   </svg>
                   Perfil
                </a>
            </li>
        </ul>

        <!-- Logout abajo -->
        <div class="mt-auto pt-6 border-t border-gray-200">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left text-gray-700 hover:text-red-600 font-semibold transition">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="flex-1 ml-64 p-8 overflow-auto">
        @isset($header)
            <header class="mb-8 border-b border-gray-300 pb-4">
                {{ $header }}
            </header>
        @endisset

        @hasSection('content')
            @yield('content')
        @else
            {{ $slot }}
        @endif
    </main>

</body>
</html>
