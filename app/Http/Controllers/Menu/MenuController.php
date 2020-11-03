<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //
    public function menu()
    {
        if (Auth::check()) {
            return view('menu/menu');
        } else {
            return view('auth/login');
        }
    }

    public function secret()
    {
        return view('secret/secret');
    }
}
