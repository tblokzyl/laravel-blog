<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create() {
        return view('sessions.create');
    }

    public function store()
    {
        // validate the request
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // attempt to authenticate and login the user
        if (auth()->attempt($attributes)) {
            // redirect with a success flash message
            return redirect('/')->with('success', 'Welcome Back!');
        }

        // auth failed.
        return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {   
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
