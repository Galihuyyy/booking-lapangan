<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{

    public function index(){
        return redirect("/user/home");
    }
    
    public function showLoginForm() {
        return view('auth.login'); 
    }

    public function login(Request $request){
        $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        $data = $request->only(['name', 'password']);

        $user = User::where('name', $data['name'])
                    ->first();
                    
        if (!$user) {
            return redirect()->route('home')->with('success', 'Berhasil login!');
        }

        if (!Hash::check($data['password'], $user->password)) {
            return redirect()->back()->with('error', 'Password salah!');
        }

        Auth::login($user);

        $route = $user->role == "admin" ? 'lapangan.index' : 'home.index';

        return redirect()->route($route)->with('success', 'Berhasil login!');
        
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil logout!');
    }
}
