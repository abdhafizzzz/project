<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Add this line to import the correct Request class

class LoginController extends Controller
{
    public function username()
    {
        return 'kad_pengenalan';
    }

    use AuthenticatesUsers;

    protected function credentials(Request $request)
    {
        $usernameKey = 'kad_pengenalan';
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
}
