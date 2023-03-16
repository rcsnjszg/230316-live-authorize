<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store(RegisterStoreRequest  $request)
    {

        $validatedData = $request->validated();

        // $validatedData["password"] = Hash::make($data["password"]);
        // User::create($validatedData);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;


        // $request->session()->flash("success","Sikeres regisztrálás");
        // return redirect()->route("home");

        return redirect()->route('home')->with('success', "Sikeres regisztráció");

    }
}
