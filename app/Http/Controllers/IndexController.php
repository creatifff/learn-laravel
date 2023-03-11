<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home() {
        return view('home');
    }

    public function signup () {
        return view('signup');
    }

    public function signin () {
        return view('signin');
    }
}
