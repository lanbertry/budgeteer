<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class AuthManager extends Controller
{
    function login()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }

        return view('sign-in');

    }

    function registration()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('sign-up');
    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            // $token = $user->createToken($user->email)->plainTextToken;

            return redirect()->intended(route('dashboard'));

        }

        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
            'email' => 'required|email|unique:users',
            // 'password' => [Password::min(8)->mixedCase()->numbers()->symbols()->uncompromised(), 'required', 'confirmed'],
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        /*         $data['password'] = $request->password; */
        $data['password'] = Hash::make($request->password);


        $data['verification_token'] = Str::random(40);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, try again.");
        }
        /*
                Mail::send("emails.verify_email", ['token' => $data['verification_token']], function ($message) use ($request) {
                    $message->to($request->email);
                    $message->subject("Verify Email");
                }); */

        return redirect(route('login'))->with("success", "Account Sucessfully Created!");

    }

    function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        $request->session()->regenerateToken();
        $request->session()->invalidate();
        Session::flush();
        Auth::logout();

        return redirect(route('login'));
    }


}
/*
$data['password'] = Hash::make($request->password);
 */
