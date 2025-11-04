<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
            'email' => 'required|email|unique:users',
            'name' => 'required|string',
            'secondname' => 'nullable|string',
            'phoneNumber' => 'nullable|string',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('dashboard')->with('success', 'Użytkownik został dodany!');
    }


    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }


    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username,' . $user->id,
            'password' => 'nullable|string|min:6',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string',
            'secondname' => 'nullable|string',
            'phoneNumber' => 'nullable|string',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']); 
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'Użytkownik został zaktualizowany!');
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Użytkownik został usunięty!');
    }
}
