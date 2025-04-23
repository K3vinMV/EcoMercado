@extends('layouts.template')

@section ('content')

<div class="container my-5">
  <div class="card shadow-lg border-0 rounded-4">
    <div class="row g-0">
      @if ($producto->imagen)
      <div class="col-md-5">
        <img src="{{ asset('storage/' . $producto->imagen) }}" class="img-fluid rounded-start h-100 object-fit-cover" alt="{{ $producto->nombre }}">
      </div>
      @endif
      <div class="col-md-7">
        <div class="card-body p-5">
          <h2 class="card-title fw-bold mb-3">{{ $producto->nombre }}</h2>
          
          <h5 class="text-success fw-semibold mb-3">${{ number_format($producto->precio, 2) }}</h5>

          <p class="card-text mb-4">{{ $producto->descripcion }}</p>

          <p class="card-text">
            <span class="fw-semibold">Stock disponible:</span> {{ $producto->stock }}
          </p>

          <p class="card-text">
            <span class="fw-semibold">Destacado:</span> 
            @if ($producto->destacado)
              <span class="badge bg-success">Sí</span>
            @else
              <span class="badge bg-secondary">No</span>
            @endif
          </p>

          <div class="mt-4">
            <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary me-2">
              <i class="bi bi-pencil-square me-1"></i> Editar
            </a>
            <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-left me-1"></i> Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection