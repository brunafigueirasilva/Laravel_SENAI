<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SETOR</title>
</head>
<body>
    <h1>Relatório de SETOR</h1>
    <a href="{{route('aluno.cadastro')}}">Cadastrar Aluno</a>
    <br>
    <a href="{{route('informacao.cadastro')}}">Cadastrar Informações</a>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>ENDEREÇO</th>
                <th>TELEFONE</th>
                <th>IDADE</th>
                <th>DATA</th>
            </tr>
        </thead>
        <tbody>
            @forelse($informacoes as $informacao)
                <tr>
                    <td>{{ $informacao->id }}</td>
                    <td>{{ $informacao->endereco }}</td>
                    <td>{{ $informacao->telefone }}</td>
                    <td>{{ $informacao->idade}}</td>
                    <td>{{ $informacao->data }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhuma Informacão encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>