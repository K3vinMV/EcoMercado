@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Bienvenido, {{ Auth::user()->name }}!</h1>
    
    <div class="row mt-4">
        <!-- Información del usuario -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Tu Información</h5>
                </div>
                <div class="card-body">
                    <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    <p><strong>Contacto:</strong> {{ Auth::user()->contacto ?? 'No establecido' }}</p>
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class="btn btn-primary">Editar Información</a>
                </div>
            </div>
        </div>

        <!-- Botones para administrar productos y blogs -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5>Administrar</h5>
                </div>
                <div class="card-body">
                    <a href="{{ route('productos.index') }}" class="btn btn-success w-100 mb-2">Administrar Productos</a>
                    <a href="{{ route('blogs.index') }}" class="btn btn-info w-100">Administrar Blogs</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection