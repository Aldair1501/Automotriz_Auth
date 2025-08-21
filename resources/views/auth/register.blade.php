<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-br from-black via-gray-900 to-gray-800 min-h-screen flex flex-col items-center justify-center p-6 font-sans text-white">

    <!-- Encabezado -->
    <header class="mb-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-red-500 mb-1">Sistema de Gestión de Inventario automotriz</h1>
         <!-- Descripción para SEO -->
   
        <p class="text-gray-400 text-sm">Crea tu cuenta para acceder al sistema</p>
    </header>
   


    @php
        $cardClass = "bg-gray-900/90 border border-red-600 rounded-xl p-6 shadow-lg hover:shadow-red-500/30 transition-all duration-300 w-full max-w-md";
        $inputClass = "block mt-1 w-full bg-gray-800 text-white border border-gray-700 rounded-md focus:border-red-500 focus:ring-red-500 text-sm py-2";
        $btnClass = "w-full bg-red-600 hover:bg-red-500 text-white font-medium rounded-md py-2 text-sm transition-colors duration-200";
    @endphp

    <!-- Contenedor de registro -->
    <main class="flex justify-center items-center w-full">
        <div class="{{ $cardClass }}">
            <h2 class="text-red-500 text-2xl font-bold text-center mb-4">Registrarse</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Nombre -->
                <div>
                    <x-input-label for="name" :value="__('Nombre')" class="text-gray-300 text-sm"/>
                    <x-text-input id="name" class="{{ $inputClass }}" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-1 text-xs text-red-500" />
                </div>

                <!-- Correo -->
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" class="text-gray-300 text-sm"/>
                    <x-text-input id="email" class="{{ $inputClass }}" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-xs text-red-500" />
                </div>

                <!-- Contraseña -->
                <div>
                    <x-input-label for="password" :value="__('Contraseña')" class="text-gray-300 text-sm"/>
                    <x-text-input id="password" class="{{ $inputClass }}" type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-xs text-red-500" />
                </div>

                <!-- Confirmar contraseña -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmar contraseña')" class="text-gray-300 text-sm"/>
                    <x-text-input id="password_confirmation" class="{{ $inputClass }}" type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-xs text-red-500" />
                </div>

                <!-- Selección de método de autenticación -->
<div class="mt-4">
    <x-input-label class="text-gray-300 text-sm">Método de Autenticación</x-input-label>
    <div class="flex items-center mt-1 space-x-4">
        <label class="flex items-center space-x-2">
            <input type="radio" name="auth_method" value="plain" class="accent-red-500" checked>
            <span class="text-gray-300 text-sm">Texto Plano</span>
        </label>
        <label class="flex items-center space-x-2">
            <input type="radio" name="auth_method" value="encrypted" class="accent-red-500">
            <span class="text-gray-300 text-sm">Contraseña Encriptada</span>
        </label>
    </div>
    <x-input-error :messages="$errors->get('auth_method')" class="mt-1 text-xs text-red-500" />
</div>

<!-- Botón de registro -->
<div class="mt-4">
    <x-primary-button class="{{ $btnClass }} w-full">
        Registrarse
    </x-primary-button>
</div>

<!-- Enlace a login -->
<div class="mt-2 text-center">
    <a class="text-gray-400 text-sm hover:text-red-500" href="{{ route('login') }}">
        ¿Ya tienes cuenta?
    </a>
</div>

                <!-- Registro con Google -->
                <div class="mt-6 text-center">
                    <a href="{{ url('/auth/google/redirect') }}" 
                    class="w-full max-w-xs mx-auto bg-white hover:bg-gray-100 text-gray-900 font-medium rounded-md py-2 text-sm transition-colors duration-200 inline-flex items-center justify-center space-x-2 shadow-md">
                    
                    <!-- Logo de Google -->
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5 h-5" alt="Google Logo">

                    <span>Registrarse con Google</span>
                    </a>
                </div>
            </form>
        </div>



        
    </main>

</body>
</html>
