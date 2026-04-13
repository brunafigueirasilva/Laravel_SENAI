<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <title>Relatório de Livros</title>
</head>
<body>
    <h1>Relatório de Livros</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('livro.cadastro') }}">Cadastrar Livro</a>
    <br><br>

    <a href="{{ route('editora.cadastro') }}">Cadastrar Editora</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NOME</th>
                <th>AUTOR</th>
                <th>DESCRIÇÃO</th>
                <th>NÚMERO DE PÁGINAS</th>
                <th>DATA DE PUBLICAÇÃO</th>
                <th>EDITORA</th>
                <th>CNPJ</th>
                <th>PAÍS</th>
                <th>CIDADE</th>
                <th>CUSTO</th>
                <th>PREÇO DA VENDA</th>
                <th>IMPOSTO</th>
                <th>Editar</th>
            </tr>
        <thead>

        <tbody>
            @forelse ($livros as $livro)
                <tr>
                    <td>{{$livro->id}}</td>
                    <td>{{$livro->nome}}</td>
                    <td>{{$livro->autor}}</td>
                    <td>{{$livro->descricao}}</td>
                    <td>{{$livro->numero_pag}}</td>
                    <td>{{$livro->data}}</td>

                    <td>{{$livro->editora?->editora}}</td>
                    <td>{{$livro->editora?->cnpj}}</td>
                    <td>{{$livro->editora?->pais}}</td>
                    <td>{{$livro->editora?->cidade}}</td>
                
                    <td>{{$livro->detalhe?->custo}}</td>
                    <td>{{$livro->detalhe?->preco_venda}}</td>
                    <td>{{$livro->detalhe?->imposto}}</td>

                    <td>
                        <a href="{{route('livro.atualizar', $livro->id)}}">Atualizar</a>
                    </td>
                @empty
                    <tr>
                        <td colspan="14">Nennhum livro encontrado</td>
                    </tr>
            @endforelse
        </tody>
    <table>

</body>
</html>