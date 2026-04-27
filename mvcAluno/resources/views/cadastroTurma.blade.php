<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Turma</title>
</head>
<body>
    <h1>Cadastro de Turmas</h1>

    @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{route('turma.salvar')}}" method="POST">
        @csrf
        <label for="numSala">Número da Sala: </label>
        <input type="number" name="numSala" id="numSala" placeholder="Número da Sala..."
            require value="{{old('numSala')}}"
        >
        <br><br>
        <label for="serie">Série: </label>
        <input type="text" name="serie" id="serie" placeholder="Série..."
            require value="{{old('serie')}}"
        >

        <input type="submit" value="Cadastrar Turma">
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