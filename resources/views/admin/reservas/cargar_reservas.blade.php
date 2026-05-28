<table id="example1" class="table table-striped table-bordered table-hover table-sm">
    <thead style="background-color: #c0c0c0">
        <tr>
            <td style="text-align: center"><b>Nro</b></td>
            <td style="text-align: center"><b>Doctor</b></td>
            <td style="text-align: center"><b>Fecha de reserva</b></td>
            <td style="text-align: center"><b>Hora de reserva</b></td>
            <td style="text-align: center"><b>Paciente</b></td>
            <td style="text-align: center"><b>Motivo</b></td>
            <td style="text-align: center"><b>Estado</b></td>
            <td style="text-align: center"><b>Fecha y hora de registro</b></td>
            <td style="text-align: center"><b>Opciones</b></td>
        </tr>
    </thead>
    <tbody>
        <?php $contador = 1; ?>
        @foreach ($eventos as $event)
            <tr>
                <td style="text-align: center">{{ $contador++ }}</td>
                <td>{{ $event->doctor->nombres . ' ' . $event->doctor->apellidos }}</td>
                <td style="text-align: center">
                    {{ \Carbon\Carbon::parse($event->start)->format('Y-m-d') }}</td>
                <td style="text-align: center">
                    {{ \Carbon\Carbon::parse($event->start)->format('H:i A') }}</td>
                <td style="text-align: center">
                    {{ $event->nombre }}<br>
                    {{ $event->telefono }}
                </td>
                <td style="text-align: center">
                    {{ $event->motivo }}
                </td>
                <td style="text-align: center">
                    @if ($event->estado == '1')
                        <span class="badge bg-primary">Programada</span>
                    @elseif($event->estado == '2')
                        <span class="badge bg-success">Confirmada</span>
                    @endif
                </td>
                <td style="text-align: center">
                    {{ \Carbon\Carbon::parse($event->created_at)->format('Y-m-d h:i A') }}
                </td>
                <td style="text-align: center">

                    @if ($event->estado == '1')
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <form action="{{ url('/admin/reservas', $event->id) }}" id="formularioConfirmacion{{ $event->id }}"
                                onclick="preguntarConfirmacion{{ $event->id }}(event)" method="POST">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">
                                    <i class="bi bi-calendar2-check"> Confirmar</i>
                                </button>

                            </form>
                            <script>
                                function preguntarConfirmacion{{ $event->id }}(event) {
                                    event.preventDefault();

                                    Swal.fire({
                                        title: "Confirmar asistencia del paciente",
                                        text: "Esta acción marcará la cita como confirmada. ¿Deseas continuar?",
                                        icon: "question",
                                        showCancelButton: true,
                                        confirmButtonColor: "#0d6efd",
                                        //confirmButtonColor: "#3085d6",
                                        //cancelButtonColor: "#d33",
                                        confirmButtonText: "Si, confirmar",
                                        cancelButtonText: "Cancelar"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            var form = $('#formularioConfirmacion{{ $event->id }}');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>
                        </div>
                        
                    @endif

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <form action="{{ url('/admin/reservas', $event->id) }}" id="formulario{{ $event->id }}"
                            onclick="preguntar{{ $event->id }}(event)" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="bi bi-calendar2-x"> Cancelar</i>
                            </button>

                        </form>
                        <script>
                            function preguntar{{ $event->id }}(event) {
                                event.preventDefault();

                                Swal.fire({
                                    title: "¿Esta seguro de eliminar este registro de reserva?",
                                    text: "Si eliminas este registro, otro usuario podra reservar en estes mismo horario",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#d33",
                                    //confirmButtonColor: "#3085d6",
                                    //cancelButtonColor: "#d33",
                                    confirmButtonText: "Eliminar",
                                    cancelButtonText: "Cancelar"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var form = $('#formulario{{ $event->id }}');
                                        form.submit();
                                    }
                                });
                            }
                        </script>
                    </div>

                    @php
                        $fecha = \Carbon\Carbon::parse($event->start);

                        $mensaje =
                            "Hola {$event->nombre}, te recordamos tu cita con el Dr. {$event->doctor->nombres} el día " .
                            $fecha->translatedFormat('d \\d\\e F') .
                            ' a las ' .
                            $fecha->format('h:i A') .
                            '. Te pedimos confirmar tu asistencia respondiendo a este mensaje. ¡Gracias!';

                    @endphp

                    <a href="https://wa.me/52{{ $event->telefono }}?text={{ urlencode($mensaje) }}" type="button"
                        class="btn btn-primary btn-sm">
                        <i class="bi bi-whatsapp"></i> Recordatorio
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
