@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Datos de la configuracion: {{ $configuracion->nombre }} </h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Nombre de la clinica</label>
                                            <p>{{ $configuracion->nombre }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Direccion</label>
                                            <p>{{ $configuracion->direccion }}</p>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Telefono</label>
                                            <p>{{ $configuracion->telefono }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form group">
                                            <label for="">Correo</label>
                                            <p>{{ $configuracion->correo }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <!--Imagen-->
                                <div class="form-group">
                                    <label for="">Logotipo</label>
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
                                    <a href="{{ url('admin/configuraciones') }}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>
                    


                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->

    </div>
@endsection
