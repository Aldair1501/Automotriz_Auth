<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginLogController extends Controller
{
    /**
     * Muestra el historial de logs de inicio de sesión.
     * Solo el usuario con ID = 1 (administrador) puede acceder.
     */
    public function index(Request $request): View
    {
        // Obtiene el usuario autenticado
        $user = $request->user();

        // Verifica que solo el usuario con ID 1 tenga acceso
        // Si no cumple la condición, retorna error 403 (Prohibido)
        if ($user->id !== 1) {
            abort(403, 'Acceso no autorizado');
        }

        // Obtiene los registros de inicio de sesión ordenados del más reciente al más antiguo
        // y los pagina de 10 en 10
        $logs = LoginLog::latest()->paginate(10);

        // Retorna la vista 'login-logs' enviando los registros paginados
        return view('login-logs', compact('logs'));
    }
}
