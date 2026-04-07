<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Produtos</title>
</head>
<body>

<h1>Relatório de Produtos</h1>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>QUANTIDADE</th>
            <th>PREÇO</th>
            <th>SETOR</th>
            <th>CORREDOR</th>
            <th>DESCRIÇÃO</th>
            <th>TAMANHO</th>
            <th>PESO</th>
            <th>AÇÕES</th>
        </tr>
    </thead>

    <tbody>
        @forelse($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>{{ $produto->preco }}</td>

                <td>{{ $produto->setor?->nome }}</td>
                <td>{{ $produto->setor?->ncorredor }}</td>

                <td>{{ $produto->detalhe?->descricao }}</td>
                <td>{{ $produto->detalhe?->tamanho }}</td>
                <td>{{ $produto->detalhe?->peso }}</td>

                <td>
                    <a href="{{ route('produto.atualizar', $produto->id) }}">Editar</a>

                    <form action="{{ route('produto.deletar', $produto->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="10">Nenhum produto encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>