<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Relatório de Filmes</h1>
    <a href="{{route('filme.cadastro')}}">Cadastrar Filme</a>
    <br><br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>DATA DE LANÇAMENTO</th>
                <th>SINOPSE</th>
                <th>GÊNERO</th>
                <th>ORÇAMENTO</th>
                <th>Atualizar</th>
                <th>Deletar</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($filmes->toArray()); --}}
            @forelse($filmes as $filme)
                <tr>
                    <td>{{ $filme->id }}</td>
                    <td>{{ $filme->nome }}</td>
                    <td>{{ $filme->data_lancamento }}</td>
                    <td>{{ $filme->sinopse }}</td>
                    <td>{{ $filme->genero }}</td>
                      <td>{{ $filme->orcamento }}</td>
                    <td>
                        <a href="{{route('filme.atualizar', $filme->id)}}">Atualizar</a>
                    </td>
                    <td>
                        <form action="{{ route('filme.deletar', $filme->id)}}" method="POST"
                            onsubmit="return confirm('Deseja realmente excluir');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3"> Nenhum Filme encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>