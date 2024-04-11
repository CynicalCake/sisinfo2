<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Clase</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Agrega aquí tus estilos personalizados */
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Plataforma de Estudios</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Tablón de Anuncios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Trabajo en Clase</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Personas</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <!-- Formulario de Crear Clase -->
            <div class="col-md-6 offset-md-3">
                <h2>Crear Clase</h2>
                <form>
                    <div class="form-group">
                        <label for="nombreClase">Nombre de Clase</label>
                        <input type="text" class="form-control" id="nombreClase"
                            placeholder="Introduce el nombre de la clase">
                    </div>
                    <div class="form-group">
                        <label for="descripcionClase">Descripción</label>
                        <textarea class="form-control" id="descripcionClase" rows="3"
                            placeholder="Escribe aquí la descripción de la clase"></textarea>
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
