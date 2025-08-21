<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LoginLog;

class LoginLog extends Model
{
    use HasFactory;

    // Campos que se pueden asignar en masa (para create())
    protected $fillable = [
        'user_id',
        'login_method',
        'ip_address',
        'user_agent',
    ];

    // Relación con usuario 
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
