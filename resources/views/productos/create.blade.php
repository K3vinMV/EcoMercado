@extends('layouts.template')

@section ('content')

<div class="container my-5">
  <div class="card shadow-lg rounded-4 border-0">
    <div class="card-body p-5">
      <h2 class="mb-4 fw-bold text-center">
        <i class="bi bi-box-seam me-2"></i>Agregar nuevo producto
      </h2>

      <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
          <label for="nombre" class="form-label">Nombre del producto</label>
          <input type="text" name="nombre" class="form-control form-control-lg" required>
        </div>

        <div class="mb-4">
          <label for="descripcion" class="form-label">Descripción</label>
          <textarea name="descripcion" class="form-control" rows="4" placeholder="Describe brevemente el producto..."></textarea>
        </div>

        <div class="mb-4">
          <label for="precio" class="form-label">Precio</label>
          <input type="number" name="precio" class="form-control form-control-lg" step="0.01" required>
        </div>

        <div class="mb-4">
          <label for="imagen" class="form-label">Imagen del producto</label>
          <input type="file" name="imagen" class="form-control">
        </div>

        <div class="mb-4 form-check">
          <input type="checkbox" name="destacado" class="form-check-input" id="destacado">
          <label class="form-check-label" for="destacado">Producto destacado</label>
        </div>

        <div class="mb-4">
          <label for="stock" class="form-label">Stock disponible</label>
          <input type="number" name="stock" class="form-control form-control-lg" min="0" required>
        </div>

        <div class="d-flex justify-content-between">
          <button type="submit" class="btn btn-success btn-lg px-4">
            <i class="bi bi-save2 me-2"></i>Guardar
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