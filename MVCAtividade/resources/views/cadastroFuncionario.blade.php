<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>

<h2>Cadastro de Funcionários</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('funcionario.listar') }}">Listar Funcionários</a>
<br><br>

<form action="{{ route('funcionario.salvar') }}" method="POST">
    @csrf

    <label>Nome:</label>
    <input type="text" name="nome" value="{{ old('nome') }}"><br><br>

    <label>Sobrenome:</label>
    <input type="text" name="sobrenome" value="{{ old('sobrenome') }}"><br><br>

    <label>Cargo:</label>
    <input type="text" name="cargo" value="{{ old('cargo') }}"><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <label>Data de Admissão:</label>
    <input type="date" name="data_admissao" value="{{ old('data_admissao') }}"><br><br>

    <label>Salário:</label>
    <input type="number" step="0.01" name="salario" value="{{ old('salario') }}"><br><br>

    <button type="submit">Cadastrar</button>
</form>

<h2>Cadastro de Dados Pessoais</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<a href="{{ route('dadopessoal.listar') }}">Listar Dados Pessoais</a>
<br><br>

<form action="{{ route('dadopessoal.salvar') }}" method="POST">
    @csrf
   
    <label>CPF:</label>
    <input type="number" name="cpf" value="{{ old('cpf') }}"><br><br>

    <label>RG:</label>
    <input type="number" name="rg" value="{{ old('rg') }}"><br><br>

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="{{ old('data_nascimento') }}"><br><br>

    <label>CEP:</label>
    <input type="number" name="cep" value="{{ old('cep') }}"><br><br>

    <button type="submit">Cadastrar</button>
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