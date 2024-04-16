<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Post</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('navbar')

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <!-- Formulario de Editar Post -->
            <div class="col-md-6 offset-md-3">
                <h2>Editar Post</h2>
                <form action="/posts/{{$post->id}}" method="POST">
                    @csrf
                    @method('PUT') <!-- Para indicar que se está realizando una solicitud PUT -->
                    <div class="form-group">
                        <label for="post-title">Título</label>
                        <input type="text" class="form-control" id="post-title" name="post-title" value="{{$post->title}}">
                    </div>
                    <div class="form-group">
                        <label for="post-description">Descripción</label>
                        <textarea class="form-control" id="post-description" name="post-description" rows="3">{{$post->description}}</textarea>
                    </div>
                    <input type="hidden" name="course-id" value="{{$post->course_id}}">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
