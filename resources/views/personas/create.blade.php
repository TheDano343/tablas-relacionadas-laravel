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
    <form action="{{route('personas.store')}}" method="POST">
        @csrf
        @method('post')
    <div class="container">
    <h1 class="titulo">Crear usuarios</h1>
    
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
    <input class="form-control" name="nombre" type="text" placeholder="coloca nombre">
    </div>

    <div class="form-group">
    <input class="form-control" name="descripcion" type="text" placeholder="coloca contraseña">
    </div>

    <div class="form-group">
                <label for="carrera_id">Carrera:</label>
                <select class="form-control" name="carrera_id">
                    <option value="">Selecciona una carrera</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                    @endforeach
                </select>
            </div>

    <div class="form-group"> 
        <!-- especifica el método HTTP que el navegador usará para enviar el formulario -->
    <button input="submit" class="btn btn-primary" name="creacion">Crear</button>
    </form>
    </div> 
    </div>

</body>
</html>