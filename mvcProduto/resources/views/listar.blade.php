<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
</head>
<body>
    <h1>Relatórios de Produtos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>QUANTIDADE</th>
                <th>PREÇO</th>
            </tr>
        </thead>
    <tbody>
        @forelse($produtos as $produto)
        <tr>
            <td>   <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>
                        <a href="{{route('produto.atualizar', $produto->id)}}">Atualizar</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhum Produto Encontrado</td>
                </tr>
            @endforelse
        </tbody>
    </table>  
</body>
</html>