<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
</head>
<body>
    <h1>Relatório de Turmas</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NÚMERO DA SALA</th>
                <th>SÉRIE</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($turmas as $turma)
                <tr>
                    <td>{{ $turma->id }}</td>
                    <td>{{ $turma->numSala }}</td>
                    <td>{{ $turma->serie }}</td>
                    <td>
                        <a href="{{route('aluno.atualizar', $aluno->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{route('turma.deletar', $turma->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir?');">
                            @csrf 
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhuma Turma Encontrada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>