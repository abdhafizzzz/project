<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RedirectsUsers;


class SetPasswordController extends Controller
{
    use RedirectsUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showSetPasswordForm()
    {
        return view('auth.set_password');
    }

    public function setPassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->set_password = true;
        $user->save();

        return redirect($this->redirectPath());
    }
}
