<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>
<body>
    <h1>Relatório de Autores</h1>
    <a href="{{route('autor.cadastro')}}">Cadastrar Autor</a>
    <br><br>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA DE NASCIMENTO</th>
                <th>EMAIL</th>
                <th>TELEFONE</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($autors as $autor)
                <tr>
                    <td>{{ $autor->id }}</td>
                    <td>{{ $autor->nome }}</td>
                    <td>{{ $autor->data_nascimento }}</td>
                    <td>{{ $autor->email }}</td>
                    <td>{{ $autor->telefone }}</td>
                    <td>
                        <a href="{{route('autor.atualizar', $autor->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('autor.deletar', $autor->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Autor encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>