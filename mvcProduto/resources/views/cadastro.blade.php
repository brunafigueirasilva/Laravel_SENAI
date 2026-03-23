<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
</head>
<body>
    <h2>Cadastro de Produtos</h2>

    @if(session('success'))
        <p style="color: green">{{session('success')}}</p>
    @endif

    <form action="{{route('produto.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholdet="Nome..."
            require value="{{old('nome')}}"
        >
        <br><br>
        <label for="quantidade">Quantidade: </label>
        <input type="text" name="quantidade" id="quantidade" placeholdet="Quantidade..."
            require value="{{old('quantidade')}}"
        >
        <br><br>
        <label for="preco">Preço: </label>
        <input type="text" name="preco" id="preco" placeholdet="Preço..."
            require value="{{old('preco')}}"
        >
        
        <input type="submit" value="Cadastrar">
    </form>

    @if($errors->any())
        <div style="color: red">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    
</body>
</html>