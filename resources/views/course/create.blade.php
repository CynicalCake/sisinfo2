<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Clase</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('navbar')

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <!-- Formulario de Crear Clase -->
            <div class="col-md-6 offset-md-3">
                <h2>Crear Clase</h2>
                <form action="/courses" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="course-name">Nombre de Clase</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Introduce el nombre de la clase">
                    </div>
                    <div class="form-group">
                        <label for="course-description">Descripción</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Escribe aquí la descripción de la clase"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear Clase</button>
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
