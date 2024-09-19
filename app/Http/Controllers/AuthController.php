<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'username' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        // Attempt to authenticate user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            flash()->success('Berhasil login.');

            $userLevel = Auth::user()->level;

            if ($userLevel == "0") {
                return redirect()->intended(route('home', absolute: false));
            } else {
                return redirect()->intended(route('admin', absolute: false));
            }
        }

        // Authentication failed, redirect back with error message
        flash()->error('Username atau password salah.');
        return redirect()->back();
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['level'] = 1;

        User::create($validated);

        return redirect('/login');
    }
}
