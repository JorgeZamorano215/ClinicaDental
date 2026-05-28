@extends('layouts.admin')
@section('content')
    <div class="row">
        <h1>Registro de un nuevo pago</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ url('admin/pagos/create') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Paciente</label><b>*</b>
                                    <select name="paciente_id" id="" class="form-control">
                                        @foreach ($pacientes as $paciente)
                                            <option value="{{ $paciente->id }}">
                                                {{ $paciente->nombres . ' ' . $paciente->apellidos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Doctores</label><b>*</b>
                                    <select name="doctor_id" id="doctor" class="form-control">
                                        @foreach ($doctores as $doctor)
                                            <option value="{{ $doctor->id }}">{{ $doctor->nombres }}
                                                {{ $doctor->apellidos }} - {{ $doctor->especialidad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {

                                    const doctorSelect = document.getElementById('doctor');
                                    const tratamientoSelect = document.getElementById('tratamiento');

                                    doctorSelect.addEventListener('change', function() {

                                        let doctorId = this.value;

                                        tratamientoSelect.innerHTML = '';

                                        if (!doctorId) return;

                                        fetch(`{{ url('doctor') }}/${doctorId}/tratamientos`)
                                            .then(response => response.json())
                                            .then(data => {

                                                console.log("DATOS:", data);

                                                data.forEach((tratamiento, index) => {

                                                    let option = document.createElement('option');
                                                    option.value = tratamiento.id;
                                                    option.textContent =
                                                    `${tratamiento.nombre} - $${tratamiento.costo}`;

                                                    option.dataset.nombre = tratamiento.nombre;
                                                    option.dataset.costo = tratamiento.costo;

                                                    if (index === 0) option.selected = true;

                                                    tratamientoSelect.appendChild(option);
                                                });

                                                // 👇 IMPORTANTE: dispara cambio para llenar inputs
                                                tratamientoSelect.dispatchEvent(new Event('change'));
                                            });
                                    });

                                    // 👇 dispara carga inicial
                                    doctorSelect.dispatchEvent(new Event('change'));
                                });
                            </script>
                            <div class="col-md-4">
                                <div class="form group">
                                    <label for="">Tratamiento</label><b>*</b>
                                    <select name="tratamiento_id" id="tratamiento" class="form-control">

                                    </select>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {

                                            const select = document.getElementById("tratamiento");
                                            const nombreInput = document.getElementById("nombre");
                                            const costoInput = document.getElementById("costo");

                                            function cargarDatos() {
                                                const selected = select.options[select.selectedIndex];

                                                nombreInput.value = selected.getAttribute("data-nombre");
                                                costoInput.value = selected.getAttribute("data-costo");
                                            }

                                            // Cuando cambia
                                            select.addEventListener("change", cargarDatos);

                                            // Cuando carga la página (primer valor)
                                            cargarDatos();
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3">
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
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Tratamiento</label><b>*</b>
                                    <input type="text" value="{{ old('tratamiento') }}" id="nombre"
                                        name="tratamiento" class="form-control" required>
                                    @error('tratamiento')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Costo</label><b>*</b>
                                    <input type="number" id="costo" name="costo" step="0.01" class="form-control"
                                        required>
                                    @error('costo')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form group">
                                    <label for="">Pago</label><b>*</b>
                                    <input type="number" name="pago" step="0.01" value="{{ old('pago') }}"
                                        class="form-control" required>
                                    @error('pago')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Observacion</label>
                                    <input type="text" name="observacion" value="{{ old('observacion') }}"
                                        class="form-control">
                                    @error('observacion')
                                        <small style="color:red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form group">
                                    <a href="{{ url('admin/pagos') }}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-primary">Registrar nuevo</button>
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
