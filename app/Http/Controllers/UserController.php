<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Article;

class UserController extends Controller
{
    public function landingUser(Request $request, $title)
    {
        $main = Main::where('title', $title)->first();

        if ($main) {
            $term = $request->input('search');
            if ($term) {
                $articles = Article::where(function ($query) use ($term) {
                    $query
                        ->whereHas('category', function ($subQuery) use ($term) {
                            $subQuery->where('category', 'LIKE', "%$term%");
                        })
                        ->orWhere('title', 'LIKE', "%$term%");
                })->get();
            } else {
                $articles = $main->article;
            }
        } else {
            abort(404);
        }

        return view('user.landing-user', compact('main', 'articles'));
    }

    public function showArticleUser($id)
    {
        $article = Article::find($id);
        return view('user.show-article', compact('article'));
    }
}
