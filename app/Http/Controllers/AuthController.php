<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kad_pengenalan' => ['required', 'string', 'max:12', 'unique:users', 'regex:/^\d{12}$/'],
            'email' => 'required|string|email|unique:users|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'kad_pengenalan' => $request->kad_pengenalan,
        ]);

        // You can customize the logic here after the user is registered successfully

        return redirect()->route('login')->with('success', 'Daftar Berjaya! Sila Login.');
    }
}
