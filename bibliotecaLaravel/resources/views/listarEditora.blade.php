<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Editoras</title>
</head>
<body>
    <h1>Relatório de Editoras</h1>

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
                <th>EDITORA</th>
                <th>CNPJ</th>
                <th>PAÍS</th>
                <th>CIDADE</th>
            </tr>
        <thead>

        <tbody>
            @forelse ($editoras as $editora)
                <tr>
                    <td>{{$editora->id}}</td>
                    <td>{{$editora->editora}}</td>
                    <td>{{$editora->cnpj}}</td>
                    <td>{{$editora->pais}}</td>
                    <td>{{$editora->cidade}}</td>
                    </td>
                @empty
                    <tr>
                        <td colspan="5">Nennhum editora encontrado</td>
                    </tr>
            @endforelse
        </tody>
    <table>

</body>
</html>