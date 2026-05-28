<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\Tratamiento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
        $this->call([RoleSeeder::class,]);
        
        User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('admin');
        
        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres' => 'Secretaria',
            'apellidos' => '1',
            'curp' => '001',
            'celular' => '963',
            'fecha_nacimiento' => '10/10/2001',
            'direccion' => '13 calle sur',
            'user_id' => '2'
        ]);
        
        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'doctor1',
            'apellidos' => '1',
            'telefono' => '962',
            'licencia_medica' => '0110',
            'especialidad' => 'Anestesia',
            'user_id' => '3'
        ]);

        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'doctor2',
            'apellidos' => '2',
            'telefono' => '962',
            'licencia_medica' => '0111',
            'especialidad' => 'Nutriologo',
            'user_id' => '4'
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('doctor');

        Doctor::create([
            'nombres' => 'doctor3',
            'apellidos' => '3',
            'telefono' => '962',
            'licencia_medica' => '0112',
            'especialidad' => 'Ordoncia',
            'user_id' => '5'
        ]);
        
        Consultorio::create([
            'nombre' => 'PEDIATRIA',
            'ubicacion' => '1A1',
            'capacidad' => '5',
            'telefono' => '',
            'especialidad' => 'PEDIATRIA',
            'estado' => 'Activo'
        ]);
        
        Consultorio::create([
            'nombre' => 'ODONTOLOGIA',
            'ubicacion' => '2A1',
            'capacidad' => '5',
            'telefono' => '852741',
            'especialidad' => 'ODONTOLOGIA',
            'estado' => 'Activo'
        ]);

        Consultorio::create([
            'nombre' => 'FISIOTERAPIA',
            'ubicacion' => '3A1',
            'capacidad' => '10',
            'telefono' => '782741',
            'especialidad' => 'FISIOTERAPIA',
            'estado' => 'Activo'
        ]);
        
        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('paciente');
        
        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('12345678')

        ])->assignRole('usuario');

        $this->call([PacienteSeeder::class,]);

        //Creacion de Horarios
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'14:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1'
        ]);
        
        //Creacion de Tratamientos
        Tratamiento::create([
            'nombre'=>'Limpieza dental',
            'costo'=>500
        ]);
        
        Tratamiento::create([
            'nombre'=>'Blanqueamiento dental',
            'costo'=>1500
        ]);

        Tratamiento::create([
            'nombre'=>'Resinas (empastes)',
            'costo'=>1200
        ]);
        
        Tratamiento::create([
            'nombre'=>'Prótesis fija (puente/corona)',
            'costo'=>4500
        ]);
        
        Tratamiento::create([
            'nombre'=>'Extracción dental',
            'costo'=>800
        ]);

    }
}
