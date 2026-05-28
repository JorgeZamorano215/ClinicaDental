@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Pago</h1>
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
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Paciente</label>
                                <p>{{ $pago->paciente->nombres . ' ' . $pago->paciente->apellidos }}</p>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Doctores</label>
                                <p>{{ $pago->doctor->nombres . ' ' . $pago->doctor->apellidos }}</p>

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Estado</label>
                                <br>
                                @if ($pago->estado == '1')
                                    <span class="badge bg-success">Pagado</span>
                                @elseif($pago->estado == '0')
                                    <span class="badge bg-warning">Pendiente</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                @if ($pago->estado == '0')
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#exampleModal">
                                        <i class="bi bi-cash-coin"></i> Cobrar
                                    </button>



                                    <!-- Modal -->
                                    <form action="{{ url('/admin/tpagos/create') }}" method="POST">
                                        @csrf
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Pago</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form group">
                                                                    <label for="">Fecha de Pago</label><b>*</b>
                                                                    <input type="date"
                                                                        value="{{ old('fecha_pago', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                                                        name="fecha_pago" class="form-control" required>
                                                                    @error('fecha_pago')
                                                                        <small style="color:red">{{ $message }}</small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form group">
                                                                    <label for="">Pago</label><b>*</b>
                                                                    <input type="number" id="pago" name="pago"
                                                                        step="0.01" class="form-control" required>
                                                                    @error('pago')
                                                                        <small style="color:red">{{ $message }}</small>
                                                                    @enderror
                                                                    @if ($errors->has('pago'))
                                                                        <script>
                                                                            document.addEventListener('DOMContentLoaded', function() {
                                                                                $('#exampleModal').modal('show');
                                                                            });
                                                                        </script>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="restante"
                                                                value="{{ $restante }}">
                                                            <input type="hidden" name="pago_id"
                                                                value="{{ $pago->id }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Fecha de pago</label>
                                <p>{{ $pago->fecha_pago }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Tratamiento</label>
                                <p>{{ $pago->tratamiento }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Costo</label>
                                <p>${{ $pago->costo }}</p>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Restante</label>
                                <p>${{ number_format($restante, 2) }}</p>

                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form group">
                                <label for="">Observacion</label>
                                <p>{{ $pago->observacion }}</p>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">

                        <!-- /.col-md-6 -->
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <h3 class="card-title"><i class="bi bi-cash-stack"></i> Pagos registrados</h3>
                                    <div class="card-tools">
                                        <h3 class="card-title"><b>Total: </b> ${{ number_format($totalPagos, 2) }}
                                        </h3>
                                    </div>

                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-striped table-valign-middle">
                                        <thead>
                                            <tr>
                                                <th>Nro</th>
                                                <th>Fecha</th>
                                                <th>Pago</th>
                                                <th>Recibio</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $contador = 1; ?>
                                            @foreach ($pagos as $movimiento)
                                                <tr>
                                                    <td style="text-align: center">{{ $contador++ }}</td>
                                                    <td>{{ $movimiento->fecha_pago }}</td>
                                                    <td>${{ $movimiento->pago }}</td>
                                                    <td>{{ $movimiento->user->name }}</td>
                                                    <td>
                                                        <div class="btn-group" role="group" aria-label="Basic example">
                                                            <form action="{{ url('/admin/tpagos', $movimiento->id) }}"
                                                                id="formulario{{ $movimiento->id }}"
                                                                onclick="preguntar{{ $movimiento->id }}(event)"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash"></i>
                                                                </button>

                                                            </form>
                                                            <script>
                                                                function preguntar{{ $movimiento->id }}(event) {
                                                                    event.preventDefault();

                                                                    Swal.fire({
                                                                        title: "¿Esta seguro de eliminar este pago?",
                                                                        text: "Esta acción recalculará el saldo pendiente de la cuenta.",
                                                                        icon: "warning",
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: "#d33",
                                                                        //confirmButtonColor: "#3085d6",
                                                                        //cancelButtonColor: "#d33",
                                                                        confirmButtonText: "Eliminar",
                                                                        cancelButtonText: "Cancelar"
                                                                    }).then((result) => {
                                                                        if (result.isConfirmed) {
                                                                            var form = $('#formulario{{ $movimiento->id }}');
                                                                            form.submit();
                                                                        }
                                                                    });
                                                                }
                                                            </script>
                                                        </div>

                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            data-toggle="modal" data-target="#exampleModal{{ $movimiento->id }}">
                                                            <i class="bi bi-pencil"></i>
                                                        </button>



                                                        <!-- Modal -->
                                                        <form action="{{ url('/admin/tpagos/'.$movimiento->id) }}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal fade" id="exampleModal{{ $movimiento->id }}" tabindex="-1"
                                                                role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleModalLabel">Modificar pago</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form group">
                                                                                        <label for="">Fecha de
                                                                                            Pago</label><b>*</b>
                                                                                        <input type="date"
                                                                                            value="{{ $movimiento->fecha_pago }}"
                                                                                            name="fecha_pago"
                                                                                            class="form-control" required>
                                                                                        @error('fecha_pago')
                                                                                            <small
                                                                                                style="color:red">{{ $message }}</small>
                                                                                        @enderror
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form group">
                                                                                        <label
                                                                                            for="">Pago</label><b>*</b>
                                                                                        <input type="number"
                                                                                            id="pago" value="{{ old('pago', $movimiento->pago) }}" name="pago"
                                                                                            step="0.01"
                                                                                            class="form-control" required>
                                                                                        @error('pago')
                                                                                            <small
                                                                                                style="color:red">{{ $message }}</small>
                                                                                        @enderror
                                                                                        @if ($errors->has('pago') && session('modal_id') == $movimiento->id)
                                                                                            <script>
                                                                                                document.addEventListener('DOMContentLoaded', function() {
                                                                                                    $('#exampleModal{{ $movimiento->id }}').modal('show');
                                                                                                });
                                                                                            </script>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>

                                                                                <input type="hidden" name="restante"
                                                                                    value="{{ $restante }}">
                                                                                <input type="hidden" name="pago_id"
                                                                                    value="{{ $pago->id }}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancelar</button>
                                                                            <button type="submit"
                                                                                class="btn btn-warning">Actualizar registro</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form group">
                                <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Volver</a>
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
