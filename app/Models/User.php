<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'nombres','apellidos','username','correo','password',
        'telefono','ciudad','rol','ci','fecha_nacimiento','fecha_creacion',
    ];

    protected $hidden = ['password'];

    protected function casts(): array
    {
        return ['password' => 'hashed'];
    }

    public function isAdmin(): bool
    {
        return $this->rol === 'admin';
    }
}
