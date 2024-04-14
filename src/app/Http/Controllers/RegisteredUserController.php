<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }



    public function store(RegisterRequest $request)
    {
        $user_info = $request->only(["name", "email"]);
        $user_info["password"] = Hash::make($request->password);
        User::create($user_info);
        return redirect("/login");
    }
}
