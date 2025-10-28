<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // Wyświetlenie formularza logowania
    public function showLogin()
    {
        return view('auth.login');
    }

    // Obsługa logowania
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && password_verify($request->password, $user->password)) {
            session(['user_id' => $user->id]);
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['username' => 'Nieprawidłowe dane logowania']);
    }

    // Wylogowanie
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
