<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            switch ($user->role) {
                case 'admin':
                    return redirect('admin/dashboard')->with('success', 'Login berhasil');
                    break;
                case 'user':
                    return redirect('user/dashboard')->with('success', 'Login berhasil');
                    break;
                default:
                    return redirect('auth/login')->with('error', 'Peran tidak dikenali');
            }
        } else {
            return redirect('auth/login')->with('error', 'Email dan Password anda tidak valid');
        }
    }

    function registerForm()
    {
        return view('auth/register');
    }


    function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus :min karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect('auth/login')->with('success', 'Akun anda sudah berhasil di buat, silahkan login');
    }

    function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
