<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - UniTrueque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #34a853, #1e8e3e);
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
            min-height: 100vh;
        }
        .card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #34a853;
            color: #fff;
        }
        .btn-custom:hover {
            background-color: #2c8c45;
        }
        .text-brand {
            color: #34a853;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 w-100" style="max-width: 480px;">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-brand">Regístrate en EcoMercado Universitario</h2>
                <p class="text-muted">Empieza a intercambiar productos de forma sustentable</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" id="registerForm">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo institucional</label>
                    <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label for="contacto" class="form-label">Medio de contacto (WhatsApp, Telegram, etc.)</label>
                    <input type="text" name="contacto" id="contacto" class="form-control" required value="{{ old('contacto') }}">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-custom">Crear cuenta</button>
                </div>

                <div class="text-center">
                    <p class="text-muted">¿Ya tienes una cuenta? 
                        <a href="{{ route('login') }}" class="text-brand fw-bold">Inicia sesión</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <!-- Script para validar correo -->
    <script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        const emailInput = document.getElementById('email').value.trim();
        const requiredDomain = "@alumnos.udg.mx";
        
        if (!emailInput.endsWith(requiredDomain)) {
            event.preventDefault(); // Detiene el envío del formulario
            alert('El correo debe ser institucional y terminar en "@alumnos.udg.mx".');
        }
    });
    </script>
</body>
</html>
