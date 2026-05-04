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
        <th>Nome</th>
        <th>Data de Criação</th>
        <th>Orçamento</th>
        <th>Sigla</th>
    </tr>

    @foreach($funcionarios as $funcionario)
    <tr>
        <td>{{ $funcionario->$departamento->nome }}</td>
        <td>{{ $funcionario->$departamento->data_criacao }}</td>
        <td>{{ $funcionario->$departamento->orcamento }}</td>
        <td>{{ $funcionario->$departamento->sigla }}</td>
        <td>
        <a href="{{ route('funcionario.atualizar', $funcionario->id) }}">Editar</a>
        </td>
    </tr>
    @endforeach
</table>

<table border="1" cellpadding="10">
    <tr>
        <th>Nome</th>
        <th>Sobrenome</th>
        <th>Cargo</th>
        <th>Email</th>
        <th>Admissão</th>
        <th>Salário</th>
    </tr>

    @foreach($funcionarios as $funcionario)
    <tr>
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
<table border="1" cellpadding="10">
    <tr>
        <th>CPF</th>
        <th>RG</th>
        <th>Data de Nascimento</th>
        <th>CEP</th>
    </tr>

    @foreach($funcionarios as $funcionario)
    <tr>
        <td>{{ $funcionario->dadopessoal->CPF }}</td>
        <td>{{ $funcionario->$dadopessoal->RG }}</td>
        <td>{{ $funcionario->$dadopessoal->data_nascimento }}</td>
        <td>{{ $funcionario->$dadopessoal->CEP }}</td>
        <td>
            <a href="{{ route('dadospessoais.atualizar', $dadospessoais->id) }}">Editar</a>
        </td>

    </tr>
    @endforeach
</table>

</body>
</html>