<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>
<body>

<h2>Dados Pessoais</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>CPF</th>
        <th>RG</th>
        <th>Data de Nascimento</th>
        <th>CEP</th>
        <th>Editar</th>
    </tr>

    @foreach($dadospessoais as $dadopessoal)
    <tr>
        <td>{{ $dadopessoal->id}}</td>
        <td>{{ $dadopessoal->CPF }}</td>
        <td>{{ $dadopessoal->RG }}</td>
        <td>{{ $dadopessoal->data_nascimento }}</td>
        <td>{{ $dadopessoal->CEP }}</td>
        <td>
            <a href="{{ route('dadospessoais.atualizar', $dadospessoais->id) }}">Editar</a>
        </td>

    </tr>
    @endforeach
</table>

</body>
</html>
