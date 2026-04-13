<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Livro</title>
</head>
<body>
    <h1>Atualizar Livro</h1>

    @if(session('success'))
        <p style="color: green">{{session('success')}}</p>      
    @endif

    <form action="{{route('livro.update', $livro->id)}}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $livro->nome) }}" required>

        <input type="text" name="autor" value="{{ old('autor', $livro->autor) }}" required>

        <input type="text" name="descricao" value="{{ old('descricao', $livro->descricao) }}" required>

        <input type="number" name="numero_pag" value="{{ old('numero_pag', $livro->numero_pag) }}" required>

        <input type="date" name="data" value="{{ old('data', $livro->data) }}" required>

        <button type="submit">Atualizar</button>
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
</body>
</html>