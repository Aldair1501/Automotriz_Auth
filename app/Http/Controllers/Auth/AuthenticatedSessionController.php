<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\LoginLog;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Registramos un nuevo inicio de sesión en la tabla LoginLog
LoginLog::create([
    // Guardamos el ID del usuario que inició sesión
    'user_id' => auth()->id(),

    // Determinamos el método de autenticación usado: 
    // 'plain' si el usuario tiene contraseña en texto plano, 
    // 'encrypted' si la contraseña está cifrada
    'login_method' => auth()->user()->password_plain ? 'plain' : 'encrypted',

    // Guardamos la dirección IP desde la que se realizó el inicio de sesión
    'ip_address' => request()->ip(),

    // Guardamos información del navegador o dispositivo utilizado
    'user_agent' => request()->userAgent(),
]);


        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
