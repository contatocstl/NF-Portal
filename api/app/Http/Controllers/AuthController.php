<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credenciais = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credenciais)) {
            return back()
                ->withErrors([
                    'email' => 'E-mail ou senha inválidos.',
                ])
                ->onlyInput('email');
        }

        $request->session()->regenerate();

        $usuario = Auth::user();

        if ($usuario->role === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($usuario->role === 'funcionario') {
            return redirect()->route('funcionario.dashboard');
        }

        Auth::logout();

        return redirect('/login')
            ->withErrors([
                'email' => 'Usuário sem permissão de acesso.',
            ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}