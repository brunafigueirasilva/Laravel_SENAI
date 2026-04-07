<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Setores</title>
</head>
<body>

<h1>Relatório de Setores</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>CORREDOR</th>
        </tr>
    </thead>

    <tbody>
        @forelse($setores as $setor)
            <tr>
                <td>{{ $setor->id }}</td>
                <td>{{ $setor->nome }}</td>
                <td>{{ $setor->ncorredor }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhum setor encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>