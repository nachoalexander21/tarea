<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Procesar login y redirigir según rol
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // 🔥 REDIRECCIÓN SEGÚN ROL
            if ($user->role === 'admin') {
                return redirect('/users');
            }

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'username' => 'Credenciales incorrectas.',
        ]);
    }

    /**
     * Cerrar sesión
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}