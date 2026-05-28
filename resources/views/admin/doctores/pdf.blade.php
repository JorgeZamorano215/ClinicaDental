<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 10pt;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background-color: #e7e7e7;
            text-align: center;
            font-weight: bold;
        }

        td {
            text-align: left;
        }

        /* Rayado tipo Bootstrap */
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Centrar columna Nro */
        .text-center {
            text-align: center;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
    <table style="width: 100%; font-size: 9pt; border-bottom: 1px solid #000; margin-bottom: 10px;">
        <tr>
            <!-- DATOS -->
            <td style="width: 60%; text-align: left;">
                <strong style="font-size: 12pt;">
                    {{ $configuracion->nombre }}
                </strong><br>
                {{ $configuracion->direccion }}<br>
                Tel: {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo }}
            </td>

            <!-- LOGO -->
            <td style="width: 40%; text-align: right;">
                
            </td>
        </tr>
    </table>
    <br>
    <h2 style="text-align: center"><u>Listado del personal medico</u></h2>
    <br>
    <table>
        <thead>
            <tr>
                <th>Nro</th>
                <th>Doctor</th>
                <th>Telefono</th>
                <th>Licencia Medica</th>
                <th>Especialidad</th>
            </tr>
        </thead>
        <tbody>
            <?php $contador = 1; ?>
            @foreach ($doctores as $doctor)
                <tr>
                    <td class="text-center">{{ $contador++ }}</td>
                    <td>{{ $doctor->nombres }} {{ $doctor->apellidos }}</td>
                    <td>{{ $doctor->telefono }}</td>
                    <td>{{ $doctor->licencia_medica }}</td>
                    <td>{{ $doctor->especialidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
