@extends('layouts.template')

@section('content')
<div class="container mt-5">
    <h1>{{ $blog->titulo }}</h1>

    @if ($blog->imagen)
        <div class="mb-4">
            <img src="{{ asset('storage/' . $blog->imagen) }}" class="img-fluid rounded" alt="Imagen del blog">
        </div>
    @endif

    <div>
        {!! nl2br(e($blog->contenido)) !!}
    </div>

    <a href="{{ route('blogs.index') }}" class="btn btn-secondary mt-4">Volver</a>
</div>
@endsection
