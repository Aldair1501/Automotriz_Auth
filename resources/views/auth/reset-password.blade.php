<x-guest-layout>
    {{-- Formulario para enviar la nueva contraseña al backend --}}
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Token de restablecimiento de contraseña -->
        {{-- Se incluye de forma oculta, Laravel lo genera al enviar el email de recuperación.
             Sirve para validar que el enlace es legítimo y que pertenece a un usuario. --}}
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Campo Email -->
        {{-- El usuario debe ingresar el correo asociado a su cuenta.
             El valor se completa automáticamente con el email que viene en la solicitud de reset. --}}
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" 
                          type="email" 
                          name="email" 
                          :value="old('email', $request->email)" 
                          required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Campo Contraseña -->
        {{-- Nueva contraseña que el usuario quiere establecer. --}}
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" 
                          type="password" 
                          name="password" 
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmación de Contraseña -->
        {{-- Requiere que el usuario repita la contraseña para evitar errores de tipeo. --}}
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                          type="password"
                          name="password_confirmation" 
                          required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Botón de envío -->
        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
