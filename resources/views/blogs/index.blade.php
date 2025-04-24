@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Mis Blogs</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('blogs.create') }}" class="btn btn-success">Crear nuevo blog</a>
    </div>

    @if($blogs->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <td>{{ $blog->titulo }}</td>
                        <td>{{ $blog->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('blogs.show', $blog) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-primary">Editar</a>

                            <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este blog?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $blogs->links() }}
    @else
        <p class="text-muted">No has creado ningún blog aún.</p>
    @endif
</div>
@endsection
