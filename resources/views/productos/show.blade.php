@extends('layouts.template')

@section('content')

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
              <span class="badge bg-success text-white">Sí</span>
            @else
              <span class="badge bg-secondary text-white">No</span>
            @endif
          </p>

          <!-- Mostrar el nombre del usuario -->
          <p class="card-text">
            <span class="fw-semibold">Vendedor:</span> {{ $producto->user->name }}
          </p>

          <!-- Mostrar el contacto del usuario -->
          <p class="card-text">
            <span class="fw-semibold">Contacto del vendedor:</span>
            @if ($producto->user->contacto)
              <a href="mailto:{{ $producto->user->contacto }}" class="text-decoration-none">{{ $producto->user->contacto }}</a>
            @else
              <span class="text-muted">No disponible</span>
            @endif
          </p>

          <div class="mt-4">
          @auth
              @if (auth()->id() === $producto->user_id)
                  <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-primary me-2">
                      <i class="bi bi-pencil-square me-1"></i> Editar
                  </a>
              @endif
          @endauth
            <a href="{{ route('producto') }}" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-left me-1"></i> Volver
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
