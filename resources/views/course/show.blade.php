<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        /* Agrega aquí tus estilos personalizados */
    </style>
</head>

<body>
    @include('navbar')

    <!-- Contenido principal -->
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active">Acceso rápido</a>
                    @foreach ($myCourses as $myCourse)
                        <a href="/courses/{{ $myCourse->code }}" class="list-group-item list-group-item-action">{{ $myCourse->name }}</a>
                    @endforeach
                </div>
            </div>
            <!-- Tablón de Anuncios -->
            <div class="col-md-9">
                <h1>{{ $course->name }}</h1>

                <dl class="row">
                    <dt class="col-sm-3">Descripción:</dt>
                    <dd class="col-sm-9">{{ $course->description }}</dd>

                    <dt class="col-sm-3">Código del curso:</dt>
                    <dd class="col-sm-9">{{ $course->code }}</dd>

                    <dt class="col-sm-3">ID del curso:</dt>
                    <dd class="col-sm-9">{{ $course->id }}</dd>
                </dl>

                <h3>Tablón de Anuncios</h3>
                <!-- Publicar Anuncio -->
                <form method="POST" action="{{ route('posts.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="tituloAnuncio">Título del Anuncio</label>
                        <input type="text" class="form-control" id="post-title" name="post-title" placeholder="Introduce el título del anuncio">
                    </div>
                    <div class="form-group">
                        <label for="contenidoAnuncio">Contenido del Anuncio</label>
                        <textarea class="form-control" id="post-description" name="post-description" rows="3" placeholder="Escribe aquí el contenido del anuncio"></textarea>
                    </div>
                    <input type="hidden" name="course-id" value="{{ $course->id }}">
                    <input type="hidden" name="course-code" value="{{ $course->code }}">
                    <button type="submit" class="btn btn-primary">Publicar Anuncio</button>
                </form>
                <!-- Lista de Anuncios -->
                <div class="mt-4">
                    @foreach ($posts as $post)
                        <div class="card mt-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->description }}</p>
                            </div>
                        </div>
                    @endforeach
                    <!-- Agrega más tarjetas de anuncios según sea necesario -->
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
