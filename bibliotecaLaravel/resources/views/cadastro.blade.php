<!DOCTYPE html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Livros</title>
</head>
<body>

    <h1>Cadastro de Livros</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>      
    @endif

    <form action="{{ route('livro.salvar') }}" method="POST">
        @csrf

        <a href="{{ route('livro.listar') }}">Listar Livros</a>
        <br><br>
        
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome do Livro..." required value="{{ old('nome') }}">
        <br><br>

        <label>Autor:</label>
        <input type="text" name="autor" placeholder="Autor do Livro..." required value="{{ old('autor') }}">
        <br><br>

        <label>Descrição:</label>
        <input type="text" name="descricao" placeholder="Descrição do Livro..." required value="{{ old('descricao') }}">
        <br><br>

        <label>Número de Página:</label>
        <input type="number" name="numero_pag" placeholder="Número de Páginas.." required value="{{ old('numero_pag') }}">
        <br><br>

        <label>Data de Publicação:</label>
        <input type="date" name="data" required value="{{ old('data') }}">
        <br><br>

        <label>Editora:</label>
        <select name="editora_id" required>
            <option value="">Selecione uma Editora</option>

            @foreach ($editoras as $editora)
                <option value="{{ $editora->id }}"
                    {{ old('editora_id') == $editora->id ? 'selected' : '' }}>
                    Nome da Editora: {{ $editora->editora }} - 
                    CNPJ {{ $editora->cnpj }} - 
                    País {{ $editora->pais }} -  
                    Cidade {{ $editora->cidade }}
                </option>
            @endforeach
        </select>

        <br><br>

        <label>Detalhe do Livro:</label>
        <select name="detalhe_id" required>
            <option value="">Selecione um detalhe</option>

            @foreach ($detalhes as $detalhe)
                <option value="{{ $detalhe->id }}"
                    {{ old('detalhe_id') == $detalhe->id ? 'selected' : '' }}>
                    Custo: {{ $detalhe->custo }} - 
                    Preço da Venda: {{ $detalhe->preco_venda }} - 
                    Imposto: {{ $detalhe->imposto }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Cadastrar Livro</button>

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