<x-guest-layout>
    {{-- Texto introductorio para el usuario explicando el flujo de recuperación --}}
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Estado de la sesión -->
    {{-- Muestra mensajes de estado, por ejemplo, si ya se envió el correo de recuperación --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />

    {{-- Formulario para solicitar el enlace de restablecimiento de contraseña --}}
    <form method="POST" action="{{ route('password.email') }}">
        {{-- Protección CSRF para seguridad contra ataques cross-site request forgery --}}
        @csrf

        <!-- Campo para dirección de correo -->
        <div>
            {{-- Etiqueta del campo (Email), soporta traducciones --}}
            <x-input-label for="email" :value="__('Email')" />

            {{-- Input de tipo email con estilos Tailwind.
                 - id="email" identifica el campo.
                 - name="email" es el nombre que se enviará al backend.
                 - :value="old('email')" conserva el valor si ocurre un error de validación.
                 - required obliga a rellenar el campo.
                 - autofocus coloca el cursor automáticamente al cargar la vista. --}}
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

            {{-- Muestra mensajes de error si el campo email falla en la validación --}}
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        {{-- Botón para enviar el formulario, alineado a la derecha --}}
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
