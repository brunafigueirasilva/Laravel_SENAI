<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Editora</title>
</head>
<body>

    <h1>Cadastro de Editora</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('editora.salvar') }}" method="POST">
        @csrf

        <a href="{{ route('editora.listar') }}">Listar Editoras</a>
        <br><br>

        <label>Nome da Editora:</label>
        <input type="text" name="editora" placeholder="Nome da Editora..." required value="{{ old('editora') }}">
        <br><br>

        <label>Cnpj:</label>
        <input type="text" name="cnpj" placeholder="CNPJ..." required value="{{ old('cnpj') }}">
        <br><br>

        <label>País:</label>
        <input type="text" name="pais" placeholder="Pais..." required value="{{ old('cidade') }}">
        <br><br>

        <label>Cidade:</label>
        <input type="text" name="cidade" placeholder="Cidade..." required value="{{ old('cidade') }}">
        <br><br>

        <button type="submit">Cadastrar Editora</button>
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