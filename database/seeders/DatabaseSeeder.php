<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nombres'         => 'Franklin Adhemar',
                'apellidos'       => 'Pongo Cori',
                'username'        => 'frankAdmin',
                'correo'          => 'adhemarcori37@gmail.com',
                'password'        => Hash::make('Fadmin123*'),
                'telefono'        => '+591 71921217',
                'ciudad'          => 'El Alto',
                'ci'              => '9956574',
                'fecha_nacimiento'=> '2004-09-24',
                'rol'             => 'admin',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nombres'         => 'Juan Carlos',
                'apellidos'       => 'Pérez',
                'username'        => 'jperez',
                'correo'          => 'jperez@gmail.com',
                'password'        => Hash::make('JpUser123*'), 
                'telefono'        => '+591 76543210',
                'ciudad'          => 'La Paz',
                'ci'              => '2345678',
                'fecha_nacimiento'=> '1998-05-12',
                'rol'             => 'user',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nombres'         => 'María Elena',
                'apellidos'       => 'López',
                'username'        => 'mlopez',
                'correo'          => 'mlopez@gmail.com',
                'password'        => Hash::make('Mlopez123*'), 
                'telefono'        => '+591 71234567',
                'ciudad'          => 'Cochabamba',
                'ci'              => '3456789',
                'fecha_nacimiento'=> '1995-08-20',
                'rol'             => 'user',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nombres'         => 'Franklin Adhemar',
                'apellidos'       => 'Pongo Cori',
                'username'        => 'frankUser',
                'correo'          => 'adhemarcori37@gmail.com',
                'password'        => Hash::make('Fuser123*'), 
                'telefono'        => '+591 71921217',
                'ciudad'          => 'El Alto',
                'ci'              => '9956574',
                'fecha_nacimiento'=> '2004-09-24',
                'rol'             => 'user',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nombres'         => 'Andrea',
                'apellidos'       => 'Castro Mamani',
                'username'        => 'acastro',
                'correo'          => 'acastro@gmail.com',
                'password'        => Hash::make('Acastro123*'), 
                'telefono'        => '+591 68765432',
                'ciudad'          => 'Oruro',
                'ci'              => '5678901',
                'fecha_nacimiento'=> '2000-11-30',
                'rol'             => 'user',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
            [
                'nombres'         => 'Omar',
                'apellidos'       => 'Quispe Mita',
                'username'        => 'omarqm',
                'correo'          => 'omarqm@correo.com',
                'password'        => Hash::make('Omar411*'), 
                'telefono'        => '+591 77224954',
                'ciudad'          => 'La Paz',
                'ci'              => '6789012',
                'fecha_nacimiento'=> '1985-06-10',
                'rol'             => 'user',
                'fecha_creacion'  => now(),
                'created_at'      => now(),
                'updated_at'      => now(),
            ],
        ]);
    }
}