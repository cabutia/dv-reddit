<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm() {
        return view('auth.login');
    }

public function login(Request $request) {
        $credentials = $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required|min:3'
        ]);
        $logged = Auth::attempt($credentials);

        if (!$logged) return back()->withErrors([
            'username' => 'Nombre de usuario o contraseña incorrectos'
        ]);
        
        $user = Auth::user();

        return redirect(route('home'))
            ->withSuccessMessage("Bienvenido $user->username");
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect(route('home'));
    }
}
