<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>

    <h2>Cadastro de Departamentos</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('departamento.listar') }}">Listar Departamentos</a>
<br><br>

<form action="{{ route('departamento.salvar') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome') }}"><br><br>

    <label>Data de Criação:</label>
    <input type="date" name="data_criacao" value="{{ old('data_criacao') }}"><br><br>

    <label>Orçamento:</label>
    <input type="number" name="orcamento" value="{{ old('orcamento') }}"><br><br>

    <label>Sigla:</label>
    <input type="text" name="sigla" value="{{ old('sigla') }}"><br><br>

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