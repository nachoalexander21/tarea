<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | nacho21</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(120deg, #0d6efd, #6610f2);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 30px;
            border-radius: 15px;
            background: #fff;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .title {
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="login-card">

    <h3 class="title">🔐 ALEXANDER ARON NACHO HILARI - LOGIN </h3>

    <p class="text-center text-muted">
        Bienvenido, ingresa tus credenciales
    </p>

    <!-- Errores -->
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <!-- FORMULARIO -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- USUARIO -->
        <div class="mb-3">
            <label class="form-label">Usuario</label>
            <input type="text"
                   name="username"
                   class="form-control"
                   placeholder="Ingresa tu usuario"
                   required
                   autofocus>
        </div>

        <!-- PASSWORD -->
        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password"
                   name="password"
                   class="form-control"
                   placeholder="Ingresa tu contraseña"
                   required>
        </div>

        <!-- BOTÓN -->
        <button type="submit" class="btn btn-primary w-100">
            Iniciar sesión
        </button>
    </form>

    <hr>

    <p class="text-center text-muted small">
        Proyecto académico - Laravel nacho21
    </p>

</div>

</body>
</html>