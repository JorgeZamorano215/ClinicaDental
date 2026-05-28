@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Servicios</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-10">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Asignar tratamientos</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row"></div>
                    <form method="GET" action="{{ route('admin.servicios.index') }}">
                        <label>Doctor</label>
                        <select name="doctor_id" class="form-control" onchange="this.form.submit()">
                            @foreach($doctores as $doc)
                                <option value="{{ $doc->id }}"
                                    {{ $doctorId == $doc->id ? 'selected' : '' }}>
                                    {{ $doc->nombres." ".$doc->apellidos." - ".$doc->especialidad }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                    <br>
                    <form action="{{ url('admin/servicios/'.$doctorId ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <input type="hidden" name="doctor_id" value="{{ $doctorId }}">
                            @foreach($tratamientos as $tratamiento)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                            type="checkbox"
                                            name="tratamientos[]"
                                            value="{{ $tratamiento->id }}"
                                            id="tratamiento{{ $tratamiento->id }}"
                                            {{ $servicios->contains($tratamiento->id) ? 'checked' : '' }}>

                                        <label class="form-check-label" for="tratamiento{{ $tratamiento->id }}">
                                            {{ $tratamiento->nombre }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/servicios?doctor_id='.$doctorId) }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

    </div>
@endsection
