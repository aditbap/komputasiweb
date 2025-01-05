<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function create()
    {
        return view('auth.create');
    }
}
