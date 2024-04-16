<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    @include('navbar')

    <div class="container mt-5">
        {{-- Título de la tarea --}}
        <h2 class="mb-3">Título de la tarea: {{ $task->title }}</h2>

        {{-- Descripción de la tarea --}}
        <p>Descripción: {{ $task->description }}</p>

        {{-- Valor de la tarea --}}
        <p>Valor de la tarea: {{ $task->score }}</p>

        {{-- Fecha límite de entrega --}}
        <p>Fecha límite para entregar: {{ $task->deadline}}</p>

        {{-- Sección para entregar la tarea --}}
        @if($existingSubmission)
            <div class="alert alert-info">
                Tarea entregada.
            </div>
        @else
            <div class="card">
                <div class="card-header">
                    Entregar tarea:
                </div>
                <div class="card-body">
                    <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{-- Espacio para añadir un comentario --}}
                        <div class="form-group">
                            <label for="comment">Comentario:</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>

                        {{-- Apartado para subir el archivo --}}
                        <div class="form-group">
                            <label for="submission-file">Subir tarea:</label>
                            <input type="file" class="form-control-file" id="submission-file" name="submission-file" required>
                        </div>

                        <input type="hidden" name="task-id" value="{{ $task->id }}">

                        <button type="submit" class="btn btn-primary">Entregar</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
</body>
