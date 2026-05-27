<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Manejo del middleware por roles
     *
     * Uso en rutas:
     * ->middleware('role:admin')
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Verificar si el usuario está autenticado
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Obtener usuario logueado
        $user = auth()->user();

        // Verificar rol
        if ($user->role !== $role) {
            // Si no tiene permiso, redirigir al dashboard
            return redirect('/dashboard')->with('error', 'No tienes permisos para acceder a esta sección.');
        }

        return $next($request);
    }
}