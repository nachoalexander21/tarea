<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Ejecutar seeders de usuarios
     */
    public function run(): void
    {
        // 👨‍💼 ADMIN PRINCIPAL (TU CUENTA)
        User::create([
            'name' => 'Administrador Nacho',
            'username' => 'adminnacho',
            'password' => Hash::make('Admin123*'),
            'role' => 'admin',
        ]);

        // 👤 USUARIO OBLIGATORIO
        User::create([
            'name' => 'Omar Usuario',
            'username' => 'omarqm',
            'password' => Hash::make('Omar411*'),
            'role' => 'user',
        ]);

        // 👤 USUARIOS ADICIONALES
        User::create([
            'name' => 'Juan Perez',
            'username' => 'juan1',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Maria Lopez',
            'username' => 'maria1',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);

        User::create([
            'name' => 'Carlos Diaz',
            'username' => 'carlos1',
            'password' => Hash::make('123456'),
            'role' => 'user',
        ]);
    }
}