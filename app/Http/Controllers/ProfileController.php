<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de edición de perfil del usuario.
     */
    public function edit(Request $request): View
    {
        // Obtiene al usuario autenticado
        $user = $request->user();

        // Retorna la vista con:
        // - Datos del usuario
        // - Últimos 10 registros de inicio de sesión del usuario
        return view('profile.edit', [
            'user' => $user,
            'loginLogs' => $user->loginLogs()->latest()->take(10)->get(),
        ]);
    }

    /**
     * Actualiza la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Actualiza los datos del usuario con los valores validados
        $request->user()->fill($request->validated());

        // Si el email fue modificado, se invalida la verificación
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en la base de datos
        $request->user()->save();

        // Redirige de nuevo al formulario con mensaje de éxito
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Elimina la cuenta del usuario autenticado.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Valida que el usuario ingrese su contraseña antes de eliminar la cuenta
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Obtiene al usuario autenticado
        $user = $request->user();

        // Cierra la sesión
        Auth::logout();

        // Elimina el usuario de la base de datos
        $user->delete();

        // Invalida la sesión y regenera el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige al inicio
        return Redirect::to('/');
    }
}
