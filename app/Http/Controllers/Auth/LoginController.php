<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    // index
    public function login()
    {
        return view('auth.login');
    }
    // doLogin
    public function doLogin(Request $request)
    {
        $credential = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);
        // login kan
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            $request->session()->regenerateToken();
            return redirect()->route('dashboard');
        }
        return back()->with('error','Login Gagal, Silahkan Ulangi Lagi!!!');
    }
    // logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success','Anda Telah Logout!');
    }
}
