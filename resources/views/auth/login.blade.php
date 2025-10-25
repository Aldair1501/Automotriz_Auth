<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    {{-- Carga los estilos con Vite (Tailwind y CSS de Laravel) --}}
    @vite('resources/css/app.css')
</head>

<body class="bg-gradient-to-br from-black via-gray-900 to-gray-800 min-h-screen flex flex-col items-center justify-center p-6 font-sans text-white">

    <!-- Encabezado principal -->
    <header class="mb-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-red-500 mb-1">Sistema de Gestión de Inventario automotriz</h1>
        <p class="text-gray-400 text-sm">Selecciona tu método de autenticación</p>
    </header>

    <!-- Contenedor de tarjetas de login -->
    <main class="grid md:grid-cols-3 gap-6 w-full max-w-5xl justify-items-center">

        {{-- Variables de clase CSS definidas en PHP para reuso --}}
        @php
            $cardClass = "bg-gray-900/90 border border-red-600 rounded-xl p-5 shadow-lg hover:shadow-red-500/30 transition-all duration-300 flex flex-col justify-between hover:-translate-y-1 w-[260px]";
            $inputClass = "block mt-1 w-full bg-gray-800 text-white border border-gray-700 rounded-md focus:border-red-500 focus:ring-red-500 text-sm py-2";
            $btnClass = "w-full bg-red-600 hover:bg-red-500 text-white font-medium rounded-md py-2 text-sm transition-colors duration-200";
            $iconClass = "w-7 h-7 mx-auto mb-2 text-red-500";
        @endphp

        <!-- Tarjeta 1: Login Básico (sin encriptación, solo demostrativo) -->
        <div class="{{ $cardClass }}">
            <div class="text-center">
                <!-- Ícono representativo -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-[#FF0B55] inline-block ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
                <h2 class="text-red-500 text-sm font-bold">Login Básico</h2>
                <p class="text-gray-400 text-xs mb-3">Usuario y contraseña en texto plano</p>
            </div>
            {{-- Formulario con ruta login.plain --}}
            <form method="POST" action="{{ route('login.plain') }}" class="space-y-3">
                @csrf
                <div>
                    <x-input-label for="email_plain" :value="__('Correo')" class="text-gray-300 text-xs"/>
                    <x-text-input id="email_plain" class="{{ $inputClass }}" type="email" name="email" required />
                </div>
                <div>
                    <x-input-label for="password_plain" :value="__('Contraseña')" class="text-gray-300 text-xs"/>
                    <x-text-input id="password_plain" class="{{ $inputClass }}" type="password" name="password" required />
                </div>
                <x-primary-button class="{{ $btnClass }}">
                    {{ __('Ingresar') }}
                </x-primary-button>
            </form>
        </div>

        <!-- Tarjeta 2: Login Seguro (Laravel Auth normal con hash bcrypt) -->
        <div class="{{ $cardClass }}">
            <div class="text-center">
                <!-- Ícono de escudo -->
                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#FF0B55] mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l7 4v6c0 5.25-3.75 9-7 10-3.25-1-7-4.75-7-10V6l7-4z" />
                </svg>
                <h2 class="text-red-500 text-sm font-bold">Login Seguro</h2>
                <p class="text-gray-400 text-xs mb-3">Contraseña encriptada con hash seguro</p>
            </div>
            {{-- Formulario que usa la ruta de login de Laravel --}}
            <form method="POST" action="{{ route('login') }}" class="space-y-3">
                @csrf
                <div>
                    <x-input-label for="email" :value="__('Correo')" class="text-gray-300 text-xs"/>
                    <x-text-input id="email" class="{{ $inputClass }}" type="email" name="email" :value="old('email')" required autofocus />
                </div>
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-300 text-xs"/>
                    <x-text-input id="password" class="{{ $inputClass }}" type="password" name="password" required />
                </div>
                <x-primary-button class="{{ $btnClass }}">
                    {{ __('Iniciar Sesión') }}
                </x-primary-button>
            </form>
        </div>

        <!-- Tarjeta 3: Login con Google (OAuth2) -->
        <div class="{{ $cardClass }} items-center">
            <div class="text-center">
                <!-- Ícono de Google -->
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-8 h-8 mx-auto mb-2" alt="Google">
                <h2 class="text-red-500 text-sm font-bold">Login con Google</h2>
                <p class="text-gray-400 text-xs mb-3">Accede usando tu cuenta de Google</p>
            </div>

            <!-- Ícono de mundo (internet / global login) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-[#FF0B55] mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                <circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M2 12h20M12 2c4 4 4 16 0 20M12 2c-4 4-4 16 0 20"/>
            </svg>

            {{-- Botón que redirige a la ruta de Google OAuth --}}
            <a href="{{ url('/auth/google/redirect') }}" class="{{ $btnClass }} text-center">
                Iniciar sesión
            </a>
        </div>

    </main>
</body>
</html>
