<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

/* 

    index = show all list
    show = show single resource
    create = to create new resource
    store = save your new creation
    edit = to modify resource
    update = save your edit
    destroy = to destroy it

*/


class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }


    public function create()
    { // 
        return view('articles.create');
    }

    public function store()
    {
        // die('hello'); // get something to show
        // dump(request()->all());

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit()
    { // 
    }

    public function update()
    { // 
    }


    public function destroy()
    { // 
    }
}
