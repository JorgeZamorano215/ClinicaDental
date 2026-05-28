<?php

use App\Models\Doctor;
use App\Models\Servicio;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para el admin
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'lateral'])->name('admin')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//Rutas para el admin - configuraciones
Route::get('/admin/configuraciones', [App\Http\Controllers\ConfiguracioneController::class, 'index'])->name('admin.configuraciones.index')->middleware('auth','can:admin.configuraciones.index');
Route::get('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracioneController::class, 'create'])->name('admin.configuraciones.create')->middleware('auth','can:admin.configuraciones.create');
Route::post('/admin/configuraciones/create', [App\Http\Controllers\ConfiguracioneController::class, 'store'])->name('admin.configuraciones.store')->middleware('auth','can:admin.configuraciones.store');
Route::get('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'show'])->name('admin.configuraciones.show')->middleware('auth','can:admin.configuraciones.show');
Route::get('/admin/configuraciones/{id}/edit', [App\Http\Controllers\ConfiguracioneController::class, 'edit'])->name('admin.configuraciones.edit')->middleware('auth','can:admin.configuraciones.edit');
Route::put('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'update'])->name('admin.configuraciones.update')->middleware('auth','can:admin.configuraciones.update');
Route::get('/admin/configuraciones/{id}/confirm-delete', [App\Http\Controllers\ConfiguracioneController::class, 'confirmDelete'])->name('admin.configuraciones.confirmDelete')->middleware('auth','can:admin.configuraciones.confirmDelete');
Route::delete('/admin/configuraciones/{id}', [App\Http\Controllers\ConfiguracioneController::class, 'destroy'])->name('admin.configuraciones.destroy')->middleware('auth','can:admin.configuraciones.destroy');

//Rutas para el admin - usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioControllerr::class, 'index'])->name('admin.usuarios.index')->middleware('auth','can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioControllerr::class, 'create'])->name('admin.usuarios.create')->middleware('auth','can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioControllerr::class, 'store'])->name('admin.usuarios.store')->middleware('auth','can:admin.usuarios.store');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioControllerr::class, 'show'])->name('admin.usuarios.show')->middleware('auth','can:admin.usuarios.show');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioControllerr::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth','can:admin.usuarios.edit');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioControllerr::class, 'update'])->name('admin.usuarios.update')->middleware('auth','can:admin.usuarios.update');
Route::get('/admin/usuarios/{id}/confirm-delete', [App\Http\Controllers\UsuarioControllerr::class, 'confirmDelete'])->name('admin.usuarios.confirmDelete')->middleware('auth','can:admin.usuarios.confirmDelete');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioControllerr::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth','can:admin.usuarios.destroy');

//Rutas para el admin - secretarias
Route::get('/admin/secretarias', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretarias.index')->middleware('auth','can:admin.secretarias.index');
Route::get('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretarias.create')->middleware('auth','can:admin.secretarias.create');
Route::post('/admin/secretarias/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretarias.store')->middleware('auth','can:admin.secretarias.store');
Route::get('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretarias.show')->middleware('auth','can:admin.secretarias.show');
Route::get('/admin/secretarias/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretarias.edit')->middleware('auth','can:admin.secretarias.edit');
Route::put('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretarias.update')->middleware('auth','can:admin.secretarias.update');
Route::get('/admin/secretarias/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretarias.confirmDelete')->middleware('auth','can:admin.secretarias.confirmDelete');
Route::delete('/admin/secretarias/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretarias.destroy')->middleware('auth','can:admin.secretarias.destroy');

//Rutas para el admin - pacientes
Route::get('/admin/pacientes', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.pacientes.index')->middleware('auth','can:admin.pacientes.index');
Route::get('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.pacientes.create')->middleware('auth','can:admin.pacientes.create');
Route::post('/admin/pacientes/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.pacientes.store')->middleware('auth','can:admin.pacientes.store');
Route::get('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.pacientes.show')->middleware('auth','can:admin.pacientes.show');
Route::get('/admin/pacientes/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.pacientes.edit')->middleware('auth','can:admin.pacientes.edit');
Route::put('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.pacientes.update')->middleware('auth','can:admin.pacientes.update');
Route::get('/admin/pacientes/{id}/confirm-delete', [App\Http\Controllers\PacienteController::class, 'confirmDelete'])->name('admin.pacientes.confirmDelete')->middleware('auth','can:admin.pacientes.confirmDelete');
Route::delete('/admin/pacientes/{id}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('admin.pacientes.destroy')->middleware('auth','can:admin.pacientes.destroy');

//Rutas para el admin - consultorios
Route::get('/admin/consultorios', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorios.index')->middleware('auth','can:admin.consultorios.index');
Route::get('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorios.create')->middleware('auth','can:admin.consultorios.create');
Route::post('/admin/consultorios/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorios.store')->middleware('auth','can:admin.consultorios.store');
Route::get('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorios.show')->middleware('auth','can:admin.consultorios.show');
Route::get('/admin/consultorios/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorios.edit')->middleware('auth','can:admin.consultorios.edit');
Route::put('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorios.update')->middleware('auth','can:admin.consultorios.update');
Route::get('/admin/consultorios/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorios.confirmDelete')->middleware('auth','can:admin.consultorios.confirmDelete');
Route::delete('/admin/consultorios/{id}', [App\Http\Controllers\ConsultorioController::class, 'destroy'])->name('admin.consultorios.destroy')->middleware('auth','can:admin.consultorios.destroy');

//Rutas para el admin - doctores
Route::get('/admin/doctores', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctores.index')->middleware('auth','can:admin.doctores.index');
Route::get('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctores.create')->middleware('auth','can:admin.doctores.create');
Route::post('/admin/doctores/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctores.store')->middleware('auth','can:admin.doctores.store');
Route::get('/admin/doctores/reportes', [App\Http\Controllers\DoctorController::class, 'reportes'])->name('admin.doctores.reportes')->middleware('auth','can:admin.doctores.reportes');
Route::get('/admin/doctores/pdf', [App\Http\Controllers\DoctorController::class, 'pdf'])->name('admin.doctores.pdf')->middleware('auth','can:admin.doctores.pdf');
Route::get('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctores.show')->middleware('auth','can:admin.doctores.show');
Route::get('/admin/doctores/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctores.edit')->middleware('auth','can:admin.doctores.edit');
Route::put('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctores.update')->middleware('auth','can:admin.doctores.update');
Route::get('/admin/doctores/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctores.confirmDelete')->middleware('auth','can:admin.doctores.confirmDelete');
Route::delete('/admin/doctores/{id}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('admin.doctores.destroy')->middleware('auth','can:admin.doctores.destroy');

//Rutas para el admin - horarios
Route::get('/admin/horarios', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horarios.index')->middleware('auth','can:admin.horarios.index');
Route::get('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horarios.create')->middleware('auth','can:admin.horarios.create');
Route::post('/admin/horarios/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horarios.store')->middleware('auth','can:admin.horarios.store');
Route::get('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horarios.show')->middleware('auth','can:admin.horarios.show');
Route::get('/admin/horarios/{id}/edit', [App\Http\Controllers\HorarioController::class, 'edit'])->name('admin.horarios.edit')->middleware('auth','can:admin.horarios.edit');
Route::put('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'update'])->name('admin.horarios.update')->middleware('auth','can:admin.horarios.update');
Route::get('/admin/horarios/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horarios.confirmDelete')->middleware('auth','can:admin.horarios.confirmDelete');
Route::delete('/admin/horarios/{id}', [App\Http\Controllers\HorarioController::class, 'destroy'])->name('admin.horarios.destroy')->middleware('auth','can:admin.horarios.destroy');

//ajax
Route::get('/admin/horarios/consultorios/{id}', [App\Http\Controllers\HorarioController::class, 'cargar_datos_consultorios'])->name('admin.horarios.cargar_datos_consultorios')->middleware('auth','can:admin.horarios.cargar_datos_consultorios');

//Rutas para el usuario
//ajax
Route::get('/consultorios/{id}', [App\Http\Controllers\WebController::class, 'cargar_datos_consultorios'])->name('cargar_datos_consultorios');
Route::get('/cargar_reserva_doctores/{id}', [App\Http\Controllers\WebController::class, 'cargar_reserva_doctores'])->name('cargar_reserva_doctores')->middleware('auth','can:cargar_reserva_doctores');
Route::get('/admin/ver_reservas/{id}', [App\Http\Controllers\AdminController::class, 'ver_reservas'])->name('admin.ver_reservas')->middleware('auth','can:admin.ver_reservas');
Route::post('/admin/eventos/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.eventos.store')->middleware('auth','can:admin.eventos.store');
Route::delete('/admin/eventos/{id}', [App\Http\Controllers\EventController::class, 'destroy'])->name('admin.eventos.destroy')->middleware('auth','can:admin.eventos.destroy');

//Reportes de citas
Route::get('/admin/reservas/reportes', [App\Http\Controllers\ReservaController::class, 'reportes'])->name('admin.reservas.reportes')->middleware('auth','can:admin.reservas.reportes');
Route::get('/admin/reservas/pdf', [App\Http\Controllers\ReservaController::class, 'pdf'])->name('admin.reservas.pdf')->middleware('auth','can:admin.reservas.pdf');
Route::get('/admin/reservas/cargar_reservas', [App\Http\Controllers\ReservaController::class, 'cargar_reservas'])->name('admin.reservas.cargar_reservas')->middleware('auth','can:admin.reservas.cargar_reservas');
Route::put('/admin/reservas/{id}', [App\Http\Controllers\ReservaController::class, 'confirmar'])->name('admin.reservas.confirmar')->middleware('auth','can:admin.reservas.confirmar');
Route::delete('/admin/reservas/{id}', [App\Http\Controllers\ReservaController::class, 'destroy'])->name('admin.reservas.destroy')->middleware('auth','can:admin.reservas.destroy');

//Rutas para el admin - tratamientos
Route::get('/admin/tratamientos', [App\Http\Controllers\TratamientoController::class, 'index'])->name('admin.tratamientos.index')->middleware('auth','can:admin.tratamientos.index');
Route::get('/admin/tratamientos/create', [App\Http\Controllers\TratamientoController::class, 'create'])->name('admin.tratamientos.create')->middleware('auth','can:admin.tratamientos.create');
Route::post('/admin/tratamientos/create', [App\Http\Controllers\TratamientoController::class, 'store'])->name('admin.tratamientos.store')->middleware('auth','can:admin.tratamientos.store');
Route::get('/admin/tratamientos/{id}', [App\Http\Controllers\TratamientoController::class, 'show'])->name('admin.tratamientos.show')->middleware('auth','can:admin.tratamientos.show');
Route::get('/admin/tratamientos/{id}/edit', [App\Http\Controllers\TratamientoController::class, 'edit'])->name('admin.tratamientos.edit')->middleware('auth','can:admin.tratamientos.edit');
Route::put('/admin/tratamientos/{id}', [App\Http\Controllers\TratamientoController::class, 'update'])->name('admin.tratamientos.update')->middleware('auth','can:admin.tratamientos.update');
Route::get('/admin/tratamientos/{id}/confirm-delete', [App\Http\Controllers\TratamientoController::class, 'confirmDelete'])->name('admin.tratamientos.confirmDelete')->middleware('auth','can:admin.tratamientos.confirmDelete');
Route::delete('/admin/tratamientos/{id}', [App\Http\Controllers\TratamientoController::class, 'destroy'])->name('admin.tratamientos.destroy')->middleware('auth','can:admin.tratamientos.destroy');

//Rutas para el admin - pagos
Route::get('/admin/pagos', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pagos.index')->middleware('auth','can:admin.pagos.index');
Route::get('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pagos.create')->middleware('auth','can:admin.pagos.create');
Route::post('/admin/pagos/create', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pagos.store')->middleware('auth','can:admin.pagos.store');
Route::get('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'show'])->name('admin.pagos.show')->middleware('auth','can:admin.pagos.show');
Route::get('/admin/pagos/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('admin.pagos.edit')->middleware('auth','can:admin.pagos.edit');
Route::put('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('admin.pagos.update')->middleware('auth','can:admin.pagos.update');
Route::get('/admin/pagos/{id}/confirm-delete', [App\Http\Controllers\PagoController::class, 'confirmDelete'])->name('admin.pagos.confirmDelete')->middleware('auth','can:admin.pagos.confirmDelete');
Route::delete('/admin/pagos/{id}', [App\Http\Controllers\PagoController::class, 'destroy'])->name('admin.pagos.destroy')->middleware('auth','can:admin.pagos.destroy');

//Rutas para el admin - tpagos
Route::get('/admin/tpagos', [App\Http\Controllers\TPagoController::class, 'index'])->name('admin.tpagos.index')->middleware('auth','can:admin.tpagos.index');
Route::get('/admin/tpagos/create', [App\Http\Controllers\TPagoController::class, 'create'])->name('admin.tpagos.create')->middleware('auth','can:admin.tpagos.create');
Route::post('/admin/tpagos/create', [App\Http\Controllers\TPagoController::class, 'store'])->name('admin.tpagos.store')->middleware('auth','can:admin.tpagos.store');
Route::get('/admin/tpagos/{id}', [App\Http\Controllers\TPagoController::class, 'show'])->name('admin.tpagos.show')->middleware('auth','can:admin.tpagos.show');
Route::get('/admin/tpagos/{id}/edit', [App\Http\Controllers\TPagoController::class, 'edit'])->name('admin.tpagos.edit')->middleware('auth','can:admin.tpagos.edit');
Route::put('/admin/tpagos/{id}', [App\Http\Controllers\TPagoController::class, 'update'])->name('admin.tpagos.update')->middleware('auth','can:admin.tpagos.update');
Route::get('/admin/tpagos/{id}/confirm-delete', [App\Http\Controllers\TPagoController::class, 'confirmDelete'])->name('admin.tpagos.confirmDelete')->middleware('auth','can:admin.tpagos.confirmDelete');
Route::delete('/admin/tpagos/{id}', [App\Http\Controllers\TPagoController::class, 'destroy'])->name('admin.tpagos.destroy')->middleware('auth','can:admin.tpagos.destroy');

//Rutas para el admin - servicios
Route::get('/admin/servicios', [App\Http\Controllers\ServicioController::class, 'index'])->name('admin.servicios.index')->middleware('auth','can:admin.servicios.index');
Route::put('/admin/servicios/{id}', [App\Http\Controllers\ServicioController::class, 'update'])->name('admin.servicios.update')->middleware('auth','can:admin.servicios.update');

Route::get('/doctor/{id}/tratamientos', function($id){

    $tratamientoIds = Servicio::where('doctor_id', $id)->pluck('tratamiento_id');

    return Tratamiento::whereIn('id', $tratamientoIds)->get();
});
