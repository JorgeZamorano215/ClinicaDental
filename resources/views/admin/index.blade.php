@extends('layouts.admin')
@section('content')
    <div class="row">
        <h3>
            <b>Hola, {{ Auth::user()->name }} 👋</b>
        </h3>
    </div>

    <hr>

    <div class="row">
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_usuarios }}</h3>

                        <p>Usuarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-file-person"></i>
                    </div>
                    <a href="{{ url('admin/usuarios') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.secretarias.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $total_secretarias }}</h3>

                        <p>Secretarias</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-person-circle"></i>
                    </div>
                    <a href="{{ url('admin/secretarias') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pacientes.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{ $total_pacientes }}</h3>

                        <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-person-fill-check"></i>
                    </div>
                    <a href="{{ url('admin/pacientes') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.consultorios.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_consultorios }}</h3>

                        <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-building-fill-add"></i>
                    </div>
                    <a href="{{ url('admin/consultorios') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.doctores.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_doctores }}</h3>

                        <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-person-lines-fill"></i>
                    </div>
                    <a href="{{ url('admin/doctores') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.tratamientos.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_tratamientos }}</h3>

                        <p>Tratamientos</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-capsule-pill"></i>
                    </div>
                    <a href="{{ url('admin/tratamientos') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.pagos.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_pagos }}</h3>

                        <p>Pagos</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-cash-coin"></i>
                    </div>
                    <a href="{{ url('admin/pagos') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan

        @can('admin.horarios.index')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $citas_hoy->count() }}</h3>

                        <p>Reservas</p>
                    </div>
                    <div class="icon">
                        <i class="ion bi bi-calendar-check"></i>
                    </div>
                    <a href="{{ url('/admin/reservas/reportes') }}" class="small-box-footer">Mas informacion <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan





    </div>

    @can('admin.horarios.index')
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="bi bi-calendar-check"></i> Citas de hoy</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                    <th>Motivo</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas_hoy as $cita)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($cita->start)->format('h:i A') }}</td>
                                        <td>{{ $cita->nombre }}</td>
                                        <td>{{ $cita->doctor->nombres }}</td>
                                        <td>{{ $cita->motivo }}</td>
                                        <td>
                                            @if ($cita->estado == '1')
                                                <span class="badge bg-primary">Programada</span>
                                            @elseif($cita->estado == '2')
                                                <span class="badge bg-success">Confirmada</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="bi bi-calendar-check"></i> Proximas citas</h3>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas_proximas as $cita)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($cita->start)->format('d/m/Y') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($cita->start)->format('h:i A') }}</td>
                                        <td>{{ $cita->nombre }}</td>
                                        <td>{{ $cita->doctor->nombres }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    @endcan


    <br>

    @can('cargar_reserva_doctores')
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de atencion de doctores</h3>

                            </div>
                            <div class="col-md-4">
                                <div style="float:right">
                                    <label for="">Consultorios</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="consultorio_id" id="consultorio_select" class="form-control">

                                    @foreach ($consultorios as $consultorio)
                                        <option value="{{ $consultorio->id }}">{{ $consultorio->nombre }} -
                                            {{ $consultorio->ubicacion }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>


                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <script>
                            $(document).ready(function() {

                                function cargarConsultorio() {
                                    var consultorio_id = $('#consultorio_select').val();

                                    var url = "{{ route('cargar_datos_consultorios', ':id') }}";
                                    url = url.replace(':id', consultorio_id);

                                    if (consultorio_id) {
                                        $.ajax({
                                            url: url,
                                            type: 'GET',
                                            success: function(data) {
                                                $('#consultorio_info').html(data);
                                            },
                                            error: function() {
                                                alert('Error al obtener los datos del consultorio');
                                            }
                                        });
                                    } else {
                                        $('#consultorio_info').html('');
                                    }
                                }

                                // 🔹 Ejecutar al entrar (AQUÍ ESTÁ LA CLAVE)
                                cargarConsultorio();

                                // 🔹 Ejecutar cuando cambie
                                $('#consultorio_select').on('change', function() {
                                    cargarConsultorio();
                                });

                            });
                        </script>
                        <br>
                        <div id='consultorio_info'>

                        </div>



                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reserva de citas medicas</h3>

                            </div>
                            <div class="col-md-4">
                                <div style="float:right">
                                    <label for="">Doctores</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <select name="doctor_id" id="doctor_select" class="form-control">

                                    @foreach ($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">
                                            {{ $doctor->nombres . ' ' . $doctor->apellidos . ' - ' . $doctor->especialidad }}
                                        </option>
                                    @endforeach
                                </select>
                                <script>
                                    $(document).ready(function() {

                                        function cargarDoctor() {
                                            var doctor_id = $('#doctor_select').val();

                                            var calendarEl = document.getElementById('calendar');
                                            var calendar = new FullCalendar.Calendar(calendarEl, {
                                                initialView: 'dayGridMonth',
                                                locale: 'es',
                                                events: [],
                                            });


                                            var url = "{{ route('cargar_reserva_doctores', ':id') }}";
                                            url = url.replace(':id', doctor_id);

                                            if (doctor_id) {
                                                $.ajax({
                                                    url: url,
                                                    type: 'GET',
                                                    dataType: 'json',
                                                    success: function(data) {
                                                        calendar.addEventSource(data);
                                                    },
                                                    error: function() {
                                                        alert('Error al obtener los datos del consultorio');
                                                    }
                                                });
                                            } else {
                                                $('#doctor_info').html('');
                                            }

                                            calendar.render();
                                        }

                                        // 🔹 Ejecutar al entrar (AQUÍ ESTÁ LA CLAVE)
                                        cargarDoctor();

                                        // 🔹 Ejecutar cuando cambie
                                        $('#doctor_select').on('change', function() {
                                            cargarDoctor();
                                        });

                                    });
                                </script>


                            </div>
                        </div>


                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Registrar cita medica
                            </button>



                            <!-- Modal -->
                            <form action="{{ url('admin/eventos/create') }}" method="POST">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Reserva de cita medica</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form group">
                                                            <label for="">Doctor</label>
                                                            <select name="doctor_id" id="doctor" class="form-control">
                                                                @foreach ($doctores as $doctor)
                                                                    <option value="{{ $doctor->id }}">
                                                                        {{ $doctor->nombres }}
                                                                        {{ $doctor->apellidos }} - {{ $doctor->especialidad }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form group">
                                                            <label for="">Motivo</label>
                                                            <select name="tratamiento" id="tratamiento"
                                                                class="form-control">
                                                                
                                                            </select>
                                                        </div>

                                                    </div>

                                                    <script>
                                                        document.getElementById('doctor').addEventListener('change', function() {

                                                            let doctorId = this.value;
                                                            let select = document.getElementById('tratamiento');

                                                            // limpiar select
                                                            select.innerHTML = '';

                                                            if (!doctorId) return;

                                                            fetch(`{{ url('doctor') }}/${doctorId}/tratamientos`)
                                                                .then(response => response.json())
                                                                .then(data => {

                                                                    console.log("DATOS:", data); // 👈 verifica aquí

                                                                    data.forEach(tratamiento => {
                                                                        let option = document.createElement('option');
                                                                        option.value = tratamiento.nombre;
                                                                        option.textContent = tratamiento.nombre;

                                                                        select.appendChild(option);
                                                                    });

                                                                })
                                                                .catch(error => console.error(error));
                                                        });

                                                        document.getElementById('doctor').dispatchEvent(new Event('change'));
                                                    </script>
                                                    <div class="col-md-12">
                                                        <div class="form group">
                                                            <label for="">Fecha de Reserva</label>


                                                            <input type="date" id="fecha_reserva" name="fecha_reserva"
                                                                min="{{ now()->toDateString() }}"
                                                                value="{{ old('fecha_reserva', now()->toDateString()) }}"
                                                                class="form-control" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form group">
                                                            <label for="">Hora de Reserva</label>
                                                            <input type="time" value="" id="hora_reserva"
                                                                name="hora_reserva" class="form-control" required>
                                                            @error('hora_reserva')
                                                                <small style="color:red">{{ $message }}</small>
                                                            @enderror
                                                            @if ($message = Session::get('hora_reserva'))
                                                                <script>
                                                                    document.addEventListener('DOMContentLoaded', function() {
                                                                        $('#exampleModal').modal('show');
                                                                    });
                                                                </script>
                                                                <small style="color:red">{{ $message }}</small>
                                                            @endif
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                    const horaReservaInput = document.getElementById('hora_reserva');
                                                                    horaReservaInput.addEventListener('change', function() {
                                                                        let seletedTime = this.value;
                                                                        if (seletedTime) {
                                                                            seletedTime = seletedTime.split(':');
                                                                            seletedTime = seletedTime[0] + ':00';
                                                                            this.value = seletedTime;
                                                                        }
                                                                        if (seletedTime < '08:00' || seletedTime > '20:00') {
                                                                            this.value = null;
                                                                            //alert('Porfavor ingrese un horario entre las 08:00 de la mañana y 20:00 de la tarde');
                                                                            Swal.fire({
                                                                                position: "center",
                                                                                icon: "warning",
                                                                                title: "Ingresa una hora valida",
                                                                                text: "Porfavor ingrese un horario entre las 08:00 de la mañana y 20:00 de la tarde",
                                                                                confirmButtonColor: "#3085d6"
                                                                                //showConfirmButton: true
                                                                            });
                                                                        };
                                                                    });
                                                                });
                                                            </script>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form group">
                                                            <label for="">Nombre</label><b>*</b>
                                                            <input type="text" value="{{ old('telefono') }}"
                                                                id="nombre" name="nombre" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form group">
                                                            <label for="">Telefono</label><b>*</b>
                                                            <input type="tel" value="{{ old('telefono') }}"
                                                                id="telefono" name="telefono" class="form-control"
                                                                pattern="[0-9]{10}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Registrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>

                        </div>


                        <div id='calendar'></div>

                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>
    @endcan

    @if (Auth::check() && Auth::user()->doctor)
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="bi bi-calendar-check"></i> Citas de hoy</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas_hoy as $cita)
                                    @if (Auth::user()->doctor->id == $cita->doctor_id)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($cita->start)->format('h:i A') }}</td>
                                            <td>{{ $cita->nombre }}</td>
                                            <td>{{ $cita->doctor->nombres }}</td>
                                            <td>
                                                @if ($cita->estado == '1')
                                                    <span class="badge bg-primary">Programada</span>
                                                @elseif($cita->estado == '2')
                                                    <span class="badge bg-success">Confirmada</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title"><i class="bi bi-calendar-check"></i> Proximas citas</h3>

                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Paciente</th>
                                    <th>Doctor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas_proximas as $cita)
                                    @if (Auth::user()->doctor->id == $cita->doctor_id)
                                        <tr>
                                            <td>{{ \Carbon\Carbon::parse($cita->start)->format('d/m/Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($cita->start)->format('h:i A') }}</td>
                                            <td>{{ $cita->nombre }}</td>
                                            <td>{{ $cita->doctor->nombres }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.col-md-6 -->
        </div>
    @endif
@endsection
