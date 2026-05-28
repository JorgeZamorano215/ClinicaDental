@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Modificar un Horario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>


                <div class="card-body row">
                    <div class="col-md-3">
                        <form action="{{ url('admin/horarios/' . $horario->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Consultorios</label><b>*</b>
                                            <select name="consultorio_id" id="consultorio_select" class="form-control">
                                                @foreach ($consultorios as $consultorio)
                                                    <option value="{{ $consultorio->id }}" @selected($horario->consultorio_id == $consultorio->id)>
                                                        {{ $consultorio->nombre }} - {{ $consultorio->ubicacion }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            <!-- Esto es un comentario
                                                                <script>
                                                                    $('#consultorio_select').on('change', function() {
                                                                        var consultorio_id = $('#consultorio_select').val();
                                                                        //alert(consultorio_id);
                                                                        var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
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

                                                                            // 🔹 Cuando cambie
                                                                            $('#consultorio_select').on('change', function() {
                                                                                cargarConsultorio();
                                                                            });

                                                                            // 🔹 Cuando carga la página (ESTO ES LO QUE TE FALTA)
                                                                            cargarConsultorio();

                                                                        } else {
                                                                            $('#consultorio_info').html('');
                                                                        }
                                                                    });
                                                                </script>
                                                                -->
                                            <script>
                                                $(document).ready(function() {

                                                    function cargarConsultorio() {
                                                        var consultorio_id = $('#consultorio_select').val();

                                                        var url = "{{ route('admin.horarios.cargar_datos_consultorios', ':id') }}";
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
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Doctores</label><b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach ($doctores as $doctor)
                                                <option value="{{ $doctor->id }}" @selected($horario->doctor_id == $doctor->id)>
                                                    {{ $doctor->nombres }} {{ $doctor->apellidos }} -
                                                    {{ $doctor->especialidad }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Dia</label><b>*</b>
                                        <select name="dia" class="form-control">
                                            @foreach (['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'] as $dia)
                                                <option value="{{ $dia }}" @selected($horario->dia == $dia)>
                                                    {{ $dia }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label><b>*</b>
                                        <input type="time"
                                            value="{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}"
                                            name="hora_inicio" class="form-control" required>
                                        @error('hora_inicio')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Final</label><b>*</b>
                                        <input type="time"
                                            value="{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}"
                                            name="hora_fin" class="form-control" required>
                                        @error('hora_fin')
                                            <small style="color:red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-warning">Actualizar registro</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-9">
                        <div id='consultorio_info'>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
