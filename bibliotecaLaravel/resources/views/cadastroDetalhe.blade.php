<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Detalhes</title>
</head>
<body>

    <h1>Cadastro de Detalhes do Livro</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('detalhe.salvar') }}" method="POST">
        @csrf

        <label>Custo:</label>
        <input type="text" name="custo" placeholder="Custo..." required value="{{ old('custo') }}">
        <br><br>

        <label>Preço da Venda:</label>
        <input type="text" name="preco_venda" placeholder="Preço da Venda..." required value="{{ old('preco_venda') }}">
        <br><br>

        <label>Imposto:</label>
        <input type="text" name="imposto" placeholder="Imposto..." required value="{{ old('imposto') }}">
        <br><br>

        <br><br>

        <button type="submit">Cadastrar Detalhes</button>
    </form>

    @if($errors->any())
        <div style="color:red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>
</html>