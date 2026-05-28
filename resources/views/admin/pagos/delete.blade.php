@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Pago</h1>
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
                    <form action="{{ url('admin/pagos/' . $pago->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Paciente</label><b>*</b>
                                    <select name="paciente_id" id="" class="form-control" disabled>
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}" @selected($pago->paciente_id == $paciente->id)>
                                                {{ $paciente->nombres . ' ' . $paciente->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Doctores</label><b>*</b>
                                    <select name="doctor_id" id="" class="form-control" disabled>
                                        @foreach ($doctores as $doctor)
                                            <option value="{{ $doctor->id }}" @selected($pago->doctor_id == $doctor->id)>
                                                {{ $doctor->nombres }}
                                                {{ $doctor->apellidos }} - {{ $doctor->especialidad }}</option>
                                        @endforeach
                                    </select>
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


                        </div>
                        <br>
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Fecha de pago</label>
                                    <input type="date" value="{{ $pago->fecha_pago }}" name="fecha_pago"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Tratamiento</label>
                                    <input type="text" id="nombre" name="tratamiento" value="{{ $pago->tratamiento }}"
                                        class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Costo</label>
                                    <input type="number" id="costo" name="costo" step="0.01"
                                        value="{{ $pago->costo }}" class="form-control" disabled>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Restante</label>
                                    <input type="number" name="pago" step="0.01" value="{{ $restante }}"
                                        class="form-control" disabled>

                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Observacion</label>
                                    <input type="text" name="observacion" value="{{ $pago->observacion }}"
                                        class="form-control" disabled>
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
