<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth ;
use Illuminate\Support\Facades\Hash ;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( Auth::attempt( $request->only('email', 'password')))
        {
            return redirect() -> route('dashboard')
            ->with('success','Successfully logged in.');
        }

        return back() -> withErrors([
            'email' => 'Invalid email or password.'
        ]);
    }

    public function logout()
    {
        Auth::logout() ;
        return redirect() -> route('login') 
        -> with('success', 'Logged out successfully.') ;
    }

    public function register(Request $request)
    {
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users, email',
            'password' => 'required|confirmed|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auth::login($user) ;

        return redirect() -> route('login');
    }
}
