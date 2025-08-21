<?php

namespace App\Models;

// Importaciones necesarias para la clase User
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\LoginLog;

class User extends Authenticatable
{
     /** 
     * Trait HasFactory: permite crear instancias de este modelo con factories (útil para pruebas).
     * Trait Notifiable: permite enviar notificaciones al usuario (correo, base de datos, etc).
     */
    use HasFactory, Notifiable;

    /**
     * Atributos que se pueden asignar de forma masiva (mass assignment).
     * Esto protege el modelo para que no se asignen otros atributos no permitidos.
     */
     protected $fillable = [
        'name',            // Nombre del usuario
        'email',           // Correo electrónico
        'password',        // Contraseña (encriptada)
        'password_plain',  // Contraseña en texto plano (⚠️ no recomendado en producción, solo si es necesario)
        'google_id',       // ID de Google para login social
        'avatar',          // Imagen de perfil del usuario
    ];

    /**
     * Atributos que deben ocultarse al serializar el modelo (por ejemplo, al devolver JSON en API).
     */
    protected $hidden = [
        'password',        // No mostrar contraseña en respuestas
        'remember_token',  // Token de sesión "recordarme"
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    // RELACIÓN LOGINLOGS
    public function loginLogs()
    {
        return $this->hasMany(LoginLog::class);
    }
}
