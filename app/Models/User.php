<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\LoginLog;

class User extends Authenticatable
{
    /** 
     * Traits:
     * - HasFactory: permite crear instancias del modelo con factories (útil para pruebas).
     * - Notifiable: permite enviar notificaciones al usuario (correo, base de datos, etc).
     */
    use HasFactory, Notifiable;

    /**
     * Atributos que se pueden asignar de forma masiva (mass assignment).
     * Protege el modelo de asignaciones no permitidas.
     */
    protected $fillable = [
        'name',            // Nombre del usuario
        'email',           // Correo electrónico
        'password',        // Contraseña encriptada
        'password_plain',  // Contraseña en texto plano (para login básico, por temas de ejemplificacion)
        'google_id',       // ID de Google para login social
        'avatar',          // Imagen de perfil del usuario
    ];

    /**
     * Atributos que se deben ocultar al serializar el modelo (ej. al devolver JSON en APIs).
     */
    protected $hidden = [
        'password',        // No mostrar contraseña
        'remember_token',  // Token de sesión "recordarme"
    ];

    /**
     * Define el tipo de datos de algunos atributos.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Fecha de verificación del correo
            'password' => 'hashed',             // Contraseña encriptada automáticamente
        ];
    }

    /**
     * Relación con los registros de login del usuario.
     * Un usuario puede tener muchos loginLogs.
     */
    public function loginLogs()
    {
        return $this->hasMany(LoginLog::class);
    }
}
