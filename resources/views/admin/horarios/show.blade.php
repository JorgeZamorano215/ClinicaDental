@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos del horario</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos Registrados</h3>
                </div>


                <div class="card-body row">
                    <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Consultorios</label>
                                            <p>{{$horario->consultorio->nombre." - ".$horario->consultorio->ubicacion}}</p>
                                            
                                            <script>
                                                $(document).ready(function() {

                                                    function cargarConsultorio() {
                                                        var consultorio_id = "{{ $horario->consultorio_id }}";

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

                                                    

                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Doctores</label>
                                        <p>
                                            {{ $horario->doctor->nombres ." ". $horario->doctor->apellidos ." - ". $horario->doctor->especialidad }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Dia</label>
                                        <p>{{ $horario->dia }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label>
                                        <p>{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i A') }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                

                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Final</label>
                                        <p>{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i A') }}</p>
                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <a href="{{ url('admin/horarios') }}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>
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
