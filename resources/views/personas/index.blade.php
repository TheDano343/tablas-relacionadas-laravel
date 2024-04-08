<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css'])
</head>
    

    <div class="container">
        <h2 class="text-center">Lista de usuarios</h2>
        <br>
        <div class="table-responsive">

    
        <div>
            @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
            @endif
        </div>

        <table class="table table-hover">
            <thead>             
            <div class="contianer">
                <a href="{{route('personas.create')}}" class="btn btn-success">Agregar Usuario</a>
            </div>
            <br> 
                <tr>     
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
            @foreach($personas as $persona)
                <tr>
                <td>{{$persona->id}}</td>
                <td>{{$persona->nombre}}</td>
                <td>{{$persona->descripcion}}</td>
                <td>{{$persona->carrera->nombre}}</td>
                <td>
                        <th><a class="btn btn-primary" href="{{route('personas.edit', ['personas' => $persona])}}">Editar</a></th>
                    </td>
                    <td>
                        <form method="post" action="{{route('personas.destroy', ['personas' => $persona])}}">
                            @csrf 
                            @method('delete')
                            <th><input class="btn btn-danger" type="submit" value="Borrar" /></th>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        </div>
</div>
</body>
</html>