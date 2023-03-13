<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home() {
        $articles = Article::query()->where('is_published', '=', true)->get();

//        return view('home', compact('articles'));
        return view('home', [
            'articles' => $articles,
        ]);
    }

    public function signup () {
        return view('signup');
    }

    public function signin () {
        return view('signin');
    }
}
