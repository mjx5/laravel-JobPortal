<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        $attributes = request()->validate([   //validate attributes
            'email' => ['required','email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($attributes)) {   //attempt to login
            throw ValidationException::withMessages([
                'email' => 'Credentials does not match'
            ]);
        }
        request()->session()->regenerate();  //generate a new session
        return redirect('/jobs');

    }

    public function destroy(){
        Auth::logout();
        return redirect ('/');
    }


}