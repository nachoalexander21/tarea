<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 👤 Nombre completo del usuario
            $table->string('name');

            // 🔑 Usuario (LOGIN PRINCIPAL)
            $table->string('username')->unique();

            // 🔒 Contraseña encriptada
            $table->string('password');

            // 🎭 Rol del sistema (admin o user)
            $table->enum('role', ['admin', 'user'])->default('user');

            // ⏱ Token para "recordarme"
            $table->rememberToken();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};