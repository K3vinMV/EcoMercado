@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Todos los Blogs</h1>

    @if($blogs->count())
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($blogs as $blog)
                <div class="col">
                    <a href="{{ route('blogs.show', $blog->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100 shadow-sm">
                            @if ($blog->imagen)
                                <img src="{{ asset('storage/' . $blog->imagen) }}"
                                     class="card-img-top"
                                     style="max-height: 200px; width: 100%; object-fit: contain; margin: 0 auto;"
                                     alt="{{ $blog->titulo }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->titulo }}</h5>
                                <p class="card-text text-muted">{{ Str::limit(strip_tags($blog->contenido), 100) }}</p>
                            </div>
                            <div class="card-footer bg-white">
                                <small class="text-muted">Publicado: {{ $blog->created_at->format('d/m/Y') }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $blogs->withQueryString()->links() }}
        </div>
    @else
        <p class="text-muted">Aún no hay blogs disponibles.</p>
    @endif
</div>
@endsection
