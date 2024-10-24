<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|unique:users',
            'nama' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Buat pengguna baru
        $user = User::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_login' => 0,
            'role' => 'user',
        ]);

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil kredensial dari input
        $credentials = $request->only('username', 'password');

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $user = User::find(Auth::id());
            $user->is_login = 1;
            $user->save();

            Session::put('user', $user);

            if ($user->role == 'admin') {
                return redirect()->route('admin.home');
            } elseif ($user->role == 'user') {
                return redirect()->route('user.home');
            }
        }
        

        return redirect()->route('login')->with('error', 'Kredensial tidak valid');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        // Proses user seperti sebelumnya
        $user = User::where('email', $googleUser->email)->first();

        if (!$user) {
            $user = User::create([
                'username' => $googleUser->getNickname() ?: $googleUser->getName(),
                'nama' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'image' => $googleUser->getAvatar(),
                'password' => Hash::make(uniqid()), // Password random
                'is_login' => 1,
                'role' => 'user',
            ]);
        }

        Auth::login($user, true);

        return redirect()->route('user.home');
    }

    public function logout()
    {
        $user = User::find(Auth::id());
        $user->is_login = 0;
        $user->save();

        Session::forget('user');
        Auth::logout();

        return redirect()->route('login');
    }

    public function home()
    {
        $user = Session::get('user');
        return view('home', compact('user'));
    }
}
