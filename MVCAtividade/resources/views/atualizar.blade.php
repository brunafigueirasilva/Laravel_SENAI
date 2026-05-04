<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizações</title>
</head>
<body>
    <h1>Atualizar Funcionario</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('funcionario.update', $funcionario->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <input type="text" name="nome" value="{{ old('nome', $funcionario->nome) }}" required>

        <input type="text" name="cargo" value="{{ old('cargo', $funcionario->cargo) }}" required>

        <input type="text" name="email" value="{{ old('email', $funcionario->email) }}" required>
        
        <input type="date" name="data_admissao" value="{{ old('data_admissao', $funcionario->data_admissao) }}" required>

        <input type="text" name="sobrenome" value="{{ old('sobrenome', $funcionario->sobrenome) }}" required>

        <input type="number" name="salario" value="{{ old('salario', $funcionario->salario) }}" required>

        <button type="submit">Atualizar Funcionario</button>
    </form>

    <form action="{{ route('departamento.update', $departamento->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <input type="text" name="CPF" value="{{ old('CPF', $departamento->CPF) }}" required>

        <input type="date" name="data_criacao" value="{{ old('data_criacao', $departamento->data_criacao) }}" required>

        <input type="number" name="orcamento" value="{{ old('orcamento', $departamento->orcamento) }}" required>
        
        <input type="date" name="sigla" value="{{ old('sigla', $departamento->sigla) }}" required>

        <button type="submit">Atualizar Departamento</button>
    </form>

    <form action="{{ route('dadopessoal.update', $dadopessoal->id) }}" method="POST" >
        @csrf
        @method('PUT')

        <input type="number" name="nome" value="{{ old('nome', $dadopessoal->nome) }}" required>

        <input type="number" name="RG" value="{{ old('RG', $dadopessoal->RG) }}" required>

        <input type="date" name="data_nascimento" value="{{ old('data_nascimento', $dadopessoal->data_nascimento) }}" required>
        
        <input type="number" name="CEP" value="{{ old('CEP', $dadopessoal->CEP) }}" required>

        <button type="submit">Atualizar Dados Pessoais</button>
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