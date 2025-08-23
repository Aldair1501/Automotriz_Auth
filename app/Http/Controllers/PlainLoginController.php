<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlainLoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión básico (sin cifrado de contraseñas).
     */
    public function showLoginForm()
    {
        // Retorna la vista con el formulario de login plano
        return view('auth.login_plain');
    }

    /**
     * Procesa el inicio de sesión básico con contraseña en texto plano.
     */
    public function login(Request $request)
    {
        // Validar que se ingresen los campos requeridos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar usuario en la base de datos usando email y password plano
        $user = User::where('email', $request->email)
                    ->where('password_plain', $request->password)
                    ->first();

        // Si se encuentra el usuario
        if ($user) {
            // Iniciar sesión con el sistema de autenticación de Laravel
            Auth::login($user);

            // Registrar el inicio de sesión en la tabla login_logs
            $user->loginLogs()->create([
                'login_method' => 'Básico (Plano)',
                'ip_address'   => $request->ip(),
                'user_agent'   => $request->userAgent(),
            ]);

            // Redirigir al dashboard con mensaje de éxito
            return redirect()->route('dashboard')->with('success', 'Login Básico exitoso');
        }

        // Si las credenciales no coinciden, regresar con error
        return back()->withErrors([
            'email' => 'Usuario o contraseña incorrectos (Básico)',
        ])->withInput();
    }

    /**
     * Cierra la sesión del usuario autenticado con login plano.
     */
    public function logout(Request $request)
    {
        // Cerrar sesión y limpiar datos de sesión
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir al login básico
        return redirect('/login-plain');
    }
}
