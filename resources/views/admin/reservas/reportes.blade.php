@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Lista de reserva de citas medicas</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Generar reporte por fecha</h3><br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="from group">
                                <label for="">Fecha de inicio:</label>
                                <input type="date" value="{{ old('start', date('Y-m-d')) }}" name="start"
                                    class="form-control fecha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="from group">
                                <label for="">Fecha de Fin:</label>
                                <input type="date" value="{{ old('end', date('Y-m-d')) }}" name="end"
                                    class="form-control fecha">
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {

                                var tabla = null; // 🔥 guardamos la instancia

                                function inicializarDataTable() {

                                    if ($('#example1').length) {

                                        // 🔹 Si ya existe, destruir
                                        if ($.fn.DataTable.isDataTable('#example1')) {
                                            $('#example1').DataTable().destroy();
                                        }

                                        // 🔹 Crear nueva instancia
                                        tabla = $('#example1').DataTable({
                                            pageLength: 10,
                                            language: {
                                                emptyTable: "No hay información",
                                                info: "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                                infoEmpty: "Mostrando 0 a 0 de 0 Reservas",
                                                infoFiltered: "(Filtrado de _MAX_ total Reservas)",
                                                lengthMenu: "Mostrar _MENU_ Reservas",
                                                loadingRecords: "Cargando...",
                                                processing: "Procesando...",
                                                search: "Buscador:",
                                                zeroRecords: "Sin resultados encontrados",
                                                paginate: {
                                                    first: "Primero",
                                                    last: "Ultimo",
                                                    next: "Siguiente",
                                                    previous: "Anterior"
                                                }
                                            },
                                            responsive: true,
                                            lengthChange: true,
                                            autoWidth: false,
                                            buttons: [{
                                                    extend: 'collection',
                                                    text: 'Reportes',
                                                    buttons: ['copy', 'pdf', 'csv', 'excel', 'print']
                                                },
                                                {
                                                    extend: 'colvis',
                                                    text: 'Visor de columnas'
                                                }
                                            ]
                                        });

                                        // 🔹 Botones
                                        tabla.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                    }
                                }

                                function cargarReservas() {

                                    var fecha_inicio = $('input[name="start"]').val();
                                    var fecha_fin = $('input[name="end"]').val();

                                    if (fecha_inicio && fecha_fin) {

                                        $.ajax({
                                            url: "{{ route('admin.reservas.cargar_reservas') }}",
                                            type: 'GET',
                                            data: {
                                                start: fecha_inicio,
                                                end: fecha_fin
                                            },
                                            success: function(data) {

                                                // 🔹 Reemplazar tabla
                                                $('#reservas_info').html(data);

                                                // 🔹 Inicializar DataTable correctamente
                                                inicializarDataTable();
                                            },
                                            error: function(xhr) {

                                                if (xhr.status === 422) {

                                                    Swal.fire({
                                                        position: "top",
                                                        icon: "error",
                                                        title: xhr.responseJSON.mensaje,
                                                        showConfirmButton: false,
                                                        timer: 1500
                                                    });

                                                    let hoy = new Date().toISOString().split('T')[0];
                                                    $('input[name="start"]').val(hoy);
                                                    $('input[name="end"]').val(hoy); // 👈 importante también

                                                    // 🔥 VOLVER A CARGAR
                                                    cargarReservas();
                                                }
                                            }
                                        });
                                    }
                                }

                                // 🔹 Ejecutar al cargar
                                cargarReservas();

                                // 🔹 Ejecutar cuando cambie la fecha
                                $('.fecha').on('change', function() {
                                    cargarReservas();
                                });

                            });
                        </script>
                    </div>
                </div>


                <div class="card-body">
                    <div id='reservas_info'>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
