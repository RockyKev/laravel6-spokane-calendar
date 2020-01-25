<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function Show($slug)
    {

        //this is the query builder! 
        // $post = DB::table('posts')->where('slug', $slug)->first();

        //this is the query builder with models and elequent. 
        $post = Post::where('slug', $slug)->firstOrFail();

        // dd($post);

        // $posts = [
        //     'my-first-post' => 'Hello, this is my first blog post!',
        //     'my-second-post' => 'Now I am getting the hang of this blogging thing.'
        // ];


        return view('post', [
            'post' => $post
        ]);
    }
}
