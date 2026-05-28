@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Horario registrado</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>
                </div>


                <div class="card-body row">
                    <div class="col-md-3">
                        <form action="{{ url('admin/horarios/' . $horario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form group">
                                            <label for="">Consultorios</label>
                                            <select name="consultorio_id" id="consultorio_select" class="form-control"
                                                disabled>
                                                <option value="{{ $horario->consultorio->id }}">
                                                    {{ $horario->consultorio->nombre }} -
                                                    {{ $horario->consultorio->ubicacion }}
                                                </option>

                                            </select>

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
                                        <label for="">Doctores</label>
                                        <select name="doctor_id" id="" class="form-control" disabled>
                                            <option value="{{ $horario->doctor->id }}">
                                                {{ $horario->doctor->nombres }} {{ $horario->doctor->apellidos }} -
                                                {{ $horario->doctor->especialidad }}
                                            </option>
                                        </select>
                                        

                                    </div>
                                </div>


                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Dia</label>
                                        <select name="dia" class="form-control" disabled>
                                            <option value="{{ $horario->dia }}">
                                                {{ $horario->dia }}
                                            </option>
                                        </select>
                                        
                                    </div>
                                </div>



                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form group">
                                        <label for="">Hora Inicio</label>
                                        <input type="time"
                                            value="{{ \Carbon\Carbon::parse($horario->hora_inicio)->format('H:i') }}"
                                            name="hora_inicio" class="form-control" disabled>
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
                                        <label for="">Hora Final</label>
                                        <input type="time"
                                            value="{{ \Carbon\Carbon::parse($horario->hora_fin)->format('H:i') }}"
                                            name="hora_fin" class="form-control" disabled>
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
                                        <button type="submit" class="btn btn-danger">Eliminar registro</button>
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
