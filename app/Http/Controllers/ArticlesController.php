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

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }


    public function create()
    { // 
        return view('articles.create');
    }

    public function store()
    {
        //always assume content is malicious
        //extra validation serverside -- laravel's validation component. 
        //default is that if any fail, it redirects and provide a error object
        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        // die('hello'); // get something to show
        // dump(request()->all());

        $article = new Article();

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles');
    }

    public function edit(Article $article)
    { // 

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    { // 

        request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }


    public function destroy()
    { // 
    }
}
