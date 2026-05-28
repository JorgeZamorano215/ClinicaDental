@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Eliminar configuracion: {{ $configuracion->nombre }}</h1>
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
                    <form action="{{ url('admin/configuraciones/'.$configuracion->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre de la clinica</label>
                                            <input type="text" value="{{ $configuracion->nombre }}" name="nombre"
                                                class="form-control" disabled>
                                            @error('nombre')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Direccion</label>
                                            <input type="address" value="{{ $configuracion->direccion }}" name="direccion"
                                                class="form-control" disabled>
                                            @error('direccion')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Telefono</label>
                                            <input type="text" value="{{ $configuracion->telefono }}" name="telefono"
                                                class="form-control" disabled>
                                            @error('telefono')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Correo</label>
                                            <input type="email" value="{{ $configuracion->correo }}" name="correo"
                                                class="form-control" disabled>
                                            @error('correo')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!--Imagen-->
                                <div class="form-group">
                                    <label for="">Logotipo</label>
                                    <br>
                                    {{--Visualizar la Imagen--}}
                                    <center>
                                        <img src="{{url('storage/'.$configuracion->logo)}}" alt="logo" width="100px">
                                    </center>
                                    
                                </div>
                            </div>



                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Cancelar</a>
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
