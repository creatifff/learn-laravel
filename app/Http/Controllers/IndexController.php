<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(Request $request) {
        $articles = Article::query()->where('is_published', '=', true);

        if($request->get('query')) {
            $query = $request->get('query');

            $articles = $articles->where('title', 'LIKE', "%$query%")
                ->orWhere('content', 'LIKE', "%$query%");
        }

        $articles = $articles->paginate(3)->withQueryString();

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
