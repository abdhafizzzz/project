<?php



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    // public function showLinkRequestForm()
    // {
    //     return view('auth.passwords.email');
    // }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }


public function sendResetEmail(Request $request)
{
    $this->validate($request, [
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()->with('error', 'Email dimasukkan sudah wujud.');
    }

    $token = $this->createToken($user);

    Mail::to($user->email)->send(new ResetPasswordMail($token));

    return back()->with('success', 'Link Tukar Kata Laluan berjaya dihantar ke email anda.');
}

}
