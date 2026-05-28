@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Paciente: {{$paciente->nombres}} {{$paciente->apellidos}}</h1>
    </div>

    <hr>

    <div class="row">
          <div class="col-md-12">
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">¿Esta seguro de eliminar este registro?</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="{{url('admin/pacientes/'.$paciente->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombres</label>
                                <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" disabled>
                                @error('nombres')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Apellidos</label>
                                <input type="text" value="{{$paciente->apellidos}}" name="apellidos" class="form-control" disabled>
                                @error('apellidos')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">CURP</label>
                                <input type="text" value="{{$paciente->curp}}" name="curp" class="form-control" disabled>
                                @error('curp')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nro de seguro</label>
                                <input type="text" value="{{$paciente->nro_seguro}}" name="nro_seguro" class="form-control" disabled>
                                @error('nro_seguro')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Fecha de Nacimiento</label>
                                <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                                @error('fecha_nacimiento')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Genero</label>
                                <select name="genero" id="" class="form-control" disabled>
                                    
                                    @if ($paciente->genero=='M')
                                        <option value="Masculino">Masculino</option>
                                    @else 
                                        <option value="Femenino">Femenino</option> 
                                    @endif
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{$paciente->celular}}" name="celular" class="form-control" disabled>
                                @error('celular')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Correo</label><b>*</b>
                                <input type="email" value="{{$paciente->correo}}" name="correo" class="form-control" disabled>
                                @error('correo')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div> 
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Direccion</label>
                                <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" disabled>
                                @error('direccion')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Grupo sanguineo</label>
                                <select name="grupo_sanguineo" id="" class="form-control" disabled>
                                    <option value="A+" @selected($paciente->grupo_sanguineo == 'A+')>A+</option>
                                    <option value="A-" @selected($paciente->grupo_sanguineo == 'A-')>A-</option>
                                    <option value="B+" @selected($paciente->grupo_sanguineo == 'B+')>B+</option>
                                    <option value="B-" @selected($paciente->grupo_sanguineo == 'B-')>B-</option>
                                    <option value="O+" @selected($paciente->grupo_sanguineo == 'O+')>O+</option>
                                    <option value="O-" @selected($paciente->grupo_sanguineo == 'O-')>O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Alergias</label>
                                <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control" disabled>
                                @error('alergias')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Contacto de emergencia</label>
                                <input type="text" value="{{$paciente->contacto_emergencia}}" name="contacto_emergencia" class="form-control" disabled>
                                @error('contacto_emergencia')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form group">
                                <label for="">Observaciones</label>
                                <input type="text" value="{{$paciente->observaciones}}" name="observaciones" class="form-control" disabled>
                                @error('observaciones')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-danger">Eliminar registro</button>
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