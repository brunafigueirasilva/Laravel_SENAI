<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Detalhes</title>
</head>
<body>

<h1>Lista de Detalhes</h1>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>DESCRIÇÃO</th>
            <th>TAMANHO</th>
            <th>PESO</th>
            <th>PRODUTO</th>
        </tr>
    </thead>

    <tbody>
        @forelse($detalhes as $detalhe)
            <tr>
                <td>{{ $detalhe->id }}</td>
                <td>{{ $detalhe->descricao }}</td>
                <td>{{ $detalhe->tamanho }}</td>
                <td>{{ $detalhe->peso }}</td>
                <td>{{ $detalhe->produto?->nome }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Nenhum detalhe encontrado</td>
            </tr>
        @endforelse
    </tbody>
</table>

</body>
</html>