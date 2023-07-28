<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nokp' => ['required', 'string', 'regex:/^[0-9]{6}[-\s]?[0-9]{2}[-\s]?[0-9]{4}$/'],
        ]);
    }

    protected function create(array $data)
    {
        // Check if 'nokp' exists in the 'petanibajak' table
        $existingNokp = DB::table('petanibajak')->where('nokp', $data['nokp'])->first();

        // If 'nokp' exists, retrieve the corresponding 'nama'
        $nama = $existingNokp ? $existingNokp->nama : $data['name'];

        // Create the user in the 'users' table and store 'nokp', 'nama', 'name', 'email', and 'password'
        return User::create([
            'nokp' => $data['nokp'],
            'nama' => $nama,
            'name' => $data['name'], // We still use the provided 'name' value directly from the registration form
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function checkNokp(Request $request)
    {
        $nokp = $request->input('nokp');
        $existingNokp = DB::table('petanibajak')->where('nokp', $nokp)->first();

        if ($existingNokp) {
            // If 'nokp' exists, return the JSON response with 'exists' as true and 'nama' value
            return response()->json(['exists' => true, 'nama' => $existingNokp->nama]);
        } else {
            // If 'nokp' does not exist, return the JSON response with 'exists' as false
            return response()->json(['exists' => false]);
        }
    }
}
