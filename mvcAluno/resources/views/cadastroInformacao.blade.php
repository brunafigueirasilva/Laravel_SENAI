<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Informações Pessoais</title>
</head>
<body>
    <h1>Cadastro Informações Pessoais</h1>

    <br>
    <a href="{{route('aluno.listar')}}">Listar Alunos</a>
    <br>

    @if(session('success'))
        <p style="color:green">{{ session('success')}}</p>
    @endif

    <form action="{{route('informacao.salvar') }}" method="POST">
        @csrf
        <label for="Endereço">Endereço: </label>
        <input type="text" name="Endereço" id="Endereço" placeholder="Endereço..."
            require value="{{ old('Endereço') }}"
        ><br><br>

        <label for="data">Data de Nascimento: </label>
        <input type="date" name="data" id="data" placeholder="Data de Nascimento..."
            require value="{{ old('data') }}"
        ><br><br>

        <label for="telefone">Telefone: </label>
        <input type="text" name="telefone" id="telefone" placeholder="Telefone..."
            require value="{{ old('telefone') }}"
        ><br><br>

        <label for="idade">Idade: </label>
        <input type="number" name="idade" id="idade" placeholder="Idade..."
            require value="{{ old('idade') }}"
        ><br><br>
      

        <input type="submit" value="Cadastrar Informações">
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