<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Paciente</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 14px;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            text-align: left;
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Información del Paciente</h1>
    <table>
        <tr>
            <th>Nombre Completo</th>
            <td>{{ $paciente->nombre_completo }}</td>
        </tr>
        <tr>
            <th>Edad</th>
            <td>{{ $paciente->edad }}</td>
        </tr>
        <tr>
            <th>Sexo</th>
            <td>{{ $paciente->sexo }}</td>
        </tr>
        <tr>
            <th>Fecha de Nacimiento</th>
            <td>{{ $paciente->fecha_nacimiento }}</td>
        </tr>
        <tr>
            <th>Ciudad de Origen</th>
            <td>{{ $paciente->ciudad_origen }}</td>
        </tr>
        <tr>
            <th>Fecha de Inscripción</th>
            <td>{{ $paciente->fecha_inscripcion }}</td>
        </tr>
        <tr>
            <th>Hospital</th>
            <td>{{ $paciente->hospital->nombre }}</td>
        </tr>
        <tr>
            <th>Nombre del Tutor</th>
            <td>{{ $paciente->nombre_tutor }}</td>
        </tr>
        <tr>
            <th>Teléfono del Tutor</th>
            <td>{{ $paciente->telefono_tutor }}</td>
        </tr>
    </table>
</body>
</html>
