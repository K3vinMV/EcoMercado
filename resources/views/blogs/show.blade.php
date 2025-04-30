@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>{{ $blog->titulo }}</h1>

    <!-- Mostrar el nombre del usuario -->
    <div class="mt-4">
        <p class="fw-semibold">Autor: {{ $blog->user->name }}</p>
    </div>

    @if ($blog->imagen)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $blog->imagen) }}" 
                 class="img-fluid rounded" 
                 style="max-height: 400px; width: auto; object-fit: contain; margin: 0 auto;" 
                 alt="Imagen del blog">
        </div>
    @endif

    <div>
        {!! nl2br(e($blog->contenido)) !!}
    </div>

    <!-- Botones solo para el autor o el admin -->
    @auth
        @if (auth()->id() === $blog->user_id || auth()->user()->is_admin)
            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">
                    <i class="bi bi-pencil-square me-1"></i> Editar
                </a>

                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este blog?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-trash me-1"></i> Eliminar
                    </button>
                </form>
            </div>
        @endif
    @endauth

    <a href="{{ route('blog') }}" class="btn btn-secondary mt-4">Volver</a>
</div>
@endsection
