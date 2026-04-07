<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Setores</title>
</head>
<body>

    <h1>Relatório de Setores</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('setor.salvar') }}" method="POST">
        @csrf

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome..." required value="{{ old('nome') }}">
        <br><br>

        <label>Número do Corredor:</label>
        <input type="text" name="ncorredor" placeholder="Número do Corredor..." required value="{{ old('ncorredor') }}">
        <br><br>

        <br><br>

        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>