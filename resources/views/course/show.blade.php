<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
                        <a href="/courses/{{ $myCourse->code }}"
                            class="list-group-item list-group-item-action">{{ $myCourse->name }}</a>
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

                    @if ($course->owner == Auth::id())
                        <dt class="col-sm-3"><h4><span class="badge badge-secondary">Eres docente</span></h4></dt>
                        <dd><a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-outline-primary">Editar información del curso</a></dd>
                    @else
                        <dt class="col-sm-3"><h4><span class="badge badge-secondary">Eres estudiante</span></h4></dt>
                    @endif

                    {{-- <dt class="col-sm-3">ID del curso:</dt>
                    <dd class="col-sm-9">{{ $course->id }}</dd> --}}
                </dl>

                <!-- Lista de Anuncios -->
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="posts-tab" data-toggle="tab" href="#posts" role="tab"
                            aria-controls="posts" aria-selected="true">Anuncios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tasks-tab" data-toggle="tab" href="#tasks" role="tab"
                            aria-controls="tasks" aria-selected="false">Tareas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="users-tab" data-toggle="tab" href="#users" role="tab"
                            aria-controls="users" aria-selected="false">Personas</a>
                    </li>
                </ul>
                <br>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="posts" role="tabpanel" aria-labelledby="posts-tab">

                        <!-- Lista de Posts -->
                        <h3>Tablón de Anuncios</h3>
                        <!-- Publicar Anuncio -->
                        <form method="POST" action="{{ route('posts.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="tituloAnuncio">Título del Anuncio</label>
                                <input type="text" class="form-control" id="post-title" name="post-title"
                                    placeholder="Introduce el título del anuncio">
                            </div>
                            <div class="form-group">
                                <label for="contenidoAnuncio">Contenido del Anuncio</label>
                                <textarea class="form-control" id="post-description" name="post-description" rows="3"
                                    placeholder="Escribe aquí el contenido del anuncio"></textarea>
                            </div>
                            <input type="hidden" name="course-id" value="{{ $course->id }}">
                            <input type="hidden" name="course-code" value="{{ $course->code }}">
                            <button type="submit" class="btn btn-primary">Publicar Anuncio</button>
                        </form>
                        <div class="mt-4">
                            @foreach ($posts as $post)
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title">{{ $post->title }}</h5>
                                            @if ($post->user_id == Auth::id())
                                                <div>
                                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                                </div>
                                            @endif
                                        </div>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                                        <p class="card-text">{{ $post->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tasks" role="tabpanel" aria-labelledby="tasks-tab">
                        <!-- Lista de Tasks -->
                        <h3>Tareas</h3>
                        {{-- <form action="{{ route('tasks.create') }}" method="POST">
                            @csrf
                            <input type="hidden" name="course-code" value="{{ $course->code }}">
                            <button type="submit" class="btn btn-primary">Nueva tarea</button>
                        </form> --}}
                        {{-- <a href="{{ route('tasks.create') }}" class="btn btn-primary">Nueva tarea</a> --}}
                        @if ($course->owner == Auth::id())
                            <a href="{{ route('tasks.create', ['course_code' => $course->code]) }}" class="btn btn-primary">Nueva tarea</a>
                        @endif
                        <div class="mt-4">
                            @foreach ($tasks as $task)
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            @if ($course->owner == Auth::id())
                                                <h5 class="card-title">{{ $task->title }}</h5>
                                            @else
                                                <h5 class="card-title"><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></h5>
                                            @endif

                                            @if ($task->user_id == Auth::id())
                                                <div>
                                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                                </div>
                                            @endif
                                        </div>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $task->user->name }}</h6>
                                        <p class="card-text">{{ $task->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="tasks-tab">
                        <table class="table mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Sis</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->sis }}</td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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
