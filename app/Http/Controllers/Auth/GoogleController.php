<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\LoginLog;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user);

        //  Registrar inicio de sesión
            LoginLog::create([
                    'user_id' => auth()->id(),
                    'login_method' => 'google',
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                ]);

        return redirect('/dashboard'); // O la ruta que uses en tu app
    }
}
