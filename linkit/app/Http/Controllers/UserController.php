<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\WelcomeDashboard;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }                                                                                                                     

    public function registerSave(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        if ($user) {
            return redirect()->route('login');
        } else {
            return redirect()->back()->withInput()->withErrors(['Failed to register user.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Retrieve the authenticated user's name
            $username = Auth::user()->name;

            // Dispatch the event with the username
            event(new WelcomeDashboard($username));

            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
