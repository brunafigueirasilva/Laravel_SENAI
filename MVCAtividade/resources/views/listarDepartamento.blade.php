<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>
<body>

<h2>Departamentos</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Data de Criação</th>
        <th>Orçamento</th>
        <th>Sigla</th>
        <th>Editar</th>
    </tr>

    @foreach($departamentos as $departamento)
    <tr>
        <td>{{ $departamento->id}}</td>
        <td>{{ $departamento->nome }}</td>
        <td>{{ $departamento->data_criacao }}</td>
        <td>{{ $departamento->orcamento }}</td>
        <td>{{ $departamento->sigla }}</td>
        <td>
        <a href="{{ route('departamento.atualizar', $departamento->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>