<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seeder para los roles y permisos admin, secretaria, doctores, paciente, usuarios
        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);

        Permission::create(['name' => 'admin.index']);

        //Rutas para el admin - configuraciones
        Permission::create(['name' => 'admin.configuraciones.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.destroy'])->syncRoles([$admin]);

        //Rutas para el admin - usuarios
        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);
        
        //Rutas para el admin - secretarias
        Permission::create(['name' => 'admin.secretarias.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.secretarias.destroy'])->syncRoles([$admin]);
        
        //Rutas para el admin - pacientes
        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin, $secretaria]);
        
        //Rutas para el admin - consultorios
        Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin, $secretaria]);
        
        //Rutas para el admin - doctores
        Permission::create(['name' => 'admin.doctores.reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin, $secretaria]);
        
        //Rutas para el admin - horarios
        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$admin, $secretaria]);

        //ajax
        Permission::create(['name' => 'admin.horarios.cargar_datos_consultorios'])->syncRoles([$admin, $secretaria]);

        //Rutas para el usuario
        Permission::create(['name' => 'cargar_datos_consultorios'])->syncRoles([$admin, $usuario, $secretaria]);
        Permission::create(['name' => 'cargar_reserva_doctores'])->syncRoles([$admin, $usuario, $secretaria]);
        Permission::create(['name' => 'admin.ver_reservas'])->syncRoles([$admin, $usuario, $secretaria]);
        Permission::create(['name' => 'admin.eventos.store'])->syncRoles([$admin, $usuario, $secretaria]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$admin, $usuario, $secretaria]);

        //Rutas de reportes
        Permission::create(['name' => 'admin.reservas.reportes'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.reservas.pdf'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.reservas.cargar_reservas'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.reservas.confirmar'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.reservas.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin - usuarios
        Permission::create(['name' => 'admin.tratamientos.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tratamientos.destroy'])->syncRoles([$admin, $secretaria]);
        
        //Rutas para el admin - pagos
        Permission::create(['name' => 'admin.pagos.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.pagos.destroy'])->syncRoles([$admin, $secretaria]);
        
        //Rutas para el admin - pagos
        Permission::create(['name' => 'admin.tpagos.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.create'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.store'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.show'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.edit'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.update'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.confirmDelete'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.tpagos.destroy'])->syncRoles([$admin, $secretaria]);

        //Rutas para el admin - servicios
        Permission::create(['name' => 'admin.servicios.index'])->syncRoles([$admin, $secretaria]);
        Permission::create(['name' => 'admin.servicios.update'])->syncRoles([$admin, $secretaria]);
    }
}
