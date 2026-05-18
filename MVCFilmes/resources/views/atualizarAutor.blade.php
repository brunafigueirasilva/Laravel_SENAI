<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar Filme</title>
</head>
<body>
    <h1>Atualizar Filme</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('autor.update', $autor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{ old('nome', $autor->nome) }}"
        >
        <br><br>
        <label for="data_nascimento">Data de Nascimento: </label>
        <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Data de Nascimento..."
            required value="{{ old('data_nascimento', $autor->data_nascimento)}}"
        >

        <br><br>
        <label for="email">E-mail: </label>
        <input type="text" name="email" id="email" placeholder="E-mail..."
            required value="{{ old('email', $autor->email)}}"
        >

        <br><br>
        <label for="telefone">Telefone: </label>
        <input type="number" name="telefone" id="telefone" placeholder="Telefone..."
            required value="{{ old('telefone', $autor->telefone)}}"
        >

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