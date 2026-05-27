<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- 🔴 BOTÓN CERRAR SESIÓN -->
    <form method="POST" action="{{ route('logout') }}" class="text-end mb-3">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
            🚪 Cerrar sesión
        </button>
    </form>

    <!-- 🟢 CONTENIDO DEL DASHBOARD -->
    <div class="card shadow-sm p-4">

        <h3 class="mb-3">👋 Bienvenido</h3>

        <p class="text-muted mb-4">
            Has iniciado sesión correctamente en el sistema.
        </p>

        <div class="alert alert-info">
            ✔ Tu sesión está activa
        </div>

        <div class="row mt-4">

            <div class="col-md-6">
                <div class="border rounded p-3 bg-white">
                    <h5>📌 Estado</h5>
                    <p class="mb-0">Usuario autenticado</p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="border rounded p-3 bg-white">
                    <h5>🔒 Acceso</h5>
                    <p class="mb-0">Permisos básicos de usuario</p>
                </div>
            </div>

        </div>

    </div>

</div>

</body>
</html>