<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <!-- 🔴 CERRAR SESIÓN (ADMIN) -->
    <form method="POST" action="{{ route('logout') }}" class="text-end mb-3">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
            🚪 Cerrar sesión
        </button>
    </form>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>👨‍💼 Administración de Usuarios</h2>
        <a href="/users/create" class="btn btn-success">➕ Crear Usuario</a>
    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="/users/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Editar</a>

                                <form action="/users/{{ $user->id }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>