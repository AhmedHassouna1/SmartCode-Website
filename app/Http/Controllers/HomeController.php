<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function showLoginForm()
    {
        return view('auth.login');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

             if (auth()->user()->is_admin) {
                return redirect()->route('dashboard');  
            }

             return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'بيانات الدخول غير صحيحة',
        ]);
    }

  
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'third_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'country' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'second_name' => $request->second_name,
            'third_name' => $request->third_name,
            'phone' => $request->phone,
            'country' => $request->country,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 0, 
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }
 
    public function logout(Request $request)
    {
        auth()->logout();  
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');  
    }

   
    public function home()
    {
        return view('home');
    }
}
