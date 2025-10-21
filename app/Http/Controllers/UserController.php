<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UzytkownikDodanie;

class UserController extends Controller
{
    public function showAddForm()
    {
        return view('dodanieuser');
    }
    public function addUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:50',
            'password' => 'required|min:6',
            'imie' => 'required|max:50',
            'nazwisko' => 'required|max:50',
            'email' => 'required|email|max:100'
        ]);
      UzytkownikDodanie::create([
            'username' => $request->username,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
            'email' => $request->email,
        ]);
        return redirect('/dodanieU');
    }
}
