@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>Editar Información</h1>

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" value="{{ old('contacto', $user->contacto) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Información</button>
    </form>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-4">Volver al Dashboard</a>
</div>
@endsection