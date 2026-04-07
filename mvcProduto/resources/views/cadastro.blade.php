<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>

    <h1>Cadastro de Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('produto.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Produto..." required value="{{ old('nome') }}">
        <br><br>

        <label>Quantidade:</label>
        <input type="text" name="quantidade" placeholder="Quantidade..." required value="{{ old('quantidade') }}">
        <br><br>

        <label>Preço:</label>
        <input type="text" name="preco" placeholder="Preço..." required value="{{ old('preco') }}">
        <br><br>

        <label>Setor:</label>
        <select name="setor_id" required>
            <option value="">Selecione um Setor</option>

            @foreach ($setores as $setor)
                <option value="{{ $setor->id }}"
                    {{ old('setor_id') == $setor->id ? 'selected' : '' }}>     
                    Nome do Setor: {{ $setor->nome }} - Corredor; {{ $setor->ncorredor }}
                </option>
            @endforeach
        </select>

        <br><br>
        <label>Detalhe do produto:</label>
        <select name="detalhe_id" required>
            <option value="">Selecione um detalhe</option>

            @foreach ($detalhes as $detalhe)
                <option value="{{ $detalhe->id }}"
                    {{ old('detalhe_id') == $detalhe->id ? 'selected' : '' }}>
                    Descrição: {{ $detalhe->descricao }} - Tamanho: {{ $detalhe->tamanho }} - Peso: {{ $detalhe->peso }}
            </option>
            @endforeach
        </select>
        <br><br>

        <button type="submit">Cadastrar</button>
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