<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ]);
        if(!Auth::attempt($attributes))
        {
            return back()
                ->withErrors(['email' => 'Please re-check your credentials.'])
                ->withInput($request->only('email'));           // CodeRabbit said to only return email, i.e. return only non sensitive fields.
        }

        $request->session()->regenerate();

        return redirect()->intended('/ideas')->with('success', 'You are now Logged In. Off to the races!');

    }

    public function destroy(Request $request)
    {
        $request->session()->invalidate(); //CodeRabbit mentioned doing this here as well, this follows laravel's logout procedure.
        $request->session()->regenerateToken();
        Auth::logout();
        return redirect('/');
    }
}
