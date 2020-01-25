<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/contact', function () {
    return view('contact');
});



Route::get('test', function () {
    $name = request('name');
    return view('test', [
        'name' => $name
    ]);
});

// Route::get('/posts/{post}', function ($post) {
//     // return view('post');
//     // return $post;

//     $posts = [
//         'my-first-post' => 'Hello, this is my first blog post!',
//         'my-second-post' => 'Now I am getting the hang of this blogging thing.'
//     ];

//     if (!array_key_exists($post, $posts)) {
//         abort(404, "sorry that post was not found");
//     }

//     return view('post', [
//         'post' => $posts[$post]
//     ]);
// });


Route::get('/posts/{posts}', 'PostsController@show');
