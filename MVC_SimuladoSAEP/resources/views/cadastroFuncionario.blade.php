<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro de Funcionários</title>
</head>
<body>

     @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>      
    @endif

    <form action="{{ route('funcionario.salvar') }}" method="POST">
        @csrf

       <a href="{{ route('funcionario.listar') }}">Listar Livros</a>
        <br><br>

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome do Funcionário..." required value="{{ old('nome') }}">
        <br><br>

        <label>Sobrenome:</label>
        <input type="text" name="sobrenome" placeholder="Sobrenome..." required value="{{ old('sobrenome') }}">
        <br><br>

        <label>Cargo:</label>
        <input type="text" name="cargo" placeholder="Cargo do Funcionário..." required value="{{ old('cargo') }}">
        <br><br>

         <label>E-mail:</label>
        <input type="text" name="email" placeholder="E-mail do Funcionário..." required value="{{ old('email') }}">
        <br><br>

        <label>Data de Admissão:</label>
        <input type="date" name="data_admissao" required value="{{ old('data_admissao') }}">
        <br><br>

        <label>Salário:</label>
        <input type="number" name="salario" placeholder="Salário..." required value="{{ old('salario') }}">
        <br><br>

       


    
</body>
</html>