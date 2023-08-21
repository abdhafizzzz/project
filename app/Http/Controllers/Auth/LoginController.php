<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function username()
    {
        return 'nokp';
    }

    protected function credentials(Request $request)
    {
        $usernameKey = 'nokp';
        $usernameValue = $request->{$usernameKey};

        return [
            $usernameKey => $usernameValue,
            'password' => $request->password,
        ];
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {
        $welcomeMessage = 'Selamat Datang, ' . $user->name ;
        session()->flash('success', $welcomeMessage);
    }
}
