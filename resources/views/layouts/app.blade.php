<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet" />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar Mobile (oculto por defecto) -->
    <div x-show="sidebarOpen" class="fixed inset-0 z-40 flex md:hidden" x-transition>
        <div @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50"></div>

        <nav class="relative z-50 w-64 bg-white p-6 border-r border-gray-200 flex flex-col">
            @include('components.sidebar-content') <!-- Extraemos contenido para reusar -->
        </nav>
    </div>

    <!-- Sidebar Desktop -->
    <nav class="hidden md:flex md:flex-col fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 p-6">
        @include('components.sidebar-content')
    </nav>

    <!-- Contenido principal -->
    <div class="flex-1 flex flex-col md:ml-64 w-full">
        <!-- Topbar móvil -->
        <header class="md:hidden bg-white shadow-sm p-4 flex items-center justify-between">
            <button @click="sidebarOpen = true" class="text-gray-700 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <span class="text-lg font-bold text-indigo-600">{{ config('app.name', 'Laravel') }}</span>
        </header>

        <main class="p-6 overflow-auto">
            <!-- Si existe la variable $header, se muestra dentro de este contenedor -->
            @isset($header)
                <div class="mb-6 border-b pb-4 border-gray-300">
                    {{ $header }}
                </div>
            @endisset

             <!-- Verifica si existe una sección llamada 'content' definida en la vista -->
            @hasSection('content')
                @yield('content')<!-- Inserta el contenido definido en la sección 'content' -->
            @else
                {{ $slot }}<!-- Si no existe la sección, muestra el contenido por defecto -->
            @endif
        </main>
    </div>
</body>
</html>
