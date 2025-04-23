@extends('layouts.template')

@section ('content')

<div class="container my-5">
  <div class="card shadow-lg rounded-4 border-0">
    <div class="card-body p-5">
      <h2 class="mb-4 fw-bold text-center">
        <i class="bi bi-pencil-square me-2"></i>Editar producto
      </h2>

      <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
          <label for="nombre" class="form-label">Nombre del producto</label>
          <input type="text" name="nombre" class="form-control form-control-lg" value="{{ old('nombre', $producto->nombre) }}" required>
        </div>

        <div class="mb-4">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea name="descripcion" class="form-control" rows="4">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" name="precio" class="form-control form-control-lg" step="0.01" value="{{ old('precio', $producto->precio) }}" required>
        </div>

        <div class="mb-4">
          <label for="imagen" class="form-label">Cambiar imagen</label>
          <input type="file" name="imagen" class="form-control">
          @if ($producto->imagen)
            <small class="text-muted d-block mt-2">Imagen actual:</small>
            <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto" class="img-thumbnail mt-1" style="max-height: 150px;">
          @endif
        </div>

        <div class="mb-4 form-check">
          <input type="checkbox" name="destacado" class="form-check-input" id="destacado" {{ old('destacado', $producto->destacado) ? 'checked' : '' }}>
          <label class="form-check-label" for="destacado">Producto destacado</label>
        </div>

        <div class="mb-4">
          <label for="stock" class="form-label">Stock disponible</label>
          <input type="number" name="stock" class="form-control form-control-lg" min="0" value="{{ old('stock', $producto->stock) }}" required>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-primary btn-lg px-4">
            <i class="bi bi-save2 me-2"></i>Actualizar
          </button>
          <a href="{{ route('productos.index') }}" class="btn btn-outline-secondary btn-lg px-4">
            <i class="bi bi-x-circle me-2"></i>Cancelar
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection