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
                <h2>Editar Tarea</h2>
                <form action="/tasks/{{$task->id}}" method="POST">
                    @csrf
                    @method('PUT') <!-- Para indicar que se está realizando una solicitud PUT -->
                    <div class="form-group">
                        <label for="task-title">Título</label>
                        <input type="text" class="form-control" id="task-title" name="task-title" value="{{$task->title}}">
                    </div>

                    <div class="form-group">
                        <label for="task-description">Descripción</label>
                        <textarea class="form-control" id="task-description" name="task-description" rows="3">{{$task->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="task-deadline">Fecha de Vencimiento:</label>
                        <input type="datetime-local" class="form-control" id="task-deadline" name="task-deadline" required value="{{$task->deadline}}">
                    </div>

                    <div class="form-group">
                        <label for="task-score">Puntaje:</label>
                        <input type="number" class="form-control" id="task-score" name="task-score" min="0" required value="{{$task->score}}">
                    </div>
                    <input type="hidden" name="course-id" value="{{$task->course_id}}">
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
