<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function create()
    {
        Gate::authorize("create-article");

        return view("article.create",[
            "title" => "Új cikk létrehozása",
        ]);
    }

    public function store(StoreArticleRequest $request)
    {
        // A StoreArticleRequest::authorize() metódus végzi a jogosultság ellenőrzíst itt
        
        $data = $request->validated();
        // $data["user_id"] = Auth::user()->id;
        $data["user_id"] = Auth::id();
        Article::create($data);
        return back();
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
