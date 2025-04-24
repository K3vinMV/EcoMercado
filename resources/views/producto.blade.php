@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Productos disponibles</h1>

    <form method="GET" action="{{ route('producto') }}" class="mb-4">
        <div class="input-group">
            <input type="text" name="busqueda" class="form-control" placeholder="Buscar productos..." value="{{ request('busqueda') }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    @if($productos->count())
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($productos as $producto)
                <div class="col">
                    <a href="{{ route('productos.show', $producto->id) }}" class="text-decoration-none text-dark">
                        <div class="card h-100">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}"
                                     class="card-img-top object-fit-cover"
                                     alt="{{ $producto->nombre }}"
                                     style="height: 200px; width: 100%; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre }}</h5>
                                <p class="card-text">{{ Str::limit($producto->descripcion, 100) }}</p>
                                <p class="fw-bold">${{ number_format($producto->precio, 2) }}</p>
                            </div>
                            <div class="card-footer text-end">
                                <span class="badge bg-primary text-white">Stock: {{ $producto->stock }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="mt-4">
            {{ $productos->withQueryString()->links() }}
        </div>
    @else
        <p class="text-muted">No se encontraron productos disponibles.</p>
    @endif
</div>
@endsection
