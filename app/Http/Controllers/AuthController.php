<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin() { return view('auth.login'); }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/rooms');
        }

        return back()->withErrors(['email'=>'Email หรือรหัสผ่านไม่ถูกต้อง']);
    }

    public function showRegister() { return view('auth.register'); }
    public function register(Request $request)
    {
        $request->validate([
    'name'=>'required|string|max:255',
    'email'=>'required|email|unique:users,email',
    'password'=>'required|string|min:6|confirmed',
    'role'=>'nullable|in:user,staff,admin',
]);

User::create([
    'name'=>$request->name,
    'email'=>$request->email,
    'password'=>Hash::make($request->password),
    'role'=>$request->role ?? 'user', // default user
]);


        return redirect()->route('login')->with('success','สมัครสมาชิกเรียบร้อยแล้ว');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
