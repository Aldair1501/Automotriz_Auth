<x-guest-layout>
    {{-- Mensaje introductorio para el usuario --}}
    <div class="mb-4 text-sm text-gray-600">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </div>

    {{-- Formulario para confirmar la contraseña del usuario --}}
    <form method="POST" action="{{ route('password.confirm') }}">
        {{-- Token de seguridad CSRF para evitar ataques cross-site request forgery --}}
        @csrf

        <!-- Campo de contraseña -->
        <div>
            {{-- Etiqueta del input, con traducción (Password) --}}
            <x-input-label for="password" :value="__('Password')" />

            {{-- Campo de entrada tipo password con estilos y validación --}}
            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            {{-- Mensaje de error si la validación de contraseña falla --}}
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        {{-- Botón para enviar el formulario, alineado a la derecha --}}
        <div class="flex justify-end mt-4">
            <x-primary-button>
                {{ __('Confirm') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
