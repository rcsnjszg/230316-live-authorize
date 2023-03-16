<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginRequest;


class AuthController extends Controller
{
    // app/Http/Controllers/AuthController.php


    public function login()
    {
        return view("auth.login");
    }

    public function authenticate(LoginRequest $request)
    {

        $data = $request->validated();

        if(Auth::attempt($data))
        {
            $request->session()->regenerate();
 
            // Az intended oda irányít vissza, ahonnan jött.
            // Ha nem sikerül akkor a home-ra irányít.
            return redirect()->intended(route('home'));
        }

        // A back vissza irányít oda, ahonnan jött.
        // A With errors egy tömböt kap, a mezők hibaüzeneteit.
        // A bejelentkezésnél a hibás email vagy jelszóm tartozhat az email mezőhöz
        // Az onlyInput nem "küldi vissza" a jelszót az előző oldalnak. (security)
        return back()->withErrors([
            'email' => 'Hibás email, vagy jelszó',
        ])->onlyInput('email');

    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route("home");
    }
}
