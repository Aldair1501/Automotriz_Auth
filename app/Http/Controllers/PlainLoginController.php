<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PlainLoginController extends Controller
{
    // Mostrar formulario de login básico
    public function showLoginForm()
    {
        return view('auth.login_plain'); // tu vista actual
    }

    // Procesar login básico
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Buscar usuario por email y contraseña plana
        $user = User::where('email', $request->email)
                    ->where('password_plain', $request->password)
                    ->first();

        if ($user) {
            // Logear usuario en Laravel
            Auth::login($user);

            // Opcional: registrar el login en login_logs
            $user->loginLogs()->create([
                'login_method' => 'Básico (Plano)',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            return redirect()->route('dashboard')->with('success', 'Login Básico exitoso');
        }

        return back()->withErrors([
            'email' => 'Usuario o contraseña incorrectos (Básico)',
        ])->withInput();
    }

    // Logout si quieres cerrar sesión del login plano
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login-plain');
    }
}
