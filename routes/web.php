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
    return view('main');
});

Route::get('/events', 'EventsController@index');
Route::post('/events', 'EventsController@store');
Route::get('/events/create', 'EventsController@create');
Route::get('/events/{event}', 'EventsController@show');
Route::get('/events/{event}/edit', 'EventsController@edit');
Route::put('/events/{event}', 'EventsController@update');
Route::resource('article')


// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/articles', 'ArticlesController@index')->name('articles.index');
// Route::post('/articles', 'ArticlesController@store');
// Route::get('/articles/create', 'ArticlesController@create');
// Route::get('/articles/{article}', 'ArticlesController@show')->name('articles.show'); //named routes
// Route::get('/articles/{article}/edit', 'ArticlesController@edit');
// Route::put('/articles/{article}', 'ArticlesController@update');


// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/simple', function () {
//     return view('simplework');
// });

// Route::get('/about', function () {
//     // $articles = App\Article::all();
//     $articles = App\Article::take(3)->latest()->get();
//     // $articles = App\Article::take(2)->get();
//     // $articles = App\Article::paginate(2);

//     // return $article;
//     return view('about', [
//         'articles' => $articles
//     ]);
// });


// Route::get('test', function () {
//     $name = request('name');
//     return view('test', [
//         'name' => $name
//     ]);
// });

// // Route::get('/posts/{post}', function ($post) {
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


// Route::get('/posts/{posts}', 'PostsController@show');
