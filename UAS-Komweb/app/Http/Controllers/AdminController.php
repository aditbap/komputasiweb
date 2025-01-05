<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function toko()
    {
        return view('toko.index');
    }
}
