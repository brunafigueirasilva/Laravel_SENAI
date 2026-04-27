<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuários</title>
</head>
<body>
    <h1>Cadastro Usuários</h1>

    @if(session('success'))
        <p style="color:green">{{session('success')}}</p>
    @endif

    <form action="{{route('aluno.salvar')}}" method="POST">
        @csrf
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" placeholder="Nome..."
            require value="{{old('nome')}}"
        >
        <br><br>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email" placeholder="Email..."
            require value="{{old('email')}}"
         >
        <br><br>
        <label for="turma_id">Turma:</label>
            <select name="turma_id" id="turma_id">
                <option value="">Selecione uma turma</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">
                         Sala {{ $turma->numSala }} - {{ $turma->serie }}
                    </option>
            @endforeach
            </select>

        <input type="submit" value="Cadastrar">
    </form>

    <h2>Relatório de Turmas</h2>
<table border="1">
    <thead>
        <tr>
            <th>NÚMERO SALA</th>
            <th>SÉRIE</th>
        </tr>
    </thead>
    <tbody>
        @forelse($turmas as $turma)
            <tr>
                <td>{{ $turma->numSala }}</td>
                <td>{{ $turma->serie }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Nenhuma Sala Encontrada</td>
            </tr>
        @endforelse
        </tbody>
        </table>

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