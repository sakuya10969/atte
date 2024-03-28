<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function sotre(){
        return view("auth.login");
    }

    public function destroy(){
        return view("auth.login");
    }
}
