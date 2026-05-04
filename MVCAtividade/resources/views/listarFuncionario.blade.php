<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>
<body>

<h2>Funcionários</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Cargo</th>
        <th>Email</th>
        <th>Admissão</th>
        <th>Salário</th>
        <th>Editar</th>
    </tr>

    @foreach($funcionarios as $funcionario)
    <tr>
        <td>{{ $funcionario->id}}</td>
        <td>{{ $funcionario->nome }}</td>
        <td>{{ $funcionario->sobrenome }}</td>
        <td>{{ $funcionario->cargo }}</td>
        <td>{{ $funcionario->email }}</td>
        <td>{{ $funcionario->data_admissao }}</td>
        <td>{{ $funcionario->salario }}</td>
        <td>
            <a href="{{ route('funcionario.atualizar', $funcionario->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</table>
</body>
</html>