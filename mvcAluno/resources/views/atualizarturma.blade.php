<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Atualizar</title>
</head>
<body>
    <h1>Atualizar Turma</h1>

    @if(session('success'))
        <p style="color: green"> {{session('success')}}</p>
    @endif

    <form action="{{route('turma.update',$turma->id)}}" method="POST"> 
        @csrf
        @method('PUT')

        <input type="number" name="numSala" value="{{old('numSala', $turma->numSala)}}" required>

        <input type="text" name="serie" value="{{old('serie', $turma->serie)}}" required>

        <button type="submit">Atualizar</button>

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