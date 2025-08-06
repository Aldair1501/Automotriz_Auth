<?php

namespace App\Http\Controllers;

use App\Models\LoginLog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginLogController extends Controller
{
    public function index(Request $request): View
    {
        $user = $request->user();

    // Solo permitir al usuario con ID 1
    if ($user->id !== 1) {
        abort(403, 'Acceso no autorizado');
    }

    $logs = LoginLog::latest()->paginate(10);

    return view('login-logs', compact('logs'));
    }
}
