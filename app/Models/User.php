<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los campos que se pueden llenar masivamente
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'role',
    ];

    /**
     * Campos ocultos (no se devuelven en JSON)
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting de tipos de datos
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Verificar si el usuario es administrador
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     * Verificar si el usuario es normal
     */
    public function isUser()
    {
        return $this->role === 'user';
    }
}