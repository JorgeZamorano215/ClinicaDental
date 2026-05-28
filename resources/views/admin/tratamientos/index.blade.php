@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado de tratamientos</h1>
    </div>

    <br>

    <div class="row">
          <div class="col-md-10">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Tratamientos registrados</h3>

                <div class="card-tools">
                  <a href="{{url('admin/tratamientos/create')}}" class="btn btn-primary">
                    Registrar Nuevo
                </a>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                    <thead style="background-color: #c0c0c0">
                        <tr>
                            <td style="text-align: center"><b>Nro</b></td>
                            <td style="text-align: center"><b>Tratamiento</b></td>
                            <td style="text-align: center"><b>Costo</b></td>
                            <td style="text-align: center"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($tratamientos as $tratamiento)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$tratamiento->nombre}}</td>
                            <td>${{$tratamiento->costo}}</td>
                            <td style="text-align: center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{url('admin/tratamientos/'.$tratamiento->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{url('admin/tratamientos/'.$tratamiento->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="{{url('admin/tratamientos/'.$tratamiento->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <script>
                        $(function () {
                            $("#example1").DataTable({
                                "pageLength": 10,
                                "language": {
                                    "emptyTable": "No hay información",
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Tratamientos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Tratamientos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Tratamientos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Tratamientos",
                                    "loadingRecords": "Cargando...",
                                    "processing": "Procesando...",
                                    "search": "Buscador:",
                                    "zeroRecords": "Sin resultados encontrados",
                                    "paginate": {
                                        "first": "Primero",
                                        "last": "Ultimo",
                                        "next": "Siguiente",
                                        "previous": "Anterior"
                                    }
                                },
                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                buttons: [{
                                    extend: 'collection',
                                    text: 'Reportes',
                                    orientation: 'landscape',
                                    buttons: [{
                                        text: 'Copiar',
                                        extend: 'copy',
                                    }, {
                                        extend: 'pdf'
                                    },{
                                        extend: 'csv'
                                    },{
                                        extend: 'excel'
                                    },{
                                        text: 'Imprimir',
                                        extend: 'print'
                                    }
                                    ]
                                },
                                    {
                                        extend: 'colvis',
                                        text: 'Visor de columnas',
                                        collectionLayout: 'fixed three-column'
                                    }
                                ],
                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                        });
                    </script>
      </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
         
        </div>
    

@endsection