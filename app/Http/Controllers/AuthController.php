<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            Auth::login($user);  // Proses login pengguna
            session()->flash('success', 'Login berhasil!');  // Pesan sukses
            return redirect()->intended('/landing');
        }

        session()->flash('error', 'Username atau password salah');  // Pesan gagal
        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    public function logout(Request $request)
    {
        Auth::logout();  // Logout pengguna
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}


