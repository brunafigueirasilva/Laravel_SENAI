<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Detalhes</title>
</head>
<body>

    <h1>Cadastro de Detalhes do Produto</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('detalhe.salvar') }}" method="POST">
        @csrf

        <label>Descrição:</label>
        <input type="text" name="descricao" placeholder="Descrição..." required value="{{ old('descricao') }}">
        <br><br>

        <label>Tamanho:</label>
        <input type="text" name="tamanho" placeholder="Tamanho..." required value="{{ old('tamanho') }}">
        <br><br>

        <label>Peso:</label>
        <input type="text" name="peso" placeholder="Peso..." required value="{{ old('peso') }}">
        <br><br>

        <br><br>

        <button type="submit">Cadastrar Detalhe</button>
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