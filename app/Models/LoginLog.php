<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoginLog;

class LoginLog extends Model
{
    use HasFactory;

    /**
     * Campos que se pueden asignar masivamente usando create() o update().
     * Evita problemas de asignación masiva (Mass Assignment).
     */
    protected $fillable = [
        'user_id',       // ID del usuario que inició sesión
        'login_method',  // Método de login (Básico, Google, etc.)
        'ip_address',    // Dirección IP desde la que se conectó
        'user_agent',    // Información del navegador o dispositivo
    ];

    /**
     * Relación inversa con el modelo User.
     * Un login pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
