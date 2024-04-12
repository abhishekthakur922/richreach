<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function register(Request $request)
    {
      if ($request->isMethod('get'))
      {
        return view('frontend.register');
      }
      else
      {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($user)
        {
          return redirect('/register')->with('success', 'Registration successful!');   
        }

      }
    }

    public function login(Request $request)
    {
      if ($request->isMethod('get'))
      {
        return view('frontend.login');
      }
      else
      {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/posts');
        }

        return redirect()->back()->with('error', 'Invalid credentials.');
      } 
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
