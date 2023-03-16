<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function index()
    {
        return view("article.index",[
            "title" => "Cikkek",
            "articles" => Article::all(),
        ]);
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        Gate::authorize("update-article",$article);
        return view("article.edit",[
            "title" => $article->title . " szerkesztése",
            "article" => $article,
        ]);
    }
}
