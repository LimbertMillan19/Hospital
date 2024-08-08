<!DOCTYPE html>
<html>
<head>
    <title>Lista de Artículos</title>
</head>
<body>
    <h1>Lista de Artículos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>              
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>