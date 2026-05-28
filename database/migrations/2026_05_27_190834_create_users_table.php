<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('username')->unique();
            $table->string('correo');
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('ci')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->enum('rol', ['admin', 'user'])->default('user');
            $table->timestamp('fecha_creacion')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
