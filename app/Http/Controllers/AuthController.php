<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        
        $user = User::firstWhere('username', $request->username);

   
        if (!$user || !password_verify($request->password, $user->password)) {
            return back()->withErrors([
                'username' => 'Nieprawidłowe dane logowania'
            ]);
        }


        session(['user_id' => $user->id]);

        return redirect()->route('dashboard');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}
