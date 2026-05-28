@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Consultorio: {{$consultorio->nombre}}</h1>
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
                <form action="{{url('admin/consultorios/'.$consultorio->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre del consultorio</label>
                                <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control" disabled>
                                @error('nombre')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Ubicacion</label>
                                <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" disabled>
                                @error('ubicacion')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Capacidad</label>
                                <input type="text" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" disabled>
                                @error('capacidad')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Telefono</label>
                                <input type="text" value="{{$consultorio->telefono}}" name="telefono" class="form-control" disabled>
                                
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form group">
                                <label for="">Especialidad</label>
                                <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" disabled>
                                @error('especialidad')
                                    <small style="color:red">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Estado</label>
                                <select name="estado" id="" class="form-control" disabled>
                                    @if ($consultorio->estado == 'ACTIVO')
                                        <option value="ACTIVO">ACTIVO</option>
                                        <option value="INACTIVO">INACTIVO</option>
                                    @else
                                        <option value="INACTIVO">INACTIVO</option>
                                        <option value="ACTIVO">ACTIVO</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
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