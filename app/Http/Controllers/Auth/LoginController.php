<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\KritikSaran;

class LoginController extends Controller
{
    // Tampilkan halaman login
    public function index()
    {
        return view('auth/login');
    }

   
    public function dashboard() 
    {
        $userId = Auth::id();  

        if (!$userId) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $user = Auth::user(); 

        return view('admin/dashboard', compact('user'));
    }

    // Proses login
    public function login(Request $request)
    {        
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Jika login berhasil
            $user = Auth::user(); 

           
                return redirect()->route('dashboard')->with('success', "Selamat datang, $user->nama!");
        } else {
            // Jika login gagal
            return redirect()->back()->with('error', 'Email atau password salah!');
        }
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/login')->with('success', 'Anda berhasil logout.');
    }
}
