@extends('layouts.template')

@section('content')

<section class="featured py-5 bg-light">
    <div class="container">
        <div class="row">
            @if($blogs->count())
                @php $destacado = $blogs->first(); @endphp
                <div class="col-12">
                    <article class="featured-post d-flex flex-wrap align-items-center shadow rounded-4 p-4 bg-white">
                        <div class="col-md-6">
                            <div class="featured-post-content pe-3">
                                <div class="featured-post-author d-flex align-items-center mb-2">
                                    <p class="mb-0">Por <span>{{ $destacado->user->name }}</span></p>
                                </div>
                                <a href="{{ route('blogs.show', $destacado->id) }}" class="featured-post-title h4 d-block mb-3 text-decoration-none text-dark">
                                    {{ $destacado->titulo }}
                                </a>
                                <ul class="list-inline text-muted small">
                                    <li class="list-inline-item">
                                        <i class="fa fa-clock-o"></i> {{ $destacado->created_at->format('M d, Y') }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if($destacado->imagen)
                        <div class="col-md-6">
                            <div class="featured-post-thumb text-end">
                                <img src="{{ asset('storage/' . $destacado->imagen) }}" alt="feature-post-thumb" class="img-fluid rounded">
                            </div>
                        </div>
                        @endif
                    </article>
                </div>
            @endif
        </div>
    </div>
</section>

<section class="blog py-5">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-6">
                <h2 class="fw-bold">Últimos productos</h2>
                <p>Descubre nuestra selección de productos sustentables diseñados para estudiantes comprometidos con el medio ambiente.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($productos->take(6) as $producto)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $producto->nombre }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($producto->descripcion, 80) }}</p>
                            <p class="fw-bold">${{ number_format($producto->precio, 2) }}</p>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-outline-primary">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('producto') }}" class="btn btn-outline-secondary">Ver todos los productos</a>
        </div>
    </div>
</section>

<section class="blogs py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-6">
                <h2 class="fw-bold">Últimos blogs</h2>
                <p>Explora artículos recientes publicados por estudiantes que comparten su experiencia sustentable.</p>
            </div>
        </div>

        <div class="row g-4">
            @foreach ($blogs->skip(1)->take(6) as $blog)
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        @if ($blog->imagen)
                        <img src="{{ asset('storage/' . $blog->imagen) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $blog->titulo }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->titulo }}</h5>
                            <p class="card-text text-muted">{{ Str::limit(strip_tags($blog->contenido), 80) }}</p>
                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-sm btn-outline-primary">Leer más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('blog') }}" class="btn btn-outline-secondary">Ver todos los blogs</a>
        </div>
    </div>
</section>

@endsection
