<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
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
        if (request('tag')) {
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }


    public function create()
    { // 
        $tags = Tag::all();

        return view('articles.create', [
            'tags' => $tags
        ]);
    }


    public function store()
    {

        //always assume content is malicious
        //extra validation serverside -- laravel's validation component. 
        //default is that if any fail, it redirects and provide a error object
        $validatedRequest = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);

        // die('hello'); // get something to show
        // dump(request()->all());

        $article = new Article(request(['title', 'excerpt', 'body']));
        $article->user_id = 1; //auth()->id();
        $article->save();

        $article->tags()->attach(request('tags'));

        // Article::create($validatedRequest);
        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    { // 

        return view('articles.edit', compact('article'));
    }

    public function update(Article $article)
    { // 

        $validatedRequest = request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $article->update($validatedRequest);

        return redirect(route($article->path));

        // return redirect(route('articles.show', $article));
    }


    public function destroy()
    { // 
    }
}
