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
    }

    public function store()
    { // 
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
