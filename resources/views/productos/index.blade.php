@extends('layouts.template')

@section ('content')

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Mis Productos</h2>
    <a href="{{ route('productos.create') }}" class="btn btn-success">
      <i class="bi bi-plus-circle me-1"></i> Nuevo producto
    </a>
  </div>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if ($productos->count())
    <div class="table-responsive shadow rounded-4">
      <table class="table table-hover align-middle mb-0">
        <thead class="table-light">
          <tr>
            <th scope="col">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Destacado</th>
            <th scope="col" class="text-end">Acciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($productos as $producto)
            <tr>
              <td>
                @if ($producto->imagen)
                  <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" width="60" height="60" class="rounded object-fit-cover">
                @else
                  <span class="text-muted">Sin imagen</span>
                @endif
              </td>
              <td>{{ $producto->nombre }}</td>
              <td>${{ number_format($producto->precio, 2) }}</td>
              <td>{{ $producto->stock }}</td>
              <td>
                @if ($producto->destacado)
                  <span class="badge bg-success">Sí</span>
                @else
                  <span class="badge bg-secondary">No</span>
                @endif
              </td>
              <td class="text-end">
                <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-outline-info btn-sm me-1">
                  <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-outline-primary btn-sm me-1">
                  <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-trash"></i>
                  </button>
                </form>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $productos->links() }} {{-- Si estás usando paginación --}}
    </div>
  @else
    <div class="alert alert-info">
      No hay productos registrados todavía.
    </div>
  @endif
</div>

@endsection