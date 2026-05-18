<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Filme</title>
</head>
<body>
    <h1>Cadastro Filme</h1>

    <br>
    <a href="{{route('filme.listar')}}">Listar Filme</a>
    <br><br>
    <a href="{{route('autor.listar')}}">Listar Autor</a>
    <br><br>
    <a href="{{route('autor.cadastro')}}">Cadastrar Autor</a>
    <br><br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('filme.salvar') }}" method="POST">
        @csrf
         <label for="titulo">Nome do Filme: </label>
        <input type="text" name="titulo" id="titulo" placeholder="Nome do Filme..."
           required value="{{ old('titulo', $filme->titulo ?? '') }}"
        >
        <br><br>
        <label for="data_lancamento">Data de Lançamento: </label>
        <input type="date" name="data_lancamento" id="data_lancamento" placeholder="Data de Lançamento..."
            required value="{{ old('data_lancamento', $filme->data_lancamento ?? '') }}"
        >
        <br><br>
        <label for="sinopse">Sinopse: </label>
        <input type="text" name="sinopse" id="sinopse" placeholder="Sinopse..."
            required value="{{ old('sinopse', $filme->sinopse ?? '') }}"
        >
        <br><br>
        <label for="genero">Gênero: </label>
        <input type="text" name="genero" id="genero" placeholder="Gênero..."
            required value="{{ old('genero', $filme->genero ?? '') }}"
        >
        <br><br>
        <label for="orcamento">Orçameto: </label>
        <input type="number" name="orcamento" id="orcamento" placeholder="Orçameto..."
            required value="{{ old('orcamento', $filme->orcamento ?? '') }}"
            >
            
        <input type="submit" value="Cadastrar">
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