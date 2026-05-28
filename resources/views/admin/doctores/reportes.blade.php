@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Reportes de doctores</h1>
    </div>

    <hr>

    <div class="row">
          <div class="col-md-4">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title"Generar reporte</h3>

                
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="{{url('/admin/doctores/pdf')}}" class="btn btn-success"><i class="bi bi-printer"></i>Listado del personal medico</a>
                
                

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
        </div>

@endsection