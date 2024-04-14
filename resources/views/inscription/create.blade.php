<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unirse a clase</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Unirse a nueva clase</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">

            <!-- Tablón de Anuncios -->
            <div class="col-md-9">
                <h2>Unirse a clase</h2>
                <!-- Publicar Anuncio -->
                <form action="/inscriptions" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="course-code">Código de clase</label>
                        <input type="text" class="form-control" id="course-code" name="course-code" placeholder="Introduce el código de la clase">
                    </div>

                    <button type="submit" class="btn btn-primary">Unirse a Clase</button>
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
