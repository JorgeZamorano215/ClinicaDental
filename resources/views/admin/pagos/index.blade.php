@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Listado pagos</h1>
    </div>

    <br>

    <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-primary">
              <div class="card-header">
                <h3 class="card-title">Pagos registrados</h3>

                <div class="card-tools">
                  <a href="{{url('admin/pagos/create')}}" class="btn btn-primary">
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
                            <td style="text-align: center"><b>Paciente</b></td>
                            <td style="text-align: center"><b>Doctor</b></td>
                            <td style="text-align: center"><b>Fecha de Pago</b></td>
                            <td style="text-align: center"><b>Tratamiento</b></td>
                            <td style="text-align: center"><b>Monto</b></td>
                            <td style="text-align: center"><b>Estado</b></td>
                            <td style="text-align: center"><b>Acciones</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $contador = 1; ?>
                        @foreach($pagos as $pago)
                        <tr>
                            <td style="text-align: center">{{$contador++}}</td>
                            <td>{{$pago->paciente->nombres." ".$pago->paciente->apellidos}}</td>
                            <td>{{$pago->doctor->nombres." ".$pago->doctor->apellidos}}</td>
                            <td>{{$pago->fecha_pago}}</td>
                            <td>{{$pago->tratamiento}}</td>
                            <td>{{$pago->costo}}</td>
                            <td>
                                @if ($pago->estado == '1')
                                    <span class="badge bg-success">Pagado</span>
                                @elseif($pago->estado == '0')
                                    <span class="badge bg-warning">Pendiente</span>
                                @endif
                            </td>
                            <td style="text-align: center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{url('admin/pagos/'.$pago->id)}}" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                <a href="{{url('admin/pagos/'.$pago->id.'/edit')}}" type="button" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
                                <a href="{{url('admin/pagos/'.$pago->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a>
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
                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
                                    "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                                    "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                                    "infoPostFix": "",
                                    "thousands": ",",
                                    "lengthMenu": "Mostrar _MENU_ Pagos",
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