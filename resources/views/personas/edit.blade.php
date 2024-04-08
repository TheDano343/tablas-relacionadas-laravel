<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
    <title>Document</title>
</head>
    
<body>
    <div>
    <!--method:post : Subida de archivos -->
    <form action="{{route('personas.update', ['personas' => $personas])}}" method="post">
        @csrf
        @method('put')
    <div class="container">
    <h1 class="titulo">editar usuarios</h1>
    
    <div>
        @if($errors->any())
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
        @endif
    </div>

    <div class="form-group">
    <!--name: Permite a un script acceder a su contenido. -->
    <input class="form-control" name="nombre" type="text" value="{{$personas->nombre}}" placeholder="coloca nombre">
    </div>

    <div class="form-group">
    <input class="form-control" name="descripcion" type="text" value="{{$personas->descripcion}}" placeholder="coloca contraseña">
    </div>

    <select class="form-control" name="carrera_id">
    <option value="">Selecciona una carrera</option>
    @foreach($carreras as $carrera)
        @if($carrera->id == $personas->carrera_id)
            <option selected value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
        @else
            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
        @endif
    @endforeach
    </select>
<br>

    <div class="form-group"> 
        <!-- especifica el método HTTP que el navegador usará para enviar el formulario -->
    <button input="submit" class="btn btn-primary" name="creacion">Acualizar</button>
    </div>      
</form>
    
    </div>

</body>
</html>