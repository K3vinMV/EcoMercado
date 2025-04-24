@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Editar blog</h1>

    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $blog->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea name="contenido" class="form-control" rows="5" required>{{ old('contenido', $blog->contenido) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen destacada</label>
            <input type="file" name="imagen" class="form-control">
            @if ($blog->imagen)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $blog->imagen) }}" class="img-fluid rounded" style="max-height: 200px;" alt="Imagen actual del blog">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
