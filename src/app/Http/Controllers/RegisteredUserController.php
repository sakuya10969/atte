<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\RegisterUserRequest;

class RegisteredUserController extends Controller
{
    public function create(){
        return view("auth.register");
    }

    public function store(RegisterUserRequest $request){
        $user = $request->only(["name","email","password","password_confirmation"]);
        User::create($user);
        return redirect("/login");
    }
}
