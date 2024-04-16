<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>

    </style>
</head>

<body>
    @include('navbar')

    <div class="container">
        <h2 class="mt-4 mb-4">Crear Tarea</h2>
        <h2>{{ $courseCode }}</h2>
        <form action="/tasks" method="POST">
            @csrf
            <div class="form-group">
                <label for="task-title">Título:</label>
                <input type="text" class="form-control" id="task-title" name="task-title" required>
            </div>

            <div class="form-group">
                <label for="task-description">Descripción:</label>
                <textarea class="form-control" id="task-description" name="task-description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="task-deadline">Fecha de Vencimiento:</label>
                <input type="datetime-local" class="form-control" id="task-deadline" name="task-deadline" required>
            </div>

            <div class="form-group">
                <label for="task-score">Puntaje:</label>
                <input type="number" class="form-control" id="task-score" name="task-score" min="0" required>
            </div>

            <input type="hidden" name="course-code" value="{{ $courseCode }}">

            <button type="submit" class="btn btn-primary">Crear Tarea</button>
        </form>

        <div class="mt-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-outline-primary mr-2">Editar</button>
                        <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </div>
                    <h5 class="card-title">Tarea 1</h5>
                    <p class="card-text">Contenido de la Tarea 1</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text">Puntaje: 10</p>
                        <p class="card-text">Entregado por: 30 estudiantes</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-3">
                        <button type="button" class="btn btn-outline-primary mr-2">Editar</button>
                        <button type="button" class="btn btn-outline-danger">Eliminar</button>
                    </div>
                    <h5 class="card-title">Tarea 2</h5>
                    <p class="card-text">Contenido de la Tarea 2</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text">Puntaje: 100</p>
                        <p class="card-text">Entregado por: 15 estudiantes</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
